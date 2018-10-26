<?php
//NOTE : This is the path when testing locally
//require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.phpmailer.php';
//require 'C:\xampp\htdocs\FORMRECORDER\gmail-smtp\PHPMailer\class.smtp.php';

//NOTE : This is the path when loaded for server
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

$name = $_POST['Fullname']; // required
$email_to = $_POST['Email']; // required
$url = $_POST['shareurl']; // required

 //Recipients
$mail->setFrom('dan@formrecorder.com', 'Formrecorder');
$mail->addAddress($email_to, $name);     // Add a recipient
$mail->Subject  = 'Formrecorder - Audio Recording';
$mail->Body     = '<h3>Hi!&nbsp;'.$name.'&nbsp;</h3>'
                  .'<h3>Following is your recorded audio URL</h3>'
				  .'<h3>'.$url. '</h3>'
				  .'<h3>Thanks for using Formrecorder.</h3>';
   
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
 
//Uncomment this if you want to see the thank you message
 echo "<script> location.href='email-confirmation.html'; </script>"; 
?>
