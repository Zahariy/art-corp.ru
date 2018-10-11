<?php
class Controller_Auth extends Controller
{
	protected $controller_name = "auth";
	protected $action_default = "index";
	protected $template_view_default = "not_auth";
	
	function __construct()
	{
		$this->model = Model::getModel($this->controller_name);
		
		if(User::isAuthorized())
			$this->redirect();
		$this->view = new View($this->template_view_default);
	}
	
	function action_index()
	{
		$this->view->setContentView('login');
	}
	
	function action_enter()
	{
		//извлекать эти параметры из реестра
		define("APP_ID", 6451950);
		define("SECRET_KEY", "NEasfgCvxrSfDkHfVlER");
	
		$auth = new VKauthorization($_REQUEST, APP_ID, SECRET_KEY);
		$this->redirect();
	}
	
	public function action_exit()
	{
		VKauthorization::exit();
		$this->redirect_auth();
	}

	public function onAttemptToSubstituteDataException($e)
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/auth/';
		header('Location:'.$host);
	}
}
?>