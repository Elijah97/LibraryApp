<aside class="main-sidebar hidden-print">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image"><img class="img-circle" src="images/user.png" alt="User Image"></div>
      <div class="pull-left info">
        <p> <?php echo $login_session; ?></p>
        <p class="designation">@<?php echo $user; ?></p>
      </div>
    </div>
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="<?php echo ($page_id == "index" ? "active" : "");?>"><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
      <li class="<?php echo ($page_id == "student" ? "active" : "");?>"><a href="student.php"><i class="fa fa-user"></i><span>Student</span></a></li>
        <li class="<?php echo ($page_id == "book" ? "active" : "");?>"><a href="book.php"><i class="fa fa-book"></i><span>Book</span></a></li>
<!--      <li class=" "><a href="bookmgt.php"><i class="fa fa-recycle"></i><span>Book Management</span></a></li>-->
      <li class="<?php echo ($page_id == "report" ? "active" : "");?>"><a href="report.php"><i class="fa fa-edit"></i><span>Report</span></a></li>
<!--
    <li class="treeview"><a href="#"><i class="fa fa-envelope"></i><span>Messaging</span><i class="fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="message.php"><i class="fa fa-circle-o"></i> EMail</a></li>
        <li><a href="simplem.php"><i class="fa fa-circle-o"></i> Simple Messagin</a></li>
      </ul>
    </li>
-->

      <?php if($status == 1) {
        ?>
    <li class="<?php echo ($page_id == "late" ? "active" : "");?>"><a href="late.php"><i class="fa fa-graduation-cap"></i><span>Late Student</span></a></li>
    <li class="<?php echo ($page_id == "settings" ? "active" : "");?>"><a href="settings.php"><i class="fa fa-gear"></i><span>Settings</span></a></li>

<!--
<li class=" "><a href="client.php"><i class="fa fa-users"></i><span>Clients</span></a></li>
<li class=" "><a href="loc.php"><i class="fa fa-map-marker"></i></i><span>Location</span></a></li>
<li class=" "><a href="truck.php"><i class="fa fa-envelope"></i></i><span>Truck</span></a></li>
<li class=" "><a href="trans.php"><i class="fa fa-map-marker"></i></i><span>Transaction</span></a></li>
-->
    <?php } ?>

    </ul>
  </section>
</aside>
