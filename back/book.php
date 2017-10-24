<?php
$page_id = 'book';
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
            <?php if($status == 1) {?>
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
          <div class="col-lg-6">
            <?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
    
//    echo "<h1>PHP QR Code</h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 6;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
//        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
echo '
<div id="print_content" style="padding-top:3%;padding-bottom:3%;">
<a class="btn btn-primary" href="javascript:Clickheretoprint()"><span class="menu-icon"><i class="fa fa-fw fa-print"></i></span> </a><br><br>';
    echo '
              <img src="'.$PNG_WEB_DIR.basename($filename).'" />
            </div>';        
            
    //display generated file
//    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
    //config form
    require_once "../db_connection.php";
   $fetch = mysql_query("SELECT * FROM books ORDER BY ID DESC LIMIT 1");
   $rows = mysql_num_rows($fetch);
   while($take = mysql_fetch_array($fetch))
                    {         
   
//$name = "Elie";
    echo '<form action="book.php" method="post">
        Data:&nbsp;<input name="data" style ="width:300px" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):$take["qr_book"]).'" /><br><br>
        ECC:&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - smallest</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';
        }
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
        
    echo '</select>&nbsp;
        <input type="submit" class="btn btn-primary" value="GENERATE"></form><hr/>';
        
    // benchmark
//    QRtools::timeBenchmark();    
?>
          </div>
       <?php }?>
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
            //print_r($emapData);
            //exit();
            $sql = "INSERT into books(book_name,ISBN,qr_book) values ('$emapData[0]','$emapData[1]','$emapData[2]')";
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
