<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\trickNames;
use DB;

//View Composer Called on Every Request

class AppComposer {

    public function compose(View $view) {

    
        //Gets tricks array of all trick to put in sidebar
        $tricks = trickNames::orderBy('trickName')->get();

    
        //Gets incoming path
        $url = $_SERVER["REQUEST_URI"];

        //Removes last part, ie. trick name
        $url = explode("/", $url);
        array_pop($url);

        if (in_array("tricks", $url)) {
            $url = implode("/", $url);
            //Glues together the host name with the rest of the path
            $url = 'http://' . $_SERVER["HTTP_HOST"] . $url;

        }else {
            $url = implode("/", $url);
            //Glues together the host name with the rest of the path
            $url = 'http://' . $_SERVER["HTTP_HOST"] . $url . "/tricks";

        }

      //  echo '<pre>' . var_export($url, true) . '</pre>';

        //Arranges beginner and advanced trick arrays
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

    
       

/*
        $order = array(
            "Wall Plane Flowers",
            "Triquetra vs. Extension (Mercedes)",
            "Crossers",
            "Archer Weaves",
            "Buzzsaw",
            "Body Tracing Hybrid",
            "Snakes",
            "CAP",
            "Isolation",
            "Air Wraps",
            "Meltdown",
            "Triquetra vs. Static Spin",
            "Tosses",
            "Hyperloops",
            "Zan's Diamond"
        );

        
        $newArray = [];

        
        $i = 1;
        foreach ($order as $orderTrick) {
            foreach ($beginnerArray as $array) {
                if ($array["trickName"] == $orderTrick) {
                   trickNames::makeOrder($array["trickName"], $i);
                    $newArray[] = $array;
                    $i++;
                }
            }

        }
        
        //echo '<pre>' . var_export($newArray, true) . '</pre>';
        
        return $newArray;

        */
        
   




}