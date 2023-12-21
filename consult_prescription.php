
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">

<style>
  #printableTable{
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

          <li><a href="patient_index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

          <li><a href="add_patients.php"><i class="fa fa-wheelchair"></i>Patients</a></li>

          <li class="active"><a href="consult_prescription.php"><i class="fa fa-file-text"></i>Consultation and Prescription</a></li>

          <li><a href="patient_utility.php"><i class="fa fa-cog"></i>Account Settings</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="patient_index.php">Prescription Panel</a></li>
            <li><a href="consult_prescription.php">Consultation and Prescription</a></li>
            <li class="active">Add New Consultation and Prescription</li>
          </ol>
          <h1>Add New Consultation and Prescription</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
         
              </div>
            </div>
          </div>         

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="panel-heading">Consultations and Prescriptions</div>
                  <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-striped table-responsive compact" style="width: 100%;" id="usersdata">
                    <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th>Patient Name</th>
                        <th style="text-align: center;">Sex</th>
                        <th style="text-align: center;">Age</th>
                        <th style="text-align: center;">Blood Type</th>
                        <th style="text-align: center;">Address</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php 
                    include 'config.php';


                    $sql = "SELECT firstname, lastname, sex, age, brgyName, patientID, bloodType FROM patients a, barangay b WHERE a.brgyID = b.brgyID GROUP BY lastname, firstname";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                       <tr class="user_<?php echo $data['patientID']; ?>">
                        <td style="text-align: center;"><?php echo $data['patientID'];?></td>
                        <td><?php echo $data['firstname'] . " " .$data['lastname'];?></td>
                        <td style="text-align: center;"><?php echo $data['sex'];?></td>
                        <td style="text-align: center;"><?php echo $data['age'];?></td>
                        <td style="text-align: center;"><?php echo $data['bloodType'];?></td>
                        <td style="text-align: center;"><?php echo $data['brgyName'];?></td>
                        <td style="text-align: center;">&nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0);" style="text-decoration: none;" onclick="consultation('<?php echo $data['patientID'];?>','<?php echo $data['firstname'];?>','<?php echo $data['lastname'];?>','<?php echo $data['age'];?>','<?php echo $data['brgyName'];?>','<?php echo $data['bloodType'];?>')" title="Add Consultation & Prescription"><i class="fa fa-plus-square" style="color: #1d6924"></i>&nbsp;&nbsp;&nbsp;Add Consultation & Prescription</a>
                        </td>
                    </tr>
                     <?php
                        }
                    }
                    ?>
                </tbody>    
                </table>  
              </div>
                <br><br>
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



      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>&copy; 2020 PharMaSys&trade;</p>
          <h10>version 1.0.0</h10>
        </div>
      </footer>
    </div>

<div class="modal fade" id="add_new_stock_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-content" style="margin-left: 90px; width: 1200px;">
            <div class="modal-header">
                <div class="pull-right"><b><p style="text-align: right;">Date:&nbsp;<script> document.write(new Date().toLocaleDateString()); </script></p></b></div>
                <h3 class="modal-title"><b>Add Prescription</b></h3>
            </div>
            <div class="modal-body">
  
  <form method="post" role="form" action="$_SERVER['PHP_SELF']">
    <input type="hidden" name="id" id="id">

   
    <div class="row">
      <div class="col-md-12">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Last Name:</strong></label><span class="lastname_error error" style="color: red;"></span>
              <input type="text" class="form-control" readonly="" name="lastname" id="lastname" placeholder="Last Name" style="width: 250px; outline: none; border: none;" oninput="cl1()">
            </div>

            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>First Name:</strong></label><span class="firstname_error error" style="color: red;"></span>
              <input type="text" class="form-control" readonly="" name="firstname" id="firstname" placeholder="First Name" style="width: 250px; outline: none; border: none;" oninput="cl2()">
            </div>

            <div style="display: inline-block; margin-left: 55px; margin-bottom: 10px;">
              <label for=""><strong>Birth Date:</strong></label><span class="age_error error" style="color: red;"></span>
              <input type="Date" class="form-control" readonly="" name="age" id="age" placeholder="Birth Date" style="width: 250px; outline: none; border: none;" oninput="cl3()">
            </div>

            <div style="display: inline-block; margin-left: 55px; margin-bottom: 10px;">
              <label for=""><strong>Current Address:</strong></label><span class="address_error error" style="color: red;"></span>
              <input type="text" class="form-control" readonly="" name="address" id="address" placeholder="Current Address" style="width: 250px; outline: none; border: none;" oninput="cl4()">
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
              <label for=""><strong>Blood Type:</strong></label><span class="blood_error error" style="color: red;"></span>
              <input type="text" class="form-control" readonly="" name="blood" id="blood" placeholder="Blood Type" style="width: 250px; outline: none; border: none;" oninput="cl5()">
            </div>
        
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
              <label for=""><strong>Weight:</strong></label><span class="weight_error error" style="color: red;"></span>
              <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter Weight" style="width: 250px;" oninput="cl6()">
            </div>

            <div style="display: inline-block; margin-left: 55px; margin-bottom: 10px;">
              <label for=""><strong>Blood Pressure:</strong></label><span class="bloodpress_error error" style="color: red;"></span>
              <input type="text" class="form-control" id="bloodpress" name="bloodpress" placeholder="Enter Blood Pressure" style="width: 250px; width: 250px;" oninput="cl7()">
           </div> 
        </div>            
        </div>              
     </div>
    </div>
    <br>
    <br>
 
    <div class="row">
      <div class="col-md-12">
         <div class="templatemo-alerts">
           <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
               <label for="" style="font-size: 20px;"><strong>Consultation Findings:</strong></label><span class="consult_error error" style="color: red;"></span>
               <textarea class="form-control" name="consult" id="consult" style="width: 1170px; height: 100px;" oninput="cl8()"></textarea>
             </div>

          </div>            
         </div>              
      </div>
     </div>
    <br>
    <br>

    <div class="row">
      <div class="col-md-12">
         <div class="templatemo-alerts">
           <div class="row">
            <div style="display: inline-block; margin-left: 15px; margin-bottom: 10px;">
            <label for="" style="font-size: 20px;"><strong>Doctor's Prescription:</strong></label><span class="doc_error error" style="color: red;"></span>
            <br>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="templatemo-alerts">
                  <div class="row">
                  <?php 
                    include 'config.php';
                    
                    $sql = "SELECT * FROM doctor";
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    if($rows>0) {
                      echo '<td><label for="" style=" margin-left: 15px;"><strong>Doctor Consulted:</strong></label><span class="doctorName_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist4" id="doctorName" name="doctorName" placeholder="" style=" margin-left: 15px; width: 230px; height: 50px; text-transform: uppercase;" oninput="cl20()">';
                      echo '<datalist id="datalist4">';
                    
                      while($data = mysqli_fetch_array($query)) {
                        echo '<option>'. $data['doctorName'] .'</option>';   
                      }
                        echo '</datalist></td>';
                    }else{
                      echo '<td><label for="" style=" margin-left: 15px;"><strong>Doctor Consulted:</strong></label><span class="doctorName_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist4" id="doctorName" name="doctorName" placeholder="" style=" margin-left: 15px; width: 230px; height: 50px; text-transform: uppercase;" oninput="cl20()">';
                    }
                  ?>

                  </div>
                </div>
              </div>
            </div>

            <br>
            <table>
              <tr>

                <?php 
                    include 'config.php';
                    
                    $sql = "SELECT * FROM medicine_stock GROUP BY brand ASC";
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    if($rows>0) {
                      echo '<td><label for=""><strong>Brand Name:</strong></label><span class="brand_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist1" id="brand" name="brand" placeholder="" style="width: 175px; height: 50px;" oninput="cl9()">';
                      echo '<datalist id="datalist1">';
                    
                      while($data = mysqli_fetch_array($query)) {
                        echo '<option>'. $data['brand'] .'</option>';   
                      }
                        echo '</datalist></td>';
                    }else{
                      echo '<td><label for=""><strong>Brand Name:</strong></label><span class="brand_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist1" id="brand" name="brand" placeholder="" style="width: 175px; height: 50px;" oninput="cl9()">';
                    }
                  ?>


                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>

                  <?php 
                    include 'config.php';
                    
                    $sql = "SELECT generic FROM medicine_stock GROUP BY generic ASC";
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    if($rows>0) {
                      echo '<td><label for=""><strong>Generic Name:</strong></label><span class="generic_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist2" id="generic" name="generic" placeholder="" style="width: 175px;  height: 50px;" oninput="cl10()">';
                      echo '<datalist id="datalist2">';
                    
                      while($data = mysqli_fetch_array($query)) {
                        echo '<option>'. $data['generic'] .'</option>';   
                      }
                        echo '</datalist></td>';
                    }else{
                      echo '<td><label for=""><strong>Generic Name:</strong></label><span class="generic_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist2" id="generic" name="generic" placeholder="" style="width: 175px;  height: 50px;" oninput="cl10()">';
                    }
                  ?>


                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>


                  <?php 
                    include 'config.php';
                    
                    $sql = "SELECT strength FROM medicine_stock GROUP BY strength ASC";
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    if($rows>0) {
                      echo '<td><label for=""><strong>Strength:</strong></label><span class="strength_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist3" id="strength" name="strength" placeholder="" style="width: 170px;  height: 50px;" oninput="cl11()">';
                      echo '<datalist id="datalist3">';
                    
                      while($data = mysqli_fetch_array($query)) {
                        echo '<option>'. $data['strength'] .'</option>';   
                      }
                        echo '</datalist></td>';
                    }else{
                      echo '<td><label for=""><strong>Strength:</strong></label><span class="strength_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist3" id="strength" name="strength" placeholder="" style="width: 170px;  height: 50px;" oninput="cl11()">';
                    }
                  ?>


                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>


                  <?php 
                    include 'config.php';
                    
                    $sql = "SELECT form FROM medicine_stock GROUP BY form ASC";
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    if($rows>0) {
                      echo '<td><label for=""><strong>Form:</strong></label><span class="form_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist5" id="form" name="form" placeholder="" style="width: 150px;  height: 50px;" oninput="cl21()">';
                      echo '<datalist id="datalist5">';
                    
                      while($data = mysqli_fetch_array($query)) {
                        echo '<option>'. $data['form'] .'</option>';   
                      }
                        echo '</datalist></td>';
                    }else{
                      echo '<td><label for=""><strong>Form:</strong></label><span class="form_error error" style="color: red;"></span><input type="text" class="form-control" list="datalist5" id="form" name="form" placeholder="" style="width: 150px;  height: 50px;" oninput="cl21()">';
                    }
                  ?>


                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>


                  <td><label for=""><strong>Quantity:</strong></label><span class="quantity_error error" style="color: red;"></span><input type="number" class="form-control" name="quantity" min="0" id="quantity" style="width: 80px; height: 50px;" oninput="cl12()"></td>


                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>



                  <td><label for=""><strong>Direction for Use:</strong></label><span class="direction_error error" style="color: red;"></span><textarea class="form-control" name="direction" id="direction" style="width: 220px; height: 50px;" oninput="cl13()"></textarea></td>
                  

                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>


                  <td>
                    <button style="height: 50px; margin-top: 25px;" type="button" name="ins" id="ins" class="btn btn-primary"><i class="fa fa-add"></i>&nbsp;Add to Table</button>                    
                  </td>
                  </tr>
                  </table>

            <!--<div class="pull-right" style="margin-right: 40px;">
              <table>
                <tr>
                  <td>
               <input type="text" name="key" id="key" class="form-control"></td><td>&nbsp;&nbsp;</td><td><button type="button" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Search Medicine</button></td>
                </tr>
              </table>
             </div>-->


            </div>
          </div>            
         </div>              
      </div>
     </div>
    <br>
    <br>


    <div class="row">
        <div class="templatemo-alerts">
          <div class="row">
            <div style="display: inline-block; margin-left: 35px; margin-bottom: 10px;">
              
              <div class="panel panel-primary" style="width: 1160px;" >
                <div class="panel-heading">Prescribed Medicines</div>
                <div class="panel-body">
             <div class="table-responsive">
              <table class="table table-responsive" id="userdata" width="100%">
                <thead>
                  <tr>
                  <td>ID</td>
                  <th>Brand Name</th>
                  <th>Generic Name</th>
                  <th>Strength</th>
                  <th>Form</th>
                  <th>Qty</th>
                  <th>Direction for Use</th>
                  <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM prescription WHERE transID = 0 OR transID = '' ORDER BY prescriptionID DESC";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                

                <tr class="user_<?php echo $data['prescriptionID']; ?>" name='line_items'>
                    <td><?php echo $data['prescriptionID']; ?></td>
                    <td><?php echo $data['brand']; ?></td>
                    <td><?php echo $data['generic']; ?></td>
                    <td><?php echo $data['strength']; ?></td>

                    <td><?php echo $data['form']; ?></td>
                    <td><input type="text" name="qty" value="<?php echo $data['quantity']; ?>" style="border: none; width: 100px;" disabled=""></td>

                    <td><?php echo $data['direction']; ?></td>
                    <td><a href="javascript:void(0);" onclick="delete_row('<?php echo $data['prescriptionID']; ?>')"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete Prescription</a></td>
                </tr>
   
                  <?php
                        }
                    }
                    ?>
                     
                  </tbody>
                <!--<tfoot>
                  <tr>
                    <td colspan="8"><input type="button" name="addRow" id="addRow" value="Add New Row" class="btn btn-success" style="width: 1120px;"></td>
                  </tr>
                </tfoot>-->
              </table>
            </div>
              </div>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

  $("#ins").click(function(){
    var brand = $('#brand').val();
    var generic = $('#generic').val();
    var strength = $('#strength').val();
    var form = $('#form').val();
    var quantity = $('#quantity').val();
    var direction = $('#direction').val();
    var html = "";
    var patientID = $("#id").val();
    var valid = true;

if(brand == ""){
        valid = false;
        $(".brand_error").html("*Required.");
        $('#brand').val('');
    }else{
        $(".brand_error").html("");    
    }

    if(generic == ""){
        valid = false;
        $(".generic_error").html("*Required.");
        $('#generic').val('');
    }else{
        $(".generic_error").html("");    
    }

    
    if(quantity == ""){
        valid = false;
        $(".quantity_error").html("*Required.");
        $('#quantity').val('');
    }else{
        $(".quantity_error").html("");    
    }
 

    if(strength == ""){
          valid = false;
          $(".strength_error").html("*Required.");
          $('#strength').val('');
      }else{
          $(".strength_error").html("");    
      }


    if(form == ""){
          valid = false;
          $(".form_error").html("*Required.");
          $('#form').val('');
      }else{
          $(".form_error").html("");    
      }


    if(direction == ""){
          valid = false;
          $(".direction_error").html("*Required.");
          $('#direction').val('');
      }else{
          $(".direction_error").html("");    
      }

    
if(valid == true){
        var form_data = {
        patientID : patientID,
        brand : brand,
        generic : generic,
        strength : strength,
        form : form,
        quantity : quantity, 
        direction : direction
      }; 

    $("#brand").val("");
    $("#generic").val("");
    $("#strength").val("");
    $("#form").val("");
    $("#quantity").val("");
    $("#direction").val("");

$.ajax({
            url : "insert_prescription.php",
            type : "POST",
            data : form_data,
            dataType : "json",
            success: function(response){
                if(response['valid']==false){
                    alert(response['msg']);
                }else{
                        html += "<tr class=user_"+response['prescriptionID']+" name='line_items'>";
                        html += "<td>"+response['prescriptionID']+"</td>";
                        html += "<td>"+response['brand']+"</td>";
                        html += "<td>"+response['generic']+"</td>";
                        html += "<td>"+response['strength']+"</td>";
                        html += "<td>"+response['form']+"</td>";
                        html += "<td><input type'text' name='qty' value='"+response['quantity']+"' style='border: none; width: 100px;' disabled='' ></td>";
                        html += "<td>"+response['direction']+"</td>";
                        html += "<td><a href='javascript:void(0);' onclick='delete_row("+response['prescriptionID']+");'><i class='fa fa-trash-o'></i>&nbsp;&nbsp;Delete Prescription</a></td>";
                        html += "<tr>";
                        $("#userdata").prepend(html);
                }
            }});
    }else{
        return false;
    }
  });



</script>

<script>
  
    function cl1(){
      var x = $('#lastname').val();
      if (x == "") {
        $(".lastname_error").html(" *Required");
      }else{
        $(".lastname_error").html("");
      }
    }

    function cl2(){
      var x = $('#firstname').val();
      if (x == "") {
        $(".firstname_error").html(" *Required");
      }else{
        $(".firstname_error").html("");
      }
    }

    function cl3(){
      var x = $('#age').val();
      if (x == "") {
        $(".age_error").html(" *Required");
      }else{
        $(".age_error").html("");
      }
    }

    function cl4(){
      var x = $('#address').val();
      if (x == "") {
        $(".address_error").html(" *Required");
      }else{
        $(".address_error").html("");
      }
    }    

    function cl5(){
      var x = $('#blood').val();
      if (x == "") {
        $(".blood_error").html(" *Required");
      }else{
        $(".blood_error").html("");
      }
    }

    function cl6(){
      var x = $('#weight').val();
      if (x == "") {
        $(".weight_error").html(" *Required");
      }else{
        $(".weight_error").html("");
      }
    }

    function cl7(){
      var x = $('#bloodpress').val();
      if (x == "") {
        $(".bloodpress_error").html(" *Required");
      }else{
        $(".bloodpress_error").html("");
      }
    }

    function cl8(){
      var x = $('#consult').val();
      if (x == "") {
        $(".consult_error").html(" *Required");
      }else{
        $(".consult_error").html("");
      }
    }

    function cl9(){
      var x = $('#brand').val();
      if (x == "") {
        $(".brand_error").html(" *Required");
      }else{
        $(".brand_error").html("");
      }
    }

    function cl10(){
      var x = $('#generic').val();
      if (x == "") {
        $(".generic_error").html(" *Required");
      }else{
        $(".generic_error").html("");
      }
    }

    function cl11(){
      var x = $('#strength').val();
      if (x == "") {
        $(".strength_error").html(" *Required");
      }else{
        $(".strength_error").html("");
      }
    }

    function cl12(){
      var x = $('#quantity').val();
      if (x == "") {
        $(".quantity_error").html(" *Required");
      }else{
        $(".quantity_error").html("");
      }
    }

    function cl13(){
      var x = $('#direction').val();
      if (x == "") {
        $(".direction_error").html(" *Required");
      }else{
        $(".direction_error").html("");
      }
    }

    function cl20(){
      var x = $('#doctorName').val();
      if (x == "") {
        $(".doctorName_error").html(" *Required");
      }else{
        $(".doctorName_error").html("");
      }
    }


    function cl21(){
      var x = $('#form').val();
      if (x == "") {
        $(".form_error").html(" *Required");
      }else{
        $(".form_error").html("");
      }
    }


$("#submit").click(function(){

    var weight = $('#weight').val();
    var bloodpress = $('#bloodpress').val();
    var consult = $('#consult').val();
    var doctorName = $('#doctorName').val();
    var transID = Date.now();
    var html = "";
    var action = $("#action").val();
    var patientID = $("#id").val();
    var valid = true;

if(weight == ""){
        valid = false;
        $(".weight_error").html(" *Required");

    }else{
        $(".weight_error").html("");    
    }

    if(bloodpress == ""){
        valid = false;
        $(".bloodpress_error").html(" *Required");
    }else{
        $(".bloodpress_error").html("");    
    }

    
    if(consult == ""){
        valid = false;
        $(".consult_error").html(" *Required");
    }else{
        $(".consult_error").html("");    
    }

    if(doctorName == ""){
        valid = false;
        $(".doctorName_error").html(" *Required");
    }else{
        $(".doctorName_error").html("");    
    }

if(valid == true){
        var form_data = {
        weight : weight, 
        bloodpress : bloodpress,
        consult : consult,
        doctorName : doctorName,
        transID : transID,
        action : action,
        patientID : patientID
      };  

$.ajax({
            url : "insert_consultation_prescription.php",
            type : "POST",
            data : form_data,
            success: function(response){
              alert("Data successfully Added!");
              $("#add_new_stock_modal").modal("hide");
              window.location.reload();
            }});
    }else{
        return false;
    }});

   
</script>

<script type="text/javascript">
 function consultation(patientID, firstname, lastname, age, brgyName, bloodType) {
      var patientID = patientID;
      $("#id").val(patientID);
      $("#firstname").val(firstname);
      $("#lastname").val(lastname);
      $("#age").val(age);
      $("#address").val(brgyName);
      $("#blood").val(bloodType);
      $("#weight").val("");
      $("#bloodpress").val("");
      $("#consult").val("");
      $("#doctorName").val("");
      $("#brand").val("");
      $("#generic").val("");
      $("#strength").val("");
      $("#quantity").val("");
      $("#direction").val("");
      $('#add_new_stock_modal').modal({ backdrop: 'static', keyboard: false });

      $("#add_new_stock_modal").modal("show");  



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

    function delete_row(prescriptionID){
      if (confirm("Are you sure you want to delete?")) {
        var form_data = {
        prescriptionID : prescriptionID 
        };
    
    $.ajax({
        url : "delete_prescription.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+prescriptionID).css("background","red");
            $(".user_"+prescriptionID).fadeOut(1000);
            asd();
        }
    });


    }else{

    }
    }

    function delete_rows(prescriptionID){
        var form_data = {
        prescriptionID : prescriptionID 
        };
    
    $.ajax({
        url : "delete_prescription.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+prescriptionID).css("background","red");
            $(".user_"+prescriptionID).fadeOut(1000);
            asd();
        }
    });
    }


$(document).ready(function(){
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
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false,
        "oLanguage": {
      "sEmptyTable": " "
    }
    } );
});


</script>
</body>

</html>