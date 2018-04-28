<?php
class Controller
{
	public $patch;
	public $view;
	protected $user;
	
	function __construct()
	{
		try
		{
			if(!User::isAuthorized())
				throw new userNotAuthorized("пользователь не авторизирован");
			$this->user = new User();
			$this->view = new View();
		}
		catch(userNotAuthorized $e)
		{
			$e->redirect();
			//echo $e->getMessage();
		}		
	}
	
	function onPageNotFoundException($e)
	{
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/404';
		header('Location:'.$host);
	}	
	
	function action_index()
	{
	}
}
?>