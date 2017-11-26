<?php

include 'sqlConnect.php';

function listHeroes(){
	
}

function listTeams(){
	
}

function listGear(){
	
}

function listEnemies(){
	
}

function editHeroModal(){
	
}

function editTeamModal(){
	
}

function heroDropDown(){
	$heroes = queryMysql("SELECT Character_Name FROM player_character WHERE Owner_ID=3");
	while ($hero = $heroes->fetch_assoc()){
		echo "<option>" . $hero['Character_Name'] . "</option>";	
	}
}

function teamDropDown(){
	$teams = queryMysql("SELECT Team_Name FROM teams");
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

?>