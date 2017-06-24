<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\GroupMember;
use App\User;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //After login , user dirrectly entered into the home page and its a special case for viewing the home page contents which is related the GroupController.
    public function index()
    {
        
         $user_id=Auth::user()->id;
         $joinedGroups=User::findOrFail($user_id)->joinedGroups;
         $countJ=count($joinedGroups);
         $myGroups=User::findOrFail($user_id)->myGroups;        
         $countM=count($myGroups);

         return view('home',compact('joinedGroups','myGroups','countJ','countM','user_id'));
    }






    //-------------------------------------------//





    public function myform()
    {
        $posts =Post::all();
        return view('test',compact('posts'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $post =Post::find($id)->first();
        return json_encode($post);
    }
}
