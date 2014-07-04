<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> <?php wp_title("|",true); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
	<meta name="keywords" content="<?php bloginfo('categories'); ?>"/>

	<?php
	    
	    $options = get_option('simple_wp');

	    $is_home = simple_is_home_page();

	    simple_favicon();

	    simple_highlight_color();

	    simple_custom_style();

	    $simple_ie_fix = simple_IE_fix();
        echo $simple_ie_fix;

	    
	?>

	

	<?php wp_head();  ?>
</head>

<body <?php body_class(); ?>>

<!-- Mobile Only Navigation - 2 types each for (480px to 640px) and (640px to 960px) wide device screens -->
<header id="mobile-header" class="hidden-desktop <?php if ($is_home == false){ echo " inner-page";} else{echo " front-page";}?>">
    <div id="nav">
      <?php custom_mobile_menu(); ?>
    </div>
</header>


<!-- HEADER : STARTS -->
<header id="masthead" class="hidden-tablet hidden-phone <?php if ($is_home == false){ echo " inner-page";} else{echo " front-page";}?>">
<section class="container-fluid">
    <div class="row-fluid">

            <article class="span4 text-left">
            	<?php 
            	if($options['logo'] != '')
            	{ 
            	?>
                <img alt="<?php echo get_bloginfo('name'); ?>" id="site-logo" data-site-url="<?php echo site_url();?>" title="<?php echo get_bloginfo('name'); ?>" class="head-logo" src="<?php echo $options['logo']; ?>" />
                <?php 
            	}
            	else
            	{
            		echo '<h4 class="add-top">Place your logo here.</h4>';
            	}
                ?>
            </article>

            <article class="span8 credits">
              <?php custom_menu(); ?>
            </article>
            
    </div>
</section>
</header>