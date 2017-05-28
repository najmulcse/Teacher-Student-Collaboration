<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use EmailValidator;
class EmailController extends Controller
{
    public function emailCreate()
    {
    	return view('emails.emailCreate');
    }

    public function send(Request $request)
    {
                $rules=[
                    'email' =>'required'
                ];

                $this->validate($request,$rules);
    	        $email=$request->email;


                if( EmailValidator::verify($email)->isValid()[0] ){

                            $title = " Group Membership ";
                            $content = "Testing";
                              
                           $m= Mail::send('emails.test', ['title' => $title, 'content' => $content], function ($message) use ($email)
                            {

                                $message->from('najmul.ru.cse@gmail.com', 'Najmul Ahmed');

                                $message->to($email,'')->subject('Group Membership');

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
