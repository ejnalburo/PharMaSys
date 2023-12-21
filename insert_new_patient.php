<?php

// type your code here
 
include 'config.php';

	$firstname = $lastname = $age = $sex = $brgyID =  $error = $action = $patientID = $bloodType = "";
	$valid = true;

	
	if(isset($_POST['firstname']) && !empty($_POST['firstname'])){
		$firstname = $_POST['firstname'];
	}else{
 		$valid = false;
 		$error .= "* Firstname name is required.\n";
 		$firstname = '';
	}

	if(isset($_POST['lastname']) && !empty($_POST['lastname'])){
		$lastname = $_POST['lastname'];
	}else{
 		$valid = false;
 		$error .= "* Lastname is required.\n";
 		$lastname = '';
	}

	if(isset($_POST['age']) && !empty($_POST['age'])){
		$age = $_POST['age'];
	}else{
 		$valid = false;
 		$error .= "* Age is required.\n";
 		$age = '';
	}

	if(isset($_POST['sex']) && !empty($_POST['sex'])){
		$sex = $_POST['sex'];
	}else{
 		$valid = false;
 		$error .= "* Gender is required.\n";
 		$sex = '';
	}

	if(isset($_POST['blood']) && !empty($_POST['blood'])){
		$bloodType = $_POST['blood'];
	}else{
 		$valid = false;
 		$error .= "* Blood Type is required.\n";
 		$bloodType = '';
	}

	if(isset($_POST['brgyID']) && !empty($_POST['brgyID'])){
		$brgyID = $_POST['brgyID'];
	}else{
 		$valid = false;
 		$error .= "* Brgy. Name is required.\n";
 		$brgyID = '';
	}


	if(isset($_POST['action']) && !empty($_POST['action'])){
 		$action = $_POST['action'];
	}else{
 		$action = "";
	}

	
	if($valid){


 		if($action == 'add'){
 			$sql = "INSERT INTO patients(patientID, firstname, lastname, age, sex, bloodType, brgyID, date_date) VALUES (NULL, '$firstname', '$lastname', '$age','$sex', '$bloodType', '$brgyID', CURDATE())";
 			
 			$query = mysqli_query($conn, $sql);
 			
 			if($query){
 				$retrive_sql = "SELECT a.patientID as patientID, a.bloodType as blood, c.brgyName as brgyName, a.lastname as lastname, a.firstname as firstname, a.sex as sex, year(CURDATE())-year(a.age) as age, date_format(a.date_date, '%M %d %Y') as dates FROM patients a, barangay c WHERE a.brgyID = c.brgyID GROUP BY a.lastname, a.firstname ORDER BY a.date_date";
 				$retrive_query = mysqli_query($conn, $retrive_sql);
 				
 				if($retrive_query){
 					$data = mysqli_fetch_assoc($retrive_query);
 					echo json_encode($data);
 				}


 			}else{
 				$data = array("valid"=>false, "msg"=>"Data not inserted.");
 				echo json_encode($data);
 			}

 			$sql2 = "SELECT *  FROM patients WHERE patientID = (SELECT MAX(patientID) FROM patients)";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Add New Patient";
			$details =" Details: ".$data['firstname'].", ".$data['lastname'].". Age: ".$data['age'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details',curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);
 		}
 		


 		if($action == 'edit'){
 			$sql = "UPDATE patients SET firstname = '$firstname', lastname = '$lastname', bloodType = '$bloodType',  age = '$age', sex = '$sex', brgyID = '$brgyID'  WHERE patientID = '$patientID'";
 			$query = mysqli_query($conn, $sql);
 
 				if($query){
	 				$data = array("valid"=>true, "msg"=>"Data successfully updated.");
	 				echo json_encode($data);
 				}else{
 					$data = array("valid"=>false, "msg"=>"Data not updated.");
 					echo json_encode($data);
 				}
 			$sql2 = "SELECT *  FROM patients WHERE patientID = '$patientID'";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Update Patient";
			$details =" Details: ".$data['firstname'].", ".$data['lastname'].". Age: ".$data['age'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details',curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);
 		}
	}else{
 		$resp = [];
 		$resp = array("valid"=>false, "msg"=>$error);
 		echo json_encode($resp);
	}
?>
