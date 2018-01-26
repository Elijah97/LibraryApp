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
        </div>
        </div>
            
        <div class="content-wrapper" style="margin-top:-50px;">
        <div class="row">
          <div class="col-md-12">
            <div id="print_content" style="padding-top:3%;padding-bottom:3%;">
            <a class="btn btn-primary" href="javascript:Clickheretoprint()">
                <span class="menu-icon"><i class="fa fa-fw fa-print"></i></span> 
                </a><br><br>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student Names</th>
                      <th>Student Email</th>
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
                      while($bmgt = mysql_fetch_array($bookmgt))
                    {
                    $qr_b = $bmgt["qr_book"];
                    $qr_s = $bmgt["qr_student"];
                   
                   $book = mysql_query("SELECT * FROM books WHERE qr_book = '$qr_b'");
                        while($b = mysql_fetch_array($book)){
                            $qr_book = $bmgt["qr_book"];
                            $book = $b["book_name"];
                        
                   $fetch = mysql_query("SELECT * FROM students WHERE qr_student = '$qr_s'");
                   $rows = mysql_num_rows($fetch);
                   if ($rows == 0) {
                     echo "No Record found";
                   }
                   else {
                     # code...

                while($take = mysql_fetch_array($fetch))
                    {
                    echo '  <tr>
                        <td>'.$bmgt["id"].'</td>
                        <td>'.$take["names"].'</td>
                        <td>'.$take["email"].'</td>
                        <td>'.$book.'</td>
                        <td>'.$bmgt["date_borrowed"].'</td>
                        <td>'.$bmgt["date_returned"].'</td>
                        <td>'.$bmgt["status"].'</td>
                      </tr>
                      ';
                    }} }}
                      ?>
                  </tbody>
                </table>
                  <form action="download.php" method="POST">
                   <input type="submit" name="transaction" class="btn btn-primary" value="Download"> 
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
