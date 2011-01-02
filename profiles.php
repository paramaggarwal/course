<?php
session_start();
include("./includes/config.php");

$found = false;

$rollno = $_GET['rollno'];

$result = mysql_query("Select * From stu_rec where roll_no='$rollno'",$con);

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$name = $row["name"];
	$found = true;
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Communication Skills Lab - <?php if($found) {echo $row['name'];?>'s Profile <?php } ?></title>
	<link href="./css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="./js/preload.js"></script>
	<script type="text/javascript" src="./js/niftycube.js"></script>
	<script type="text/javascript" src="./js/jquery-1.2.2.pack.js"></script>
	<script type="text/javascript" src="./js/animatedcollapse.js"></script>
	<script type="text/javascript">
		window.onload=function(){
			Nifty("div#name,div#profession,div#details,div#footer");
			Nifty("div#navbar","transparent");
		}
		animatedcollapse.addDiv('name_content', 'fade=1')
		animatedcollapse.addDiv('profession_content', 'fade=1')
		animatedcollapse.addDiv('details_content', 'fade=1')
		animatedcollapse.init()
	</script>
	
</head>

<body>

<?php include("./includes/header.php"); ?>

<div id="main" style="margin: auto;">
<?php
if($found) {
?>
	<div class="column">
		<div class="container" id="name">
			<div class="title clickable visualIEFloatFix" id="name_title" onmousedown="animatedcollapse.toggle('name_content'); toggleDiv('name_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="name_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
				<H2>Personal Details</H2>
			</div>
			<div class="content" id="name_content" >
			<p><b>Name</b> : <?php echo $row['name']; ?></p>
			<p><b>Roll no.</b> : <?php echo $row['roll_no']; ?></p>
			<p><b>Date of Birth</b> : <?php echo $row['dob']; ?></p>
			</div>     
		</div>
	</div>
        
	<div class="column">
		<div class="container" id="profession">
                		<div class="title clickable visualIEFloatFix" id="profession_title" onmousedown="animatedcollapse.toggle('profession_content'); toggleDiv('profession_content',2)">
                  			<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="profession_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
				<H2>Professional Details</H2>
			</div>
			<div class="content" id="profession_content" >
			<p><b>Course</b> : <?php echo $row['course']; ?></p>
			<p><b>Branch</b> : <?php echo $row['branch']; ?></p>
			<p><b>Year</b> : <?php echo $row['year']; ?></p>
			</div>
		</div>
	</div>

	<div class="column">
		
		<div class="container" id="details">
			<div class="title clickable visualIEFloatFix" id="details_title" onmousedown="animatedcollapse.toggle('details_content'); toggleDiv('details_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="details_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
				<H2>Other Details</H2>
			</div>
			<div class="content" id="details_content" >
 			<p><b>Father's Name</b> : <?php echo $row['father_name']; ?></p>
			<p><b>Address</b> : 
				<p><?php echo $row['address']; ?></p>
			</p>
			<p><b>Phone</b> : <?php echo $row['phone']; ?></p>
			<p><b>Email</b> : <?php echo $row['alt_email']; ?></p>
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
<?php include("./includes/footer.php"); ?>

</body></html>