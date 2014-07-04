<?php

    get_header();
    $options = get_option('simple_wp');
    
  ?>
    <div class="clear"></div>
    <section class="page-section">
      <div class="continer-fluid">
        <div class="row-fluid">
          <div class="container">
            <div class="row">
              <div class="span8 blog-list">
                  <!--LOOP BEGINS-->
                  <?php 
                  if (have_posts()) : 
                    while (have_posts()) : the_post();
                      $embed_code = get_post_meta($post->ID,'post_embed_code',true);
                        $embed_code = str_replace("&rsquo;","'",$embed_code);
                        $embed_code = str_replace("&quot;",'"',$embed_code);

                        $post_feature_content = '';
                        
                        if(get_post_type( get_the_ID()) == 'post')
                          {
                            $format = get_post_format();            
                            switch($format)
                            {
                              case 'audio':
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/audio.png';
                               $post_feature_content = $embed_code;
                              break;
                              case 'video':
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/video.png';
                               $post_feature_content = $embed_code;
                              break;  
                              case 'image':
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/image.png';
                               $post_feature_content = ' <div id="slide_item'.$post->ID.'" class="carousel slide">
                                    <div class="carousel-inner">';
                                      
                                      $first_slide = true;
                                      $post_slides = get_post_meta($post->ID,'post_slides',true);
                                      foreach($post_slides as $post_slide)
                                      {
                                        if($first_slide == true)
                                          $item_active = 'active';
                                        else
                                          $item_active = '';

                                        $post_feature_content .= '<div class="item '.$item_active.'">
                                          <img src="'.$post_slide.'" alt="'.get_the_title().'" title="'.get_the_title().'" />
                                        </div>';
                                        
                                        $first_slide = false;
                                      }
                                      
                                    $post_feature_content .='</div>
                                    <a class="left carousel-control" href="#slide_item'.$post->ID.'" data-slide="prev"><img src="'.get_template_directory_uri() .'/images/carousal_left_arrow.png"/></a>
                                    <a class="right carousel-control" href="#slide_item'.$post->ID.'" data-slide="next"><img src="'.get_template_directory_uri() .'/images/carousal_right_arrow.png"/></a>
                                  </div>';
                              break;  
                              case 'link':
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/link.png';
                               $post_feature_content = '<a href="'.get_post_meta($post->ID,'post_ext_url',true).'" target="_blank"><div class="post-type-link">Link: '.get_post_meta($post->ID,'post_ext_url',true).'</div></a>';
                              break;   
                              case 'quote':
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/quote.png';
                               $post_feature_content = '<div class="post-type-quote">'.get_post_meta($post->ID,'post_quote',true).'</div>';
                              break; 
                              default:
                               $post_icon = get_stylesheet_directory_uri().'/images/post_format/default.png';
                               if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
                                 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', true, '' );
                                 $post_feature_content = '<a href="'.$src[0].'" data-gal="prettyPhoto[gallery]" class="blog-featured_img"><img src="'.$src[0].'" alt="'.get_the_title().'"/></a>';
                               }
                              break;                                                      
                            } 
                  ?>
                    <div class="row-fluid blog-post-item">
                        <article class="span1">
                          <div class="post-attr-date"><span class="month"><?php echo the_time('M'); ?></span><br/><span class="day"><?php echo the_time('j'); ?></span></div>
                          <div class="post-format-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/post_format/default.png" alt="<?php echo get_bloginfo('name'); ?>" /></div>
                          <?php 
                          if(is_sticky())
                          {
                          ?>
                          <div class="sticky-post-icon"><img src="<?php echo get_stylesheet_directory_uri().'/images/post_format/sticky.png'; ?>" alt="<?php echo get_bloginfo('name'); ?>" /></div>
                          <?php 
                          }
                          ?>
                        </article>
                        <article class="span11 blog_post">
                            <div class="content_section">
                              <div class="featured-image"> 
                                <?php echo $post_feature_content; ?>
                              </div>
                              <div class="clear"></div>
                              <div class="post_header">
                                <h3 class="inner-sub-caps align-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                  <div class="clear"></div>
                                  <article class="featured_attr"><?php _e('Posted by, ','simplelang'); the_author(); _e(' on ','simplelang'); the_time('F j, Y');?></article>
                              </div>
                              <div class="clear"></div>
                              <div class="post-content">
                                <?php  echo simple_clean(the_excerpt(), 75); ?>
                              </div>
                              <div class="clear"></div>
                              <a class="btn btn-simple highlight-on-hover" href="<?php the_permalink(); ?>"><?php _e('Read More', 'simplelang');?></a>
                            </div>
                        </article>
                      </div>
                      
                    <?php 
                        }
                      endwhile; 
                      else :
                          echo '<div class="post_header"><div class="inner-sub-caps align-left">'; _e("Sorry, but you are looking for something that isn't here.", "simplelang"); echo"</div></div>"; 
                    endif; 
                    wp_reset_query();
                    ?>
                    <!--LOOP ENDS-->  
                    <div class="clear"></div>
                    <?php getpagenavi(); ?>
                  </div>
                  <div class="span4 sidebar">
                    <?php get_sidebar();?>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="clear"></div>
<?php
  get_footer();
?>