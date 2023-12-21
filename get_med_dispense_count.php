<?php
  include 'config.php';
  $sql = "SELECT sum(quantity) as id FROM medicine_dispense WHERE release_date = curdate()";
  $query = mysqli_query($conn, $sql);
  $dateee = mysqli_fetch_assoc($query);

  echo json_encode($dateee);
?>