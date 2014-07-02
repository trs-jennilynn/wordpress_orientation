<?php
/**
 * The Header for our theme
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="menu-wrapper">
			<ul id="menu-nav">
				<li id="about"><div><a href="#about"></a></div></li>
				<li id="resort"><div><a href="#resort"></a></div></li>
				<li id="diving"><div><a href="#diving"></a></div></li>
				<li id="notice"><div><a href="#notice"></a></div></li>
				<li id="guide"><div><a href="#guide"></a></div></li>
				<li id="reservation"><div><a href="#reservation"></a></div></li>
			</ul>
		</div>
		<div id="header-wrapper">
			<div id="header">
				<div id="name"><?php bloginfo('name'); ?></div>
				<div id="logo"><a href="<?php bloginfo("siteurl"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/header/tropara_logo.png" /></a></div>
				<div id="fish"></div>
				<div id="button"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/header/header_bt.png" /></a></div>
			</div>
		</div>
		