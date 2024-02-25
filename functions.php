<?php


// STYLES 
function my_theme_enqueue_styles() {


       // PARENT THEME : get_template_directory_uri() -- quality theme
       wp_enqueue_style('quality-style', get_template_directory_uri() . '/style.css');


       // CHILD THEME : get_stylesheet_directory_uri() -- quality child theme
       wp_enqueue_style( 'quality-child-style', get_stylesheet_directory_uri() . '/style.css', 
       array( 'quality-style' ) , wp_get_theme()->get( 'Version' ) // This only works if you have Version defined in the style header.
       );


}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );




// UPDATE POST TEXT 
function update_post_text_cb( $post_text , $post){

       $post_text = "Inserisci il testo del post qui ...";

       return $post_text ;

}

add_filter('default_content', 'update_post_text_cb' , 10, 2);