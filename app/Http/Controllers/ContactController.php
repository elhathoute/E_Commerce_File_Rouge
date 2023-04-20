<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use Mail;
class  ContactController extends Controller
{
     public function contact(){
        return view('e-commerce.contact');
     }

    //
    public function sendEmail(Request $request){

        // $details=[
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'phone'=>$request->telephone,
        //     'subject'=>$request->subject,
        //     'message'=>$request->message
        // ];

        Mail::to('azizeelhathoute.2016@gmail.com')->send(new ContactMail($request));

        return back()->with('message_sent','Thanks Your message has been send with sucess');

    }
}
