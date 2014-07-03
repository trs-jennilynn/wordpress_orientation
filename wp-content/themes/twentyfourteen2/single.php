<?php	
	get_header(); 
?>
		<div id="body-wrapper">	
			<div class="content">
				
				<div class="contents">
					<div id="content-left">
						<?php get_template_part("content","left"); ?>
					</div>
					
					<div id="content-right">
						<div class="section">
							<div class="section-content">	
								<div class="container">
									<div class="row">
										<div class="about-content">
										<?php 	if(have_posts() ):
													while ( have_posts() ): the_post();
										?>
											<h1><?php the_title(); ?></h1>
											
										<?php 
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