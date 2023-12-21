<?php 

// type your code here
include 'config.php';
$dispenseID = $action = $details = '';
		if(isset($_POST['dispenseID']) && !empty($_POST['dispenseID']))
			{
 				$dispenseID = $_POST['dispenseID'];
			}
$sql = "DELETE FROM medicine_stock WHERE inventoryID = '$dispenseID'";
$query = mysqli_query($conn, $sql);

if($query)
{
 echo "Data successfully removed.";
}

	

?>