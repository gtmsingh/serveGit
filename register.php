<?php
session_start();
require("./config/database.php");
require("./config/utility.php");

if(! isVariablesSet([ $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm_pass"]]) ) {

	redirectWithError("register", "Insuficient data supplied", "index.php");
}

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_repeat = $_POST["confirm_pass"];

$query = getInsertQuery("user_login", ["username", "email", "password"], [$username, $email, $password], ["s", "s", "s"]);

$result = $link->query($query);
if(! $result) {
	redirectWithError("register", "Server Error", "index.php");
} else {
	$_SESSION["uid"] = $link->insert_id;
	redirectWithMessage("register", "Welcome $username", "user/repo.php");
}
?>