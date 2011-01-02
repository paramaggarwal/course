<?php

// ** MySQL settings ** //
define('BBDB_NAME', 'fees0_2495505_csl');      // The name of the database
define('BBDB_USER', 'fees0_2495505');     // Your MySQL username
define('BBDB_PASSWORD', 'csliiit'); // ...and password
define('BBDB_HOST', 'sql206.0fees.net');    // 99% chance you won't need to change these last few

define('BBDB_CHARSET', 'utf8');      // If you are *upgrading*, and your old bb-config.php does
define('BBDB_COLLATE', '');          // not have these two contstants in them, DO NOT define them
                                     // If you are installing for the first time, leave them here

// Change BB_SECRET_KEY to a unique phrase.  You won't have to remember it later,
// so make it long and complicated.  You can visit https://www.grc.com/passwords.htm
// to get a phrase generated for you, or just make something up.
// If you are integrating logins with WordPress, you will need to match the value
// of the "SECRET_KEY" in the WordPress file wp-config.php
define('BB_SECRET_KEY', ''); // Change this to a unique phrase.

// If you are running multiple bbPress installations in a single database,
// you will probably want to change this.
$bb_table_prefix = 'bb_'; // Only letters, numbers and underscores please!

// Change this to localize bbPress.  A corresponding MO file for the
// chosen language must be installed to bb-includes/languages.
// For example, install de.mo to bb-includes/languages and set BB_LANG to 'de'
// to enable German language support.
define('BB_LANG', '');

/* Stop editing */

if ( !defined('BB_PATH') )
	define('BB_PATH', dirname(__FILE__) . '/' );
require_once( BB_PATH . 'bb-settings.php' );

?>