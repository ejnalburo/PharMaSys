<?php

// type your code here
 
include 'config.php';

	$brand = $generic = $strength = $form = $quantity = $direction = $error = $action = $patientID = $inventoryID = "";
	$valid = true;

	

	if(isset($_POST['patientID']) && !empty($_POST['patientID'])){
 		$patientID = mysqli_real_escape_string($conn,$_POST['patientID']);
	}else{
 		$valid = false;
 		$error .= "* Patient ID field is required!\n";
 		$patientID = '';
	}


	if(isset($_POST['brand']) && !empty($_POST['brand'])){
 		$brand = mysqli_real_escape_string($conn,$_POST['brand']);
	}else{
 		$valid = false;
 		$error .= "* Brand field is required!\n";
 		$brand = '';
	}


	
	if(isset($_POST['generic']) && !empty($_POST['generic'])){
 		$generic = mysqli_real_escape_string($conn,$_POST['generic']);
	}else{
	 	$valid = false;
 		$error .= "* Generic field is required!\n";
 		$generic = '';
	}



	if(isset($_POST['strength']) && !empty($_POST['strength'])){
 		$strength = mysqli_real_escape_string($conn,$_POST['strength']);
	}else{
 		$valid = false;
 		$error .= "* Strength field is required!\n";
 		$strength = '';
	}


		if(isset($_POST['form']) && !empty($_POST['form'])){
 		$form = mysqli_real_escape_string($conn,$_POST['form']);
	}else{
 		$valid = false;
 		$error .= "* Form field is required!\n";
 		$form = '';
	}

	


	if(isset($_POST['direction']) && !empty($_POST['direction'])){
 		$direction = $_POST['direction'];
	}else{
		$valid = false;
 		$error .= "* Direction of Use field is required!\n";
 		$direction = "";
 	}



	if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
 		$quantity = $_POST['quantity'];
	}else{
		$valid = false;
 		$error .= "* Quantity field is required!\n";
 		$quantity = "";
 	}



	if($valid){


 			$sql = "INSERT INTO prescription(prescriptionID, patientID, brand, generic, strength, form, direction, quantity, consult_date)VALUES (NULL, '$patientID', '$brand', '$generic', '$strength', '$form', '$direction', '$quantity', curdate())";
 			$query = mysqli_query($conn, $sql);
 			
 			if($query){
 				$retrive_sql = "SELECT * FROM prescription WHERE transID = 0 AND prescriptionID=(SELECT MAX(prescriptionID) FROM prescription)";
 				$retrive_query = mysqli_query($conn, $retrive_sql);
 				
 				if($retrive_query){
 					$data = mysqli_fetch_assoc($retrive_query);
 					echo json_encode($data);
 				}
 			}else{
 				$data = array("valid"=>false, "msg"=>"Data not inserted.");
 				echo json_encode($data);
 			}
 		

	}else{
 		$resp = [];
 		$resp = array("valid"=>false, "msg"=>$error);
 		echo json_encode($resp);
	}
?>