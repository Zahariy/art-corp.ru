<?php
abstract class Controller
{	
	protected $action_default = "index";
	protected $action;
	protected $action_name_prefix = "action_";
	
	//экземпляр класса View
	protected $view;
	
	protected $model;
	
	//по умолчанию устанавливается action, переданный в адресной строке
	//в данном методе мы его можем изменить, например, в зависимости от того, авторизирован пользователь, или нет
	public function execute()
	{
		$action = $this->action;
		$this->$action();
	}	
	
	public function setDefaultAction($action)
	{
		if(empty($action)) $action = $this->action_default;		
		if(!method_exists($this, $this->action_name_prefix.$action))
			$action = "redirect_404";
		$this->action = $this->action_name_prefix.$action;
	}
	
	protected function action_redirect_404()
	{
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		$this->redirect('404');
	}
	
	protected function redirect_auth()
	{
		$this->redirect('auth');
	}
	
	protected function redirect($path = '')
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/'.$path;
		header('Location:'.$host);
	}
	
	protected function setView(View $view)
	{
		$this->view = $view;
	}
	
	public function generateView()
	{
		$this->view->generate();
	}
}
?>

