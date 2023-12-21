<?php

// type your code here
 
include 'config.php';

	$fname = $lname = "";

	

	$lname = $_POST['lname'];
	$fname = $_POST['fname'];




 			$sql = "INSERT INTO payment_entries('billID', sum(billID), 'barcode', 'brand', 'generic', 'strength', 'form', 'volume', 'quantity', 'price', 'totalPrice', 'fname', 'lname') SELECT 'billID', 'barcode', 'brand', 'generic', 'strength', 'form', 'volume', 'quantity', 'price', 'totalPrice' FROM billings ";
 			$query = mysqli_query($conn, $sql);

 			$s

