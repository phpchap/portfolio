<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head> 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	
	<title>
	<?php
		global $page, $paged;

		wp_title( '|', true, 'right' );

		bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?>
	</title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<!-- Media Queries -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/media-queries.css" />
	<meta name ="viewport" content ="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/includes/ie/ie.css" />
	<![endif]-->
	
	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css' />

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
	
	<!-- conditional css -->
	<style type="text/css">
		a {
			color:<?php echo of_get_option('of_colorpicker', 'no entry' ); ?>;
		}
		
		<?php if ( of_get_option('of_theme_css') ) { ?>
			<?php echo of_get_option('of_theme_css'); ?>
		<?php } ?>
	</style>
	
	<?php if ( of_get_option('of_bg_color') == 'dark' ) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style-dark.css" />
		
		<!-- Load dark styles dynamically on smaller devices -->
		<style type="text/css">
			@media screen and (min-width:751px) and (max-width:970px) {
				#nav {
					border-top: solid 1px #666;
				}
				.post-nav {
					border-top: solid 1px #666;
					border-bottom: solid 1px #666;
				}
				.box-portfolio li li {
					border: solid 13px #444;
				}
				.box-portfolio li li:hover {
					border: solid 13px #fff;
				}
				#sidebar {
					background: #505050;
				}
			}
			
			@media only screen and (max-width:750px) {
				.blog-post .portfolio-meta, .post-share {
					background: #505050;
				}
				#sidebar {
					background: #505050;
				}
				.post-nav {
					border-top: solid 1px #666;
					border-bottom: solid 1px #666;
				}
				#sidebar .flexslider {
					background: #505050 !important;
				}
			}
		</style>
	<?php } ?>

</head>

<body <?php body_class( $class ); ?>>
	<!--Main Wrapper -->
	<div class="main-wrapper">
		<div class="header-wrapper">
			<div class="header-hidden-wrap">
				<div class="header-hidden-toggle-wrap">
					<div class="header-hidden clearfix">
						<div class="header-hidden-left">
							<?php if ( of_get_option('of_hidden_header_text') ) { ?>
								<?php echo of_get_option('of_hidden_header_text'); ?>
							<?php } ?>
						</div>
						<div class="header-hidden-right">
							<div class="social-icons">
								<?php if ( of_get_option('twitter_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('twitter_icon'); ?>" title="twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" alt="twitter" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('google_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('google_icon'); ?>" title="google"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-google.png" alt="google" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('dribbble_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('dribbble_icon'); ?>" title="dribbble"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-dribbble.png" alt="dribbble" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('facebook_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('facebook_icon'); ?>" title="facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" alt="facebook" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('vimeo_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('vimeo_icon'); ?>" title="vimeo"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-vimeo.png" alt="vimeo" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('tumblr_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('tumblr_icon'); ?>" title="tumblr"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tumblr.png" alt="tumblr" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('linkedin_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('linkedin_icon'); ?>" title="linkedin"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-linkedin.png" alt="linkedin" /></a>
								<?php } ?>
								
								<?php if ( of_get_option('flickr_icon') ) { ?>
									<a target="blank" href="<?php echo of_get_option('flickr_icon'); ?>" title="flickr"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-flickr.png" alt="flickr" /></a>
								<?php } ?>
							</div>
						</div>
						
					</div><!-- header hidden -->
					<a href="#" class="hidden-toggle"><span></span></a>
				</div><!-- header hidden toggle wrap -->
			</div><!-- header hidden wrap -->
			
			<div class="header">
				<div class="header-left">
					<!-- Grab the logo if uploaded -->
					<?php if ( of_get_option('of_logo') ) { ?>
						<h1>
							<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo of_get_option('of_logo'); ?>" alt="<?php the_title(); ?>" /></a>
						</h1>
					<!-- Otherwise show the site title and description -->	
					<?php } else { ?>
					    <h1 class="logo-text">
					    	<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name') ?></a>
					    </h1>
					<?php } ?>
				</div>
				
				<!-- Menu -->
				<div class="header-right">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'nav', 'menu_class' => 'nav-top' ) ); ?>
					
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</div><!-- header -->
		</div><!-- header wrapper -->