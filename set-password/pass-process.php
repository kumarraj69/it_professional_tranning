<?php

use PHPMailer\PHPMailer\PHPMailer;

include '../db.php';
$_SESSION['error'] = "";
$email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
}
$sql = "select * from user where email ='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = '';

    $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
    $expdate = date("Y-m-d H:i:s", $expFormat);
    $emailkey = md5(time());
    $addemailKey = substr(md5(uniqid(rand(), 1)), 3, 10);
    $emailkey = $emailkey . $addemailKey;

    // Insert Temp Table
    $sql = "INSERT INTO `pass_recovery` (`email`, `email_key`, `expdate`) VALUES ('" . $email . "', '" . $emailkey . "', '" . $expdate . "')";
    if ($conn->query($sql) === True) {

        $output .= '<p>Please click on the following link to reset your password.</p>';
        //replace the site url
        $output .= '<p><a href="http://localhost/it_professional_tranning/admin/set-password/reset_pass.php?key=' . $emailkey . '&email=' . $email . '&action=reset" target="_blank">http://localhost/forgotpassword/reset-password.php?key=' . $emailkey . '&email=' . $email . '&action=reset</a></p>';
        $body = $output;
        $subject = "Password Recovery";

        $email_to = $email;


        //autoload the PHPMailer
        require("vendor/autoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "pramodarya65@gmail.com"; // Enter your email here
        $mail->Password = "dxsbmxykrlvueigi"; //Enter your passwrod here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "ravi.kumar15082003@gmail.com";
        $mail->FromName = "Ravi";

        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $_SESSION['error'] = "Email has been sent to your mail";
            header("Location:  forget-pass.php");
        }
    }
} else {
    $_SESSION['error'] = "This email does not exist in our database";
    header("Location:  forget-pass.php");
}
