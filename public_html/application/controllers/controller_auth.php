<?php
class Controller_Auth extends Controller
{
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		if(User::isAuthorized())
			$this->redirectMainPage();
		$this->view->generate('login.php', 'template_view.php');
	}
	
	function action_login()
	{
		if(User::isAuthorized())
			$this->redirectMainPage();
		$this->view->generate('login.php', 'template_view.php');
	}
	
	function action_enter()
	{
		try
		{
			$auth = new VKauthorization($_REQUEST, APP_ID, SECRET_KEY);
			$this->redirectMainPage();
		}
		catch(attemptToSubstituteData $e)
		{
			$e->redirect();
		}
		$this->view->generate('login.php', 'enter_valid.php');
	}
	
	public function action_exit()
	{
		VKauthorization::exit();
		$this->redirectMainPage();
	}	
	
	private function redirectMainPage()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location:'.$host);
	}
}
?>