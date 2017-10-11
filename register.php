<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">

</head>
	<body >
		<div class="container div1">
			<div class="row ">
				<a href="index.php">	 <img src="images/logo.png" class="pull-left" alt=""></a>
				<h3 class="text-center">Register</h3>
			</div>
			<div class="row ">
				<!-- <div class="col-12 col-md-6"> -->

					<form action="" method="POST">
						<div class="col-md-8">
							<div class="form-group">
								<label for="exampleInputEmail1">Full Names</label>
								<input type="text" class="form-control" name="names" id="exampleInputEmail1" placeholder="Full Names" >
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Username</label>
								<input type="text" class="form-control" name="username" id="exampleInputPassword1" placeholder="username (6)" maxlength="6" minlength="4" >
							</div>
							<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" >
								</div>
                            <div class="pull-right">
								Have an account? <a href="login.php"> Login</a>
							</div>
						</div><br>
						</div>
						<input type="submit" class="btn btn-default" value="Submit" name="submit">
					</form>
				<!-- </di v> -->
			</div>

</body>
</html>


<?php
require_once "db_connection.php";
if(isset($_POST["submit"])) {
	$names = $_POST["names"];
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
    $joined = date('Y-m-d H:i:s');
	
  $insert = mysql_query("INSERT INTO users(name,username,password,joined,group_id)
	VALUES('$names','$username','$password','$joined','2') ");
	 if ($insert) {
         header("Location:login.php");
	 	echo "Inserted";
	 }
}

?>
