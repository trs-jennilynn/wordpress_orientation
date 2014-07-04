<?php
function simpleWP_styles() 
{
  wp_enqueue_style("bootstrap", get_stylesheet_directory_uri(). "/assets/css/bootstrap.css");
  wp_enqueue_style("bootstrap-responsive", get_stylesheet_directory_uri(). "/assets/css/bootstrap-responsive.css");
  wp_enqueue_style("extension",get_stylesheet_directory_uri()."/assets/css/extension.css");
  wp_enqueue_style("typography",get_stylesheet_directory_uri()."/assets/css/typography.css");
  wp_enqueue_style("responsive-nav",get_stylesheet_directory_uri()."/stylesheets/responsive-nav.css");
  wp_enqueue_style("team-grid", get_stylesheet_directory_uri(). "/stylesheets/team-grid.css");
  wp_enqueue_style("service-grid",get_stylesheet_directory_uri()."/stylesheets/service-grid.css");
  wp_enqueue_style("prettyPhoto",get_stylesheet_directory_uri()."/stylesheets/prettyPhoto.css");
  wp_enqueue_style("animate",get_stylesheet_directory_uri()."/stylesheets/animate.css");
  wp_enqueue_style("style",get_stylesheet_directory_uri()."/style.css");
}
function simpleWP_admin_only()
{
 
  wp_enqueue_style("metastyles", get_stylesheet_directory_uri(). "/assets/css/meta-styles.css");  
  wp_enqueue_style("farbtastic-style", get_stylesheet_directory_uri(). "/admin/options/css/farbtastic.css");  
}

global $pagenow;
if (!is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) )) 
 {  
    add_action( 'init', 'simpleWP_styles' );
 }
 if(is_admin())
 {
   add_action( 'init', 'simpleWP_admin_only' );
 }
?>