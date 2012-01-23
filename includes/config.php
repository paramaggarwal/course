<?php
$localhost = "24750a16.dotcloud.com:8974"; 
$dbuser = "root"; 
$dbpass = "ZZ9lfaeFXksgsewl56RK"; 
$dbtable = "mysql";

$site_url = "http://cms.paramaggarwal.com"; 
$site_folder = "index.php"; 
$sendersName = "CSL Central, IIIT Allahabad";
$sendersEmail = "paramaggarwal@gmail.com"; 
$con = mysql_connect("$localhost","$dbuser","$dbpass")

        or die("Error Could not connect");

$db = mysql_select_db("$dbtable", $con)
		or die("Error Could not select database");
?>