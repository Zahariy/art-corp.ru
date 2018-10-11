<?php
class View
{
	protected $template_view;
	protected $content_view;
	protected $data = array();
	protected $isCorrectTemplate = false;
	protected $isCorrectContent = false;
	
	protected $view_folder = "application/views/";
	protected $prefix_template = "template_";
	protected $prefix_content = "content_";
	protected $file_type = ".php";
	
	//установить data!
	public function __construct($template = null, $content = null, $data = null)
	{
		$this->setTemplateView($template);
		$this->setContentView($content);
		if(!empty($data)) $this->data = $data;
	}
	
	public function setTemplateView($file)
	{
		if(empty($file)) return;
		$template = $this->view_folder.$this->prefix_template.$file.$this->file_type;
		if(!$this->issetFile($template))
			throw new ViewNotExistsException($template);
		$this->template_view = $template;
		$this->isCorrectTemplate = true;
	}
	
	public function setContentView($file)
	{
		if(empty($file)) return;
		$content = $this->view_folder.$this->prefix_content.$file.$this->file_type;
		if(!$this->issetFile($content))
			throw new ViewNotExistsException($content);
		$this->content_view = $content;
		$this->isCorrectContent = true;
	}
	
	public function generate()
	{
		if($this->isCorrectTemplate)
			include $this->template_view;
		else throw new ViewNotInstalledException();
	}
	
	protected function generateContent()
	{
		if($this->isCorrectContent)
			include $this->content_view;
		else throw new ViewNotInstalledException();
	}
	
	protected function issetFile($name)
	{
		if(!file_exists($name))
			return false;
		return true;
	}
}
?>