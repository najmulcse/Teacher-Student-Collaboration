<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\user;
use App\Post;
use App\Content;


class PostController extends Controller
{

	public function createPost($gid){
		$group = Group::findOrFail( $gid );
		$user= User::findOrFail($group->user_id);
		return view('posts.createPost',compact('group','user'));

	}

	public function allPosts($gid)
	{
		$posts = Post::where('group_id', $gid)->orderBy('created_at','desc')->get();
		$group =Group::findOrFail($gid);
		$user= User::findOrFail($group->user_id);
		return view('posts.allPosts',compact('group','posts','user'));
	}
	public function storePost(Request $request , $gid)
      {
     	$file= $request->file('file');
     	$post=Post::create(['group_id'=> $gid ,'body' => $request->body]);

     	if(!empty($file))
     	{
     	   $content=time().$file->getClientOriginalName();
     	   $post_id=$post->id;
     	   $file->move('postfiles',$content);
     	   Content::create(['content_type_id' => $post_id ,'content' =>$content , 'content_type' =>'P' ]);
     	}


     	 return redirect()->route('id',$gid);  
     	 
      }

      public function edit($gid, $pid)
      {
      
  		  $post=Post::findOrFail($pid);
  		 
  		  $group=Group::findOrFail($gid);
        $user=$group->user;
        
        
  		  return view('posts.editPost',compact('post','user','group'));

      }
    
}
