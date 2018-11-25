<?php
ob_start();

if(!isset($_SESSION)){
    session_start();
}

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'project';

$connection = mysqli_connect($host, $user, $pass, $db_name);

if(!$connection){
    die("Connection to database failed. " . mysqli_error($connection));
}
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
#$connection->close();
?>