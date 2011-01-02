<?php


/*
Access Levels-
Student - 1
Faculty - 2
Admin - 4
*/
session_start();
include("config.php");

function _hash_encode64($input, $count, &$itoa64)
{
	$output = '';
	$i = 0;

	do
	{
		$value = ord($input[$i++]);
		$output .= $itoa64[$value & 0x3f];

		if ($i < $count)
		{
			$value |= ord($input[$i]) << 8;
		}

		$output .= $itoa64[($value >> 6) & 0x3f];

		if ($i++ >= $count)
		{
			break;
		}

		if ($i < $count)
		{
			$value |= ord($input[$i]) << 16;
		}

		$output .= $itoa64[($value >> 12) & 0x3f];

		if ($i++ >= $count)
		{
			break;
		}

		$output .= $itoa64[($value >> 18) & 0x3f];
	}
	while ($i < $count);

	return $output;
}

function _hash_crypt_private($password, $setting, &$itoa64)
{
    $output = '*';

    // Check for correct hash
    if (substr($setting, 0, 3) != '$H$')
    {
        return $output;
    }

    $count_log2 = strpos($itoa64, $setting[3]);

    if ($count_log2 < 7 || $count_log2 > 30)
    {
        return $output;
    }

    $count = 1 << $count_log2;
    $salt = substr($setting, 4, 8);

    if (strlen($salt) != 8)
    {
        return $output;
    }

    /**
    * We're kind of forced to use MD5 here since it's the only
    * cryptographic primitive available in all versions of PHP
    * currently in use.  To implement our own low-level crypto
    * in PHP would result in much worse performance and
    * consequently in lower iteration counts and hashes that are
    * quicker to crack (by non-PHP code).
    */
    if (PHP_VERSION >= 5)
    {
        $hash = md5($salt . $password, true);
        do
        {
            $hash = md5($hash . $password, true);
        }
        while (--$count);
    }
    else
    {
        $hash = pack('H*', md5($salt . $password));
        do
        {
            $hash = pack('H*', md5($hash . $password));
        }
        while (--$count);
    }

    $output = substr($setting, 0, 12);
    $output .= _hash_encode64($hash, 16, $itoa64);

    return $output;
} 
function phpbb_check_hash($password, $hash)
{
    $itoa64 = './0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    if (strlen($hash) == 34)
    {
		//echo "inside!";
		//return false;
		$passauth = _hash_crypt_private($password, $hash, $itoa64);
		echo $passauth;
		return false;
        //return (_hash_crypt_private($password, $hash, $itoa64) === $hash) ? true : false;
    }
	
    return (md5($password) === $hash) ? true : false;
}

define('IN_PHPBB', true);

// use this, if it does work then specifiy your own path
// something like this $phpbb_root_path = './public/forum/';
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'http://iiitcslcentral.co.cc/chit-chat/';     

$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

// may be you don't need this line, but include it anyway
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();    
$auth->acl($user->data);

//$msg = "";

if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$result = mysql_query("Select * From phpbb_users where username='$username'",$con);
	
	if(mysql_num_rows($result)>0)
	{
		
		
		$row = mysql_fetch_array($result, MYSQL_BOTH);
		//$name = $row["name"];
		$roll = $row["username"];
		//echo $row['user_password'];
		$go = false;
		$go = phpbb_check_hash($password, $row['user_password']);
		//Add if necessary
		if($go)
		{
			/*
			$_SESSION['loginok'] = "ok";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = $row["user_type"];
			$_SESSION['name'] = $name;
			$_SESSION['roll'] = $roll;			
			*/
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