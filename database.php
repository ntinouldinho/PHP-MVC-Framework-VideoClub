<?php
class Database{
 
    // Environment 
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    private $db_name = "test";
    
    public $conn;
 
    //get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

    private function run_query($query_str, $parameters)
		{
			try
			{
				$result = $this->conn->prepare($query_str);
				$result->setFetchMode(PDO::FETCH_ASSOC);
				$result->execute($parameters);
				return $result;
			}
			catch(PDOException $e)
			{
				$this->db_error('function run_query('.$query_str.'):' .$e->getMessage());
				return NULL;
			}
		}
		
		private function fetch_query_data($query_result)
		{
			try
			{
				$result_data = $query_result->fetch();
				return $result_data;
			}
			catch(PDOException $e)
			{
				$this->db_error('function fetch_query_data:' .$e->getMessage());
				return NULL;
			}
		}
		
		//bellow are the public functions
		
		public function update($query_str, $parameters)
		{
			$this->run_query($query_str, $parameters);
		}
		
		public function delete($query_str, $parameters)
		{
			$this->run_query($query_str, $parameters);
		}
		
		public function insert($query_str, $parameters)
		{
			$this->run_query($query_str, $parameters);
		}
		
		public function select($query_str, $parameters)
		{
			$result = $this->run_query($query_str, $parameters);
			$output = array();
			
			while($mysql_array = $this->fetch_query_data($result))
				array_push($output, $mysql_array);
			
			return $output;
		}
};
?>