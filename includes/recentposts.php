<?php

// Param trying out making a recent posts script for bbPress... Wish me Luck...

session_start();
include("config.php");

//Find the last post ID
$max_val = mysql_query("SELECT MAX(post_id) AS max_val FROM bb_posts",$con);
$row = mysql_fetch_array($max_val, MYSQL_BOTH);
$maximum = $row['max_val'];

//Loop for last 5 posts
for ($i = $maximum - 5; $i <= $maximum; $i++)
{
  if ( $i <= 0 )
  {
      continue;
  }
  else
  {
  //Get the post text and poster ID and topic ID
  $result = mysql_query("Select * From bb_posts where post_id='$i'",$con); 
  $row = mysql_fetch_array($result, MYSQL_BOTH);

  $post = $row['post_text'];
  $poster = $row['poster_id'];
  $topicid = $row['topic_id'];

  //Get the posters name
  $result2 = mysql_query("Select * From bb_users where ID='$poster'",$con); 
  $row2 = mysql_fetch_array($result2, MYSQL_BOTH);
  $user = $row2['user_login'];

  //Get the topics name
  $result3 = mysql_query("Select * From bb_topics where topic_id='$topicid'",$con); 
  $row3 = mysql_fetch_array($result3, MYSQL_BOTH);
  $topic = $row3['topic_title'];

  echo "<b><small>'" . $topic . "'</small></b> got a reply from <i>" . $user . "</i>:<p /><p /><small style='text-indent: 3em;'>" . $post . "</small>"; 
  }
}

?>					