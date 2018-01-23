<?php
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 2/4/2017
 * Time: 5:14 PM
 */

require_once ($_SERVER['DOCUMENT_ROOT'] . "/script_library/database/pdoDatabase.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/script_library/uuid/uuid.php");

use \Database\pdoDatabase; //Use our database namespace
use UUID\UUID;

//echo urldecode($_POST['name']);
$postVideoName = 'name';

//Testing purposes
if(!isset($_POST[$postVideoName]))
    $_POST[$postVideoName] = "/false.php";

//Check if we have a post value to pull from
if(isset($_POST[$postVideoName])) {
    $fileSource = $_POST[$postVideoName];   //Get the decoded url version of the path
    $file = pathinfo(urldecode($fileSource));  //Get the path info of our file path, after it has been decoded
    $fileDirectory = parse_url(urldecode($fileSource))['path'];
    $fileName = $file['filename'];  //The name of the file


    $path = $_SERVER['DOCUMENT_ROOT'] . $fileDirectory;   //The path to the file location

    if (!file_exists($path)){    //Check if the file exists
        print("No file found at : " . $path);
        return;     //Do not continue if the file does not exist
    }

    if(IsThereAVideo($fileName)){   //If the database had a result, do not continue further
        print("Video database found a result");
        return;
    }

    InsertVideoIntoDatabase($fileName, $fileDirectory);  //Insert the video information into the database

    print(error_get_last());
    print("The video was added to the database");   //The video was added to the database
}


function IsThereAVideo($name){
    //Open the connection and check if we have the video
    $database = new pdoDatabase();
    $nameSearch = "%" . $name . "%";

    //The query we are sending to our database
    $query = "SELECT video.uuid, video.name
    FROM videos AS video
    WHERE video.name LIKE :name";

    $parameters = [':name' => $nameSearch];  //The parameters for the query

    $videos = $database->RunQuery($query, $parameters); //Return and set the videos that we queried for

    $database->StopConnection();    //We no longer need to be connected to the database

    //Do we have any video results?
//    print_r($videos);
//    print("Video count: " . count($videos) . " With a name: " . $name . " Query: " . $query);
    if(count($videos) > 0)
        return true;

    return false;   //We did not find any videos. return false
}

//Insert the video into the database
function InsertVideoIntoDatabase($fileName, $fileSource){
    //We need to encode the file source
 //   $fileSource = urlencode($fileSource);
    //Create a UUID for the video
    $uuid = new UUID();

    //We do not have any video results, add them to the database
    $database = new pdoDatabase();  //Open the connection and check if we have the video

    //The query we are sending to our database
    $query = "INSERT INTO videos
    (uuid, name, path_to_video)
    VALUES (:uuid, :name, :path)";

    $parameters = [':uuid' => $uuid->generateUUID(),
                ':name' => $fileName,
                ':path' => $fileSource];  //The parameters for the query

    $database->RunQuery($query, $parameters); //Return and set the videos that we queried for

    $database->StopConnection();
}