<?php namespace User;

require_once ("userCredentials.php");
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 1/23/2017
 * Time: 5:15 PM
 */

class userValidation{
    //Variables
    public $userCredentials;

    public function __construct(){
        //Setup a new user credentials
        $this->userCredentials = new userCredentials();
    }

    public function isUserAllowed(){
        //Check if the user is anonymous
        if($this->userCredentials->getUserName() != userCredentials::getAnonymousUser()){
            //They are anonymous
            return true;
        }

        return false;
    }
}