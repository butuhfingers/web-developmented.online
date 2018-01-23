<?PHP

namespace UUID;

/*
This will help generate UUID's that do not conflict with any others inside of the Database
*/

/* Test code
$UUID = new UUID();
echo($UUID->generateUUID());
*/

class UUID{
	
	private $uuid;
	
	function __construct(){
		
	}
	
	/*
	Generate and return a UUID
	
	This will be generated in this order (hash: ):
		microtime
		datetime
		ip address
		random 5 digit number
	*/
	public function generateUUID(){
		$min = 10000;
		$max = 99999;
		
		//The first part (xxxxx-)
		$uuid = $this->uuidHash(strval(microtime())) . "-";
		
		//(xxxxx-ddddd-)
		$dateTime = new \DateTime();
		$uuid .= $this->uuidHash(strval($dateTime->getTimestamp())) . "-";
		
		//(xxxxx-ddddd-ppppp-)
		$uuid .= $this->uuidHash(strval($_SERVER['REMOTE_ADDR'])) . "-";
		
		//(xxxxx-ddddd-ppppp-rrrrr)
		$uuid .= $this->uuidHash(strval(rand($min, $max)));
		
		return strtoupper($uuid);
	}
	
	/*
	hash the UUID elements
	*/
	private function uuidHash($string){
		//8 digits long
		$newHash = hash("crc32b", $string);
		
		//Return the string that is 5 characters long
		return substr($newHash, 0, 5) ;
;	}
}

?>