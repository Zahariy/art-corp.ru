<?php
class Controller_404 extends Controller
{
	public function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{		
		$this->view->generate('404.php', 'template_view.php');
	}
}
?>