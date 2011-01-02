<?php
$localhost = "localhost"; 
$dbuser = "admin"; 
$dbpass = "admin"; 
$dbtable = "csl_db";

$site_url = "http://iiitcslcentral.co.cc"; 
$site_folder = "home.htm"; 
$sendersName = "CSL Central, IIIT Allahabad";
$sendersEmail = "admin@iiitcslcentral.co.cc"; 
$con = mysql_connect("$localhost","$dbuser","$dbpass")

        or die("Error Could not connect");

$db = mysql_select_db("$dbtable", $con)
		or die("Error Could not select database");
?>