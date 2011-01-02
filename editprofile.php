<?php

session_start();

include("./includes/config.php");

$name = $_SESSION['name'];

$result = mysql_query("Select * From stu_rec where name='$name'",$con);

$msg = "";

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

$type = "";

if(isset($_POST['submit']))
{
	//echo "HELLLOOOOO";
	/*if($row["name"] != $_POST['name']) {
		$newname = $_POST['name'];
		$result = mysql_query("UPDATE `stu_rec` SET `name` = '$newname' WHERE `name` = '$name' LIMIT 1 ;");
		$result = mysql_query("UPDATE `bb_users` SET `display_name` = '$newvalue' WHERE `display_name` = '$name' LIMIT 1 ;");
		$_SESSION['name'] = $newname;
		$name = $_SESSION['name'];
	}*/
	if($row["blood_gr"] != $_POST['blood_gr']) {
		$newval = $_POST['blood_gr'];
		$result = mysql_query("UPDATE `stu_rec` SET `blood_gr` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	if($row["dob"] != $_POST['dob']) {
		$newval = $_POST['dob'];
		$result = mysql_query("UPDATE `stu_rec` SET `dob` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	if($row["address"] != $_POST['address']) {
		$newval = $_POST['address'];
		$result = mysql_query("UPDATE `stu_rec` SET `address` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	if($row["father_name"] != $_POST['father_name']) {
		$newval = $_POST['father_name'];
		$result = mysql_query("UPDATE `stu_rec` SET `father_name` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	if($row["phone_no"] != $_POST['phone_no']) {
		$newval = $_POST['phone_no'];
		$result = mysql_query("UPDATE `stu_rec` SET `phone_no` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	if($row["alt_email"] != $_POST['alt_email']) {
		$newval = $_POST['alt_email'];
		$result = mysql_query("UPDATE `stu_rec` SET `alt_email` = '$newval' WHERE `name` = '$name' LIMIT 1 ;");
	}
	$msg = "Your Changes have been saved successfully!!";
        header("Location: http://iiitcslcentral.co.cc/");
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
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_down_2.gif'>");
			}
			else {
				$("#box" + id + "_content_toggle").html("<img src='./images/arrow_right_2.gif'>");
			}
		}

		$(document).ready(function(){
			Nifty("div#box1,div#footer,div#navbar");

			$("#box1_title").click(function () { $("#box1_content").slideToggle("normal"); toggleArrow(1);});
		});
	</script>

	

</head>



<body>

<?php include("./includes/header.php"); ?>

<div id="main">

	<div class="column" style="width:900px">

		<div class="container" id="box1" >

			<div class="title clickable visualIEFloatFix" id="box1_title" >

				<P class="togglebutton">

				<A href="javascript:;" class="toggle" id="box1_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>

				<H2>Edit Your Profile</H2>

			</div>

			<div class="content" id="box1_content" >

            <p class="error" align="center"><?php echo $msg;?></p>			
<form method="post" action="./editprofile.php">
				<table width="473" align="center" class="tablecontents">

   <tr>

       <td width="107" bgcolor="#E0E0E0" class="tablecontents"><div align="right" class="style1">

           <p>Name:</p>

       </div></td>

       

	   <td width="272"><input type="text" name="name" id="name" value="<?php echo $name; ?>" /></td>

    </tr>

	 <tr>

       <td height="30" bgcolor="#E0E0E0"><div align="right" class="tablecontents">Blood Group:</div></td>

	   <td width="272" >

       

	   	<input type="text" name="blood_gr" id="blood_gr" value="<?php echo $row['blood_gr']; ?>" /> 

       </td>

    </tr>

	 <tr>

       <td bgcolor="#E0E0E0" height="30"><div align="right" class="style1">Date of Birth:</div></td>

	   <td width="272">

       

	   	<input type="text" name="dob" id="dob" value="<?php echo $row['dob']; ?>" />

       </td>

    </tr>

	<tr>

    	<td height="100" bgcolor="#E0E0E0" class="tablecontents">

	  <div align="right" class="tablecontents">Address:</div></td>

      	<td>

			<textarea name="address" rows="5" id="address"><?php echo $row['address']; ?></textarea>

        </td>

        

	</tr>

    <tr>

    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">

	  <div align="right" class="tablecontents">Father's Name:</div></td>

      	<td>

        	

			<input id="father_name" name="father_name" type="text" value="<?php echo $row['father_name']; ?>" />

        </td>

	</tr>

     <tr>

    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">

	  <div align="right" class="tablecontents">Phone No.:</div></td>

      	<td>

			<input id="phone_no" type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>" />

        </td>

        

	</tr>

     <tr>

    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">

	  <div align="right" class="tablecontents">Alternate Email:</div></td>

      	<td>

			<input id="alt_email" name="alt_email" type="text" value="<?php echo $row['alt_email']; ?>" /></td>
        

	</tr>
    <tr>
    <td></td>
    <td>
    	<input type="submit" id="submit"  name="submit" value="Save" />
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

<?php include("./includes/footer.php"); ?>



</body>

</html>