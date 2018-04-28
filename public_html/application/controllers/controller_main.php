<?php
class Controller_Main extends Controller
{
	public function __construct()
	{
		
		if(!User::isAuthorized())
			throw new UserNotAuthorizedException("пользователь не авторизирован");
		$this->user = new User();
		$this->view = new View();
	}

	function action_index()
	{	
		$this->view->generate('main.php', 'template_view.php');
	}
}
?>