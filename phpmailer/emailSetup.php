<?php
//including required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//Define namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//create instance of phpmailer
$mail = new PHPMailer();
//set mail to use
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable  smtp Authentication
$mail->SMTPAuth = "true";
//set encryption (ssl/tls)
$mail->SMTPSecure = "tls";
//set port to connect smtp
$mail->Port = "587";
//set gmail username
$mail->Username = "hilarycoder237@gmail.com";
//set gmail password
$mail->Password = "JustForCode#";
//set sender email
$mail->setFrom("hilarycoder237@gmail.com");
//Enable html
$mail->isHTML("true");


?>