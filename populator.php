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
	
}

function teamDropDown(){
	try {
	$team_one = "team1";
	$team_two = "team2";
	$team_three = "team3";
	$team_four = "team4";
	echo "<option value='" . $team_one . "'>" . $team_one . "</option>";
	echo "<option value='" . $team_two + "'>" . $team_two . "</option>";
	echo "<option value='" . $team_three + "'>" . $team_three . "</option>";
	echo "<option value='" . $team_four + "'>" . $team_four . "</option>";
	} catch (Exception $e){
		echo 'Caught exception: ', $e->getMessage(), "\n";
	}
}

function gearDropDown(){
	
}

function enemyDropDown(){
	
}

?>