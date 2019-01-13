<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class trickVideos extends Model
{
    //Gets ID Of trick
    public static function getTrickID($trickName) {

        $id = DB::table('trick_names')->where('trickName', $trickName)->value('id');
        return $id;
       
     }

  //Returns array of trick videos based on id of trick
   public static function getTrickVideos($trickID) {
    
      $trickVideos = DB::select('select * from trick_videos where trick_name_id  = :id', ['id' => $trickID]);
      return $trickVideos;

   }
}
