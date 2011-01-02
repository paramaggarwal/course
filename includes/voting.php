<?php

session_start();
include("config.php");

$user = $_SESSION['username'];
$team_msg = "";
echo $team_msg;

if(isset($_POST['teamsubmit'])) {
	
	$team = $_POST['team_name'];
	$members = $_POST['members'];
	if($team != "" && $members != "") {
		$result = mysql_query("INSERT INTO voting_teams(name,members) VALUES ('$team','$members')",$con);
		header("Location: http://iiitcslcentral.co.cc/");
	} else {
		$team_msg = "Null Value cannot be accepted. Please try again.";
	}
}

//Table: voting_teams

$result = mysql_query("Select * FROM voting_teams WHERE MATCH(members) AGAINST('$user' IN BOOLEAN MODE)",$con);

if (mysql_num_rows($result) > 0 || isset($_POST['teamsubmit'])) {
	//Team exists
	$result = mysql_query("SELECT * FROM voting_teams",$con);
	$row = mysql_fetch_array($result,MYSQL_BOTH);
        echo "Please select a team to vote.<br /><br />";
	while($row['name'] != "") {
		$id = $row['ID'];
		$res = mysql_query("SELECT * FROM voting_teams WHERE MATCH(voters) AGAINST('$user' IN BOOLEAN MODE) AND ID='$id' ",$con);
		if(mysql_num_rows($res) <= 0) {
			echo "Team: <a href='../vote.php?id=$id'>".$row['name']."</a><br /> - <small>".$row['members']."</small><br /><br />";
		}
		$row = mysql_fetch_array($result,MYSQL_BOTH);
	}
} else {
	echo "<form method='post' action=''>";
	echo "Team Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<input size=15 name='team_name' id='team_name' type='text' /><br /><br />";
	echo "Team members: ";
	echo "<input size=15 name='members' id='members' type='text' /><br />";
        echo "<br /><small>Enter the roll no.'s of the team members separated by a comma and space.<br />eg. 'iec2008001, iec2008002, iec2008003'</small>";
	echo "<br /><div align=right><input type='submit' name='teamsubmit' id='teamsubmit' value='Make Team' /></div></form>";
}

?>