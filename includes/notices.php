<?php


session_start();

include("config.php");



//Find the last notice ID

$max_val = mysql_query("SELECT MAX(ID) AS max_val FROM notices",$con);

$row = mysql_fetch_array($max_val, MYSQL_BOTH);

$maximum = $row['max_val'];



//Loop for last 10 notices

for ($i = $maximum - 10; $i <= $maximum; $i++)

{

  if ( $i <= 0 )

  {

      continue;

  }

  else

  {

  //Get the notice text 

  $result = mysql_query("Select * From notices where ID='$i'",$con); 

  $row = mysql_fetch_array($result, MYSQL_BOTH);

  $notice = $row['notice_text'];

  if ( $notice == "" ) continue;  

  $timestamp = $row['timestamp'];

  echo "<ul>";//19800 is for IST +5:30
  echo "<li>" . $notice . " <small> posted on " . date("D jS M g:ia", strtotime($timestamp)+ 19800 ) . "</small>";

  if ( $_SESSION["level"] == 2 )
   {
   echo " - <a href='http://iiitcslcentral.co.cc/includes/deletenotice.php?ID=" . $i . "' ><small>Delete</small></a>";
   }
  echo "</li>";
  echo "</ul>"; 

  }

}



?>							