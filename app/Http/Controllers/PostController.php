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
  public function __construct(){

    return $this->middleware('auth');
  }

	public function createPost($gid){
		$group = Group::findOrFail( $gid );
		$user= User::findOrFail($group->user_id);
		return view('posts.createPost',compact('group','user'));

	}

	public function allPosts($gid)
	{
		$posts = Post::where('group_id', $gid)->where('type','P')->orderBy('created_at','desc')->get();
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
         $post_id=$post->id;
     	   $content=$post_id.$file->getClientOriginalName();    	   
     	   $file->move('postfiles',$content);
     	   Content::create(['post_id' => $post_id ,'content' =>$content ]);
     	}


     	 return redirect()->route('allPosts',$gid);  
     	 
      }

      public function edit($gid, $pid)
      {
      
  		  $post = Post::findOrFail($pid);
  		 
  		  $group = Group::findOrFail($gid);
        $user = $group->user;           
  		  return view('posts.editPost',compact('post','user','group'));

      }
      public function update(Request $request , $gid , $pid)
      {
        $file= $request->file('file');
        Post::findOrFail($pid)->update(['body' => $request->body]);

          if(!empty($file))
          {
             $content=time().$file->getClientOriginalName();
             $file->move('postfiles',$content);
             Content::where('content_type_id',$pid)->update(['content' =>$content ]);
          }


           return redirect()->route('allPosts',$gid); 
      }
    
}
