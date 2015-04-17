<?php
require_once 'config/utility.php';

$username = "user3";
$repo_name = "rep1";
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
print_r($response);
?>