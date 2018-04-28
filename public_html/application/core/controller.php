<?php
class Controller
{
	public $patch;
	public $view;
	protected $user;
	
	public function __construct()
	{
	}
	
	public function onPageNotFoundException($e)
	{
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
		header('Location:'.$host);
	}

	public function onUserNotAuthorizedException($e)
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/auth';
		header('Location:'.$host);
	}

	public function redirectMainPage()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location:'.$host);
	}
	
	function action_index()
	{
	}
}
?>