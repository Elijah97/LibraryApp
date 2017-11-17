<?php
$page_id = 'index';
//require_once('aside.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "scripts.php"; ?>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <?php include "header.php"; ?>
      <!-- Side-Nav-->
      <?php include 'aside.php'; ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
              <p>Welcome to ALU Library Dashboard <b><?= $login_session?></b></p>
          </div>
        </div>
        <div class="row">
        <?php if($status == 1){ ?>
<!--
          <div class="col-md-3">
            <a href="settings.php">  
                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Users</h4>
                    <p><b>
                      <?php
                        require_once "../db_connection.php";
                        $mysql = mysql_query("SELECT count(*) as total FROM users");
                        $data = mysql_fetch_assoc($mysql);
                        echo $data['total'];
                       ?>
                    </b></p>
                  </div>
                </div>
            </a>
          </div>
-->

          <div class="col-md-3">
              <a href="student.php"> 
                <div class="widget-small warning"><i class="icon fa fa-graduation-cap fa-3x"></i>
                  <div class="info">
                    <h4>Students | Staff</h4>
                    <p><b>
                      <?php
                      require_once "../db_connection.php";
                      $mysql = mysql_query("SELECT count(*) as total FROM students");
                      $data = mysql_fetch_assoc($mysql);
                      echo $data['total'];
                     ?></b></p>
                  </div>
                </div>
              </a>
          </div>
            <?php }?>
          <div class="col-md-3">
              <a href="book.php"> 
                <div class="widget-small danger"><i class="icon fa fa-book fa-3x"></i>
                  <div class="info">
                    <h4>Books</h4>
                    <p><b>
                      <?php
                      require_once "../db_connection.php";
                      $mysql = mysql_query("SELECT count(*) as total FROM books");
                      $data = mysql_fetch_assoc($mysql);
                      echo $data['total'];
                     ?></b></p>
                  </div>
                </div>
              </a>
          </div>
              <div class="col-md-3">
                  <a href="report.php"> 
                    <div class="widget-small primary"><i class="icon fa fa-sign-out fa-3x"></i>
                      <div class="info">
                        <h4>Borrowed</h4>
                        <p><b>
                          <?php
                          require_once "../db_connection.php";
                          $mysql = mysql_query("SELECT count(*) as total FROM book_mgt WHERE status = 'Borrowed' ");
                          $data = mysql_fetch_assoc($mysql);
                          echo $data['total'];
                         ?></b></p>
                      </div>
                    </div>
                  </a>
              </div>
              <div class="col-md-3">
                  <a href="report.php"> 
                    <div class="widget-small warning"><i class="icon fa fa-sign-in  fa-3x"></i>
                      <div class="info">
                        <h4>Returned</h4>
                        <p><b>
                          <?php
                          require_once "../db_connection.php";
                          $mysql = mysql_query("SELECT count(*) as total FROM book_mgt WHERE status = 'Returned' ");
                          $data = mysql_fetch_assoc($mysql);
                          echo $data['total'];
                         ?></b></p>
                      </div>
                    </div>
                  </a>
              </div>
        </div>
          <div class="row">
              
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Statistics</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>
          </div>
          </div>
      </div>
    </div>
    <!-- Javascripts-->

<script type="text/javascript">
    <?php
    require_once "../db_connection.php";
     $fetch = mysql_query("SELECT * FROM books");
        while($traf = mysql_fetch_array($fetch))
                    {
            $track[0]= $traf["traffic"];
    ?>
  var data = {
    labels: ["January", "February", "March", "April", "May"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56]
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86]
        }
    ]
  };
  var pdata = [
    {
        value: 180,
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
        value: 10,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    },
    {
        value: 60,
        color: "#FEB21C",
        highlight: "#FFC870",
        label: "Yellow"
    },
    {
        value: 60,
        color: "#EFB45C",
        highlight: "#FFC870",
        label: "Yellow"
    },
  ]
 <?php }?>
  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var barChart = new Chart(ctxp).Pie(pdata);
</script>
  </body>
</html>
