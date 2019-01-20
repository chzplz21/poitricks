<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\contact;



class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        //echo '<pre>' . var_export($request, true) . '</pre>';
       
      $validator =  $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'msg' => 'required'
        ]);

        return view('thank-you');

        Mail::to("drothhello@gmail.com")->send(new ContactEmail($request));
    

        // Mail delivery logic goes here

       // flash('Your message has been sent!')->success();

       // return redirect()->route('contact');

      
       
    }
}
