<form class="updates" method="post" action="<?php bb_option('uri'); ?>bb-login.php">
<p>
	<label><?php _e('Username:'); ?>
		<input name="user_login" type="text" id="user_login" size="13" maxlength="40" value="<?php echo wp_specialchars($_COOKIE[ bb_get_option( 'usercookie' ) ], 1); ?>" />
  </label>
	<label><?php _e('Password:'); ?>&nbsp;
		<input name="password" type="password" id="password" size="13" maxlength="40" />
	</label>
	<input name="re" type="hidden" value="<?php global $re; echo $re; ?>" />&nbsp;
	<input type="submit" name="Submit" id="submit" value="<?php _e('Log in'); ?>" />
	<?php printf(__('<a href="%1$s">Register</a>'), bb_get_option('uri').'register.php') ?>
</p>
</form>
