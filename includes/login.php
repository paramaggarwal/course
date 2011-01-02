<?php

/*

Access Levels-

Student - 1

Faculty - 2

Admin - 4

*/

session_start();

include("config.php");



$msg = "";



if (isset($_POST['username']) && isset($_POST['password']))

{

	$username = $_POST['username'];

	$password = md5($_POST['password']);

	

	$result = mysql_query("Select * From bb_users where user_login='$username'",$con);

	

	if(mysql_num_rows($result)>0)

	{

		$row = mysql_fetch_array($result, MYSQL_BOTH);

		$name = $row["display_name"];



		if($password == $row["user_pass"])

		{		

            $_SESSION['loginok'] = "ok";

			$_SESSION['username'] = $username;

			$_SESSION['password'] = $password;

			$_SESSION['level'] = $row["user_level"];

			$_SESSION['name'] = $name;	

			echo 1;



		}

		else

		{

			echo 0;

		}

	}

	else

	{

		echo 0;

    }

}



?>	