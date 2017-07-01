<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
use App\Post;
use App\Comment;
class AdminController extends Controller
{
    public function __construct(){

    	 $this->middleware('auth');
    	 $this->middleware('isAdmin');
    }


    public function index(){
    	$groups  = Group::all();
    	$assignments   = Post::where('type','A')->get();
    	$posts   = Post::where('type','P')->get();
    	$lectures   = Post::where('type','L')->get();
    	$comments   =Comment::all();
    	return view('admins.index',compact('assignments','posts','lectures','comments'));
    }
    public function allGroups(){
    	$groups = Group::all();
    	return view('admins.groups.allGroups',compact('groups'));
    }

    public function groupPosts(){
    	return view('admins.groups.allPosts');
    }

    public function groupComments(){
    	return view('admins.groups.allComments');
    }
}
