<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">

</head>
	<body >
		<div class="container  div1">
			<div class="row">
				<!-- <div class="col-12 col-md-6"> -->
				<div class="pull-left">
						<a href="index.php"><img src="images/logo.png" alt=""></a>
				</div>
				<h3 class="text-center">Login </h3><br><br>
					<form action="" method="POST">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Username</label>
					    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Password</label>
					    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					  </div>
						<div class="row">
							<div class="checkbox pull-left">
						    <label>
						      <input type="checkbox"> Remember
						    </label>
						  </div>
							<div class="pull-right">
								New user? <a href="register.php"> Register</a>
							</div>
						</div><br>
					  <input type="submit" name="login" class="btn btn-default" value="Submit">
					</form>
				<!-- </di v> -->
			</div>
		</div>
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
