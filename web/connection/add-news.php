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


$detail = $_POST['detail'];
$title = $_POST['title'];
 

$datas = $database->insert("tb_news",
	[
		"news_title" => $title,
		"news_detail" => $detail,
		"isactive" => 1
	]
);

echo json_encode($title);

?>