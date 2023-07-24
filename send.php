<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings

  $mail->isSMTP();                                        //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'ravi.kumar15082003@gmail.com';           //SMTP username
  $mail->Password   = 'bmticohwesijqrfv';                     //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
  $mail->Port       = 465;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('ravi.kumar15082003@gmail.com', 'Raj Kumar');
  $mail->addAddress('ravi.kumar15082003@gmail.com', 'Joe User');     //Add a recipient

  $tel = "Name : " . $name . " <br> " . "Email : " . $email . " <br> " . "Message : " . $message;

  //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = $tel;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
?>
  <!-- This is the sweet alert  -->
  <script>
    window.addEventListener('load', function() {
      swal({
        title: "Message Has been Sent",
        text: "Congratulation",
        icon: "success",
        button: "OK"
      }).then(function() {
        window.location.href = "contact.php";
      });
    });
  </script>
<?php
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
<!-- Sweet alert cdn -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweet alert cdn end -->