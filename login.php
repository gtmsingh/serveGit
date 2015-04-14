<?php
session_start();
require("./config/database.php");
require("./config/utility.php");

if( isVariablesSet([$_POST["email"], $_POST["password"]]) ) {
	$email = $_POST["email"];
	$password = $_POST["password"];


	die();
}
$_SESSION["error"] = [
	"login" => "Insuficient data supplied"
];
header("Location: index.php");
?>