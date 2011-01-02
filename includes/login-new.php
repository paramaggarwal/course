<?php

session_start();

include("config.php");
require("http://www.iiitcslcentral.co.cc/chit-chat/bb-load.php");

if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

if(bb_check_login($username, $password, $already_md5 = false) == true)
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

?>