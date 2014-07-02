<?php

	function load_scripts(){
		wp_enqueue_style("style", get_stylesheet_uri());
	}
	
	add_action("wp_enqueue_scripts","load_scripts");
	
	function  load_widgets(){

		register_sidebar( array(
			'name'          => 'Jumbo Box',
			'id'            => 'jumbo-box',
			'description'   => 'The jumbo box',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		) );
	}
	
	add_action("widgets_init", "load_widgets");