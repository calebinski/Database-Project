<?php

$sessionUserID = 2;
$dbhost = '136.61.234.100';
$dbname = 'dbapp';
$dbuser = 'dbapp';
$dbpass = 'paswd135';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) {die($connection->connect_error);}

$result = sendQuery('SELECT * FROM team');

while($team = $result->fetch_assoc()){
    echo $team['Team_Name'] . "\r\n";
    
}


/*Functions for DB Queries */
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

/*Functions for Displaying Data */

function heroDropDown(){
	$data = getHeroNames();
	while ($hero = $data->fetch_assoc()){
		echo "<option>" . $hero['Character_Name'] . "</option>";	
	}
}

function teamDropDown($group){
	$data = getTeamNames();
	while ($team = $data->fetch_assoc()){
		echo "<option>" . $team['Team_Name'] . "</option>";	
	}
}

function gearByTypeDropDown(){
	$data = getGearNamesbyType();
	while ($gear = $data->fetch_assoc()){
		echo "<option>" . $gear['Gear_Name'] . "</option>";	
	}
}

function enemyByTypeDropDown(){
	$data = getEnemyNamesbyType();
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

?>