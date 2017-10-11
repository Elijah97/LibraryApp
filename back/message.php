
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
            <h1><i class="fa fa-home"></i> Email</h1>
            </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="email" type="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Message</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" id="" name="message" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <input class="btn btn-primary" type="submit" value="Submit" name="sendmail">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->

  </body>
</html>

<?php
// require_once "../db_connection.php";
require_once "classes/SendMail.php";

// if(isset($_POST["send"])) {
// 	$name = $_POST["location"];
// 	$desc = $_POST["description"];
//
//   $insert = mysql_query("INSERT INTO location(name,description)
// 	VALUES('$name','$desc') ");
// 	 if ($insert) {
// 	 	header("Location:loc.php");
// 	 }
//    else {
//      echo "not inserted";
//    }
// }

 if(isset($_POST["sendmail"])) {
  SendMail::send();
}
?>
