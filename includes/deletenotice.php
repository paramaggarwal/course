<?php

session_start();
include("config.php");

$ID = $_GET['ID'];

//if ( $_SESSION['loginok'] == 'ok' && $_SESSION['level'] == '2' ) {
	mysql_query("DELETE FROM notices WHERE ID = $ID ",$con);
	header("Location: http://www.iiitcslcentral.co.cc/");
//}
?>
