<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Content;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

      //In a group ,teachers can see a view to uploading a lecture by this method 

   



    
}
