<?php
class VKauthorization
{
	protected $vkData;
	
	public static function exit()
	{
		unset($_SESSION['VKuid']);
		session_destroy();
	}
	
	public  function __construct($vkData, $appId, $secretKey)
	{
		if(!$this->isRealVK($vkData, $appId, $secretKey))
			throw new AttemptToSubstituteDataException("подмена данных");
		$this->vkData = $vkData;
		try
		{
			$this->userRegistration();
		}
		catch (PDOException $e)
		{
			//пользователь уже был зарегистрирован
		}
		$this->setSession();
	}
	
	private function setSession()
	{
		$_SESSION['VKuid'] = $this->vkData['uid'];
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
	
	private function userRegistration()
	{
		$db = DB::getDB();
		User::vkRegistration($db, $this->vkData);
	}
}
?>