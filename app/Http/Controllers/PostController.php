<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\user;
use App\Post;
use App\Content;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

  public function __construct(){

    return $this->middleware('auth');
  }

// Lecture related routing methods are started here 

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
        $file_store=Content::create(['post_id' => $post_id ,'content' =>$content ]);
        $file->move('postfiles',$file_store->id);
     }


      return redirect()->route('allLectures',$gid);  
      

    }


//Post related routing methods are started here 

	public function createPost($gid){
		$group = Group::findOrFail( $gid );
    $user_id=Auth::user()->id;
		$user= User::findOrFail($user_id);
		return view('posts.createPost',compact('group','user'));

	}

	//here posts are stored through storePost method


	public function allPosts($gid)
	{
		$posts = Post::where('group_id', $gid)->where('type','P')->orderBy('created_at','desc')->get();
		$group =Group::findOrFail($gid);
		$user= Auth::user();
    $comments=Comment::where('group_id',$gid)->get();

		return view('posts.allPosts',compact('group','posts','user','comments'));
	}

	public function storePost(Request $request , $gid)
      {
     	$file= $request->file('file');
     // $user=Group::where('id',$gid)->first();
      $user_id=Auth::user()->id;
     	$post=Post::create(['group_id'=> $gid ,'user_id' =>$user_id ,'type'=>'P','body' => $request->body]);

     	if(!empty($file))
     	{
         $post_id=$post->id;
     	   $content=$file->getClientOriginalName();    	   
     	   $content_store=Content::create(['post_id' => $post_id ,'content' =>$content ]);
         $file->move('postfiles',$content_store->id);
     	}



     	 return redirect()->route('allPosts',$gid);  

     	 
      }


// Posts and lectures both are edit ,update,deletable in these methods . 
      public function edit($gid,$type, $pid)
      {
      
  		  $post = Post::findOrFail($pid); 		 
  		  $group = Group::findOrFail($gid);
        $user = $group->user;   
        if($type=='P')
        {        
  		      return view('posts.editPost',compact('post','user','group'));
        }
        else if($type='L')
        {
            return view('lectures.editLecture',compact('post','user','group'));
        }

      }
      
      public function update(Request $request , $gid ,$type, $pid)
      {
        $file= $request->file('file');
        
        if($type=='P')
        {
        Post::findOrFail($pid)->update(['body' => $request->body]);
        }
        else if($type=='L')
        {
          Post::findOrFail($pid)->update(['body' => $request->body, 'title'=>$request->title]);
        }

            if(!empty($file))
            {
               $file_Exists=Content::where('post_id',$pid)->first();
               $content=$file->getClientOriginalName();
                   if($file_Exists)
                   {
                      $db_file=$file_Exists->id;                  
                      unlink(public_path('postfiles/'.$db_file));                  
                      $file_store=Content::where('post_id',$pid)->update(['content' =>$content ]);
                      $file->move('postfiles/',$db_file);
                   }
                   else
                   {
                      $file_store=Content::create(['post_id' =>$pid,'content' =>$content]);
                      $file->move('postfiles/',$file_store->id);
                   }
                 
            }

                if($type=='P')
                {
                 return redirect()->route('allPosts',$gid); 
                }
                else if($type=='L')
                {
                  return redirect()->route('allLectures',$gid); 
                }
      }

      public function delete($gid , $pid)
      {

        $post=Post::findOrFail($pid)->delete();
        $content=Content::where('post_id',$pid)->first();
        if($content){
          $file=$content->id;
          unlink(public_path('postfiles/'.$file));
          $content->delete();
         
        }
         return back();

      }


//Posts and lectures contents can download by this method 

      public function download($fileid)
      {
            $content=Content::where('id',$fileid)->first();
            $name=$content->content;
            $file_path = public_path('postfiles/').$fileid;
            return response()->download($file_path,$name);
      }
    
}
