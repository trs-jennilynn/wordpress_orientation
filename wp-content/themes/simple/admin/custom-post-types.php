<?php
function simple_post_types() 
{
	/*---Portfolio custom post ----*/
	register_post_type( 'portfolio_item',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ,'simplelang'),
				'singular_name' => __( 'Project' ,'simplelang'),
				'add_new' => __( 'Add New Project' ,'simplelang'),
				'add_new_item' => __( 'Add New Project' ,'simplelang'),
				'edit' => __( 'Edit Project','simplelang' ),
				'edit_item' => __( 'Edit Project','simplelang' ),
			),
			'description' => __( 'Portfolio Items.','simplelang' ),
			'public' => true,
			'supports' => array( 'title', 'thumbnail' ),
			'rewrite' => array( 'slug' => 'simple-portfolio', 'with_front' => false ),
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 100,
			'menu_icon' => get_template_directory_uri() . '/admin/options/img/custom/glyphicons_155_show_thumbnails.png',
		)
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio_item' ),
	array( 'hierarchical' => true, 'label' => "Categories","singular_label" => "Category" ) );	
}

function simple_team()
{

		/*---Slider custom post ----*/
	register_post_type('team',
		array(
			'labels' => array(
				'name' => __( 'Team' ,'simplelang'),
				'singular_name' => __( 'Team' ,'simplelang'),
				'add_new' => __( 'Add Member' ,'simplelang'),
				'add_new_item' => __( 'Add Member' ,'simplelang'),
				'edit' => __( 'Edit Member','simplelang' ),
				'edit_item' => __( 'Edit Member','simplelang' ),
			),
			'description' => __( 'Team Members.','simplelang' ),
			'public' => true,
			'supports' => array( 'title', 'thumbnail'),
			'rewrite' => array( 'slug' => 'simple-team', 'with_front' => false ),
			'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 100,
            'menu_icon' => get_template_directory_uri() . '/admin/options/img/custom/glyphicons_043_group1x1.png',
		)
	);
}

?>
