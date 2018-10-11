<?php
class PageNotFoundException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}

class ControllerCalssNotExistsException extends Exception
{
	public function __construct($data)
	{
		$this->message = "Класс контроллера $data не существует";
	}
}

class ModelFileNotFoundException extends Exception
{
	public function __construct($data)
	{
		$this->message = "Файл модели $data не существует";
	}
}

class ModelClassNotExistsException extends Exception
{
	public function __construct($data)
	{
		$this->message = "Класс модели $data не существует";
	}
}

class ViewNotExistsException extends Exception
{
	public function __construct($data)
	{
		$this->message = "Файла вида $data не существует";
	}
}

class ViewNotInstalledException extends Exception
{
	public function __construct()
	{
		$this->message = "Файл вида не установлен";
	}
}
class AttemptToSubstituteDataException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}

class UserNotAuthorizedException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}


?>