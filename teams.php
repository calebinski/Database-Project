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
					<a href="teams.php" class="list-group-item active">Teams</a>
					<a href="gear.php" class="list-group-item">Gear</a>
					<a href="enemies.php" class="list-group-item">Enemies</a>
					<a href="calculator.php" class="list-group-item">Calculator</a>
				</div>
			</div>
			<div id="main" class="col-10">
				<div id="header" class="row">
					<div class="col-7"><h4>TEAMS</h4></div>
					<div class="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinTeamModal">Join a Team</button></div>
					<div class="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTeamModal">Create a Team</button></div>
					<div class="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTeamModal">Edit a Team</button></div>
				</div>
				<div id="content" class="container-fluid">
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Team Name</th>
								<th scope="col">Team Leader</th>
								<th scope="col">Team Members</th>
								<th scope="col">Active Characters</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								displayTeams();
							?>
						</tbody>
					</table>
				</div>
				<div class="modal fade" id="joinTeamModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Join a Team</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="teamSelect">Select a Team:</label>
										<select class="form-control" id="teamSelect" name="team">
											<?php
												teamDropDown();
											?>
										</select>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Join</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Create A Team</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="teamName">Team Name:</label>
										<input type="text" class="form-control" id="teamName" aria-describedby="" placeholder="Enter team name.">
									</div>
									<div class="form-group">
										<label for="heroSelect">Which hero would you like to use in this team?</label>
										<select class="form-control" id="heroSelect" name="hero">
											<?php
												heroDropDown();
											?>
										</select>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Create</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="editTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edit A Team</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label for="editTeamSelect">Which team would you like to change?</label>
										<select class="form-control" id="editTeamSelect" name="editTeam">
											<?php
												teamDropDown();
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="teamName">New Team Name:</label>
										<input type="text" class="form-control" id="teamName" aria-describedby="" placeholder="Enter team name.">
									</div>
									<div class="form-group">
										<label for="newHeroSelect">Choose New Active Hero:</label>
										<select class="form-control" id="newHeroSelect" name="newHero">
									<!--These options must be populated by Php after a db query of available teams.-->
											<?php
												heroDropDown();
											?>
										</select>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Delete Team</button>
										<button type="button" class="btn btn-primary">Save Team</button>
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