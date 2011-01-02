<?php
$localhost = "sql206.0fees.net"; 
$dbuser = "fees0_2495505"; 
$dbpass = "csliiit"; 
$dbtable = "fees0_2495505_csl";

$site_url = "http://iiitcslcentral.co.cc"; 
$site_folder = "index.php"; 
$sendersName = "CSL Central, IIIT Allahabad";
$sendersEmail = "pranjaltech@gmail.com"; 
$con = mysql_connect("$localhost","$dbuser","$dbpass")

        or die("Error Could not connect");

$db = mysql_select_db("$dbtable", $con)
		or die("Error Could not select database");
?>