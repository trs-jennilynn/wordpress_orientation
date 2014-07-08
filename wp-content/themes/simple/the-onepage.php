<?php
/**
 * Template Name: Single Page Layout
 *
 * @author Designova (designova.net)
 * @theme Simple
*/
	get_header();
?>

<?php


  $options = get_option('simple_wp');
  $count = 0; 
  $countPages = wp_count_posts('page')->publish;
  $pages = get_pages( 'sort_order=asc&sort_column=menu_order');
//Count published pages
foreach($pages as $pag):

  setup_postdata($pag);
 
  //Anchor point and title
  $newanchorpoint = strtolower(preg_replace('/\s+/', '-', $pag->post_name)); 
  $new_title      = $newanchorpoint;
  $templ_name     = get_post_meta( $pag->ID, '_wp_page_template', true );
  $filename       = preg_replace('"\.php$"', '', $templ_name); 

  //Check wether to include in one page
  $include_onepage =  get_post_meta($pag->ID,'one_page',true);

  if(has_post_thumbnail($pag->ID)) 
    $bg_image = wp_get_attachment_image_src( get_post_thumbnail_id($pag->ID), 'full');
  else
    $bg_image = '';


  $page_heading      =  $pag->post_title;
  $page_promo =  get_post_meta($pag->ID,'page_promo',true);
  $page_bg_color =  get_post_meta($pag->ID,'page_bgcolor',true);
  $page_bg_trans =  get_post_meta($pag->ID,'page_bgtrans',true);
  $parallax_speed =  get_post_meta($pag->ID,'parallax_speed',true);
  
  $rgb_code = get_rgb($page_bg_color);

  $bg_color_rgb = $rgb_code[0].','.$rgb_code[1].','.$rgb_code[2];

  if($filename == 'portfolio' AND $include_onepage == 'yes' )
  {
     $count++;  

    if($count == 2)
    { 
      $show_nav_class = 'navigation-fadeIn';
    }
    else
    {
      $show_nav_class = '';
    }

    $port_categories = get_categories(array('type' => 'portfolio_item', 'taxonomy' => 'portfolio_category'));
  ?>
    
    <!-- PORTFOLIO : STARTS -->
    <section id="<?php echo $new_title; ?>" class="page-section <?php echo $show_nav_class;?>" data-stellar-background-ratio="<?php echo $parallax_speed;?>" style="background: <?php echo $page_bg_color; ?> url('<?php echo $bg_image[0];?>') repeat;">
      <div class="page-overlay" style="background: rgba(<?php echo $bg_color_rgb.', '.$page_bg_trans;?>);"></div>
      <?php the_content();?>
      <section id="portfolio-wrap" class="add-top">
        <!-- Filter -->
        <div id="filter" class="clearfix">
          <div id="filter_wrapper">
                <ul id="portfolioFilter">
                   <li class="active"><a href="#" class="all">All</a></li>
                   <?php                      
                     foreach($port_categories as $port_category): 
                        $categoryClass = strtolower($port_category->slug);
                        echo '<li class="separator">/</li>';
                        echo '<li><a href="#" class="'.$categoryClass.'">'.$port_category->name.'</a></li>';      

                     endforeach;

                    if($options['flickr_id'] != '')
                    {
                   ?>
                   <li class="separator">/</li>
                   <li><a href="#feed-gallery" class="scroll-link" data-soffset="90">Flickr</a></li>
                   <?php
                    }
                   ?>
                </ul>
          </div>
        </div>
        <!-- End: Filter -->
        <!-- Container element for a single portfolio item. Do not remove! -->
        <div id="item_container" class="clearfix"></div>

        <!-- Thumbnails -->
        <div id="portfolio_thumbs">
          <ul class="sortablePortfolio clearfix">
            <?php
            $item_count = 1;
            $loop = new WP_Query( array( 'post_type' => 'portfolio_item', 'orderby' => 'date', 'order' => 'DESC', 'paged'=> false, 'posts_per_page' => '-1' ) );

            while ( $loop->have_posts() ) : $loop->the_post();
            $item_categories = wp_get_post_terms($post->ID, $taxonomy = 'portfolio_category');
            $prjt_categories = '';
            foreach ($item_categories as $prjt_cat) {
              $prjt_categories = strtolower($prjt_cat->slug);
            }
            
            $project_caption = get_post_meta($post->ID,'project_caption',true);
            $project_bg_color = get_post_meta($post->ID,'project_bg_color',true);
            $project_type = get_post_meta($post->ID,'project_type',true);
            $project_description = get_post_meta($post->ID,'project_des',true);
            $project_url = get_post_meta($post->ID,'project_url',true);
            $embed_code = get_post_meta($post->ID,'embed_code',true);
            $slide_count = get_post_meta($post->ID,'slide_count',true);
            $project_slides = get_post_meta($post->ID,'project_slides',true);

            $embed_code = str_replace("&rsquo;","'",$embed_code);
            $embed_code = str_replace("&quot;",'"',$embed_code);
            
            if($project_type == 'lightbox')
            {
              $src         = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', true, '' );
              $alternative = $project_url;
              if($alternative == ''):
              $img_src = $src[0];
              else:
              $img_src = $alternative;
              endif;
            ?>
            <li data-type="<?php  echo $prjt_categories; ?>" style="background: <?php echo $project_bg_color; ?>;">
                <!-- Thumbnail -->
                <a href="<?php echo $img_src;?>" data-gal="prettyPhoto[gallery]" class="thumb_img_wrap">
                    <?php 
                    if(has_post_thumbnail()): 
                      {
                        the_post_thumbnail('portfolio_thumb');
                        the_post_thumbnail('portfolio_thumb');
                      }
                    else: 
                       echo '<img src="'.get_stylesheet_directory_uri().'/images/portfolio_thumbs/portfolio5_rollover.jpg" alt="'.get_the_title().'"/>';
                    endif;
                    ?>
                </a>
                <!-- Info -->
                <div class="item_info" style="background: <?php echo $project_bg_color; ?>;">
                     <h3><a href="<?php echo $img_src;?>" data-gal="prettyPhoto[gallery]"><?php echo the_title(); ?></a></h3>
                     <p><?php echo $project_caption; ?></p>
                </div>
            </li>
            <?php
            }

            if($project_type == 'standard')
            {
            ?>
            <li data-type="<?php  echo $prjt_categories; ?>" style="background: <?php echo $project_bg_color; ?>;">
                <!-- Thumbnail -->
                <a href="#" class="standard-type thumb_img_wrap">
                    <?php 
                    if(has_post_thumbnail()): 
                      {
                        the_post_thumbnail('portfolio_thumb');
                        the_post_thumbnail('portfolio_thumb');
                      }
                    else: 
                       echo '<img src="'.get_stylesheet_directory_uri().'/images/portfolio_thumbs/portfolio5_rollover.jpg" alt="'.get_the_title().'"/>';
                    endif;
                    ?>
                </a>
                <!-- Info -->
                <div class="item_info" style="background: <?php echo $project_bg_color; ?>;">
                     <h3><?php echo the_title(); ?></h3>
                     <p><?php echo $project_caption; ?></p>
                </div>

                <div class="item-details">
                  <div class="portfolio_item">
                   <!-- Content -->
                   <div class="row-fluid">
                        
                        <!-- Youtbe video -->
                        <div class="item_video_wrapper span6">
                             <div class="item_video">
                                  <?php echo $embed_code; ?>
                             </div>
                        </div>

                        <!-- Text Content -->
                        <div class="text_content span5">
                             
                             <h3><?php echo the_title(); ?></h3>
                             
                             <p><?php echo $project_description; ?></p>
                             <?php 
                             if($project_url != '')
                              {?>
                                <div class="clear"></div>
                                <a class="btn btn-simple highlight-on-hover" target="_blank" href="<?php echo $project_url; ?>"><?php _e('View Project', 'simplelang');?></a>
                              <?php 
                              }
                              ?>
                        </div>
                        
                        <!-- Control buttons -->
                        <div class="control_buttons span1">
                             <a href="#" class="close">&times;</a>
                        </div>

                   <div class="clear"></div>
                   </div>
                   <!-- End: Content -->
              </div>
                </div>
            </li>
            <?php  
            }

            if($project_type == 'external_link')
            {
              
            ?>
            <li data-type="<?php  echo $prjt_categories; ?>" style="background: <?php echo $project_bg_color; ?>;">
                <!-- Thumbnail -->
                <a href="<?php echo $project_url; ?>" target="_blank" class="thumb_img_wrap">
                    <?php 
                    if(has_post_thumbnail()): 
                      {
                        the_post_thumbnail('portfolio_thumb');
                        the_post_thumbnail('portfolio_thumb');
                      }
                    else: 
                       echo '<img src="'.get_stylesheet_directory_uri().'/images/portfolio_thumbs/portfolio5_rollover.jpg" alt="'.get_the_title().'"/>';
                    endif;
                    ?>
                </a>
                <!-- Info -->
                <div class="item_info" style="background: <?php echo $project_bg_color; ?>;">
                     <h3><a href="<?php echo $project_url; ?>" target="_blank"><?php echo the_title(); ?></a></h3>
                     <p><?php echo $project_caption; ?></p>
                </div>
            </li>
            <?php
            }

            if($project_type == 'slider')
            {
            ?>
            <li data-type="<?php  echo $prjt_categories; ?>" style="background: <?php echo $project_bg_color; ?>;">
                <!-- Thumbnail -->
                <a href="#" class="standard-type thumb_img_wrap">
                    <?php 
                    if(has_post_thumbnail()): 
                      {
                        the_post_thumbnail('portfolio_thumb');
                        the_post_thumbnail('portfolio_thumb');
                      }
                    else: 
                       echo '<img src="'.get_stylesheet_directory_uri().'/images/portfolio_thumbs/portfolio5_rollover.jpg" alt="'.get_the_title().'"/>';
                    endif;
                    ?>
                </a>
                <!-- Info -->
                <div class="item_info" style="background: <?php echo $project_bg_color; ?>;">
                     <h3><?php echo the_title(); ?></h3>
                     <p><?php echo $project_caption; ?></p>
                </div>

                <div class="item-details">
                  <div class="portfolio_item">
                   <!-- Content -->
                   <div class="row-fluid">
                        
                        <!-- Youtbe video -->
                        <div class="item_video_wrapper span6">
                             <div class="item_slider">
                                  <div id="slide_item<?php echo $item_count; ?>" class="carousel slide">
                                    <div class="carousel-inner">
                                      <?php 
                                      $first_slide = true;
                                      foreach($project_slides as $project_slide)
                                      {
                                      ?>
                                      <div class="item <?php if($first_slide == true) echo 'active'; ?>">
                                        <img src="<?php echo $project_slide;?>" alt="<?php echo the_title(); ?>" title="<?php echo the_title(); ?>" />
                                      </div>
                                      <?php
                                      $first_slide = false;
                                      }
                                      ?>
                                    </div>
                                    <a class="left carousel-control" href="#slide_item<?php echo $item_count; ?>" data-slide="prev"><img src="<?php echo get_template_directory_uri(); ?>/images/carousal_left_arrow.png"/></a>
                                    <a class="right carousel-control" href="#slide_item<?php echo $item_count; ?>" data-slide="next"><img src="<?php echo get_template_directory_uri(); ?>/images/carousal_right_arrow.png"/></a>
                                  </div>
                             </div>
                        </div>

                        <!-- Text Content -->
                        <div class="text_content span5">
                             
                             <h3><?php echo the_title(); ?></h3>
                             
                             <p><?php echo $project_description; ?></p>
                             <?php 
                             if($project_url != '')
                              {?>
                                <div class="clear"></div>
                                <a class="btn btn-simple highlight-on-hover" target="_blank" href="<?php echo $project_url; ?>"><?php _e('View Project', 'simplelang');?></a>
                              <?php 
                              }
                              ?>
                        </div>
                        
                        <!-- Control buttons -->
                        <div class="control_buttons span1">
                             <a href="#" class="close">&times;</a>
                        </div>

                   <div class="clear"></div>
                   </div>
                   <!-- End: Content -->
              </div>
                </div>
            </li>
            <?php  
            }
            $item_count++;
            endwhile;
            ?>
          </ul>
        </div>

      </section>
      <?php 
      
      if($options['flickr_id'] != '')
      {
      
      ?>
        <!-- FEED-GALLERY : STARTS -->
        <section id="feed-gallery">

          <nav class="clearfix">
            <!-- <a class="feed-trigger" data-feed-trigger="instagram"><img alt="simple" title="simple" src="<?php echo get_stylesheet_directory_uri();?>/images/feed/instagram.png"/></a> -->
            <span  class="flickr-feed-icon"><img alt="simple" title="simple" src="<?php echo get_stylesheet_directory_uri();?>/images/feed/flickr.png"/></span><br/>
            <h2 class="sub-heading highlight add-top-half pad-top-half add-bottom-medium"><span><?php echo $options['flickr_feed_title']; ?></span></h2>
          </nav>

          <!-- FLICKR FEED : STARTS -->
          <ul id="flickr" class="feed clearfix"></ul>
          <!-- FLICKR FEED : ENDS-->
        </section>
        <!-- FEED-GALLERY : ENDS -->
      <?php 
      
      }
      
      ?>
    </section>
    <!-- PORTFOLIO : ENDS -->
    <div class="clear"></div>

  <?php
  }
  elseif($filename == 'the-onepage' AND $include_onepage == 'yes')
  {

  }
  elseif($include_onepage == 'yes' )
  {
     $count++;  

    if($count == 2)
    { 
      $show_nav_class = 'navigation-fadeIn';
    }
    else
    {
      $show_nav_class = '';
    }
  ?>
    
    <!-- PAGE : STARTS -->
    <section id="<?php echo $new_title; ?>" class="page-section <?php echo $show_nav_class;?>" data-stellar-background-ratio="<?php echo $parallax_speed;?>" style="background: <?php echo $page_bg_color; ?> url('<?php echo $bg_image[0];?>') repeat;">
      <div class="page-overlay" style="background: rgba(<?php echo $bg_color_rgb.', '.$page_bg_trans;?>);"></div>
      <div class="page-content"><?php the_content();?></div>
    </section>
    <!-- PAGE : ENDS -->
    <div class="clear"></div>
    
  <?php
  }
  

endforeach;

  get_footer();
?>