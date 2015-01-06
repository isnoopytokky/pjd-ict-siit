<?php

session_start();

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
print "waiting for login";
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
	$_SESSION["user_name"] = $txt_username;
	$_SESSION["user_role"] = $user_role;
	
}
else
{
	//wrong user or pass
	if(isset($_SESSION["user_name"] ))
		unset($_SESSION["user_name"] );	
	if(isset($_SESSION["user_role"] ))
		unset($_SESSION["user_role"] );	
		
}

print '<meta http-equiv="refresh" content="0;url=/pjd-ict-siit/web/index.php">';

?>