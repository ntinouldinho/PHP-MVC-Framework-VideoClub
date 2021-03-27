<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();// Starting Session
	
	if (isset($_POST['username']) && isset($_POST['type']) && ($_POST['type'] == "0" || $_POST['type'] == "1" )){
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['type'] = $_POST['type'];
	}
?>