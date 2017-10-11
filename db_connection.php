<?php
ob_start();
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'ihewarwa_library');
define('DB_PASSWORD', '123login');
define('DB_DATABASE', 'ihewarwa_library');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>
