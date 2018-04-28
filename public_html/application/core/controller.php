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
	
	function action_index()
	{
	}
}
?>