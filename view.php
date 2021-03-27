<?php
class LoginView
{
    private $controller;
	
    public function __construct($controller)
	{
        $this->controller = $controller;
    }
	
	public function send_competition($data)
	{
        return $this->controller->login($data);
	}
	
    public function output()
	{
		require_once 'login.php';
	}	
}


class ViewMovies
{
    private $controller;
	
    public function __construct($controller)
	{
        $this->controller = $controller;
    }
	
    public function output()
	{
        $data_tmp = $this->controller->displayFirst();

		$newMovies = $data_tmp[0];
		$carousel = $data_tmp[1];
		require_once 'all.php';
    }
}

class ViewMovie
{
    private $controller;
	
    public function __construct($controller)
	{
        $this->controller = $controller;
    }
	
    public function output()
	{
        $movie = $this->controller->displayMovie();
       
		require_once 'showOne.php';
    }
}

class AdminViewMovies
{
    private $controller;
	
    public function __construct($controller)
	{
        $this->controller = $controller;
    }
	
    public function output()
	{
        $movies = $this->controller->displayAll();
		require_once 'viewMovies.php';
    }
}

class AdminEditView
{
    private $controller;
	
    public function __construct($controller)
	{
        $this->controller = $controller;
    }
	
	public function update_movie($data)
	{
        return $this->controller->updateMovie($data);
	}
	
    public function output()
	{
        $movie = $this->controller->displayMovie();
		require_once 'editMovie.php';
	}	
}
?>