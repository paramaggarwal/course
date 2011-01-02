<?php

session_start();
include("./includes/config.php");

$user = $_SESSION['username'];

$result = mysql_query("Select * From bb_users where user_login='$user'",$con);

$msg="hello";

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

if(isset($_POST['submit']))
{
	
	if($row["display_name"] != $_POST['name']) {
		$newname = $_POST['name'];
		$result = mysql_query("UPDATE `bb_users` SET `display_name` = '$newvalue' WHERE `user_login` = '$user' LIMIT 1 ;");
		$_SESSION['name'] = $newname;
	}
	if($row["blood_gr"] != $_POST['blood_gr']) {
		$newval = $_POST['blood_gr'];
		$result = mysql_query("UPDATE `bb_users` SET `blood_gr` = '$newval' WHERE `user_login` = '$user'  LIMIT 1 ;");
	}
	if($row["dob"] != $_POST['dob']) {
		$newval = $_POST['dob'];
		$result = mysql_query("UPDATE `bb_users` SET `dob` = '$newval' WHERE `user_login` = '$user' LIMIT 1 ;");
	}
	if($row["address"] != $_POST['address']) {
		$newval = $_POST['address'];
		$result = mysql_query("UPDATE `bb_users` SET `address` = '$newval' WHERE `user_login` = '$user'  LIMIT 1 ;");
	}
	if($row["father_name"] != $_POST['father_name']) {
		$newval = $_POST['father_name'];
		$result = mysql_query("UPDATE `bb_users` SET `father_name` = '$newval' WHERE `user_login` = '$user'  LIMIT 1 ;");
	}
	if($row["phone"] != $_POST['phone_no']) {
		$newval = $_POST['phone_no'];
		$result = mysql_query("UPDATE `bb_users` SET `phone` = '$newval' WHERE `user_login` = '$user'  LIMIT 1 ;");
	}
	if($row["user_email"] != $_POST['alt_email']) {
		$newval = $_POST['alt_email'];
		$result = mysql_query("UPDATE `bb_users` SET `user_email` = '$newval' WHERE `user_login` = '$user'  LIMIT 1 ;");
	}
	
	
	$result = mysql_query("Select * From bb_users where user_login='$user'",$con);
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result, MYSQL_BOTH);
	}
	$msg = "The entries have been changed successfully. <a href='http://iiitcslcentral.co.cc/>Click here </a>to go back to the home page.
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
			Nifty("div#box1,div#footer,div#navbar" , "transparent");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
		});
	</script>

	

</head>



<body>

<div id="header-content"> 
	<h1>Communication Skills Lab - IIIT, Allahabad</h1> 
</div>
 
<div id="header-image" style="width: 7%; height: 85%;" >
	<img src="http://www.iiitcslcentral.co.cc/images/header.png" style="height:100%; width:100%;" >
</div>
 
 
<div id="main">
 
<div id="navbar">
	<TABLE class="navbar">
	<TBODY>
	<TR>
 
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/'; ">Home</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/chit-chat/'; ">Chit-Chat</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/results.php'; ">Results</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/contact.php'; ">Contact</TD>
	<TD onclick="location.href='http://www.iiitcslcentral.co.cc/about.php'; ">About</TD>
 
	</TR>
	</TBODY>
	</TABLE>
</div>

	<div class="column" style="width:900px">

		<div class="container" id="box1" >

			<div 