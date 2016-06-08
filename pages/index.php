<?php




//Add your mysql username, passwork and database below
$mysqli = new mysqli("localhost", "CHANGE!", "CHANGE!", "CHANGE");
$closed = $mysqli->query("SELECT COUNT(`status_id`) AS number FROM ost_ticket")->fetch_object()->number;
$user = $mysqli->query("SELECT COUNT(`id`) AS number FROM ost_user_account")->Fetch_object()->number;
$open = $mysqli ->query("SELECT COUNT(`status_id`) AS number FROM ost_ticket WHERE `status_id` = 1")->fetch_object()->number;
$user1="User One";




$mysqli->close();
$late = 6;
$total = 180;
$percent = 100;

$date = strtotime("June 8, 2016 12:00 PM");
$remaining = $date - time();
$days_remaining = floor($remaining / 86400);
$hours_remaining = floor(($remaining % 86400) / 3600);



?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="sbrennan">
    <meta http-equiv="refresh" content="60" />
    <!-- This will refresh page in every 60 seconds, change content= x to refresh page after x seconds -->


    <title>Public Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/superstyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div id="logo"><img src="dist/images/mgsdlogo.png" align="middle";>       </div>
	<div id="container">
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-check-square fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo $closed + 1806;?></div>

                              <div>Completed Work Orders</div>
                          </div>
                      </div>
                  </div>
                  <a href="https://techhelp.mgsd.k12.nc.us/scp">
                      <div class="panel-footer">
                         <span id="panelfootertext" class="pull-left">1806 from old WO system</span>
                          <span class="pull-right"><i class="fa fa-check-square"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-green">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-list fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo $open;?></div>
                              <div>Open Work Orders</div>
                          </div>
                      </div>
                  </div>
                  <a href="https://techhelp.mgsd.k12.nc.us/scp">
                      <div class="panel-footer">
                         <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-list"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
         </div>
         <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-arrow-down fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo $total;?></div>
                              <div>Days Down!</div>
                          </div>
                      </div>
                  </div>
                  <a href="https://techhelp.mgsd.k12.nc.us/scp">
                      <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                          <span class="pull-right"><i class="fa fa-arrow-down"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-users fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo $user;?></div>
                              <div>User Accounts</div>
                          </div>
                      </div>
                  </div>
                  <a href="https://techhelp.mgsd.k12.nc.us/scp">
                      <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                     	  <span class="pull-right"><i class="fa fa-users"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
            </div>
        </div>
	</div>
                <div  id="progress" class="progress">

                  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent?>%">
                    <span><p><?php echo $percent?>% of the school year complete!</p></span>
                  </div>
                </div>

<div id="panel">
<div class="panel panel-primary panel-responsive">
  <!-- Default panel contents -->
  <div class="panel-heading">Current Open Work Orders</div>

  <!-- Table -->
  <div class="table-responsive">
            <table class="table table-striped">
                 <tr>
                   <th>Ticket Number</th>
                   <th>Tech Assigned</th>
                   <th>Location</th>
                   <th>User</th>
                   <th>Status</th>
                  </tr>
                    <tr>
                   <td><?php echo $ticket;?></td>
                   <td><?php echo $user1;?></td>
                   <td>Rocky River</td>
                   <td>Jenna Cook</td>
                   <td>Open</td>
                </tr>

                <tr>
                   <td>T-002</td>
                   <td>astarnes</td>
                   <td>South Elementary</td>
                   <td>Laurnen Pollock</td>
                   <td>Open</td>
                </tr>
            </table>
  			</div>
		</div>
  </div>
















  <!--container end-->
</div>
</body>

