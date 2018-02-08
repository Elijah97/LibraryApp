<?php
$page_id = 'book';
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'styles.php'; ?>
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <?php include "header.php"; ?>
      <!-- Side-Nav-->
      <?php include 'aside.php'; ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-home"></i> Add Book</h1>
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
                    <label class="col-lg-2 control-label" for="inputEmail">Book Name</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="name" type="text" placeholder="Book name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">ISBN</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="book" type="text" placeholder="ISBN">
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
	<?php include "qrgen.php"; ?>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="well bs-component">
              <form  enctype="multipart/form-data"  class="form-horizontal" action="" method="POST">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Upload Excel Sheet</label>
                    <div class="col-lg-10">
                      <input type="file" name="file"  class="form-control" id=" " placeholder="">
                        <p class="help-block">Only Excel/CSV File Import.</p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default" type="reset">Cancel</button>
                      <input class="btn btn-primary" type="submit" value="Upload" name="Import">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
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
                      <th>Book Name</th>
                      <th>ISBN</th>
                      <th>Author</th>
                      <th>Shelf</th>
                      <th>QR Code</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM books");
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
                        <td>'.$take["book_name"].'</td>
                        <td>'.$take["ISBN"].'</td>
                        <td>'.$take["author"].'</td>
                        <td>'.$take["shelf"].'</td>
                        <td>'.$take["qr_book"].'</td>
                      </tr>
                      ';
                    }}
                      ?>
                  </tbody>
                </table>
                  <form action="download.php" method="POST">
                   <input type="submit" name="book" class="btn btn-primary" value="Download">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Javascripts-->

  </body>
  <?php include "scripts.php"; ?>
</html>

<?php
require_once "../db_connection.php";
if(isset($_POST["send"])) {
	$qr = md5($_POST["book"],FALSE);
	$name = $_POST["name"];

  $insert = mysql_query("INSERT INTO books(book_name,qr_book)
	VALUES('$name','$qr') ");
	 if ($insert) {
	 	header("Location:book.php");
	 }
   else {
     echo "not inserted";
   }
}
if(isset($_POST["Import"]))
{
    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $qrbook= md5($emapData[0].$emapData[1]);
            $sql = "INSERT into books(book_name,ISBN,qr_book,author,shelf,status) values ('$emapData[0]','$emapData[1]','$qrbook','$emapData[2]','$emapData[3]','Returned')";
            mysql_query($sql);
        }
        fclose($file);
        echo 'CSV File has been successfully Imported';
        header('Location: book.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}

?>
