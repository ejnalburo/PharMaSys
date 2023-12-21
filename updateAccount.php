<?php
include 'config.php';

$rid = $_POST['rid'];
$username = $_POST['username'];

	$sqll = "SELECT username FROM users WHERE username = '$username' AND rid != '$rid'";
		$queryy = mysqli_query($conn, $sqll);
		$rowss = mysqli_num_rows($queryy);
		if ($rowss>0) {
			
	 		echo "<script>alert('Username Exists! Please try another.');document.location.href='change_account_settings.php'</script>/n";
			die();
		} else {
			
			$username = $username;

		}


$profile = $_FILES["profile"]["name"];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password_1 = md5($_POST['password_1']);

if ($_POST['password_2'] == "") {
	$password_2 = $password_1;
}else{
	$password_2 = md5($_POST['password_2']);
}


	$sql2 = "SELECT * FROM users WHERE rid = '$rid'";
	$query2 = mysqli_query($conn, $sql2);
	$data2 = mysqli_fetch_assoc($query2);

	$query2 = mysqli_query($conn, "SELECT * FROM users WHERE rid = '$rid' AND password='$password_1' ");
  	

  	if (mysqli_num_rows($query2) == 0) {
    	echo "<script>alert('Your Current Password is incorrect! Please try again.');document.location.href='change_account_settings.php'</script>/n";
  	}else {
		if ($profile == "") {
			if ($password_2 == "") {
				$sql1 = "UPDATE users SET username = '$username', fname = '$fname', lname = '$lname' WHERE rid = '$rid'";
				$query1 = mysqli_query($conn, $sql1);

				if($query1)	{
 					session_start();
 					session_destroy();

 					$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
					$query2 = mysqli_query($conn, $sql2);

					$data = mysqli_fetch_array($query2);
					$action = "Update Account";
					$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

					$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
					$query3 = mysqli_query($conn, $sql3);

					
					echo "<script>alert('Account Updated! Please log in to continue');document.location.href='sign-in.php'</script>";
					die();
 				}else {
					echo "Error 1";
				}
			
			}else {
				$sql1 = "UPDATE users SET username = '$username', fname = '$fname', lname = '$lname', password = '$password_2' WHERE rid = '$rid'";
				$query1 = mysqli_query($conn, $sql1);

				if($query1)	{
 					session_start();
 					session_destroy();

 					$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
					$query2 = mysqli_query($conn, $sql2);

					$data = mysqli_fetch_array($query2);
					$action = "Update Account";
					$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

					$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
					$query3 = mysqli_query($conn, $sql3);
					
					echo "<script>alert('Account Updated! Please log in to continue');document.location.href='sign-in.php'</script>";
					die();
 				}else {
					echo "Error 2";
				}
			}
			
		
		}else {
			$ext = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
			$encoded_image = base64_encode(file_get_contents($_FILES['profile']['tmp_name']));
			$encoded_image = 'data:image/' . $ext . ';base64,' . $encoded_image;

			if ($password_2 == "") {
				$sql = "UPDATE users SET profile = '$encoded_image', username = '$username', fname = '$fname', lname = '$lname' WHERE rid = '$rid'";
				$query = mysqli_query($conn, $sql);

				if($query)	{
 					session_start();
 					session_destroy();

 					$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
					$query2 = mysqli_query($conn, $sql2);

					$data = mysqli_fetch_array($query2);
					$action = "Update Account";
					$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

					$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
					$query3 = mysqli_query($conn, $sql3);

 					echo "<script>alert('Account Updated! Please log in to continue');document.location.href='sign-in.php'</script>";
					die();
 				}else {
					echo "Error 3";
				}
			
			}else {
				$sql = "UPDATE users SET profile = '$encoded_image', username = '$username', fname = '$fname', lname = '$lname', password = '$password_2' WHERE rid = '$rid'";
				$query = mysqli_query($conn, $sql);

				if($query)	{
 					session_start();
 					session_destroy();
					
					$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
					$query2 = mysqli_query($conn, $sql2);

					$data = mysqli_fetch_array($query2);
					$action = "Update Account";
					$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

					$sql3 = "INSERT INTO logs(logID, action, details, logTime(), logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
					$query3 = mysqli_query($conn, $sql3);

					echo "<script>alert('Account Updated! Please log in to continue');document.location.href='sign-in.php'</script>";
					die();
 				}else {
					echo "Error 4";
				}
			}

		}


	}

?>