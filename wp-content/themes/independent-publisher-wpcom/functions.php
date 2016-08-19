<?php
/**
 * Independent Publisher functions and definitions
 *
 * @package Independent_Publisher
 */

if ( ! function_exists( 'independent_publisher_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function independent_publisher_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Independent Publisher, use a find and replace
	 * to change 'independent-publisher' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'independent-publisher', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 430, true );
	add_image_size( 'independent-publisher-banner', 1440, 600, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'independent-publisher' ),
		'social' => esc_html__( 'Social Menu', 'independent-publisher' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'independent_publisher_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'editor-style.css', 'genericons/genericons.css', independent_publisher_fonts_url() ) );
}
endif; // independent_publisher_setup
add_action( 'after_setup_theme', 'independent_publisher_setup' );

if ( ! function_exists( 'independent_publisher_word_count' ) ) :
/**
 * Gets the number of words in the post content.
 *
 * @link http://php.net/str_word_count
 * @link http://php.net/number_format
 */
function independent_publisher_word_count() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$count   = str_word_count( strip_tags( $content ) );
	return number_format( $count );
}
endif; // independent_publisher_word_count

if ( ! function_exists( 'independent_publisher_fonts_url' ) ) :
/**
 * Register Google Fonts.
 */
function independent_publisher_fonts_url() {
	$fonts_url = '';

	/*
	* Translators: If there are characters in your language that are not
	* supported by PT Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$pt_sans = _x( 'on', 'PT Sans font: on or off', 'independent-publisher' );

	/*
	* Translators: If there are characters in your language that are not
	* supported by PT Serif, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$pt_serif = _x( 'on', 'PT Serif font: on or off', 'independent-publisher' );

	if ( 'off' !== $pt_sans || 'off' !== $pt_serif ) {
		$font_families = array();

		if ( 'off' !== $pt_sans ) {
			$font_families[] = 'PT Sans:400,700,400italic,700italic';
		}

		if ( 'off' !== $pt_serif ) {
			$font_families[] = 'PT Serif:400,700,400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif; // independent_publisher_fonts_url

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function independent_publisher_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'independent_publisher_content_width', 700 );
}
add_action( 'after_setup_theme', 'independent_publisher_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function independent_publisher_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'independent-publisher' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'independent_publisher_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function independent_publisher_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'independent-publisher-fonts', independent_publisher_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.1' );

	wp_enqueue_style( 'independent-publisher-style', get_stylesheet_uri() );

	wp_enqueue_script( 'independent-publisher-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150612', true );

	if ( independent_publisher_show_site_branding() ) {
		wp_enqueue_script( 'independent-publisher-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	} else {
		wp_enqueue_script( 'independent-publisher-navigation', get_template_directory_uri() . '/js/slide-navigation.js', array(), '20150615', true );
	}

	wp_enqueue_script( 'independent-publisher-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() ) {
		if ( comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( wp_attachment_is_image() ) {
			wp_enqueue_script( 'independent-publisher-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20150611' );
		}

		if ( independent_publisher_has_cover_image() ) {
			$banner_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'independent-publisher-banner' );
			$banner = $banner_src[0];

			wp_add_inline_style( 'independent-publisher-style', sprintf(
				'#post-cover-image { background: url("%s") no-repeat center; background-size: cover; background-attachment: scroll; }',
				esc_url( $banner )
			) );
		}
	}

	if ( independent_publisher_has_header_image() ) {
		wp_add_inline_style( 'independent-publisher-style', sprintf(
			'#hero-header { background: url("%s") no-repeat center; background-size: cover; background-attachment: scroll; }',
			esc_url( get_header_image() )
		) );
	}
}
add_action( 'wp_enqueue_scripts', 'independent_publisher_scripts' );

/**
 * Adds a `js` class to the `<html>` element when JavaScript is detected.
 *
 */
function independent_publisher_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'independent_publisher_javascript_detection', 0 );

/**
 * Returns true if a post cover can be displayed.
 *
 * @return bool
 */
function independent_publisher_has_cover_image() {
	if ( get_theme_mod( 'independent_publisher_use_cover_images', true ) && ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Returns true if the site branding section should be displayed.
 *
 * @return bool
 */
function independent_publisher_show_site_branding() {
	if ( is_singular() ) {
		// Returns true when no custom header background or featured image is set.
		return ! independent_publisher_has_cover_image() && ! independent_publisher_has_header_image();
	} else {
		// Returns true when there's no custom header background set.
		return ! independent_publisher_has_header_image();
	}
}

/**
 * Returns true if the word count can be displayed in posts.
 *
 * @return bool
 */
function independent_publisher_show_word_count() {
	$content = get_post_field( 'post_content', get_the_ID() );
	return '' ==  get_post_format() && in_array( get_post_type(), array( 'post', 'page' ) ) && ! empty( $content );
}

/**
 * Returns true if there's a header image set (also checks for post cover).
 *
 * @return bool
 */
function independent_publisher_has_header_image() {
	return (bool) get_header_image();
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
