<?php

	// The maximum number of results to be shown for news and events
	define('MAXIMUM_NO_OF_HOME_POSTS',5);



	/**
	 *	Load the scripts and styles needed by the theme 
	 * 
	 */
	function load_scripts(){
		wp_enqueue_style("main-style", get_stylesheet_uri());
		wp_enqueue_script("main-script", get_template_directory_uri()."/scripts/script.js",array("jquery"),TRUE);		
	
	}
	
	/**
	 *	If  the admin bar is hidden, adjust the position of the header accordingly to occupy
	 *	the empty space.
	 */
	function adjust_header(){
		if ( !is_admin_bar_showing() ) {
			echo '<style type="text/css">';
			echo '#header-wrapper {top:0;}';
			echo '</style>';
		}
	}
	
	add_action("wp_head","adjust_header");
	add_action("wp_enqueue_scripts","load_scripts");
	
	
	/**
	 *	Retrieves the ID of the first post using the given custom page template 
	 * 
	 * Params
	 * 	@string template_name the name of the custom page template which can be found under /page-templates directory 
	 * 
	 */
	function getPageIDFromTemplate($template_name){
		$args = array(
				'posts_per_page' => '1',
				'post_type' => 'page',
				'post_status' => 'publish',
				'meta_query' => array(
						array(
								'key' => '_wp_page_template',
								'value' => 'page-templates/page_'.$template_name.'.php',
						)
				)
		);
		$my_query = new WP_Query($args);
		$pid = $my_query->get_posts();
		unset($my_query);
		return $pid[0]->ID;
	}
	
	