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
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#forgot,div#footer");
		}
		animatedcollapse.addDiv('forgot_content', 'fade=1')
		animatedcollapse.init()
	</script>
	
</head>

<body>
<?php include("./includes/header.php"); ?>
<div id="main">
	<div class="column" style="width:900px">
		<div class="container" id="forgot" >
			<div class="title clickable visualIEFloatFix" id="forgot_title" onmousedown="animatedcollapse.toggle('forgot_content'); toggleDiv('forgot_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="forgot_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Forgot Password</H2>
			</div>
			<div class="content" id="forgot_content" >


			<table style="width:90%;">
			<tr>
				<td style="width:50%;">
				Just incase that girl (you just saw pass-by) reminded you your password, <a href="index.php">try again here</a>.<br />
				This will reset your password  and send you a new password on the above e-mail.<br />
				Even forgot your email ID? Contact admin at <a>pranjaltech@gmail.com</a>
				</td>
				<td style="width:50%;">
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
<?php include("./includes/footer.php"); ?>

</body></html>