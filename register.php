<?php
session_start();
require("./config/database.php");
require("./config/utility.php");

if(! isVariablesSet([ $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirm_pass"]]) ) {

	redirectWithError("register", "Insuficient data supplied", "index.php");
}

if(! isVariablesSet( [$_POST["register-btn"]] )) {
	redirectWithError("register", "Not a right way to do this", "index.php");
}

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_repeat = $_POST["confirm_pass"];

if($password == $password_repeat) {
	$query = getInsertQuery("user_login", ["username", "email", "password"], [$username, $email, $password], ["s", "s", "s"]);

	$result = $link->query($query);
	if(! $result) {
		redirectWithError("register", "Server Error", "index.php");
	} else {
		$_SESSION["uid"] = $link->insert_id;
		$curl = curl_init();
		$data = json_encode(array(
			"username" => $username,
			"password" => $password
			));
		curl_setopt_array($curl, 
				array(
					CURLOPT_URL => "http://".$node_server_ip.":".$node_server_port."/createUser",
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $data,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_HTTPHEADER => array(
										'Content-Type: application/json',
										'Content-Length: ' . strlen($data)
										)
				)
		);
		$response = curl_exec($curl);
		$response = json_decode($response, true);
		if($response["error"]) {
			redirectWithError("register", "Something went wrong", "index.php");
		} else {
			redirectWithMessage("register", "Welcome $username ", "user/repo.php");
		}
	}
} else {
	redirectWithError("register", "Passwords do not match", "index.php");
}
?>