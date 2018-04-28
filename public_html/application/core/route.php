<?php
class Route
{
	static function start()
	{
		$controller_name = 'Main';
		$action_name = 'index';
		
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$routes = explode('/', $path);

		if (!empty($routes[1]))
		{	
			$controller_name = $routes[1];
		}
		
		if (!empty($routes[2]))
		{
			$action_name = $routes[2];
		}
		
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		
		try
		{
			if(!file_exists($controller_path))
				throw new PageNotFoundException("нет файла контроллера");
			include "application/controllers/".$controller_file;
			$controller = new $controller_name();
		}
		catch(PageNotFoundException $e)
		{
			$controller = new Controller();
			$controller->onPageNotFoundException($e);
		}

		$action = $action_name;
		
		try
		{
			if(!method_exists($controller, $action))
			{
				throw new PageNotFoundException("нет экшена в классе контроллере");
			}
			$controller->$action();
		}
		catch(Exception $e)
		{
			$onException = 'on'.get_class($e);
			$controller->$onException($e);
		}		
	}
}

?>