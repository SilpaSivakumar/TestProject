<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type');
 
$site = $_SERVER['DOCUMENT_ROOT'];  
require_once('DBlink.php');


$Conf=New DBlink();
$Conf->DBConnect();

$id = (int)$_REQUEST['id'];



if($id>0)
{
    $data = $Conf->findQuery("select Employee.* from Employee where Employee.id=$id ");
}

else
{
    $data = $Conf->findQuery("select Employee.* from Employee  order by Employee.id Desc  ");
}


 if(!$data)
    {
            $message = "false";
	      $data2[] = array("error" => "No details found" );

    }
    else
    {
        for($i=0;$i<count($data);$i++)
        {
            if($data[$i]['id'])
            {
                
                
                
                
			 $message = "true";
				    $data2[] = array( 			
							"id" => $data[$i]['id'],
							"Name" => $data[$i]['Name'],
							"Age" => $data[$i]['Age'],
							"Qualification" => $data[$i]['Qualification'],
								"Address" => $data[$i]['Address'],
								
                             
                            
                              
                                    ); 

}
}
}
echo json_encode(array("Status" => $message, "data" => $data2));
return;
?>	   
