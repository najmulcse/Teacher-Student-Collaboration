<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;
class GroupController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

   public function index($id){

      $group = Group::findOrFail($id);
      $user=User::findOrFail($group->user_id);
   		return view('groups.index',compact('group','user'));
    }
    public function edit($id)
    {

    $group= Group::findOrFail($id);
     //return $group=user()->groups()->get();
      return view('groups.edit',compact('group'));
    }
    public function create()
    {
    	return view('groups.create');
    }

    public function update(Request $request,$id){
         Group::findOrFail($id)->update(['group_name'=>$request->group_name,'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);
        return redirect('/home');
    }

    public function delete($id)
    {
      Group::findOrFail($id)->delete();
      return redirect('/home');
    }
    public function store(Request $request){

/* I want to write the code like this  */
 
       $rq=$request->user()->groups()->create(['group_name'=>$request->group_name,'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);
        return redirect()->route( 'id' , [$rq->id ]);


    	
      }


      public function createPost( $groupid ){
        
        $group= Group::findOrFail( $groupid );
        return view('groups.createPost',compact('group'));
      }

      public function storePost(Request $request)
      {

      }




}

