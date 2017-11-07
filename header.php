<?php

session_start();

echo "<!DOCTYPE html>\n<html><head>";

require_once 'functions.php';

$userstr = ' (Guest)';

if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
}
else $loggedin = FALSE;

echo "<title>$appname$userstr</title><link rel='stylesheet' ".
        "href='styles.css' type='text/css'>".
        "</head><body><center><canvas id='logo' width='624' ".
        "height='96'>$appname$userstr</div?".
        "<script src='javascript.js'></script>";

if($loggedin)
{
    /*This is where we make the navigation bar if the user is logged in*/
    /*Caleb, look at page 658 in your book*/
}
else
{
    /*This is where we make the navigation bar if the user is NOT logged in*/
}
