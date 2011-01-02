<?php
session_start();
include("./includes/config.php");

$found = false;

$rollno = $_GET['rollno'];
$own = false;
$user = "";

if(isset($_SESSION['username'])) {
	$user = $_SESSION['username'];
        if($user == $rollno) {
$own=true;
}
}

$result = mysql_query("Select * From bb_users where user_login='$rollno'",$con);

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$name = $row["display_name"];
	$found = true;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - <?php if($found) {echo $row['display_name'];?>'s Profile <?php } ?></title>
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
                        $("#box2_title").click(function () { $("#box2_content").slideToggle("normal"); toggleArrow(2);});
                        $("#box3_title").click(function () { $("#box3_content").slideToggle("normal"); toggleArrow(3);});
                });
	</script>
	
</head>

<body>


<?php include('./includes/header.php'); ?>

<?php
if($found) {
?>
	<div class="column">
		<div class="container" id="box1">
			<div class="title clickable visualIEFloatFix" id="box1_title">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.png"></A></P>
				<H2>Personal Details</H2>
			</div>
			<div class="content" id="box1_content" >
			<p><b>Name</b> : <?php echo $row['display_name']; ?></p>
			<p><b>Roll no.</b> : <?php echo $row['user_login']; ?></p>
			<p><b>Date of Birth</b> : <?php echo $row['dob']; ?></p>
<?php if($own == true) { ?>
<p class='error' align='right'><input type='button' value="Edit Profile" onClick="window.location='editprofile.php'" /></p>
<?php } ?>
			</div>     
		</div>
	</div>
        
	<div class="column">
		<div class="container" id="box2">
                		<div class="title clickable visualIEFloatFix" id="box2_title" >
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box2_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.png"></A></P>
				<H2>Professional Details</H2>
			</div>
			<div class="content" id="box2_content" >
			<p><b>Course</b> : <?php echo $row['course']; ?></p>
			<p><b>Branch</b> : <?php echo $row['branch']; ?></p>
			<p><b>Year</b> : <?php echo $row['year']; ?></p>
			</div>
		</div>
	</div>

	<div class="column">
		
		<div class="container" id="box3">
			<div class="title clickable visualIEFloatFix" id="box3_title" >
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="box3_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.png"></A></P>
				<H2>Other Details</H2>
			</div>
			<div class="content" id="box3_content" >
 			<p><b>Father's Name</b> : <?php echo $row['father_name']; ?></p>
			<p><b>Address</b> : 
				<p><?php echo $row['address']; ?></p>
			</p>
			<p><b>Phone</b> : <?php echo $row['phone']; ?></p>
			<p><b>Email</b> : <?php echo $row['user_email']; ?></p>
			</div>
		</div>
	</div>
<div class="spacer"></div>
<?php 
}
else {
	?>
<p align="center">This record does not exist. Please <a href="http://www.iiitcslcentral.co.cc/" >try again</a>.</p>
<?php
}
?>
</div>


<?php include('./includes/footer.php'); ?>
</body></html>