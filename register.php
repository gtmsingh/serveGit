<?php
session_start();
require("./config/database.php");
require("./config/utility.php");

if( isVariablesSet([ $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm_pass"]]) ) {
	$username = $POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_repeat = $_POST["confirm_pass"];

	die();
}
$_SESSION["error"] = [
	"register" => "Insuficient data supplied"
];
header("Location: index.php");
?>