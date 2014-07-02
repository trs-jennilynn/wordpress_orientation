<?php 

	$section_id = "";
	$bg_img = null;
	
	$category = get_the_category();
	
		switch ( strtolower($category[0]->cat_name) ):
			case "news":
					$section_id = "notice";
					$bg_img = "title_bt_01";
				break;
			case "events":
					$section_id = "divelog";
					$bg_img = "title_bt_01";
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
				while ( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="cell date"><?php echo get_the_date("Y/m/d"); ?></div>
					<div class="cell details">
						<div class="detail title"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title() , 0, 75, '...'); ?></a></div>
						<div class="detail excerpt">
							<?php echo mb_strimwidth(get_the_content(), 0, 320, '... <a href="'.get_the_permalink().'">'.__("Read More").'</a>'); ?>
						</div>
					</div>
				</div>
			<?php if ( $i < MAXIMUM_NO_OF_POSTS && count(get_posts()) == MAXIMUM_NO_OF_POSTS ): ?>	
				<div class="divider"></div>		
			<?php elseif ($i < count(get_posts()) ): ?> 
				<div class="divider"></div>	
			<?php endif;
				$i++;
				endwhile;
			endif;
			wp_reset_postdata();
		?>
		</div>
	</div>

</div>