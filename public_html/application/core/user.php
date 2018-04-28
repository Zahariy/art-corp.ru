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
	
	public function __construct()
	{
		
	}
} 
?>