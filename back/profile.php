<!DOCTYPE html>
<html>
  <head>
    <?php  include'scripts.php'; ?>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->

        <?php include 'header.php'; ?>

      <!-- Side-Nav-->
      <?php include 'aside.php'; ?>
      <div class="content-wrapper">
        <div class="row user">
          <div class="col-md-12">
            <div class="profile">
              <div class="info"><img class="user-img" src="images/user.png">
                <h4> <?php echo $login_session; ?></h4>
                <p> <?php echo $email; ?></p>
              </div>
              <div class="cover-image"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card p-0">
              <ul class="nav nav-tabs nav-stacked user-tabs">
                <li class="active"><a href="#user-timeline" data-toggle="tab">Profile</a></li>
                <li><a href="#user-settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div>
          </div>

          <?php
          require_once "../db_connection.php";
             $fetch = mysql_query("SELECT * FROM users  WHERE  username = '$user' ");

                {?>
          <div class="col-md-9">
            <div class="tab-content">
              <div class="tab-pane active" id="user-timeline">
                <div class="timeline">
                  <div class="post">
                    <h4 class="line-head">Profile</h4>
                    <?php }
                    while($take = mysql_fetch_array($fetch))
                        {
                        echo '
                          <label for="name">Names</label>  : '.$take["names"].'<br><br>
                          <label for="name">Phone </label>  : '.$take["p_tel"].'<br><br>
                          <label for="name">Email</label>  : '.$take["email"].'<br><br>
                          <label for="name">Username</label>  : '.$take["username"].'<br><br>
                          <label for="name">Address</label>  : '.$take["address"].'<br><br>
                          <label for="name">District</label>  : '.$take["district"].'
                            ';
                          }
                      ?>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="user-settings">
                <div class="card user-settings">
                  <h4 class="line-head">Settings</h4>
                  <form action="" method="POST">
                    <?php
                    require_once "../db_connection.php";
                       $fetch = mysql_query("SELECT * FROM users  WHERE  username = '$user' ");
                       while($take = mysql_fetch_array($fetch))
                        {

                      echo '
                    <div class="row mb-20">
                      <div class="col-md-4">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="name" value="'.$take["names"].'">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 mb-20">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="'.$take["email"].'">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4 mb-20">
                        <label>Mobile No</label>
                        <input class="form-control" type="tel" name="p_tel" value="'.$take["p_tel"].'">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4 mb-20">
                        <label> Payment Phone</label>
                        <input class="form-control" type="tel" name="pay_tel" value="'.$take["pay_tel"].'">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4 mb-20">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" value="'.$take["username"].'">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4 mb-20">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" value="'.$take["address"].'">
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-4 mb-20">
                        <label>Address</label>
                        <select class="form-control" name="district" value="'.$take["district"].'">
                          <option value="'.$take["district"].'">'.$take["district"].'</option>
                        </select>
                      </div>
                    </div>
                     ';}?>
                    <div class="row mb-10">
                      <div class="col-md-12">
                        <button class="btn btn-primary" type="submit" name="update"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

<?php
require_once "../db_connection.php";
if (isset($_POST["update"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $p_tel = $_POST["p_tel"];
  $pay_tel = $_POST["pay_tel"];
  $username = $_POST["username"];
  $address = $_POST["address"];
  $district = $_POST["district"];

  $update= mysql_query("UPDATE users SET names ='$name', p_tel = '$p_tel', email='$email', username = '$username',
    pay_tel='$pay_tel', district='$district', address='$address' WHERE email='$email'");
    if ($update) {
      echo "Success";
      header("Location:profile.php");
    }else {
      echo "Fail";
    }
}
 ?>
