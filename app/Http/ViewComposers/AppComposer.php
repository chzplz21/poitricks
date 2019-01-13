<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\trickNames;

//View Composer Called on Every Request

class AppComposer {

    public function compose(View $view) {

    
        //Gets tricks array of all trick to put in sidebar
        $tricks = trickNames::all();

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

        echo '<pre>' . var_export($url, true) . '</pre>';

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

    //Constructs order of tricks
    private function makeBeginnerOrder($beginnerArray) {

        $order = array(
            "Basic Planes",
            "Timing and Direction",
            "3 Beat Weave",
            "Windmill",
            "Chase The Sun",
            "4 Beat Fountain",
            "Butterfly",
            "Extensions",
            "Flowers (In Spin)",
            "Turning",
            "Pendulum",
            "Stall Chaser"
        );

        
        $newArray = [];

        foreach ($order as $orderTrick) {
            foreach ($beginnerArray as $array) {
                if ($array["trickName"] == $orderTrick) {
                    $newArray[] = $array;
                }
            }

        }
        
        //echo '<pre>' . var_export($newArray, true) . '</pre>';
        
        return $newArray;
        
    }




}