<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Group;
use App\GroupMember;
use App\Post;
use App\Comment;
use App\Assignment;

use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
    $this->middleware('group');
	}



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

    //All groups are shown of user home page 
   public function index($gid){
      
      $check = $this->checkUsers($gid);
      if($check == "accepted")
      {   $group = Group::findOrFail($gid);
          $lec_posts = Post::where('group_id',$gid)->orderBy('created_at','desc')->get();
          $user = User::findOrFail(Auth::user()->id);
          $comments=Comment::where('group_id',$gid)->get();
          return view('groups.index',compact('group','user','lec_posts','comments'));
      }else
      {
         return redirect()->route('home');
      }

      
    }

    //Group editing view is called by this method 
    public function edit($gid)
    {
    $id=Auth::id();
    $group= Group::findOrFail($gid);
      if($group->user_id == $id)
       {
        return view('groups.edit',compact('group'));
       }
       else{
        return redirect()->route('home');
       }
    }

    //Group creation view is called by this method
    public function create()
    {
    	return view('groups.create');
    }

      //Users will able to edit their groups by this method
    public function update(Request $request,$id){

           $rules=[
           'group_name'    => 'required',
           'group_code'    => 'required'
           ]; 

           $v=$this->validate($request,$rules);
           $group_code=$request->group_code;
           $group=Group::findOrFail($id);
          if (Group::where('group_code', '=', $group_code)->exists() && $group_code !=$group->group_code) {
             $msg= "Group code already existed ! Try another one.";
             return back()->with('message',$msg);
            }
       
        Group::findOrFail($id)->update([
          'group_name'        => $request->group_name,
          'group_code'        => $group_code ,
          'course_code'       => $request->course_code,
          'session'           => $request->session,
          'short_description' => $request->short_description
          ]);
         return redirect('/home');
    }

    //Group deleted method
    public function delete($gid)
    {
      $check = $this->checkUsers($gid);
      if($check == "accepted"){
        Group::findOrFail($gid)->delete();
        GroupMember::where('group_id',$gid)->delete();
        $posts      = Post::where('group_id',$gid)->get();
        Post::where('group_id',$gid)->delete();
        // foreach($posts as $post){

        // $assignment= Assignment::where('post_id',$post->id)->delete();
        // $content   =Content::where('post_id',$post->id)->delete();
        // if($content){
        //         $file=$content->id;
        //         unlink(public_path('postfiles/'.$file));
        //         $content->delete();
        //         }
        // }
        $commnets  =Comment::where('group_id',$gid)->delete();
              
      }
      return redirect('/home');
    }

    //User can create any group by this store method
    public function store(Request $request){

/* I want to write the code like this  */

        $rules =[
        'group_name'    => 'required' ,
        'group_code'    => 'required' ,
        // 'course_code'   =>'required' ,

        ];

        $this->validate($request,$rules);
        $group_code=$request->group_code;
        if (Group::where('group_code', '=', $group_code)->exists()) {
            $msg= "Group code already exists ! Try another one.";
            return back()->with('status', $msg)->withInput();
       }else{
            $rq=$request->user()->myGroups()->create(['group_name'=>$request->group_name, 'group_code' => $request->group_code , 'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);
       
        return redirect()->route( 'id' , [$rq->id ]);
        }

    	
      }
        //In a group ,teachers can see a view to uploading a lecture by this method 

      // public function createLecture( $groupid ){
        
      //   $group= Group::findOrFail( $groupid );
      //   $user= User::findOrFail($group->user_id);
      //   return view('groups.createLecture',compact('group','user'));
      // }


      //unused yet now
      

      //For joning a group , a form view will be seen a user by this method
      public function joinGroup()
      {
        return view('groups.joinGroup');
      }

      //Here joining group will check which the searching group exists or not , also check  the requested user is group admin or not.  
      public function checkGroupForJoining(Request $request)
      {
           $rules=[
                 'group_code'     => 'required'
                  ];

           $this->validate($request, $rules);

           $rq_code=$request->group_code;
           $group=Group::where('group_code',$rq_code)
                        ->first();

           if($group)
              {
                     $group_id = $group->id;
                     $group_owner_id = $group->user_id;
                     $groupMember = new GroupMember;
                     $user_id = Auth::user()->id;
                     $check = GroupMember::where('user_id',$user_id)
                                          ->where('group_id',$group_id)
                                          ->first();
                     if($check || $group_owner_id == $user_id)
                       {
                          $msg = "Already you are a member of this group!"; 
                       }
                      else
                      {
                           $groupMember->user_id = $user_id ;
                           $groupMember->group_id = $group_id;
                           $groupMember->save();
                           $msg = "Successfully joined";
                           return redirect('/home')->with('status',$msg);
                       }
            }
          else
          {
            $msg = "Group not found";
          }

           return redirect('/joinGroup')->with('status', $msg);
     }



      //for leaving from a group 

     public function leftGroup($gid, $mid){

          $group = GroupMember::where('group_id',$gid)
                             ->where('user_id',$mid)     
                             ->delete();
          $post = Post::where('group_id',$gid)
                     ->where('user_id',$mid)
                     ->delete(); 
          $comment = Comment::where('group_id',$gid)
                           ->where('user_id',$mid)
                           ->delete();  


          return back();
     }
       
      
}

