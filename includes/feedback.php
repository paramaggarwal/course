<?php


//----------------------------------------------------------------------------------------------------
$email = $_REQUEST['email'] ;
$message = $_REQUEST['feedback'] ;

mail( "pranjaltech@gmail.com", "Feedback Form Results",
$message, "From: $email" );
	echo 1;
//header( "Location: http://www.example.com/thankyou.html" );
//----------------------------------------------------------------------------------------------------



/*$mailto='pranjaltech@gmail.com';
$subject = "Feedback: A person has sent us a feedback";
$formurl = "";

if(isset($_POST['feedback']) {
	$email = $_POST['email'];
	$query = $_POST['feedback'];

	//&http_referrer = getenv('HTTP_REFERER');
	/*if(isset($_POST['email']))
	{
		echo 0;
		//header("Location: $formurl");
		exit;
	}

	if(get_magic_quotes_gpc())
	{
		$comments = stripslashes($comments);
	}
	$messageproper = "This message was sent from: \n".
				"$http_referrer\n". 
				"-----------Comments------------\n\n".
				$comments.
				"\n-------------------------------\n";

	mail($mailto, $subject, $messageproper, "From:\$name\"<$email>\nReply To: \"$name\"<$email>\nX-Mailer: feedback.php 2.02");
	echo 1;
}
else {
	echo 0;
}*/
?>  