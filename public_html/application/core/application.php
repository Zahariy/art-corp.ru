<?php
class Application
{
	//имя контроллера
	private static $controller_name;
	//имя контроллера по-умолчанию
	private static $controller_name_default = "Main";
	//префикс для имен контроллеров	
	private static $controller_file_prefix = "Controller_";	
	//имя для контроллера при отсутствии необходимого контроллера
	private static $controller_name_file_not_found = "404";	
	//каталог с файлами контроллеров
	private static $controller_folder = "application/controllers/";
		
	private function __construct()	{}
	
	//статическая функция, возвращающая экземпляр класса контроллера в зависимости от URL
	public static function getController()
	{
		$request = Registry::getRequest();
		self::setControllerName($request->get('controller'));
		if(!self::includeControllerFile())
		{
			self::setControllerName(self::$controller_name_file_not_found);
			$action = 'redirect_404';
		}
		else $action = $request->get('action');
		if(!class_exists(self::$controller_name))
			throw new ControllerCalssNotExistsException(self::$controller_name);
		$controller = new self::$controller_name();
		$controller->setDefaultAction($action);
		return $controller;
	}
	
	//устанавливает имя контроллера в статическое свойство класса
	private static function setControllerName($name)
	{
		if (empty($name)) $name = self::$controller_name_default;
		self::$controller_name = self::$controller_file_prefix.$name;
	}
	
	//подключает файл с необходимым контроллером
	//если такого нет, подключает файл с контроллером для отсутствующей страницы
	private static function includeControllerFile()
	{
		$controller_file = strtolower(self::$controller_name).'.php';
		$controller_path = self::$controller_folder.$controller_file;
		if(!file_exists($controller_path))
		{
			$controller_path = self::$controller_folder.self::$controller_file_prefix.self::$controller_name_file_not_found.'.php';
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