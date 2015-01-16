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
$id = $_POST['id'];
 

$datas = $database->update("tb_news",
	[
		"news_title" => $title,
		"news_detail" => $detail
	],
	["id" => $id]
);

echo json_encode($id);
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