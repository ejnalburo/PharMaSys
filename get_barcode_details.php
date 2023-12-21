<?php

include 'config.php';

$query = true;
$valid = true;
if($valid){
if($query){
                $retrive_sql = "SELECT * FROM medicine_stock WHERE barcode = '".$_POST["search"]."'";
                $retrive_query = mysqli_query($conn, $retrive_sql);
                
                if($retrive_query){
                    $data = mysqli_fetch_assoc($retrive_query);
                    echo json_encode($data);
                }
            }else{
                $data = array("valid"=>false, "msg"=>"Data not inserted.");
                echo json_encode($data);
            }
}

?>