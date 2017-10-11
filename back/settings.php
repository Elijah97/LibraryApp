<?php
$page_id = 'settings';
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
        <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" action="" method="POST">
                      <fieldset>
                        <legend>Add user</legend>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="inputEmail">Name</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="inputEmail" type="text" name="names" placeholder="Full Names">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="inputEmail">Username</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="inputEmail" type="text" name="username" placeholder="username (6)" maxlength="6" minlength="4">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="inputEmail">Password</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="inputEmail" type="password" name="password" placeholder="Password">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
            
                <div class="col-lg-6">
                    
                        <legend>All users</legend>
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Names</th>
                      <th>Username</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM users");
                   $rows = mysql_num_rows($fetch);
                   if ($rows == 0) {
                     echo "No Record found";
                   }
                   else {
                     # code...

                while($take = mysql_fetch_array($fetch))
                    {
                    echo '  <tr>
                        <td>'.$take["id"].'</td>
                        <td>'.$take["name"].'</td>
                        <td>'.$take["username"].'</td>
                      </tr>
                      ';
                    }}
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          
                </div>
                </div>
        
      </div>
      </div>
  </body>
</html>


<?php
require_once "../db_connection.php";
if(isset($_POST["submit"])) {
	$names = $_POST["names"];
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
    $joined = date('Y-m-d H:i:s');
	
  $insert = mysql_query("INSERT INTO users(name,username,password,joined,group_id)
	VALUES('$names','$username','$password','$joined','2') ");
	 if ($insert) {
         header("Location:settings.php");
	 	echo "Inserted";
	 }
}

?>