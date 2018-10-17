<?php
class DB
{
	protected static $DB;
	protected static $inst;
	
	protected static $host = 'localhost';
	protected static $dbname = 'co69854_ac';
	protected static $user = 'co69854_ac';
	protected static $pass = 'Az159220891';
	protected static $charset = 'utf8';
	protected static $opt = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
		PDO::ATTR_PERSISTENT => true,
	];
	
	protected function __construct()
	{
		$dsn = "mysql:host=".self::$host.";dbname=".self::$dbname.";charset=".self::$charset;
		self::$DB = new PDO($dsn, self::$user, self::$pass, self::$opt);
	}
	
	public static function getDB()
	{
		if(empty(self::$inst))
			self::$inst = new DB();
		return self::$DB;
	}
	
	private function __clone()
	{
		
	}
	
	private function __wakeup() 
	{
		
	}
}
?>