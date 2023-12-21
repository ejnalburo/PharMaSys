<?php 

// type your code here
include 'config.php';

$rid = $userType = $password = $data = '';
	
	if(isset($_POST['rid']) && !empty($_POST['rid'])) {
 		$rid = $_POST['rid'];
	}
	
	if(isset($_POST['userType']) && !empty($_POST['userType']))	{
 		$userType = $_POST['userType'];
	}
	
	if($userType == "Inventory") {
 		$password = md5("inventory123");
	}else if($userType == "Billing") {
		$password = md5("billing123");
	}else if($userType == "Prescription"){
		$password = md5("prescription123");
	}else{
		$password = md5("default123");
	}

$sql = "UPDATE users SET password = '$password' WHERE rid = '$rid'";
$query = mysqli_query($conn, $sql);
if($query) {

	$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Reset Password";
			$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

			$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query3 = mysqli_query($conn, $sql3);

	$data = array("msg"=>"Password has been set again!");
 	echo json_encode($data);
	die();
}else {
	$data = array("msg"=>"Error!");
 	echo json_encode($data);
	die();
}


?>