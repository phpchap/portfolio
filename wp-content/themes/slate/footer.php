	<div class="clear"></div>
	
	<div class="footer-widgets clearfix">
		<div class="footer-widgets-wrap clearfix">
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer') ) : else : ?>		
			<?php endif; ?>
		</div>		
	</div>
	
	<div class="clear"></div>

	<div class="footer">
		<div class="footer-text">
			<div class="footer-text-left">
		    	<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'nav-footer' ) ); ?>
		    </div>
		    
		    <div class="footer-text-right">
		    	<div class="copyright">&copy; <?php echo date("Y"); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> | <?php bloginfo('description'); ?></div>
		    </div>
		    <div class="clear"></div>
		</div>
	</div>
</div><!-- main wrapper -->

<?php wp_footer(); ?>

<!-- tracking code -->
<?php if (of_get_option('of_tracking_code') == true) { ?>
	<?php echo of_get_option('of_tracking_code', 'no entry' ); ?>
<?php } ?>

</body>
</html>