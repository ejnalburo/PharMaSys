<?php 

// type your code here
include 'config.php';
$billID = '';
$inventoryID = $_POST['inventoryID'];
$quantity = $_POST['quantity'];
        if(isset($_POST['billID']) && !empty($_POST['billID']))
            {
                $billID = $_POST['billID'];
            }
$sql = "DELETE FROM billings WHERE billID = '$billID'";
$query = mysqli_query($conn, $sql);
if($query)
{
 echo "Data successfully removed.";
}

$sql1 = "UPDATE medicine_stock SET quantity = (quantity + '$quantity') WHERE inventoryID = '$inventoryID'";
$query1 = mysqli_query($conn, $sql1);
if($query1)
{
 echo "Data successfully removed.";
}


?>