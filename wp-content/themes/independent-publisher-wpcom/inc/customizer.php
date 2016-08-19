<?php
/**
 * Independent Publisher Theme Customizer
 *
 * @package Independent_Publisher
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function independent_publisher_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'independent_publisher_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'independent-publisher' ),
		'priority' => 130,
	) );

    $wp_customize->add_setting( 'independent_publisher_gravatar_email', array(
      'default'           => get_option( 'admin_email' ),
      'sanitize_callback' => 'independent_publisher_sanitize_email',
    ) );

    $wp_customize->add_control( 'independent_publisher_gravatar_email', array(
		'label'       => esc_html__( 'Gravatar', 'independent-publisher' ),
		'description' => sprintf( esc_html_x( 'Enter the email address associated with your %1$s, or Globally Recognized Avatar', 'independent-publisher' ),'<a href="https://gravatar.com" target="_blank">Gravatar</a>', 'Gravatar URL' ),
		'section'     => 'independent_publisher_theme_options',
		'type'        => 'text',
    ) );

	$wp_customize->add_setting( 'independent_publisher_display_gravatar', array(
		'default'           => true,
		'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'independent_publisher_display_gravatar', array(
		'label'   => esc_html__( 'Display Gravatar', 'independent-publisher' ),
		'section' => 'independent_publisher_theme_options',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'independent_publisher_use_cover_images', array(
		'default'           => true,
		'sanitize_callback' => 'independent_publisher_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'independent_publisher_use_cover_images', array(
		'label'       => esc_html__( 'Use Post Cover Images', 'independent-publisher' ),
		'description' => esc_html__( 'Display Featured Images in the site header area on single posts', 'independent-publisher' ),
		'section'     => 'independent_publisher_theme_options',
		'type'        => 'checkbox',
	) );
}
add_action( 'customize_register', 'independent_publisher_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function independent_publisher_customize_preview_js() {
	wp_enqueue_script( 'independent_publisher_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'independent_publisher_customize_preview_js' );

/**
 * Sanitizes customizer checkbox controls.
 *
 * @return bool
 */
function independent_publisher_sanitize_checkbox( $value ) {
	if ( is_bool( $value ) ) {
		return $value;
	} else {
		return (bool) $value;
	}
}

/**
 * Sanitizes customizer email inputs.
 *
 * @return bool
 */
function independent_publisher_sanitize_email( $value ) {
	if ( preg_match( '/ /', $value ) ) {
		return false;
	} else {
		return is_email( $value );
	}
}