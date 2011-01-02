<?php
session_start();
include("config.php");

$result = mysql_query("SELECT * FROM voting_teams",$con);


if($_SESSION['level'] != 2) {
	echo "Unauthorised Access!!";
	exit();
}

if(mysql_num_rows($result)>0) {
$row = mysql_fetch_array($result, MYSQL_BOTH);
} else {
	echo "No Data!";
	exit();
}

while($row['name'] != "") {
	$name = $row['name'];
	$members = $row['members'];
	$totalvotes=$row['no_of_votes'];
	$score = $row['score'];
	$avg = $score/$totalvotes;
	if ($avg == "") $avg =0;

	echo "&bull; <b>$name - <font color=green>$avg</font></b><br /> - <small>$members</small><br /><br />";

	$row = mysql_fetch_array($result, MYSQL_BOTH);
}

?>