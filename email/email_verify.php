<?php 

if(isset($_POST['submit']) && $_POST['email'])
{
include "db.php";
$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
$row= mysqli_num_rows($result);
if($row < 1)
{
$token = md5($_POST['email']).rand(10,9999);
mysqli_query($conn, "INSERT INTO users(name, email, email_verification_link ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "')");
$link = "<a href='/Applications/XAMPP/xamppfiles/htdocs/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";


require 'vendor/autoload.php'; 

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = true;									
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
	$mail->Body = '<p>Dear user, </p> <h3>Your verify OTP code is:- '.$link.' <br></h3>';
	$mail->AltBody = 'Thanks For signing up.';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>