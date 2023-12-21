<?php
	include 'config.php';


	$sql = "SELECT * FROM medicine_stock WHERE officeProgram = '".$_POST["search"]."' ";
		$query = mysqli_query($conn, $sql);


$response ="<div style='height:250px; overflow:auto;'>";
$response ="<div class='table-responsive'>";
$response .= "<table class='table table-responsive' border='0'>";
$response .="<thead>";
 $response .="<tr>";
 $response .="<th>Medicine Name</th>";
 $response .="<th>Description</th>";
 $response .="<th>Quantity</th>";
$response .="</tr>";
$response .="</thead>";
while( $row = mysqli_fetch_array($query) ){

 $brand = $row['brand'];
 $generic = $row['generic'];
 $strength = $row['strength'];
 $form = $row['form'];
 $volume = $row['volume'];
 $quantity = $row['quantity'];
 

 $response .= "<tbody>";
 $response .= "<tr>";
 $response .= "<td>".$brand.", ".$generic."</td>";
 $response .= "<td>".$strength."/ ".$form."/ ".$volume."</td>";
 $response .= "<td>".$quantity."</td>";
 $response .= "</tr>";
 $response .= "</tbody>";

}

$response .= "</table>";
$response .= "</div>";    
$response .= "</div>";
$response .= "<div class='modal-footer'>";
$response .= "<button type='button' class='btn btn-primary' data-dismiss='modal'>Close</button>";
$response .= "</div>";         
        

echo $response;
exit;



?>