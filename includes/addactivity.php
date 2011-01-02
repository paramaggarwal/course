<?php
session_start();
include("config.php");

if ( $_SESSION["level"] == '2')
{
$addactivity = $_POST['activityadd'];

mysql_query("INSERT INTO activities (activity_text) VALUES ('$addactivity')",$con);
header("Location: http://www.iiitcslcentral.co.cc/");
}
?>	 