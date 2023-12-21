<?php 

// type your code here

 include 'config.php';

$Firstname = $Lastname = '';

if (isset($_POST['Firstname']) && !empty($_POST['Firstname'])) {
 	$Firstname = $_POST['Firstname'];
}

if (isset($_POST['Lastname']) && !empty($_POST['Lastname'])) {
	$Lastname = $_POST['Lastname'];
}
 		
$sql = "SELECT * FROM patients WHERE Lastname = '$Lastname' AND Firstname = '$Firstname' ORDER BY date_date";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);

if($rows>0)
{

 	$data = mysqli_fetch_array($query);
 	echo json_encode($data);
}
?>