<?php 
/* 
Template Name: Portfolio
*/ 
?>

<?php get_header(); global $more; ?>

				<div class="container">
						<div class="portfolio-full">
							
							<div class="portfolio-big-slide">
								<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
								<?php query_posts('showposts=1&cat='.$portfoliocat); ?>
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
										<div class="mosaic-backdrop"><?php the_post_thumbnail( 'full-image' ); ?></div>
									</div>
								
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
							
							<div class="portfolio-big-title">
								<?php if ( of_get_option('of_portfolio_text') ) { ?>
									<?php echo of_get_option('of_portfolio_text'); ?>
								<?php } ?>
							</div>
							
							<ul class="slides mobile-slide">
		                    	<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
		                    	<?php query_posts('showposts=1&cat='.$portfoliocat); ?>
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
							
							<div class="clear"></div>
							
							<div id="portfolio-slider" class="box-portfolio paginate-boxes-inside flexslider">
								<ul class="slides">
			                    	<?php $portfoliocat = of_get_option('of_portfolio_cat', 'no entry' ); ?>
			                    	<?php query_posts('offset=1&showposts=18&cat='.$portfoliocat); ?>
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
							
						</div><!-- content -->
						<div class="clear"></div>
				</div><!-- container -->

<?php get_footer(); ?>