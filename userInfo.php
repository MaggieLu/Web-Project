<?php
session_start();

$username = "";

if (isset($_GET["username"])){
	$username = $_GET['username'];
}

$sql = "SELECT * FROM userinformation WHERE username='$username'";

?>