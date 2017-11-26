<?php
/*Verify that the user is logged in. If not, display login form.*/

var $sessionUserID = 2;

function heroDropDown(){
	$dataLayer = new DataLayer;
	$data = $dataLayer.getHeroNames();
	while ($hero = $data->fetch_assoc()){
		echo "<option>" . $hero['Character_Name'] . "</option>";	
	}
}

function teamDropDown($group){
	$dataLayer = new DataLayer;
	$data = $dataLayer.getTeamNames();
	while ($team = $data->fetch_assoc()){
		echo "<option>" . $team['Team_Name'] . "</option>";	
	}
}

function gearByTypeDropDown(){
	$dataLayer = new DataLayer;
	$data = $dataLayer.getGearNamesbyType();
	while ($gear = $data->fetch_assoc()){
		echo "<option>" . $gear['Gear_Name'] . "</option>";	
	}
}

function enemyByTypeDropDown(){
	$dataLayer = new DataLayer;
	$data = $dataLayer.getEnemyNamesbyType();
	while ($enemy = $data->fetch_assoc()){
		echo "<option>" . $enemy['Enemy_Name'] . "</option>";	
	}
}

function displayHeroes(){
	
}

function displayTeams($group){
	
}

function displayGearbyType(){
	
}

function displayEnemiesbyType(){
	
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
		return sendQuery('CALL GetTeams()');
	}
	
	function getTeamNames($group){
		return sendQuery('CALL GetTeamNames()');
	}
	
	function getHeroes($userID){
		return sendQuery('CALL GetHeroes()');
	}
	
	function getHeroNames($userID){
		return sendQuery('CALL GetHeroNames()');
	}

	function getGearbyType($type) {
		return sendQuery('CALL GetGearByType()');

	}
	
	function getGearNamesbyType($type) {
		return sendQuery('CALL GetGearNamesByType()');

	}
	
	function getEnemiesbyType($type){
		return sendQuery('CALL GetEnemiesByType()');
		
	}
	
	function getEnemyNamesbyType($type){
		return sendQuery('CALL GetEnemyNamesByType()');
		
	}
	
	function addHero($heroName, $heroLevel, $heroClass, $team){
		return sendQuery('CALL AddHero()');
	
	}

	function editHero($heroName, $heroLevel, $heroClass, $team){
		return sendQuery('CALL EditHero()');
		
	}

	function deleteHero($heroName){
		return sendQuery('CALL DeleteHero()');
		
	}

	function createTeam($teamName, $activeHero){
		return sendQuery('CALL CreateTeam()');
		
	}

	function joinTeam($teamName){
		return sendQuery('CALL JoinTeam()');
		
	}

	function editTeam($teamName, $newTeamName, $newActiveHero){
		return sendQuery('CALL EditTeam()');
		
	}

	function deleteTeam($teamName){
		return sendQuery('CALL DeleteTeam()');
		
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