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


if(isset($_POST['id'])) {
    $user_id = $_POST['id'];
    // var_dump($user_id);

	if(isset($_POST['data'])) {
	    $json = $_POST['data'];
	    //var_dump(json_decode($json, true));
	    $obj =  json_decode($json, true);


	    $database->delete("tb_timetable",[
	    		"user_id" => $user_id,
    	]);

	    foreach ($obj as $key => $item) {
	    	// var_dump($item["scode"]);
	    	// var_dump($item);
	    	$datas = $database->insert("tb_timetable",
				[
					"user_id" => $user_id,
					"subject_code" => $item["scode"],
					"subject_name" => $item["sname"],
					"subject_color" => $item["color"],
					"subject_period" => $item["time"],
					"subject_day" => $item["cday"]
				]
			);
	    }
	    print("true");	    
	} 
}
// $datas = $database->insert("tb_news",
// 	[
// 		"news_title" => $title,
// 		"news_detail" => $detail,
// 		"isactive" => 1
// 	]
// );

// echo json_encode($title);

?>