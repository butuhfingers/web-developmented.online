<?php namespace video;
require_once($_SERVER['DOCUMENT_ROOT'] . "/script_library/debug/debug.php");
use debug\debug;

/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 8/7/2017
 * Time: 6:50 PM
 */




class videoGenerator {
	//Variables
	private $videoDirectory;

	//Functions
	function __construct(){
		//Set some variables
		$this->directory = $_SERVER['DOCUMENT_ROOT'] . "/videos/";
//		debug::Log($this->GetVideoAtTime(time()));
	}

	public function CurrentVideoToShow(): string {
		//Parse it so we only have the video directory portion on not the server root
		$currentVideo = $this->GetVideo($this->VideoSeedGenerator());

//		debug::Log($currentVideo);

		return $currentVideo;
	}

	private function VideoSeedGenerator(): int {
		//Create a new date and time
		$dateTime = new \DateTime();
		//Get the year, month, day, hours, minutes, and second
		$seed = $dateTime->format("His");

		srand(mt_rand());
		$randomNumber = rand();

//		debug::Log("Random numbers: " . $randomNumber);

		return $randomNumber;
	}

	private function GetVideo($seed): string{
		//Scan the diretory for all files in it
		$directoryListing = scandir($this->directory);
		//Generate the random video seed from the amount of the videos in the directory
		$randomVideoSeed = $seed % (sizeof($directoryListing) - 2);
		//Get the video that we selected
		$video = $directoryListing[$randomVideoSeed + 2];

		//If the "video" is a directory we need to explore this one aswell
		if(is_dir($this->directory . $video)){
			$this->directory .=  $video . "/";
			return $this->GetVideo($seed);
		}
		//Return the name of it
		return explode("developmented.online/", $this->directory . $video)[1];
	}

	public function GetVideoDuration($videoPath): int{	//This will return the amount of time in seconds rounded up
		$video =  trim($videoPath);
		$video = explode("videos/", $video)[1];
		$video = "\"/var/www/html/developmented.online/videos/$video\"";
//		echo $video;

		$myString = "ffprobe -show_streams -i $video";
		$shell = shell_exec($myString);
//		debug::Log($shell);
		$explosion = explode("duration=", $shell)[1];
		$explosion = preg_split('/\s+/', trim($explosion))[0];


		return ceil(floatval($explosion));
	}

	//We need to generate the videos from the beginning of time (unix start time)
	//Returns the path to the video
	public function GetVideoAtTime($catalogTimePosition) : string{
		$video = $_SERVER['DOCUMENT_ROOT'] . "/videos/movies/Spirited Away (English).mp4";
		$currentTimeLocation = 0;
		$currentVideo = $this->GetVideo($currentTimeLocation);
		$videoDuration = $this->GetVideoDuration($video);

//		//Generate videos until the time is within the videos time slot range
		while($catalogTimePosition > ($currentTimeLocation)){
//			$currentVideo = $this->GetVideoAtTime($currentTimeLocation);
			$currentTimeLocation = $currentTimeLocation + $videoDuration;
		}

//		debug::Log($video);

		return $video;
	}
}

?>