<?php 
	$options = get_option('simple_wp');

	$rgb_code = get_rgb($options['highlight_color']);

	$rgb = $rgb_code[0].','.$rgb_code[1].','.$rgb_code[2];

	$menu_main = str_replace("#", "", $options['highlight_color']);
	$grad = gradient($menu_main,'FFFFFF',30);
?>
	<style>
		
		::-moz-selection{
		    background: <?php echo $options['highlight_color']; ?> !important; 
		    color: #fff; 
		    text-shadow: none;
		}
		::selection {
		    background: <?php echo $options['highlight_color']; ?> !important; 
		    color: #fff; 
		    text-shadow: none;
		} 

		#mast-nav > li > a.active {
		    border-bottom: solid 4px <?php echo $options['highlight_color']; ?> !important;
		}

		#mast-nav li ul li:first-child:after{
			border-bottom-color: <?php echo $options['highlight_color']; ?> !important;
		}

		#mast-nav li ul li a{background: <?php echo $options['highlight_color']; ?> !important;}

		#mast-nav li ul li a:hover{ background: #000 !important;}
		#mast-nav li ul li a.active{border-bottom: none !important;}

		#mobile-header{ background: <?php echo $options['highlight_color']; ?> url('<?php echo get_stylesheet_directory_uri(); ?>/images/mob-logo.png') left center no-repeat !important; }
		#nav a{background: <?php echo $options['highlight_color']; ?> !important; }
		#nav a:hover{background: #FFF !important;}

		.main-heading {color: <?php echo $options['highlight_color']; ?> !important;}
		.promo-text.highlight {
		    font-size: 24px;
		    line-height: 43px;
		    color: <?php echo $options['highlight_color']; ?> !important;
		    font-family: "Tex_R";
		}

		.promo-text.highlight > span {
		    font-size: 32px;
		    line-height: 43px;
		    color: <?php echo $options['highlight_color']; ?> !important;
		    font-family: "Tex_B";
		}

		.sub-heading.highlight > span {
		    margin-top: 10px;
		    font-family: "Roboto_L";
		    font-weight: normal;
		    text-transform: uppercase;
		    color: <?php echo $options['highlight_color']; ?> !important;
		    font-size: 16px;
		    line-height: 27px;
		    padding: 15px;
		    border: solid 4px <?php echo $options['highlight_color']; ?> !important;
		}

		.highlight {color: <?php echo $options['highlight_color']; ?> !important;}
		.highlight-txt {color: <?php echo $options['highlight_color']; ?> !important;}
		.highlight-bg{background: <?php echo $options['highlight_color']; ?> !important; color: #FFF !important;}
		.highlight-on-hover:hover{color:<?php echo $options['highlight_color']; ?> !important;}

		.promo-text.highlight{color: <?php echo $options['highlight_color']; ?> !important;}
		ul#portfolioFilter li.active a{color: <?php echo $options['highlight_color']; ?> !important;}
		.text_content h3{color: <?php echo $options['highlight_color']; ?> !important; border-bottom: <?php echo $options['highlight_color']; ?> solid 2px !important;}

		.carousel-control{background: <?php echo $options['highlight_color']; ?> !important; height: auto !important; width: 40px !important; padding-bottom: 5px !important; top: 45% !important; opacity: 1 !important; filter: alpha(opacity = 100)  !important; border: <?php echo $options['highlight_color']; ?> solid 1px !important; }
		.control_buttons a {background: <?php echo $options['highlight_color']; ?> !important;}
		.control_buttons a:hover, a.close:hover {
		    background: #FFF !important;
		    color: <?php echo $options['highlight_color']; ?> !important;
		    opacity: 1 !important;
		    filter: alpha(opacity=100);
		}

		.btn-simple {
		    background: <?php echo $options['highlight_color']; ?> !important;
		    border: <?php echo $options['highlight_color']; ?> solid 3px  !important;
		}

		.flickr-feed-icon{padding: 25px 0px; background:  <?php echo $options['highlight_color']; ?> !important; border-radius: 50px;}
		
		.sticky-post-icon, .post-format-icon{ border: 3px solid <?php echo $options['highlight_color']; ?> !important; background: <?php echo $options['highlight_color']; ?> !important;}

		.post_header .inner-sub-caps a:hover{color: #<?php echo $grad[10]; ?> !important; }
		.post_header .inner-sub-caps, .post_header .inner-sub-caps a{color: <?php echo $options['highlight_color']; ?> !important; font-size: 36px; line-height: 43px; margin-bottom: 5px;}

		.sidebar ul li a{color: #<?php echo $grad[10]; ?>;}
		.sidebar ul li a:hover, .tagcloud a:hover {color: <?php echo $options['highlight_color']; ?> !important;}
		.post-type-link{background: <?php echo $options['highlight_color']; ?>; padding: 20px; color: #FFF; font-family: "Tex_B"; font-size: 24px; font-weight: normal; line-height: 31px;}
		.post-type-quote{border-left: <?php echo $options['highlight_color']; ?> solid 5px; padding: 20px; background: #f8f8f8; font-family: Georgia; color: #999; font-size: 20px; line-height: 27px;}

		.liner { border-bottom: solid 8px <?php echo $options['highlight_color']; ?> !important;	}


		#comments-form input[type="text"], #comments-form textarea
		{
			color: <?php echo $options['highlight_color']; ?> !important;
			border: solid 3px <?php echo $options['highlight_color']; ?> !important;
		}
		.page-section a, .post_footer a, .cmntbox a{text-decoration: none !important; color: #<?php echo $grad[10]; ?>;}
		.page-section a:hover, .post_footer a:hover, .cmntbox a:hover{color: <?php echo $options['highlight_color']; ?>;}



		/*calendar*/

		#wp-calendar{
			width:100%;
			padding: 0px 0px;
			margin:0px 0px;
			border: <?php echo $options['highlight_color']; ?> solid 3px !important;
			color: #FFF !important;
			
			
		}
		#calendar_wrap{

			margin:0px auto;
			margin-top: 10px;
			
		}

		#wp-calendar caption{
			padding: 10px 5px 10px 5px ;
			font-size:22px;
			color:#FFF;
			text-transform: uppercase;
			border-bottom: rgba(0,0,0,.2) solid 3px;
			background: <?php echo $options['highlight_color']; ?> !important;
			
		}
		#wp-calendar thead{
			margin-bottom: 10px;
			background: <?php echo $options['highlight_color']; ?> !important;
		}
		
		#wp-calendar th{
			color: #FFF !important;
			
		}

		#wp-calendar th, #wp-calendar td{
			padding: 5px;
			text-align:center;
			
			background: #<?php echo $grad[4]; ?>;
		}
		#wp-calendar td{
			color:<?php echo $options['highlight_color']; ?> !important;
		}

		#wp-calendar td a{

			padding: 0px;
			border:none;
			color:#<?php echo $grad[4]; ?>;
			
		}
		#wp-calendar td a:hover{text-shadow:0px 0px 6px #FFF; text-decoration: none;}
		#wp-calendar td{
			background:transparent;
			border:none;
			color:#CCC;
		}
		#wp-calendar td, table#wp-calendar th{
			padding: 2px 0;
		}

		#searchform input[type="text"]
		{
		    border-radius:0px;
		    border: 3px solid <?php echo $options['highlight_color']; ?> !important;
		    color: <?php echo $options['highlight_color']; ?> !important;
		    font-family: "Roboto_L";
		    font-size: 16px;
		    font-weight: normal;
		    line-height: 27px;
		    padding: 11px;
		    padding-bottom: 12px;
		    text-transform: uppercase;
		    width: 245px;
		    box-shadow: none !important;
		}

	</style>