<?php bb_get_header(); ?>

<?php if ( $forums ) : ?>

<div id="discussions">

<?php if ( $topics || $super_stickies ) : ?>
<div class="container" id="latestupdates">
	<div class="title clickable visualIEFloatFix" id="latestupdates_title" onmousedown="animatedcollapse.toggle('latestupdates_content'); toggleDiv('latestupdates_content',2)">
		<P class="togglebutton">
			<A href="javascript:;" class="toggle" id="latestupdates_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
		<H2><?php _e('Latest Discussions'); ?></H2>
	</div>
	<div class="content" id="latestupdates_content" >
		<table id="latest" style="width:100%;">
			<tr>
				<th><?php _e('Topic'); ?></th>
				<th><?php _e('Posts'); ?></th>
				<th><?php _e('Last Poster'); ?></th>
				<th><?php _e('Freshness'); ?></th>
			</tr>

			<?php if ( $super_stickies ) : foreach ( $super_stickies as $topic ) : ?>
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
	</div>     
</div>
<?php endif; ?>



<div class="container" id="forums">
	<div class="title clickable visualIEFloatFix" id="forums_title" onmousedown="animatedcollapse.toggle('forums_content'); toggleDiv('forums_content',2)">
		<P class="togglebutton">
			<A href="javascript:;" class="toggle" id="forums_content_toggle"><IMG src="http://www.iiitcslcentral.co.cc/images/arrow_down_2.gif"></A></P>
		<H2><?php _e('Forums'); ?></H2>
	</div>
	<div class="content" id="forums_content" >
		<table id="forumlist" style="width:100%;">
		<tr>
			<th><?php _e('Main Theme'); ?></th>
			<th><?php _e('Topics'); ?></th>
			<th><?php _e('Posts'); ?></th>
		</tr>

		<?php foreach ( $forums as $forum ) : ?>
		<tr<?php alt_class('forum'); ?>>
			<td><a href="<?php forum_link(); ?>"><?php forum_name(); ?></a> &#8212; <?php forum_description(); ?></td>
			<td class="num"><?php forum_topics(); ?></td>
			<td class="num"><?php forum_posts(); ?></td>
		</tr>
		<?php endforeach; ?>
		</table>
	</div>     
</div>

<?php post_form(); endif; ?>
</div>

<?php bb_get_footer(); ?>