<?php
	
    header('Content-type: application/json; charset=utf-8');
    
    $title = isset($_POST['title']) ? $_POST['title'] : exit();
    $type = isset($_POST['type']) ? $_POST['type'] : exit();
    $price = isset($_POST['price']) ? $_POST['price'] : exit();
    $plot = isset($_POST['plot']) ? $_POST['plot'] : exit();
    $picture = isset($_POST['picture']) ? $_POST['picture'] :exit();
    
    include '../../database.php';
	include '../objects/movies.php';

	$database = new Database();
	$db = $database->getConnection();
    $movie = new Movies($db);

	$stmt = $movie->editMovie($title, $type, $price, $plot, $picture);
	if ($stmt == 1){
		echo json_encode(array('status' => "1"));
	}else{
		echo json_encode(array('status' => "0"));
	}

?>