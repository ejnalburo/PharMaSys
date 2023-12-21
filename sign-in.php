
<?php
error_reporting(0);
session_start();
if($_SESSION['userType']=="Inventory") {
    header("Location: admin_index.php");
}

elseif ($_SESSION['userType']=="Billing") {
    header("Location: billing_index.php");
}

elseif ($_SESSION['userType']=="Prescription") {
    header("Location: patient_index.php");
}


?>  

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>PharMaSys</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/CHO.ico">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css?ts=<?=time()?>">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/templatemo_script.js"></script>
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<style>
  .login {
  margin-top: 20px;
  width: 490px ; 
  height: 400px;
  background-color: #fff ; 
  box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2) ; 
  margin: 10px auto ;
  margin-bottom: 10px;
  border-radius: 10px;

 }

 .login h1 {
  text-align: center ;
  color: #5b6574 ;
  font-size: 24px ; 
  padding: 20px 0 20px 0 ;
  border-bottom: 1px solid #dee0e4 ; 
 }

 .login form {
  display: flex ; 
  flex-wrap: wrap ; 
  justify-content: center ;
 }

 #admin { 
  width: 100px;
  height: 100px;
  position: relative;
  margin-left: 6px ;
  margin-bottom: 5px;

 }

 #com {

  background-color: #47a85f;  
  border-radius: 100px 100px ;
  padding: 20px 20px ;
  margin-left: 170px ;
  margin-right: 170px ;
  margin-bottom: 30px ;
 }  

 #text2 {
  font-size: 15px ;
  margin-top: -4px ;
  margin-bottom: 50px ;
 }

 #register {
  color: #a52a2a ;
 }

 .msg {
  font-size: 15px ;
 }

 span {
  color: red ;
  margin-left: 10% ;
  margin-top: 100px ;
}

.modal-headers {
  display: inline-flex ;
  position: relative;
  margin-left: 92% ;

}

  .wrapper{
    margin: 10px;
    transition: all 0.3s ease;
  }
</style>
<body style="background-image: url('images/background.png'); background-size: 100%;" >
  
<div class="container">
    <div class="container-fluid" style="align-items: center;">
      <center><img src="images/logos.png"></center>
    </div>
  <div class="row">
    <br>
    <br>
    <div class="container">
      <div class="login">

        <br>
        <br>
        <div class="row">
        <div class="container-fluid">
        <div id="com">
        <img id="admin" src="images/account.png"> 
        </div>
        </div>
        <div class="row">      
    <form action="proses.php" method="post">  

      <div>
        <input type="text" placeholder="Username" class="form-control" style="width: 300px;" name="username" required autofocus=""> 
        <div class="col-md-6 margin-bottom-15">
        </div>        
      </div>
      <div>
        <input type="password" placeholder="Password" style="width: 300px;" class="form-control" name="password" required>
      </div>
      
      <div class="container" style="margin-left: 40%; margin-top: 31px;">
        <input type="submit" style="border-radius: 2px;" name="login" value="Login" class="btn btn-success" name="sub">
      </div>
    </form>
    <br>
    </div>
        </div> 
        
      </div>
    </div>




    </div>


</div>
<br>
<br>
<br>
    <footer class="templatemo-footer">
      <div class="templatemo-copyright">
        <p>&copy; 2020 PharMaSys&trade;</p>
          <h10>version 1.0.0</h10>
      </div>
    </footer>

</body>
</html>
    