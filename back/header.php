<?php
session_start();

include('../session.php');
$var=$_SESSION['login_user'];
if(!$var)
  header("location:../login.php");

?>
<!-- Navbar-->
<header class="main-header hidden-print"><a class="logo" href="index.php"> <img src="../images/Logoog.png" style="margin-top:-50px;width:25 0px;height:150px"></a>
   
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <!-- Navbar Right Menu-->
    <div class="navbar-custom-menu">
      <ul class="top-nav">
        <!--Notification Menu-->
        

        <!-- User Menu-->
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user fa-lg"></i> 
            <b class="text-uppercase text-center"><?= $login_session;?></b>&nbsp; 
            <i class="fa fa-caret-down fa-lg"></i>
          </a>
          <ul class="dropdown-menu settings-menu">
            <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
