
<?php
//$arr = array("A","E","I","O","U");
//
//$str = implode(",",$arr);
//echo $str;
?>

<?php
                require_once "../db_connection.php";
    $query = mysql_query("SELECT email FROM students");
        while($row = mysql_fetch_array($query)) {
            $e[] = $row["email"];
        }
            $emails = implode(", ",$e); 
            echo $emails."<br>";
//            foreach($e as $r) {
//                echo $r.'<br>';
//            }
//$array = array("A","E","I","O","U");
//
//$string = implode(",",$array);
//echo $string;
?>