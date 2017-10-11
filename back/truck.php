
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
            <h1><i class="fa fa-home"></i> Add Location</h1>
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
                    <label class="col-lg-2 control-label" for="inputEmail">Driver Name</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="driver" type="text" placeholder="Driver">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Plaque</label>
                    <div class="col-lg-10">
                      <input class="form-control" id=" " name="plaque" type="text" placeholder="Plaque">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                    <div class="col-lg-10">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox">Checkbox
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="textArea">Textarea</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" id="textArea" rows="3"></textarea><span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Radios</label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input id="optionsRadios1" type="radio" name="optionsRadios" value="option1" checked="">Option one is this
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input id="optionsRadios2" type="radio" name="optionsRadios" value="option2">Option two can be something else
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label" for="select">Selects</label>
                    <div class="col-lg-10">
                      <select class="form-control" id="select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select><br>
                      <select class="form-control" multiple="">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div> -->
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
              <h3 class="card-title">Truck Table</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Driver Name</th>
                    <th>Plaque</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM truck");
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
                        <td>'.$take["driver_name"].'</td>
                        <td>'.$take["plaque"].'</td>
                      </tr>
                      ';
                    }}
                      ?>
                  <!-- <tr>
                    <td><?php $take["id"] ?></td>
                    <td><?php $take['name'] ?></td>
                    <td><?php $take['description'] ?></td>
                  </tr>
                 -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->

  </body>
</html>

<?php
require_once "../db_connection.php";
if(isset($_POST["send"])) {
	$plaque = $_POST["plaque"];
	$driver = $_POST["driver"];

  $insert = mysql_query("INSERT INTO truck(plaque,driver_name)
	VALUES('$plaque','$driver') ");
	 if ($insert) {
	 	header("Location:truck.php");
	 }
   else {
     echo "not inserted";
   }
}

?>
