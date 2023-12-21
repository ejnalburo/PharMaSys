<?php

// type your code here
 
include 'config.php';

	$coordinator = $inventoryID = $program = $brand = $generic = $strength = $form = $quantity = $dispenseID = $action = "";
	$valid = true;



	

	if(isset($_POST['coordinator']) && !empty($_POST['coordinator'])){
 		$coordinator = $_POST['coordinator'];
	}else{
 		$coordinator= "";
	}

	if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID'])){
 		$inventoryID = $_POST['inventoryID'];
	}else{
 		$inventoryID= "";
	}

	if(isset($_POST['program']) && !empty($_POST['program'])){
 		$program = $_POST['program'];
	}else{
 		$program= "";
	}

	if(isset($_POST['brand']) && !empty($_POST['brand'])){
 		$brand = $_POST['brand'];
	}else{
 		$brand= "";
	}

	if(isset($_POST['generic']) && !empty($_POST['generic'])){
 		$generic = $_POST['generic'];
	}else{
 		$generic= "";
	}

	if(isset($_POST['strength']) && !empty($_POST['strength'])){
 		$strength = $_POST['strength'];
	}else{
 		$strength= "";
	}

	if(isset($_POST['form']) && !empty($_POST['form'])){
 		$form = $_POST['form'];
	}else{
 		$form= "";
	}


	if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
 		$quantity = $_POST['quantity'];
	}else{
 		$quantity= "";
	}


 			$sql = "INSERT INTO medicine_dispense(dispenseID, inventoryID, programName, coorName, brand, generic, strength, form, quantity, release_date) VALUES (NULL, '$inventoryID', '$program', '$coordinator', '$brand','$generic', '$strength', '$form', '$quantity', curdate())";
 			
 			$query = mysqli_query($conn, $sql);

 			$sql1 = "UPDATE medicine_stock SET quantity = '0' WHERE inventoryID = '$inventoryID'";
 			$query1 = mysqli_query($conn, $sql1);

 			$sql2 = "SELECT *  FROM medicine_dispense WHERE dispenseID = (SELECT MAX(dispenseID) FROM medicine_dispense)";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Dispense Medicine";
			$details =" Details: ".$data['brand'].", ".$data['generic']." ".$data['form']."/ ".$data['strength']." Date Received: ".$data['dateReceived'].". Date Expired: ".$data['dateExpired'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);


 			header("Location: medicine_dispense.php") ;
 			

?>