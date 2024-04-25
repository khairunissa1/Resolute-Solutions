<?php
function resolute_solutions_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'resolute_solutions_enqueue_styles' );


//Registering custom posttype
function resolute_solutions_custom_post() {
	register_post_type('Portfolio',
		array(
			'labels'      => array(
				'name'          => _x('Portfolio', 'post type general name'),
			),
            $post_type => 'portfolio',
            //'post_type'  => 'portfolio',
            'supports' => array( 'title', 'editor', 'author', 'thumbnail','custom-fields'),
            'public'        => true,
            //'rewrite'  => [ 'slug' => 'portfolio' ],
            'rewrite' => array('slug' => 'portfolio'),
		)
	);
}
add_action('init', 'resolute_solutions_custom_post');

//Registering custom taxonomy
function resolute_solutions_register_taxonomy() {
    $labels = array(
        'name'              => _x( 'Project Category', 'taxonomy general name' ),
    );
    $args   = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'rewrite'           => [ 'slug' => 'project-category' ],
    );
    register_taxonomy( 'project category', [ 'portfolio' ], $args );
}
add_action( 'init', 'resolute_solutions_register_taxonomy' );