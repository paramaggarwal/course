<?php



// Param trying out making an Activities Script... Wish me Luck...



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
  
  if ( $activity == "" ) continue;

  echo "<ul  type='disc'>";
  echo "<li>" . $activity ;

   if ( $_SESSION["level"] == 2 )
   {
   echo " - <a href='http://iiitcslcentral.co.cc/includes/deleteactivity.php?ID=" . $i . "' ><small>Delete</small></a>";
   }

  echo "</li>";
  echo "</ul>"; 

  }

}



?>					