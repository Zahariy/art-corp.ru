<?php
class Controller_Main extends Controller
{
	protected $controller_name = "main";
	protected $action_default = "index";
	protected $template_view_default = "main";
	protected $user;
	
	public function __construct()
	{
		$this->model = Model::getModel($this->controller_name);
		//переписать класс юзер
 		if(!User::isAuthorized())
			$this->redirect('auth/');
		$uid = User::getUidBySession();
		$this->user = new User($uid);
		$this->view = new View($this->template_view_default);
	}

	public function action_index()
	{	
		$this->view->setContentView('main');
	}
}
?>