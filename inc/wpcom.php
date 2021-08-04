<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Dara
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @global array $themecolors
 */
function dara_wpcom_setup() {
	global $themecolors;

	// Set theme colors for third party services.
	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'f2f2f2',
			'text'   => '444340',
			'link'   => '15b6b8',
			'url'    => '15b6b8',
		);
	}

	add_theme_support( 'print-style' );

}
add_action( 'after_setup_theme', 'dara_wpcom_setup' );

/* WordPress.com specific styles*/
function dara_wpcom_styles() {
	wp_enqueue_style( 'dara-wpcom-styles', get_template_directory_uri() . '/inc/style-wpcom.css', '26012017' );
}
add_action( 'wp_enqueue_scripts', 'dara_wpcom_styles' );
