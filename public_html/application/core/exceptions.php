<?php
class NotFound404Exception extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
	public function redirect()
	{
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
		header('Location:'.$host);
	}
}

class UserNotAuthorized extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
	public function redirect()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/auth/login';
		header('Location:'.$host);
	}
}

class attemptToSubstituteData extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
	public function redirect()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/auth/login';
		header('Location:'.$host);
	}
}
?>