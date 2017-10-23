<?php
$page_id = 'student';
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
            <h1><i class="fa fa-user"></i>&nbsp; Student</h1>
            </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
            <?php if($status == 1) {?>
          <div class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Student Name</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="name" type="text" placeholder="Student name">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputEmail">Student Email</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="email" type="text" placeholder="Student email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Qr Student</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="qr" type="text" placeholder="Md5 code">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <input class="btn btn-primary" type="submit" value="Submit" name="sendsheet">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="well bs-component">
              <form enctype="multipart/form-data" class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Upload Excel Sheet</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="file" type="file" placeholder="">
                        <p class="help-block">Only Excel/CSV File Import.</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <input class="btn btn-primary" type="submit" value="Submit" name="Import">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
            <?php }?>
        </div>
        </div>
            
        <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Student Names</th>
                      <th>Student Email</th>
                      <th>Hashed Code</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM students");
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
                        <td>'.$take["names"].'</td>
                        <td>'.$take["email"].'</td>
                        <td>'.$take["qr_student"].'</td>
                      </tr>
                      ';
                    }}
                      ?>
                  </tbody>
                </table>
                  <form action="download.php" method="POST">
                   <input type="submit" name="student" class="btn btn-primary" value="Download"> 
                </form>
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
	$email = $_POST["email"];
	$qr = $_POST["qr"];

  $insert = mysql_query("INSERT INTO students(names,email,qr_student)
	VALUES('$name','$enail',$qr') ");
	 if ($insert) {
	 	header("Location:student.php");
	 }
   else {
     echo "not inserted";
   }
}
elseif(isset($_POST["Import"]))
{
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            //print_r($emapData);
            //exit();
            $sql = "INSERT into students(names,email,qr_student) values ('$emapData[0]','$emapData[1]','$emapData[2]')";
            mysql_query($sql);
        }
        fclose($file);
        echo 'CSV File has been successfully Imported';
        header('Location: students.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}

?>
