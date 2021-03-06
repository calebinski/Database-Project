<!DOCTYPE html>
<?php
	include 'cc_engine.php';
?>
<html lang="en">
	<head>
		<title>Combat Calculator</title>
		<!--Bootstrap CSS Dependency-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/cc_styles.css">
		<!--End Bootstrap CSS Dependency-->
	</head>
	<body>
		<div class="row">
			<div id="navigation" class="col-2">
				<div class="list-group">
					<a href="index.php" class="list-group-item">Home</a>
					<a href="heroes.php" class="list-group-item">Heroes</a>
					<a href="teams.php" class="list-group-item">Teams</a>
					<a href="gear.php" class="list-group-item active">Gear</a>
					<a href="enemies.php" class="list-group-item">Enemies</a>
					<a href="calculator.php" class="list-group-item">Calculator</a>
				</div>
			</div>
			<div id="main" class="col-10">
				<h1>Gear</h1>
				<h4>Head</h4>
				<div id="content" class="container-fluid">
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Head'");
							?>
						</tbody>
					</table>
					
				<h4>Shoulder</h4>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic_Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Shoulder'");
							?>
						</tbody>
					</table>
				<h4>Chest</h4>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic_Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Chest'");
							?>
						</tbody>
					</table>
					
				<h4>Gloves</h4>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic_Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Gloves'");
							?>
						</tbody>
					</table>
				<h4>Legs</h4>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic_Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Legs'");
							?>
						</tbody>
					</table>
					<h4>Boots</h4>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Gear</th>
								<th scope="col">Type</th>
								<th scope="col">Intellect</th>
								<th scope="col">Strength</th>
								<th scope="col">Agility</th>
								<th scope="col">Stamina</th>
								<th scope="col">Armor</th>
								<th scope="col">Magic_Resist</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayGearbyType("'Boots'");
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--Bootstrap JS Dependencies-->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>'
		<!--End Bootstrap JS Dependencies-->
	</body>
</html>