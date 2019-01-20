<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function about() {
        return view('about');
    }
    public function contact() {
        return view('contact');
    }
    public function thankYou() {
        return view('thank-you');
    }
}
