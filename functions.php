<?php
// Register Custom Navigation Walker
require_once('vendor/bootstrap-nav-walker/wp-bootstrap-nav-walker.php');

// Nav Menus
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'charitymine' ),
  'footer' => __( 'Footer Menu', 'charitymine' ),
) );

// Enqueue Theme Scripts & Styles
function enqueue_charity_mine_scripts() {
  wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', null, '4.0.0' );
  wp_enqueue_style( 'font-awesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0' );
  wp_enqueue_style( 'style-css', get_stylesheet_uri() );
  wp_enqueue_script( 'coinhive-js', 'https://coinhive.com/lib/coinhive.min.js', null, null, true );
  wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/vendor/popper/popper.min.js', array('jquery'),'1.11.1', true );
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/resources/js/main.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_charity_mine_scripts' );