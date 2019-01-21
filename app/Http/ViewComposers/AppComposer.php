<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\trickNames;
use DB;

//View Composer Called on Every Request
//Grabs side bar tricks

class AppComposer {

    public function compose(View $view) {

        //Gets tricks array of all trick to put in sidebar
        $tricks = trickNames::orderBy('trickName')->get();

        $url = "/tricks";

        $returnArray = $this->arrangeTrickArray($url, $tricks);
       
        $view->with('beginnerTricks', $returnArray [0]);
        $view->with('advancedTricks', $returnArray [1]);
        
    }


     //Arranges beginner and advanced trick arrays
    private function arrangeTrickArray($url, $tricks) {

        $beginnerArray = [];
        $advancedArray = [];
        $tempArray = [];
       
        foreach($tricks as $trick) {
            //Adds dash to trick name for the url
            $trickNameDash = strtolower(str_replace(" ", "-", $trick->trickName)); 
            //Appends trick name to url
            $trick->url = "$url/$trickNameDash";

            //Temp array
            $tempArray["trickName"] = $trick->trickName;
            $tempArray["url"] = $trick->url;
            $tempArray["order"] = $trick->order;
          
            if ($trick->trick_difficulty == 1) {
                $beginnerArray[] = $tempArray; 
            }else {
                $advancedArray[] = $tempArray;
            }
        
        }


      
      $beginnerArray =  $this->makeBeginnerOrder($beginnerArray);
    
        $returnArray = [$beginnerArray, $advancedArray];
        return $returnArray;

    }

      //sorts beginner tricks by order
    private function makeBeginnerOrder($beginnerArray) {
      
        uasort($beginnerArray, function($a, $b){
            return ($a["order"] < $b["order"]) ? -1 : 1;
          
        });

        return $beginnerArray;
    }



}