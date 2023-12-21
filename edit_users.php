<?php 

// type your code here

 include 'config.php';

$rid = '';
if(isset($_POST['rid']) && !empty($_POST['rid']))
 		{
 			$rid = $_POST['rid'];
 		}
$sql = "SELECT * FROM users a WHERE rid = '$rid'";
$query = mysqli_query($conn, $sql);

if($query)
 		{
 			$data = mysqli_fetch_assoc($query);
 			echo json_encode($data);
 		}
?>