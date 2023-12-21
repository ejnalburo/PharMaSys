<?php

// type your code here
 
include 'config.php';

	$username = $un = $fname = $lname = $userType = $action = $rid = $password = "";
	$valid = true;

	if(isset($_POST['rid']) && !empty($_POST['rid'])){
 		$rid = $_POST['rid'];
	}else{
 		$rid = "";
	}


	if(isset($_POST['username']) && !empty($_POST['username'])){
		$username = mysqli_real_escape_string($conn,$_POST['username']);
	}else{
 		$valid = false;
 		$error .= "* Username is required.\n";
 		$username = '';
	}


	$sqll = "SELECT username FROM users WHERE username = '$username' AND rid != '$rid'";
		$queryy = mysqli_query($conn, $sqll);
		$rowss = mysqli_num_rows($queryy);
		if ($rowss>0) {
			
	 		$data = array("valid"=>false, "msg"=>"Username Exists! Please try another");
 					echo json_encode($data);
			die();
		} else {
			
			$username = $username;

		}
		


	if(isset($_POST['fname']) && !empty($_POST['fname'])){
		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	}else{
 		$valid = false;
 		$error .= "* First Name is required.\n";
 		$fname = '';
	}

	if(isset($_POST['lname']) && !empty($_POST['lname'])){
		$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	}else{
 		$valid = false;
 		$error .= "* Last Name is required.\n";
 		$lname = '';
	}

	if(isset($_POST['userType']) && !empty($_POST['userType'])){
		$userType = mysqli_real_escape_string($conn,$_POST['userType']);
	}else{
 		$valid = false;
 		$error .= "* User Type is required.\n";
 		$userType = '';
	}

	if($userType == "Inventory"){
		$password = md5("inventory123");
	}else if ($userType == "Billing") {
		$password = md5("billing123");
	} else {
		$password = md5("prescription123");
	}
	

	if(isset($_POST['action']) && !empty($_POST['action'])){
 		$action = $_POST['action'];
	}else{
 		$action = "";
	}

	
	if($valid){


 		if($action == 'add'){
 			$sql = "INSERT INTO users(rid, username, fname, lname, userType, password) VALUES (NULL, '$username', '$fname', '$lname', '$userType', '$password')";
 			
 			$query = mysqli_query($conn, $sql);
 			
 			if($query){
 				$retrive_sql = "SELECT * FROM users WHERE rid = (SELECT MAX(rid) FROM users)";
 				$retrive_query = mysqli_query($conn, $retrive_sql);
 				
 				if($retrive_query){
 					$data = mysqli_fetch_assoc($retrive_query);
 					echo json_encode($data);
 				}
 			}else{
 				$data = array("valid"=>false, "msg"=>"Data not inserted.");
 				echo json_encode($data);
 			}

 			$sql2 = "SELECT *  FROM users WHERE rid = (SELECT MAX(rid) FROM users)";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Add New Account";
			$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

			$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query3 = mysqli_query($conn, $sql3);

 		}
 		


 		if($action == 'edit'){
 			$sql = "UPDATE users SET username = '$username', fname = '$fname',  lname = '$lname', userType = '$userType', password = '$password' WHERE rid = '$rid'";
 			$query = mysqli_query($conn, $sql);
 
 				if($query){
	 				$data = array("valid"=>true, "msg"=>"Data successfully updated.");
	 				echo json_encode($data);
 				}else{
 					$data = array("valid"=>false, "msg"=>"Data not updated.");
 					echo json_encode($data);
 				}

 			$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Update Account";
			$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

			$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query3 = mysqli_query($conn, $sql3);			
 		}
	}else{
 		$resp = [];
 		$resp = array("valid"=>false, "msg"=>$error);
 		echo json_encode($resp);
	}
?>