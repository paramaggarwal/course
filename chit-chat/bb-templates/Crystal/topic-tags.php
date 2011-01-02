<div id="topic-tags" class="clearfix">
<?php if ( $user_tags ) : ?>
<h3><?php _e('Your tags:'); ?></h3>
<ul id="yourtaglist">
<?php foreach ( $user_tags as $tag ) : ?>
	<li id="tag-<?php echo $tag->tag_id; ?>_<?php echo $tag->user_id; ?>"><a href="<?php tag_link(); ?>" rel="tag"><?php tag_name(); ?></a> <?php tag_remove_link(); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ( $other_tags ) : ?>
<h3><?php _e('Tags:'); ?></h3>
<ul id="otherstaglist">
<?php foreach ( $other_tags as $tag ) : ?>
	<li id="tag-<?php echo $tag->tag_id; ?>_<?php echo $tag->user_id; ?>"><a href="<?php tag_link(); ?>" rel="tag"><?php tag_name(); ?></a> <?php tag_remove_link(); ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ( !$tags ) : ?>
<p><?php printf(__('No <a href="%s">tags</a> yet.'), get_tag_page_link() ); ?></p>
<?php endif; ?>
<?php tag_form(); ?>

</div>
