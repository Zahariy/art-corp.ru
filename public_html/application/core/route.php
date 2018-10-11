<?php
class Route
{
	static function start()
	{
		try
		{
			$application = Application::getController();
			$application->execute();
			$application->generateView();
			echo "<pre>";
			print_r($application);
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}
}

?>