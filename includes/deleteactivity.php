<?php
session_start();
include("config.php");
$ID = $_GET['ID'];

if ( $_SESSION["level"] == '2')
{


mysql_query("DELETE FROM activities WHERE ID = $ID ",$con);
header("Location: http://www.iiitcslcentral.co.cc/");

}
?>
