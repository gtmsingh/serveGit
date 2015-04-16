<?php
require_once 'config/utility.php';

$username = "user3";
$cur_dir = "repo1/";

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
			CURLOPT_HTTPHEADER => array('Content-Type: application/json',
								'Content-Length: ' . strlen($data)
		    				)
		)
	);
$response = curl_exec($curl);
$response = json_decode($response, true);
print_r($response);
// echo $response["username"]. " - " .$response["pass"];
?>