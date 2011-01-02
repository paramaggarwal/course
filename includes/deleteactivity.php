<?php
session_start();
include("config.php");

if ( $_SESSION["level"] == '2')
{
$ID = $_GET['ID'];

mysql_query("DELETE FROM activities WHERE ID = $ID ",$con);
header("Location: http://www.iiitcslcentral.co.cc/");

}
?>
