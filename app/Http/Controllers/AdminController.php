<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\Post;
use App\Comment;
use App\User;
class AdminController extends Controller
{
    public function __construct(){

    	 $this->middleware('auth');
    	 $this->middleware('isAdmin');
    }


    public function index(){
    	$groups  = Group::all();
    	$assignments   = Post::where('type','A')->get();
    	$posts   = Post::where('type','P')->get();
    	$lectures   = Post::where('type','L')->get();
    	$comments   =Comment::all();
    	return view('admins.index',compact('assignments','posts','groups','comments'));
    }
    public function allGroups(){
    	$groups = Group::all();
    	return view('admins.groups.allGroups',compact('groups'));
    }

    public function groupPosts(){
      $posts = Post::all();
    	return view('admins.groups.allPosts',compact('posts'));
    }

    public function groupComments(){
      $comments =Comment::all();
    	return view('admins.groups.allComments',compact('comments'));
    }




    //ajax calling 

    public function searchGroup(Request $request){

       $search = $request->id;

               if (empty($search))
               {
                  return view('admins.groups.allGroups');         
               }
               else
               {
                   $groups = Group::where('group_name','LIKE',"%{$search}%")
                                  ->orWhere('course_code','LIKE',"%{$search}%")
                                  ->orWhere('group_code','LIKE',"%{$search}%")
                                  ->orWhere('session','LIKE',"%{$search}%")
                                  ->get();

                   return view('admins.groups.ajaxSearch',compact('groups'));
               }

    }

    public function deleteGroup(Request $request){
        $gid = $request->id ;
        if($request->ajax()){
            $status = Group::findOrFail($gid)->delete();
            return response(['msg' => 'Group deleted successfully', 'status' => 'success']);
        }
        
    }

    public function searchPost(Request $request){

       $search = $request->id;

               if (empty($search))
               {
                  return view('admins.groups.allPosts');         
               }
               else
               {
                   $posts = Post::where('title','LIKE',"%{$search}%")
                                  ->orWhere('body','LIKE',"%{$search}%")
                                  ->get();

                   return view('admins.groups.ajaxSearchPost',compact('posts'));
               }

    }

    public function deletePost(Request $request){
        $pid = $request->id ;
        if($request->ajax()){
            $status = Post::findOrFail($pid)->delete();
            return response(['msg' => 'Post deleted successfully', 'status' => 'success']);
        }
        
    }


    public function searchComment(Request $request){

       $search = $request->id;

               if (empty($search))
               {
                  return view('admins.groups.allComments');         
               }
               else
               {
                   $comments = Comment::where('comment','LIKE',"%{$search}%")
                                  ->get();

                   return view('admins.groups.ajaxSearchComment',compact('comments'));
               }

    }

    public function deleteComment(Request $request){
        $pid = $request->id ;
        if($request->ajax()){
            $status = Comment::findOrFail($pid)->delete();
            return response(['msg' => 'Comment deleted successfully', 'status' => 'success']);
        }
        
    }

    public function addAdmin()
    {
      return view('admins.groups.addAdmin');
    }
    public function storeAdmin(Request $request)
    {
      $rules =[
          'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
      ];
      $this->validate($request,$rules);

      $user = User::create([
                  'name'         => $request->name,
                  'email'        => $request->email,
                  'password'     => bcrypt($request->password),
                  'user_type_id' => $request->user_type_id         
                     ]);

      if($user)
      {
        return back()->with('msg'," Admin Successfully Added");
      }
      else
      {
        return back()->with('msg'," Wrong!!!");
      }
    }
}
