<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/library/Database/pdoDatabase.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/library/UUID/uuid.php");
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 1/30/17
 * Time: 12:48 PM
 */
$conn = new PDO("mysql:host=scritch.ninja;dbname=urban_frontier_house", 'dereksql', 'phpmyadminderek');
$database = new \Database\pdoDatabase(
	"69.146.148.38",
	"urban_frontier_house",
	"dereksql",
	"phpmyadminderek"
	);

$query = "INSERT INTO house_sensors 
(UUID, sensor_id, secondary_id, sensor_name, date_added) 
VALUES (:UUID, :id, :secondary, :name, NOW())";
$uuid = new UUID();
$sensorID = $uuid->generateUUID();
$parameters = [$sensorID, "2", "1", "Great Room Temperature"];
$database->RunQuery($query, $parameters);

////Create a new query
//$query = "INSERT INTO recorded_sensor_data
//(UUID, sensor_uuid, value_recorded)
//VALUES (:UUID, :sensor_uuid, :value)";
//$parameters = [$UUID->generateUUID(), $sensorID, 1000];
//$Database->RunQuery($query, $parameters);
//
//
//$query = "SELECT *
//FROM recorded_sensor_data
//WHERE 1";
//$Database->RunQuery($query, [])

?>