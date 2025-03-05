<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'plugin/PHPMailer/src/Exception.php';
require 'plugin/PHPMailer/src/PHPMailer.php';
require 'plugin/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->Username = 'tody096@gmail.com';
$mail->Password = 'dmws wigs itik xhri';

$mail->setFrom('tody096@gmail.com', 'tody');
$mail->addAddress('ashishmandal093@gmail.com', 'Ashish mandal');

$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = '=====subject goes here=======';
$mail->Body = "<h1> hello good morning";

try {
    $mail->send();
    echo "Successfully sent the mail.";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
