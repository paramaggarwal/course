<?php
session_start();
include("./includes/config.php");

$msg = "";

if (isset($_POST['Submit']))
{
	$useremail = $_POST['useremail'];
	$user = $_POST['username'];
	$result = mysql_query("Select * From stu_rec where alt_email='$useremail'",$con);
	
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		if($useremail == $row["alt_email"]) 	// CHECK TO SEE IF USER EMAIL IS REGISTERED
		{				// IF NOT, MESSAGE WILL TELL USER NOT REGISTERED
			if($user == $row["roll_no"])
			{
			$msg = "Your password has been sent to your email address";		
		
// RANDOM PASSWORD GENERATOR FOR NEW PASSWORD
function NewPass() {
$rnd = "abchefghjkmnpqrstuvwxyz0123456789";
srand((double)microtime()*1000000); 
$i = 0;
while ($i <= 7) {
    	$num = rand() % 33;
    	$tmp = substr($rnd, $num, 1);
    	$pass = $pass . $tmp;
    	$i++;}
return $pass;}
$rand_pass = NewPass(); // UN ENCRYPTED PASSWORD
$newpass = md5($rand_pass); // PASSWORD ENCRYPTION
		
// HERE MYSQL PREPARES TO UPDATE THE USERS RECORD CHANGING TO THE NEW ENCRYPTED PASSWORD	
		$username = $row["roll_no"];
        $userpass = $newpass;
        $userlevel = $row["user_level"];
        $useremail = $row["alt_email"];
		$userid = $row["id"];
$result = mysql_query("Update stu_rec set roll_no='$username', password='$userpass', alt_email='$useremail', user_level='$userlevel' where id=".$userid);

// THIS PART SENDS USER A NEW PASSWORD
$email = $useremail;
$todayis = date("l, F j, Y, g:i a") ;
$subject = "IIIT CSL Central : Password Recovery";
$message = " 
From: $sendersName ($sendersEmail)\n
You have requested your Login information as below: \n\n
Username: $username\n
Password: $rand_pass\n
This is an auto-generated e-mail. Please do not reply to it.\n
Regards,\n
CSL Central Team\n
";
$from = "From: $sendersEmail";
if ($email != "") 
mail($email, $subject, $message, $from);
		}}
		else
		{
			$msg = "The email address/Username provided is not in our records";
		}
	}
	else
	{
		$msg = "The email address/Username provided is not in our records";
    }
}
mysql_close ($con);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - IIIT, Allahabad</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/scripts.js"></script>
	<script type="text/javascript">
		function toggleArrow(id) {
			if ( $("#box" + id + "_content").css("height") == '1px' ) {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_down_2.png'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_right_2.png'>");
			}
		}

		$(document).ready(function(){
			Nifty("div.container,div.menu","transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
		});
	</script>
	
</head>

<body>

<?php include('./includes/header.php'); ?>

	<div style="width: 80%; margin: auto;">
		<div class="container" id="box1" >
			<div class="title clickable visualIEFloatFix" id="box1_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="./images/arrow_down_2.png"></A></P>
				<H2>Forgot Password</H2>
			</div>
			<div class="content" id="box1_content" >


			<table style="width: 100%;" cellpadding="20">
			<tr>
				<td style="width:49%;">
				&bull; Just incase that girl (you just saw pass-by) reminded you of your password, <a href="index.php">try again here</a>.<br /><br />
				&bull; This will reset your password  and send you a new password on the above e-mail.<br /><br />
				&bull; Even forgot your email ID? Contact admin at <a>pranjaltech@gmail.com</a>
				</td>
				<td style="width:49%;">
				<form name="form1" method="post" action="">
				<p>Please enter your registered email address</p>
				<div class="error"><?php echo $msg ?></div>
				<table align="center">
				<tr>
					<td align="right" bgcolor="#E0E0E0">Username: </td>
					<td align="left"><input type="text" name="username" id="username"></td>
				</tr>
				<tr>
					<td align="right" bgcolor="#E0E0E0">E-mail: </td>
					<td align="left"><input name="useremail" type="text" id="useremail" width="200"></td>
				</tr>
				<tr>
					<td align="right"><input name="Submit" type="submit" value="Request Password"></td>
				</tr>
				</form>
				</td>
				</tr>
				</table>
			</table>			
				
			</div>     
		</div>
      </div>
	</div>
<div class="spacer"></div>
</div>


<?php include('./includes/footer.php'); ?>
</body></html>