<?php
//Editing profiles here\
include "../level1_check.php";
include("../config.php");

$result = mysql_query("Select * From stu_rec where id='$_SESSION['id']'",$con);

$row = new array();

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

$name = $_SESSION['name'];

$type = "";
$msg = "";
$ch = $_GET['change'];
if($ch == 'Y')
	$msg = "The entry has been successfully changed. ";
if($ch == 'P')
	$msg = "Your password has been changed successfully.";
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
		animatedcollapse.addDiv('edit_content', 'fade=1')
		animatedcollapse.init()
	</script>
	
</head>

<body>
<?php include("./includes/header.php"); ?>
<div id="main">
	<div class="column" style="width:900px">
		<div class="container" id="edit" >
			<div class="title clickable visualIEFloatFix" id="edit_title" onmousedown="animatedcollapse.toggle('edit_content'); toggleDiv('edit_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="edit_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Edit Your Profile</H2>
			</div>
			<div class="content" id="edit_content" >
            <p class="error" align="center"><?php echo $msg; ?></p>			
				<table width="473" align="center" class="tablecontents">
   <tr>
       <td width="107" bgcolor="#E0E0E0" class="tablecontents"><div align="right" class="style1">
           <p>Name:</p>
       </div></td>
	   <td width="272"><?php echo $name; ?></td>
	   <td width="78"><form method="post" action="change.php?type=name">
	     <input type="Submit" name="ChangeName" value="Change" id="ChangeName">
	     </form></td>
    </tr>
	 <tr>
       <td height="30" bgcolor="#E0E0E0"><div align="right" class="tablecontents">Blood Group:</div></td>
	   <td width="272" ><?php echo $row['blood_gr']; ?> </td>
     <td><form method="post" action="change.php?type=blood_gr">
           <input type="submit" name="ChangeBG" value="Change" id="ChangeBG">
       </form></td>
    </tr>
	 <tr>
       <td bgcolor="#E0E0E0" height="30"><div align="right" class="style1">Date of Birth:</div></td>
	   <td width="272"><?php echo $row['dob']; ?></td>
	   <td><form method="post" action="change.php?type=dob">
	     <input type="submit" name="ChangeDOB" value="Change" id="ChangeDOB">
	     </form></td>
    </tr>
	<tr>
    	<td height="100" bgcolor="#E0E0E0" class="tablecontents">
	  <div align="right" class="tablecontents">Address:</div></td>
      	<td><?php echo $row['address']; ?></td>
        <td><form method="post" action="change.php?type=address"><input type="submit" name="ChangeAddress" value="Change" id="ChangeAddress"></form></td>
	</tr>
    <tr>
    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">
	  <div align="right" class="tablecontents">Father's Name:</div></td>
      	<td><?php echo $row['father_name']; ?></td>
        <td><form method="post" action="change.php?type=father_name"><input type="submit" name="ChangeAddress" value="Change" id="ChangeAddress"></form></td>
	</tr>
     <tr>
    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">
	  <div align="right" class="tablecontents">Phone No.:</div></td>
      	<td><?php echo $row['phone_no']; ?></td>
        <td><form method="post" action="change.php?type=phone_no"><input type="submit" name="ChangePhone" value="Change" id="ChangePhone"></form></td>
	</tr>
     <tr>
    	<td height="30" bgcolor="#E0E0E0" class="tablecontents">
	  <div align="right" class="tablecontents">Alternate Email:</div></td>
      	<td><?php echo $row['alt_email']; ?></td>
        <td><form method="post" action="change.php?type=alt_email"><input type="submit" name="ChangeMail" value="Change" id="ChangeMail"></form></td>
	</tr>
</table>
			</div>     
		</div>
      </div>
	</div>
<div class="spacer"></div>
</div>
<?php include("./includes/footer.php"); ?>

</body>
</html>