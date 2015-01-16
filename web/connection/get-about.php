<?php

session_start();

// Include Medoo
require_once 'conn-db.php';


$datas = $database->select("tb_configurations",
	"conf_value",
	[
		"conf_name" => "about_description",	
		"LIMIT" => 1
	]
);

echo json_encode($datas);
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