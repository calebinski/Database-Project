<?php

$dbhost = '136.61.234.100';
$dbname = 'dbapp';
$dbuser = 'dbapp';
$dbpass = 'paswd135';
$appname = "Battle Calculator";

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error)
{
    die($connection->connect_error);
}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result)
    {
        die($connection->connect_error);
    }
    return $result;
}

function destroySession()
{
    $_SESSION = array();
    
    if (session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(), '', time()-2592000, '/');
    }
    
    session_destroy();
}