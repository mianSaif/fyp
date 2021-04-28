<?php

namespace App\Http\Controllers;

use App\PostObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\NewsFeedResource;

class PostObjectController extends Controller
{
    public function get_country() {
        $country = DB::table('countries')->get();
        $state_city = DB::table('cities')->get();
        $data = [
            'countries' => $country,
            'cities' => $state_city,
        ];
        return response()->json($data);
    }
    public function post_object(Request $request) {
        $update_image = false;
        if ($request->type == 'edit') {
            $object = PostObject::find($request->post_id);
            $update_image = true;
        }else {
            $object = new PostObject();
        }
        $user_id = Auth::id();
        $object->user_id = $user_id;
        $object->country = $request->country;
        $object->city = $request->city;
        $object->title = $request->title;
        $object->description = $request->description;
        $object->contact = $request->contact;
        $object->post_type = $request->selected_post_type;
        $object->picture_type = $request->picture_type;
        $object->enable_comment = $request->enable_comment;
        $object->enable_dm = $request->enable_dm;
        // Upload Image Code
        if (empty($request->image)) {
            if ($update_image == true && empty($request->image)) {
                $object->image = $object->image;
            }else {
                $object->image = 0;
            }
        }else {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('PostObjectImages'), $imageName);
            $object->image = $imageName;
        }
        $object->save();
    }
    public function fetch_post(Request $request) {
        $post_type = $request->post_type;
        $post_id = $request->post_id;
        if ($request->single_post) {
            $posts = PostObject::where('post_type',$post_type)
                ->where('id',$post_id)
                ->paginate(1);
        }elseif ($request->home_posts){
            $posts = PostObject::select('users.name as profile_name','countries.name as country_name','cities.city_name','post_objects.id as post_id','post_objects.title','post_objects.image')
                               ->join('users','users.id','post_objects.user_id')
                               ->join('countries','countries.id','post_objects.country')
                               ->join('cities','cities.id','post_objects.city')
                               ->where('post_type',$post_type)
                               ->orderBy('post_objects.id','DESC')->limit(5)
                               ->get();
        } else {
            $posts = PostObject::where('post_type',$post_type)
                ->paginate(10);
        }
        $resource = new NewsFeedResource($posts);
        return $resource;
    }
    public function recent_post(Request $request) {
        $post_type = $request->post_type;
        $posts = PostObject::where('post_type',$post_type)->orderBy('id', 'desc')->limit(5)->get();
        return $posts;
    }
    public function search_object(Request $request) {
       $title = $request->title;
       $country = $request->country;
       $city = $request->city;
       $post_type = $request->post_type;
       $result = PostObject::where('title','like','%' . $title . '%')
                             ->orWhere('description','like','%' . $title . '%')
                             ->where('post_type',$post_type)
                             ->where('country',$country)
                             ->where('city',$city)
                             ->paginate(10);
        $resource = new NewsFeedResource($result);
        return $resource;
       return $resource;
    }
    public function my_posts(Request $request) {
        $user_id = Auth::id();
        if($request->post_id) {
            $posts = PostObject::where('post_objects.id',$request->post_id)->first();
        }else {
            $posts = PostObject::select('post_objects.id as post_id','countries.*','cities.*','post_objects.*')->join('countries','countries.id','post_objects.country')->join('cities','cities.id','post_objects.city')->where('user_id',$user_id)->where('post_type',$request->post_type)->get();
        }
        return $posts;
    }
    public function delete_post(Request $request) {
        $delete = PostObject::where('id',$request->post_id)->delete();
        return $delete;
    }
}
