<?php
$hostname = 'localhost';    // host name
$username = 'root';         // user name
$password = '';   // password
$database = 'ecomerce';     // database name
$path     = 'http://'.$_SERVER['SERVER_NAME'].'/ecomerce/';
date_default_timezone_set('Africa/Casablanca');
// connection to database

$con = new mysqli($hostname,$username,$password,$database);
if($con->connect_errno)
    die('error connection to database');
include 'functions.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['pannier'])) $_SESSION['pannier'] = array();
if(isset($_SESSION['c_id'])){
    $result = $con->query("SELECT * FROM `client` WHERE c_id='{$_SESSION['c_id']}'");
    $client = $result->fetch_assoc();
}

// select site infos
$info = $con->query("SELECT * FROM `infos`");
$info_site = $info->fetch_assoc();

$loginMsg='';
$ok='';
$msg='';

?>
