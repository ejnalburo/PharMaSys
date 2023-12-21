<?php 

// type your code here

 include 'config.php';

$inventoryID = '';
if(isset($_POST['inventoryID']) && !empty($_POST['inventoryID']))
 		{
 			$inventoryID = $_POST['inventoryID'];
 		}
 		
$sql = "INSERT INTO medicine_dispense ('coorID', 'programID', 'inventoryID', 'brand', )";
$query = mysqli_query($conn, $sql);

if($query)
 		{
 			$data = mysqli_fetch_assoc($query);
 			echo json_encode($data);
 		}
?>