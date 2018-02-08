<?php
    header('Access-Control-Allow-Origin: *');
    // Define database connection parameters
    include("db_connection.php");

    if($_REQUEST['key'] == 'borrow'){
        // Sanitise URL supplied values
        $book       = filter_var($_REQUEST['book'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $student    = filter_var($_REQUEST['student'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $dateB      = date('Y-m-d h:i:sa');
        $dateR      = ' ';
        $status     = "Borrowed";
        $checkBook = mysql_query("SELECT * FROM books WHERE qr_book = '$book'") or die(mysql_error());
        if(mysql_num_rows($checkBook) != 0){
       	    $checkStudent = mysql_query("SELECT * FROM students WHERE qr_student = '$student'") or die(mysql_error());
            if(mysql_num_rows($checkStudent) != 0){
                $checkBorrowed = mysql_query("SELECT * FROM book_mgt WHERE qr_book = '$book' AND status = 'Borrowed'") or die(mysql_error());
                if(mysql_num_rows($checkBorrowed) == 0){
                       $sql  = mysql_query("INSERT INTO book_mgt(qr_book, qr_student, date_borrowed,date_returned, status) VALUES('$book', '$student', '$dateB','$dateR', '$status')") or die(mysql_error());
                       $reset  = mysql_query("UPDATE books SET status = '$status' WHERE qr_book = '$book'") or die(mysql_error());
                    echo json_encode(array('message' => '<b>Success,</b><br/><br/> Book borrowing successfully recorded'));
                } else {
                    echo json_encode(array('message' => '<b>Error,</b><br/><br/> Book already recorded as borrowed!'));
                }
            } else {
                echo json_encode(array('message' => '<b>Error,</b><br/><br/> Student not found in database!'));
            }
        } else {
            echo json_encode(array('message' => '<b>Error,</b><br/><br/> Book not found in database!'));
        }

    } elseif($_REQUEST['key'] == 'return') {
        // Sanitise URL supplied values
        $book = filter_var($_REQUEST['book'], FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_LOW);
        $sql  = "SELECT * FROM book_mgt WHERE qr_book = '$book' AND status ='Borrowed'";;
        $fetch  = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($fetch) != 0){
            $status = "Returned";
            $dateR = date('Y-m-d h:i:sa');
            while($row = mysql_fetch_array($fetch)){
	            $id = $row['id'];
                $update  = mysql_query("UPDATE book_mgt SET status = '$status', date_returned = '$dateR' WHERE id = '$id'") or die(mysql_error());
                $reset  = mysql_query("UPDATE books SET status = '$status' WHERE qr_book = '$book'") or die(mysql_error());
                echo json_encode(array('message' => '<b>Success,</b><br/><br/> Book return successfully recorded!'));
            }
        } else {
            echo json_encode(array('message' => '<b>Error,</b><br/><br/> Record not found in database!'));
        }
    }
?>
