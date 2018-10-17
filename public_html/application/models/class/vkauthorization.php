<?php
//создать класс Authorization, наследовать от него VKauthorization (задел на другие способы авторизации)
//Exit вынести в базовый класс
//setSession вынести в базовый класс
//для регистрации пользователя создать экземпляр User, заполнив его всеми данными, полученными от VK
//затем передать его в статический метод базоваого DAO-класса
//он вернёт экземпляр DAO_User с сохранённым в свойстве экземпляром User
//вызвать метод vkRegistration, который попытается записать такого пользователя в БД, если нет совпадений по vk_id

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