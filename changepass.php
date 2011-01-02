<?php

session_start();
include("./includes/config.php");
if(!isset($_SESSION['loginok'])) {
    echo "Error!! You are not Logged in!!";
    exit();
}

$user = $_SESSION['username'];

$result = mysql_query("Select * From bb_users where user_login='$user'",$con);

$msg="";

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

if(isset($_POST['submit']))
{
	$newpass1 = md5($_POST['pass1']);
	$newpass2 = md5($_POST['pass2']);
	$oldpass = md5($_POST['pass']);
	if($oldpass != $row['user_pass']) {
		$msg = "Incorrect Password. Please re-enter.";
	} else if($newpass1 != $newpass2) {
		$msg = "The given passwords do not match. Please try again.";
	} else {
		mysql_query("UPDATE bb_users SET user_pass='$newpass1' where user_login='$user'",$con);
		$msg = "The password has been changed successfully. <a href='http://iiitcslcentral.co.cc/'>Click here </a>to go back to the home page.";
}
	//header("Location: http://iiitcslcentral.co.cc/");
}
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
			Nifty("div.container,div.menu" , "transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
		});
	</script>

	

</head>



<body>


<?php include('./includes/header.php'); ?>

	<div style="width:35%; margin:auto;">

		<div class="container" id="box1" >

			<div class="title clickable visualIEFloatFix" id="box1_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="./images/arrow_down_2.png"></A></P>

				<H2>Change Password</H2>

			</div>

			<div class="content" id="box1_content" >

            <p class="error" align="center"><?php echo $msg; ?></p>
<form method="post" action="./changepass.php">
				<table width="473" align="center" class="tablecontents">

   <tr>

       <td width="107" bgcolor="#E0E0E0" class="tablecontents"><div align="right" class="style1">

           <p>Old Password:</p>

       </div></td>

       

	   <td width="272"><input type="password" name="pass" id="pass" /></td>

    </tr>

	 <tr>

       <td height="30" bgcolor="#E0E0E0"><div align="right" class="tablecontents">New Password</div></td>

	   <td width="272" >

       

	   	<input type="password" name="pass1" id="pass1" /> 

       </td>

    </tr>

	 <tr>

       <td bgcolor="#E0E0E0" height="30"><div align="right" class="style1">Confirm Password:</div></td>

	   <td width="272">

       

	   	<input type="password" name="pass2" id="pass2" />

       </td>

    </tr>
    <tr>
    <td></td>
    <td>
    	<input type="submit" id="submit"  name="submit" value="Change" />
    </td>
    </tr>

</table>
</form>

			</div>     

		</div>

      </div>

	</div>

<div class="spacer"></div>

</div>


<?php include('./includes/footer.php'); ?>

</body>

</html>