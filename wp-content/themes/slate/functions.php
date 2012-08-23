<?php

//-----------------------------------  // Load Scripts //-----------------------------------//

//Include Scripts
add_action('init', 'ok_theme_js');
function ok_theme_js() {
	if (is_admin()) return;
	
	//Register jQuery
	wp_enqueue_script('jquery');
	
	//Custom JS
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/includes/js/custom/custom.js', false, false , true);
    
    //Flex
    wp_enqueue_script('flex_js', get_template_directory_uri() . '/includes/js/flex/jquery.flexslider.js', false, false , true);
    
    //Tabs
    wp_enqueue_script('tabs_js', get_template_directory_uri() . '/includes/js/tabs/jquery.tabs.min.js', false, false , true);
    
    //Sliding Boxes
    wp_enqueue_script('mosiac_js', get_template_directory_uri() . '/includes/js/mosiac/mosaic.1.0.1.js', false, false , true);
    
    //Fitvid
    wp_enqueue_script('fitvid_js', get_template_directory_uri() . '/includes/js/fitvid/jquery.fitvids.js', false, false , true);
    
   	//Mobile Menu
	wp_enqueue_script('mobile_js', get_template_directory_uri() . '/includes/js/menu/jquery.mobilemenu.js', false, false , true);
    
    //Twitter
	wp_enqueue_script('twitter', 'http://widgets.twimg.com/j/2/widget.js', false, false);
	
	//Add Flexslider Styles
	wp_enqueue_style( 'flex-slider', get_template_directory_uri() . '/includes/js/flex/flexslider.css', array(), '0.1', 'screen' );
    
}

//-----------------------------------  // Auto Feed Links //-----------------------------------//

add_theme_support( 'automatic-feed-links' );


//-----------------------------------  // Custom Excerpt Length //-----------------------------------//

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


//-----------------------------------  // Load Widgets //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/widgets/recent-widgets.php");
require_once(dirname(__FILE__) . "/includes/widgets/text-column.php");
require_once(dirname(__FILE__) . "/includes/widgets/recent-portfolio.php");
require_once(dirname(__FILE__) . "/includes/widgets/twitter.php");


//-----------------------------------  // Editor Styles //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/editor/add-styles.php");


//-----------------------------------  // Shortcodes //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/shortcodes/friendly-shortcode-buttons.php");


//-----------------------------------  // Add Menus //-----------------------------------//

add_theme_support( 'menus' );
register_nav_menu('header', 'Header Menu');
register_nav_menu('footer', 'Footer Menu');
register_nav_menu('custom', 'Custom Menu');


//-----------------------------------  // Featured Image Sizes //-----------------------------------//

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 150, 150, true ); // Default Thumb
add_image_size( 'large-image', 660, 9999, true ); // Large Post Image
add_image_size( 'portfolio-image', 296, 175, true ); // Large Post Image
add_image_size( 'full-image', 940, 9999, false ); // Large Post Image
add_image_size( 'sidebar-image', 225, 150, true ); // Sidebar Image
add_image_size( 'sidebar-recent-image', 30, 30, true ); // Sidebar Recent Post Image
add_image_size( 'blog-image', 670, 257, true ); // Blog Image
add_image_size( 'blog-thumb', 180, 100, true ); // Blog Thumb
		
		
//-----------------------------------  // Add Localization //-----------------------------------//

load_theme_textdomain( 'okay', TEMPLATEPATH . '/includes/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/includes/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );		


//-----------------------------------  // Popular Posts Widget //-----------------------------------//

$popular_posts = $wpdb->get_results("SELECT id,post_title FROM {$wpdb->prefix}posts ORDER BY comment_count DESC LIMIT 0,5");
foreach($popular_posts as $post) {
	// Do something with the $post variable
}

// Adding Background Support
add_custom_background();

// Custom comment output
function okay_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
		
		<div class="comment-block" id="comment-<?php comment_ID(); ?>">
			<div class="comment-info">
				<div class="comment-author vcard clearfix">
					<?php echo get_avatar( $comment->comment_author_email, 35 ); ?>
					
					<div class="comment-meta commentmetadata">
						<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
						<div class="clear"></div>
						<a class="comment-time" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'okay'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','okay'),'  ','') ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			
			<div class="comment-text">
				<?php comment_text() ?>
				<p class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</p>
			</div>
		
			<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','okay') ?></em>
			<?php endif; ?>    
		</div>
				
		<div class="clear"></div>
<?php
}


//-----------------------------------  // Register Widget Areas //-----------------------------------//

if ( function_exists('register_sidebars') )

register_sidebar(array(
'name' => __('Services Text Columns', 'scribe'),
'description' => __('This section is for the Services section on the homepage', 'scribe'),
'before_widget' => '<div class="column">',
'after_widget' => '</div>'
));

register_sidebar(array(
'name' => __('Testimonials', 'scribe'),
'description' => __('Widgets in this area will be shown on the left side of the note area on the Homepage.', 'scribe'),
'before_widget' => '<li>',
'after_widget' => '</li>'
));

register_sidebar(array(
'name' => __('Sidebar', 'scribe'),
'description' => __('Widgets in this area will be shown on the sidebar of all pages.', 'scribe'),
'before_widget' => '<div class="widget">',
'after_widget' => '</div>',
'before_title'  => '<h2>',
	'after_title'   => '</h2>'
));

register_sidebar(array(
'name' => __('Footer', 'scribe'),
'description' => __('Widgets in this area will be shown own on the left side of the footer of all pages.', 'scribe'),
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>'
));



//-----------------------------------  // Options Framework - Only wizards allowed beyond this point //-----------------------------------//

okay_options_check();
function okay_options_check()
{
  if ( !function_exists('optionsframework_activation_hook') )
  {
    add_thickbox(); // Required for the plugin install dialog.
    add_action('admin_notices', 'okay_options_check_notice');
  }
}


//-----------------------------------  // Add Notice To Install Options Framework //-----------------------------------//

function okay_options_check_notice()
{
?>
  <div class='updated fade'>
    <p>The Options Framework plugin is required for this theme to function properly. <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=options-framework&TB_iframe=true&width=640&height=589'); ?>" class="thickbox onclick">Install now</a>.</p>
  </div>
<?php
}

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

//-----------------------------------  // Allow Code in Textarea //-----------------------------------//

add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}



//-----------------------------------  // Add Support Tab To Theme Options //-----------------------------------//

require_once(dirname(__FILE__) . "/includes/support/support.php");