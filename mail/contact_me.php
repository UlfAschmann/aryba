<?php

include 'PHPMailerAutoload.php';

if(empty($_POST['name'])  		||
   empty($_POST['empresa'])  	||
   empty($_POST['phone']) 		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }

$name = $_POST['name'];
$empresa = $_POST['empresa'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ulf.aschmann@gmail.com';
$mail->Password = 'mf7#e?9*t&'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  // TCP port to connect to
$mail->setFrom($email_address,'jhgfhg');
$mail->addAddress('ulf.aschmann@gmail.com', 'Aryba Contact Form'); // Add a recipient
$mail->Subject = "Website Contact Form:  $name";
$mail->Body = "You have received a new message from your website contact form.<br>"."Here are the details:<br>Name: $name<br>Email: $email_address<br>Phone: $phone<br>Message:<br>$message" ;
$mail->AltBody = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

if(!$mail->send()) { echo 'Message could not be sent.'; echo 'Mailer Error: ' . $mail->ErrorInfo; } else { echo 'Message has been sent'; }
