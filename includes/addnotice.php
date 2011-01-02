<?php
session_start();
include("config.php");

if ( $_SESSION["level"] == '2')
{
$addnotice = $_POST['noticeadd'];

mysql_query("INSERT INTO notices (notice_text) VALUES ('$addnotice')",$con);
header("Location: http://www.iiitcslcentral.co.cc/");
}
?>	 