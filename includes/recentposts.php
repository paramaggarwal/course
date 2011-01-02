<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'http://iiitcslcentral.co.cc/chit-chat/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');

//
// Configuration
//
$forum_ids = array(2);        //Forum ID(s) to pull posts from, leave blank to pull from all forums
$num_posts = 10;        //Number of posts to display
$num_chars = 500;    //Number of characters to show in the post text

//
// Trim text to a certain length
//
function phpbb_trim_text(&$text, &$is_trimmed, $number)
{
    if ($number != 0 and strlen($text) > $number)
    {
        $text       = substr($text, 0, $number);
        $is_trimmed = true;
    }

    return true;
}

//
// Auth
//
$can_read_forum = $auth->acl_getf('f_read');    //Get the forums the user can read from
$forum_id_ary = array_keys($can_read_forum);    //Rework the array some
$authed_news_ary = array();

//Of the desired forums, pull out the authed ones
if(!sizeof($forum_ids))
{
    $authed_news_ary = $forum_id_ary;
}
else
{
    $authed_news_ary = array_intersect($forum_ids, $forum_id_ary);
}

unset($can_read_forum);

//
// Recent posts
//

if(sizeof($authed_news_ary))
{
    $sql = 'SELECT p.post_id, p.topic_id, p.post_subject, p.post_text, p.post_time, u.username
        FROM ' . POSTS_TABLE . ' p
            INNER JOIN ' . USERS_TABLE . ' u on (p.poster_id = u.user_id)
                WHERE p.post_approved = 1
                    AND ' . $db->sql_in_set('p.forum_id', $authed_news_ary) . '
                ORDER BY p.post_time DESC';

    $result = $db->sql_query_limit($sql, $num_posts);
    $row = $db->sql_fetchrowset($result);

    for($i = 0; $i < sizeof($row); $i++)
    {
        $post_url = append_sid("{$phpbb_root_path}viewtopic.$phpEx", 't=' . $row[$i]['topic_id'] . '&amp;p=' . $row[$i]['post_id'] . 'p' . $row[$i]['post_id']);

        //Prepare text (strip bbcodes and trim it)
        $row[$i]['post_trimmed'] = false;
        strip_bbcode($row[$i]['post_text']);
        phpbb_trim_text($row[$i]['post_text'], $row[$i]['post_trimmed'], $num_chars);

        $post_text = '';
        if ($row[$i]['post_trimmed'])
        {
            $post_text = $row[$i]['post_text'] . '...' . '<br /><br />[ <a href="' . $post_url . '">Read Full</a> ]';
        }
        else
        {
            $post_text = $row[$i]['post_text'];
        }

        echo '<table border="0" width="100%">
                <tr>
                    <td width="100%"><a href="' . $post_url . '">' . $row[$i]['post_subject'] . '</a></td>
                </tr>
                <tr>
                    <td width="100%">Posted: ' . $row[$i]['username'] . ' @ ' . $user->format_date($row[$i]['post_time']) . '</td>
                </tr>
                <tr>
                    <td width="100%">' . $post_text . '</td>
                </tr>
            </table><br />';
    }

    $db->sql_freeresult($result);
}
else
{
    echo 'No posts to display<br />';
}
?>