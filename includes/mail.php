<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Mail to All</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/scripts.js"></script>
	<script type="text/javascript">
		function toggleArrow(id) {
			if ( $("#box" + id + "_content").css("height") == '1px' ) {
				$("#box" + id + "_content_toggle").html("<img src='../images/arrow_down_2.png'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='../images/arrow_right_2.png'>");
			}
		}

		$(document).ready(function(){
			Nifty("div.container,div.menu", "transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
		});
	</script>

</head>

<body>

<?php include('./header.php'); ?>
	<div style="width: 50%; margin:auto;">
		<div class="container" id="box1">
			<div class="title clickable visualIEFloatFix" id="box1_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>
				<H2 align="left">Send mail to All</H2>
			</div>
			<div class="content" id="box1_content" align="left">

<?php
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

	$from = "IIIT CSL Central <admin@iiitcslcentral.co.cc>" ;
	$details = 'From: ' . $from . "\r\n" . 'Reply-To: paramaggarwal@gmail.com' . "\r\n";


for($i=8001; $i<8150; $i++) {
               $to = "iit200".$i.'@iiita.ac.in';
               mail( $to , $subject, $message, $details);
}

for($i=8001; $i<8080; $i++) {
               $to = "iec200".$i.'@iiita.ac.in';
               mail( $to , $subject, $message, $details);
}


//trial
	mail( "paramaggarwal@gmail.com" , $subject, $message, $details);
	mail( "pranjaltech@gmail.com" , $subject, $message, $details);

	echo "Mail sent successfully...";
}
?>

				<form name="form1" action="" method = "post">
				Subject: <br /><input type="text" name="subject" value = "<?php echo $subject; ?>"style="width:90%;"/><br /><br />
				Mail: <br /><textarea name="contents" style="width:90%; height:300px"><?php echo $message; ?></textarea><br /><br />
				<input type="submit" name="submit" value="Send mail to all">
				</form>

<?php
} else {
	echo "Please login as admin.";
}
?> 

			</div>
		</div>
	</div>
<div class="spacer"></div>
</div>
<?php include("./footer.php"); ?>
</body></html>