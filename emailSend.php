<?php
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

if (isset($_POST["send"])) {
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'onlymahami@gmail.com';                     //SMTP username
    $mail->Password = 'bamx smzi asry scbm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;

    $message = 'name: ' . $_POST['first-name'] . '<br>email: ' . $_POST['email'] . '<br>country: ' . $_POST['country'] . '<br>message: ' . $_POST['message'];


    $mail->setFrom('onlymahami@gmail.com');
    $mail->addAddress('onlymahami@gmail.com');     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'new message from your website';
    $mail->Body = $message;

    $mail->send();
    echo '
    <script>alert("message has been sent");
    document.location.href = "index.html";
    </script>
    ';

}
?>