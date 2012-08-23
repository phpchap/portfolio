<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0
 *
 * This file is here for Backwards compatibility with old themes and will be removed in a future version
 *
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','okay'); ?></p>
	<?php
		return;
	}
?>

<div id="comments">

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php	printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ), number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;' ); ?></h3>

	<ol class="commentlist">
		<?php wp_list_comments("callback=okay_comment"); ?>
	</ol>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">
	<h3><?php comment_form_title( __('Leave a Reply','okay'), __('Leave a Reply to %s','okay' ) ); ?></h3>
	
	<div id="cancel-comment-reply">
		<small><?php cancel_comment_reply_link() ?></small>
	</div>
	
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() )); ?></p>
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
	<!-- If user is logged in -->
	<?php if ( is_user_logged_in() ) : ?>
	
	<p class="logged-in"><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.','okay'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','okay'); ?>"><?php _e('Log out &raquo;','okay'); ?></a></p>
	
	<!-- If user is not logged in -->
	<?php else : ?>
	
	<!-- Comment inputs -->
	<p><input class="form-author" type="text" name="author" id="author" onfocus="if (this.value == '<?php _e('Name (required)','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Name (required)','okay'); ?>';}" value="<?php _e('Name (required)','okay'); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>
	
	<p><input class="form-email" type="text" name="email" id="email" onfocus="if (this.value == '<?php _e('Email (required)','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Email (required)','okay'); ?>';}" value="<?php _e('Email (required)','okay'); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
	
	<p><input class="form-website" type="text" name="url" id="url" onfocus="if (this.value == '<?php _e('Website','okay'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Website','okay'); ?>';}" value="<?php _e('Website','okay'); ?>" size="22" tabindex="3" /></p>
	
	<?php endif; ?>
	
	<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea></p>
	
	<p><small class="allowed"><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>','okay'), allowed_tags()); ?></small></p>
	
	<p style="margin-bottom:0px;"><input name="submit" type="submit" class="button white" id="submit" tabindex="5" value="<?php _e('Submit Comment','okay'); ?>" />
	<?php comment_id_fields(); ?>
	</p>
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
	
	<?php paginate_comments_links(); ?>

</div>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
