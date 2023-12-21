<?php

// type your code here
 
include 'config.php';
	
	$id = "";	
	$quantity = "";

	$transactionID = $_POST['transID'];
	$valid = true;

 			$sql = "UPDATE billings SET transactionID = $transactionID, transactDate = CURDATE() WHERE transactionID = '0' OR transactionID = ''";
 			$query = mysqli_query($conn, $sql);

 			$sql3 = "SELECT *  FROM billings WHERE billID = (SELECT MAX(billID) FROM billings)";
			$query3 = mysqli_query($conn, $sql3);
			if ($query3) {
			$data = mysqli_fetch_array($query3);
			echo json_encode($data);
			}else{
			$data = array("valid"=>false, "msg"=>"Data not inserted.");
 			echo json_encode($data);
			}
			$action = "Purchase Medicine";
			$details =" Details: ".$data['brand'].", ".$data['generic']." ".$data['form']." Quantity: ".$data['quantity'];

			$sql4 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details',curtime(), curdate())";
			$query4 = mysqli_query($conn, $sql4);


?>