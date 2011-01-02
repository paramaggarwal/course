<?php bb_get_header(); ?>

<h3><a href="<?php option('uri'); ?>"><?php option('name'); ?></a> &raquo; <?php _e('Login'); ?></h3>

<h2><?php _e('Please Login'); ?></h2>


<form method="post" action="<?php option('uri'); ?>bb-login.php" class="postform">
<table width="50%">
<?php if ( $user_exists) : ?>
	<tr valign="top">
		<th scope="row"><?php _e('Username:'); ?></th>
		<td><input name="user_login" type="text" value="<?php echo $user_login; ?>" /></td>
	</tr>
	<tr valign="top" class="error">
		<th scope="row"><?php _e('Password:'); ?></th>
		<td><input name="password" type="password" /><br />
		<?php _e('Incorrect password'); ?></td>
	</tr>
<?php else : ?>
	<tr valign="top" class="error">
		<th scope="row"><?php _e('Username:'); ?></th>
		<td><input name="user_login" type="text" value="<?php echo $user_login; ?>" /><br />
		This username does not exist. <a href="<?php option('uri'); ?>register.php?user=<?php echo $user_login; ?>">Register it?</a></td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e('Password:'); ?></th>
		<td><input name="password" type="password" /></td>
	</tr>
<?php endif; ?>
	<tr>
		<td></br><input name="re" type="hidden" value="<?php echo $re; ?>" />
		<input type="submit" value="<?php _e('Login'); ?> &raquo;" /></td>
	</tr>
</table>
</form>

<?php if ( $user_exists ) : ?>
<br style="clear: both;" />
<form method="post" action="<?php option('uri'); ?>bb-reset-password.php" class="postform">
<p><?php _e('If you would like to recover the password for this account, you may use the following button to start the recovery process:'); ?><br />
<input name="user_login" type="hidden" value="<?php echo $user_login; ?>" />
<input type="submit" value="<?php _e('Recover Password'); ?> &raquo;" /></p>
</form>
<?php endif; ?>
<br style="clear: both;" />

<?php bb_get_footer(); ?>