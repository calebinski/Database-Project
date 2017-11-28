<?php

$sessionUserID = 10;
$dbhost = '136.61.234.100';
$dbname = 'dbapp';
$dbuser = 'dbapp';
$dbpass = 'paswd135';
$connection;

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

function getHeroes($userID){
	return sendQuery('CALL GetCharacters(' . $userID . ')');
}

function getHeroStats($userID, $charName){
	return sendQuery('CALL GetCharacterStats(' . $userID . ', ' . $charName . ')');
}

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
/*
function displayHeroes($userID){
    global $connection;
    global $dbhost;
    global $dbuser;
    global $dbpass;
    global $dbname;
    
	$names = array();
	$levels = array();
	$classes = array();
	$ints = array();
	$strs = array();
	$agis = array();
	$stas = array();
	$arms = array();
	$mars = array();
	
	$i = 0;
	
	$data = getHeroes($userID);
	while($hero = $data->fetch_assoc()){
		$names[$i] = $hero['Character_Name'];
		$levels[$i] = $hero['Character_Level'];
		$classes[$i] = $hero['Character_Class'];
		$i++;
	}
	
	mysqli_close($connection);
	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($connection->connect_error) {die($connection->connect_error);}
	
	$total = count($names);
	
	for($j = 0; $j < $total; $j++){
		$k = 0;
		$heroStats = getHeroStats($userID, "'" . $names[$j] . "'");
		while($stats = $heroStats->fetch_assoc()) {
			$ints[$k] = $stats['Intellect'];
			$strs[$k] = $stats['Strength'];
			$agis[$k] = $stats['Agility'];
			$stas[$k] = $stats['Stamina'];
			$arms[$k] = $stats['Armor'];
			$mars[$k] = $stats['Magic_Resist'];
			$k++;
		}
		mysqli_close($connection);
	    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($connection->connect_error) {die($connection->connect_error);}
	}
	$h = 0; 
	
	while($h < $total){
		echo "<tr>";
		echo "<td>" . $names[$h] . "</td>";
		echo "<td>" . $levels[$h] . "</td>";
		echo "<td>" . $classes[$h] . "</td>";
		echo "<td>" . $ints[$h] . "</td>";
		echo "<td>" . $strs[$h] . "</td>";
		echo "<td>" . $agis[$h] . "</td>";
		echo "<td>" . $stas[$h] . "</td>";
		echo "<td>" . $arms[$h] . "</td>";
		echo "<td>" . $mars[$h] . "</td>";
		echo "</tr>";
		$h++;
	}
}
*/

function displayTeams(){
	$data = getTeamNames();
	while ($team = $data->fetch_assoc()){
	    echo "<tr>";
		echo "<td>" . $team['Team_Name'] . "</td>";	
		echo "</tr>";
	}
}

function displayGearbyType($type){
    global $connection;
    global $dbhost;
    global $dbuser;
    global $dbpass;
    global $dbname;
	$data = getGearByType($type);
	while ($gear = $data->fetch_assoc()){
	    echo "<tr>";
		echo "<td>" . $gear['Gear_Name'] . "</td>";	
		echo "<td>" . $gear['Gear_Type'] . "</td>";	
		echo "<td>" . $gear['Intellect'] . "%</td>";	
		echo "<td>" . $gear['Strength'] . "%</td>";	
		echo "<td>" . $gear['Agility'] . "%</td>";	
		echo "<td>" . $gear['Stamina'] . "%</td>";	
		echo "<td>" . $gear['Armor'] . "</td>";	
		echo "<td>" . $gear['Magic_Resist'] . "</td>";	
		echo "</tr>";
	}
	mysqli_close($connection);
	    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        if ($connection->connect_error) {die($connection->connect_error);}
}

function displayEnemiesbyType(){
	
}

?>