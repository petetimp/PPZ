<?php
	$Firstname=$_POST['FirstName'];
	$Lastname=$_POST['LastName'];
	$Email=$_POST['Email'];
	$Comments=$_POST['Message'];

require_once '../lib/swift_required.php';

//Feel free to log in to gmail with this account.  I created it for the final project :)
$transporter = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('webucatorfinalproject@gmail.com')
  ->setPassword('pwdpwdpwd');

$mailer = Swift_Mailer::newInstance($transporter);
$message = Swift_Message::newInstance()

  ->setSubject('You have a new message from ' . $Firstname . ' ' . $Lastname . '.')
  ->setFrom('webucatorfinalproject@gmail.com')
  ->setTo('webucatorfinalproject@gmail.com')
  ->setReplyTo($Email)
  ->setBody($Comments);
  
$numSent = $mailer->send($message);

	echo "<h1> Your message has been sent.</h1><br/>";
	echo "<img id='garfSuccess' src='Includes/garfieldSuccess.jpg' alt='success'/>";
	echo "<br/><br/><p> If you want to get in touch with us by phone feel free to call us at (732) 226-9859 during our <a style='text-decoration:none' href='http://localhost/PHPClassFiles/pet-shop/ppz.php?page=hours#hours'>business hours.</a> </p>";

if (!$mailer->send($message)) { 
  echo "<h1>Your message has failed to send...</h1></br>";
  echo "<img id='garfFailed' src='Includes/garfFailed.jpg' alt='failed'/>";
  echo "<br/><p> Refresh this page to try again or if you want to get in touch with us by phone feel free to call us at (732) 226-9859 during our <a style='text-decoration:none' href='http://localhost/PHPClassFiles/pet-shop/ppz.php?page=hours#hours'>business hours.</a> </p>";
}	
 
?>