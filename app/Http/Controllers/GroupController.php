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
    public function create()
    {
    	return view('groups.create');
    }

    public function add(Request $request){
    		 $admin=Auth::user()->id;
  		 	  Group::create(['group_name'=>$request->group_name,'group_admin'=>$admin,'course_code'=>$request->course_code,'session'=>$request->session,'short_description'=>$request->short_description]);  
  		 
  		  return redirect('/group');
    	
      }




}

