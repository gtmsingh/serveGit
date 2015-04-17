<?php
session_start();
require_once '../../config/utility.php';
require_once '../../config/database.php';

if(isset($_SESSION["uname"])) {

	$user_id = $_SESSION["uid"];
	$username = $_SESSION["uname"];
	$repo_name = $_POST["repo"];

	$query = getInsertQuery("repositories", ["user_id", "repo_name"], [$user_id, $repo_name], ["i", "s"]);

	if($link->query($query)) {
		// echo $username. ' ' .$cur_dir.'<br>';
		$curl = curl_init();
		$data = json_encode(array(
			"username" => $username,
			"repo_name" => $repo_name
			));
		curl_setopt_array($curl, 
				array(
					CURLOPT_URL => "http://".$node_server_ip.":".$node_server_port."/createRepo",
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
		echo "Server error";
	}
} else {
	echo 'user not logged in';
}
?>