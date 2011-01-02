<?php

// Param trying out making a recent posts script for bbPress... Wish me Luck...

session_start();
include("config.php");

//Find the last activity ID
$max_val = mysql_query("SELECT MAX(ID) AS max_val FROM activities",$con);
$row = mysql_fetch_array($max_val, MYSQL_BOTH);
$maximum = $row['max_val'];

//Loop for last 10 activities
for ($i = $maximum - 10; $i <= $maximum; $i++)
{
  if ( $i <= 0 )
  {
      continue;
  }
  else
  {
  //Get the activity text 
  $result = mysql_query("Select * From activities where ID='$i'",$con); 
  $row = mysql_fetch_array($result, MYSQL_BOTH);
  $activity = $row['activity_text'];

  echo "<p style='text-indent: 1em;'>&rArr; " . $activity . "</p>"; 
  }
}

?>					