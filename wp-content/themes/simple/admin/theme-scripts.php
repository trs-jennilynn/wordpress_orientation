<?php
function simpleWP_scripts() 
{ 

    $options = get_option('simple_wp');

	
    wp_enqueue_script('jquery');
    wp_enqueue_script("bootstrap", get_stylesheet_directory_uri(). "/assets/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("modernizr-custom", get_stylesheet_directory_uri(). "/javascripts/custom.modernizr.js",array(),false,true);
    wp_enqueue_script("jquery-easing", get_stylesheet_directory_uri(). "/javascripts/jquery.easing.1.3.js",array(),false,true);
    //wp_enqueue_script("mixitup", get_stylesheet_directory_uri(). "/javascripts/jquery.mixitup.min.js",array(),false,true);
    wp_enqueue_script("responsive-nav", get_stylesheet_directory_uri(). "/javascripts/responsive-nav.js",array(),false,true);
    wp_enqueue_script("idangerous-swiper", get_stylesheet_directory_uri(). "/javascripts/idangerous.swiper-2.0.min.js",array(),false,true);
    wp_enqueue_script("stellar", get_stylesheet_directory_uri(). "/javascripts/jquery.stellar.js",array(),false,true);
    wp_enqueue_script("flickr", get_stylesheet_directory_uri(). "/javascripts/jquery.flickr.js",array(),false,true);
    wp_enqueue_script("flickr-init", get_stylesheet_directory_uri(). "/javascripts/init-flickr.js",array(),false,true);
    wp_enqueue_script("prettyPhoto", get_stylesheet_directory_uri(). "/javascripts/prettyPhoto.js",array(),false,true);
    wp_enqueue_script("flexslider", get_stylesheet_directory_uri(). "/javascripts/flexslider.js",array(),false,true);
    wp_enqueue_script("waypoints", get_stylesheet_directory_uri(). "/javascripts/waypoints.min.js",array(),false,true);
    wp_enqueue_script("tweet", get_stylesheet_directory_uri(). "/javascripts/jquery.tweet.js",array(),false,true);
    wp_enqueue_script("tweet-init", get_stylesheet_directory_uri(). "/javascripts/init-tweet.js",array(),false,true);
    wp_enqueue_script("portfolio", get_stylesheet_directory_uri(). "/javascripts/portfolio.js",array(),false,true);
    wp_enqueue_script("retina", get_stylesheet_directory_uri(). "/javascripts/retina.js",array(),false,true);
    wp_enqueue_script("effects", get_stylesheet_directory_uri(). "/javascripts/effects.js",array(),false,true);
    wp_enqueue_script("scroll", get_stylesheet_directory_uri(). "/javascripts/scroll.js",array(),false,true);
    wp_enqueue_script("form-validation", get_stylesheet_directory_uri(). "/javascripts/form-validation.js",array(),false,true);
    wp_enqueue_script("main-script", get_stylesheet_directory_uri(). "/javascripts/script.js",array(),false,true);
    
    
    
    
	
}

function simpleWP_admin_scripts()
{  
	wp_enqueue_script("uploader", get_stylesheet_directory_uri(). "/admin/options/js/uploader.js");
    wp_enqueue_script("farbtastic-invoke", get_stylesheet_directory_uri(). "/admin/options/js/color_picker_invoke.js");
    wp_enqueue_script("add-portfolio-slide", get_stylesheet_directory_uri(). "/javascripts/add-portfolio-slide.js",array(),false,true);
}

global $pagenow;
if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) )) 
{ 

    add_action( 'init', 'simpleWP_scripts' );
}
if(is_admin())
{

    add_action( 'init', 'simpleWP_admin_scripts' );
}
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
?>