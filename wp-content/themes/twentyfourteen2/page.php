<?php
	get_template_part("section","page_header");
	
	global $post;
	$slug = get_post( $post )->post_name;
	$header_bg_img = "";
	if ( in_array($slug, array_keys($pages_header_bg_img)) ) {
		$header_bg_img = $pages_header_bg_img[$slug];
	} else {
		$header_bg_img = "images/pages/no_header_bg.png";
	}
	
?>
						<div id="about" class="section">
							<div class="section-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/<?php echo $header_bg_img; ?>);">
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