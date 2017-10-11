<!DOCTYPE html>
<html>
  <head>
    
    <?php include "scripts.php"; ?>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo"> 
        <img src="images/Logoog.png" style="width:300px;width:300px">
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="username" placeholder="Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="login"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>


<?php

session_start(); // Starting Session
include("db_connection.php");
$error=''; // Variable To Store Error Message
if (isset($_POST['login'])) {

// Define $username and $password
$username=$_POST['username'];
$password= md5($_POST['password']);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database

// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from users where password='$password' AND username='$username' ", $connection);
$rows = mysql_num_rows($query);
if ($rows!=0) {
$_SESSION['login_user']=$username; // Initializing Session
$_SESSION['login_level']=$rows['level']; // Initializing Session
header("Location: back/index.php"); // Redirecting To Other Page
} else {
// header("Location: error.html");
echo "Incorrect password";
}
mysql_close($connection); // Closing Connection
}

?>