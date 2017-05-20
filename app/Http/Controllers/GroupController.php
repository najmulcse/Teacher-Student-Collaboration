<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Group;
use App\GroupMember;
use App\Post;
use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    //All groups are shown of user home page 
   public function index($id){

      $group = Group::findOrFail($id);
      $lec_posts = Post::where('group_id',$id)->orderBy('created_at','desc')->get();
      $user = User::findOrFail(Auth::user()->id);

   		return view('groups.index',compact('group','user','lec_posts'));
    }

    //Group editing view is called by this method 
    public function edit($id)
    {

    $group= Group::findOrFail($id);
     //return $group=user()->groups()->get();
      return view('groups.edit',compact('group'));
    }

    //Group creation view is called by this method
    public function create()
    {
    	return view('groups.create');
    }

      //Users will able to edit their groups by this method
    public function update(Request $request,$id){
         Group::findOrFail($id)->update(['group_name'=>$request->group_name,'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);
        return redirect('/home');
    }

    //Group deleted method
    public function delete($id)
    {
      Group::findOrFail($id)->delete();
      GroupMember::where('group_id',$id)->delete();
      return redirect('/home');
    }

    //User can create any group by this store method
    public function store(Request $request){

/* I want to write the code like this  */
        $group_code=$request->group_code;
        if (Group::where('group_code', '=', $group_code)->exists()) {
           $msg= "Group code already exists ! Try another one.";
            return redirect('/create')->with('status', $msg);
       }else
         $rq=$request->user()->myGroups()->create(['group_name'=>$request->group_name, 'group_code' => $request->group_code , 'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);

        return redirect()->route( 'id' , [$rq->id ]);


    	
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
           $rq_code=$request->group_code;
           $group=Group::where('group_code',$rq_code)->first();

           if($group)
              {
                     $group_id = $group->id;
                     $group_owner_id = $group->user_id;
                     $groupMember = new GroupMember;
                     $user_id = Auth::user()->id;
                     $check = GroupMember::where('user_id',$user_id)->where('group_id',$group_id)->first();
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

       
      
}

