<?php
/*
 * Template Name: About Page Template
 * Description: A page template specifically designed for the about page
 */
	get_template_part("section","page_header");
?>
						<div id="about" class="section">
							<div class="section-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/pages/about/about_title.png);">
							<div class="DivHelper"></div>
							</div>
							<div class="section-content">	
								<div class="container">
									<div class="row">
										<div class="page-content">
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
<?php get_template_part("section","page_footer"); ?>