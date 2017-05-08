<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\GroupMember;
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
    public function index(Group $group)
    {
         $user_id=Auth::user()->id;
         $groups=Group::all()->where('user_id',$user_id);
         $joinGroups=GroupMember::all()->where('user_id',$user_id);
         $count=count($groups);
         return view('home',compact('groups','count'));
    }
}
