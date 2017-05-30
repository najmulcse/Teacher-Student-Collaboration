<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\user;
use App\Post;
use App\Content;
use App\Comment;
use App\Assignment;
use App\Http\Requests\PostsFormRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Session\Middleware\StartSession;

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
       $lectures = Post::where('group_id', $gid)
                        ->where('type','L')
                        ->orderBy('created_at','desc')
                        ->get();

       $user=User::findOrFail(Auth::user()->id);
       if($user->user_type_id=='2')
            return redirect('/pagenotfound');
       $comments=Comment::where('group_id',$gid)->get();
       return view('lectures.allLectures',compact('group','user','lectures','comments'));
     }


    //Here all lectures will be stored in the individual group 
    
    public function storeLecture(Request $request ){

      $rules=[

          'lecture_title'  => 'required ',
          'body'           => 'required',
          'file'           => 'required'
           ];
     $gid=$request->gid;
     $this->validate($request,$rules);
     
     $file= $request->file('file');
     $user_id = Auth::user()->id;
     $post=Post::create([
          'group_id'  => $gid ,
          'user_id'   => $user_id , 
          'title'     => $request->lecture_title ,
          'body'      => $request->body,
          'type'      => 'L'
                      ]);

     if(!empty($file))
     {
        $content=time().$file->getClientOriginalName();
        $post_id=$post->id;
        $file_store=Content::create([
                    'post_id' => $post_id ,
                    'content' =>$content 
                                   ]);

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
		$posts = Post::where('group_id', $gid)
                  ->where('type','P')
                  ->orderBy('created_at','desc')
                  ->get();

		$group =Group::findOrFail($gid);
		$user= Auth::user();
    $comments=Comment::where('group_id',$gid)->get();

		return view('posts.allPosts',compact('group','posts','user','comments'));
	}

	public function storePost(PostsFormRequest $request, $gid)
      {

       $rules = [
              'body'    => 'bail|required'
                ]; 
      $this->validate($request,$rules);
             
     	$file= $request->file('file');
     // $user=Group::where('id',$gid)->first();
      $user_id=Auth::user()->id;
     	$post=Post::create([
                'group_id'  => $gid ,
                'user_id'   =>$user_id ,
                'type'      =>'P',
                'body'      => $request->body
                        ]);

     	if(!empty($file))
     	{
         $post_id=$post->id;
     	   $content=$file->getClientOriginalName();    	   
     	   $content_store=Content::create([
                  'post_id' => $post_id ,
                  'content' =>$content 
                  ]);
         $file->move('postfiles',$content_store->id);
     	}



     	 return redirect()->route('allPosts',$gid);  

     	 
      }


          public function allAssignments($gid)
          {
            $assignments = Post::where('group_id', $gid)
                          ->where('type','A')
                          ->orderBy('created_at','desc')
                          ->get();

            $group =Group::findOrFail($gid);
            $user= Auth::user();

            return view('assignments.allAssignments',compact('group','assignments','user'));
          }

        public function createAssignment($gid){

          $group = Group::findOrFail( $gid );
          $user_id=Auth::user()->id;
          $user= User::findOrFail($user_id);
          return view('assignments.createAssignment',compact('group','user'));

        }

        //Assignment store method 
        public function storeAssignment(Request $request, $gid)
            {

             $rules = [
                    'assignment_title'     => 'required',
                    'last_date' => 'required'
                      ]; 
            $this->validate($request,$rules);
                   
            $file= $request->file('file');
           // $user=Group::where('id',$gid)->first();
            $user_id=Auth::user()->id;
            $post=Post::create([
                      'group_id'  => $gid ,
                      'user_id'   => $user_id ,
                      'type'      =>'A',
                      'title'     => $request->assignment_title,
                      'body'      => $request->body
                              ]);
            $post_id=$post->id;
            $assignment=Assignment::create([
                      'post_id'          => $post_id,
                      'last_submit_date' => $request->last_date 
                          ]);

            if(!empty($file))
            {
               
               $content=$file->getClientOriginalName();        
               $content_store=Content::create([
                        'post_id' => $post_id ,
                        'content' =>$content 
                        ]);
               $file->move('postfiles',$content_store->id);
            }



             return redirect()->route('allAssignments',$gid);  

             
            }



// Posts and lectures both are edit ,update,deletable in these methods . 
      public function edit($gid,$type, $pid)
      {
      
  		  $post  = Post::findOrFail($pid); 		 
  		  $group = Group::findOrFail($gid);
        $date  = Assignment::where('post_id',$pid)->get();
       // return $post->assignments;
        $user = $group->user;   
        if($type=='P')
        {        
  		      return view('posts.editPost',compact('post','user','group'));
        }
        else if($type=='L')
        {
            return view('lectures.editLecture',compact('post','user','group'));
        }
        else if($type=='A')
        {
            
            return view('assignments.editAssignment',compact('post','user','group','date'));
        }

      }
      
      public function update(Request $request , $gid ,$type, $pid)
      {
        // $rules1=
        // [
        //   'assignment_title'  => 'required' ,
        //   'last_date'         => 'required'
        // ];

        // $rules2=
        // [
        //   'body'   => 'required'
        // ];
        // if($type=='A')
        //   {
        //     $v=Validator::make([$request,$rules1]);
        //     if($v->fails())
        //     {
        //       return back()->withInput();
        //     }
        //   }
        //  else if($type =='P')
        //  {
        //   $this->validate($request,$rules2);
        //  } 

        $file= $request->file('file');
        
        if($type=='P')
        {
        Post::findOrFail($pid)->update(['body' => $request->body]);
        }
        else if($type=='L')
        {
          Post::findOrFail($pid)->update([
              'body'   => $request->body,
              'title'  => $request->title
              ]);
        }
        else if($type=='A')
        {
          Post::findOrFail($pid)->update([
              'body'   => $request->body,
              'title'  => $request->title
              ]);
          Assignment::where('post_id',$pid)->update([
                'last_submit_date' =>$request->last_date
                ]);
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
                else if($type=='A')
                {
                  return redirect()->route('allAssignments',$gid); 
                }
      }
//Assignment,post, lecture deletion method 
      public function delete($gid , $pid)
      {

        $post=Post::findOrFail($pid)->delete();
        $assignment=Assignment::where('post_id',$pid)->delete();
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
