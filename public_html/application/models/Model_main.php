<?php
class Model_main extends Model
{
	public function __construct()
	{
		$folder = self::$class_folder;
		include $folder."vkauthorization.php";
		include $folder."user.php";
	}
}
?>