<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Independent_Publisher
 */

/**
 * Add theme support for Jetpack features.
 */
function independent_publisher_jetpack_setup() {
	/*
	 * Add theme support for Infinite Scroll.
	 * See: https://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'independent_publisher_infinite_scroll_render',
		'footer'    => 'page',
	) );

	/*
	 * Add support for Responsive Videos
	 * See: https://jetpack.me/support/responsive-videos/
	 */
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'independent_publisher_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function independent_publisher_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}