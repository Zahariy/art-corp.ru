<?php
class Controller_Auth extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		if(!User::isAuthorized())
			throw new UserNotAuthorizedException("пользователь не авторизирован");
		$this->view->generate('login.php', 'template_view.php');
	}
	
	function action_login()
	{
		if(!User::isAuthorized())
			throw new UserNotAuthorizedException("пользователь не авторизирован");
		$this->view->generate('login.php', 'template_view.php');
	}
	
	function action_enter()
	{
		$auth = new VKauthorization($_REQUEST, APP_ID, SECRET_KEY);
		$this->redirectMainPage();
		$this->view->generate('login.php', 'enter_valid.php');
	}
	
	public function action_exit()
	{
		VKauthorization::exit();
		$this->redirectMainPage();
	}

	public function onAttemptToSubstituteDataException($e)
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/auth/login';
		header('Location:'.$host);
	}
}
?>