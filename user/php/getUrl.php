<?php
session_start();
require_once '../../config/utility.php';

if(isset($_SESSION["uname"])) {

	$username = $_SESSION["uname"];
	$repo_name = $_GET["repo"];
	$curl = curl_init();
	$data = json_encode(array(
		"username" => $username,
		"repo_name" => $repo_name
		));
	curl_setopt_array($curl, 
			array(
				CURLOPT_URL => "http://".$node_server_ip.":".$node_server_port."/getUrl",
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
	if(isset($response["url"])) {
		echo $response["url"];
	}
} else {
	echo "User not logged in";
}
?>