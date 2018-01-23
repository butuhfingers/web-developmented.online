<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 1/30/17
 * Time: 12:17 PM
 */

/*
 * NOTE: PDO query example
 * 'SELECT * FROM database_name WHERE column = ? AND status = ?'
 * PARAMETERS: [$param1, $param2]
 *
 * 'SELECT * FROM database_name WHERE column = :column AND status = :status'\
 * PARAMETERS: ['column' => $param1, 'status' => $param2]
 */

namespace Database;


use UUID\UUID;

class pdoDatabase {
	//Variables
	protected $connection = null;            //Our connection to the Database
    protected $queryStatement = null;        //The query that our Database will use
    protected $isQueryPrepared = false;    //Has our query been prepared?

    //Connections variables
    private $host = "developmented.online";
    private $databaseName = "developmented.online";
    private $user = "developmented";
    private $password = "developmenteddatabaseuser";

	//Constructor
	public function __construct($host = "127.0.0.1", $databaseName = "developmented.online", $user = "developmented",
                                $userPassword = "developmenteddatabaseuser", $charset = "utf8") {
		//Setup the dsn for the PDO Database
		$dsn = "mysql:host=$host;port=3306;dbname=$databaseName";
		//Set the options for the PDO Database connection
		$options = [
			\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES   => false,
		];
		
//		echo $dsn;
		
		
		//Create the Database connection
        $this->StartConnection($dsn, $options, $user, $userPassword);
	}
	
	//Start the connection to the Database
	private function StartConnection($dsn, $options, $user, $userPassword){
		//Setup the connection
		$this->connection = new \PDO($dsn, $user, $userPassword, $options);
}
	
	//Close the connection to the Database
	public function StopConnection(){
		//Close the connection
		$this->connection =  null;
	}
	
	//We want to prepare and run our query from the outside
	public function RunQuery($query, $parameters){
		//Prepare our query
		$this->PrepareQuery($query);
		
		//Execute our query
		$this->ExecuteQuery($this->queryStatement, $parameters);

//        print("<br>SQL Data<br>");
        return $this->ReturnSQLData();
	}
	
	//Prepare a SQL query to prevent SQL injection
	private function PrepareQuery($query){
		//Setup the statement for the query
		$this->queryStatement = $this->connection->prepare($query);
	}
	
	//Run the query
	private function ExecuteQuery($queryStatement, $parameters){
		//Execute the query with the parameters
		$queryStatement->execute($parameters);
	}

	//Return the data recieved from the SQL server
    private function ReturnSQLData($limit = 999){
        //The array for the data to sit in
        $sqlData = Array();

        //Go through the rows until we have no more rows or our limit has been reached
        for($i = 0;$i < $limit && $i < $this->queryStatement->rowCount();$i++){
            //Put the data into a temporary variable
            $currentRowData = $this->queryStatement->fetch(\PDO::FETCH_ASSOC);
            //Check if our array is empty first
            if($i == 0 && !is_array($currentRowData)){
                //Leave the loop if this is true
                break;
            }

            //Add the data
            $sqlData[$i] = $currentRowData;
        }

        //Return the data
        return $sqlData;
    }

    //Generate a UUID for the Database
    public function GenerateDatabaseUUID(){
        //Require the UUID library
        require_once($_SERVER['DOCUMENT_ROOT'] . "/library/UUID/uuid.php");

        $uuid = new UUID();
        //Return and generate the UUID
        return $uuid->generateUUID();
    }
}