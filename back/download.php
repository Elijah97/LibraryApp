<?php
require_once "../db_connection.php";
if(isset($_POST["student"])){
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=student.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Names', 'Email', 'QR Students'));  
      $query = "SELECT * from students";  
      $result = mysql_query($query);  
      while($row = mysql_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
        exit();
}
elseif(isset($_POST["book"])){
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=book.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Book Name', 'QR Book'));  
      $query = "SELECT * from books";  
      $result = mysql_query($query);  
      while($row = mysql_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
        exit();
}
elseif(isset($_POST["transaction"])){
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=transaction.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Qr Book', 'Qr Student','Date','Status'));  
      $query = "SELECT * from book_mgt";  
      $result = mysql_query($query);  
      while($row = mysql_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
        exit();
}
?>
