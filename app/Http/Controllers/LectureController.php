<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lecture;
use App\Content;
use App\Group;
class LectureController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    //Here all lectures will be stored in the individual group 
    
    public function storeLecture(Request $request , $gid){

     $file= $request->file('file');
     $lecture=Lecture::create(['group_id'=> $gid ,'lecture_title' => $request->lecture_title ,'body' => $request->body]);

     if(!empty($file))
     {
        $content=time().$file->getClientOriginalName();
        $lecture_id=$lecture->id;
        $file->move('lecturefiles',$content);
        Content::create(['content_type_id' => $lecture_id ,'content' =>$content , 'content_type' =>'L' ]);
     }


      return redirect()->route('id',$gid);  
      

    }
}
