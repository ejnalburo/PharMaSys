
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
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

          <li><a href="admin_index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

          <li><a href="activity_logs.php"><i class="fa fa-history"></i>Activity Logs</a></li>

          <li class="sub open"  style="background-color: rgb(191, 232, 167);">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Inventory <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="medicine_stock.php" style="text-decoration: none; font-size: 12px;">Stock Medicines</a></li>
              <li style="background-color: rgb(191, 232, 167);"><a href="medicine_dispense.php" style="text-decoration: none; font-size: 12px;">Dispense Medicines</a></li>
            </ul>
          </li>

           <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i> Reports <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="medicine_inventory.php" style="text-decoration: none; font-size: 12px;">Medicine Inventory Status</a></li>
              <li><a href="medicine_expiration.php" style="text-decoration: none; font-size: 12px;">Medicine Expiration Status</a></li>
              <li><a href="sales_report.php" style="text-decoration: none; font-size: 12px;">Sales Report</a></li>
            </ul>
          </li>
          <li><a href="utility.php"><i class="fa fa-cog"></i>Utility</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="admin_index.php">Admin Panel</a></li>
            <li><a href="#">Inventory</a></li>
            <li class="active">Dispense Medicines</li>
          </ol>
          <h1>Dispense Medicines</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
              <h9>As of Today:</h9>
                <ul class="nav nav-pills">
                  
                  <li class="active"><a href="medicine_dispensed_today.php"><h9>Medicine Dispensed</h9><span class="badge"><input type="text" name="" id="bad" disabled="" style="outline: none; border: none; width: 40px; text-align: center;"></span></a></li>
                </ul>        
              </div>
            </div>
          </div>         

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">List of All Medicines to be Dispensed to Programs</div>
                  <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-responsive compact" style="width: 100%;" id="usersdata">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Program Name</th>
                        <th>Medicine Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th style="max-width: 150px;">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM medicine_stock WHERE programName != 'None' AND quantity > 0 ORDER BY dateStocked";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                       <tr class="user_<?php echo $data['inventoryID']; ?>">
                        <td><?php echo $data['inventoryID'];?></td>
                        <td><?php echo $data['programName'];?></td>
                        <td><?php echo $data['brand'].", ".$data['generic'];?></td>
                        <td><?php echo $data['strength']."/ ".$data['form'];?></td>
                        <td><?php echo $data['quantity'];?></td>
                        <td>
                             &nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" style="text-decoration: none;" onclick="promptCoor('<?php echo $data['inventoryID'];?>','<?php echo $data['programName'];?>','<?php echo $data['brand'];?>','<?php echo $data['generic'];?>','<?php echo $data['strength'];?>','<?php echo $data['form'];?>','<?php echo $data['quantity'];?>')"  title="Dispense to Program"><i class="fa fa-check" style="color: #1d6924"></i>&nbsp;Dispense Medicine</a>
                        </td>
                    </tr>
                     <?php
                        }
                    }
                    ?>
                </tbody>    
                </table>   
              </div>        
            </div>
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

<div class="modal fade" id="promptCoor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
            <form method="post" role="form" action="insert_med_dispense.php">
              <label for="coordinator">Enter Name of Coordinator:</label><span class="coordinator_error error" style="color: red;"></span>
              <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_dispense GROUP BY coorName ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist1" id="coordinator" name="coordinator" placeholder="Coordinator" style="width: 560px;" oninput="cl2()">';
                 echo '<datalist id="datalist1">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['coorName'] .'</option>';   
                   }
              echo '</datalist>';
              }else{
                echo '<input type="text" class="form-control" list="datalist1" id="coordinator" name="coordinator" placeholder="Coordinator" style="width: 560px;" oninput="cl2()">';
                echo '<datalist id="datalist1">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['coorName'] .'</option>';   
                   }
                echo '</datalist>';
              }
              ?> 
            <br><br>

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>ID:</strong></label><span class="inventoryID_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="inventoryID" name="inventoryID" style="width: 250px;" oninput="cl5()" readonly="">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Program Name:</strong></label><span class="program_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="program" name="program" style="width: 250px;" oninput="cl6()" readonly="">
           </div> 
          </div>            
        </div>              
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Brand Name:</strong></label><span class="brand_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="brand" name="brand" style="width: 250px;" oninput="cl5()" readonly="">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Generic Name:</strong></label><span class="generic_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="generic" name="generic" style="width: 250px;" oninput="cl6()" readonly="">
           </div> 
          </div>            
        </div>              
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Strength:</strong></label><span class="strength_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="strength" name="strength" style="width: 250px;" oninput="cl5()" readonly="">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Form:</strong></label><span class="form_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="form" name="form" style="width: 250px;" oninput="cl6()" readonly="">
           </div> 
          </div>            
        </div>              
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">

            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Quantity:</strong></label><span class="quantity_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="quantity" name="quantity" style="width: 250px;" oninput="cl6()" readonly="">
           </div> 
          </div>            
        </div>              
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div class="pull-right" style="margin-right: 20px;">
              <input type="hidden" id="action" name="action" value="add">
              <input type="hidden" id="dispenseID" name="dispenseID" value="">
              <button type="submit" id="" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    // CLOCK
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


    //PATIENT VIEW DETAILS
    function viewDetails(Firstname, Lastname){
        var form_data = {
        Lastname : Lastname,
        Firstname : Firstname 
    };
    

    $.ajax({
       url : "patients.php",
       method : "POST",
       data : form_data,
       dataType : "text",
       success : function(response) {
          $("#viewDetailsModal").modal('show');
        }  
    });
    }

    $(document).ready( function () {
    $('#usersdata').DataTable( {
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]        
    } );
    
    asb();

    } );    

</script>
<script type="text/javascript">
  
$("#submit").click(function(){
    var program = $('#program').val();
    var coordinator = $('#coordinator').val();
    var brand = $('#brand').val();
    var generic = $('#generic').val();
    var strength = $('#strength').val();
    var quantity = $('#quantity').val();
    var form = $('#form').val();
    var inventoryID = $('#inventoryID').val();
    var html = "";
    var action = $("#action").val();
    var valid = true;
    var dispenseID = $('#dispenseID').val();

    if(coordinator == ""){   
        valid = false;
        $(".coordinator_error").html(" * Required");
    }else{
          $(".coordinator_error").html("");
    }


if(valid == true){
        var form_data = {
        program : program,
        coordinator : coordinator,
        brand : brand,
        generic : generic,
        strength : strength,
        quantity : quantity, 
        form : form,
        action : action,
        inventoryID : inventoryID,
        dispenseID : dispenseID
      }; 

$.ajax({
            url : "insert_med_dispense.php",
            type : "POST",
            data : form_data,
            success: function(response){
              alert('Data successfully dispensed!');
              window.location.reload();
            }});
    }else{
        return false;
    }});

    $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });

    
    function dispenseMed(coordinator, inventoryID){
      var coordinator = coordinator;
      var inventoryID = inventoryID;

      $.ajax({
        url : "insert_med_dispense.php",
        method : "POST",
        data : form_data,
        success : function(response) {
          asb();
          alert('Medicine dispensed successfully.');
        }
    });
      asb();

    }

    function asb(){
      $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              if(response['id'] == "" || response['id'] == null){
                $("#bad").val(0);
              }else{
                $("#bad").val(response['id']);
              }
            }
    });
      
    }

    function promptCoor(inventoryID, program, brand, generic, strength, form, quantity){
       $('#promptCoor').modal({ backdrop: 'static', keyboard: false });
       $("#promptCoor").modal('show');
        var inventoryID = inventoryID;
        var program = program;
        var brand = brand;
        var generic = generic;
        var strength = strength;
        var form = form;
        var quantity = quantity;
       
        $('#coordinator').val("");
        $('#inventoryID').val(inventoryID);
        $('#program').val(program);
        $('#brand').val(brand);
        $('#generic').val(generic);
        $('#strength').val(strength);
        $('#form').val(form);
        $('#quantity').val(quantity);

    

 /*   $.ajax({
        url : "edit_med_dispense.php",
        method : "POST",
        data : form_data,
        success : function(response) {
          alert('Medicine dispensed successfully.');
        }
    });

      $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });*/
    }

 
    function delete_user(dispenseID) {
        
        if (confirm("Are you sure you want to delete?")) {
        var form_data = {
        dispenseID : dispenseID 
        };
    
    $.ajax({
        url : "delete_med_dispense.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+dispenseID).css("background","red");
            $(".user_"+dispenseID).fadeOut(1000);
        }
    });

      $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });    
      }else{

      }
$.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });    

    }


    function cl(){
      var x = $('#coordinator').val();
      if (x == "") {
        $(".coor_error").html(" *Required");
      }else{
        $(".coor_error").html("");
      }
    }

    function cl1(){
      var x = $('#program').val();
      if (x == "") {
        $(".program_error").html(" *Required");
      }else{
        $(".program_error").html("");
      }
    }

    function cl2(){
      var x = $('#coordinator').val();
      if (x == "") {
        $(".coordinator_error").html(" *Required");
      }else{
        $(".coordinator_error").html("");
      }
    }

    function cl3(){
      var x = $('#release_date').val();
      if (x == "") {
        $(".release_date_error").html(" *Required");
      }else{
        $(".release_date_error").html("");
      }
    }

    function cl4(){
      var x = $('#brand').val();
      if (x == "") {
        $(".brand_error").html(" *Required");
      }else{
        $(".brand_error").html("");
      }
    }

    function cl5(){
      var x = $('#generic').val();
      if (x == "") {
        $(".generic_error").html(" *Required");
      }else{
        $(".generic_error").html("");
      }
    }

    function cl6(){
      var x = $('#strength').val();
      if (x == "") {
        $(".strength_error").html(" *Required");
      }else{
        $(".strength_error").html("");
      }
    }

    function cl7(){
      var x = $('#form').val();
      if (x == "") {
        $(".form_error").html(" *Required");
      }else{
        $(".form_error").html("");
      }
    }

    function cl8(){
      var x = $('#volume').val();
      if (x == "") {
        $(".volume_error").html(" *Required");
      }else{
        $(".volume_error").html("");
      }
    }

    function cl9(){
      var x = $('#quantity').val();
      if (x == "") {
        $(".quantity_error").html(" *Required");
      }else{
        $(".quantity_error").html("");
      }
    }

</script>
</body>

</html>