<?php
    include 'config.php';
    $response = "";

                    $sql = "SELECT * FROM medicine_stock GROUP BY brand ASC";
                    $query = mysqli_query($conn, $sql);

while( $row = mysqli_fetch_array($query) ){

 $response .= "<tr>";
 $response .= "<td><input type='text' class='form-control' list='datalist1' id='brand' name='brand' placeholder='' style='width: 80px; outline: none; border: none;' oninput='cl1()'>";
 $response .= "<datalist id='datalist1'>";
 $response .= "<option>". $row['brand'] ."</option>";
 $response .= "</datalist></td>";


 $response .= "<td><input type='text' class='form-control' list='datalist2' id='generic' name='generic' placeholder='' style='width: 80px; outline: none; border: none;' oninput='cl2()'>";
 $response .= "<datalist id='datalist2'>";
 $response .= "<option>". $row['generic'] ."</option>";
 $response .= "</datalist></td>";


 $response .= "<td><input type='text' class='form-control' list='datalist3' id='strength' name='strength' placeholder='' style='width: 80px; outline: none; border: none;' oninput='cl3()'>";
 $response .= "<datalist id='datalist3'>";
 $response .= "<option>". $row['strength'] ."</option>";
 $response .= "</datalist></td>";


 $response .= "<td><input type='number' class='form-control' name=quantity'' id='quantity' style='width: 70px; outline: none; border: none;' oninput='cl4()'></td>";


 $response .= "<td><textarea class='form-control' name='quantity' id='quantity' style='width: 170px; outline: none; border: none;' oninput='cl4()'></textarea></td>";


 $response .= "<td><a href='javascript:void(0);' style='text-decoration: none;' onclick='deleteRow()' title='Delete Table Row'><i class='fa fa-trash' style='color: #1d6924'></i>&nbsp;&nbsp;&nbsp;Delete Row</a></td>";
 $response .= "</tr>";

}
      
        

echo $response;
exit;

?>
