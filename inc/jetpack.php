<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Dara
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/responsive-videos/
 */
function dara_jetpack_setup() {
	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => 'content',
		'author-bio'   => true,
		'post-details' => array(
			'stylesheet' => 'dara-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
		),
		'featured-images' => array(
			'archive'          => true, // enable or not the featured image check for archive pages: true or false
			'post'             => true, // enable or not the featured image check for single posts: true or false
			'page'             => true, // enable or not the featured image check for single pages: true or false
			'fallback'         => true,
			'fallback-default' => false,
		),
	) );

}
add_action( 'after_setup_theme', 'dara_jetpack_setup' );

function dara_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() )
		return false;

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'dara_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) )
		return false;

	if ( $minimum > count( $featured_posts ) )
		return false;

	return true;
}

/**
 * Return early if Author Bio is not available.
 */
function dara_author_bio() {
	if ( ! function_exists( 'jetpack_author_bio' ) ) {
		get_template_part( 'components/post/content', 'author' );
	} else {
		jetpack_author_bio();
	}
}

/**
 * Author Bio Avatar Size.
 */
function dara_author_bio_avatar_size() {
	return 90;
}
add_filter( 'jetpack_author_bio_avatar_size', 'dara_author_bio_avatar_size' );

/**
 * Custom function to check for a post thumbnail;
 * If Jetpack is not available, fall back to has_post_thumbnail()
 */
function dara_has_post_thumbnail( $post = null ) {
	if ( function_exists( 'jetpack_has_featured_image' ) ) {
		return jetpack_has_featured_image( $post );
	} else {
		return has_post_thumbnail( $post );
	}
}