<?php
$page_id = 'late';
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
            <h1><i class="fa fa-clock-o"></i>&nbsp; Late Student</h1>
            </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
        
        <h4>Send Email</h4>
        <div class="col-md-12">
            <div class="row">
          <div class="col-md-12">
            <div class="well bs-component">
              <form class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Name</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="name" type="text" placeholder="Student" autofocus>
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Emails</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="email" type="text" value="<?= $email;?>" placeholder="email" autofocus>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="textArea">Message</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" id="textArea" rows="3" name="message" placeholder="Message goes here ..."></textarea>
                      </div>
                    </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <input class="btn btn-primary" type="submit" value="Submit" name="send">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
            </div>
        </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" id="print_content">
                <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Student Names</th>
                                <th>Book Names</th>
                                <th>Date Borrowed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once "../db_connection.php";
                                $bookmgt = mysql_query("SELECT * FROM book_mgt WHERE status = 'Borrowed'");
                                while($bmgt = mysql_fetch_array($bookmgt)){
                                  $borrowed = strtotime($bmgt['date_borrowed']);
                                  $current  = strtotime(Date("Y-m-d h:i:s"));
                                  $days = ($current - $borrowed) / 86400;
                                  if(round($days) >= 15){
                                    $book = mysql_query("SELECT * FROM books WHERE qr_book = '$bmgt[qr_book]'");
	                            while($getBook = mysql_fetch_array($book)){
	                              $fetch = mysql_query("SELECT * FROM students WHERE qr_student = '$bmgt[qr_student]'");
	                              while($getStudent = mysql_fetch_array($fetch)){
                                      $email = $getStudent["email"];
    	                                echo '<tr>
                            	                <td>'.$bmgt["id"].'</td>
	                                        <td>'.$getStudent["names"].'</td>
	                                        <td>'.$getBook["book_name"].'</td>
	                                        <td>'.$bmgt["date_borrowed"].'</td>
	                                      </tr>';
	                              }
	                            }
                                  }  
                                }
                            ?>
                        </tbody>
                    </table>
                    <form action="#" method="POST">
                      <input type="submit" name="transaction" class="btn btn-primary" value="Download"> 
                      <a class="btn btn-primary" href="javascript:Clickheretoprint()"><span class="menu-icon"><i class="fa fa-fw fa-print"></i></span></a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
        </div>
    <?php include "scripts.php"; ?>
</body>

<?php
if(isset($_POST["send"])){
SendMail::send();
}
?>