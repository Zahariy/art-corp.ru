<?php
class Model_auth extends Model
{
	public function __construct()
	{
		$folder = self::$class_folder;
		require_once $folder."DB.php";
		require_once $folder."vkauthorization.php";
		require_once $folder."user.php";
	}
	
	public function getVkAuth($appId, $secretKey)
	{
		return new VKauthorization($appId, $secretKey);
	}
}
?>