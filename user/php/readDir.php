<?php
session_start();
require_once '../../config/utility.php';

if(isset($_SESSION["uname"])) {

	$username = $_SESSION["uname"];
	$cur_dir = $_POST["dir"];
	$cur_dir = str_replace('-', '/', $cur_dir);
	// echo $username. ' ' .$cur_dir.'<br>';
	$curl = curl_init();
	$data = json_encode(array(
		"username" => $username,
		"cur_dir" => $cur_dir
		));
	curl_setopt_array($curl, 
			array(
				CURLOPT_URL => "http://".$node_server_ip.":".$node_server_port."/list",
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
	if(! isset($response["error"])) {
		$num = count($response);
		if($num > 0) {
			echo '<ul>';
			for($i = 0; $i < $num; $i++) {
				$response[$i]["name"] = str_replace('/', '-', $response[$i]["name"]);
				$repo_name = substr($response[$i]["name"], strrpos($response[$i]["name"], '-', -1)+1);
				if($response[$i]["type"] == "dir") {
					echo "<li class='browse-dir' id='".$response[$i]["name"]."'>".$repo_name."</li>";
				} else {
					echo "<li id='".$response[$i]["name"]."'>".$repo_name."</li>";
				}
			}
			echo '</ul>';
		}
	}
} else {
	echo "User not logged in";
}
?>