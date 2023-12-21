<?php
  include 'config.php';
  $sql = "SELECT sum(quantity) as id FROM medicine_stock WHERE dateStocked = curdate()";
  $query = mysqli_query($conn, $sql);
  $dateee = mysqli_fetch_assoc($query);

  echo json_encode($dateee);
?>
