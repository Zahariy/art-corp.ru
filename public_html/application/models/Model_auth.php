<?php
class VKauthorization
{
	private  $VKuid;
	
	public static function exit()
	{
		unset($_SESSION['VKuid']);
		session_destroy();
	}
	
	public  function __construct($vkData, $appId, $secretKey)
	{
		if(!$this->isRealVK($vkData, $appId, $secretKey))
			throw new AttemptToSubstituteDataException("подмена данных");
		$this->VKuid = $vkData['uid'];
		$this->setSession();
	}
	
	private function setSession()
	{
		$_SESSION['VKuid'] = $this->VKuid;
	}
	
	private function isRealVK($vkData, $appId, $secretKey)
	{
		if(!is_array($vkData))
			return false;
		if(!isset($vkData['uid']) || !isset($vkData['hash']))
			return false;
		if(md5($appId.$vkData['uid'].$secretKey) != $vkData['hash'])
			return false;
		return true;
	}
	
	//методы добавления пользователя в БД
}
?>