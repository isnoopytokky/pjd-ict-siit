<?php

session_start();

// Include Medoo
require_once 'conn-db.php';

// // Initialize
// $database = new medoo([
//     'database_type' => 'mysql',
//     'database_name' => 'ict_siit',
//     'server' => 'localhost',
//     'username' => 'root',
//     'password' => 'usbw',
//     'port' => '3307',
// ]);

//check login 

$id = $_POST['id']; 

$item = $database->select("tb_timetable","*",
				[
					
					"user_id" => $id
							
				]);
 
if(!empty($item))
{
	echo json_encode($item);
}
else
{
	echo json_encode(null);	
}

//print '<meta http-equiv="refresh" content="0;url=/pjd-ict-siit/web/index.php">';

?>