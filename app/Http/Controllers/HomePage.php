<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trickNames;

class HomePage extends Controller
{

    public function getStarted()
    {
        return view('index');
       
        
    }
    

}
