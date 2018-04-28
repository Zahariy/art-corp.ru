<?php
class PageNotFoundException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
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