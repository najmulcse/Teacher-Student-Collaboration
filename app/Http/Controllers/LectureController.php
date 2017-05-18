<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Content;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

      //In a group ,teachers can see a view to uploading a lecture by this method 

    public function createLecture( $groupid ){
      
      $group= Group::findOrFail( $groupid );
      $user= User::findOrFail($group->user_id);
      return view('lectures.createLecture',compact('group','user'));
    }


    public function allLectures($gid){

       $group = Group::findOrFail($gid);
       $lectures = Post::where('group_id', $gid)->where('type','L')->orderBy('created_at','desc')->get();
       $user=User::findOrFail(Auth::user()->id);

        return view('lectures.allLectures',compact('group','user','lectures'));
     }


    //Here all lectures will be stored in the individual group 
    
    public function storeLecture(Request $request , $gid){

     $file= $request->file('file');
     $user_id = Auth::user()->id;
     $post=Post::create(['group_id'=> $gid ,'user_id'=> $user_id , 'title' => $request->lecture_title ,'body' => $request->body,'type' => 'L']);

     if(!empty($file))
     {
        $content=time().$file->getClientOriginalName();
        $post_id=$post->id;
        $file->move('postfiles',$content);
        Content::create(['post_id' => $post_id ,'content' =>$content ]);
     }


      return redirect()->route('id',$gid);  
      

    }
}
