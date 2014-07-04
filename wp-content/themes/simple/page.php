<?php
	get_header();
	$options = get_option('simple_wp');
?>
	<div class="clear"></div>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
    ?>
    <!-- PAGE : STARTS -->
    <section class="page-section">
	    <div class="page-content">
	      	<div class="container-fluid">
		        <div class="row-fluid">
		            <div class="container">
		            	<div class="row-fluid align-center">
							<div class="main-heading add-top"><?php echo get_the_title();?></div>
						</div>
	      				<?php the_content();?>
	      				<div class="clear"></div>
                              
	                    <div class="post_footer">
	                        <?php comments_template( '', true ); ?>
	                    </div>
	      			</div>
	      		</div>
	      	</div>
	    </div>
    </section>
    <!-- PAGE : ENDS -->
    <div class="clear"></div>
    <?php endwhile; // end of the loop. ?>

<?php
  get_footer();
?>