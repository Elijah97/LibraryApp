
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
                    <label class="col-lg-4 control-label" for="select">Select Location</label>
                    <div class="col-lg-8">
                      <select class="form-control" name="location" id="select">
                        <?php
                        require_once "../db_connection.php";
                           $fetch = mysql_query("SELECT * FROM location");
                        while($take = mysql_fetch_array($fetch))
                            {

                          echo '  <option value='.$take["name"].'>'.$take["name"].'</option>';

                            }
                              ?>
                        </select><br>
                    </div></div>
                    <div class="form-group">
                      <label class="col-lg-4  control-label" for="select">Select Car</label>
                      <div class="col-lg-8">
                        <select class="form-control" name="plaque" id="select">
                          <?php
                          require_once "../db_connection.php";
                             $fetch = mysql_query("SELECT * FROM truck");
                          while($take = mysql_fetch_array($fetch))
                              {

                            echo '  <option value='.$take["plaque"].'>'.$take["plaque"]." ".$take["driver_name"].'</option>';

                              }
                                ?>
                        </select><br>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="date" class="col-lg-4 control-label">Date</label>
                      <div class="col-lg-8">
                        <input type="datetime-local" name="date" class="form-control">
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
              <h3 class="card-title">Location Table</h3>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Location</th>
                    <th>Plaque</th>
                    <th>Date</th>

                  </tr>
                </thead>
                <tbody>
                <?php
                require_once "../db_connection.php";
                   $fetch = mysql_query("SELECT * FROM transaction");
                while($take = mysql_fetch_array($fetch))
                    {
                    echo '  <tr>
                        <td>'.$take["id"].'</td>
                        <td>'.$take["location"].'</td>
                        <td>'.$take["plaque"].'</td>
                        <td>'.$take["date1"].'</td>

                      </tr>
                      ';
                    }
                      ?>
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
	$location = $_POST["location"];
	$plaque = $_POST["plaque"];
  $date = $_POST["date"];;

  $insert = mysql_query("INSERT INTO transaction(location,plaque,date1)
	VALUES('$location','$plaque','$date') ");
	 if ($insert) {
	 	header("Location:trans.php");
	 }
   else {
     echo "not inserted";
   }
}

?>
