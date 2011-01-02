<?php bb_get_header(); ?>

<div class="container" id="forum">
	<div class="title clickable visualIEFloatFix" id="forum_title" onmousedown="animatedcollapse.toggle('forum_content'); toggleDiv('forums_content',2)">
		<P class="togglebutton">
		<A href="javascript:;" class="toggle" id="forum_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
		<h3 class="bbcrumb"><a href="<?php bb_option('uri'); ?>"><?php bb_option('name'); ?></a> &raquo; <?php forum_name(); ?></h3>
	</div>
	<div class="content" id="forum_content" >
		<?php if ( $topics || $stickies ) : ?>

<table id="latest" style="width:100%;">
<tr>
	<th><?php _e('Topic'); ?> &#8212; <?php new_topic(); ?></th>
	<th><?php _e('Posts'); ?></th>
	<th><?php _e('Last Poster'); ?></th>
	<th><?php _e('Freshness'); ?></th>
</tr>

<?php if ( $stickies ) : foreach ( $stickies as $topic ) : ?>
<tr<?php topic_class(); ?>>
	<td><?php _e('Sticky:'); ?> <big><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></big></td>
	<td class="num"><?php topic_posts(); ?></td>
	<td class="num"><?php topic_last_poster(); ?></td>
	<td class="num"><small><?php topic_time(); ?></small></td>
</tr>
<?php endforeach; endif; ?>

<?php if ( $topics ) : foreach ( $topics as $topic ) : ?>
<tr<?php topic_class(); ?>>
	<td><a href="<?php topic_link(); ?>"><?php topic_title(); ?></a></td>
	<td class="num"><?php topic_posts(); ?></td>
	<td class="num"><?php topic_last_poster(); ?></td>
	<td class="num"><small><?php topic_time(); ?></small></td>
</tr>
<?php endforeach; endif; ?>
</table>
<p><a href="<?php forum_rss_link(); ?>"><?php _e('RSS feed for this forum'); ?></a></p>
	</div>     
</div>

<div class="nav">
<?php forum_pages(); ?>
</div>
<?php endif; ?>
<?php post_form(); ?>

<?php bb_get_footer(); ?>
	