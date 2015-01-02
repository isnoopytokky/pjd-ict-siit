<?php


// Include Medoo
require_once 'test-db.php';

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

$txt_username = $_POST['txt_username']; 
$txt_password = $_POST['txt_password'];


$datas = $database->select("tb_users","*",
	[   "AND" =>
		[
			"username" => $txt_username,
			"password" => $txt_password
		]
	]
);

 
if(!empty($datas))
{
	$user_role = $datas[0]["role"];
	//has user
	$_Session["user_name"] = $txt_username;
	$_Session["user_role"] = $user_role;

	print ($_Session["user_name"] );
	print ($_Session["user_role"] );
}
else
{
	//wrong user or pass
	if(isset($_Session["user_name"] ))
		unset($_Session["user_name"] );	
	if(isset($_Session["user_role"] ))
		unset($_Session["user_role"] );	
		
}


?>