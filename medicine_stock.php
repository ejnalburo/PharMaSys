
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">

<style>
  #pr{
    display: none;
    visibility: hidden;
  }

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
              <li  style="background-color: rgb(191, 232, 167);"><a href="medicine_stock.php" style="text-decoration: none; font-size: 12px;">Stock Medicines</a></li>
              <li><a href="medicine_dispense.php" style="text-decoration: none; font-size: 12px;">Dispense Medicines</a></li>
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
            <li class="active">Stock Medicines</li>
          </ol>
          <h1>Stock Medicines</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
              <h9>As of Today:</h9>
                <ul class="nav nav-pills">
                  <li class="active"><a href="medicine_stocked_today.php"><h9>Medicine Stocked</h9><span class="badge"><input type="text" name="" id="bas" disabled="" style="outline: none; border: none; width: 40px; text-align: center;"></span></a></li>
                </ul>
                <div class="pull-right">
                <ul class="nav nav-pills">
                  <button class="btn btn-success" class="add_new_stock" id="add_new_stock"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Stock</button>
                </ul>
                </div>         
              </div>
            </div>
          </div>         

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">List of All Medicines Stocked</div>
                  <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-responsive compact" style="width: 100%;" id="usersdata">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Generic</th>
                        <th>Description</th>
                        <th>Lot No</th>
                        <th>Expiration Date</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM medicine_stock WHERE quantity > 0 ORDER BY inventoryID desc";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                       <tr class="user_<?php echo $data['inventoryID']; ?>">
                        <td><?php echo $data['inventoryID'];?></td>
                        <td><?php echo $data['brand'];?></td>
                        <td><?php echo $data['generic'];?></td>
                        <td><?php echo $data['strength'] . "/ " . $data['form'];?></td>
                        <td><?php echo $data['lotno'];?></td>
                        <td><?php echo $data['dateExpired'];?></td>
                        <td><?php echo $data['price'];?></td>
                        <td><?php echo $data['quantity'];?></td>
                        <td>
                            <a href="javascript:void(0);" style="text-decoration: none;" onclick="generate_barcode('<?php echo $data['barcode'];?>','pr')" title="Generate Barcode"><i class="fa fa-barcode" style="color: #1d6924"></i>&nbsp;&nbsp;Generate Barcode</a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0);" style="text-decoration: none;" onclick="edit_user('<?php echo $data['inventoryID'];?>','<?php echo $data['programName'];?>')" title="Edit"><i class="fa fa-edit" style="color: #1d6924"></i>&nbsp;Edit</a>&nbsp;&nbsp;&nbsp;
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
          <br><br>  
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

<div id="pr">

<img id="bars" style="width: 150px; height: 80px;"/>
</div>


<div class="modal fade" id="add_new_stock_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Medicines</h4>
            </div>
            <div class="modal-body">
  
  <form method="post" role="form" action="$_SERVER['PHP_SELF']">
                <div style="display: inline-block; margin-bottom: 40px;">
              <label for=""><strong>Barcode:</strong></label><span class="barcode_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barcode" style="width: 400px;" autofocus=""  oninput="cl14()" value="">        
            </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div style="display: inline-block; margin-bottom: 40px;">
              <button type="button" onclick="generate_barcodes()" class="btn btn-success"><i class="fa fa-refresh">&nbsp;&nbsp;<span>Generate</span></i></button>       
            </div> 
    
    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Type of Acquisition:</strong></label><span class="aquisition_error error" style="color: red;"></span>
              <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_stock GROUP BY aquisition ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist1" id="aquisition" name="aquisition" placeholder="Type of Acquisition" style="width: 250px;" oninput="cl1()">';
                 echo '<datalist id="datalist1">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['aquisition'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Type of Commodity:</strong></label><span class="commodity_error error" style="color: red;"></span>
              <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_stock GROUP BY commodity ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist2" id="commodity" name="commodity" placeholder="Type of Commodity" style="width: 250px;" oninput="cl2()">';
                 echo '<datalist id="datalist2">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['commodity'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
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
               <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_stock GROUP BY brand ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist3" id="brand" name="brand" placeholder="Brand Name" style="width: 250px;" oninput="cl3()">';
                 echo '<datalist id="datalist3">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['brand'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
             </div>

             <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
               <label for=""><strong>Generic:</strong></label><span class="generic_error error" style="color: red;"></span>
        <?php 
        include 'config.php';
         $sql = "SELECT * FROM medicine_stock GROUP BY generic ASC";
                $query =  mysqli_query($conn, $sql);
              $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist4" id="generic" name="generic" placeholder="Generic" style="width: 250px;" oninput="cl4()">';
                 echo '<datalist id="datalist4">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['generic'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
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
              <input type="text" class="form-control" id="strength" name="strength" placeholder="Strength" style="width: 250px;" oninput="cl5()">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Form:</strong></label><span class="form_error error" style="color: red;"></span>
              <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_stock GROUP BY form ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist5" id="form" name="form" placeholder="Form" style="width: 250px;" oninput="cl9()">';
                 echo '<datalist id="datalist5">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['form'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
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
              <label for=""><strong>Lot No.:</strong></label><span class="lotno_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="lotno" name="lotno" placeholder="Lot No." style="width: 250px;" oninput="cl7()">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Batch No.:</strong></label><span class="batchno_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="batchno" name="batchno" placeholder="Batch No." style="width: 250px;" oninput="cl8()">
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
              <input type="number" class="form-control" min="0" id="quantity" name="quantity" placeholder="Quantity" style="width: 250px;" oninput="cl6()">
           </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Price:</strong></label><span class="price_error error" style="color: red;"></span>
              <input type="number" min="0" class="form-control" id="price" name="price" placeholder="Price" style="width: 250px;"  oninput="cl13()">
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
              <label for=""><strong>Date Received:</strong></label><span class="dateReceived_error error" style="color: red;"></span>
              <input type="Date" class="form-control" id="dateReceived" name="dateReceived" placeholder="Date Received" style="width: 250px;" oninput="cl11()">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Date Expired:</strong></label><span class="dateExpired_error error" style="color: red;"></span>
              <input type="Date" class="form-control" id="dateExpired" name="dateExpired" placeholder="Date Expired" style="width: 250px;" oninput="cl12()">
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
              <label for=""><strong>Donated From:</strong></label><span class="donatedFrom_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="donatedFrom" name="donatedFrom" placeholder="Donated From" style="width: 250px;">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Office/Program:</strong></label><span class="officeProgram_error error" style="color: red;"></span>

              <?php 
               include 'config.php';
                $sql = "SELECT * FROM medicine_stock GROUP BY programName ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist6" id="officeProgram" name="officeProgram" placeholder="Office/Program" style="width: 250px;" oninput="cl15()">';
                 echo '<datalist id="datalist6">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['programName'] .'</option>';   
                   }
              echo '</datalist>';
              }
       ?>
      
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
            </div>

            <div class="pull-right" style="margin-right: 20px;">
              <input type="hidden" id="action" name="action" value="add">
              <input type="hidden" id="inventoryID" name="inventoryID" value="">
              <button type="button" id="submit" class="btn btn-primary" style="margin-left: 110px;">Submit</button> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>            
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
    <script src="js/JsBarcode.all.min.js"></script>

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

    asd();

     } );    

</script>
<script type="text/javascript">
  
    $("#add_new_stock").click(function(){
    $("#action").val("add");
    $("#inventoryID").val("");
    $("#aquisition").val("");
    $("#commodity").val("");
    $('#brand').val("");
    $('#generic').val("");
    $('#strength').val("");
    $('#quantity').val("");
    $('#lotno').val("");
    $('#batchno').val("");
    $('#form').val("");
    $('#officeProgram').val("");
    $('#dateReceived').val("");
    $('#dateExpired').val("");
    $('#donatedFrom').val("");
    $('#price').val("");
    $('#barcode').val("");
    $("#inventoryID").val("");
    $('#add_new_stock_modal').modal({ backdrop: 'static', keyboard: false });
    $("#add_new_stock_modal").modal('show');
 });

$("#submit").click(function(){
    var aquisition = $('#aquisition').val();
    var commodity = $('#commodity').val();
    var brand = $('#brand').val();
    var generic = $('#generic').val();
    var strength = $('#strength').val();
    var quantity = $('#quantity').val();
    var lotno = $('#lotno').val();
    var batchno = $('#batchno').val();
    var form = $('#form').val();
    var officeProgram = $('#officeProgram').val();
    var dateReceived = $('#dateReceived').val();
    var dateExpired = $('#dateExpired').val();
    var donatedFrom = $('#donatedFrom').val();
    var price = $('#price').val();
    var barcode = $('#barcode').val();
    var html = "";
    var action = $("#action").val();
    var inventoryID = $("#inventoryID").val();
    var valid = true;

if(brand == ""){
        valid = false;
        $(".brand_error").html(" *Required");

    }else{
        $(".brand_error").html("");    
    }

    if(generic == ""){
        valid = false;
        $(".generic_error").html(" *Required");
    }else{
        $(".generic_error").html("");    
    }

    
    if(quantity == ""){
        valid = false;
        $(".quantity_error").html(" *Required");
    }else{
        $(".quantity_error").html("");    
    }
 


    if(lotno == ""){
        valid = false;
        $(".lotno_error").html(" *Required");
    }else{
          $(".lotno_error").html("");
    }
       
 

    if(dateReceived == ""){
        valid = false;
        $(".dateReceived_error").html(" *Required");
    }else{
        $(".dateReceived_error").html("");    
    }

   if(dateExpired == ""){
          valid = false;
          $(".dateExpired_error").html(" *Required");
      }else{
          $(".dateExpired_error").html("");    
      }

    if(aquisition == ""){
         valid = false;
          $(".aquisition_error").html(" *Required");
      }else{
          $(".aquisition_error").html("");    
      }

    if(commodity == ""){
         valid = false;
          $(".commodity_error").html(" *Required");  
      }else{
          $(".commodity_error").html("");    
      }

    if(strength == ""){
          valid = false;
          $(".strength_error").html(" *Required");
      }else{
          $(".strength_error").html("");    
      }

    if(form == ""){
          valid = false;
          $(".form_error").html(" *Required");
      }else{
          $(".form_error").html("");    
      }


    if(donatedFrom == ""){
        donatedFrom = "";
      }else{
          $(".donatedFrom_error").html("");    
      }

    if(price == ""){
         valid = false;
          $(".price_error").html(" *Required");
      }else{
          $(".price_error").html("");    
      }

    if(barcode == ""){
        valid = false;
        $(".barcode_error").html(" *Required");

    }else if(barcode.length < 6){
        valid = false;
        $(".barcode_error").html(" *Required(6 characters up)");
    }else{
        $(".barcode_error").html("");    
    }


if(valid == true){
        var form_data = {
        aquisition : aquisition,
        commodity : commodity,
        brand : brand,
        generic : generic,
        strength : strength,
        quantity : quantity, 
        lotno : lotno,
        batchno : batchno,
        form : form,
        officeProgram : officeProgram,
        dateReceived : dateReceived,
        dateExpired : dateExpired,
        donatedFrom : donatedFrom,
        price : price,
        barcode : barcode,
        action : action,
        inventoryID : inventoryID
      };  

$.ajax({
            url : "insert_med_stock.php",
            type : "POST",
            data : form_data,
            dataType : "json",
            success: function(response){
                if(response['valid']==false){
                    alert(response['msg']);
                }else{
                    if(action == 'add'){
                        $("#add_new_stock_modal").modal('hide');
                        html += "<tr class=user_"+response['inventoryID']+">";
                        html += "<td>"+response['brand']+"</td>";
                        html += "<td>"+response['generic']+"</td>";
                        html += "<td>"+response['strength']+"/ "+response['form']+"</td>";
                        html += "<td>"+response['lotno']+"</td>";
                        html += "<td>"+response['batchno']+"</td>";
                        html += "<td>"+response['dateExpired']+"</td>";
                        html += "<td>"+response['price']+"</td>";
                        html += "<td>"+response['quantity']+"</td>";
                        html += "<td><a href='javascript:void(0);' style='text-decoration: none;' onclick='generate_barcode("+response['barcode']+")' title='Generate Barcode'><i class='fa fa-barcode' style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' style='text-decoration: none;' onclick='edit_user("+response['inventoryID']+", "+response['programName']+")'><i class='fa fa-edit' style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' style='text-decoration: none; color: red;' onclick='delete_user("+response['inventoryID']+")'><i class='fa fa-trash-o' style='color: #1d6924'></i></a></td>";
                        html += "<tr>";
                        $("#usersdata").prepend(html);
                        alert('Data successfully added!');

                        asd();
                        window.location.reload();
                    }else{
                      alert('Data successfully updated!');
                        window.location.reload();
                    }
                }
            }});
    }else{
        return false;
    }});
    
    asd();

    function edit_user(inventoryID, programID){
        var form_data = {
        inventoryID : inventoryID,
        programID : programID 
    };
    

    $.ajax({
        url : "edit_med_stock.php",
        method : "POST",
        data : form_data,
        dataType : "json",
        success : function(response) {
            $('#aquisition').val(response['aquisition']);
            $('#commodity').val(response['commodity']);
            $('#brand').val(response['brand']);
            $('#generic').val(response['generic']);
            $('#strength').val(response['strength']);
            $('#quantity').val(response['quantity']);
            $('#lotno').val(response['lotno']);
            $('#batchno').val(response['batchno']);
            $('#form').val(response['form']);
            $('#officeProgram').val(response['programName']);
            $('#dateReceived').val(response['dateReceived']);
            $('#dateExpired').val(response['dateExpired']);
            $('#donatedFrom').val(response['donatedFrom']);
            $('#price').val(response['price']);
            $('#barcode').val(response['barcode']);
            $("#inventoryID").val(response['inventoryID']);
            $('#add_new_stock_modal').modal({ backdrop: 'static', keyboard: false });
            $("#add_new_stock_modal").modal('show');
            $("#action").val("edit");
        }
    });

    asd();
    }

 
    function delete_user(inventoryID) {
      if (confirm("Are you sure you want to delete?")) {
        var form_data = {
        inventoryID : inventoryID 
        };
    
    $.ajax({
        url : "delete_med_stock.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+inventoryID).css("background","red");
            $(".user_"+inventoryID).fadeOut(1000);
            asd();
        }
    });


    }else{

    }

}

    function asd(){
    $.ajax({
      url : "get_med_stock_count.php",
            dataType : "json",
            success: function(response){
              if(response['id'] == "" || response['id'] == null){
                $("#bas").val(0);
              }else{
                $("#bas").val(response['id']);
              }
              
              
            }
    });
    }

    function printDiv(){
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("pr").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }

    function generate_barcode(barcode, pr){
      
      JsBarcode("#bars", barcode, {
        font: "fantasy",
        fontSize: 30
        });
      var printContents = document.getElementById('pr').innerHTML;
      var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}

      function generate_barcodes(){
      var barco = Date.now();
      $('#barcode').val(barco);
}


       $("#barcode").keyup(function(){
        var txt = $(this).val();

        if (txt != '') {
          $.ajax({
            url:"get_barcode_details.php",
            method:"post",
            data:{search:txt},
            dataType:"json",
            success:function(data)
            {
            $('#barcode').val(data['barcode']);
            $('#brand').val(data['brand']);
            $('#generic').val(data['generic']);
            $('#strength').val(data['strength']);
            $('#form').val(data['form']);
            $('#volume').val(data['volume']);
            $('#price ').attr({
              "placeholder" : ""
            });
            $('#quantity').attr({
              "placeholder" : ""
            });
            $("#aquisition").attr({
              "placeholder" : ""
            });
            $("#commodity").attr({
              "placeholder" : ""
            });
            $('#lotno').attr({
              "placeholder" : ""
            });
            $('#batchno').attr({
              "placeholder" : ""
            });
            $('#dateReceived').attr({
              "placeholder" : ""
            });
            $('#dateExpired').attr({
              "placeholder" : ""
            });
            $('#donatedFrom').attr({
              "placeholder" : ""
            });
            }

          });
        }else{
          $('#barcode').val("");
          $('#brand').val("");
          $('#generic').val("");
          $('#strength').val("");
          $('#form').val("");
          $('#volume').val("");
          $('#price').attr({
              "placeholder" : ""
            });
          $('#barcode').attr({
              "placeholder" : ""
            });
            $('#brand').attr({
              "placeholder" : ""
            });
            $('#generic').attr({
              "placeholder" : ""
            });
            $('#strength').attr({
              "placeholder" : ""
            });
            $('#form').attr({
              "placeholder" : ""
            });
            $('#volume').attr({
              "placeholder" : ""
            });
            $('#price').attr({
              "placeholder" : ""
            });
            $('#quantity').attr({
              "placeholder" : ""
            });
            $("#aquisition").attr({
              "placeholder" : ""
            });
            $("#commodity").attr({
              "placeholder" : ""
            });
            $('#lotno').attr({
              "placeholder" : ""
            });
            $('#batchno').attr({
              "placeholder" : ""
            });
            $('#dateReceived').attr({
              "placeholder" : ""
            });
            $('#dateExpired').attr({
              "placeholder" : ""
            });
            $('#donatedFrom').attr({
              "placeholder" : ""
            });
        }
      });

    function cl1(){
      var x = $('#aquisition').val();
      if (x == "") {
        $(".aquisition_error").html(" *Required");
      }else{
        $(".aquisition_error").html("");
      }
    }

    function cl2(){
      var x = $('#commodity').val();
      if (x == "") {
        $(".commodity_error").html(" *Required");
      }else{
        $(".commodity_error").html("");
      }
    }

    function cl3(){
      var x = $('#brand').val();
      if (x == "") {
        $(".brand_error").html(" *Required");
      }else{
        $(".brand_error").html("");
      }
    }

    function cl4(){
      var x = $('#generic').val();
      if (x == "") {
        $(".generic_error").html(" *Required");
      }else{
        $(".generic_error").html("");
      }
    }    

    function cl5(){
      var x = $('#strength').val();
      if (x == "") {
        $(".strength_error").html(" *Required");
      }else{
        $(".strength_error").html("");
      }
    }

    function cl6(){
      var x = $('quantity').val();
      if (x == "") {
        $(".quantity_error").html(" *Required");
      }else{
        $(".quantity_error").html("");
      }
    }

    function cl7(){
      var x = $('#lotno').val();
      if (x == "") {
        $(".lotno_error").html(" *Required");
      }else{
        $(".lotno_error").html("");
      }
    }

    function cl8(){
      var x = $('#batchno').val();
      if (x == "") {
        $(".batchno_error").html(" *Required");
      }else{
        $(".batchno_error").html("");
      }
    }

    function cl9(){
      var x = $('#form').val();
      if (x == "") {
        $(".form_error").html(" *Required");
      }else{
        $(".form_error").html("");
      }
    }

    function cl10(){
      var x = $('#volume').val();
      if (x == "") {
        $(".volume_error").html(" *Required");
      }else{
        $(".volume_error").html("");
      }
    }

    function cl11(){
      var x = $('#dateReceived').val();
      if (x == "") {
        $(".dateReceived_error").html(" *Required");
      }else{
        $(".dateReceived_error").html("");
      }
    }

    function cl12(){
      var x = $('#dateExpired').val();
      if (x == "") {
        $(".dateExpired_error").html(" *Required");
      }else{
        $(".dateExpired_error").html("");
      }
    }

    function cl13(){
      var x = $('#price').val();
      if (x == "") {
        $(".price_error").html(" *Required");
      }else{
        $(".price_error").html("");
      }
    }

    function cl14(){
      var x = $('#barcode').val();
      if (x == "") {
        $(".barcode_error").html(" *Required");
      }else{
        $(".barcode_error").html("");
      }
    }

    function cl15(){
      var x = $('#officeProgram').val();
      if (x == "") {
        $(".officeProgram_error").html(" *Required");
      }else{
        $(".officeProgram_error").html("");
      }
    }
</script>
</body>

</html>