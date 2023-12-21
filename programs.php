<?php
error_reporting(0);
session_start();
if($_SESSION['username']=="" || $_SESSION['username']==null) {
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

          <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>

          <li><a href="patients.php"><i class="fa fa-male"></i>Patients</a></li>

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
              <li><a href="data-visualization.php" style="text-decoration: none; font-size: 12px;">Data Visualizations</a></li>
              <li><a href="#" style="text-decoration: none; font-size: 12px;">Dispense Medicines</a></li>
            </ul>
          </li>
          <li><a href="utility.php"><i class="fa fa-cog"></i>Utility</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.html">Admin Panel</a></li>
            <li><a href="#">File</a></li>
            <li class="active">Programs</li>
          </ol>
          <h1>Programs</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
              <h9>As of Today:</h9>
                <ul class="nav nav-pills">
                  <li class="active"><a href="#">Medicine Dispensed to Program <span class="badge">100</span></a></li>
                </ul>  
                <div class="pull-right">
                <ul class="nav nav-pills">
                  <li class="active"><button class="btn btn-success" onclick="openExcel('mydatatable')"><span class="badge"><i class="fa fa-save"></i></span> Save to Excel </button></li>
                  <li class="active"><button class="btn btn-success" onclick="printDiv('mydatatable')"><span class="badge"><i class="fa fa-print"></i></span> Print Data </button></li>
                </ul>
                </div>         
              </div>
            </div>
          </div>         

          <div class="row margin-bottom-30">
            <div class="col-md-12">
              <table class="table table-striped table-bordered compact" style="width: 100%;" id="usersdata" id="excel">
                    
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Program Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                   
                  <?php 
                    include 'config.php';


                    $sql = "SELECT * FROM programs";

                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    
                   
                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                  ?>
                     
                       <tr class="user_<?php echo $data['ProgramID']; ?>">

                        <td><?php echo $data['ProgramID'];?></td>
                        <td><?php echo $data['Program'];?></td>
                        <td><?php echo $data['Description'];?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="edit_user('<?php echo "a";?>')" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-edit" style="color: #1d6924"></i> Edit</a>
                        </td>
                    </tr>
                    <?php
                    }
                  }
                ?>
                </tbody>
                </table> 
            </div>
           <!--<div class="col-md-6">
              <div class="templatemo-progress">
                <div class="list-group">
                  <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Vision</h4>
                    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel adipiscing quam. Maecenas vehicula rhoncus magna, vitae lacinia sem auctor a. Vestibulum aliquam, nisl nec luctus volutpat, turpis orci posuere arcu, eget consectetur quam nunc ac arcu.</p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Mission</h4>
                    <p class="list-group-item-text">Maecenas in facilisis nisi. Proin gravida nunc vel justo vestibulum, quis adipiscing velit faucibus. Sed a hendrerit orci. Nunc ut bibendum eros, at varius urna. Integer cursus condimentum dui vitae sagittis. Curabitur at vehicula nunc. Praesent at sem non nisl pellentesque placerat.</p>
                  </a>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-success" style="width: 35%">
                    <span class="sr-only">35% Complete (success)</span>
                  </div>
                  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
                    <span class="sr-only">20% Complete (warning)</span>
                  </div>
                  <div class="progress-bar progress-bar-danger" style="width: 10%">
                    <span class="sr-only">10% Complete (danger)</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    <span class="sr-only">45% Complete</span>
                  </div>
                </div>
              </div> 
            </div>-->
          </div>
          

          <!--<div class="templatemo-panels">
            <div class="row">
              <div class="col-md-6 col-sm-6 margin-bottom-30">
                <div class="panel panel-success">
                  <div class="panel-heading">Data Visualization</div>
                  <canvas id="templatemo-line-chart" height="186" width="500"></canvas>
                </div> 
                <span class="btn btn-success"><a href="data-visualization.php">More Charts</a></span>
              </div>   
              <div class="col-md-6 col-sm-6 margin-bottom-30">
                <div class="panel panel-primary">
                  <div class="panel-heading">Nearly Expired Medicines</div>
                  <div class="panel-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>John</td>
                          <td>Smith</td>
                          <td>@js</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Bill</td>
                          <td>Jones</td>
                          <td>@bj</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Marry</td>
                          <td>James</td>
                          <td>@mj</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <span class="btn btn-primary"><a href="tables.html">See Tables</a></span>
              </div>       
            </div>

            
            <div class="row">
              <div class="col-md-6 col-sm-6">
                
                <ul class="nav nav-tabs" role="tablist" id="templatemo-tabs">
                  <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
                  <li><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
                  <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
                  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="home">
                    <ul class="list-group">
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Suspendisse dapibus sodales</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Proin mattis ex vitae</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Aenean euismod dui vel</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Vivamus dictum posuere odio</li>
                      <li class="list-group-item"><input type="checkbox" name="" value=""> Morbi convallis sed nisi suscipit</li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="profile">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <span class="badge">33</span>
                        Vivamus dictum posuere odio
                      </li>
                      <li class="list-group-item">
                        <span class="badge">9</span>
                        Dapibus ac facilisis in
                      </li>
                      <li class="list-group-item">
                        <span class="badge">0</span>
                        Morbi convallis sed nisi suscipit
                      </li>
                      <li class="list-group-item">
                        <span class="badge">14</span>
                        Cras justo odio
                      </li>
                      <li class="list-group-item">
                        <span class="badge">2</span>
                        Vestibulum at eros
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="messages">
                    <div class="list-group">
                      <a href="#" class="list-group-item active">
                        Morbi convallis sed nisi suscipit
                      </a>
                      <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                      <a href="#" class="list-group-item">Morbi leo risus</a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                      <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="settings">
                    <div class="list-group">
                      <a href="#" class="list-group-item disabled">
                        Vivamus dictum posuere odio
                      </a>
                      <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                      <a href="#" class="list-group-item">Vestibulum at eros</a>
                      <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                      <a href="#" class="list-group-item">Morbi leo risus</a>
                    </div>
                  </div>
                </div> 
              </div> 
              <div class="col-md-6 col-sm-6">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          Accordion Item 1
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          Accordion Item 2
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          Accordion Item 3
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <button type="button" id="loading-example-btn" data-loading-text="Loading..." class="btn btn-primary">
                          Click here
                        </button> to load.
                      </div>
                    </div>
                  </div>
                </div>
              </div>          
            </div> 
          </div>-->    
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
              <a href="sign-in.php" class="btn btn-primary">Yes</a>
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



  <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="margin-left: 450px;">
      <div class="modal-content"  style="width: 600px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

    <h3 style="text-align: center; font-size: 16px;">Patient History</h3>
          
        <div class="modal-body" style="width: 500px;">
            <table class="table table-striped" id="usersdata">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Consultation Results</th>
                  <th>Medicine Purchased</th>
                </tr>
              </thead>

              <tbody>
                <?php
                 include 'config.php';
                  $lname = $_POST['Lastname'];
                  $fname = $_POST['Firstname'];
                    $sql = "SELECT * FROM patients WHERE Lastname = '$lname' AND Firstname = '$fname' ORDER BY date_date";
                    $query = mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);

                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                ?>
                <tr>
                  <td><?php echo $data['date_date'];?></td>
                  <td><?php echo $data['consult_result'];?></td>
                  <td><?php echo $data['med_purchased'];?></td>
                </tr>
                <?php
                        }
                    } 

                ?>
              </tbody>
            </table>     
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>


<div id ="printableTable">
                  <center><p style="text-align: right;"><script> document.write(new Date().toLocaleDateString()); </script></p>
                          <h1>City Health Office</h1>
                          <h3>Panabo City</h3><br>
                          <h2>List of Programs</h2>
                <table style="border: 1px solid; border-collapse: collapse; text-align: center; width: 90%;" id="mydatatable">
                   <thead> </thead>
                   <tbody>
                    <tr>
                        <strong><th style="border: 1px solid; border-collapse: collapse; height: 40px; text-align: center;">ID</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Program Name</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Description</th>
                    </tr>
                  <?php  
                    include 'config.php';

                    $sql = "SELECT * FROM programs";
                    
                    $query =  mysqli_query($conn, $sql);
                    $rows = mysqli_num_rows($query);
                    
                    if($rows>0)
                    {
                        while($data = mysqli_fetch_array($query))
                        {
                    ?>

 
                       <tr class="user_<?php echo $data['ProgramID']; ?>">
                        <td style="border: 1px solid; border-collapse: collapse;"><?php echo $data['ProgramID']; ?></td>   
                        <td style="border: 1px solid; border-collapse: collapse;"><?php echo $data['Program']; ?></td>
                        <td style="border: 1px solid; border-collapse: collapse;"><?php echo $data['Description']; ?></td>
                                             
                    </tr>
                     <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                  </center>

                <iframe name="print_frame" width="0" height="0" frameborder="0"  src="about:blank"></iframe>
              </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(220,220,220,0.2)",
        strokeColor : "rgba(220,220,220,1)",
        pointColor : "rgba(220,220,220,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    var pieChartData = [
      {
        value: 300,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
      },
      {
        value: 50,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
      },
      {
        value: 100,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
      }
      ] // pie chart data

      var radarChartData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [
        {
          label: "My First dataset",
          fillColor: "rgba(220,220,220,0.2)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 90, 81, 56, 55, 40]
        },
        {
          label: "My Second dataset",
          fillColor: "rgba(151,187,205,0.2)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(151,187,205,1)",
          data: [28, 48, 40, 19, 96, 27, 100]
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
      var name = "Sir Dawal";

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
    $('#usersdata').DataTable();
    } );

    function printDiv(){
    window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }

    function openExcel(tableID, filename = ''){
    var downloadlink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    filename = filename?filename+'.xls':'excel_data.xls';
    downloadlink = document.createElement("a");
    document.body.appendChild(downloadlink);

     if (navigator.msSaveOrOpenBlob) {
      var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
    }else{
      downloadlink.href = 'data:' + dataType + ', ' + tableHTML;
      downloadlink.download = filename;
      downloadlink.click();
    }
    }

  </script>
</body>
</html>