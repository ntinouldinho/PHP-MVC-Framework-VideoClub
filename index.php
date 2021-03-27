<?php
	setlocale(LC_ALL, 'el_GR.UTF-8');
	
require_once 'session.php';
require_once 'database.php';
require_once 'view.php';
require_once 'model.php';
require_once 'controller.php';

$database = new database();
$db = $database->getConnection();

	$server_params = explode('/', $_SERVER['REQUEST_URI']);
	
if(isset($_SESSION['loggedin'])){
	if($server_params[2] == 'viewAllMovies')
	{
		echo "in";
		$model = new Movies($db);
		$controller = new MovieController($model);
		$view = new ViewMovies($controller);
		echo $view->output();
		
	 }
	else if($server_params[2] == 'movieDetails' && isset($server_params[3]))
	{
		$page_now = 'details';
		
		require_once 'header.php';
		
		$model = new Movies($db);
		$controller = new SingleMovieController($model, $server_params[3]);
		$view = new ViewMovie($controller);
		echo $view->output();
		
	}
	else if($server_params[2] == 'viewMovies')
	{
		$page_now = 'viewMovies';
		//require_once 'header.php';
		$model = new Movies($db);
		$controller = new AdminMovieController($model);
		$view = new AdminViewMovies($controller);
		echo $view->output();
		
	}
	else if($server_params[2] == 'edit' && isset($server_params[3]))
	{
		$page_now = 'edit';
		//require_once 'header.php';
		if(count($_POST) > 0){
			$model = new Movies($db);
			$controller = new EditController($model);
			$view = new AdminEditView($controller);
			echo $view->update_movie($_POST);
		}else
		{
			$model = new Movies($db);
			$controller = new SingleMovieController($model, $server_params[3]);
			$view = new AdminEditView($controller);
			echo $view->output();
		}
	}
	else
	{
		$page_now = 'login';

		$model = new GeneralClass($db);
		$controller = new LoginController($model);
		$view = new LoginView($controller);
		
		if(count($_POST) > 0){
			echo $view->send_competition($_POST);
		}else
		{
			echo $view->output();
		}
	}
}else{
	$page_now = 'login';

		$model = new GeneralClass($db);
		$controller = new LoginController($model);
		$view = new LoginView($controller);
		
		if(count($_POST) > 0){
			echo $view->send_competition($_POST);
		}else
		{
			echo $view->output();
		}
}
?>