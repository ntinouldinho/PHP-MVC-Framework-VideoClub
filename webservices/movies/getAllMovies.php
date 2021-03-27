<?php
	
	header('Allow-access-allow-origin: *');
	header('Content-type: application/json; charset=utf-8');


	include '../../database.php';
	include '../objects/movies.php';

	$database = new Database();
	$db = $database->getConnection();
	$movie = new Movies($db);

	$stmt = $movie->getAllMovies();
	
	if ($stmt->rowCount() > 0){
		echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
	}else{
		echo json_encode(array());
	}

?>