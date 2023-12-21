<?php 

// type your code here
include 'config.php';
$rid = '';
		if(isset($_POST['rid']) && !empty($_POST['rid']))
			{
 				$rid = $_POST['rid'];
			}

$sql2 = "SELECT *  FROM users WHERE rid = '$rid'";
			$query2 = mysqli_query($conn, $sql2);

			$data = mysqli_fetch_array($query2);
			$action = "Delete Account";
			$details =" Details: ".$data['lname'].", ".$data['fname']." - ".$data['username']."/ ".$data['userType'];

			$sql3 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
			$query3 = mysqli_query($conn, $sql3);

$sql = "DELETE FROM users WHERE rid = '$rid'";
$query = mysqli_query($conn, $sql);
if($query)
{
 echo "Data successfully removed.";
}



?>