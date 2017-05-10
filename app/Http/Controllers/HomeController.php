<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\GroupMember;
use App\User;
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
        

          // $member=GroupMember::with(['user','groups'])->first();
          // $member->user->name;
         $user_id=Auth::user()->id;

        //  $user= User::find(3);
        // return  $user->groups;
         $groups=Group::all()->where('user_id',$user_id);
         
         $count=count($groups);
         return view('home',compact('groups','count'));
    }
}
