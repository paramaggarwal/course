<?php


session_start();
$msg = "";

if( $_SESSION['level'] == 1 ) {
	$msg = "The File has been successfully uploaded. These are the details:
	";
	$msg .= "Upload: " . $_FILES["file"]["name"] . "<br />";
	$msg .= "Type: " . $_FILES["file"]["type"] . "<br />";
	$msg .=  "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	$msg .= "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

	if (file_exists("upload/" . $_FILES["file"]["name"])) {
		$msg .= $_FILES["file"]["name"] . " already exists. ";
	}
	else {
		move_uploaded_file($_FILES["file"]["tmp_name"],
		"./upload/" . $_FILES["file"]["name"]);
		$msg .= "Stored in: " . "./upload/" . $_FILES["file"]["name"];
	}
}
else {
	$msg .= "Sorry! Upload Not Allowed!!";
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

	<title>File Upload :: Communication Skills Lab - IIIT, Allahabad</title>
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="../js/scripts.js"></script>
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
			Nifty("div#box1,div#box2,div#box3,div#box4,div#box5,div#footer,div#navbar", "transparent");

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
	<div class="column">

		<div class="container" id="box1">

			<div class="title clickable visualIEFloatFix" id="box1_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="../images/arrow_down_2.png"></A></P>

				<H2>Project Upload</H2>

			</div>

			<div class="content" id="box1_content" >

			<p><?php echo $msg; ?></p>
			
			</div>

		</div>

	</div>

<div class="spacer"></div>

</div>

<?php include("./footer.php"); ?>



</body></html>