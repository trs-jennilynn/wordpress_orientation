<?php
/*
 * Template Name: Accomodation Page Template
 * Description: A page template specifically designed for the accomodation page
 */
	get_template_part("section","page-header-2");
?>
						<div id="about" class="section">
							<div class="section-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/pages/accomondation_head_title.png);">
							<div class="DivHelper"></div>
							</div>
							<div class="section-content">	
								<div class="container">
									<div class="row">
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
<?php get_template_part("section","page-footer"); ?>