<?php


// Include Medoo
require_once 'medoo.php';

// Initialize
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'ict_siit',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'usbw',
    'port' => '3307',
]);

// $datas = $database->select("tb_test","*");

 

// foreach ($datas as $key => $value) {

	
// 	print $value["id"]	;
// 	# code...
// }

?>