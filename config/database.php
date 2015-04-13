<?php
$host = "localhost";
$port = 3306;
$user = "root";
$database = "ServeGit";
$password = "";

$link = new mysqli($host.":".$port, $user, $password, $database);
if($link->connect_error) {
	die("Error Database connection: ".$link->connect_error);
}
?>