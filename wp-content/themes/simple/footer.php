	<?php  $options = get_option('simple_wp'); ?>
	<!-- FOOTER : STARTS -->
	<footer id="mastfoot">
	<section class="container-fluid">
	    <div class="row-fluid">
	            <article class="span6 credits text-left">
	              <h3>@twitter</h3>
	              <span class="liner">&nbsp;</span>
	              <article id="ticker" class="query"></article>
	            </article>


	            <article class="span6 text-right">
	            	<?php 
		            	if($options['footer_logo'] != '')
		            	{
	            	?>
	            		<img alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>" class="foot-logo" src="<?php echo $options['logo']; ?>" />
	            	<?php 
		            	}
		            	else
		            	{
	            	?>
	            		<h4 class="add-top">Place your footer logo here.</h4>
	            	<?php
	            		}
	            	?>
	              
	              <p class="address-now"><?php echo $options['address']; ?></p>
	            </article>

	            
	    </div>
	    <div class="row-fluid">

	                <article class="span6 social-block text-left">
	                  <?php 
					  if($options['simple_email'] != '') 
	                  {
	                  ?>
	                  <a href="mailto:<?php echo $options['simple_email']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/01.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_twitter'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_twitter']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/03.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_dribble'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_dribble']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/04.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_facebook'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_facebook']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/FB.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_gplus'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_gplus']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/google.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_linkedin'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_linkedin']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/link.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_pintrest'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_pintrest']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/pinterest.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_behance'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_behance']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/Be.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_github'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_github']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/github.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_flickr'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_flickr']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/flickr.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_tumblr'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_tumblr']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/tumblr.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_soundcloud'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_soundcloud']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/soundcloud.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_instagram'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_instagram']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/instagram.png"/></a>
	                  <?php 
	              	  }
	              	  if($options['simple_vimeo'] != '') 
	                  {
	                  ?>
	                  <a href="<?php echo $options['simple_vimeo']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/contact/vimeo.png"/></a>
	                  <?php 
	              	  }
	              	  ?>
	                </article>

	                <article class="span6 copyright text-right">
	                  <p><?php echo $options['credit'];?></p>
	                </article>


	              </div>
	</section>
	</footer>

	<!-- Dummy Button to trigger modal --> 
    <a href="#myModal" role="button" class="btn launch_modal hide" data-toggle="modal">Launch modal</a> 
    
    <!-- Modal -->
    <div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close modal_close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div id="myModalLabel" class="heading"><h3 class="sub_heading"><?php if($options['thanks_msg_header']){ echo $options['thanks_msg_header']; }?></h3></div>
        </div>
        <div class="modal-body">
            <p><?php if($options['thanks_msg']){ echo $options['thanks_msg']; }?></p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-inverse modal_close_btn" data-dismiss="modal" aria-hidden="true"><?php _e('Close','prismalang');?></button>
        </div>
    </div>

	<?php
		
		$flickrSetings = array('flickr_id' => $options['flickr_id'], 'flickr_item_limit' => $options['flickr_item_limit']);
		wp_localize_script('flickr-init', 'flickrSetings', $flickrSetings);

		$twitter_options = array( 'twitter_id' => $options['twitter_id'], 'path' => get_stylesheet_directory_uri());
		wp_localize_script('tweet-init', 'tweetobj', $twitter_options);

        wp_footer();
    ?>
</body>
</html>