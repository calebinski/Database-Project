<?php
require_once 'functions.php';
echo "<div class='main'><h3>Please enter your details to log in.</h3>";
$error = $user = $pass = "";

if (isset($_POST['username']))
{
    $user = sanitizeString($_POST['username']);
    $pass = sanitizeString($_POST['password']);
    
    if ($user == "" || $pass == "")
    {
        $error = "Not all fields were entered.<br>";
    }else
    {
        $result = queryMysql("SELECT Username,Password FROM user WHERE Username ='$user' AND Password='$pass'");
        
        if($result->num_rows == 0)
        {
            $error = "<span class='error'>Username/Password invallid.</span><br><br>";
        }else
        {
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $pass;
            die("You are now logged in. Please <a href='members.php?view=$user'>click here>/a> to continue.<br><br>");
        }
    }
}

?>