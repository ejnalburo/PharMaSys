<?php
                 include 'config.php';
                    $patientID = "";

                    $patientID = $_POST['patientID'];

                    $sql = "SELECT * FROM prescription WHERE patientID = '$patientID' ORDER BY consult_date";
                    $query = mysqli_query($conn, $sql);

$response ="<div style='height:250px; overflow:auto;'>";
$response ="<div class='table-responsive'>";
$response .= "<table class='table table-responsive' border='0'>";
$response .="<thead>";
 $response .="<tr>";
 $response .="<th>Date</th>";
 $response .="<th>Doctor Consulted</th>";
 $response .="<th>Consultation Results</th>";
 $response .="<th>Doctor Prescription</th>";
 $response .="<th>Medicine Purchased</th>";
$response .="</tr>";
$response .="</thead>";
while( $row = mysqli_fetch_array($query) ){
 

 $response .= "<tbody>";
 $response .= "<tr>";
 $response .= "<td>".$row['consult_date']."</td>";
 $response .= "<td>".$row['doctorName']."</td>";
 $response .= "<td>".$row['consult']."</td>";
 $response .= "<td>".$row['brand']." ".$row['generic']."</td>";
 $response .= "<td>Carbocysteine</td>";
 $response .= "</tr>";
 $response .= "</tbody>";

}

$response .= "</table>";
$response .= "</div>";  
$response .= "</div>";     
        

echo $response;
exit;

?>