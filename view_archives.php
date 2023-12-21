<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="" || $_SESSION['userType']!="Inventory") {
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
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">

<style>
  #printableTable {
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
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation" style="color: #ccc; background-color:#8d8d8d; border: none;">
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

          <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Inventory <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="medicine_stock.php" style="text-decoration: none; font-size: 12px;">Stock Medicines</a></li>
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
          <li class="active"><a href="utility.php"><i class="fa fa-cog"></i>Utility</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.html">Admin Panel</a></li>
            <li><a href="utility.php">Utilities</a></li>
            <li><a href="view_archives.php">View Archives</a></li>
            <li class="active">Archived Medicines</li>
          </ol>
          <h1>Archived Medicines</h1>


          <br>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="btn-group pull-right" id="templatemo_sort_btn" style="margin-top: 3px; margin-right: 3px;">
                <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="printDiv()"><i class="fa fa-print" ></i>&nbsp;Print</button>
                <form method="POST" action="" class="pull-right">
                  <table>
                    <tr><td>
                      <select class="form-control" name="category">
                      <option value=""></option>
                      <option value="expired">Expired Medicines</option>
                      <option value="out">No Longer Available Medicines</option>
                      </select></td>
                      <td><button class="btn btn-success" name="filter" class="pull-right"><i class="fa fa-filter"></i>&nbsp;Filter</button></td>
                
                    </tr>                
                  </table>
                </form>
              </div>
                <div class="panel-heading">List of All Archived Medicines</div>
                  <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-responsive compact" style="border: 1px solid; border-collapse: collapse;" id="usersdata">
                  <thead style="border: 1px solid; border-collapse: collapse; text-align: center;">
                    <tr>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center;">ID</th>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center; ">Medicine Name</th>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Description</th>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Quantity</th>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Date Received</th>
                      <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Date Expired</th>
                    </tr>
                  </thead>
                  <tbody style="border: 1px solid; border-collapse: collapse;"> 
                    <?php include 'filter_archives.php'; ?>           
                  </tbody>
                </table>
              </div>
            </div>
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

      <div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<div class="modal fade" id="add_new_stock_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Medicines</h4>
            </div>
            <div class="modal-body">
  
  <form method="post" role="form" action="$_SERVER['PHP_SELF']">

    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>First Name:</strong></label><span class="strength_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" style="width: 250px;" oninput="cl5()">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>Last Name:</strong></label><span class="quantity_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" style="width: 250px;" oninput="cl6()">
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
              <label for=""><strong>Username:</strong></label><span class="lotno_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="width: 250px;" oninput="cl7()">
            </div>

            <div style="display: inline-block; margin-left: 60px; margin-bottom: 10px;">
              <label for=""><strong>User Type:</strong></label><span class="batchno_error error" style="color: red;"></span>
              <select id="userType" class="form-control" style="width: 250px;" oninput="cl8()">
                <option id="userType" value="Null"></option>
                <option id="userType" value="Inventory">Inventory</option>
                <option id="userType" value="Billing">Billing</option>
                <option id="userType" value="Prescription">Prescription</option>
              </select>
           </div> 
        </div>            
        </div>              
     </div>
    </div>
    <br>
 
    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
            </div>

            <div class="pull-right" style="margin-right: 20px;">
              <input type="hidden" id="action" name="action" value="add">
              <input type="hidden" id="rid" name="rid" value="">
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


<div id ="printableTable">
  <center><p style="text-align: right;"><script> document.write(new Date().toLocaleDateString()); </script></p>
    <h3><strong>City Health Office</strong></h3>
    <br>
    <h9><strong>List of Archived Medicines</strong></h9>
    
    <table id="TableA" style="border: 1px solid; border-collapse: collapse; text-align: center;">
      
    </table>
  </center>
      <iframe name="print_frame" width="0" height="0" frameborder="1"  src="about:blank"></iframe>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
      asg();
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
  });
     
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

    function asg(){
    $.ajax({
      url : "get_users_count.php",
            dataType : "json",
            success: function(response){
              if(response['id'] == "" || response['id'] == null){
                $("#bag").val(0);
              }else{
                $("#bag").val(response['id']);
              }
              
              
            }
    });
    }

</script>
<script type="text/javascript">
  
    $("#add_new_stock").click(function(){
    $("#action").val("add");
    $("#rid").val("");
    $("#fname").val("");
    $("#lname").val("");
    $('#username').val("");
    $('#userType').val("Null");
    $("#rid").val("");
    $("#add_new_stock_modal").modal('show');
    $(".quantity_error").html("");
    $(".lotno_error").html("");
    $(".strength_error").html("");
    $(".batchno_error").html("");
 });

$("#submit").click(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var username = $('#username').val();
    var userType = $('#userType').val();
    var html = "";
    var action = $("#action").val();
    var rid = $("#rid").val();
    var valid = true;

    
    if(lname == ""){
        valid = false;
        $(".quantity_error").html(" *Required");
    }else{
        $(".quantity_error").html("");    
    }

    if(username == ""){
      valid = false;
      $(".lotno_error").html(" *Required");
    }else{
      $(".lotno_error").html("");
    }
    
    if($("#userType").val() == "Null"){   
        valid = false;
        $(".batchno_error").html(" *Required");
    }else{
          $(".batchno_error").html("");
    }

   
    if(fname == ""){
          valid = false;
          $(".strength_error").html(" *Required");
      }else{
          $(".strength_error").html("");    
      }


if(valid == true){
        var form_data = {
        fname : fname,
        lname : lname,
        username : username,
        userType : userType,
        action : action,
        rid : rid
      };  

$.ajax({
            url : "insert_users.php",
            type : "POST",
            data : form_data,
            dataType : "json",
            success: function(response){
                if(response['valid']==false){
                    alert(response['msg']);
                }else{
                    if(action == 'add'){
                        $("#add_new_stock_modal").modal('hide');
                        html += "<tr class=user_"+response['rid']+">";
                        html += "<td>"+response['fname']+"</td>";
                        html += "<td>"+response['lname']+"</td>";
                        html += "<td>"+response['username']+"</td>";
                        html += "<td>"+response['userType']+"</td>";
                        html += "<td><a href='javascript:void(0);' style='text-decoration: none;' onclick='reset_pass("+response['rid']+","+response['userType']+")' title='Reset Password'><i class='fa fa-undo' style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' style='text-decoration: none;' onclick='edit_user("+response['rid']+")' title='Edit User'><i class='fa fa-edit' style='color: #1d6924'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' style='text-decoration: none; color: red;' onclick='delete_user("+response['rid']+")' title='Delete User'><i class='fa fa-trash-o' style='color: #1d6924'></i></a></td>";
                        html += "<tr>";
                        $("#usersdata").prepend(html);
                        alert('Data successfully added!');

                        asg();
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                }
            }});
    }else{
        return false;
    }});
    
    asg();

    function edit_user(rid){
        var form_data = {
        rid : rid 
    };
    

    $.ajax({
        url : "edit_users.php",
        method : "POST",
        data : form_data,
        dataType : "json",
        success : function(response) {
            $('#username').val(response['username']);
            $('#fname').val(response['fname']);
            $('#lname').val(response['lname']);
            $('#userType').val(response['userType']);
            $("#rid").val(response['rid']);        
            $(".quantity_error").html("");
            $(".lotno_error").html("");
            $(".strength_error").html("");
            $(".batchno_error").html("");
            $("#add_new_stock_modal").modal('show');
            $("#action").val("edit");
        }
    });

    asg();
    }

 
    function delete_user(rid) {
      if (confirm("Are you sure you want to delete?")) {
        var form_data = {
        rid : rid 
        };
    
    $.ajax({
        url : "delete_users.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+rid).css("background","red");
            $(".user_"+rid).fadeOut(1000);
            asg();
        }
    });


    }else{

    }

}

  function reset_pass(rid, userType) {
      if (confirm("Are you sure you want to reset the password of this account?")) {
        
        var form_data = {
        rid : rid,
        userType : userType 
        };
        
    $.ajax({
        url : "reset_pass.php",
        method : "POST",
        data : form_data,
        dataType : "json",
        success : function(response) {
          alert(response['msg']);
          window.location.reload();
        }
    });


    }else{
      window.location.reload();
    }

}



    function printDiv(){
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }

    function generate_barcode(barcode){
      var barcode = barcode;
      var amount = prompt("How many barcode/s do you want?");
      
      var form_data = {
        barcode : barcode,
        amount : amount
      };

      $.ajax({
        url : "generate_barcode.php",
        type : "POST",
        data : form_data,
        success : function(response){
          $("#printableTable").html(response);
          printDiv();
        }
      });


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
      if (x == "Null") {
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