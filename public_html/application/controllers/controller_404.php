<?php
class Controller_404 extends Controller
{
	protected $controller_name = "404";
	protected $action_default = "index";
	protected $template_view_default = "404";
	
	public function __construct()
	{
		$this->view = new View($this->template_view_default);
	}
	
	protected function action_index()
	{		
		$this->view->setContentView('404');
	}
}
?>