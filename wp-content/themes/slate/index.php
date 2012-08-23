<?php get_header(); global $more; ?>

			<div class="container">					
				<div class="page-title">
					<?php if(is_search()) { ?>
						<h2><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' '; wp_reset_query(); ?><?php _e('Search results for','okay'); ?> "<?php the_search_query() ?>" </h2>
					<?php } else if(is_tag()) { ?>
						<h2><?php _e('Tag','okay'); ?>: <?php single_tag_title(); ?></h2>
					<?php } else if(is_day()) { ?>
						<h2> <?php _e('Archive','okay'); ?>: <?php echo get_the_date(); ?></h2>
					<?php } else if(is_month()) { ?>
						<h2><?php _e('Archive','okay'); ?>: <?php echo get_the_date('F Y'); ?></h2>
					<?php } else if(is_year()) { ?>
						<h2><?php _e('Archive','okay'); ?>: <?php echo get_the_date('Y'); ?></h2>
					<?php } else if(is_404()) { ?>
						<h2><?php _e('404 - Page Not Found','okay'); ?></h2>
					<?php } else if(is_category()) { ?>
						<h2><?php _e('Category','okay'); ?>: <?php single_cat_title(); ?></h2>
					<?php } else if(is_author()) { ?>
						<h2><?php _e('Posts by Author','okay'); ?>: <?php the_author_posts(); ?> <?php _e('posts by','okay'); ?> <?php
						$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); echo $curauth->nickname; ?></h2>
					<?php } ?>
				</div>
				
				<div class="content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
					<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post clearfix'); ?>>
						<?php if ( has_post_thumbnail() ) { ?>
						<a class="blog-image" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a>
						<?php } ?>
						
						<div class="blog-text">	
							<div class="title-meta">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="clear"></div>
							
							<div class="blog-entry">
								<div class="blog-content">
									<?php if(is_search() || is_archive()) { ?>
										<?php the_excerpt(); ?>
									<?php } else { ?>
										<?php global $more; $more = 0; ?>
										<?php the_content( __('Read more &rarr;','okay') ); ?>
									<?php } ?>
									
									<?php if(is_single()) { ?>
										<div class="pagelink">
											<?php wp_link_pages(); ?>
										</div>
									<?php } ?>
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
									<a href="https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;"><?php _e('Google+','okay'); ?></a>
								</li>
							</ul>
						</div><!-- tags -->
					</div><!-- blog post -->
					
					<?php endwhile; ?>
				
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link( __('&larr; Older Entries','okay') ); ?></div>
						<div class="alignright"><?php previous_posts_link( __('Newer Entries &rarr;','okay') ); ?></div>
					</div>
					
					<?php endif; ?>
					
					<?php if(is_404()) { ?>
						<h4><?php _e('Sorry, but the page you are looking for is no longer here. Please use the navigations or the search to find what what you are looking for.','okay'); ?></h4>

						<?php include('searchform.php'); ?>
					<?php } ?>
					
				</div><!-- content -->
	
				<?php get_sidebar(); ?>
				<div class="clear"></div>
		</div><!-- container -->	

<?php get_footer(); ?>