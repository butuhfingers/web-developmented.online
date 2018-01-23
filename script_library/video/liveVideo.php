<?php namespace video;
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 1/21/2017
 * Time: 3:28 PM
 */

require_once ("video.php");

liveVideoTest();

function liveVideoTest(){
    $liveVideo = new LiveVideo();

    $liveVideo->CurrentTimeInSeconds();
}

class LiveVideo{
    protected $date;

    public function __construct(){
        //Get the current date/time
        $this->date = new \DateTime();
    }

    public function CurrentTimeInSeconds(){
        //Get the current timestamp
        $date = $this->date->getTimestamp();

        echo $this->date->format("i");
    }
}



?>