<?php 
/* 
Template Name: Blog
*/ 
?>

<?php get_header(); global $more; ?>

				<div class="container">
						
						<div class="page-title">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

							<?php if ( get_post_meta($post->ID, 'subtitle', true) ) { ?>
								<h3><?php echo get_post_meta($post->ID, 'subtitle', true) ?></h3>
							<?php } ?>
						</div>
						
						<div class="content">
							
							<?php
							global $paged, $wp_query, $wp;
								if  ( empty($paged) ) {
									if ( !empty( $_GET['paged'] ) ) {
										$paged = $_GET['paged'];
									} elseif ( !empty($wp->matched_query) && $args = wp_parse_args($wp->matched_query) ) {
										if ( !empty( $args['paged'] ) ) {
											$paged = $args['paged'];
										}
									}
									if ( !empty($paged) )
										$wp_query->set('paged', $paged);
								}
							
							$temp = $wp_query;
							$wp_query= null;
							$wp_query = new WP_Query();
							$wp_query->query('paged='.$paged.'&cat='.of_get_option('of_blog_cat', 'no entry' ));
							?>
							
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
							<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post clearfix'); ?>>
								<?php if ( get_post_meta($post->ID, 'okvideo', true) ) { ?>
									<div class="okvideo">
										<?php echo get_post_meta($post->ID, 'okvideo', true) ?>
									</div>
								<?php } else { ?>
								
								<?php if ( has_post_thumbnail() ) { ?>
								<a class="blog-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a>
								<?php } ?>
								
								<?php } ?>
								
								<div class="blog-text">	
									<div class="title-meta">
										<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
									<div class="clear"></div>
									
									<div class="blog-entry">
										<div class="blog-content">
											<?php global $more; $more = 0; ?>
											<?php the_content(__('Read more &rarr;','okay')); ?>
										</div>
									</div><!-- blog entry -->
								</div><!-- blog text -->
								
								<!-- Show this on mobile site -->
								<div class="portfolio-meta meta-mobile">
									<ul class="portfolio-meta-links">
								    	<li><span class="meta-list"><span class="pictogram">e</span> <?php echo get_the_date('m/d/Y'); ?></span></li>
								    	<li><span class="meta-list"><span class="pictogram">f</span> <?php the_author_link(); ?></span></li>
								    	<li><span class="meta-list"><span class="pictogram">4</span> <span class="tag-wrap"><?php the_category(', ') ?></span></span></li>
								    	<?php the_tags('<li><span class="meta-list"><span class="pictogram">J</span><span class="tag-wrap">', ', ', '</span></span></li>'); ?>
								    </ul>
								</div><!-- alt blog meta -->
								
								<!-- Show this on full site -->
								<div class="blog-meta">
									<ul class="meta-links">
								    	<li><span class="meta-list"><span class="pictogram">e</span> <?php echo get_the_date('m/d/Y'); ?></span></li>
								    	<li><span class="meta-list"><span class="pictogram">f</span> <?php the_author_link(); ?></span></li>
								    	<li><span class="meta-list"><span class="pictogram">4</span> <span class="tag-wrap"><?php the_category(', ') ?></span></span></li>
								    	<?php the_tags('<li><span><span class="pictogram">J</span><span class="tag-wrap">', ', ', '</span></span></li>'); ?>
								    	<li><span class="meta-list"><span class="pictogram">b</span> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__('No Comments','okay'),__('1 Comment','okay'),__( '% Comments','okay') );?></a></span></li> 
								    </ul>
									<div class="clear"></div>
									<ul class="post-share">
										<li class="share-title"><?php _e('Share','okay'); ?></li>
										<li class="twitter">
											<a onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php the_title(); ?>" target="blank"><?php _e('Twitter','okay'); ?></a>
										</li>
										
										<li class="facebook">
											<a onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>"  target="blank"><?php _e('Facebook','okay'); ?></a>
										</li>
										
										<li class="googleplus">
											<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><?php _e('Google+','okay'); ?></a>
										</li>
									</ul>
								</div><!-- blog meta -->
							</div><!-- blog post -->
				
							<?php endwhile; ?>
						
							<div class="navigation">
						    	<div class="alignleft"><?php next_posts_link(__('&larr; Older Entries', 'okay')) ?></div>
						    	<div class="alignright"><?php previous_posts_link(__('Newer Entries &rarr;', 'okay')) ?></div>
							</div>
							
							<?php endif; ?>
							
						</div><!-- content -->

						<?php get_sidebar(); ?>
						<div class="clear"></div>
				</div><!-- container -->

<?php get_footer(); ?>