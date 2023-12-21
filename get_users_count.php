<?php
  include 'config.php';
  $sql = "SELECT count(rid) as id FROM users";
  $query = mysqli_query($conn, $sql);
  $dateee = mysqli_fetch_assoc($query);

  echo json_encode($dateee);
?>