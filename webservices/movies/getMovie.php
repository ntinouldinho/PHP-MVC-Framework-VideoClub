<?php
	
	header('Allow-access-allow-origin: *');
	header('Content-type: application/json; charset=utf-8');

	$title = isset($_GET['title']) ? $_GET['title'] : exit();
	include '../../database.php';
	include '../objects/movies.php';

	$database = new Database();
	$db = $database->getConnection();
	$movie = new Movies($db);

	$stmt = $movie->getMovie($title);
	
    if ($stmt->rowCount() == 1){
		echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	}else{
		echo json_encode(array());
	}

?>