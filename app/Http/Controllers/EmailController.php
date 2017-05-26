<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

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
    	        $title = " Group Membership ";
    	        $content = "Testing";

    	        Mail::send('emails.emailCreate', ['title' => $title, 'content' => $content], function ($message) use ($email)
    	        {

    	            $message->from('najmul2022@gmail.com', 'najmul');

    	            $message->to($email);

    	        });

    	       return "Invitation sent successfully";
    }
}
