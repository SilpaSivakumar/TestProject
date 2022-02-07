<?php
	error_reporting(1);
	ini_set('max_execution_time', 0);
	ini_set('post_max_size', '64M');
  	ini_set('upload_max_filesize', '64M');
	if(!session_start()){session_start();}
	
	class ConfigModels
	{
		
		Private $Server;
		Private $Database;
		Private $user;
		Private $Password;
		
		
		
public function SetServer($Server)
{
	
	if(!$Server)
	{
		print_r("Please add server name in .env file");
		exit();
	}
	$this->Server=$Server;
}

public function GetServer()
{
	
	return $this->Server;
}

public function SetUser($User)
{
	if(!$User)
	{
		print_r("Please add User name in .env file");
		exit();
	}
	$this->user=$User;
}

public function GetUser()
{
	return $this->user;
}

public function SetDatabase($Db)
{
	if(!$Db)
	{
		print_r("Please add Database name in .env file");
		exit();
	}
	$this->Database=$Db;
}


public function GetDatabase()
{
	return $this->Database;
}

public function SetPassword($Password)
{
	
	$this->Password=$Password;
}

public function GetPassword()
{
	return $this->Password;
}	
	
}



	



	
?>
