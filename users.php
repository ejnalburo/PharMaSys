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
              <i class="fa fa-file-text "></i> Reports <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#" style="text-decoration: none; font-size: 12px;">Stock Medicines</a></li>
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
            <li><a href="#">Manage Users</a></li>
            <li class="active">User's Tables</li>
          </ol>
          <h1>Manage Users</h1>

          <div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li class="active"><a href="#">Pending Users <span class="badge">42</span></a></li>
                <li><a href="#">Active Users <span class="badge">1</span></a></li>
              </ul>          
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="btn-group pull-right" id="templatemo_sort_btn">
                <button type="button" class="btn btn-default">Sort by</button>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">First Name</a></li>
                  <li><a href="#">Last Name</a></li>
                  <li><a href="#">Username</a></li>
                </ul>
              </div>
              <div class="table-responsive">
                <h4 class="margin-bottom-15">Pending Users</h4>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>John</td>
                      <td>Smith</td>
                      <td>@js</td>
                      <td>a@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>                    
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr class="success">
                      <td>2</td>
                      <td>Bill</td>
                      <td>Digital</td>
                      <td>@bd</td>
                      <td>bd@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Marry</td>
                      <td>James</td>
                      <td>@mj</td>
                      <td>mj@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Carry</td>
                      <td>Land</td>
                      <td>@cl</td>
                      <td>cl@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr class="success">
                      <td>5</td>
                      <td>New</td>
                      <td>Caroline</td>
                      <td>@nc</td>
                      <td>nc@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr class="danger">
                      <td>6</td>
                      <td>Martin</td>
                      <td>East</td>
                      <td>@me</td>
                      <td>me@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>                    
                  </tbody>
                </table>
              </div>
              <div class="table-responsive">
                <h4 class="margin-bottom-15">All Users</h4>
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Action</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>John</td>
                      <td>Henry</td>
                      <td>@jh</td>
                      <td>a@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>                    
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Bill</td>
                      <td>Goods</td>
                      <td>@bg</td>
                      <td>bg@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Authen</td>
                      <td>Jobs</td>
                      <td>@aj</td>
                      <td>aj@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Jesica</td>
                      <td>High</td>
                      <td>@jh</td>
                      <td>jh@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Tom</td>
                      <td>Grace</td>
                      <td>@tg</td>
                      <td>tg@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Book</td>
                      <td>Rocker</td>
                      <td>@br</td>
                      <td>br@company.com</td>
                      <td><a href="#" class="btn btn-default">Edit</a></td>
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Bootstrap</a></li>
                            <li><a href="#">Font Awesome</a></li>
                            <li><a href="#">jQuery</a></li>
                          </ul>
                        </div>
                      </td>
                      <td><a href="#" class="btn btn-link">Delete</a></td>
                    </tr>                    
                  </tbody>
                </table>
              </div>
              <!-- <ul class="pagination pull-right">
                <li class="disabled"><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>   -->
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
              <a href="sign-in.html" class="btn btn-primary">Yes</a>
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
</script>
  </body>
</html>