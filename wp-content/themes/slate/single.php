<?php get_header(); global $more; ?>

			<!-- If it's the single portfolio page, show this -->
			<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
			
			<?php if(in_category($portfoliocat)) { ?>
			
			<div class="container">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="page-title page-title-portfolio">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php if ( get_post_meta($post->ID, 'subtitle', true) ) { ?>
						<h3><?php echo get_post_meta($post->ID, 'subtitle', true) ?></h3>
					<?php } ?>
					
					<div class="post-nav clearfix">
						<span class="prev-span"><?php previous_post_link('%link', '<span class="next">%title</span>', TRUE); ?></span> 
						<span class="next-span"><?php next_post_link('%link', '<span class="previous">%title</span>', TRUE); ?> </span>
					</div>
				</div>
				
				<?php if ( get_post_meta($post->ID, 'okvideo', true) ) { ?>
					<div class="okvideo">
						<?php echo get_post_meta($post->ID, 'okvideo', true) ?>
					</div>
				<?php } else { ?>
				
				<?php 
				//find images in the content with "wp-image-{n}" in the class name
				preg_match_all('/<img[^>]?class=["|\'][^"]*wp-image-([0-9]*)[^"]*["|\'][^>]*>/i', get_the_content(), $result);  
				//echo '<pre>' . htmlspecialchars( print_r($result, true) ) .'</pre>';
				$exclude_imgs = $result[1];
				
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order ID',
					'post_type'      => 'attachment',
					'post_parent'    => $post->ID,
					'exclude'		 => $exclude_imgs, // <--
					'post_mime_type' => 'image',
					'post_status'    => null,
					'numberposts'    => -1,
				);
				
				$attachments = get_posts($args);
				if ($attachments) {
				
				echo "<div class='gallery-wrap'><div class='flexslider'><ul class='slides'>";
					foreach ($attachments as $attachment) {
						echo "<li>";
						echo wp_get_attachment_image($attachment->ID, 'full-image', false, false);
						echo "</li>";
					}
				echo "</ul></div></div>"; 
				
				if(count($attachments) > 1) {
				?>
				
				<div class="gallery-nav" style="display: none;">
					<a class="next2" href="#" title="next"></a>
					<a class="prev2" href="#" title="prev"></a>
				</div>
				
				<?php } } ?>
				
				<?php } ?>
				
				<div class="content content-tablet">	
					<div class="blog-entry">
						<div class="blog-content">
							<?php the_content(''); ?>
						</div><!-- blog content -->
					</div><!-- blog entry -->
				</div><!-- content -->
				
				<div class="portfolio-sidebar">
					<div class="portfolio-meta">
						<h3><?php _e('Project Details','okay'); ?></h3>
						<ul class="portfolio-meta-links">
					    	<li><span><div class="pictogram">e</div> <?php echo get_the_date('m/d/Y'); ?></span></li>
					    	<li><span><div class="pictogram">f</div> <?php the_author_link(); ?></span></li>
					    	<li><span><div class="pictogram">4</div> <div class="tag-wrap"><?php the_category(', ') ?></div></span></li>
					    	<?php the_tags('<li><span><div class="pictogram">J</div><div class="tag-wrap">', ', ', '</div></span></li>'); ?>
					    </ul>
					</div><!-- portfolio meta -->
				</div><!-- sidebar -->
				
				<div class="clear"></div>
				
				<?php endwhile; ?>
				<?php endif; ?>
			</div><!-- container -->
			
			<!-- Otherwise, show this -->
			<?php } else { ?>
			
			<div class="container">					
				<div class="page-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
					<?php if ( get_post_meta($post->ID, 'subtitle', true) ) { ?>
						<h3><?php echo get_post_meta($post->ID, 'subtitle', true) ?></h3>
					<?php } ?>
				</div>
				
				<div class="content">
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
							<div class="blog-entry">
								<div class="blog-content">
									<?php the_content(); ?>
								</div>
								
								<?php if(is_single()) { ?>
									<div class="pagelink">
										<?php wp_link_pages(); ?>
									</div>
								<?php } ?>
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
									<a onclick="window.open('http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>','twitter','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="<?php the_title(); ?>" target="blank">Twitter</a>
								</li>
								
								<li class="facebook">
									<a onclick="window.open('http://www.facebook.com/share.php?u=<?php the_permalink(); ?>','facebook','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>"  target="blank">Facebook</a>
								</li>
								
								<li class="googleplus">
									<a href="https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>" onclick="window.open('https://m.google.com/app/plus/x/?v=compose&amp;content=<?php the_title(); ?> - <?php the_permalink(); ?>','gplusshare','width=450,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;">Google+</a>
								</li>
							</ul>
						</div><!-- tags -->
					</div><!-- blog post -->
					
					<?php endwhile; ?>
				
					<div class="blog-navigation clearfix">
						<div class="alignleft"><?php next_post_link('%link', '%title', TRUE); ?></div>
						<div class="alignright"><?php previous_post_link('%link', '%title', TRUE); ?></div>
					</div>
					
					<?php if ('open' == $post->comment_status) { ?>
					<div class="comments">
						<?php comments_template(); ?>
					</div>
					<?php } ?>
					
					<?php endif; ?>
				</div><!-- content -->
	
				<?php get_sidebar(); ?>
				<div class="clear"></div>
			</div><!-- container -->
				
			<?php } ?>

<?php get_footer(); ?>