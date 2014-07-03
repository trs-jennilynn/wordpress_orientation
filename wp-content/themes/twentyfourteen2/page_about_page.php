<?php
/*
 * Template Name: About Page Template
 * Description: A page template specifically designed for the about page
 */
	get_header(); 
?>
		<div id="body-wrapper">	
			<div class="content" id="about-page">
				
				<div class="contents">
					<div id="content-left">
						<div id class="left-nav-bar section">
							<div class="section-content">
								<div class="container">
									<ul>
										<li class="row"><a href="#">TROPARA</a></li>
										<li class="divider"></li>
										<li class="row"><a href="#">TROPARA</a></li>
										<li class="divider"></li>
										<li class="row"><a href="#">TROPARA</a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php get_template_part("content","left"); ?>
					</div>
					
					<div id="content-right">
						<div id="about" class="section">
							<div class="section-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/about/about_title.png);">
								<div class="DivHelper"></div>
							</div>
							<div class="section-content">	
								<div class="container">
									<div class="row">
										<div class="gallery">
											<img src="<?php echo get_template_directory_uri(); ?>/images/about/about_pic1.png" />
											<img src="<?php echo get_template_directory_uri(); ?>/images/about/about_pic2.png" />
											<img src="<?php echo get_template_directory_uri(); ?>/images/about/about_pic3.png" />
										</div>
										<div class="divider"></div>
										<div class="about-content">
										<?php 	if(have_posts() ):
													while ( have_posts() ): the_post();
														the_content();
													endwhile;
												endif;
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		
			</div>
		</div>
<?php 
	get_footer(); 
?>