<?php namespace User;
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 1/22/2017
 * Time: 6:43 PM
 */


class userCredentials
{
    private static $anonymousUser = "ANONYMOUS_USER";

    public function __construct(){
        //Check if the session has already started
        if(session_status() == PHP_SESSION_NONE){
            //Open up our session
            session_start();
        }
    }

    public function getUserName(){
        //Return the username of the session user
        if(isset($_SESSION['UserName'])){
            return $_SESSION['UserName'];
        }

        //No username can be found, return anonymous
        return $this->getAnonymousUser();
    }

    public static function getAnonymousUser(){
        //Returns the string of anonymous user
        return self::$anonymousUser;
    }
}