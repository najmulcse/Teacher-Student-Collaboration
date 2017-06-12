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
use App\Student;
use App\Upload;
use App\GroupMember;
use App\Http\Requests\PostsFormRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\GroupController;

class PostController extends Controller
{

  public function __construct(){

    return $this->middleware('auth');
  }

// User accessing groups can be checked by this method
public function checkUsers($gid){
       $id=Auth::id();
       $group = Group::findOrFail($gid);
       $member=GroupMember::where('group_id',$gid)->where('user_id',$id)->first();
          if($group->user_id == $id || $member)
          {
            return "accepted";
          }
          else{
            return "rejected";
          }

    }

    public function checkPostsAccessing($gid ,$pid,$type)
    {

      
          $post = Post::where('id',$pid)
                      ->where('user_id',Auth::id())
                      ->where('group_id',$gid)
                      ->where('type',$type)
                      ->first();
          if($post)
          {
            return "accepted";
          }
          else
          {
            return "rejected" ;
          }
      

    }

// Lecture related routing methods are started here 

 public function createLecture( $gid ){
      $check = $this->checkUsers($gid);
      if($check == "accepted"){
          $group= Group::findOrFail( $gid );
          $user= User::findOrFail($group->user_id);
          return view('lectures.createLecture',compact('group','user'));
        }else{
           return redirect()->route('home');
        }
    }


    public function allLectures($gid){

       $check = $this->checkUsers($gid);
       if($check == "accepted"){
           $group = Group::findOrFail($gid);
           $lectures = Post::where('group_id', $gid)
                            ->where('type','L')
                            ->orderBy('created_at','desc')
                            ->get();

           $user=User::findOrFail(Auth::user()->id);
           $comments=Comment::where('group_id',$gid)->get();
           return view('lectures.allLectures',compact('group','user','lectures','comments'));
          }
         else{
              return redirect()->route('home');
            }
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

        $check = $this->checkUsers($gid);
        if($check == "accepted"){
        		$group = Group::findOrFail( $gid );
            $user_id=Auth::user()->id;
        		$user= User::findOrFail($user_id);
        		return view('posts.createPost',compact('group','user'));
          }else{
            return redirect()->route('home');
          }
  	}

	

// View all posts 
	public function allPosts($gid)
	{
    $check = $this->checkUsers($gid);
    if($check == "accepted"){
    		$posts = Post::where('group_id', $gid)
                      ->where('type','P')
                      ->orderBy('created_at','desc')
                      ->get();

    		$group =Group::findOrFail($gid);
    		$user= Auth::user();
        $comments=Comment::where('group_id',$gid)->get();

    		return view('posts.allPosts',compact('group','posts','user','comments'));
	 }else{
        return redirect()->route('home');
   }

  }

//here posts are stored through storePost method

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
            $check = $this->checkUsers($gid);
            if($check == "accepted"){
                $assignments = Post::where('group_id', $gid)
                              ->where('type','A')
                              ->orderBy('created_at','desc')
                              ->get();

                $group =Group::findOrFail($gid);
                $user= Auth::user();

                return view('assignments.allAssignments',compact('group','assignments','user'));
            }
            else{
               return redirect()->route('home');
            }
          }

        public function createAssignment($gid){

          $check = $this->checkUsers($gid);
          if($check == "accepted"){
                $group = Group::findOrFail( $gid );
                $user_id=Auth::user()->id;
                $user= User::findOrFail($user_id);
                return view('assignments.createAssignment',compact('group','user'));
              }
              else{
                return redirect()->route('home');
              }

        }

        //Assignment store method (by teacher)
        public function storeAssignment(Request $request, $gid)
            {

             $rules = [
                    'assignment_title'     => 'required |max:80',
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

    //teacher will see  all assignments which is submitted by students
         public function submittedAssignments($gid)
         {
             $check = $this->checkUsers($gid);
              if($check == "accepted"){
                  $assignments = Post::where('group_id', $gid)
                              ->where('type','A')
                              ->orderBy('created_at','desc')
                              ->get();

                    $group =Group::findOrFail($gid);
                    $user= Auth::user();

                    return view('assignments.submittedAssignments',compact('group','assignments','user'));
                  }
                  else
                  {
                     return redirect()->route('home');
                  }
         }   



// Posts and lectures both are edit ,update,deletable in these methods . 
      public function edit($gid,$type, $pid)
      {
        $check= $this->checkPostsAccessing($gid ,$pid ,$type);
        if($check=="accepted"){
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
        }else{
          return redirect()->route('home');
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
      public function delete($gid , $pid,$type)
      {
        $check= $this->checkPostsAccessing($gid , $pid,$type);
        if($check=="accepted"){
              $post=Post::findOrFail($pid)->delete();
              $assignment=Assignment::where('post_id',$pid)->delete();
              $content=Content::where('post_id',$pid)->first();
              if($content){
                $file=$content->id;
                unlink(public_path('postfiles/'.$file));
                $content->delete();
                }
         
        }else{
              return redirect()->route('home');
        }

         return back();
      }


//Assignment submission by student

      public function submitAssignment($gid,$type,$pid){

        $group = Group::findOrFail( $gid );
        $user_id=Auth::user()->id;
        $user= User::findOrFail($user_id);
        $assignments = Post::where('group_id', $gid)
                      ->where('type','A')
                      ->orderBy('created_at','desc')
                      ->get();
        return view('assignments.submission',compact('group','user','assignments','type','pid'));

      }

      public function assignmentSubmitByStudent(Request $request)
      {
        $rules =[
        'assignment_title'  => 'required',
        'file'  => 'required'
        ];
        $this->validate($request,$rules);
        $file=$request->file('file');
        $gid=$request->gid;
        $post_id=$request->assignment_title;
         if(!empty($file))
            {
               $user_id=Auth::user()->id;
               $link=$file->getClientOriginalName(); 

               if(Upload::where('post_id',$post_id)->where('user_id',$user_id)->exists())
               {
                   $msg="Already assignment is submitted";
               }
               else{  
                      $check=Assignment::where('post_id',$post_id)->first();
                      $last_date=$check->last_submit_date;
                      $date= \Carbon\Carbon::now();
                      $currentDate=$date->toDateTimeString();
                      if( $last_date >= $currentDate)
                      {
                           $link_store=Upload::create([
                                    'post_id'      => $post_id ,
                                    'group_id'     => $gid,
                                    'user_id'      => $user_id,
                                    'link'         => $link 
                                    ]);
                           $check=$file->move('assignments',$link_store->id);

                               if($check && $link_store)
                               {
                                  $msg="Assignment submitted Successfully ";
                               }
                     }
                     else
                     {
                      $msg="This assignment submission date is over";
                     }
               }
            }
         return back()->with('status',$msg);   
      }


//Posts and lectures contents can download by this method 

      public function download($fileid)
      {
            $content=Content::where('id',$fileid)->first();
            $name=$content->content;
            $file_path = public_path('postfiles/').$fileid;
            return response()->download($file_path,$name);
      }

      public function downloadA($fileid)
      {
            $content=Upload::where('id',$fileid)->first();
            $name=$content->link;
            $file_path = public_path('assignments/').$fileid;
            return response()->download($file_path,$name);
      }


      public function ajaxReq(Request $request)
      {
        $id=$request->id;
        return  response()->with('id',$id);
        // return view('assignments.submittedAssignments',compact('pid'));
      }
    
}
