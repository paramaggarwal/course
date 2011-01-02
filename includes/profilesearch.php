<?php
session_start();
include("config.php");

$rollno = "";

if (isset($_POST['rollno']))
{
	$roll = $_POST['rollno'];
	
	$result = mysql_query("Select * From stu_rec where roll_no='$roll'",$con);
	
	if(mysql_num_rows($result)>0)
	{
		echo $roll;
	}
	else
	{
		$result = mysql_query("Select * From stu_rec where name='$roll'",$con);
		
		if(mysql_num_rows($result)>0)
		{
			if(mysql_num_rows($result)>1) 
			{
				echo 0;
			}
			else 
			{
				$row = mysql_fetch_array($result, MYSQL_BOTH);
				$rollno = $row['roll_no'];
				echo $rollno;
			}
		}
		else
		{
			$result = mysql_query("SELECT * FROM stu_rec WHERE MATCH (name,roll_no) AGAINST ('$roll')" ,$con);
			if(mysql_num_rows($result)>0)
			{
				$row = mysql_fetch_array($result, MYSQL_BOTH);
				$rollno = $row['roll_no'];
				if(mysql_num_rows($result) > 1) 
				{
					echo 0;
				}
				else 
				{
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