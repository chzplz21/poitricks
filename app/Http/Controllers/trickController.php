<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\trickVideos;

//Class for individual trick page

class trickController extends Controller
{
    public function start($trick) {

     
      $trick = ucwords(str_replace("-", " ", $trick)); 
       
       $trickID = trickVideos::getTrickID($trick);
    

       //Array of trick videos
       $trickVideosArray = trickVideos::getTrickVideos($trickID);
       //Removes dash from url string
       
       
       return view('trickVideos', ['trickVideosArray' => $trickVideosArray, 'trickName' => $trick]);
    }
}


