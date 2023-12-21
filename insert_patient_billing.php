<?php

// type your code here
 
include 'config.php';

	$barcode = $brand = $generic = $strength = $form = $volume = $quantity = $price = $totalPrice = $error = $action = $billID = $inventoryID = "";
	$valid = true;

	

	if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID'])){
 		$inventoryID = mysqli_real_escape_string($conn,$_POST['inventoryID']);
	}else{
 		$valid = false;
 		$error .= "* Inventory ID field is required!\n";
 		$inventoryID = '';
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
 		$form = $_POST['form'];
	}else{
		$valid = false;
 		$error .= "* Form field is required!\n";
 		$form = "";
 	}




	if(isset($_POST['price']) && !empty($_POST['price'])){
 		$price = $_POST['price'];
	}else{
		$valid = false;
 		$error .= "* Price field is required!\n";
 		$price = "";
 	}


	if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
 		$quantity = $_POST['quantity'];
 		$totalPrice = ($price*$quantity);
	}else{
		$valid = false;
 		$error .= "* Quantity field is required!\n";
 		$quantity = "";
 	}


	if(isset($_POST['action']) && !empty($_POST['action'])){
 		$action = $_POST['action'];
	}else{
 		$action = "";
	}



	if(isset($_POST['billID']) && !empty($_POST['billID'])){
 		$billID = $_POST['billID'];
	}else{
 		$billID = "";
	}

	$barcode = $_POST['barcode'];



	if($valid){

 		if($action == 'add'){
 			$sql1 = "UPDATE medicine_stock SET quantity = (quantity - '$quantity') WHERE inventoryID = '$inventoryID'";
 			$query1 = mysqli_query($conn, $sql1);

 			
 			$sql = "INSERT INTO billings(billID, inventoryID, brand, generic, strength, form, quantity, price, totalPrice, barcode)VALUES (NULL, '$inventoryID', '$brand','$generic', '$strength', '$form', '$quantity', '$price', '$totalPrice', '$barcode')";
 			$query = mysqli_query($conn, $sql);
 			
 			if($query){
 				$retrive_sql = "SELECT * FROM billings WHERE billID = (SELECT MAX(billID) FROM billings)";
 				$retrive_query = mysqli_query($conn, $retrive_sql);
 				
 				if($retrive_query){
 					$data = mysqli_fetch_assoc($retrive_query);
 					echo json_encode($data);
 				}
 			}else{
 				$data = array("valid"=>false, "msg"=>"Data not inserted.");
 				echo json_encode($data);
 			}
 		}
 		


 		if($action == 'edit'){
 			$sql = "UPDATE billings SET inventoryID = '$inventoryID', brand = '$brand', generic = '$generic', strength = '$strength', form = '$form', quantity = '$quantity', price = '$price', totalPrice = '$totalPrice' WHERE billID = '$billID' ";
 			$query = mysqli_query($conn, $sql);
 
 				if($query){
	 				$data = array("valid"=>true, "msg"=>"Data successfully updated.");
	 				echo json_encode($data);
 				}else{
 					$data = array("valid"=>false, "msg"=>"Data not updated.");
 					echo json_encode($data);
 				}
 		}
	}else{
 		$resp = [];
 		$resp = array("valid"=>false, "msg"=>$error);
 		echo json_encode($resp);
	}
?>