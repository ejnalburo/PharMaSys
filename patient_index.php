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
  <link rel="stylesheet" href="css/templatemo_main.css?ts=<?=time()?>">
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

          <li class="active"><a href="patient_index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>

          <li><a href="add_patients.php"><i class="fa fa-wheelchair"></i>Patients</a></li>

          <li><a href="consult_prescription.php"><i class="fa fa-file-text"></i>Consultation and Prescription</a></li>

          <li><a href="patient_utility.php"><i class="fa fa-cog"></i>Account Settings</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="patient_index.php">Prescription Panel</a></li>
            <li><a href="patient_index.php">Dashboard</a></li>
            <li class="active">Overview</li>
          </ol>
          <h1>Dashboard</h1>
          <p></p>

          <div class="margin-bottom-30">
            <div class="row">
              <div class="col-md-12">
                <h9>As of Today:</h9>
                <ul class="nav nav-pills">
                  <li class="active"><a href="#">Patients Consulted<span class="badge"><input type="text" name="" id="bad" disabled="" style="outline: none; border: none; width: 40px; text-align: center;"></span></a></li>
                </ul>          
              </div>
            </div>
          </div>         

          <div class="row">
            <div class="col-md-12">
              <div class="templatemo-alerts">
                <div class="row">
                  <div class="col-md-4 col-sm-6 margin-bottom-30">
                    <div class="panel panel-success">
                      <div class="panel-heading">Nearly Out of Stocks</div>
                        <canvas id="templatemo-pie-chart" height="400" width="520"></canvas>
                    </div> 
                  </div>  

                  <div class="col-md-4 col-sm-6 margin-bottom-30">
                    <div class="panel panel-success">
                      <div class="panel-heading">Top Grossing Medicines</div>
                        <canvas id="templatemo-radar-chart" height="400" width="520"></canvas>
                    </div> 
                  </div> 
                  <div class="col-md-4 col-sm-6 margin-bottom-30">
                <div class="panel panel-success">
                  <?php
                    include 'config.php';


                  ?>
                  <div class="panel-heading">Monthly Sales</div>
                  <canvas id="templatemo-line-chart" height="400" width="520"></canvas>
                </div>     
                </div>  

              </div>              
            </div>

            </div>
            <!--
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
            </div> -->
            <div class="col-md-12 margin-bottom-30">
                <div class="panel panel-primary">
                  <div class="panel-heading">Nearly Expired Medicines</div>
                  <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-responsive compact"  style="height: 80px; overflow-y: scroll;" >
                      <thead>
                        <tr>
                          <th style="font-size: 12px;">Brand</th>
                          <th style="font-size: 12px;">Generic</th>
                          <th style="font-size: 12px;">Description</th>
                          <th style="font-size: 12px;">Lot no.</th>
                          <th style="font-size: 12px;">Batch no.</th>
                          <th style="font-size: 12px;">Expiry Date</th>
                          <th style="font-size: 12px;">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="font-size: 10px;">No brand</td>
                          <td style="font-size: 10px;">Acetylcysteine</td>
                          <td style="font-size: 10px;">20%/Capsule/50mg</td>
                          <td style="font-size: 10px;">19348</td>
                          <td style="font-size: 10px;">213454</td>
                          <td style="font-size: 10px;">20-10-20</td>
                          <td style="font-size: 10px;">20</td>
                        </tr>
                        <tr>
                          <td style="font-size: 10px;">Calpol</td>
                          <td style="font-size: 10px;">Paracetamol</td>
                          <td style="font-size: 10px;">10%/Syrup/50ml</td>
                          <td style="font-size: 10px;">19348</td>
                          <td style="font-size: 10px;">213454</td>
                          <td style="font-size: 10px;">20-10-20</td>
                          <td style="font-size: 10px;">10</td>
                        </tr>
                        <tr>
                          <td style="font-size: 10px;">No brand</td>
                          <td style="font-size: 10px;">Aciclovir</td>
                          <td style="font-size: 10px;">100%/Capsule/500mg</td>
                          <td style="font-size: 10px;">19348</td>
                          <td style="font-size: 10px;">213454</td>
                          <td style="font-size: 10px;">20-10-20</td>
                          <td style="font-size: 10px;">2</td>
                        </tr>
                      </tbody>
                    </table>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
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


    asb();

    });

    function asb(){
      $.ajax({
      url : "get_consulted_count.php",
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
  </script>
</body>
</html>