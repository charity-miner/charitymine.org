<?php
/**
*
* Bootstrap Nav Walker
*
* Includes the nav walker for use in wp_nav_menu()
*
**/

require_once('vendor/bootstrap-nav-walker/wp-bootstrap-nav-walker.php');


/**
*
* Register Navigation Menus
*
*	Creates Header & Footer menus for use in wp_nav_menu()
* Manage in WP admin under Appearance > Menus
*
**/

register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'charitymine' ),
  'footer' => __( 'Footer Menu', 'charitymine' ),
) );


/**
*
*	Enqueue Styles & Scripts
*
* Styles appended to wp_head; Scripts appended to wp_footer; jQuery registered through dependency
*
*	Bootstrap / Font Awesome / CoinHive / Popper / Main.js
*
**/

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


/**
*
* Javascript Helpers
*
*	Get user ID and public key and append to wp_footer
*
**/

function charity_mine_js_helpers() {

  $script = '<script type="text/javascript">';

  $script .= 'userID = ' . get_current_user_id() . ';';

  if ( get_theme_mod( 'charity_mine_coin_hive_public' ) ) {
    $script .= 'var publicKey = "' . get_theme_mod( 'charity_mine_coin_hive_public' ) . '";';
  }

  $script .= '</script>';

  echo $script;
}
add_action( 'wp_footer', 'charity_mine_js_helpers' );


/**
*
* Coin Hive Account Data
*
*	Calls Coinhive API and returns account data JSON.
* See main.js "Get & Show Coin Hive Account Stats"
*
**/

function charity_mine_get_coin_hive_account_data() {

  $secret_key = get_theme_mod( 'charity_mine_coin_hive_secret' );

  if (! $secret_key ) {
    echo false;
  }

  $response = wp_remote_get( "https://api.coinhive.com/stats/site?secret=" . $secret_key );

  if (! is_array( $response ) ) {
    echo false;
  }

  wp_send_json( $response['body'] );
}
add_action( 'wp_ajax_nopriv_coinhiveapi', 'charity_mine_get_coin_hive_account_data' );
add_action( 'wp_ajax_coinhiveapi', 'charity_mine_get_coin_hive_account_data' );


/**
*
* Customizer Settings
*
*	Adds Coin Hive Settings section and settings.
*
**/

function charity_mine_customizer_settings($wp_customize) {

  // New Settings Section
  $wp_customize->add_section('charity_mine_coin_hive', array(
    'title' => 'Coin Hive Settings',
    'description' => '',
    'priority' => 120,
  ));

  // Public Key
  $wp_customize->add_setting('charity_mine_coin_hive_public');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'charity_mine_coin_hive_public',
    array(
      'label' => 'Coin Hive Public Key',
      'section' => 'charity_mine_coin_hive',
      'settings' => 'charity_mine_coin_hive_public',
    ) )
  );

  // Secret Key
  $wp_customize->add_setting('charity_mine_coin_hive_secret');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'charity_mine_coin_hive_secret',
    array(
      'label' => 'Coin Hive Secret Key',
      'section' => 'charity_mine_coin_hive',
      'settings' => 'charity_mine_coin_hive_secret',
    ) )
  );
}
add_action('customize_register', 'charity_mine_customizer_settings');