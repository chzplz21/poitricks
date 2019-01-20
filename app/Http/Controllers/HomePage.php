<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trickNames;
use App\trickVideos;

class HomePage extends Controller
{

    public function getStarted()
    {

        //Array of trick videos for Basic Planes on home page
        $trickVideosArray = trickVideos::getTrickVideos(63);
        $trick = "Basic Planes";
        //Removes dash from url string
        
        
        return view('trickVideos', ['trickVideosArray' => $trickVideosArray, 'trickName' => $trick]);
       // return view('index');
       
        
    }
    

}
