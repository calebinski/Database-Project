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
					<a href="heroes.php" class="list-group-item active">Heroes</a>
					<a href="teams.php" class="list-group-item">Teams</a>
					<a href="gear.php" class="list-group-item">Gear</a>
					<a href="enemies.php" class="list-group-item">Enemies</a>
					<a href="calculator.php" class="list-group-item">Calculator</a>
				</div>
			</div>
			<div id="main" class="col-10">
				<div id="header" class="row">
					<div class="col-8">
						<h4>HEROES</h4>
					</div>
					<div class="col">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addHeroModal">Add a Hero</button>
					</div>
				</div>
				<div id="content" class="row">
				</div>
				<div class="modal fade" id="addHeroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add a Hero</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="heroName">Hero Name:</label>
										<input type="text" class="form-control" id="heroName" aria-describedby="" placeholder="Enter hero name.">
									</div>
									<div class="form-group">
										<label for="heroLevel">Level:</label>
										<input type="number" class="form-control" id="heroLevel" aria-describedby="" placeholder="Enter hero level." min="1" max="100">
									</div>
									<div class="form-group">
										<label for="heroClass">Class:</label>
										<select class="form-control" id="heroClass" name="class">
											<option>Warrior</option>
											<option>Assassin</option>
											<option>Paladin</option>
											<option>Mage</option>
											<option>Cleric</option>
											<option>Thief</option>
											<option>Druid</option>
										</select>
									</div>
									<div class="form-group">
										<label for="teamSelect">Add to Team:</label>
										<select class="form-control" id="teamSelect" name="team">
										<!--These options must be populated by Php after a db query of available teams.-->
										<?php
											teamDropDown();
										?>
										</select>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Add Hero</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Login to access this page.</h5>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="username">Username:</label>
										<input type="text" class="form-control" id="username" aria-describedby="" placeholder="Enter username.">
									</div>
									<div class="form-group">
										<label for="password">Password:</label>
										<input type="text" class="form-control" id="password" aria-describedby="" placeholder="Enter password.">
									</div>
									<div class="modal-footer">
										<input type="submit" class="btn btn-primary" value="Login"></input>
									</div>
								</form>
							</div>
						</div>
					</div>
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