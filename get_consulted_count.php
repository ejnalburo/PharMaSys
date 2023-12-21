<?php
  include 'config.php';
  $sql = "SELECT count(DISTINCT patientID) as id FROM prescription WHERE consult_date = curdate() ";
  $query = mysqli_query($conn, $sql);
  $dateee = mysqli_fetch_assoc($query);

  echo json_encode($dateee);
?>