<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request , $gid , $pid, $type)
    {
        $rules=[
         'body' =>'required'
        ];
         $this->validate($request,$rules);
    	 $body=$request->body;
    	 $user_id=Auth::user()->id;
    	 $status=Comment::create([

    	 	'group_id'    => $gid,
    	 	'post_id'     => $pid,
    	 	'user_id'	  => $user_id,
    	 	'comment'     => $body
    	 	]);
    	 
    	 if($status && $type=='P')
    	 {
    	 	return redirect()->route('allPosts',$gid);
    	 }
    	 else if($status && $type=='L')
    	 {
    	 	return redirect()->route('allLectures',$gid);
    	 }
    	 else
    	 	return redirect()->route('id',$gid);
    }



    public function test1($id)
    {
       return view('blank');
    }
    public function test2(Request $request)
    {
        $rules= [
            'name' => 'required|min:5'
        ];

        $this->validate($request,$rules);

        return "Ok";
    }
}
