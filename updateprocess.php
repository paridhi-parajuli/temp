<?php

include_once('config.php');
$e_fun = new EventFunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['checkid']) && $_GET['checkid'] > 0){

		$update_ch_id = $e_fun->htmlvalidation($_GET['checkid']);

		$condition0['id'] = $update_ch_id;
		$select_pre = $e_fun->select_assoc("events", $condition0);

		if($select_pre){

			$json['status'] = 0;
			$json['name'] = $select_pre['name'];
			$json['location'] = $select_pre['location'];
			$json['organizer'] = $select_pre['organizer'];
			$json['date'] = $select_pre['date'];
			$json['category'] = $select_pre['category'];
			$json['msg'] = "Success";

		}
		else{

			$json['status'] = 1;
			$json['name'] = "NULL";
			$json['location'] = "NULL";
			$json['organizer'] = "NULL";
			$json['date'] = "NULL";
			$json['category'] = "NULL";
			$json['msg'] = "Fail";

		}

	}
	else{
			$json['status'] = 2;
			$json['name'] = "NULL";
			$json['location'] = "NULL";
			$json['organizer'] = "NULL";
			$json['date'] = "NULL";
			$json['category'] = "NULL";
			$json['msg'] = "Invalid Values Passed";
	}
}
else{
			$json['status'] = 3;
			$json['name'] = "NULL";
			$json['location'] = "NULL";
			$json['organizer'] = "NULL";
			$json['date'] = "NULL";
			$json['category'] = "NULL";
			$json['msg'] = "Invalid Method Found";
}


echo json_encode($json);

?>