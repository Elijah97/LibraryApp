<?php
$page_id = 'report';
//require_once('aside.php');
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <?php include "header.php"; ?>
      <!-- Side-Nav-->
      <?php include 'aside.php'; ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>&nbsp; Report</h1>
            </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" id="print_content">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student Names</th>
                      <th>Book</th>
                      <th>Date Borrowed</th>
                      <th>Date Returned</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      require_once "../db_connection.php";
                      $bookmgt = mysql_query("SELECT * FROM book_mgt");
                      while($bmgt = mysql_fetch_array($bookmgt)){
                        $qr_b = $bmgt["qr_book"];
                        $qr_s = $bmgt["qr_student"];
                        $book = mysql_query("SELECT * FROM books WHERE qr_book = '$qr_b'");
                        while($getBook = mysql_fetch_array($book)){
                          $fetch = mysql_query("SELECT * FROM students WHERE qr_student = '$qr_s'");
                          while($getStudent = mysql_fetch_array($fetch)){
                            echo '<tr>
                            	    <td>'.$bmgt["id"].'</td>
                                    <td>'.$getStudent["names"].'</td>
                                    <td>'.$getBook["book_name"].'</td>
                                    <td>'.$bmgt["date_borrowed"].'</td>
                                    <td>';
                                    if(strtotime($bmgt["date_returned"]) == -62169984000){
                                    	echo "Not Yet Returned";
                                    } else {
                                    	echo $bmgt["date_returned"];
                                    }
                                    echo '</td>
                                    <td>'.$bmgt["status"].'</td>
                                  </tr>';
                          }
                        }
                      }
                    ?>
                  </tbody>
                </table>
                  <form action="download.php" method="POST">
                   <input type="submit" name="transaction" class="btn btn-primary" value="Download">
                   <a class="btn btn-primary" href="javascript:Clickheretoprint()"><span class="menu-icon"><i class="fa fa-fw fa-print"></i></span></a> 
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
      </div>
    <?php include "scripts.php"; ?>
  </body>
</html>

<?php
require_once "../db_connection.php";
if(isset($_POST["send"])) {
	$name = $_POST["name"];
	$qr = $_POST["qr"];

  $insert = mysql_query("INSERT INTO students(names,qr_student)
	VALUES('$name','$qr') ");
	 if ($insert) {
	 	header("Location:student.php");
	 }
   else {
     echo "not inserted";
   }
}

?>
