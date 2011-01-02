<?php
session_start();
include("config.php");

$found = false;

$name = $_SESSION['name'];

$result = mysql_query("Select * From bb_users where display_name='$name'",$con);

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$name = $row["display_name"];
	$found = true;
}
?>

<p><b>Name</b> : <?php echo $row['display_name']; ?></p>
<p><b>Roll no.</b> : <?php echo $row['user_login']; ?></p>
<p><b>Date of Birth</b> : <?php echo $row['dob']; ?></p>
<p><b>Course</b> : <?php echo $row['course']; ?></p>
<p><b>Branch</b> : <?php echo $row['branch']; ?></p>
<p><b>Year</b> : <?php echo $row['year']; ?></p>
<p><b>Father's Name</b> : <?php echo $row['father_name']; ?></p>
<p><b>Address</b> : 
	<p><?php echo $row['address']; ?></p>
</p>
<p><b>Phone</b> : <?php echo $row['phone']; ?></p>
<p><b>Email</b> : <?php echo $row['user_email']; ?></p>