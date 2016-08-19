<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Independent_Publisher
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function independent_publisher_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a has-cover-image class if post or page has a cover image.
	if ( is_single() && independent_publisher_has_cover_image() ) {
		$classes[] = 'has-cover-image';
	}

	// Adds a has-header-image class if there's a header image set.
	if ( independent_publisher_has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Adds a class if are no widgets to render in main sidebar.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_404() ) {
		$classes[] = 'has-sidebar';
	}

	// Adds a gravatar-logo-disabled when gravatar display is disabled.
	if  ( false === get_theme_mod( 'independent_publisher_display_gravatar', true ) ) {
		$classes[] = 'gravatar-logo-disabled';
	}

	return $classes;
}
add_filter( 'body_class', 'independent_publisher_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the post
 * @return array
 */
function independent_publisher_post_class( $classes ) {
	$content = get_post_field( 'post_content', get_the_ID() );
	if ( empty( $content ) ) {
		$classes[] = 'empty-content';
	}
	return $classes;
}
add_filter( 'post_class', 'independent_publisher_post_class' );