<?php
session_start();
require("./config/database.php");
require("./config/utility.php");

if( isVariablesSet([$_POST["email"], $_POST["password"]]) ) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$query = "SELECT * FROM user_login WHERE email = '$email';";
	$result = $link->query($query);
	if(! $result) {
		redirectWithError("login", "Server Error", "index.php");
	} else {
		if($result->num_rows != 1) {
			redirectWithError("login", "Login details incorrect", "index.php");
		} else {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if($row["password"] == $password) {

				$_SESSION["uid"] = $row["user_id"];
				$_SESSION["uname"] = $row["username"];
				header("Location: ./user/repo.php"); die();
			} else {
				redirectWithError("login", "Login details incorrect", "index.php");
			}
		}
	}
}
redirectWithError("login", "Insuficient data supplied", "index.php");
?>