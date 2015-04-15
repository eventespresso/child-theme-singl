<?php
/**
 * Singl functions and definitions
 *
 * @package Singl
 */

/**
 * Set up a custom default background.
 */
add_action ( 'after_setup_theme', 'ee_check_blog_registered_on_after_setup_theme' );
function ee_check_blog_registered_on_after_setup_theme() {
	if ( function_exists( 'get_blog_details' ) ) {
		$details = get_blog_details( get_current_blog_id() );
		if ( $details && isset( $details->registered ) ) {
			if ( strtotime( $details->registered ) > strtotime( '2015-04-15 12:00:00' ) ) { // only change the default if this is a new site
				add_filter( 'singl_custom_background_args', 'ee_single_custom_background_args' );
			}
		}
	}
}

function ee_single_custom_background_args() {
	$defaults = array(
		'default-position'   => 'center',
		'default-repeat'     => 'no-repeat',
		'default-attachment' => 'fixed',
		'default-image'      => '',
		'default-color'      => '61b1d8',
	);
	return $defaults;
}