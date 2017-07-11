<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Student;
class MyLogController extends Controller
{
	protected $redirectTo = '/home';
    protected $redirectAfterLogout='/login';
    
    // public function __construct()
    // {
    // 	$this->middleware('auth');
    // }
    public function registerTeacher()
    {
        if(Auth::check())
        {
            return redirect('/home');
        }
    	return view('auth.registerTeacher');
    }

    public function storeTeacherInfo(Request $request)
    {
    	$rules =[
    	    'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
    	];
    	$this->validate($request,$rules);

    	$user = User::create([
    	            'name'         => $request->name,
    	            'email'        => $request->email,
    	            'password'     => bcrypt($request->password),
    	            'user_type_id' =>$request->user_type_id         
    	               ]);
    	Auth::login($user);
    	return redirect('/login');
    }


    public function registerStudent()
    {
        if(Auth::check())
        {
            return redirect('/home');
        }
        return view('auth.registerStudent');
    }

    public function storeStudentInfo(Request $request)
    {
        $rules =[
            'name'      => 'required|max:255',
            'roll'      => 'required | numeric ',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        ];
        $this->validate($request,$rules);

        $user = User::create([
                    'name'         => $request->name,
                    'email'        => $request->email,
                    'password'     => bcrypt($request->password),
                    'user_type_id' =>$request->user_type_id         
                       ]);
        Student::create([
                'roll'     =>$request->roll,
                'user_id'  =>$user->id
                    ]);

        Auth::login($user);
        return redirect('/login');
    }
}
