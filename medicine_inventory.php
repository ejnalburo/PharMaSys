
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
  #printableTable, #printableTable1 {
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
<body onload="copytable()">
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

          <li class="sub" >
            <a href="javascript:;">
              <i class="fa fa-database"></i> Inventory <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="medicine_stock.php" style="text-decoration: none; font-size: 12px;">Stock Medicines</a></li>
              <li><a href="medicine_dispense.php" style="text-decoration: none; font-size: 12px;">Dispense Medicines</a></li>
            </ul>
          </li>

           <li class="sub open" style="background-color: rgb(191, 232, 167);">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i> Reports <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li  style="background-color: rgb(191, 232, 167);"><a href="medicine_inventory.php" style="text-decoration: none; font-size: 12px;">Medicine Inventory Status</a></li>
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
            <li><a href="#">Reports</a></li>
            <li class="active">Medicine Inventory Status</li>
          </ol>
          <h1>Inventory Status</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
              
              </div>
            </div>
          </div>         

          <div class="panel panel-primary">
              <div class="btn-group pull-right" id="templatemo_sort_btn" style="margin-top: 3px; margin-right: 3px;">
                <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="printDiv()"><i class="fa fa-print"></i>&nbsp;Print</button>

                <form method="POST" action="" class="pull-right">
                  <table>
                    <tr><td>
                      <select class="form-control" name="category">
                      <option value="50"></option>
                      <option value="40">Less Than 40 Stocks Left</option>
                      <option value="20">Less Than 20 Stocks Left</option>
                      <option value="10">Less Than 10 Stocks Left</option>
                      </select></td>
                      <td><button class="btn btn-success" name="filter" class="pull-right" onclick="copytable()"><i class="fa fa-filter"></i>&nbsp;Filter</button></td>
                
                    </tr>                
                  </table>
                </form>
              </div>
                  <div class="panel-heading">Nearly Out of Stock</div>
                  <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-bordered table-responsive compact" style="border: 1px solid; border-collapse: collapse; width: 100%;" id="usersdata">
                    <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">ID</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Medicine Name</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Description</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Quantity</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Expiration Date</th>
                    </tr>
                    </thead>
                        <tbody style="text-align: center; border-style: 1px solid;">
                          <?php include'filter_inventory.php'?>
                        </tbody>
                </table>   
                </div>        
            </div>
          </div>
          <br>
          <br>     

           <div class="panel panel-primary">
              <div class="btn-group pull-right" id="templatemo_sort_btn" style="margin-top: 3px; margin-right: 3px;">
                <button type="button" class="btn btn-default" style="margin-right: 2px;" onclick="printDiv1()"><i class="fa fa-print"></i>&nbsp;Print</button>
              </div>
                  <div class="panel-heading">Out of Stock</div>
                  <div class="panel-body" id="printable1">
              <div class="table-responsive">
              <table class="table table-responsive compact" style="width: 100%; border-style: 1px solid; border-collapse: collapse;" id="userdata">
                    <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">ID</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Medicine Name</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Description</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Quantity</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Expiration Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM medicine_stock WHERE quantity = 0 GROUP BY brand, generic, strength, form, volume";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                   <tr class="user_<?php echo $data['inventoryID']; ?>">
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['inventoryID'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['brand']." ".$data['generic'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['strength']."/ ".$data['form']."/ ".$data['volume'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['quantity'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['dateExpired'];?></td>
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

          <br>
          <br>

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



<div id ="printableTable">
  <center><p style="text-align: right;"><script> document.write(new Date().toLocaleDateString()); </script></p>
    <h3><strong>City Health Office</strong></h3>
    <br>
    <h9><strong>List of Nearly Out of Stocks Medicines</strong></h9>
    
    <table id="TableA" style="border: 1px solid; border-collapse: collapse; text-align: center; width: 90%;">
      
    </table>
  </center>
      <iframe name="print_frame" width="0" height="0" frameborder="1"  src="about:blank"></iframe>
</div>

<div id ="printableTable1">
  <center><p style="text-align: right;"><script> document.write(new Date().toLocaleDateString()); </script></p>
    <h3><strong>City Health Office</strong></h3>
    <br>
    <h9>List of Out of Stocks Medicines</h9>
    
 <table class="table table-responsive compact" style="width: 100%; border-style: 1px solid; border-collapse: collapse;" id="userdata">
                    <thead>
                    <tr>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">ID</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Medicine Name</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Description</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Quantity</th>
                        <th style="border: 1px solid; text-align: center; border-collapse: collapse;">Expiration Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM medicine_stock WHERE quantity = 0 GROUP BY brand, generic, strength, form, volume";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                   <tr class="user_<?php echo $data['inventoryID']; ?>">
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['inventoryID'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['brand']." ".$data['generic'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['strength']."/ ".$data['form']."/ ".$data['volume'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['quantity'];?></td>
                        <td style="border: 1px solid; text-align: center; border-collapse: collapse;"><?php echo $data['dateExpired'];?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?> 
                </tbody>    
                </table>  
  </center>
      <iframe name="print_frame" width="0" height="0" frameborder="1"  src="about:blank"></iframe>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    function printDiv(){
      window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
      window.frames["print_frame"].window.focus();
      window.frames["print_frame"].window.print();
    }

    function printDiv1(){
      window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable1").innerHTML;
      window.frames["print_frame"].window.focus();
      window.frames["print_frame"].window.print();
    }
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

  function copytable() {
  var source = document.getElementById('usersdata');
  var destination = document.getElementById('TableA');
  var copy = source.cloneNode(true);
  copy.setAttribute('id', 'usersdata');
  destination.parentNode.replaceChild(copy, destination);
}

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

    $('#userdata').DataTable( {
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]        
    } );

    $('#usedata').DataTable( {
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]        
    } );
    
    $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });

    } );    

</script>
<script type="text/javascript">
  
$("#add_new_stock").click(function(){
    $("#action").val("add");
    $("#dispenseID").val("");
    $("#program").val("");
    $("#coordinator").val("");
    $('#brand').val("");
    $('#generic').val("");
    $('#strength').val("");
    $('#quantity').val("");
    $('#release_date').val("");
    $('#form').val("");
    $('#volume').val("");
    $("#dispenseID").val("");
    $("#add_new_stock_modal").modal('show');
 });

$("#submit").click(function(){
    var program = $('#program').val();
    var coordinator = $('#coordinator').val();
    var brand = $('#brand').val();
    var generic = $('#generic').val();
    var strength = $('#strength').val();
    var quantity = $('#quantity').val();
    var release_date = $('#release_date').val();
    var form = $('#form').val();
    var volume = $('#volume').val();
    var html = "";
    var action = $("#action").val();
    var dispenseID = $("#dispenseID").val();
    var valid = true;


    if(brand == ""){
        valid = false;
        $(".brand_error").html(" * Required");

    }else{
        $(".brand_error").html("");    
    }

    if(generic == ""){
        valid = false;
        $(".generic_error").html(" * Required");
    }else{
        $(".generic_error").html("");    
    }

    
    if(quantity == ""){
        valid = false;
        $(".quantity_error").html(" * Required");
    }else{
        $(".quantity_error").html("");    
    }
 


    if(program == ""){
        valid = false;
        $(".program_error").html(" * Required");
    }else{
          $(".program_error").html("");
    }
       
 
    
    if(coordinator == ""){   
        valid = false;
        $(".coordinator_error").html(" * Required");
    }else{
          $(".coordinator_error").html("");
    }


    if(strength == ""){
           valid = false;
        $(".strength_error").html(" * Required");
      }else{
          $(".strength_error").html("");    
      }

    if(volume == ""){
           valid = false;
        $(".volume_error").html(" * Required");
      }else{
          $(".volume_error").html("");    
      }

    if(form == ""){
           valid = false;
        $(".form_error").html(" * Required");
      }else{
          $(".form_error").html("");    
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
        volume : volume,
        action : action,
        dispenseID : dispenseID
      }; 

$.ajax({
            url : "insert_med_dispense.php",
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
                        html += "<td>"+response['program']+"</td>";
                        html += "<td>"+response['coordinator']+"</td>";
                        html += "<td>"+response['brand']+", "+response['generic']+"</td>";
                        html += "<td>"+response['strength']+"/ "+response['form']+"/ "+response['volume']+"</td>";
                        html += "<td>"+response['quantity']+"</td>";
                        html += "<td>&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' onclick='dispenseMed("+response['inventoryID']+");'><i class='fa fa-check' style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' onclick='edit_user("+response['inventoryID']+");'><i class='fa fa-edit'style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' onclick='delete_user("+response['inventoryID']+");'><i class='fa fa-trash-o' style='color: #1d6924'></i></a></td>";
                        html += "<tr>";
                        $("#usersdata").prepend(html);
                        alert('Data successfully added!');
                    }else{
                        window.location.reload();
                    }
                }
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
      var x = $('#coordinator').val();
      var coordinator = coordinator;
      var inventoryID = inventoryID;

      $.ajax({
        url : "insert_med_dispense.php",
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
    });
      
    }


    function promptCoor(inventoryID){
       $("#promptCoor").modal('show');
        var inventoryID = inventoryID;
       
        $('#inventoryID').val(inventoryID);

    

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

  function copytable() {
  var source = document.getElementById('usersdata');
  var destination = document.getElementById('TableA');
  var copy = source.cloneNode(true);
  copy.setAttribute('id', 'usersdata');
  destination.parentNode.replaceChild(copy, destination);
}

</script>
</body>

</html>