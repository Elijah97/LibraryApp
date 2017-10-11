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
          <div class="col-md-3">
              <a href="student.php"> 
                <div class="widget-small primary"><i class="icon fa fa-graduation-cap fa-3x"></i>
                  <div class="info">
                    <h4>Students</h4>
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
                    <div class="widget-small warning"><i class="icon fa fa-sign-out fa-3x"></i>
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
                    <div class="widget-small primary"><i class="icon fa fa-sign-in  fa-3x"></i>
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
        <br>
          <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Traffic of books borrowed</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="books"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Traffic of students who borrow</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="students"></canvas>
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
                  $pdata = [];
                  $pdata1 = [];
                  $colors = ['#F7464A','#46BFBD','#FDB45C','#FEB21C','#EFB45C'];
                  $highlight = ['#FF5A5E','#5AD3D1','#FFC870','#FFC870','#FFC870'];
                  $a = 0;
//=================================================================================================                  
                  $fetch = mysql_query("SELECT * FROM `books` ORDER BY traffic DESC LIMIT 5"); 
                  while($get = mysql_fetch_array($fetch)){    
                    $pdata[] = [ 
                      'value' => $get['traffic'],
                      'color' => $colors[$a],
                      'highlight' => $highlight[$a],
                      'label' => $get['book_name']
                    ];
                    $a++;
                  }
                  $pdata = json_encode($pdata);
//=================================================================================================
                  $fetch1 = mysql_query("SELECT * FROM `students` ORDER BY traffic DESC LIMIT 5"); 
                  while($get1 = mysql_fetch_array($fetch1)){    
                    $pdata1[] = [ 
                      'value' => $get1['traffic'],
                      'color' => $colors[$a],
                      'highlight' => $highlight[$a],
                      'label' => $get1['names']
                    ];
                    $a++;
                  }
                  $pdata1 = json_encode($pdata1); 	
?>

  var pdata = <?php echo $pdata; ?>;
  var ctxp = $("#books").get(0).getContext("2d");
  new Chart(ctxp).Pie(pdata);
 
  var pdata1 = <?php echo $pdata1; ?>;
  var ctxp1 = $("#students").get(0).getContext("2d");
  new Chart(ctxp1).Pie(pdata1);
</script>
</body>
</html>
