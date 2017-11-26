<!doctype html>
<?php
    if(isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
        $loggedin = TRUE;
    }
    else
    {
        $loggedin = FALSE;
    }
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
    <?php
        if(isset($_SESSION['user']))
        {
            $user = $_SESSION['user'];
            $loggedin = TRUE;
        }
        else
        {
            $loggedin = FALSE;
        }
    ?>
	<div class="row">
	<div id="navigation" class="col-2">
		<div class="list-group">
			<a href="index.php" class="list-group-item">Home</a>
			<a href="heroes.php" class="list-group-item">Heroes</a>
			<a href="teams.php" class="list-group-item">Teams</a>
			<a href="gear.php" class="list-group-item">Gear</a>
			<a href="enemies.php" class="list-group-item">Enemies</a>
			<a href="calculator.php" class="list-group-item active">Calculator</a>
		</div>
	</div>
	<div id="main" class="col-10">
		<div id="header" class="row">
			<div class="col"><h4>Combat Calculator</h4></div>
		</div>
		<div id="content" class="row">
			<div class="col-6">
				<h5>Choose Enemy</h5>
				<select id="inputState" class="form-control">
					<option selected>qweqweqweq</option>
					<option>dfghdfgh</option>
					<option>aadsfasdf</option>
					<option>jklhjklh</option>
					<option>rtyurtyu</option>
				</select>
				<button type="button" class="btn btn-primary float-left">Add Another Enemy</button>
			</div>
			<div class="col-6">
				<div class="container-fluid"><button type="button" class="btn btn-primary">Choose a Team</button></div>
				<div class="container-fluid"><button type="button" class="btn btn-primary">Choose a Hero</button></div>
                                <div class="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Temp Login button</button></div>                                
			</div>
			<div class="row">
				<input type="submit" class="btn btn-primary float-left" value="Submit Button"></input>
			</div>
		</div>
            
            
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
                                      <fieldset>
                                          <legend>Login</legend>
                                          
                                          <label for="login">Email</label>
                                          <input type="text" id="username" name="username"/>
                                          <div class="clear"></div>
                                          
                                          <label for="password">Password</label>
                                          <input type="password" id="password" name="password"/>
                                          <div class="clear"></div>
                                          
                                          <br />
                                          
                                          <input type="submit" style="margin: -20px 0 0 287px;" class="button" name="commit" value="Login"/>
                                      </fieldset>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
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
