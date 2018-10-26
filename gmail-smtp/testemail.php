<?php
//require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.phpmailer.php';
//require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.smtp.php';
require 'class.phpmailer.php';
require 'class.smtp.php';
 
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "gator3264.hostgator.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);              // SMTP username
    	
$mail->Username = 'dan@formrecorder.com';                 // SMTP username
$mail->Password = 'october2018';                           // SMTP password

 //Recipients
$mail->setFrom('dan@formrecorder.com', 'Mailer');
$mail->addAddress('d_menashi@yahoo.com', 'Joe User');     // Add a recipient
$mail->Subject  = 'First PHPMailer Message';
$mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
    
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 
echo "<script> location.href='https://www.formrecorder.com/thanks.html'; </script>"; 
?>
