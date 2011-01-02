<?php
//include "../level1_check.php";
session_start();
include("./includes/config.php");
$type = $_GET['type'];

$name = $_SESSION['name'];
$username = $_SESSION['username'];

$result = mysql_query("Select * From stu_rec where name='$name'",$con);

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

$value = $row[$type];
$index = $type;
$msg = "";
	
//Writing the values to SQL Database
if(isset($_POST['Submit']))
{
	$newvalue = $_POST['change'];
	if($newvalue != "")
	{
		//$result = mysql_query("UPDATE `stu_rec` SET `$index` = '$newvalue' WHERE `name` = '$name' LIMIT 1 ;");
		//$result = mysql_query("UPDATE `bb_users` SET `$index` = '$newvalue' WHERE `name` = '$name' LIMIT 1 ;");
		//changing session information
		if($type == "name")
		{
			$_SESSION['name'] = $newvalue;
		}
	}
	header("Location: editprofile.php?change=Y");
}
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
<?php include("header.php"); ?>
<div id="main">
	<div class="column" style="width:900px">
		<div class="container" id="edit" >
			<div class="title clickable visualIEFloatFix" id="edit_title" onmousedown="animatedcollapse.toggle('edit_content'); toggleDiv('edit_content',2)">
				<P class="togglebutton">
				<A href="javascript:;" class="toggle" id="edit_content_toggle"><IMG src="./images/arrow_down_2.gif"></A></P>
				<H2>Edit Your Profile</H2>
			</div>
			<div class="content" id="edit_content" >			
				<form name="form" method="post" action="">
    <table width="351" align="center">
      <tr>
        <td width="90" align="right" bgcolor="#E0E0E0" class="tablecontents" >Existing <?php echo $type; ?> </td>
        <td width="249" align="left"><?php echo "<p class='boldtext'>$value</p>" ?> </td>
      </tr>
      <tr>
        <td align="right" bgcolor="#E0E0E0" class="tablecontents">Enter new <?php echo $type;?></td>
        <td align="left">
        <?php
		if($type == "Address")
		{
			echo '<textarea name="change" cols="40" id="change"></textarea>';
		}
		else
		{
			echo '<input name="change" type="text" id="change" value="" size="40">';
		}
		?>
        </td>
      </tr>
    </table>
    &nbsp;
    <table width="100" align="center">
      <tr>
        <td align="right"><input name="Submit" type="submit" value="Proceed"></td>
        <td align="left" width="179"><input type="reset">
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
<?php include("footer.php"); ?>

</body></html>