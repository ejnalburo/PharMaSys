
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>PharMaSys</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/CHO.ico">
  <link rel="shortcut icon" type="image/x-icon" href="images/CHO.ico">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css?ts=<?=time()?>">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <input type="hidden" name="fnamee" id="fnamee" value="<?php session_start(); echo $_SESSION['fname'];?>">
<style>
  #printableTable {
    display: none;
    visibility: hidden;
  }

  #usersdata th, tbody{
    border-collapse: collapse;
    border: 1px solid;
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

           <li class="sub open" style="background-color: rgb(191, 232, 167);">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i> Reports <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="medicine_inventory.php" style="text-decoration: none; font-size: 12px;">Medicine Inventory Status</a></li>
              <li><a href="medicine_expiration.php" style="text-decoration: none; font-size: 12px;">Medicine Expiration Status</a></li>
              <li style="background-color: rgb(191, 232, 167);"><a href="sales_report.php" style="text-decoration: none; font-size: 12px;">Sales Report</a></li>
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
            <li><a href="sales_report.php">Sales Report</a></li>
            <li class="active">Charts & Tables</li>
          </ol>
          <h1>Sales Report</h1>    
          <div class="templatemo-charts">

            <div class="row">
              <div class="col-md-6">
                <div class="panel panel-success">
                  <div class="panel-heading">Monthly Sales Chart</div>
                  <canvas id="templatemo-line-chart"></canvas>
                </div> 
                </div>
                <div class="col-md-6">
                <div class="panel panel-success">
                  <div class="panel-heading">Monthly Consumers Chart</div>
                  <canvas id="templatemo-bar-chart"></canvas>
                </div> 
                </div>
            </div>
            <br>
            <br>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-primary">
                <div class="btn-group pull-right" id="templatemo_sort_btn" style="margin-top: 3px; margin-right: 3px;">
                <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="printDiv()"><i class="fa fa-print"></i>&nbsp;Print</button>
                <form method="POST" action="" class="pull-right">
                  <table>
                    <tr><td>
                      <select class="form-control" name="category">
                      <option value=""></option>
                      <option value="day">This Day</option>
                      <option value="week">This Week</option>
                      <option value="month">This Month</option>
                      <option value="year">This Year</option>
                      </select></td>
                      <td><button class="btn btn-success" name="filter" class="pull-right"><i class="fa fa-filter"></i>&nbsp;Filter</button></td>
                
                    </tr>                
                  </table>
                </form>
              </div>
              <div class="panel-heading">Sales Table</div>
                  <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-bordered table-responsive compact" style="border: 1px solid; border-collapse: collapse; width: 100%;" id="usersdata">
                    <thead>
                    <tr>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">ID</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center; max-width: 150px;">Date</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Item</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Description</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Quantity</th>
                        <th style="border: 1px solid; border-collapse: collapse; text-align: center;">Price</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Total Sales</th>
                    </tr>
                    </thead>

                    <tbody style="border: 1px solid; border-collapse: collapse;">
                      <?php include 'filter_sales.php'?>
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
    </div>

</div>

<div id ="printableTable">
  <center><p style="text-align: right;"><script> document.write(new Date().toLocaleDateString()); </script></p>
    <h3><strong>City Health Office</strong></h3>
    <br>
    <h9><strong>List of Sales</strong></h9>
    
    <table id="TableA" style="border: 1px solid; border-collapse: collapse; text-align: center; width: 90%;">
      
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


  });
  

    function printDiv(){
      window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
      window.frames["print_frame"].window.focus();
      window.frames["print_frame"].window.print();
    }

      // Line chart
      var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
      var lineChartData = {

        labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
        datasets : [
        {
          label: "My First dataset",
          
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        },
        {
          label: "My Second dataset",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
        }
        ]

      } // lineChartData

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

      // radar chart
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

      // polar area chart
      var polarAreaChartData = [
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
      },
      {
        value: 40,
        color: "#949FB1",
        highlight: "#A8B3C5",
        label: "Grey"
      },
      {
        value: 120,
        color: "#4D5360",
        highlight: "#616774",
        label: "Dark Grey"
      }

      ];

      window.onload = function(){

  var source = document.getElementById('usersdata');
  var destination = document.getElementById('TableA');
  var copy = source.cloneNode(true);
  copy.setAttribute('id', 'usersdata');
  destination.parentNode.replaceChild(copy, destination);

        var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
        var ctx_bar = document.getElementById("templatemo-bar-chart").getContext("2d");
        /*var ctx_pie = document.getElementById("templatemo-pie-chart").getContext("2d");
        var ctx_doughnut = document.getElementById("templatemo-doughnut-chart").getContext("2d");
        var ctxRadar = document.getElementById("templatemo-radar-chart").getContext("2d");
        var ctxPolar = document.getElementById("templatemo-polar-chart").getContext("2d");*/

        window.myLine = new Chart(ctx_line).Line(lineChartData, {
          responsive: true
        });
        window.myBar = new Chart(ctx_bar).Bar(lineChartData, {
          responsive: true
        });
        window.myPieChart = new Chart(ctx_pie).Pie(pieChartData,{
          responsive: true
        });
        window.myDoughnutChart = new Chart(ctx_doughnut).Doughnut(pieChartData,{
          responsive: true
        });
        var myRadarChart = new Chart(ctxRadar).Radar(radarChartData, {
          responsive: true
        });
        var myPolarAreaChart = new Chart(ctxPolar).PolarArea(polarAreaChartData, {
          responsive: true
        });
      }

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