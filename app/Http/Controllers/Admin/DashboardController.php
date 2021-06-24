<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    public function index() {
        $total_users = User::where('is_admin',0)->count();
        $total_blogs = Blog::count();
        return view('admin.home',['total_users' => $total_users,'total_blogs' => $total_blogs]);
    }
    public function create_blog() {
        return view('admin.create_blog');
    }
    public function my_blog() {
        $blogs = Blog::get();
        return view('admin.my_blog',['blogs' => $blogs]);
    }
    public function add_blog(Request $request) {

        $blog = new Blog();
        $image = $request->image;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog_image = time().'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $blog_image);
        $blog->image = $blog_image;
        $blog->save();
        return redirect('admin/create_blog')->with(['status' => true , 'msg' => 'Blog created successfully']);
    }

    public function update_blog(Request $request) {
        $blog = Blog::where('id',$request->blog_id)->first();

        return view('admin.edit_blog',['blog' => $blog]);
    }

    public function edit_blog(Request $request) {

        if($request->image != '') {
            $image = $request->image;
            $blog_image = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $blog_image);
            Blog::where('id',$request->blog_id)->update(['image' => $blog_image]);
        }
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Blog::where('id',$request->blog_id)->update($data);
        return redirect()->back()->with(['status' => true , 'msg' => 'Blog updated successfully']);
    }
    public function delete_blog(Request $request) {

        $blog=Blog::find($request->blog_id);
        $blog->delete();
        return redirect()->back()->with(['delete' => true , 'msg' => 'Blog deleted successfully']);

    }
    public function users_list() {
        $users = User::get();
        return view('admin.users_list',['users' => $users]);
    }
    public function delete_user(Request $request) {
        $user=User::find($request->user_id);
        $user->delete();
        return redirect()->back()->with(['delete' => true , 'msg' => 'User deleted successfully']);
    }
}
