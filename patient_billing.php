
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
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">
<style>
  #aab{
    display: none;
    visibility: hidden;

  }
  #ticket {
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

          <li><a href="billing_index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

          <li class="active"><a href="patient_billing.php"><i class="fa fa-dollar"></i>Billing</a></li>

          <li><a href="payment_entries.php"><i class="fa fa-money"></i>Payment Entries</a></li>

          <li><a href="billing_utility.php"><i class="fa fa-cog"></i>Account Settings</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="billing_index.php">Billing Panel</a></li>
            <li><a href="patient_billing.php.">Billing</a></li>
            <li class="active">Add Product</li>
          </ol>
     

          <div class="row" style="">
            
              <div class="col-md-4">
            <div class="panel" style="box-shadow: 0 3px 5px rgba(0,0,0,0.125);">
            <div class="panel-heading">
              <h4>Add Product</h4>
            </div>
            <form class="form-group" style="padding: 3px; margin-left: 15px">
              <div col-md-6 margin-bottom-15>
                <h5>Scan Barcode:</h5><input type="text" placeholder="" class="form-control" style="width: 270px;" name="barcode" id="barcode" autofocus=""> 
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <br>
              <br>
              <input type="hidden" name="inventoryID" id="inventoryID">

              <div col-md-6 margin-bottom-15>
                <input type="text" placeholder="Brand" class="form-control" style="width: 270px;" name="brand" id="brand" required> 
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <div col-md-6 margin-bottom-15>
                <input type="text" placeholder="Generic" class="form-control" style="width: 270px;" name="generic" id="generic" required> 
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <div class="col-md-6 margin-bottom-15">
                </div>
              <div col-md-6 margin-bottom-15>
                <table>
                <tr>
                <td><input type="text" placeholder="Strength" class="form-control" style="width: 120px;" name="strength" id="strength" required></td> 
                <td><input type="text" placeholder="Form" class="form-control" style="width: 150px;" name="form" id="form" required></td>
                </tr>
                </table>
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <div col-md-6 margin-bottom-15>
                <table>
                <tr>
                <td><input type="number" min="0" placeholder="Quantity" class="form-control" style="width: 100px;" name="quantity" id="quantity" required></td> 
                <td><input type="text" placeholder="" class="form-control" style="width: 170px;" name="avail" id="avail" disabled=""></td>
                </tr>
                </table>
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <div col-md-6 margin-bottom-15>
                <input type="number" placeholder="Price" class="form-control" style="width: 270px;" name="price" id="price" required> 
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              <div class="col-md-6 margin-bottom-15">
                </div>   
              <div col-md-6 margin-bottom-15>
                <table>
                <tr>
                <td><input type="hidden" id="action" name="action" value="add">
                <td><input type="hidden" id="billID" name="billID" value="">
                <td><button type="button" class="btn btn-success" name="subs" id="subs">Add to Table</button></td> 
                <td><button type="button" class="btn btn-warning" name="clear" id="clear" onclick="clearr()">Clear</button></td>
                </tr>
                </table>
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>

            </form>
          </div>
        </div> 


            <div class="col-md-8 other">
            <div class="panel" style="padding: 5px; box-shadow: 0 3px 5px rgba(0,0,0,0.125);">
            <div class="panel-heading">
              <h4>Items</h4>
              <div class="pull-right" style="">
                <form method="post" action="search.php">
                <table>
                <tr>
                <td><span class="fname_error error"></span>
            <?php 
               include 'config.php';
                $sql = "SELECT CONCAT(firstname,' ', lastname) as name FROM patients GROUP BY patientID ASC";
                $query =  mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($query);
               if($rows>0)
               {
                 echo '<input type="text" class="form-control" list="datalist5" onchange ="hides()" id="name" name="name" placeholder="Search Patient Name" style="width: 250px;" oninput="cl9()">';
                 echo '<datalist id="datalist5">';
                   while($data = mysqli_fetch_array($query))
                  {
                    echo '<option>'. $data['name'] .'</option>';   
                   }
              echo '</datalist>';
              }
            ?></td>
                
                <td>&nbsp;</td>

                <td><button type="submit" class="btn btn-success" id="search">Search</button></td>
                </tr>
                </table>
              </form> 
              </div>
            </div>

              <div class="col-md-12 margin-bottom-15">
              </div>
        <div id="aab">
        <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">

                  <div class="panel-heading">List of All Prescribed Medicines</div>
                  
                  <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-responsive compact" style="width: 100%;" id="userdata">
                    <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Generic</th>
                        <th>Strength</th>
                        <th>Form</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                    </thead>

                    <tbody>
                       <tr class="aaa">
                    </tr>
                </tbody>    
                </table>  
              </div>  
            </div>
          </div>
        </div>
          </div>
        </div>
            <br>
            <form name="cart" method="post">
            <div class="table-responsive">
            <table name="cart" class="table table-striped table-bordered compact" id="usersdata">
              <thead>
                <tr>
                    <th>Medicine</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Item Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM billings WHERE transactionID = 0 ORDER BY billID desc";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>
                    <input type="hidden" name="barcode" id="barcode" value="<?php echo $data['barcode'];?>">
                <tr  class="user_<?php echo $data['billID']; ?>" name="line_items">
                    <td><input type="text" id="brand" name="brand" value="<?php echo $data['brand'];?>" style="border: none; width:100px;" disabled=""><input type="text" id="generic" name="generic" value="<?php echo $data['generic'];?>" style="border: none; width:100px;" disabled="" ></td>
                    <td><input type="text" id="strength" name="strength" value="<?php echo $data['strength'];?>" style="border: none; width:50px;" disabled="" ><input type="text" id="form" name="form" value="<?php echo $data['form'];?>" style="border: none; width:70px;" disabled="" ></td>
                    <td><input type="number" min="1" id="qty" name="qty" value="<?php echo $data['quantity'];?>" style="border: none; width:40px;"  ></td>
                    <td><input type="text" id="price" name="price" value="<?php echo $data['price'];?>" style="border: none; width: 60px;" disabled=""></td>
                    <td><input type="text" id="item_total" name="item_total" value="<?php echo $data['totalPrice'];?>" style="border: none; width: 70px;" disabled=""></td>

                    <td> <a href="javascript:void(0);" onclick="delete_user('<?php echo $data['billID'];?>','<?php echo $data['inventoryID'];?>','<?php echo $data['quantity'];?>')" title="Delete" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                     <?php
                        }
                    }
                    ?>
               
              </tbody>
            </table>
            </div>
              <div col-md-9 margin-bottom-15>
                <table>
                <tr>
                <td><button type="button" class="btn btn-success" name="Print" id="ddd">Generate Billing</button></td> 
                </tr>
                </table>
                <div class="col-md-6 margin-bottom-15">
                </div>        
              </div>
              </form>
          </div>
              </div> 
            </div>
          </div>

          <div id="pr">
                <img id="bars" style="width: 150px; height: 80px;"/>
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

      <div class="modal fade" id="conModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Please Wait...</h4>
            </div>
            <div class="modal-footer">
              <button id="sass" onclick="timeouts()" class="btn btn-primary">OK</button>
            </div>
          </div>
        </div>
      </div>



        <div id="ticket" style="resize: both;"><center>
            <img src="images/logo3.png" alt="Logo" width="150px" height="60px;">
            <p class="centered">Pharmacy Management System
                <br>City Health Office
                <br>City Government of Panabo</p>
            </center>

            <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM billings WHERE transactionID = (SELECT MAX(transactionID) FROM billings)";
                    
                    $query =  mysqli_query($conn, $sql);
                    $data = mysqli_fetch_array($query);
                    ?>    
                        
                <div class="row" style="margin-left: 2px;">      
                <h9>Receipt ID:<?php echo $data['transactionID'];?></h9>
                
                <br>
                <br>


                <h9>***********************************</h9>
           <table class="table table-condensed">
                <thead>
 
                    
                    <tr>
                        <th class="quantity" style="text-align: left;">Item</th>
                        <th class="price" style="text-align: left;">Qty</th>
                        <th>&nbsp;&nbsp;</th>
                        <th class="price" style="text-align: left;">Price</th>
                        <th>&nbsp;&nbsp;</th>
                        <th class="price" style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>

                  <center>
                  <?php 
                    include 'config.php';


                    $sql = "SELECT brand, generic, strength, form, quantity, price, totalPrice FROM billings WHERE transactionID = '' ORDER BY billID desc";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);


                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>   
                    <tr>
                        <td width="5px;" style="text-align:left; vertical-align: middle;" class="medicine"><?php echo $data['brand'].", ".$data['generic'];?><br><?php echo $data['strength'].", ".$data['form'];?></td>
                        <td style="text-align:center; vertical-align: top;" class="quantity"><?php echo $data['quantity'];?></td>
                        <td>&nbsp;&nbsp;</td>
                        <td style="text-align:center; vertical-align: top;" class="price"><?php echo $data['price'];?></td>
                        <td>&nbsp;&nbsp;</td>
                    <td style="text-align:right; vertical-align: top;" class="price"><?php echo $data['totalPrice'];?></td>
                    </tr>
                   
                    <?php 
                      }  
                    } 
                    ?>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      <?php 
                    include 'config.php';


                    $sql1 = "SELECT SUM(totalPrice) as tot FROM billings WHERE transactionID = '' ORDER BY billID desc";
                    
                    $query1 =  mysqli_query($conn, $sql1);
                    $rows1 = mysqli_num_rows($query1);


                    if($rows1>0)
                    {
                        while($data1 = mysqli_fetch_array($query1))
                        {
                    ?>   
                      <td width="5px;" style="text-align:left; vertical-align: top;"><b>Grand Total: </b></td>
                       <td style="text-align:center; vertical-align: top;">
                      <td>&nbsp;&nbsp;</td>
                       <td style="text-align:center; vertical-align: top;">
                      <td>&nbsp;&nbsp;</td>
                      <td style="text-align:center; vertical-align: top;"><?php echo $data1['tot'];?></td>
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <?php
                  }
                }
                    ?>
                    
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                    <tr>
                    
                </tr>
                </center>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="pull-right">
            <h9>Signature: </h9>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h9>______________________________</h9>
            </div>
            
            <h9>************************************</h9>

            
            <br>
            </div>
            <center>
            <p class="centered">Thanks for your purchase!
                <br>&copy; 2020 PharMaSys&trade;</p>
            </center>
            <iframe name='print_frame' width='0' height='0' frameborder='0'  src='about:blank'></iframe>
        </div>


      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>&copy; 2020 PharMaSys&trade;</p>
          <h10>version 1.0.0</h10>
        </div>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript" src="js/jautocalc.js"></script>

    <script src="js/JsBarcode.all.min.js"></script>
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ['Paracetamol', 'Acetylcysteine', 'Acarbose', 'Aciclovir', 'Alendronate'],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    var pieChartData = [
      {
        value: 300,
        color:"#46BFBD",
        highlight: "#5AD3D1",
        label: "Acarbose"
      },
      {
        value: 50,
        color: "#F7464A",
        highlight: "#FF5A5E",
        label: "Paracetamol"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Acetylcysteine"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Alendronate"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Aciclovir"
      }
      ] // pie chart data

      var radarChartData = {
        labels: ['Paracetamol', 'Acetylcysteine', 'Acarbose', 'Aciclovir', 'Alendronate'],
        datasets: [
        {
          label: "My First dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [65, 59, 90, 55, 40]
        }
        ]
      }; // radar chart

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
      var ctxRadar = document.getElementById("templatemo-radar-chart").getContext("2d");

      window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
      var myRadarChart = new Chart(ctxRadar).Radar(radarChartData, {
          responsive: true
        });
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
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

    $(document).ready( function () {

      function autoCalcSetup() {
                    $('form[name=cart]').jAutoCalc('destroy');
                    $('form[name=cart] tr[name=line_items]').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
                    $('form[name=cart]').jAutoCalc({decimalPlaces: 2});
                }
                autoCalcSetup();


                $('button[name=remove]').click(function(e) {
                    e.preventDefault();

                    var form = $(this).parents('form')
                    $(this).parents('tr').remove();
                    autoCalcSetup();

                });

                $('button[name=add]').click(function(e) {
                    e.preventDefault();

                    var $table = $(this).parents('table');
                    var $top = $table.find('tr[name=line_items]').first();
                    var $new = $top.clone(true);

                    $new.jAutoCalc('destroy');
                    $new.insertBefore($top);
                    $new.find('input[type=text]').val('');
                    autoCalcSetup();

                });

       $.ajax({
      url : "get_med_stock_count.php",
            dataType : "json",
            success: function(response){
              $("#bas").val(response['id']);
            }
    }); 

    $.ajax({
      url : "get_med_dispense_count.php",
            dataType : "json",
            success: function(response){
              $("#bad").val(response['id']);
            }
    });

    $("#barcode").keyup(function(){
        var txt = $(this).val();

        if (txt != '') {
          $.ajax({
            url:"get_patient_billing.php",
            method:"post",
            data:{search:txt},
            dataType:"json",
            success:function(data)
            {
            $('#inventoryID').val(data['inventoryID']);
            $('#barcode').val(data['barcode']);
            $('#brand').val(data['brand']);
            $('#generic').val(data['generic']);
            $('#strength').val(data['strength']);
            $('#form').val(data['form']);
            $('#price').val(data['price']);
            $('#avail').val(data['quantity']+" items available");
            $('#quantity').attr({
              "max" : data['quantity'],
              "placeholder" : ""
            });
            }

          });
        }else{
          window.location.reload();
        }
      });

    });

  $("#subs").click(function(){
    var inventoryID = $('#inventoryID').val();
   var barcode = $('#barcode').val();
    var brand = $('#brand').val();
    var generic = $('#generic').val();
    var strength = $('#strength').val();
    var form = $('#form').val();
    var quantity = $('#quantity').val();
    var price = $('#price').val();
    var html = "";
    var action = $("#action").val();
    var billID = $("#billID").val();
    var valid = true;


if(brand == ""){
        valid = false;
        $(".brand_error").html("* This field is required.");
        $('#generic').val('');
    }else{
        $(".brand_error").html("");    
    }

    if(generic == ""){
        valid = false;
        $(".generic_error").html("* This field is required.");
        $('#generic').val('');
    }else{
        $(".generic_error").html("");    
    }

    
    if(quantity == ""){
        valid = false;
        alert("Please input quantity!");
        $('#quantity').val('');
    }else if(quantity == 0){
         valid = false;
        alert("Don't input 0!");
        $('#quantity').val('');
    }else{
        $(".quantity_error").html("");    
    }
 

    if(form == ""){
        valid = false;
        $(".form_error").html("* This field is required.");
        $('#form').val('');
    }else{
        $(".form_error").html("");    
    }


    if(price == ""){
        valid = false;
        $(".price_error").html("* This field is required.");
        $('#price').val('');
    }else{
        $(".price_error").html("");    
    }

    if(strength == ""){
          valid = false;
          $(".strength_error").html("* This field is required.");
          $('#strength').val('');
      }else{
          $(".strength_error").html("");    
      }

    
if(valid == true){
        var form_data = {
        inventoryID : inventoryID,
        barcode : barcode,
        brand : brand,
        generic : generic,
        strength : strength,
        quantity : quantity, 
        price : price,
        form : form,
        action : action,
        billID : billID
      }; 

       $('#inventoryID').val('');
       $('#brand').val('');
       $('#generic').val('');
       $('#strength').val('');
       $('#form').val('');
       $('#quantity').val('');
       $('#avail').val('');
       $('#price').val('');

       
$.ajax({
            url : "insert_patient_billing.php",
            type : "POST",
            data : form_data,
            dataType : "json",
            success: function(response){
                if(response['valid']==false){
                    alert(response['msg']);
                }else{
                    if(action == 'add'){  
                        html += "<tr class=user_"+response['billID']+" name='line_items'>";
                        html += "<td>"+response['brand']+", "+response['generic']+"</td>";
                        html += "<td>"+response['strength']+"/ "+response['form']+"</td>";
                        html += "<td><input type'text' name='qty' value='"+response['quantity']+"' style='border: none; width: 100px;' disabled='' ></td>";
                        html += "<td><input type'text' name='price' value='"+response['price']+"' style='border: none; width: 100px;' disabled='' ></td>";
                        html += "<td><input type='text' id='item_total' name='item_total' value='"+response['totalPrice']+"' style='border: none; width: 130px;' disabled='' ></td>";
                        html += "<td><a href='javascript:void(0);' onclick='delete_user("+response['billID']+");'><i class='fa fa-trash-o'></i></a></td>";
                        html += "<tr>";
                        $("#usersdata").prepend(html);
                        window.location.reload();
                    }else{
                        window.location.reload();
                    }
                }
            }});
    }else{
        return false;
    }});

    function delete_user(billID, inventoryID, quantity) {
      if (confirm("Are you sure you want to delete?")) {
        var form_data = {
        billID : billID, 
        inventoryID : inventoryID, 
        quantity : quantity 
        };
    
    $.ajax({
        url : "delete_patient_billing.php",
        method : "POST",
        data : form_data,
        success : function(response) {
            $(".user_"+billID).css("background","red");
            $(".user_"+billID).fadeOut(1000);
            window.location.reload();
        }
    });
    }else{

    }
}
    
    function printDiv(){
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("ticket").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }

    function clearr(){
      $('#barcode').val('');
      $('#brand').val('');
      $('#generic').val('');
      $('#strength').val('');
      $('#form').val('');
      $('#volume').val('');
      $('#price').val('');
      $('#avail').val('');
      $('#quantity').val('');
    }

    function hides(){
      document.getElementById("aab").style.display = "none";
      document.getElementById("aab").style.visibility = "hidden";
    }

$("#ddd").click(function(){
  if (confirm("Are you sure you want to continue?")) {
  var transactionID = Date.now();
  printDiv();

    $.ajax({
      url : "insert_patient_name_billing.php",
        method : "POST",
        data : {transID:transactionID},
        dataType : "json",
        success : function(response) {
          if(response['valid']==false){
            alert(response['msg']);
          }else{
            window.location.reload();
          
          }
    }
});
  
}else{
  
}
 
          
});

function timeouts(){
  $("#conModal").modal("hide");
  printDiv();
}

printDiv

  </script>
</body>
</html>