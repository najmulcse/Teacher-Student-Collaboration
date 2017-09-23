<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\GroupMember;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Hash;
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

    //password changed //

    public function changedPassword()
    {
        $user = Auth::user();

        return view('users.changedPassword',compact('user'));
    }
    public function storePassword(Request $request )
    {
        $rules = [
        'current_password'   => 'required',
        'password'           => 'required|min:6|confirmed'
        ];
         $this->validate($request, $rules);
        $current_password = ( $request->current_password);
        $user_id          = Auth::id();
        $db_password      = User::findOrFail($user_id)->password;
        if(Hash::check( $current_password,$db_password))
        {
            User::findOrFail($user_id)
                    ->update(['password' =>bcrypt($request->password)

                    ]);
            $msg = "Password Successfully Changed";
            $status = 1;
        }else
        {
            $msg = "Current password does not matched";
            $status = 0;
        }

       

        return back()->with('msg',$msg)
                     ->with('status',$status);
    }

    public function addPhoto()
    {
        return view('users.addPhoto');
    }

    public function storePhoto(Request $request)
    {

        $rules = [
        'photo'  =>'required '
        ];
        $status = 0;
        $msg = "";
        $this->validate($request ,$rules);
        $file     = $request->file('photo');
        $user     = User::findOrFail(Auth::id());
        $db_photo = $user->photo;
        if(!empty($file)){
        
        $name    = $file->getClientOriginalName();
        $userUpdate    = User::findOrFail($user->id)
                            ->update(['photo' =>$name]);

        
        }
        if($userUpdate)
        {
            if(!empty($db_photo)){
                unlink(public_path('img/'.$user->id));

            }
            $file->move('img',$user->id);
            $msg    = "Photo saved successfully";
            $status = 1;
        }else{
            $msg    = "Something wrong";
            
        }                    
         
        return back()->with('msg',$msg)
                     ->with('status',$status);
    }


//ajax testing---------------
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
