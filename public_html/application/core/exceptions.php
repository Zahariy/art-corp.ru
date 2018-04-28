<?php
class PageNotFoundException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}

class AttemptToSubstituteDataException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}

class UserNotAuthorizedException extends Exception
{
	public function __construct($data)
	{
		$this->message = "$data";
	}
}
?>