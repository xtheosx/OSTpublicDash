<?php

/*********************************************************************
    OST_public_dashboard.php

    Displays a block of the last X number of open tickets.
    Displays a block shwing total number of closed tickets.
    Displays a block of total user accounts created.
    ****A progress bar you have to manally set and update (Fixed in the future)\
	+ some other details
    this is still a work in progress
    Neil Tozier <tmib@tmib.net>, Shaun Brennn <shaunbrennan2016@gmail.com>
    Copyright (c)  2010-2015
    For use with osTicket version 1.9.x and 1.10 (http://www.osticket.com)

	This release was tested with both 1.9.12 and 1.10rc2.

    Released under the GNU General Public License WITHOUT ANY WARRANTY.
    See osTickets's LICENSE.TXT for details.
**********************************************************************/

// needed for 1.8+ for now until we tie this back into the built in DB query
$username="USER";
$password="PASSWORD";
$database="DATABASE";


//change USER / PW/ DB here and in php below in lines 226,227,228
$mysqli = new mysqli("localhost", $username, $password, $database);
$totalcomplete = $mysqli->query("SELECT COUNT(`status_id`) AS number FROM `ost_ticket` WHERE `status_id` = 2 or 3")->fetch_object()->number;
$usernumber = $mysqli->query("SELECT COUNT(`id`) AS number FROM ost_user_account")->Fetch_object()->number;
$opencount = $mysqli ->query("SELECT COUNT(`status_id`) AS number FROM ost_ticket WHERE `status_id` = 1")->fetch_object()->number;



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
    <meta name="author" content="">
    <meta http-equiv="refresh" content="60" />
    <!-- This will refresh page in every 60 seconds, change content= x to refresh page after x seconds -->

//change title of page for example myOSTicet Dashboard
    <title>CHANGE YOUR TITLE HERE</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!--<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

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

  <div id="logo"><img src="../../../ext_images/mgsdlogo.png" align="middle";>       </div>
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
                              <div class="huge"><?php echo $totalcomplete;?></div>

                              <div>Completed Work Orders</div>
                          </div>
                      </div>
                  </div>
                  <a href="#">//change to url of your choice
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
                              <div class="huge"><?php echo $opencount;?></div>
                              <div>Open Work Orders</div>
                          </div>
                      </div>
                  </div>
                  <a href="#">//change to url of your choice
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
                  <a href="#">//change to url of your choice
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
                              <div class="huge"><?php echo $usernumber;?></div>
                              <div>User Accounts</div>
                          </div>
                      </div>
                  </div>
                  <a href="#">//change to url of your choice
                      <div class="panel-footer">
                          <span class="pull-left">View Details</span>
                     	  <span class="pull-right"><i class="fa fa-users"></i></span>
                          <div class="clearfix"></div>
                      </div>
                  </a>
            </div>
        </div>
	</div>
                <!--Progress bar settings, see bootstrap -->
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
                   <th>Name</th>
                   <th>Issue</th>
                   <th>Assigned Tech</th>
                  </tr>
                  <?php
                   // EDIT THIS!  The maximum amount of open tickets that you want to display.
                  $limit ='10';

                  // OPTIONAL: if you know the id for Open in your database put it here.  If you do not you can look
                  // it up in DBPREFIX_ticktet_status, or this script will look it up for you.  This is 1 in all my installations.
                  // changing this to a number will save you a SQL query. If you are running 1.8 or prior change this to "open".
                  // NOTE: Backwards compatibility has not been tested.
                  $openid = '1';

                  // OPTIONAL: if you use multiple 'open' statuses and would like them ALL to be displayed set this to 1.  Example:
                  // We use a Pending status which is a type of open.  Setting this to 1 displays Open and Pending.
                  $multiple = '1';

                  // If you are running 1.8 or prior change this to "status".  If you are running 1.9 or 1.10 change this to "status_id"
                  // NOTE: Backwards compatibility has not been tested.
                  $status = 'status_id';

                  // OPTIONAL:
                  if (null !== TABLE_PREFIX) {
                   define('TABLE_PREFIX','ost_');
                  }

                  mysql_connect('localhost',$username,$password) or die(mysql_error());
                  @mysql_select_db($database) or die( "Unable to select database");
                  // end 1.8+ fix for now

                  if($multiple) {

                   // The columns that you want to collect data for from the db
                   // Please note that due to db structure changes in 1.8.x you can only include columns from the ost_ticket table
                   // and this script does not handle custom fields at this time.
                   $columns = "ost_ticket.number, ost_ticket.ticket_id, ost_ticket.status_id, ost_ticket.user_id, ost_ticket.topic_id, ost_ticket.staff_id";

                   $query = "SELECT ".$columns." FROM ".TABLE_PREFIX."ticket
                       INNER JOIN ".TABLE_PREFIX."ticket_status ON ".TABLE_PREFIX."ticket.status_id = ".TABLE_PREFIX."ticket_status.id
                       WHERE ".TABLE_PREFIX."ticket_status.state = 'open'
                       ORDER BY ".TABLE_PREFIX."ticket.created DESC
                       LIMIT 0,$limit";

                  }
                  else {
                   if(empty($openid)) {
                     // get Open id (which is usually 1)
                     $opensql = "SELECT id FROM ".TABLE_PREFIX."ticket_status WHERE name='Open'";
                     $openresult = mysql_query($opensql);
                     $openid = mysql_result($openresult,0,"id");
                   }

                   // The columns that you want to collect data for from the db
                   // Please note that due to db structure changes in 1.8.x you can only include columns from the ost_ticket table
                   // and this script does not handle custom fields at this time.
                   $columns = "ticket_id, user_id, staff_id";

                   // mysql query.  The columns tha
                   $query = "SELECT $columns
                        FROM ".TABLE_PREFIX."ticket
                        WHERE $status = $openid
                        ORDER BY created DESC
                        LIMIT $limit";
                  }

                  if($result=mysql_query($query)) {
                   $num = mysql_numrows($result);
                  }
                  //echo "query: ".$query."<br>";  // uncomment to debug
                  //echo "num: ".$num."<br>";  // uncomment to debug

                  if ($num >> 0) {

                  // table headers, if you add or remove columns edit this
                  //echo "<table border-color=#BFBFBF border=0 cell-spacing=2><tr style='background-color: #BFBFBF;'>";
                  //echo "<td id='openticks-a' style='min-width:75px;'><b>Ticket Number</b></td><td id='openticks-a' style='min-width:150px;'><b>Name</b></td><td id='openticks-a' style='min-width:250px;'><b>Issue</b></td><td id='openticks-a' style='min-width:150px;'><b>Assigned Staff</b></td></tr>";

                  $i=0;
                  while ($i < $num) {

                  // You will need one line below for each column name that you collect and want to display.
                  // If you are unfamiliar with php its  essentially $uniqueVariable = mysql junk ( columnName );
                  // Just copy one of the lines below and change the $uniqueVariable and columnName
                  $user_id = mysql_result($result,$i,"user_id");
                  $ticket_id = mysql_result($result,$i,"ticket_id");
                  //$created = date_format(date_create(mysql_result($result,$i,"created")),myGetDateTimeFormat());
                  $staff_id = mysql_result($result,$i,"staff_id");
                  $number  = mysql_result($result,$i,"number");
                  $topic  = mysql_result($result,$i,"topic_id");
                  $name = mysql_result($result,$i,"name");
                  $assignee = mysql_result($result,$i,"assignee");
                  // additional variables you might want
                  //$agency = mysql_result($result,$i,"agency");


                  // if no update say so
                  //if ($updated == '0000-00-00 00:00:00') {
                  // $updated = 'not updated yet';
                  // }

                   // look up internal form id
                   $entryIdsql = "SELECT id,form_id FROM ".TABLE_PREFIX."form_entry WHERE object_id=$ticket_id LIMIT 1";
                   $entryIdresult = mysql_query($entryIdsql);
                   $entry_id = mysql_result($entryIdresult,0,"id");
                   $form_id = mysql_result($entryIdresult,0,"form_id");

                     //get assignee name
                   $techsql = "SELECT username FROM ".TABLE_PREFIX."staff WHERE staff_id=$staff_id";
                   $techresult = mysql_query($techsql);
                   $assignee = mysql_result($techresult,0,"username");

                   //get topic by query
                   $topicsql = "SELECT topic FROM ".TABLE_PREFIX."help_topic WHERE topic_id =$topic";
                   $topicresult = mysql_query($topicsql);
                   $topic = mysql_result($topicresult,0,"topic");

                   //get ticket openers name
                   $namesql = "SELECT name FROM ".TABLE_PREFIX."user WHERE id=$user_id";
                   $nameresult = mysql_query($namesql);
                   $name = mysql_result($nameresult,0,"name");



                   echo "<tr><td> &nbsp; $number &nbsp; </td>"
                           ."<td> &nbsp; $name &nbsp; </td>"
                           ."<td> &nbsp; $topic &nbsp; </td>"
                           ."<td> $assignee </td></tr>";

                  ++$i;

                  }
                  //echo "</table>";
                  }
                    mysql_close();
                  ?>

            </table>
  			</div>
		</div>
  </div>


  <!--container end-->
</div>
</body>
