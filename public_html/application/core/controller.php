<?php
class Controller
{
	public $patch;
	public $view;
	protected $user;
	
	function __construct()
	{
		if(!User::isAuthorized())
			throw new UserNotAuthorizedException("пользователь не авторизирован");
		$this->user = new User();
		$this->view = new View();
	}
	
	function onPageNotFoundException($e)
	{
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
		header('Location:'.$host);
	}

	private function redirectMainPage()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location:'.$host);
	}

	function onUserNotAuthorized($e)
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location:'.$host);
	}
	
	function action_index()
	{
	}
}
?>