<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\ActiveChat;
use App\Events\CommentApp;
use App\PrivateMessage;
use App\Events\ChatApp;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
   public function send(Request $request) {
       $user = User::find(Auth::id());
       $private_message = new PrivateMessage();
       $private_message->from_id = Auth::id();
       $private_message->to_id = $request->chatMateId;
       $private_message->message = $request->message;
       if(empty($request->image)) {
            $imageName = 'false';
       }else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('chat'), $imageName);
            $private_message->image = $imageName;
       }
       $private_message->save();
       $lastId = $private_message->id;
       event(new ChatApp($request->message,$imageName,$user,$lastId));
   }
    public function add_comment(Request $request) {
        $user = User::find(Auth::id());
        $comments = new Comment();
        $comments->user_id = Auth::id();
        $comments->mention_id = $request->mention_id;
        $comments->post_id = $request->post_id;
        $comments->message = $request->message;
        if(empty($request->image)) {
            $imageName = 'false';
            $comments->image = $imageName;
        }else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('chat'), $imageName);
            $comments->image = $imageName;
        }
        $comments->save();
        event(new CommentApp($request->message,$user,$imageName,$request->post_id));
    }
    public function get_comment(Request $request) {
        $comment = Comment::select('comments.*','users.image as profile_image')->join('users','users.id','comments.user_id')->where('post_id',$request->post_id)->get();
        return $comment;
    }
   public function get_inbox() {
       $user_id = Auth::id();
       $private_message = PrivateMessage::select('users.id','users.name','users.image','private_messages.message','private_messages.status')->join('users','users.id','private_messages.to_id')->where('private_messages.to_id',$user_id)
                                         ->groupBy('private_messages.from_id')
                                         ->orderBy('status','ASC')
                                         ->orderBy('id','DESC')
                                         ->get();
       return response()->json($private_message);
   }
   public function fetch_messages(Request $request) {
       $user_id = Auth::id();
       $chatMate_id = $request->user_id;
       $chatMate_data = User::where('id',$chatMate_id)->first();
       $messages = PrivateMessage::select('private_messages.message','private_messages.image as chat_image','users.id as user_id','users.image as profile_image')
                                   ->join('users','users.id','private_messages.from_id')
                                   ->where(function($query) use($user_id) {
                                       $query->where('from_id', $user_id)
                                           ->orWhere('to_id', $user_id);
                                   })
                                   ->where(function($query) use ($chatMate_id) {
                                       $query->where('from_id', $chatMate_id)
                                           ->orWhere('to_id', $chatMate_id);
                                   })
                                   ->get();
       return response()->json([
           'chatMateData' => $chatMate_data,
           'messageData' => $messages
       ]);
   }
   public function updateChatSeen(Request  $request) {
       $message = PrivateMessage:: where('id',$request->message_id)->update(['status' => $request->status]);
       return $message;
   }
    public function update_comment_status(Request  $request) {
        $message = Comment:: where('post_id',$request->post_id)->update(['status' => $request->status]);
        return $message;
    }
    public function getNotifications() {
        $user_id = Auth::id();
        $count = Comment::join('post_objects','post_objects.id','comments.post_id')->where('post_objects.user_id',$user_id)->where('status',0)->count();
        $comment = Comment::join('post_objects','post_objects.id','comments.post_id')->join('users','users.id','comments.user_id')->where('post_objects.user_id',$user_id)->where('status',0)->get();
        return response()->json([
            "count" => $count,
            "comment" => $comment
        ]);
    }
}
