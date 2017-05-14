<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\user;

class PostController extends Controller
{

	public function createPost($gid){
		$group = Group::findOrFail( $gid );
		$user= User::findOrFail($group->user_id);
		return view('posts.createPost',compact('group','user'));

	}
	// public function storePost(Request $request)
 //      {
     
 //      }
    
}
