<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="" || $_SESSION['userType']!="Prescription") {
    header("Location: sign-in.php");
    die();
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
  <link rel="stylesheet" href="css/templatemo_main.css">
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">
<style>
  .wrap {
    text-align: center;
    padding: 200px 0 0;
  }
  
  #clock span {
    display: inline-block;
    width: 30px;
    height: 30px;
    line-height: 30px;
    background-color: #3f58b5;
    box-shadow: 0 1px 15px #3f58b5;
    color: #fff;
    margin-left: 5px;
  }

  #clock span:first-child {
    margin-left: 0;
  }

  #clock span:last-child {
    background-color: #e91e63;
  }
</style>


</head>
<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation" style="color: #ccc; background-color: #8d8d8d; border: none;">
      <div class="navbar-header">
        <div class="logo"><a><img src="images/logo2.png" width="250px" style="margin-left: 10px; margin-top: -23px; position: absolute;"></a></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          
          <li class="wrap">
            <h1 id="greeting" style="font-size: 17px;"></h1>
            <h1 id="clock" style="font-size: 15px;"></h1>
            <br>
          </li>
          <li><a href="patient_index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

          <li><a href="add_patients.php"><i class="fa fa-wheelchair"></i>Patients</a></li>

          <li><a href="consult_prescription.php"><i class="fa fa-file-text"></i>Consultation and Prescription</a></li>

          <li  class="active"><a href="patient_utility.php"><i class="fa fa-cog"></i>Account Settings</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="patient_index.php">Prescription Panel</a></li>
            <li><a href="patient_utility.php">Account Settings</a></li>
            <li class="active">Update Account Information</li>

          </ol>
          <br>
          <h1>Update Account Information</h1>
          <br>

          <div class="row">
            <div class="col-md-12">
              <br>
              <form role="form" id="templatemo-preferences-form" method="post" action="updateAccount.php" enctype="multipart/form-data">
                <input type="hidden" name="rid" id="rid">
                <div class="row">
                  <div class="col-md-4">
                    <?php 
                    if ($data['profile'] == "") {
                    echo '<img style="margin-bottom: 20px; margin-left:49px; border-radius: 100px 100px; padding: 4px 4px; height: 200px; width: 200px; background-position: center; background-size: cover;" id="aa" src="/PharMaSys/images/account_pic.png">';
                    }else{
                    echo ' style="margin-bottom: 20px; margin-left:49px; border-radius: 100px 100px; padding: 4px 4px; height: 200px; width: 200px; background-position: center; background-size: cover;" id="aa" src=""';

                    }
                    ?>
                    <div style="margin-left:58px;"><input style="" disabled="" type="file" name="profile" id="addPhoto" accept="image/jpeg" /></div>
                </div>
                  <div class="col-md-4">
                    <script>
                    </script>
                    <label for="firstName" class="control-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" required="" readonly="">
                    <br>         
                    <label for="lastName" class="control-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" required="" readonly="">                 
                  </div>
                  <div class="col-md-4">
                    <label for="username" class="control-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required="" readonly="">
                    <br>
                    <label for="userType" class="control-label">User Type</label>
                    <select class="form-control" id="userType" disabled="" name="userType">
                      <option name="userType" id = "userType4" value="Inventory">None</option>
                      <option name="userType" id = "userType1" value="Inventory">Inventory</option>
                      <option name="userType" id = "userType2" value="Billing">Billing</option>
                      <option name="userType" id = "userType3" value="Prescription">Prescription</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <br>
                    <label for="password_1" class="control-label">Current Password</label>
                    <input type="password" class="form-control" minlength="8" required="" readonly="" name="password_1" id="password_1" placeholder="Current Password">
                    <br>
                  </div> 
                  <div class="col-md-4">
                    <br>
                    <label for="password_2" class="control-label">New Password</label>
                    <input type="password" class="form-control" minlength="8" readonly="" name="password_2" id="password_2" placeholder="New Password">
                    <br>

                  <div class="row templatemo-form-buttons">
                  <div class="pull-right">
                  <div class="col-md-12">
                  <button type="button" class="btn btn-warning" onclick="caa()" id="undo" style="visibility: hidden;">Undo</button>
                  <button type="button" onclick="cll()" id="changee" class="btn btn-primary">Change</button>
                  <button type="submit" class="btn btn-success" id="updates" disabled="">Update</button>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
          </div>
          <div class="modal-footer">
            <a href="logout.php" class="btn btn-primary">Yes</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>

    <footer class="templatemo-footer">
      <div class="templatemo-copyright">
        <p>&copy; 2020 PharMaSys&trade;</p>
          <h10>version 1.0.0</h10>
      </div>
    </footer>
  </div>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/templatemo_script.js"></script>
  <script type="text/javascript">
      function clock(){
      var date = new Date();
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var seconds = date.getSeconds();
      var midday;

      hours = updateTime(hours);
      minutes = updateTime(minutes);
      seconds = updateTime(seconds);
      var name = $("#fnamee").val();

      //IF ELSE CONDITION
      midday = (hours >= 12) ? "PM" : "AM";

      document.getElementById("clock").innerHTML = "<span>" + hours + "</span>" + " :" + "<span>" + minutes + "</span>" + " :" + "<span>" + seconds + "</span>" + "<span>" + midday + "</span>";

      var time = setTimeout(function(){
        clock();
      }, 1000);

      //GOOD MORNING, AFTERNOON, EVENING CONDITION
      if (hours < 12){
        var greeting = "Good Morning, " + name + "!";
      }if (hours >= 12 && hours < 18){
        var greeting = "Good Afternoon, " + name + "!";
      }if (hours >=18 && hours <= 24){
        var greeting = "Good Evening, " + name + "!";
      }
      document.getElementById("greeting").innerHTML = greeting;
    }

    function updateTime(k) {
      if (k < 10){
        return "0" + k;
      }else{
        return k;
      }
    }

    //CALL CLOCK FUNCTION
    clock();

  

$(function() {
  function getBase64(file) {
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function() {
      console.log(reader.result);
      $("#aa").attr({
        "src":  reader.result 
      });
    };
    reader.onerror = function(error) {
      console.log('Error: ', error);
    };
  }
  $("#addPhoto").change(function() {
    getBase64(this.files[0]);
  });
});

function cll(){

  $("#fname").attr({
    "readonly" : false
  });
  $("#lname").attr({
    "readonly" : false
  });
  $("#username").attr({
    "readonly" : false
  });
    $("#password_1").attr({
    "placeholder" : "",
    "readonly" : false
  });
  $("#password_2").attr({
    "placeholder" : "",
    "readonly" : false
  });
  document.getElementById('undo').style.visibility = 'visible';
  document.getElementById('changee').disabled = true;
  document.getElementById('updates').disabled = false;
  document.getElementById('addPhoto').disabled = false;
}

function caa(){
  window.location.reload();
  document.getElementById('changee').disabled = false;
  document.getElementById('addPhoto').disabled = true;
  document.getElementById('updates').disabled = true;
}


  $(document).ready( function () {
                    <?php
                session_start();
                include 'config.php'; 
                $rid = $_SESSION['rid']; 
                $fn =  $_SESSION['fname']; 
                $un = $_SESSION['username']; 

                    $sql = "SELECT * FROM users WHERE rid = '$rid'";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
             $("#rid").val("<?php echo $data['rid'];?>");
             $("#fname").val("<?php echo $data['fname'];?>");
             $("#lname").val("<?php echo $data['lname'];?>");
             $("#username").val("<?php echo $data['username'];?>");
             document.getElementById("aa").src = "<?php echo $data['profile'];?>";
             if ($("#userType1").val() == "<?php echo $data['userType'];?>") {
                document.getElementById("userType1").selected = true;
             }else if($("#userType2").val() == "<?php echo $data['userType'];?>"){
                document.getElementById("userType2").selected = true;
             }else if($("#userType3").val() == "<?php echo $data['userType'];?>"){
                document.getElementById("userType3").selected = true;
             }else{
                document.getElementById("userType4").selected = true;
             }
             

              <?php
                        }
                    }
                    ?>
  });



</script>
</body>
</html>