<?php
function my_theme_enqueue_styles() {

    $parent_style = 'blankslate';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function load_my_files() { 

   wp_enqueue_script('popper-js', get_stylesheet_directory_uri() . '/js/popper.min.js', array( 'jquery' )); 
   wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' )); 
   wp_enqueue_script('script-js', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' )); 
    
   wp_enqueue_style('bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array( 'jquery' ));
}
add_action('wp_enqueue_scripts', 'load_my_files'); 