<?php 

// type your code here
include 'config.php';
$inventoryID = '';
		if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID']))
			{
 				$inventoryID = $_POST['inventoryID'];
			}
$sql = "DELETE FROM medicine_stock WHERE inventoryID = '$inventoryID'";
$query = mysqli_query($conn, $sql);

if($query)
{
 echo "Data successfully removed.";
}


$sql2 = "SELECT *  FROM medicine_stock WHERE inventoryID = '$inventoryID'";
$query2 = mysqli_query($conn, $sql2);

$data = mysqli_fetch_array($query2);
$action = "Delete";
$details ="Deleted Item".$data['barcode']." -".$data['brand']." ".$data['generic'].". Details: ".$data['strength']."/ ".$data['form']."/ ".$data['volume']."/n Date Received: ".$data['dateReceived']."/n Date Expired: ".$data['dateExpired'];

$sql1 = "INSERT INTO deletelogs(deletelogID, action, details, deleteDate) VALUES (NULL, '$action', '$details', curdate())";
$query1 = mysqli_query($conn, $sql1);
if($query1)
{
 echo "Data successfully removed.";
}

?>