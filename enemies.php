<!doctype html>
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
			<a href="gear.php" class="list-group-item">Gear</a>
			<a href="enemies.php" class="list-group-item active">Enemies</a>
			<a href="calculator.php" class="list-group-item">Calculator</a>
		</div>
	</div>
	<div id="main" class="col-10">
		<div id="header" class="row">
			<div class="col-4"><h4>Enemies</h4></div>
			<div class="col-2">
				<h5>Filter By:</h5>
			</div>
			<div class="col-2">
				<select id="inputState" class="form-control">
					<option selected>qweqweqweq</option>
					<option>dfghdfgh</option>
					<option>aadsfasdf</option>
					<option>jklhjklh</option>
					<option>rtyurtyu</option>
				</select>
			</div>
			<div class="col-2">
				<input type="password" class="form-control" id="pwd">
			</div>
		</div>
		<div id="accordion" role="tablist">
			  <div class="card">
				<div class="card-header" role="tab" id="headingOne">
				  <h5 class="mb-0">
					<a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  Humanoid
					</a>
				  </h5>
				</div>

				<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
				  <div class="card-body">
						Humanoids Listed
				  </div>
				</div>
			  </div>
			  <div class="card">
				<div class="card-header" role="tab" id="headingTwo">
				  <h5 class="mb-0">
					<a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Beast
					</a>
				  </h5>
				</div>
				<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body">
						Beasts Listed
				  </div>
				</div>
			  </div>
			  <div class="card">
				<div class="card-header" role="tab" id="headingThree">
				  <h5 class="mb-0">
					<a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					  Elemental
					</a>
				  </h5>
				</div>
				<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
				  <div class="card-body">
						Elementals Listed
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