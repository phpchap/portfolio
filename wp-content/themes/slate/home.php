<?php 
/* 
Template Name: Homepage
*/ 
?>

<?php get_header(); ?>
			
			<div id="sections" class="clearfix">
				<!-- Intro Message -->
				<div class="section section-slider">
					<div class="page-title page-title-portfolio">
						<?php if ( of_get_option('of_header_text') ) { ?>
							<?php echo of_get_option('of_header_text'); ?>
						<?php } ?>
					</div>
					
					<div id="header-slider" class="flexslider">
						<ul class="slides">
						<?php $slidercat = of_get_option('of_slider_cat', 'no entry' ); ?>
						<?php query_posts('showposts=10&cat='.$slidercat); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
							<li>
								<?php if ( has_post_thumbnail() ) { ?>
								<a class="featured-thumb" href="
									<?php if ( get_post_meta($post->ID, 'slidelink', true) ) { ?>
										<?php echo get_post_meta($post->ID, 'slidelink', true) ?>
									<?php } else { ?>
										<?php the_permalink(); ?>
									<?php } ?>
								" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'full-image' ); ?></a>
								<?php } ?>
								
								<!-- Hide the title for just an image slide -->
								<?php if ( get_post_meta($post->ID, 'hidetitle', true) ) { ?>
									<!-- No title -->
								<?php } else { ?>
									<h2><?php the_title(); ?></h2>
									<h3><?php the_excerpt(); ?></h3>
								<?php } ?>
							</li>
						
						<?php endwhile; ?>
						<?php endif; ?>
						</ul>
					</div>
				</div><!-- slider section -->
				
				<?php if ( is_active_sidebar(1) ) { ?>
				<!-- Services -->
				<div class="section section-services">
					<div class="section-title">
						<span>
							<?php if ( of_get_option('of_services_title') ) { ?>
								<?php echo of_get_option('of_services_title'); ?>
							<?php } ?>
						</span>
					</div>

					<div class="services-wrap">
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Services Text Columns') ) : else : ?>		
						<?php endif; ?>
					</div>
				</div><!-- services section -->
				<?php } else { }; ?>
				
				<!-- Portfolio -->
				<div class="section section-portfolio">					
					<div class="section-title">
						<span>
							<?php if ( of_get_option('of_portfolio_title') ) { ?>
								<?php echo of_get_option('of_portfolio_title'); ?>
							<?php } ?>
						</span>
					</div>
					
					<div id="portfolio-slider" class="box-portfolio paginate-boxes flexslider">
						<ul class="slides">
	                    	<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
	                    	<?php query_posts('showposts=18&cat='.$portfoliocat); ?>
	                    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		                    
			                    <li>
			                    	<!--Fade-->
			                    	<div class="mosaic-block fade">
			                    		<a href="<?php the_permalink(); ?>" class="mosaic-overlay">
			                    			<object class="details">
			                    				<?php if ( get_post_meta($post->ID, 'okvideo', true) ) { ?>
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
			                    		<div class="mosaic-backdrop"><?php the_post_thumbnail( 'portfolio-image' ); ?></div>
			                    	</div>
								</li>
	
							<?php endwhile; ?>
							<?php endif; ?>
	                    </ul><!-- slides -->
					</div><!-- portfolio slider -->
				</div><!-- section -->
				
				<!-- Blog -->
				<div class="section section-blog">
					<div class="section-title">
						<span>
							<?php if ( of_get_option('of_blog_title') ) { ?>
								<?php echo of_get_option('of_blog_title'); ?>
							<?php } ?>
						</span>
					</div>

					<div id="blog-slider" class="home-blog clearfix flexslider">
						  <ul class="slides">
						  	<?php $blogcat = of_get_option('of_blog_cat', 'no entry' ); ?>
						  	<?php query_posts('showposts=12&cat='.$blogcat); ?>
						  	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						  		
						  		<li class="home-blog-post">
						  			<div class="blog-thumb">
						  				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						  					<?php the_post_thumbnail( 'blog-thumb' ); ?>
						  				</a>
						  			</div>
						  			
						  			<div class="blog-title">
						  				<div class="big-comment">
						  					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						  				</div>
						  				
						  				<p class="home-blog-post-meta"><?php echo get_the_date(); ?></p>
						  			</div>
						  			
						  			<div class="clear"></div>
						  			
						  			<div class="excerpt">
						  				<?php the_excerpt(); ?>
						  			</div>
						  			
						  			<div class="clear"></div>
						  			
						  			<div class="blog-read-more">
						  				<a href="<?php the_permalink(); ?>"><?php _e('Read More','okay'); ?></a>
						  			</div>
						  		</li>
						  		
						  	<?php endwhile; ?>
						  	<?php endif; ?>	
						  </ul>
						  <?php echo $hidedots; ?>
					</div><!-- home blog -->
				</div><!-- blog section -->
				
				<?php if ( is_active_sidebar(2) ) { ?>
				<!-- Testimonials -->
				<div class="section section-testimonials">
					<div class="section-title">
						<span>
							<?php if ( of_get_option('of_testimonials_title') ) { ?>
								<?php echo of_get_option('of_testimonials_title'); ?>
							<?php } ?>
						</span>
					</div>
						
					<div id="testimonial-slider" class="flexslider">
						<ul class="testimonials slides">
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Testimonials') ) : else : ?>		
							<?php endif; ?>
						</ul>
					</div>
				</div><!-- testimonial section -->
				<?php } else { }; ?>
				
			</div><!-- sections -->	
			
<?php get_footer(); ?>