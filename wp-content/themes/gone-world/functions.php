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


function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}


/*
* Custom Post Type "Itinéraire" regroupant plusieurs parcours pour un article de type "parcours"
*/

function itineraire_custom_post_type() {

  $labels = array(
    'name'                => _x( 'Itinéraires', 'Post Type General Name'),
    'singular_name'       => _x( 'Itinéraire', 'Post Type Singular Name'),
    'menu_name'           => __( 'Itinéraires'),
    'all_items'           => __( 'Tous les Itinéraires'),
    'view_item'           => __( 'Voir les Itinéraires'),
    'add_new_item'        => __( 'Ajouter un nouvel Itinéraire'),
    'add_new'             => __( 'Ajouter'),
    'edit_item'           => __( 'Editer l\'Itinéraire'),
    'update_item'         => __( 'Modifier l\'Itinéraire'),
    'search_items'        => __( 'Rechercher un Itinéraire'),
    'not_found'           => __( 'Non trouvé'),
    'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
  );
  
  $args = array(
    'label'               => __( 'Itinéraires'),
    'description'         => __( 'Liste des Itinéraires'),
    'labels'              => $labels,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'supports'            => array( 'title', ),
    /* 
    * Différentes options supplémentaires
    */  
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => true,
    'rewrite'       => array( 'slug' => 'itineraire'),

  );
  
  // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
  register_post_type( 'itineraire', $args );

}

add_action( 'init', 'itineraire_custom_post_type', 0 );


/*
* Custom Post Type "Parcours" qui correspond à une partie d'un itinéraire
*/

function parcours_custom_post_type() {

  $labels = array(
    'name'                => _x( 'Parcours', 'Post Type General Name'),
    'singular_name'       => _x( 'Parcours', 'Post Type Singular Name'),
    'menu_name'           => __( 'Parcours'),
    'all_items'           => __( 'Tous les Parcours'),
    'view_item'           => __( 'Voir les Parcours'),
    'add_new_item'        => __( 'Ajouter un nouvel Parcours'),
    'add_new'             => __( 'Ajouter'),
    'edit_item'           => __( 'Editer le Parcours'),
    'update_item'         => __( 'Modifier le Parcours'),
    'search_items'        => __( 'Rechercher un Parcours'),
    'not_found'           => __( 'Non trouvé'),
    'not_found_in_trash'  => __( 'Non trouvé dans la corbeille'),
  );
  
  $args = array(
    'label'               => __( 'Parcours'),
    'description'         => __( 'Liste des Parcours'),
    'labels'              => $labels,
    // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
    'supports'            => array( 'title', ),
    /* 
    * Différentes options supplémentaires
    */  
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => true,
    'rewrite'       => array( 'slug' => 'parcours'),

  );
  
  // On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
  register_post_type( 'parcours', $args );

}

add_action( 'init', 'parcours_custom_post_type', 0 );


 
add_action( 'loop_start', 'jptweak_remove_share' );

