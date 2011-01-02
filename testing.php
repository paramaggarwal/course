<?php
session_start();
include("./includes/config.php");

$search = "Kumar";

$result = mysql_query("SELECT * FROM stu_rec WHERE MATCH (name,roll_no) AGAINST ('$search') ",$con);

echo mysql_num_rows($result);

if(mysql_num_rows($result)>0)
{
	echo mysql_num_rows($result);
	//echo mysql_num_rows($result);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	echo $row["roll_no"];
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	echo " " + $row["roll_no"];
	//echo $roll1 + " " + $roll2;
}
else {
	echo "Not Found!!";
}
?>