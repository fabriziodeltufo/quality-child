<?php

function my_theme_enqueue_styles() {

       $parent_style = 'quality-style'; // parent theme

       wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

       wp_enqueue_style( 'quality-child-style', get_stylesheet_directory_uri() . '/style.css',
       array( $parent_style ),
       wp_get_theme()->get( 'Version' ) // This only works if you have Version defined in the style header.	
	);
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );