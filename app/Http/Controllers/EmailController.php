<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Group;
use App\User;
use App\Http\Requests;
use EmailValidator;
use Illuminate\Support\Facades\Auth;
class EmailController extends Controller
{
    public function emailCreate($gid)
    {
        $group= Group::findOrFail( $gid );
        $user= User::findOrFail($group->user_id);
        return view('emails.emailCreate',compact('group','user'));
    	
    }

    public function send(Request $request)
    {
                $rules=[
                    'email' =>'required'
                ];

                $this->validate($request,$rules);
    	        $email=$request->email;
                $gid=$request->gid;
                $group= Group::findOrFail( $gid );

                if( EmailValidator::verify($email)->isValid()[0] ){

                            $name=Auth::user()->name;
                            $group_code=$group->group_code;  
                            $m= Mail::send('emails.emailContent', ['name' => $name, 'group_code' => $group_code], function ($message) use ($email)
                            {

                                $message->from('najmul.ru.cse@gmail.com', 'Collaboration Group');

                                $message->to($email,'abc')->subject('Group Membership');

                            });

                           if($m){       
                           return back()->with('message','Invitation sent successfully.');
                             }
                             else 
                             {
                               return back()->with('message','Something wrong!.');
                             }
                }
                else
                {
                    return back()->with('message','Email ID is not valid');
                }
                // return  strlen($email);
    	        
    }
}
