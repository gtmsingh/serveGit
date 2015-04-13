<?php
function redirectWithError($var, $msg, $to) {
	$_SESSION["error"] = [
		$var => $msg
	];
	header("LOCATION: $to");
	die();
}

function redirectWithMessage($var, $msg, $to) {
	$_SESSION["message"] = [
		$var => $msg
	];
	header("LOCATION: $to");
	die();
}

function isVariablesSet($vars) {

	foreach ($vars as $var) {
		if (!isset($var) || $var == "") {
			return false;
		}
	}
	return true;
}

function getInsertQuery($table, $cols, $vals, $types) {

	$columns = "";
	$i = 0;
	foreach($cols as $col) {
		if($i != 0) {
			$columns = $columns . ",";
		}
		$columns = $columns . $col;
		$i++;
	}
	$values = "";
	$i = 0;
	foreach($vals as $val) {
		if($i != 0) {
			$values = $values . ",";
		}
		if($types[$i] == "s") {
			$values = $values . "'".$val."'";
		} else {
			$values = $values . "$val";
		}
		$i++;
	}
	$query = "INSERT INTO $table ($columns) VALUES ($values);";
	return $query;
}
?>