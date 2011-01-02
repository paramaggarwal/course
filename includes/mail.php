<?php

session_start();
if( $_SESSION['level'] == 4 && $_SESSION['loginok'] == "ok") {

$subject = "IIIT CSL Central";
$message = "Hi friends,

We (Pranjal, Param, Anvay, Divij and Chetan) have made a forum as part of our CSL Project. It would be nice if we could use it as a separate private forum for all us First-Year students.

The link is - http://www.iiitcslcentral.co.cc/chit-chat/

Hope you drop by and register...

For any queries you can contact any of us:

anvay.bigbrother@gmail.com
chetan1507@gmail.com
divijvaidya13@gmail.com
pranjaltech@gmail.com
paramaggarwal@gmail.com

Thanks,

--
The Coding Cobras

" ;

if(isset($_POST['submit'])) {
	if($message != $_POST['contents']) {
		$message = $_POST['contents'];
	}

	if($subject != $_POST['subject']) {
		$subject = $_POST['subject'];
	}

	$from = "admin@iiitcslcentral.co.cc" ;
	$details = 'From: ' . $from . "\r\n" . 'Reply-To: paramaggarwal@gmail.com' . "\r\n";


for($i=8001; $i<8150; $i++) {
               $to = "iit200".'$i'.'@iiita.ac.in';
               mail( $to , $subject, $message, $details);
}

for($i=8001; $i<8080; $i++) {
               $to = "iec200".'$i'.'@iiita.ac.in';
               mail( $to , $subject, $message, $details);
}


//trial
	mail( "paramaggarwal@gmail.com" , $subject, $message, $details);
	mail( "pranjaltech@gmail.com" , $subject, $message, $details);

	echo "Mail sent successfully...";
}
?>
<html>
<head>
<title>Mail to First Year Students</title>
</head>
<body>
<h1> Send mail to all first-year students</h1>
<h2>For internal use only!</h2><br /><br />
<form name="form1" action="" method = "post">
Subject: <br /><input type="text" name="subject" value = "<?php echo $subject; ?>"style="width:60%;"/><br /><br />
Mail: <br /><textarea name="contents" style="width:60%; height:40%;"><?php echo $message; ?></textarea><br /><br />
<input type="submit" name="submit" value="Send that f****** mail!">
</form>
</body>
</html>
<?php
} else {
	echo "You hacker!!! Please login as admin!";
}
?>  