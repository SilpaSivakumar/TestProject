<?php
require_once('Config.php');

	Class DBlink
	{
		
		Public Function DBConnect()
		{
$ENV=__DIR__.'\.env';
		
		
	
	if(!file_exists($ENV))
	{
		print_r("Pls add .env file");
		exit();
	}
	
	
require_once realpath(__DIR__ . '/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
		
$Conf=new ConfigModels();
$Conf->SetServer($_ENV['HOST']);
$Conf->SetUser($_ENV['DATABASE_USER']);
$Conf->SetDatabase($_ENV['DATABASE_NAME']);
$Conf->SetPassword($_ENV['DATABASE_PASSWORD']);


$server=$Conf->GetServer($_ENV['HOST']);
$user=$Conf->GetUser($_ENV['DATABASE_USER']);
$dbname=$Conf->GetDatabase($_ENV['DATABASE_NAME']);
$pwd=$Conf->GetPassword($_ENV['DATABASE_PASSWORD']);


return $con = mysqli_connect($server,$user,$pwd,$dbname);
	}
	
	function findQuery($sql="", $link = "")
	{
		$fieldtype = array();     
		$fieldvalue=array(); 	
		$type=array();	
		$data=array();
		if(!$link){
			$Conf=New DBlink();

			$link = $Conf->DBConnect();
		}
		$rs=mysqli_query($link,$sql) or die(mysqli_error());
		$countrow=mysqli_num_rows($rs);  
		$countoffield=mysqli_num_fields($rs);
		$finfo = $rs->fetch_fields();
		foreach ($finfo as $val) {
		    array_push($fieldtype , $val->name);  
		    array_push($type , $val->type);	
		}
		for($i=0;$i<$countrow;$i++) { 
		    $fieldvalue[$i]=mysqli_fetch_row($rs);    
		    $data[$i] = array_combine( $fieldtype , $fieldvalue[$i] );   
		    
		} 
		return $data; 	
	}
	}
?>