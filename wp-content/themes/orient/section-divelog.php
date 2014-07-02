<div id="divelog" class="section">
	<div class="section-header">
		<img src="<?php echo get_template_directory_uri(); ?>/images/content/divelog_title.png" />
	</div>
	<div class="section-content">	
		<div class="container">
		<?php 
			define('MAXIMUM_NO_OF_POSTS',4);
			
			query_posts( 'posts_per_page='.MAXIMUM_NO_OF_POSTS );
			$i = 1;
			if ( have_posts() ):
				while ( have_posts() ): the_post(); ?>
				<div class="row">
					<div class="cell date"><?php echo get_the_date("Y/m/d"); ?></div>
					<div class="cell title"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title() , 0, 75, '...'); ?></a></div>
				</div>
			<?php if ( $i < MAXIMUM_NO_OF_POSTS && $i < count(get_posts()) ): ?>
				<div class="divider"></div>		
		<?php 		endif;
				$i++;
				endwhile;
			endif;
			wp_reset_query();
		?>
		</div>
	</div>

</div>