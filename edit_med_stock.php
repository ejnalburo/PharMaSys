<?php 

// type your code here

 include 'config.php';

$inventoryID = '';
$programID = '';
if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID']))
 		{
 			$inventoryID = $_POST['inventoryID'];
 		}
if(isset($_POST['programID']) && !empty($_POST['programID']))
 		{
 			$programID = $_POST['programID'];
 		}
 		
$sql = "SELECT * FROM medicine_stock a WHERE inventoryID = '$inventoryID'";
$query = mysqli_query($conn, $sql);

if($query)
 		{
 			$data = mysqli_fetch_assoc($query);
 			echo json_encode($data);
 		} 
?>