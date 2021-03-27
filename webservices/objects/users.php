<?php
class Users{
 
    // database connection and table name
    private $conn;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function login($user, $pass){
        $query = $this->conn->prepare('SELECT `username`, `type` FROM `users` WHERE `username`=:u AND `password`=:p');
        $query->bindParam(':u',$user);
        $query->bindParam(':p',$pass);
        $query->execute();
        return $query;
    }

}