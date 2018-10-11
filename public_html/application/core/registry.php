<?php
//реестр, хранящий параметры конфигурации, сессионные данные и прочие данные, доступ к которым необходим из любой точки системы
//реализовать дочерний класс config, читающий различные типы файлов конфигурации
//реализовать класс сохраняющий информацию в сессию
abstract class Registry
{
	abstract protected function __construct();
	abstract public function get($key);
	abstract public function set($key, $value);
	
	private static $request = null;
	
	public static function getRequest()
	{
		if(is_null(self::$request))
			self::$request = new Request();
		return self::$request;
	}
}

//класс, хранящий информацию о запросе
class Request extends Registry
{
	private $values = array();
	
	protected function __construct()
	{
		//сделать свойство, хранящее адрес данной страницы и метод, возвращающий его
		//сохранять все get и post параметры
		$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$route = explode('/', $path);
		$this->values['controller'] = $route[1];
		if(isset($route[2]))
			$this->values['action'] = $route[2];
	}
	
	public function get($key)
	{
		if(isset($this->values[$key]))
			return $this->values[$key];
		return null;
	}
	
	public function set($key, $value)
	{
		
	}
}
?>