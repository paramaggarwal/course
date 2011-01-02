<?php

session_start();
include("config.php");

//Find the last post ID
$max_val = mysql_query("SELECT MAX(post_id) AS max_val FROM bb_posts",$con);
$row = mysql_fetch_array($max_val, MYSQL_BOTH);
$maximum = $row['max_val'];

//Loop for last 6 posts
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
  $posterid = $row['poster_id'];
  $topicid = $row['topic_id'];

  $time = $row['post_time'];
  $diff = time() - strtotime($time);
  $days = date("j", $diff );
  $hours = date("G", $diff );
  
  if ($days == '0')
  {
  $when = " yesterday " . $hours . " hours ago,";
  }
  elseif ($days == '1')
  {
  $when = " day before yesterday,";
  }
  else
  {
  $when = $days . " days ago,";
  }

  //Get the posters name
  $result2 = mysql_query("Select * From bb_users where ID='$posterid'",$con); 
  $row2 = mysql_fetch_array($result2, MYSQL_BOTH);
  $user_name = $row2['user_login'];
  
  //Get the topics name
  $result3 = mysql_query("Select * From bb_topics where topic_id='$topicid'",$con); 
  $row3 = mysql_fetch_array($result3, MYSQL_BOTH);
  $topic = $row3['topic_title'];
  
  $user_out = "<a href='http://iiitcslcentral.co.cc/chit-chat/profile.php?id=" . $posterid . "' ><i>" . $user_name . "</i></a> ";
  $topic_out = "<a href='http://iiitcslcentral.co.cc/chit-chat/topic.php?id=" . $topicid . "' ><small>'" . $topic . "'</small></a>";
  $post_out = "<p /><p /><small style='text-indent: 3em;'>" . $post . "</small>";

  $out = $topic_out . " got a reply from " . $user_out . $when . $post_out;

  echo $out;
  }
}

?>									