<?php
/**
 * Dara functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dara
 */

if ( ! function_exists( 'dara_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dara_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */

		 add_theme_support( 'post-thumbnails' );

		// Post thumbnails
		add_image_size( 'dara-featured-image', 880, 312, true );
		// Hero Image on the front page slider
		add_image_size( 'dara-hero-thumbnail', 1180, 300, true );
		// Full width and grid page template
		add_image_size( 'dara-page-thumbnail', 1180, 435, true );
		// Grid child page thumbnail
		add_image_size( 'dara-grid-thumbnail', 360, 242, true );
		// Testimonial thumbnail
		add_image_size( 'dara-testimonial-thumbnail', 180, 180, true );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__( 'Header', 'dara' ),
            )
        );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-2' => esc_html__( 'Footer', 'dara' ),
            )
        );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for excerpts on pages
		add_post_type_support( 'page', 'excerpt' );
	}
endif;
add_action( 'after_setup_theme', 'dara_setup' );

/**
 * Enqueue scripts and styles.
 */
function dara_scripts() {
	wp_enqueue_style( 'dara-style', get_stylesheet_uri() );

	// Gutenberg styles
	wp_enqueue_style( 'dara-blocks', get_template_directory_uri() . '/blocks.css' );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/assets/genericons/genericons.css', array(), '3.4.1' );

    wp_enqueue_script( 'dara-h5p', get_template_directory_uri() . '/assets/js/h5p.js', array(), '20151215', true );

    wp_enqueue_script( 'dara-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dara-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dara_scripts' );

/**
 * Gutenberg Editor Styles
 */
function dara_editor_styles() {
	wp_enqueue_style( 'dara-editor-block-style', get_template_directory_uri() . '/editor-blocks.css' );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3' );
}
add_action( 'enqueue_block_editor_assets', 'dara_editor_styles' );

if ( ! function_exists( 'dara_continue_reading_link' ) ) :
	/**
	 * Returns an ellipsis and "Continue reading" plus off-screen title link for excerpts
	 */
	function dara_continue_reading_link() {
		return '&hellip; <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( 'Continue reading <span class="screen-reader-text">%1$s</span>', 'dara' ), esc_attr( strip_tags( get_the_title() ) ) ) . '</a>';
	}
endif; // dara_continue_reading_link

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with dara_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function dara_auto_excerpt_more() {
	if ( is_admin() ) {
		return;
	}

	return dara_continue_reading_link();
}
add_filter( 'excerpt_more', 'dara_auto_excerpt_more' );

/**
 * Add tag support to pages.
 */
function tags_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'tags_support_all');

/**
 * Ensure all tags are included in queries.
 */
function tags_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}
add_action('pre_get_posts', 'tags_support_query');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

