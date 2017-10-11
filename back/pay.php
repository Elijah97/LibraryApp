
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
            <h1><i class="fa fa-money"></i> Payement Section</h1>
            </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <?php if ($status == 1) {
          ?>

          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-4 control-label" for="select">Select Location</label>
                    <div class="col-lg-8">
                      <select class="form-control" name="names" id="select">
                        <?php
                        require_once "../db_connection.php";
                           $fetch = mysql_query("SELECT * FROM users WHERE status= 2 ");
                        while($take = mysql_fetch_array($fetch))
                            {

                          echo '  <option value='.$take["id"].'>'.$take["names"].'</option>';
                            }
                              ?>
                        </select><br>
                    </div></div>
                    <div class="form-group">
                      <label class="col-lg-4  control-label" for="select">Select Car</label>
                      <div class="col-lg-8">
                        <select class="form-control" name="pay" id="select">
                          <option value="No">No</option>
                          <option value="Yes">Yes</option>
                        </select><br>
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
          <div class="col-lg-6">
            <div class="card">
              <h3 class="card-title">Payment Table</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Names</th>
                    <th>Payment Phone</th>
                    <th>District</th>
                    <th>Address</th>
                    <th>Paid</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM users  WHERE status = 2");
                while($take = mysql_fetch_array($fetch))
                    {
                    echo '  <tr>
                        <td>'.$take["id"].'</td>
                        <td>'.$take["names"].'</td>
                        <td>'.$take["pay_tel"].'</td>
                        <td>'.$take["district"].'</td>
                        <td>'.$take["address"].'</td>
                        <td>'.$take["pay"].'</td>
                        </tr>
                      ';
                    }
                      ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php } else {
          ?>
          <div class="col-lg-6">
            Send 3250 RFW every Month for payment. <br>
            Use your name as a comment or reason, then we will confirm your Payment.<br>
            Send Money to this Number : 0789792416 / Merveille
          </div>
          <div class="col-lg-6">
          <?php  require_once "../db_connection.php";
               $fetch = mysql_query("SELECT * FROM users  WHERE username = '$user'");
            while($take = mysql_fetch_array($fetch))
                {
          echo 'Payment : '.$take["pay"];
          }
            ?>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <!-- Javascripts-->

  </body>
</html>

<?php
require_once "../db_connection.php";
if(isset($_POST["send"])) {
	$names = $_POST["names"];
	$pay = $_POST["pay"];

  $update= mysql_query("UPDATE users SET pay='$pay' WHERE id='$names'");
    if ($update) {
      // echo "Success";
      header("Location:pay.php");
    }else {
      echo "Fail";
}}

?>
