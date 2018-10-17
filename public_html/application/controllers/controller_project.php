<?php
class Controller_Project extends Controller
{
	protected $controller_name = "project";
	protected $action_default = "list";
	protected $template_view_default = "main";
	protected $user;
	
	public function __construct()
	{
		$this->model = Model::getModel($this->controller_name);
 		if(!User::isAuthorized())
			$this->redirect('auth/');
		$uid = USER::getUidBySession();
		$this->user = new User($uid);
		$this->view = new View($this->template_view_default);
	}

	public function action_list()
	{	
		$this->view->setContentView('project_list');
	}
}
?>