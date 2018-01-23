<?php
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 1/13/2018
 * Time: 8:00 PM
 */

namespace debug;


class debug {
	//Variables

	//Constructor
	function __construct() {
		//Do nothing for now
	}

	//Methods
	public static function Log($stringToLog){
		debug::showLog($stringToLog);
	}

	//We need to add the log to the HTML
	private static function showLog($logMessage){
//We need to show our debug messages
		echo'
	<div class="debug-log" style="position: relative; left:0; bottom:0; width:100%; height:100px; background:black;">
		' . $logMessage . '
	</div>
';
	}
}