<?php

include 'config.php';

$query = true;
$valid = true;
$search = $_POST["search"];
if($valid){
if($query){
                $retrive_sql = "SELECT * FROM medicine_stock WHERE barcode = '$search' AND quantity != 0 AND dateExpired > curdate() ORDER BY `dateExpired` ASC";
                $retrive_query = mysqli_query($conn, $retrive_sql);
                
                if($retrive_query){
                    $data = mysqli_fetch_array($retrive_query);
                    echo json_encode($data);
                }
            }else{
                $data = array("valid"=>false, "msg"=>"Data not inserted.");
                echo json_encode($data);
            }
}

?>