<?php
class Model_auth extends Model
{
	public function __construct()
	{
		$folder = self::$class_folder;
		include $folder."vkauthorization.php";
		include $folder."user.php";
	}
	
	public function getVkAuth($appId, $secretKey)
	{
		return new VKauthorization($appId, $secretKey);
	}
}
?>