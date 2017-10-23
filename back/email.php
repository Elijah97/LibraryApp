
<?php
require 'classes/SendMail.php';
require_once "../db_connection.php";
    $query = mysql_query("SELECT emails FROM emails");
        while($row = mysql_fetch_array($query)) {
            $e[] = $row["emails"];
        }
            $emails = implode(", ",$e); 
//            echo $emails."<br>";
?>
<html>
    <body>
        <form action="" method="post">
            <input type="text" name="name"><br><br>
            <input type="text" name="email" value="<?= $emails?>" style="width:1000px"><br><br>
            <textarea name="message" rows="e"></textarea><br><br>
            <input type="submit" name="send" value="Send">
            
        </form>
    </body>
</html>

<?php
if(isset($_POST["send"])){
    SendMail::send();
}
?>