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
      <li class="<?php echo ($page_id == "report" ? "active" : "");?>"><a href="report.php"><i class="fa fa-edit"></i><span>Report</span></a></li>
      <li class="<?php echo ($page_id == "late" ? "active" : "");?>"><a href="late.php"><i class="fa fa-clock-o"></i><span>Late Student</span></a></li>
      <?php if($status == 1) { ?>
      <li class="<?php echo ($page_id == "settings" ? "active" : "");?>"><a href="settings.php"><i class="fa fa-gear"></i><span>Settings</span></a></li>
      <?php } ?>
    </ul>
  </section>
</aside>
