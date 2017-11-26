<?php
/*Verify that the user is logged in. If not, display login form.*/

function heroDropDown(){
	
}

function teamDropDown($group){
	
}

function gearByTypeDropDown(){
	
}

function enemyByTypeDropDown(){
	
}

class DataLayer {
	
	var $connection;
	
	function __construct($dbhost, $dbname, $dbuser, $dbpass){
		$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($connection->connect_error){
			die($connection->connect_error);
		}
	}
	
	function sendQuery($query){
    global $connection;
    $result = $connection->query($query);
    if (!$result) {die($connection->error);}
    return $result;
	}
	
	function getTeams($group){
		
	}
	
	function getTeamNames($group){
		
	}
	
	function getHeroes(){
		
	}
	
	function getHeroNames(){
		
	}

	function getGearbyType($type) {
		
	}
	
	function getGearNamesbyType($type) {
		
	}
	
	function getEnemiesbyType($type){
		
	}
	
	function getEnemyNamesbyType($type){
		
	}
	
	function addHero($heroName, $heroLevel, $heroClass, $team){
	
	}

	function editHero($heroName, $heroLevel, $heroClass, $team){
		
	}

	function deleteHero($userID, $heroName){
		
	}

	function createTeam($userID, $teamName, $activeHero){
		
	}

	function joinTeam($userID, $teamName){
		
	}

	function editTeam($userID, $teamName, $newTeamName, $newActiveHero){
		
	}

	function deleteTeam($userID, $teamName){
		
	}
}

/*


Old Code




from populator.php

*/

function heroDropDown(){
	$heroes = queryMysql("SELECT Character_Name FROM player_character WHERE Owner_ID=3");
	while ($hero = $heroes->fetch_assoc()){
		echo "<option>" . $hero['Character_Name'] . "</option>";	
	}
}

function teamDropDown(){
	$teams = queryMysql("SELECT Team_Name FROM team");
	while ($team = $teams->fetch_assoc()){
		echo "<option>" . $team['Team_Name'] . "</option>";	
	}
}

function gearDropDown(){
	$gear = queryMysql("SELECT Gear_Name FROM gear");
	while ($item = $gear->fetch_assoc()){
		echo "<option>" . $item['Gear_Name'] . "</option>";	
	}
}

function enemyDropDown(){
	$enemies = queryMysql("SELECT Enemy_Name FROM enemy");
	while ($enemy = $enemies->fetch_assoc()){
		echo "<option>" . $enemy['Enemy_Name'] . "</option>";	
	}
}





/*

from functions.php / sqlConnect.php

*/

$dbhost = '136.61.234.100';
$dbname = 'dbapp';
$dbuser = 'dbapp';
$dbpass = 'paswd135';
$appname = "Combat Calculator";

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) {die($connection->connect_error);}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) {die($connection->error);}
    return $result;
}

function destroySession()
{
    $_SESSION=array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name (), '', time() - 2592000, '/');
    }
    
    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}


?>