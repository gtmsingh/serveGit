<?php
session_start();
$echo_bit = 0;
if(isset($_SESSION["uid"])) {
	$uid = $_SESSION["uid"];

	require_once '../../config/database.php';

	$query = "SELECT repo_name FROM repositories WHERE user_id = $uid";
	$result = $link->query($query);
	if($result) {
		if($result->num_rows > 0) {
			while($repos = $result->fetch_array(MYSQLI_ASSOC)) {
				$echo_bit = 1;
				echo '<li class="browse-repo"><a href="#" id="'. $repos["repo_name"] .'" data-toggle="tab">' . $repos["repo_name"] . '</a></li>';
			}
		}
	}
}
if(! $echo_bit) {
	echo "";
}
?>