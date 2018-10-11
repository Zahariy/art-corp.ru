<?php
class User
{
	private $uid = false;
	private $vkId;
	private $firstName;
	private $lastName;
	private $photo;
	private $photoRec;
	private $hash;

	public static function isAuthorized()
	{
		if(isset($_SESSION['VKuid']))
			return true;
		else return false;
	}
	
	public static function getUidBySession()
	{
		return $_SESSION['VKuid'];
	}
	
	public static function vkRegistration($db, $vkData)
	{
		$date = time();
		$db->query("INSERT INTO users (vk_id, first_name, last_name, reg_date, photo, photo_rec, hash) 
			VALUES ('".$vkData['uid']."', '".$vkData['first_name']."', '".$vkData['last_name']."', '".$date."', '".$vkData['photo']."', '".$vkData['photo_rec']."', '".$vkData['hash']."')");
	}
	
	public function __construct($uid)
	{
		//для теста
		
		$db = DB::getDB();
		
	}
} 
?>