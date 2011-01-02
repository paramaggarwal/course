<?php

$email = $_POST['email'] ;
$message = $_POST['feedback'] ;

$details = 'From: ' . $email . "\r\n" . 'Cc: paramaggarwal@gmail.com' . "\r\n";

$to = "pranjaltech@gmail.com";
$subject = "Feedback on IIIT CSL Central";


mail( $to , $subject, $message, $details);
	
echo 1;

?>  