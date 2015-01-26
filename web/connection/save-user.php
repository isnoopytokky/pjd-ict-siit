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


$email = trim($_POST['email']);
$pic_url = trim($_POST['pic_url']);
$full_name_th = trim($_POST['full_name_th']);
$full_name_en = trim($_POST['full_name_en']);
$role_th = trim($_POST['role_th']);
$role = trim($_POST['role']);
$department = trim($_POST['department']);
$department_th = trim($_POST['department_th']);

 
if (isset($_POST['id']) )
{
	$id = trim($_POST['id']);
	$datas = $database->update("tb_users",
		[
			"email" => $email ,
			"pic_url" => $pic_url ,
			"full_name_th" => $full_name_th ,
			"full_name_en" => $full_name_en ,
			"role_th" => $role_th ,
			"role" => $role ,
			"department" => $department ,
			"department_th" => $department_th 
		],
		["id" => $id]
	);
}
else
{
	$datas = $database->insert("tb_users",
		[			
			"email" => $email ,
			"pic_url" => $pic_url ,
			"full_name_th" => $full_name_th ,
			"full_name_en" => $full_name_en ,
			"role_th" => $role_th ,
			"role" => $role ,
			"department" => $department ,
			"department_th" => $department_th 
		]
	);
}
echo json_encode($email);
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