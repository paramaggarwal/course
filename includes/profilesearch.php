<?php

session_start();
include("config.php");

$rollno = "";

if (isset($_POST['rollno']))
{
	$roll = $_POST['rollno'];
	
	$result = mysql_query("Select * From bb_users where user_login='$roll'",$con);
	
	
	if(mysql_num_rows($result)>0)
	{
		echo $roll;
	}
	else
	{
		$result = mysql_query("SELECT * FROM bb_users WHERE MATCH (display_name,user_login) AGAINST ('$roll')" ,$con);
		
		if(mysql_num_rows($result)>0)
		{
			if(mysql_num_rows($result)>1) 
			{
				$arr = "";
				while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
					$arr .= '*'.$row['user_login'] . '*' . $row['display_name'];
				}
				$arr .= '*';
				echo $arr;
			}
			else 
			{
				$row = mysql_fetch_array($result, MYSQL_BOTH);
				$rollno = $row['user_login'];
				echo $rollno;
			}
		}
		else
		{
			$result = mysql_query("Select * From bb_users where display_name='$roll'",$con);
			
			if(mysql_num_rows($result)>0)
			{
				if(mysql_num_rows($result) > 1) 
				{
					
					$arr = "";
					while($row = mysql_fetch_array($result, MYSQL_BOTH)) {
						$arr .= '*'.$row['user_login'] . '*' . $row['display_name'];
					}
					$arr .= '*';
					echo $arr;
				}
				else 
				{
					$row = mysql_fetch_array($result, MYSQL_BOTH);
					$rollno = $row['user_login'];
					echo $rollno;
				}
			}
			else
			{
				echo 0;
			}
		}
	}
}
?>