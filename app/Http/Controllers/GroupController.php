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

   public function index(){
   		return view('groups.index');
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
 
       $request->user()->groups()->create(['group_name'=>$request->group_name,'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);
        return redirect('/group');


    	
      }




}

