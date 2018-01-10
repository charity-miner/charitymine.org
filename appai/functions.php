<?php
/**
 * Appai theme functions and definitions
 */


// File Security Check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Intialize Shape
 *
 */
require trailingslashit( get_template_directory() ) . 'inc/init.php';



function custom_wc_email_required_false( $fields ) {
    $fields['billing_email']['required'] = false;
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'custom_wc_email_required_false' );


// Hook in
add_filter( 'woocommerce_billing_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing_email']);

     return $fields;
}


// add_filter( 'default_checkout_billing_country', 'custom_wc_default_checkout_country' );
//
// function custom_wc_default_checkout_country() {
//   return 'GB'; // country code
// }

//
// add_filter( 'default_checkout_billing_country', 'change_default_checkout_country' );
// add_filter( 'default_checkout_billing_state', 'change_default_checkout_state' );
//
// function change_default_checkout_country() {
//   return 'XX'; // country code
// }
//
// function change_default_checkout_state() {
//   return 'XX'; // state code
// }



add_filter( 'default_checkout_billing_first_name', 'change_default_checkout_country');
add_filter( 'default_checkout_first_name', 'change_default_checkout_country');

function change_default_checkout_country() {
  return 'BD'; // country code
}

add_filter( 'woocommerce_checkout_fields' , 'mine_custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function mine_custom_override_checkout_fields( $fields ) {
     $fields['billing_country']['default'] = 'GB';
     return $fields;
}
