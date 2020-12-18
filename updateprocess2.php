<?php

include_once('config.php');
$e_fun = new Eventfunction();

$json = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	if(isset($_POST['name']) && isset($_POST['location']) && isset($_POST['organizer']) && isset($_POST['date']) && isset($_POST['category']) && isset($_POST['dataval'])){

		$name = $e_fun->htmlvalidation($_POST['name']);
		$location = $e_fun->htmlvalidation($_POST['location']);
		$organizer = $e_fun->htmlvalidation($_POST['organizer']);
		$date = $e_fun->htmlvalidation($_POST['date']);
		$category = $e_fun->htmlvalidation($_POST['category']);
		$update_id = $e_fun->htmlvalidation($_POST['dataval']);

		if((!preg_match('/^[ ]*$/', $name)) && (!preg_match('/^[ ]*$/', $location)) && (!preg_match('/^[ ]*$/', $organizer)) && (!preg_match('/^[ ]*$/', $category)) && ($date != NULL)){

			$condition['u_id'] = $update_id;

			$field_val['name'] = $name;
			$field_val['location'] = $location;
			$field_val['category'] = $category;
			$field_val['organizer'] = $organizer;
			$field_val['date'] = $date;	

			$update = $e_fun->update("events", $field_val, $condition);

			if($update){
				$json['status'] = 101;
				$json['msg'] = "Data Successfully Updated";
			}
			else{
				$json['status'] = 102;
				$json['msg'] = "Data Not Updated";
			}

		}
		else{

			if(preg_match('/^[ ]*$/', $name)){

				$json['status'] = 103;
				$json['msg'] = "Please Enter name";

			}
			if(preg_match('/^[ ]*$/', $location)){

				$json['status'] = 104;
				$json['msg'] = "Please Enter location";

			}
			if(preg_match('/^[ ]*$/', $organizer)){

				$json['status'] = 105;
				$json['msg'] = "Please Select organizer";

			}
			if(preg_match('/^[ ]*$/', $category)){

				$json['status'] = 106;
				$json['msg'] = "Please Choice category";

			}
			if($date == NULL){

				$json['status'] = 107;
				$json['msg'] = "Please Enter date";

			}

		}

	}
	else{

		$json['status'] = 108;
		$json['msg'] = "Invalid Values Passed";

	}

}
else{

	$json['status'] = 109;
	$json['msg'] = "Invalid Method Found";

}


echo json_encode($json);

?>