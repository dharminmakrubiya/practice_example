<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = false;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'dharminmakrubiya18@gmail.com';				
	$mail->Password = 'xounufdhdwandmxv';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('dharminmakrubiya18@gmail.com', 'My Company');		
	$mail->addAddress('dharminmakrubiya@hotmail.com');
	// $mail->addAddress('dharminmakrubiya@hotmail.com', 'DM');
	
	$mail->isHTML(true);								
	$mail->Subject = 'User Signup';
	$mail->Body = 'Congratulations! Your Account Has Been <b>Successfully</b> Created.';
	$mail->Body = '<p>Dear user, </p> <h3>Your verify OTP code is:- '.$otp_add.' <br></h3>';
	$mail->AltBody = 'Thanks For signing up.';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>


