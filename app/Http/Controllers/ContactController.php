<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Input;
use Validator;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {

    	$validation_rules = array(

     'name' => 'required',
    'email' => 'required|email',
    'subject' => 'required',
    'message' => 'required',
                           

      );

    $validator = Validator::make(Input::all(), $validation_rules);

     // Return back to form w/ validation errors & session data as input

     if($validator->fails()) {

     
        return $validator->messages();
    }
    	 \Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'user_message' => $request->get('message')

        ), function($message)
    {
    	 $subject=Input::get('subject');
    	 $from=Input::get('email');
    	 $name=Input::get('name');
        $message->from($from,$name);
        $message->to('okoaorg@yahoo.com', 'Wafutech')->subject($subject);
    });

    	return response()->json('Message Send');
    }
}
