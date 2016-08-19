<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php if ( get_header_image() ) : ?>
 * <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
 * 	<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
 * </a>
 * <?php endif; // End header image check. ?>
 *
 * @package Independent_Publisher
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses independent_publisher_header_style()
 * @uses independent_publisher_admin_header_style()
 * @uses independent_publisher_admin_header_image()
 */
function independent_publisher_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'independent_publisher_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '333332',
		'width'                  => 1440,
		'height'                 => 600,
		'flex-height'            => true,
		'wp-head-callback'       => 'independent_publisher_header_style',
		'admin-head-callback'    => 'independent_publisher_admin_header_style',
		'admin-preview-callback' => 'independent_publisher_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'independent_publisher_custom_header_setup' );

if ( ! function_exists( 'independent_publisher_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see independent_publisher_custom_header_setup().
 */
function independent_publisher_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="independent-publisher-custom-header-css" type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description,
		#hero-header #hero-social-navigation {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description,
		.social-navigation li a,
		.site-header .menu-toggle {
			color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
		.site-description {
			opacity: 0.8 !important;
		}
		.site-header .menu-toggle {
			border-color: #<?php echo esc_attr( $header_text_color ); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // independent_publisher_header_style

if ( ! function_exists( 'independent_publisher_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see independent_publisher_custom_header_setup().
 */
function independent_publisher_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
	</style>
<?php
}
endif; // independent_publisher_admin_header_style

if ( ! function_exists( 'independent_publisher_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see independent_publisher_custom_header_setup().
 */
function independent_publisher_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1><!-- .displaying-header-text -->
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div><!-- #heading -->
<?php
}
endif; // independent_publisher_admin_header_image
