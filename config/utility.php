<?php
function isVariablesSet($vars) {
	
	foreach($vars as $var) {
		if(! isset($var) || $var == "") {
			return false;
		}
	}
	return true;
}
?>