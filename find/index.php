<?php $page_id = 'report'; require_once"../db_connection.php"; ?>
<!DOCTYPE html>
<html>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="pull-left col-md-12">
            <center>
            <div class="logo"> 
	      <img src="../images/Logoog.png" style="width:300px;height:200px;">
	    </div>
	    </center>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Book Name</th>
                      <th>Book Author</th>
                      <th>ISBN</th>
                      <th>Shelf</th>
                      <th>Availability</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $query = mysql_query("SELECT * FROM books") or die(mysql_error());
                      while($get = mysql_fetch_array($query)){
                    ?>
                    <tr>
                      <td><?php echo $get['book_name']; ?></td>
                      <td><?php echo $get['author']; ?></td>
                      <td><?php echo $get['ISBN']; ?></td>
                      <td><?php echo $get['shelf']; ?></td>
                      <td>
                      <?php
                        echo ($get['status'] == 'Returned' ? 'Available' : 'Not Available');
                      ?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <a href="/" class="btn btn-primary">
                  <i class="fa fa-arrow-left fa-lg fa-fw"></i>
                  Go Back Home
                </a>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>    
    <?php include "scripts.php"; ?>
  </body>
</html>