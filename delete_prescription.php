<?php 

// type your code here
include 'config.php';
$prescriptionID = '';
		if(isset($_POST['prescriptionID']) && !empty($_POST['prescriptionID']))
			{
 				$prescriptionID = $_POST['prescriptionID'];
			}

$sql2 = "SELECT *  FROM prescription WHERE prescriptionID = '$prescriptionID'";
$query2 = mysqli_query($conn, $sql2);

$data = mysqli_fetch_array($query2);
$action = "Delete Prescription";
$details ="Deleted Item: ".$data['prescriptionID']." -".$data['brand']." ".$data['generic']." ".$data['strength'];

$sql1 = "INSERT INTO logs(logID, action, details, logTime, logDate) VALUES (NULL, '$action', '$details', curtime(), curdate())";
$query1 = mysqli_query($conn, $sql1);
if($query1)
{
 echo "Data successfully removed.";
}



$sql = "DELETE FROM prescription WHERE prescriptionID = '$prescriptionID'";
$query = mysqli_query($conn, $sql);

if($query)
{
 echo "Data successfully removed.";
}




?>