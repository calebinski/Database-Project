<?php

$sessionUserID = 10;
$dbhost = '136.61.234.100';
$dbname = 'dbapp';
$dbuser = 'dbapp';
$dbpass = 'paswd135';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) {die($connection->connect_error);}

/*Functions for DB Queries */
function sendQuery($query){
    global $connection;
    $result = $connection->query($query);
    if (!$result) {die($connection->error);}
    return $result;
}

function getTeams(){
	return sendQuery('CALL GetTeams()');
}

function getTeamsByOwnerID($ownerID){
	return sendQuery('CALL GetTeamsByOwnerID(' . $ownerID . ')');
}

function getTeamsByMemberID($userID){
	return sendQuery('CALL GetTeamsByMemberID(' . $userID . ')');
}

function getTeamNames(){
	return sendQuery('CALL GetTeamNames()');
}

function getTeamNamesByMember($userID){
	return sendQuery('CALL GetTeamNamesByMember(' . $userID . ')');
}

function getTeamNamesByOwner($ownerID){
	return sendQuery('CALL GetTeamNamesByOwner(' . $ownerID . ')');
}

//function getHeroes($userID){
//	return sendQuery('CALL GetHeroes()');
//}

function getHeroNames($userID){
	return sendQuery('CALL GetCharacterNamesByID(' . $userID . ')');
}

function getGearByType($type) {
	return sendQuery('CALL GetGearByType(' . $type . ')');

}

function getGearNamesByType($type) {
	return sendQuery('CALL GetGearNamesByType(' . $type . ')');

}

function getEnemiesByType($type){
	return sendQuery('CALL GetEnemiesByType(' . $type . ')');
	
}

function getEnemyNamesByType($type){
	return sendQuery('CALL GetEnemyNamesByType(' . $type . ')');
	
}

function addHero($userID, $heroName, $heroLevel, $heroClass, $int, $str, $agi, $sta, $arm, $mar){
	return sendQuery('CALL AddHero(' . $userID . ', ' . $heroName . ', ' . $heroLevel . ', ' . $heroClass . ', ' . $int . ', ' . $str . ', ' . $agi . ', ' . $sta . ', ' . $arm . ', ' . $mar . ')');


}

function editHero($userID, $newHeroName, $oldHeroName, $heroLevel, $heroClass, $int, $str, $agi, $sta, $arm, $mar){
	return sendQuery('CALL EditHero(' . $userID . ', ' . $newheroName . ', ' . $oldheroName . ', ' . $heroLevel . ', ' . $heroClass . ', ' . $int . ', ' . $str . ', ' . $agi . ', ' . $sta . ', ' . $arm . ', ' . $mar . ')');
	
	
}

function deleteHero($userID, $heroName){
	return sendQuery('CALL DeleteHero(' . $userID . ', ' . $heroName . ')');
	
}

function createTeam($teamName, $ownerID){
	return sendQuery('CALL CreateTeam(' . $teamName . ', ' . $ownerID . ')');
	
}

function joinTeam($teamID, $userID, $heroName){
	return sendQuery('CALL JoinTeam(' . $teamID . ', ' . $userID . ', ' . $heroName . ')');
	
}

function editTeamName($oldTeamName, $newTeamName){
	return sendQuery('CALL EditTeamName(' . $oldTeamName . ', ' . $newTeamName . ')');
	
}

function editTeamOwner($newOwnerID, $oldOwnerID, $teamID){
	return sendQuery('CALL EditTeamOwner(' . $newOwnerID . ', ' . $oldOwnerID . ', ' . $itemID . ')');
}

function deleteTeam($teamName){
	return sendQuery('CALL DeleteTeam('. $teamName . ')');
	
}

/*Functions for Displaying Data */

function heroDropDown($userID){
	$data = getHeroNames($userID);
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

function displayTeams(){
	
}

function displayGearbyType(){
	
}

function displayEnemiesbyType(){
	
}

?>