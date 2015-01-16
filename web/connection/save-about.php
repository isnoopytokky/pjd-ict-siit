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

$html = $_POST['html'];


$datas = $database->update("tb_configurations",
	["conf_value" => $html],
	["conf_name" => "about_description"]
);

echo json_encode($html);
// if(!empty($datas))
// {
// 	echo json_encode($html);
// }
// else
// {
// 	echo json_encode(null);	
// }

//print '<meta http-equiv="refresh" content="0;url=/pjd-ict-siit/web/index.php">';

?>