<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request , $gid , $pid, $type)
    {

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
}
