<?php
/*
Access Levels-
Student - 1
Faculty - 2
Admin - 4
*/

session_start();
include("http://www.iiitcslcentral.co.cc/v0.2/includes/config.php");

$msg = "";

if (isset($_POST['Submit']))
{
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$result = mysql_query("Select * From stu_rec where roll_no='$username'",$con);
	
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		$name = $row["name"];
		$roll = $row["roll_no"];
		//Add if necessary
		if($password == $row["password"])
		{
			
			$_SESSION['loginok'] = "ok";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = $row["user_level"];
			$_SESSION['name'] = $name;
			$_SESSION['roll'] = $roll;
			//$_SESSION['org'] = $org;
			//$_SESSION['add'] = $add;
			
			
			echo 1;

		}
		else
		{
			echo 0;;
		}
	}
	else
	{
		echo 0;
    }
}

?>