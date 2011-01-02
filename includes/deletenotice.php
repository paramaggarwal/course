<?php
session_start();
include("config.php");

if ( $_SESSION["level"] == '2')
{
$ID = $_GET['ID'];

mysql_query("DELETE FROM notices WHERE ID = $ID ",$con);
header("Location: http://www.iiitcslcentral.co.cc/");

}
?>
