<html>
<head>
<title>Sending email using PHP</title>
</head>
<body>
<?php
   $to = "ekagabo17@soon.alustudent.com";
   $subject = "This is subject";
   $message = "This is simple text message.";
   $header = "From:elie.gash42@gmail.com \r\n";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true ) 
   {
      echo "Message sent successfully…";
   }
   else
   {
      echo "Message could not be sent…";
   }
?>
</body>
</html>