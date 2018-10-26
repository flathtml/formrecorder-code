<?php
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);              // SMTP username
    	
   $mail->Username = 'dayamenashi@gmail.com';                 // SMTP username
    $mail->Password = 'october2018';                           // SMTP password

    //Recipients
    $mail->setFrom('dayamenashi@gmail.com', 'Mailer');
    $mail->addAddress('dayamenashi@gmail.com', 'Joe User');     // Add a recipient
    
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
     
?>
