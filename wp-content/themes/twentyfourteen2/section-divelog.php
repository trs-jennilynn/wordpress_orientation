<div id="divelog" class="section">
	<div class="section-header">
		<a href="<?php echo get_category_link(3); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/content/title_bt_01.png" /></a>
		<div class="DivHelper"></div>
	</div>
	<div class="section-content">	
		<div class="container">
		<?php 
			$query_events = new WP_Query( 'cat=3&posts_per_page='.MAXIMUM_NO_OF_POSTS);
			$i = 1;
			if ( $query_events->have_posts() ):
				while ( $query_events->have_posts() ): $query_events->the_post(); ?>
				<div class="row">
					<div class="cell date"><?php echo get_the_date("Y/m/d"); ?></div>
					<div class="cell title"><a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth(get_the_title() , 0, 75, '...'); ?></a></div>
				</div>
			<?php if ( $i < MAXIMUM_NO_OF_POSTS && $query_events->post_count == MAXIMUM_NO_OF_POSTS ): ?>	
				<div class="divider"></div>		
			<?php elseif ($i < $query_events->post_count): ?> 
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