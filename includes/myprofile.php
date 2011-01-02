<?php

session_start();

include("config.php");



$found = false;



$name = $_SESSION['name'];
$roll = $_SESSION['username'];



$result = mysql_query("Select * From bb_users where user_login='$roll'",$con);



if(mysql_num_rows($result)>0)

{

	$row = mysql_fetch_array($result, MYSQL_BOTH);

	$name = $row["display_name"];

	$found = true;

}

?>



<p><b>Name</b> : <?php echo $row['display_name']; ?></p>

<p><b>Roll no.</b> : <?php echo $row['user_login']; ?></p>

<p><b>Course</b> : <?php echo $row['course']; ?></p>

<p><b>Branch</b> : <?php echo $row['branch']; ?></p>

<p><b>Year</b> : <?php echo $row['year']; ?></p>

<p><b>Phone</b> : <?php echo $row['phone']; ?></p>

<p><b>Email</b> : <?php echo $row['user_email']; ?></p>
<p class="error" align="right"><a href="profiles.php?rollno=<?php echo $roll; ?>&login=ok">View Full Profile</a></p>