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
	//Creating post form will show...

	public function createPost($gid){
		$group = Group::findOrFail( $gid );
		$user= User::findOrFail($group->user_id);
		return view('posts.createPost',compact('group','user'));

	}
	//here posts are stored through storePost method
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


     	 return redirect()->route('id',$gid);  // Redirect to group home page
     	 
      }
    
}
