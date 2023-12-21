<?php
  include 'config.php';
  $sql = "SELECT sum(totalPrice) as id FROM billings WHERE transactDate = curdate() and transactionID != 0";
  $query = mysqli_query($conn, $sql);
  $dateee = mysqli_fetch_assoc($query);

  echo json_encode($dateee);
?>