<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) 
{
  $username = addslashes(trim($_POST['username']));
  $password = md5($_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' ");
  if (mysqli_num_rows($query) == 0) 
  {
    echo "<script>alert('Username or Password is incorrect!');document.location.href='sign-in.php'</script>/n";
  }else{
    $row = mysqli_fetch_assoc($query);
    $_SESSION['rid'] = $row['rid'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['userType']  = $row['userType'];
    $_SESSION['fname']  = $row['fname'];

    if($row['userType'] == "Inventory")
    { 

      echo "<script>alert('Welcome To Admin Panel!');document.location.href='admin_index.php'</script>/n";
    }
    else if($row['userType'] =="Billing")
    {
      echo "<script>alert('Welcome To Billing Panel !');document.location.href='billing_index.php'</script>/n";
    }
    else if($row['userType'] =="Prescription")
    {
      echo "<script>alert('Welcome To Prescription Panel !');document.location.href='patient_index.php'</script>/n";
    }
    else
    {
      echo "<script>alert('This account is invalid!');document.location.href='sign-in.php'</script>/n";
    }
  }
}else{
  echo "<script>alert('Error!');document.location.href='sign-in.php'</script>/n";
}
?>
