<?php

header('Content-type: application/json; charset=utf-8');

$name = $_POST['title'];
$type = $_POST['type'];
$price = $_POST['price'];
$plot = $_POST['plot'];
$picture = $_POST['picture'];

include '../../database.php';
include '../objects/movies.php';

$database = new Database();
$db = $database->getConnection();
$movie = new Movies($db);

$stmt = $movie->storeMovie($name, $type, $price, $plot, $picture);

if ($stmt){
    echo json_encode(array( 'status' => 1 ));
}else{
    echo json_encode(array( 'status' => 0 ));
}

?>