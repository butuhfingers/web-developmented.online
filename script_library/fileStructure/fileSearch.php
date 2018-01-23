<?php
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 2/4/2017
 * Time: 11:24 PM
 */

namespace FileStructure;





class FileSearch
{
    //Constructor
    public function __construct(){
        //Do nothing
    }

    //Search for and return files with extension
    public static function SearchForExtension($directory, $extension){
        $fileArray = Array();   //Initialize the array to store our files information

        //Check if the directory exists, if not just return
        if(!is_dir($directory)){
            print($directory);  //Print out the directory we are trying to access
            return;
        }

        // Open a directory, and read its contents
        if ($dh = opendir($directory)){
                while (($file = readdir($dh)) !== false){   //While we have something to read in the directory
                    if($file != "." && $file != "..")   //Make sure it is not the directory to the root or up
                        echo "filename: " . $file . "<br>";}

                    if(is_dir())
            closedir($dh);  //Close our directory
        }


        return $fileArray;  //Return our results that we found
    }
}