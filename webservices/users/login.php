<?php
	
	header('Allow-access-allow-origin: *');
	header('Content-type: application/json; charset=utf-8');

	$username = isset($_POST['u']) ? $_POST['u'] : fail('missing username');
	$password = isset($_POST['p']) ? $_POST['p'] : fail('missing password');

	include '../../database.php';
	include '../objects/users.php';

	$database = new Database();
	$db = $database->getConnection();
	$user = new Users($db);

	$stmt = $user->login($username,$password);
	
	if ($stmt->rowCount() == 1){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		
		$response['status'] = "1";
		$response['username'] = $username;
		$response['type'] = $type;
	}else{
		$response['status'] = "0";
	}

	echo json_encode($response);

	function fail($arg){
		echo json_encode(array('status' => 0));
		die();
	}

?>