<?php

// type your code here
 
include 'config.php';

	$aquisition = $commodity = $brand = $generic = $strength = $quantity = $lotno = $batchno = $form = $officeProgram = $dateReceived = $dateExpired = $donatedFrom = $price = $error = $action = $inventoryID = $barcode = "";
	$valid = true;

	
	if(isset($_POST['brand']) && !empty($_POST['brand'])){
		$brand = mysqli_real_escape_string($conn,$_POST['brand']);
	}else{
 		$valid = false;
 		$error .= "* Brand name is required.\n";
 		$brand = '';
	}

	if(isset($_POST['generic']) && !empty($_POST['generic'])){
		$generic = mysqli_real_escape_string($conn,$_POST['generic']);
	}else{
 		$valid = false;
 		$error .= "* Generic is required.\n";
 		$generic = '';
	}

	if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
		$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
	}else{
 		$valid = false;
 		$error .= "* Quantity is required.\n";
 		$quantity = '';
	}

	if(isset($_POST['lotno']) && !empty($_POST['lotno'])){
		$lotno = mysqli_real_escape_string($conn,$_POST['lotno']);
	}else{
 		$valid = false;
 		$error .= "* Lot No. is required.\n";
 		$lotno = '';
	}

	if(isset($_POST['batchno']) && !empty($_POST['batchno'])){
		$batchno = mysqli_real_escape_string($conn,$_POST['batchno']);
	}else{
 		$valid = false;
 		$error .= "* Batch No. is required.\n";
 		$batchno = '';
	}

	if(isset($_POST['officeProgram']) && !empty($_POST['officeProgram'])){
		$officeProgram = mysqli_real_escape_string($conn,$_POST['officeProgram']);
	}else{
 		$valid = false;
 		$error .= "* Office/Program is required.\n";
 		$officeProgram = '';
	}

	if(isset($_POST['dateReceived']) && !empty($_POST['dateReceived'])){
		$dateReceived = mysqli_real_escape_string($conn,$_POST['dateReceived']);
	}else{
 		$valid = false;
 		$error .= "* Date Received is required.\n";
 		$dateReceived = '';
	}

	if(isset($_POST['dateExpired']) && !empty($_POST['dateExpired'])){
		$dateExpired = mysqli_real_escape_string($conn,$_POST['dateExpired']);
	}else{
 		$valid = false;
 		$error .= "* Date Expired is required.\n";
 		$dateExpired = '';
	}

	if(isset($_POST['donatedFrom']) && !empty($_POST['donatedFrom'])){
		$donatedFrom = mysqli_real_escape_string($conn,$_POST['donatedFrom']);
	}else{
 		$valid = false;
 		$error .= "* Donated From is required.\n";
 		$donatedFrom = '';
	}

	if(isset($_POST['action']) && !empty($_POST['action'])){
 		$action = $_POST['action'];
	}else{
 		$action = "";
	}



	if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID'])){
 		$inventoryID = $_POST['inventoryID'];
	}else{
 		$inventoryID = "";
	}

	if(isset($_POST['aquisition']) && !empty($_POST['aquisition'])){
 		$aquisition = $_POST['aquisition'];
	}else{
 		$aquisition = "";
	}

	if(isset($_POST['commodity']) && !empty($_POST['commodity'])){
 		$commodity = $_POST['commodity'];
	}else{
 		$commodity = "";
	}


	if(isset($_POST['form']) && !empty($_POST['form'])){
 		$form = $_POST['form'];
	}else{
 		$form= "";
	}

	if(isset($_POST['strength']) && !empty($_POST['strength'])){
 		$strength = $_POST['strength'];
	}else{
 		$strength= "";
	}

	if(isset($_POST['price']) && !empty($_POST['price'])){
		$price = mysqli_real_escape_string($conn,$_POST['price']);
	}else{
 		$valid = false;
 		$error .= "* Price is required.\n";
 		$price = '';
	}

	if(isset($_POST['barcode']) && !empty($_POST['barcode'])){
		$barcode = mysqli_real_escape_string($conn,$_POST['barcode']);
	}else{
 		$valid = false;
 		$error .= "* Barcode is required.\n";
 		$barcode = '';
	}	


	
	if($valid){


 		if($action == 'add'){
 			$sql = "INSERT INTO medicine_stock(inventoryID, aquisition, commodity, brand, generic, strength, form, quantity, lotno, batchno, programName, dateReceived, dateExpired, donatedFrom, price, dateStocked, barcode) VALUES (NULL, '$aquisition', '$commodity', '$brand','$generic', '$strength', '$form', '$quantity', '$lotno', '$batchno', '$officeProgram', '$dateReceived', '$dateExpired', '$donatedFrom', '$price', CURDATE(), '$barcode')";
 			
 			$query = mysqli_query($conn, $sql);
 			
 			if($query){
 				$retrive_sql = "SELECT * FROM medicine_stock a, program b WHERE inventoryID = (SELECT MAX(inventoryID) FROM medicine_stock)";
 				$retrive_query = mysqli_query($conn, $retrive_sql);
 				
 				if($retrive_query){
 					$data = mysqli_fetch_assoc($retrive_query);
 					echo json_encode($data);
 				}


 			}else{
 				$data = array("valid"=>false, "msg"=>"Data not inserted.");
 				echo json_encode($data);
 			}

 			$sql2 = "SELECT *  FROM medicine_stock WHERE inventoryID = (SELECT MAX(inventoryID) FROM medicine_stock)";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Add New Medicine";
			$details =" Details: ".$data['brand'].", ".$data['generic']." ".$data['form']."/ ".$data['strength']." Date Received: ".$data['dateReceived'].". Date Expired: ".$data['dateExpired'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);
 		}
 		


 		if($action == 'edit'){
 			$sql = "UPDATE medicine_stock SET aquisition = '$aquisition', commodity = '$commodity',  brand = '$brand', generic = '$generic', strength = '$strength', form = '$form', quantity = '$quantity', lotno = '$lotno', batchno = '$batchno', programName = '$officeProgram', dateReceived = '$dateReceived', dateExpired = '$dateExpired', donatedFrom = '$donatedFrom', price = '$price' WHERE inventoryID = '$inventoryID'";
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
			$details =" Details: ".$data['brand'].", ".$data['generic']." ".$data['form']."/ ".$data['strength']." Date Received: ".$data['dateReceived'].". Date Expired: ".$data['dateExpired'];

			$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query1 = mysqli_query($conn, $sql1);
 		}
	}else{
 		$resp = [];
 		$resp = array("valid"=>false, "msg"=>$error);
 		echo json_encode($resp);
	}
?>
