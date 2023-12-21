<?php
	include 'config.php';

	$patientID = $weight = $bloodpress = $consult = $brand = $generic = $strength = $form = $quantity = $direction = $doctorName = $action = $error = $transID = "";
	$valid = true;

	if(isset($_POST['patientID']) && !empty($_POST['patientID'])){
		$patientID = mysqli_real_escape_string($conn,$_POST['patientID']);
	}else{
 		$valid = false;
 		$error .= "* Patient ID is required.\n";
 		$patientID = '';
	}

	if(isset($_POST['weight']) && !empty($_POST['weight'])){
		$weight = mysqli_real_escape_string($conn,$_POST['weight']);
	}else{
 		$valid = false;
 		$error .= "* Weight is required.\n";
 		$weight = '';
	}

	if(isset($_POST['bloodpress']) && !empty($_POST['bloodpress'])){
		$bloodpress = mysqli_real_escape_string($conn,$_POST['bloodpress']);
	}else{
 		$valid = false;
 		$error .= "* Blood Pressure is required.\n";
 		$bloodpress = '';
	}

	if(isset($_POST['consult']) && !empty($_POST['consult'])){
		$consult = mysqli_real_escape_string($conn,$_POST['consult']);
	}else{
 		$valid = false;
 		$error .= "* Consultation Findings is required.\n";
 		$consult = '';
	}


	if(isset($_POST['doctorName']) && !empty($_POST['doctorName'])){
		$doctorName = mysqli_real_escape_string($conn,$_POST['doctorName']);
	}else{
 		$valid = false;
 		$error .= "* Doctor Name is required.\n";
 		$doctorName = '';
	}


	if(isset($_POST['action']) && !empty($_POST['action'])){
 		$action = $_POST['action'];
	}else{
 		$action = "";
	}

	$transID = $_POST['transID'];



	if($valid){

 			$sql = "UPDATE prescription SET transID = '$transID', weight = '$weight', bloodpress = '$bloodpress', consult = '$consult', doctorName = '$doctorName', consult_date = CURDATE() WHERE patientID = '$patientID' AND transID = ''";
 			
 			$query = mysqli_query($conn, $sql);


 			$sql2 = "SELECT *  FROM prescription WHERE prescription = (SELECT MAX(prescriptionID) FROM prescription)";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Patient Consulted";
			$details =" Details: Patient ID.: ".$data['patientID']."/ Doctor Consulted: ".$data['doctorName'].", Consultation Date: ".$data['consult_date'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);


			$sql4 = "SELECT * FROM doctor WHERE doctorName = '$doctorName'";
			$query4 = mysqli_query($conn, $sql4);
			$rows = mysqli_num_rows($query4);

			if ($rows > 0) {
				
			}else{
			$sql3 = "INSERT INTO doctor(doctorID, doctorName) VALUES(NULL, '$doctorName')";
			$query3 = mysqli_query($conn, $sql3);
 			}
 		


 		/*if($action == 'edit'){
 			$sql = "UPDATE medicine_stock SET aquisition = '$aquisition', commodity = '$commodity',  brand = '$brand', generic = '$generic', strength = '$strength', form = '$form', volume = '$volume', quantity = '$quantity', patientID = '$patientID', weight = '$weight', programName = '$bloodpress', consult = '$consult', direction = '$direction', action = '$action', price = '$price' WHERE inventoryID = '$inventoryID'";
 			$query = mysqli_query($conn, $sql);
 
 				if($query){
	 				$data = array("valid"=>true, "msg"=>"Data successfully updated.");
	 				echo json_encode($data);
 				}else{
 					$data = array("valid"=>false, "msg"=>"Data not updated.");
 					echo json_encode($data);
 				}
 			$sql2 = "SELECT *  FROM medicine_stock WHERE inventoryID = '$inventoryID'";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Update Medicine";
			$details =" Details: ".$data['brand'].", ".$data['generic']." ".$data['form']."/ ".$data['volume']." Date Received: ".$data['consult'].". Date Expired: ".$data['direction'];

			$sql1 = "INSERT INTO logs(logID, action, details, logDate) VALUES (NULL, '$action', '$details', curdate())";
			$query1 = mysqli_query($conn, $sql1);
 		}*/
	}else{
	}


?>