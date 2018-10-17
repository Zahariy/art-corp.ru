<?php
class Route
{
	private static $route = null;

	private $controller_name;
	private $controller_name_default = "Main";
	private $controller_file_prefix = "controller_";
	private $controller_name_file_not_found = "404";
	private $controller_folder = "application/controllers/";

	private function __construct() {}

	public static function start()
	{
		if(is_null(self::$route))
		{
			self::$route = new Route();
		}
		$route = self::$route;

		try
		{		
			$controller = $route->getController();
			$controller->execute();
			$controller->generateView();
			echo "<pre>";
			print_r($controller);
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}

	private function getController()
	{
		$request = Registry::getRequest();
		$this->setControllerName($request->get('controller'));
		if(!$this->includeControllerFile())
		{
			$this->setControllerName($this->controller_name_file_not_found);
			$action = 'redirect_404';
		}
		else $action = $request->get('action');
		if(!class_exists($this->controller_name))
			throw new ControllerClassNotExistsException($this->controller_name);
		$controller = new $this->controller_name();
		$controller->setDefaultAction($action);
		return $controller;
	}

	private function setControllerName($name)
	{
		if (empty($name)) $name = $this->controller_name_default;
		$this->controller_name = $this->controller_file_prefix.$name;
	}

	private function includeControllerFile()
	{
		$controller_file = strtolower($this->controller_name).'.php';
		$controller_path = $this->controller_folder.$controller_file;
		if(!file_exists($controller_path))
		{
			$controller_path = $this->controller_folder.$this->controller_file_prefix.$this->controller_name_file_not_found.'.php';
			include $controller_path;
			return false;
		}
		else
		{
			include $controller_path;
			return true;
		}
	}
}

?>