<?php
$host = "localhost";
$port = 3306;
$user = "root";
$database = "ServeGit";
$password = "";

$link = mysqli_connect($host.":".$port, $user, $password, $database)
					or die("Error Database connection: ".mysqli_connect_error());
?>