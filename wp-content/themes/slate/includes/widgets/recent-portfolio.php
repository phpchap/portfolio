<?php

/**
 * Recent Portfolio Widget Class
 */
class okay_recent_portfolio extends WP_Widget {


    /** constructor */
    function okay_recent_portfolio() {
        parent::WP_Widget(false, $name = 'Okay Sidebar Portfolio Widget');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
        extract( $args );
		global $posttypes;
        $title 			= apply_filters('widget_title', $instance['title']);
        $number 		= apply_filters('widget_title', $instance['number']);
        ?>
		
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
					
		<div id="portfolio-sidebar" class="portfolio-sidebar flexslider">
			
			<ul class="slides">
            	<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
            	<?php query_posts('showposts='.$number.'&cat='.$portfoliocat); ?>
            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                    <li>
                    	<!--Fade-->
                    	<div class="mosaic-block mosiac-block-sidebar fade">
                    		<a href="<?php the_permalink(); ?>" class="mosaic-overlay">
                    			<object class="details">
                    				<?php global $post; if ( get_post_meta($post->ID, 'okvideo', true) ) { ?>     
                    					<div class="pictogram">P</div>
                    				<?php } else { ?>
                    					<div class="pictogram">A</div>
                    				<?php } ?>
                    				
                    				<h4><?php the_title(); ?></h4>
                    				<p>
                    					<?php
                    						$categories = get_the_category(); 
                    						$temp = array();
                    						foreach($categories as $category) {
                    							if ($category->category_parent == 0) continue;
                    							$temp[] = str_replace('-', '', $category->name); 
                    						} 
                    						echo implode(", ", $temp);
                    					?>
                    				</p>
                    			</object>
                    		</a>
                    		<div class="mosaic-backdrop"><?php the_post_thumbnail( 'sidebar-image' ); ?></div>
                    	</div>
					</li>

				<?php endwhile; ?>
				<?php endif; ?>
            </ul>
		</div>			
					
					
		<?php echo $after_widget; ?>
        
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {		
		global $posttypes;
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {	

		$posttypes = get_post_types('', 'objects');
	
        $title = esc_attr($instance['title']);
        $cat = esc_attr($instance['cat']);
        $number = esc_attr($instance['number']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'okay'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number to Show:', 'okay'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
        <?php 
    }


} // class utopian_recent_portfolio
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("okay_recent_portfolio");'));

?>