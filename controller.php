<?php
class LoginController
{
    private $model;
	
    public function __construct($model)
	{
        $this->model = $model;
    }
	
	public function login($data)
	{
       
		//title, location, summary and rules are strings so are checked if they are empty only
		if(
			count($data) == 2 && 
			isset($data['username']) && !empty($data['username']) && 
			isset($data['password']) && !empty($data['password'])
		) {
				$stmt=$this->model->login($data['username'],$data['password']);
				if ($stmt->rowCount() == 1){
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    extract($row);
                    
                    $response['status'] = "1";
                    $response['username'] = $username;
                    $response['type'] = $type;
                }else{
                    $response['status'] = "0";
                }
            
                return json_encode($response);
			
		}
		$response['status'] = "0";
		return json_encode($response);
	}
}

class MovieController
{
    private $model;
	
    public function __construct($model)
	{
        $this->model = $model;
    }
	
	public function displayFirst()
	{
       $data = $this->model->getDisplayableMovies();
       if ($data->rowCount() > 0){
        $stmt=$data->fetchAll(PDO::FETCH_ASSOC);
       $selected[0]=array();
       $selected[1]=array();
        print_r($stmt);
       for($i = 0; $i < count($stmt); $i++){
            if($stmt[$i]['goes']=='new'){
                if (!in_array($stmt[$i], $selected[0])) array_push($selected[0], $stmt[$i]);
			
            }else if($stmt[$i]['goes']=='carousel'){
                if (!in_array($stmt[$i], $selected[1])) array_push($selected[1], $stmt[$i]);
            }
       }
       return $selected;
        }else{
            return 0;
        }
	}
}

class SingleMovieController
{
    private $model;
    private $movie_name;
	
    public function __construct($model,$movie_name)
	{
        $this->model = $model;
        $this->movie_name = $movie_name;
    }
	
	public function displayMovie()
	{
        $data = $this->model->getMovie($this->movie_name);

        if ($data->rowCount() ==1){
            $stmt=$data->fetch(PDO::FETCH_ASSOC);

                    if($stmt['html_id']==$this->movie_name){
                        return $stmt;
                    }
            
            

        }else{
            return 0;
        }
	}
}


class AdminMovieController
{
    private $model;
	
    public function __construct($model)
	{
        $this->model = $model;
    }
	
	public function displayAll()
	{
       $data = $this->model->getAllMovies();
       if ($data->rowCount() > 0){
            $stmt=$data->fetchAll(PDO::FETCH_ASSOC);
            $selected=array();

            for($i = 0; $i < count($stmt); $i++){
                    array_push($selected, $stmt[$i]);
            }
            return $selected;
        }else{
            return 0;
        }
	}
}


class EditController
{
    private $model;
	
    public function __construct($model)
	{
        $this->model = $model;
    }
	
	public function updateMovie($data)
	{
       
		//title, location, summary and rules are strings so are checked if they are empty only
		if(
			isset($data['title']) && !empty($data['title']) && 
			isset($data['picture']) && !empty($data['picture'])
		) {
                $stmt=$this->model->editMovie($data['title'], $data['type'], $data['price'], $data['plot'], $data['picture']);
                if($query->rowCount() == 1){
                    return 1;
                }
				return 2;
			
		}
		return 0;
	}
}
?>