<?php

	// The maximum number of results to be shown for news and events
	define('MAXIMUM_NO_OF_POSTS',5);





	function load_scripts(){
		wp_enqueue_style("main-style", get_stylesheet_uri());
		wp_enqueue_script("main-script", get_template_directory_uri()."/scripts/script.js",array("jquery"),TRUE);
	}
	
	add_action("wp_enqueue_scripts","load_scripts");
	