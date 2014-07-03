<?php 

	$section_id = "";
	
	$category = get_the_category();
	
		switch ( strtolower($category[0]->cat_name) ):
			case "news":
					$section_id = "notice";
				break;
			case "events":
					$section_id = "divelog";
				break;
		
		endswitch;


?>



<div id="<?php echo $section_id; ?>" class="section">
	<div class="section-header">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/content/title_bt_01.png" /></a>
		<div class="DivHelper"></div>
	</div>
	<div class="section-content">	
		<div class="container">
		<?php 
			if ( have_posts() ):
				$tropara_post_counter = 1;
				while ( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="cell date"><?php echo get_the_date("Y/m/d"); ?></div>
					<div class="cell details">
						<div class="detail title"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title() , 0, 75, '...'); ?></a></div>
						<div class="detail excerpt">
							<?php echo mb_strimwidth(get_the_content(), 0, 320, '...'); ?>  <a href="<?php echo get_the_permalink(); ?>"><?php _e("View post"); ?></a>
						</div>
					</div>
				</div>
				<?php if ($tropara_post_counter < $wp_query->post_count): ?>
				<div class="divider"></div>	
			<?php 
					endif;
				$tropara_post_counter++;
				endwhile;
			endif;
		?>
		</div>
	</div>

</div>