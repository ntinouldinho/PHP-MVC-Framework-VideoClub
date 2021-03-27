<?php
class GeneralClass{
    public $database;
	
    public function __construct($database){
        $this->database = $database;
    }
    
    public function login($user, $pass){
        $query = $this->database->prepare('SELECT `username`, `type` FROM `users` WHERE `username`=:u AND `password`=:p');
        $query->bindParam(':u',$user);
        $query->bindParam(':p',$pass);
        $query->execute();
        return $query;
    }


}

class Movies{
 
    // database connection and table name
    private $conn;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getMovie($title){
        $query = $this->conn->prepare('SELECT * FROM `movies` WHERE `html_id` like "%'.$title.'%"');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query;
    }

    public function getAllMovies(){
        $query = $this->conn->prepare('SELECT * FROM `movies`');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query;
    }

    public function getDisplayableMovies(){
        $query = $this->conn->prepare('SELECT * FROM `movies` where movies.goes="carousel" or movies.goes="new"');
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        // $output = array();
			
		// 	while($mysql_array = $query->fetch()){
		// 		$output.push($mysql_array);
        //     }
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
        

        return $query->execute();
    }

}
?>