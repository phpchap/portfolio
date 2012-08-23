<?php
/*-----------------------------------------------------------------------------------*/
/* Twitter Widget
/*-----------------------------------------------------------------------------------*/

add_filter('option_ok_twitter_title', 'stripslashes');

add_action( 'widgets_init', 'load_ok_twitter_widget' );

function load_ok_twitter_widget() {
	register_widget( 'okTwitterWidget' );
}

class okTwitterWidget extends WP_Widget {
	function okTwitterWidget() {
	$widget_ops = array( 'classname' => 'ok-twitter', 'description' => __('Grab your latest tweets', 'ok-twitter') );
	$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'ok-twitter' );
	$this->WP_Widget( 'ok-twitter', __('Okay Twitter Widget', 'ok-twitter'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );
		$twitter_title = esc_attr( $instance['twitter_title'] );
		$screen_name = esc_attr( $instance['screen_name'] );
		$num_tweets = esc_attr( $instance['num_tweets'] );
		echo $before_widget;
?>
			
		<!-- Overwrite the Twitter badge style -->	
		<style type="text/css">
			.twtr-widget {
				font-family: Georgia, serif!important;
			
			}
			.twtr-tweet-text p {
				line-height: 22px !important;
				font-size: 13px !important;
			}
			.twtr-ft {
				display: none;
			}
			.twtr-widget .twtr-tweet {
				margin-bottom: 10px;
				padding-bottom: 10px;
			}
			.twtr-hd {
				display: none;
			}
			.twtr-tweet-wrap {
				padding: 0 0 0 0 !important;
			}
			.twtr-tweet-text em a, .twtr-timestamp {
			}
			.twtr-widget .twtr-tweet:last-child {
				margin-bottom: 0;
				padding-bottom: 0;
			}
			.twtr-tweet a:hover {
				text-decoration: none !important;
				border-bottom: dotted 1px #ccc;
			}
			.twtr-user {
				display: none;
			}
		</style>
		
		<?php if ( $instance['twitter_title'] ) echo '<h2>' . $instance['twitter_title'] . '</h2>'; ?>
		
		<!-- Show Twitter Badge -->	
		
		<script type="text/javascript">
		new TWTR.Widget({
		  version: 2,
		  type: 'profile',
		  rpp: <?php echo $instance['num_tweets']; ?>,
		  interval: 6000,
		  width: 'auto',
		  height: 'auto',
		  theme: {
		    shell: {
		      background: 'transparent',
		      color: 'inherit'
		    },
		    tweets: {
		      background: 'transparent',
		      color: 'inherit',
		      links: '<?php echo of_get_option('of_colorpicker', 'no entry' ); ?>'
		    }
		  },
		  features: {
		    scrollbar: false,
		    loop: false,
		    live: false,
		    hashtags: true,
		    timestamp: true,
		    avatars: false,
		    behavior: 'all'
		  }
		}).render().setUser('<?php echo $instance['screen_name']; ?>').start();
		</script>
			

<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['twitter_title'] = $new_instance['twitter_title'];
		$instance['screen_name'] = $new_instance['screen_name'];
		$instance['num_tweets'] = $new_instance['num_tweets'];		
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'twitter_title' => '', 'screen_name' => '', 'num_tweets' => '') );
		$instance['twitter_title'] = $instance['twitter_title'];
		$instance['screen_name'] = $instance['screen_name'];
		$instance['num_tweets'] = $instance['num_tweets'];
?>
			
			<p>
				<label for="<?php echo $this->get_field_id('twitter_title'); ?>">Title: 
					<input class="widefat" id="<?php echo $this->get_field_id('twitter_title'); ?>" name="<?php echo $this->get_field_name('twitter_title'); ?>" type="text" value="<?php echo $instance['twitter_title']; ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('screen_name'); ?>">Username: 
					<input class="widefat" id="<?php echo $this->get_field_id('screen_name'); ?>" name="<?php echo $this->get_field_name('screen_name'); ?>" type="text" value="<?php echo $instance['screen_name']; ?>" />
				</label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('num_tweets'); ?>">Tweet count: 
					<input class="widefat" id="<?php echo $this->get_field_id('num_tweets'); ?>" name="<?php echo $this->get_field_name('num_tweets'); ?>" type="text" value="<?php echo $instance['num_tweets']; ?>" />
				</label>
			</p>
              
  <?php
	}
}