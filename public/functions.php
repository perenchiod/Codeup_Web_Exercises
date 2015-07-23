<?php
	function inputHas($key) {
		if(isset($_REQUEST[$key])) {
			return true;
		} else {
			return false;
		}
	}

	function inputGet($key) {
		if(empty($key)) {
			return null;
		} else {
			return $_REQUEST[$key];
		}
	}

	function escape($input) {
		return trim(htmlspecialchars(strip_tags($input)));
	}
?>

