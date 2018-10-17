<?php
class Model_project extends Model
{
	public function __construct()
	{
		$folder = self::$class_folder;
		require_once $folder."DB.php";
		require_once $folder."user.php";
	}
}
?>