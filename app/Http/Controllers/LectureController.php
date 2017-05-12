<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lecture;
use App\Content;
class LectureController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    //Here all lectures will be stored in the individual group 
    
    public function storeLecture(Request $request , $gid){

    	$reql=Lecture::create(['lecture_title' =>$request->lecture_title ,'group_id' =>$gid]);
    	$lecture_id=$reql->id;
    	$reqC=Content::create(['body' => $request->body , 'content'=> $request->file, 'lecture_or_assignment_id' =>$lecture_id,'content_type' => 'L']);
    	// $reqC=$request->group()->lectures()->create(['lecture_title' => $request->lecture_title]);
    	if($reql && $reqC)
    	{
    		return redirect()->route('id',$gid);
    	}
    	else
    		return back(); //here error message need to include when the data storing is failed.

    }
}
