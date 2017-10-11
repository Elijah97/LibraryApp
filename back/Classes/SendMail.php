
 <?php
   class SendMail {
     //private $_db,
       //     $_data;
      public static function send(){
      require_once('mailer/PHPMailerAutoload.php');
//      $db = DB::getInstance();

     //  GET FORM DATA
//        
//        $elist = mysql_query("SELECT email FROM students ");
//          $array = array();
//          while($take = mysql_fetch_array($elist))
//          {
//              $array[] = $take["email"];
      $name = $_POST['name']; // required
//      $email=implode(', ', $array); 
      $email = $_POST['email'];
      $emails=explode(',', $email); // explode email with comma's
     foreach($emails as $one_email)
     {
         $to = $one_email;
      $message = $_POST['message']; 
    //GET DB DATA
echo $to;
      $mail = new PHPMailer;

      //$mail->SMTPDebug = 2;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP || Disable for Godaddy
      //$mail->SMTPAuth = true;                               // Enable SMTP authentication Gmail
    //  $mail->SMTPSecure = false;                            // Disable for Godaddy Email
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    //  $mail->Host = 'relay-hosting.secureserver.net';  // Specify main and backup SMTP servers Godaddy
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers Gmail
      $mail->Username = 'alulibraryrwanda@gmail.com';                 // SMTP username
      $mail->Password = 'alulibraryrwanda';                           // SMTP password
    //  $mail->Port = 25;   //   587                              // TCP port to connect to Godaddy
      $mail->Port = 465;   //   587                              // TCP port to connect to Gmail
      $mail->WordWrap   = 80; // set word wrap  

      $mail->setFrom('alulibraryrwanda@gmail.com', 'ALU Library Email');
      $mail->addAddress($to, $name);     // Add a recipient
      $mail->addReplyTo('alulibraryrwanda@gmail.com', 'ALU Library Email');
      //$mail->addCC('diamond.sacris@gmail.com');  // Add this for Godaddy
      //$mail->addBCC('bcc@example.com');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'ALU Library Email';
      $mail->Body    = '<body style="line-height: 1.6;">
                            <div style="padding: 10px; margin-left: 10px margin-right: 10px">
                              Dear <b>'.$name.'</b> <br><br>
                              '.$message.'
                            </div>  
                            <div style="font-size: 13px; margin: 5px 0px; position: relative">
                                  <div style="text-align: left; border-top: 1px solid #ddd; margin-top: 15px; padding: 10px 5px">
                                      <b>Thank you</b>,<br>
                                      ALU Library Team,<br>
                                      E:	info@alueducation.com<br>
                                      T: 	+ 250 789794261<br>
                                  </div>
                              </div>
                        </body>';
      $mail->AltBody = 'Dear '.$name.' \n Thank you for trying out sending HTML emails using PHP Mailer';

      if($mail->send()) {
//          Redirect::to('email.php');
          header("Location:email.php");
      } else {
        echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
      }
    }
          }  
    public function data(){
        return $this->_data; 
    }
   }
?>