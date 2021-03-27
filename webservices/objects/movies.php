<?php
class Movies{
 
    // database connection and table name
    private $conn;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getMovie($title){
        $query = $this->conn->prepare('SELECT * FROM `movies` WHERE `title` like "%'.$title.'%"');
        $query->execute();
        return $query;
    }

    public function getAllMovies(){
        $query = $this->conn->prepare('SELECT * FROM `movies`');
        $query->execute();
        return $query;
    }

    public function storeMovie($title, $type, $price, $plot, $picture){
        $query = $this->conn->prepare('INSERT INTO `movies`
        (`title`, `type`, `price`, `plot`, `picture`)
        VALUES (:title, :type, :price, :plot, :picture)');

        $query->bindParam(":title", $title);
        $query->bindParam(":type", $type);
        $query->bindParam(":price", $price);
        $query->bindParam(":plot", $plot);
        $query->bindParam(":picture", $picture);
        if($query->execute()){
            return 1;
        }
        return 0;
    }

    public function editMovie($title, $type, $price, $plot, $picture){
        $query = $this->conn->prepare('UPDATE movies
                SET type = :type, price = :price, plot = :plot, picture = :picture
                WHERE title = :title');

        $query->bindParam(":title", $title);
        $query->bindParam(":type", $type);
        $query->bindParam(":price", $price);
        $query->bindParam(":plot", $plot);
        $query->bindParam(":picture", $picture);

        $query->execute();
        if($query->rowCount() == 1){
            return 1;
        }

        return 0;
    }

}