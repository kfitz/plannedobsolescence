<?php /*
===============================================================
Commentpress Theme Functions
===============================================================
AUTHOR			: Christian Wach <needle@haystack.co.uk>
LAST MODIFIED	: 06/10/2011
---------------------------------------------------------------
NOTES

---------------------------------------------------------------
*/





/**
 * Set the content width based on the theme's design and stylesheet.
 * This seems to be a Wordpress requirement - though rather dumb in the
 * context of our theme, which has a percentage-based default width.
 * I have arbitrarily set it to the default content-width when viewing
 * on a 1280px-wide screen.
 */
if ( !isset( $content_width ) ) { $content_width = 733; }





if ( ! function_exists( 'cp_setup' ) ):
/** 
 * @description: get an ID for the body tag
 * @todo: 
 *
 */
function cp_setup( 
	
) { //-->

	/** 
	 * Make Commentpress available for translation.
	 * Translations can be added to the /style/languages/ directory.
	 * If you're building a theme based on Commentpress, use a find and replace
	 * to change 'commentpress-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 
	
		'commentpress-theme', 
		get_template_directory() . '/style/languages' 
		
	);

	// add_custom_background function is deprecated in WP 3.4+
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '>=' ) ) {
		
		// -------------------------
		// TO DO: test 3.4 features
		// -------------------------
	
		// allow custom backgrounds
		add_theme_support( 'custom-background' );
		
		// allow custom header
		add_theme_support( 'custom-header', array( 
			
			'default-text-color' => 'eeeeee',
			'width' => apply_filters( 'cp_header_image_width', 940 ),
			'height' => apply_filters( 'cp_header_image_height', 67 ),
			'wp-head-callback' => 'cp_header',
			'admin-head-callback' => 'cp_admin_header' 
			
		) );
	
	} else {
	
		// retain old declarations for earlier versions
		add_custom_background();
	
		// header text colour
		define('HEADER_TEXTCOLOR', 'eeeeee');
		
		// set height and width
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'cp_header_image_width', 940 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'cp_header_image_height', 67 ) );
	
		// allow custom header images
		add_custom_image_header( 'cp_header', 'cp_admin_header' );
		
	}
	
	// auto feed links
	add_theme_support( 'automatic-feed-links' );
	
	// style the visual editor with editor-style.css to match the theme style
	add_editor_style();

	// testing the use of wp_nav_menu() - first we need to register it
	register_nav_menu( 'toc', __( 'Table of Contents', 'commentpress-theme' ) );

}
endif; // cp_setup

// add after theme setup hook
add_action( 'after_setup_theme', 'cp_setup' );






if ( ! function_exists( 'cp_enqueue_theme_styles' ) ):
/** 
 * @description: add front-end styles
 * @todo:
 *
 */
function cp_enqueue_theme_styles() {

	// init
	$dev = '';
	
	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		$dev = '.dev';
	}
	
	// if BuddyPress is enabled...
	if ( defined( 'BP_VERSION' ) ) {

		// add BuddyPress css
		wp_enqueue_style( 
			
			'cp_buddypress_css', 
			get_template_directory_uri() . '/style/css/bp-overrides'.$dev.'.css'
			
		);
	
	}
	
}
endif; // cp_enqueue_theme_styles

// add a filter for the above
add_filter( 'wp_enqueue_scripts', 'cp_enqueue_theme_styles', 40 );






if ( ! function_exists( 'cp_enqueue_print_styles' ) ):
/** 
 * @description: add front-end print styles
 * @todo:
 *
 */
function cp_enqueue_print_styles() {

	// init
	$dev = '';
	
	// check for dev
	if ( defined( 'SCRIPT_DEBUG' ) AND SCRIPT_DEBUG === true ) {
		$dev = '.dev';
	}
	
	// add child print css
	wp_enqueue_style( 
		
		'cp_print_css', 
		get_template_directory_uri() . '/style/css/print'.$dev.'.css',
		false,
		false,
		'print'
		
	);
	
}
endif; // cp_enqueue_print_styles

// add a filter for the above, very late so it (hopefully) is last in the queue
add_filter( 'wp_enqueue_scripts', 'cp_enqueue_print_styles', 100 );






if ( ! function_exists( 'cp_header' ) ):
/** 
 * @description: custom header
 * @todo: 
 *
 */
function cp_header( 
	
) { //-->

	// init (same as bg in layout.css and default in class_commentpress_db.php)
	$colour = '819565';

	// access plugin
	global $commentpress_obj;

	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// override
		$colour = $commentpress_obj->db->option_get_header_bg();
	
	}
	
	// init background-image
	$bg_image = '';
	
	// get header image
	$header_image = get_header_image();
	
	// do we have a background-image?
	if ( $header_image ) {
	
		$bg_image = 'background-image: url("'.$header_image.'");';
	
	}
	
    ?>
<style type="text/css">

#book_header
{
	background-color: #<?php echo $colour; ?>;
	<?php echo $bg_image; ?>
}

#title h1,
#title h1 a
{
	<?php 
	$_col = get_header_textcolor();
	if ( $_col == 'blank' OR $_col == '' ) {
	?>text-indent: -9999px;<?php
	} else {
	?>color: #<?php header_textcolor(); ?>;<?php
	} ?>
}

#book_header #tagline
{
	<?php 
	$_col = get_header_textcolor();
	if ( $_col == 'blank' OR $_col == '' ) {
	?>text-indent: -9999px;<?php
	} else {
	?>color: #<?php header_textcolor(); ?>;<?php
	} ?>
}

</style><?php

}
endif; // cp_header






if ( ! function_exists( 'cp_admin_header' ) ):
/** 
 * @description: custom admin header
 * @todo: 
 *
 */
function cp_admin_header( 
	
) { //-->

	// init (same as bg in layout.css and default in class_commentpress_db.php)
	$colour = '819565';

	// access plugin
	global $commentpress_obj;

	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// override
		$colour = $commentpress_obj->db->option_get_header_bg();
	
	}
	
	// try and recreate the look of the theme header
	?>
<style type="text/css">
    
.appearance_page_custom-header #headimg
{
	min-height: 67px;
}

#headimg
{
	background-color: #<?php echo $colour; ?>;
}

#headimg #name,
#headimg #desc
{
	margin-left: 20px; 
	font-family: Helvetica, Arial, sans-serif;
	font-weight: normal;
	line-height: 1;
	color: #<?php header_textcolor(); ?>;
}

#headimg h1
{
	margin: 0;
	padding: 0;
	padding-top: 7px;
}

#headimg #name
{
	font-size: 1.6em;
	text-decoration: none;
}

#headimg #desc
{
	padding-top: 3px;
	font-size: 1.2em;
	font-style :italic;
}

</style><?php

}
endif; // cp_admin_header






if ( ! function_exists( 'cp_get_header_image' ) ):
/** 
 * @description: deprecated function that was once intended as an automation method for setting a header image
 * @todo: inform users that header images will be using a different method in future
 *
 */
function cp_get_header_image( 
	
) { //-->

	// access plugin
	global $commentpress_obj;

	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) AND $commentpress_obj->db->option_get( 'cp_toc_page' ) ) {
	
		// set defaults
		$args = array(
		
			'post_type' => 'attachment',
			'numberposts' => 1,
			'post_status' => null,
			'post_parent' => $commentpress_obj->db->option_get( 'cp_toc_page' )
			
		);
		
		// get them...
		$attachments = get_posts( $args );
		
		// well?
		if ( $attachments ) {
		
			// we only want the first
			$attachment = $attachments[0];
		
		}
		
		// if we have an image
		if ( isset( $attachment ) ) { 
			
			// show it
			echo wp_get_attachment_image( $attachment->ID, 'full' );
						
		}
		
	}
	
}
endif; // cp_get_header_image






if ( ! function_exists( 'cp_get_body_id' ) ):
/** 
 * @description: get an ID for the body tag
 * @todo: 
 *
 */
function cp_get_body_id( 
	
) { //-->

	// init
	$_body_id = '';
	
	// is this multisite?
	if ( is_multisite() ) {
	
		// is this the main blog?
		if ( is_main_site() ) {
		
			// set main blog id
			$_body_id = ' id="main_blog"';
		
		}
		
	}
	
	// --<
	return $_body_id;
	
}
endif; // cp_get_body_id






if ( ! function_exists( 'cp_get_body_classes' ) ):
/** 
 * @description: get classes for the body tag
 * @todo: 
 *
 */
function cp_get_body_classes(

	$raw = false
	
) { //-->

	// init
	$_body_classes = '';
	
	// access post and plugin
	global $post, $commentpress_obj;



	// set default sidebar
	$sidebar_flag = 'toc';
	
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// get sidebar
		$sidebar_flag = $commentpress_obj->get_default_sidebar();
		
	}
	
	// set class by sidebar
	$sidebar_class = 'cp_sidebar_'.$sidebar_flag;
	


	// init layout class
	$layout_class = '';
	
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// is this the title page?
		if ( 
			
			// be more defensive
			is_object( $post )
			AND isset( $post->ID )
			AND $post->ID == $commentpress_obj->db->option_get( 'cp_welcome_page' ) 
			
		) {
		
			// init layout
			$layout = '';
			
			// set key
			$key = '_cp_page_layout';
			
			// if the custom field already has a value...
			if ( get_post_meta( $post->ID, $key, true ) != '' ) {
			
				// get it
				$layout = get_post_meta( $post->ID, $key, true );
				
			}
			
			// if wide layout...
			if ( $layout == 'wide' ) {
			
				// set layout class
				$layout_class = ' full_width';
				
			}
			
		}
		
	}


	
	// set default page type
	$page_type = '';
	
	// if blog post...
	if ( is_single() ) {
	
		// add blog post class
		$page_type = ' blog_post';
		
	}
	
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// is it a BP special page?
		if ( $commentpress_obj->is_buddypress_special_page() ) {
	
			// add buddypress page class
			$page_type = ' buddypress_page';
		
		}
		
		// is it a CP special page?
		if ( $commentpress_obj->db->is_special_page() ) {
	
			// add buddypress page class
			$page_type = ' commentpress_page';
		
		}
		
	}
	

	
	// set default type
	$blog_type = '';
	
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// get type
		$_type = $commentpress_obj->db->option_get( 'cp_blog_type' );
		
		// get workflow
		$_workflow = $commentpress_obj->db->option_get( 'cp_blog_workflow' );
		
		// allow plugins to override the blog type - for example if workflow is enabled, 
		// it might be a new blog type as far as buddypress is concerned
		$_blog_type = apply_filters( 'cp_get_group_meta_for_blog_type', $_type, $_workflow );

		// if it's not the main site, add class
		if ( is_multisite() AND !is_main_site() ) {
			$blog_type = ' blogtype-'.intval( $_blog_type );
		}
		
	}
	


	// construct attribute
	$_body_classes = $sidebar_class.$layout_class.$page_type.$blog_type;

	// if we want them wrapped, do so
	if ( !$raw ) {
		
		// preserve backwards compat for older child themes
		$_body_classes = ' class="'.$_body_classes.'"';

	}


	// --<
	return $_body_classes;
	
}
endif; // cp_get_body_classes






if ( ! function_exists( 'cp_blog_title' ) ):
/** 
 * @description: disable more link jump - from: http://codex.wordpress.org/Customizing_the_Read_More
 * @todo:
 *
 */
function cp_site_title( $sep = '', $echo = true ){

	// is this multisite?
	if ( is_multisite() ) {
	
		// if we're on a sub-blog
		if ( !is_main_site() ) {
			
			global $current_site;
			
			// print?
			if( $echo ) {
			
				// add site name
				echo ' '.trim($sep).' '.$current_site->site_name;
				
			} else {
			
				// add site name
				return ' '.trim($sep).' '.$current_site->site_name;
				
			}
			
		}
		
	}
	
}
endif; // cp_site_title






if ( ! function_exists( 'remove_more_jump_link' ) ):
/** 
 * @description: disable more link jump - from: http://codex.wordpress.org/Customizing_the_Read_More
 * @todo:
 *
 */
function remove_more_jump_link( $link ) { 

	$offset = strpos($link, '#more-');
	
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	
	// --<
	return $link;
	
}
endif; // remove_more_jump_link

// add a filter for the above
add_filter('the_content_more_link', 'remove_more_jump_link');






if ( ! function_exists( 'cp_page_navigation' ) ):
/** 
 * @description: builds a list of previous and next pages, optionally with comments
 * @todo: 
 *
 */
function cp_page_navigation( $with_comments = false ) {

	// declare access to globals
	global $commentpress_obj;
	
	
	
	// is the plugin active?
	if ( !is_object( $commentpress_obj ) ) {
	
		// --<
		return;
		
	}
	
	
	
	// init formatting
	$before_next = '<li class="alignright">';
	$after_next = ' </li>';
	$before_prev = '<li class="alignleft">';
	$after_prev = '</li>';
	
	
	
	// init
	$next_page_html = '';
	
	// get next page
	$next_page = $commentpress_obj->nav->get_next_page( $with_comments );
	
	//var_dump( $next_page );
	
	// did we get a next page?
	if ( is_object( $next_page ) ) {
	
		// init title
		$img = '';
		$title = 'Next page'; //htmlentities( $next_page->post_title );	
	
		// if we wanted pages with comments...
		if ( $with_comments ) {
		
			// set title
			$title = 'Next page with comments';
			$img = '<img src="'.get_bloginfo('template_directory').'/style/images/next.png" />';	

		}
		
		// define list item 
		$next_page_html = $before_next.
						  $img.'<a href="'.get_permalink( $next_page->ID ).'" id="next_page" class="css_btn" title="Next Page">'.$title.'</a>'.$after_next;
		
	}
	
	
	
	// init
	$prev_page_html = '';
	
	// get next page
	$prev_page = $commentpress_obj->nav->get_previous_page( $with_comments );
	
	// did we get a next page?
	if ( is_object( $prev_page ) ) {
		
		// init title
		$img = '';
		$title = 'Previous page'; //htmlentities( $prev_page->post_title );
	
		// if we wanted pages with comments...
		if ( $with_comments ) {
		
			// set title
			$title = 'Previous page with comments';
			$img = '<img src="'.get_bloginfo('template_directory').'/style/images/prev.png" />';
		
		}
		
		// define list item 
		$prev_page_html = $before_prev.
						  $img.'<a href="'.get_permalink( $prev_page->ID ).'" id="previous_page" class="css_btn" title="Previous Page">'.$title.'</a>'.$after_prev;
		
	}
	
	
	
	// init return
	$nav_list = '';
	
	// did we get either?
	if ( $next_page_html != '' OR $prev_page_html != '' ) {
	
		// construct nav list items
		$nav_list = $prev_page_html."\n".$next_page_html."\n";

	}
	
	
	
	// --<
	return $nav_list;

}
endif; // cp_page_navigation






if ( ! function_exists( 'cp_page_title' ) ):
/** 
 * @description: builds a list of previous and next pages, optionally with comments
 * @todo: 
 *
 */
function cp_page_title( $with_comments = false ) {

	// declare access to globals
	global $commentpress_obj, $post;
	
	
	
	// init
	$_title = '';
	$_sep = ' &#8594; ';
	
	
	//$_title .= get_bloginfo('name');
 
	if ( is_page() OR is_single() OR is_category() ) {

		if (is_page()) {

			$ancestors = get_post_ancestors($post);
 
			if ($ancestors) {
				$ancestors = array_reverse($ancestors);
 				
 				$_crumb = array();
 				
				foreach ($ancestors as $crumb) {
					$_crumb[] = get_the_title($crumb);
				}
				
				$_title .= implode( $_sep, $_crumb ).$_sep;
			}

		}
 
		if (is_single()) {
			//$category = get_the_category();
			//$_title .= $_sep.$category[0]->cat_name;
		}
 
		if (is_category()) {
			$category = get_the_category();
			$_title .= $category[0]->cat_name.$_sep;
		}
 
		// Current page
		if (is_page() OR is_single()) {
			$_title .= get_the_title();
		}

	}

	

	// --<
	return $_title;

}
endif; // cp_page_title





if ( ! function_exists( 'cp_has_page_children' ) ):
/** 
 * @description: query whether a given page has children
 * @todo: 
 *
 */
function cp_has_page_children( 

	$page_obj
	
) { //-->

	// init to look for published pages
	$defaults = array( 

		'post_parent' => $page_obj->ID,
		'post_type' => 'page', 
		'numberposts' => -1,
		'post_status' => 'publish'

	);
				
	// get page children
	$kids =& get_children( $defaults );
	
	// do we have any?
	return ( empty( $kids ) ) ? false : true;

}
endif; // cp_has_page_children






if ( ! function_exists( 'cp_get_children' ) ):
/** 
 * @description: retrieve comment children
 * @todo: 
 *
 */
function cp_get_children( 

	$comment,
	$page_or_post
	
) { //-->

	// declare access to globals
	global $wpdb;

	// construct query for comment children
	$query = "
	SELECT $wpdb->comments.*, $wpdb->posts.post_title, $wpdb->posts.post_name
	FROM $wpdb->comments, $wpdb->posts
	WHERE $wpdb->comments.comment_post_ID = $wpdb->posts.ID 
	AND $wpdb->posts.post_type = '$page_or_post' 
	AND $wpdb->comments.comment_approved = '1' 
	AND $wpdb->comments.comment_parent = '$comment->comment_ID' 
	ORDER BY $wpdb->comments.comment_date ASC
	";
	
	// does it have children?
	return $wpdb->get_results( $query );

}
endif; // cp_get_children






if ( ! function_exists( 'cp_get_comments' ) ):
/** 
 * @description: generate comments recursively
 * @todo: 
 *
 */
function cp_get_comments( 

	$comments,
	$page_or_post
	
) { //-->

	// declare access to globals
	global $cp_comment_output;



	// do we have any comments?
	if( count( $comments ) > 0 ) {
	
		// open ul
		$cp_comment_output .= '<ul>'."\n\n";

		// produce a checkbox for each
		foreach( $comments as $comment ) {
		
			// open li
			$cp_comment_output .= '<li>'."\n\n";
	
			// format this comment
			$cp_comment_output .= cp_format_comment( $comment );

			// get comment children
			$children = cp_get_children( $comment, $page_or_post );

			// do we have any?
			if( count( $children ) > 0 ) {

				// recurse
				cp_get_comments( $children, $page_or_post );

			}
			
			// close li
			$cp_comment_output .= '</li>'."\n\n";

		}

		// close ul
		$cp_comment_output .= '</ul>'."\n\n";

	}

}
endif; // cp_get_comments







if ( ! function_exists( 'cp_get_user_link' ) ):
/** 
 * @description: get user link in vanilla WP scenarios
 * @todo: 
 *
 */
function cp_get_user_link( 

	&$user
	
) { //-->

	/**
	 * In default single install mode, just link to their URL, unless 
	 * they are	an author, in which case we link to their author page.
	 *
	 * In multisite, the same.
	 *
	 * When BuddyPress is enabled, always link to their profile
	 */
	
	// kick out if not a user
	if ( !is_object( $user ) ) { return false; }
	
	// we're through: the user is on the system
	global $commentpress_obj;
	
	// if buddypress...
	if ( is_object( $commentpress_obj ) AND $commentpress_obj->is_buddypress() ) {
	
		// buddypress link ($no_anchor = null, $just_link = true)
		$url = bp_core_get_userlink( $user->ID, null, true );
		
	} else {
	
		// get standard WP author url
	
		// get author url
		$url = get_author_posts_url( $user->ID );
		//print_r( $url ); die();
		
		// WP sometimes leaves 'http://' or 'https://' in the field
		if (  $url == 'http://'  OR $url == 'https://' ) {
		
			// clear
			$url = '';
		
		}
		
	}
	
	
	
	// --<
	return $url;
	 
}
endif; // cp_get_user_link







if ( ! function_exists( 'cp_echo_post_meta' ) ):
/** 
 * @description: show user(s) in the loop
 * @todo: 
 *
 */
function cp_echo_post_meta() {

	// compat with Co-Authors Plus
	if ( function_exists( 'get_coauthors' ) ) {
	
		// get multiple authors
		$authors = get_coauthors();
		//print_r( $authors ); die();
		
		// if we get some
		if ( !empty( $authors ) ) {
		
			// have we got more than one?
			if ( count( $authors ) > 1 ) {
			
				// yes - are we showing avatars?
				if ( get_option('show_avatars') ) {
				
					// yes

					?>
					<div class="coauthors-plus-authors">
					<?php
					
					// loop
					foreach( $authors AS $author ) {
					
						?>
						<div class="coauthors-plus-author">
		
							<?php
							
							// get avatar
							echo get_avatar( $author->ID, $size='32' );
							
							?>
							
							<cite class="fn"><?php cp_echo_post_author( $author->ID ) ?></cite>
						
						</div>
		
						<?php
						
					}
					
					?>
					
					<p class="coauthors-date"><a href="<?php the_permalink() ?>"><?php the_time('l, F jS, Y') ?></a></p>
					
					</div>
					<?php
				
				} else {
				
					?><cite class="fn"><?php
					
					// use the Co-Authors format of "name, name, name and name"
					
					// init counter
					$n = 1;
					
					// find out how many author we have
					$author_count = count( $authors );
				
					// loop
					foreach( $authors AS $author ) {
						
						// default to comma
						$sep = ', ';
						
						// if we're on the penultimate
						if ( $n == ($author_count - 1) ) {
						
							// use ampersand
							$sep = __( ' &amp; ', 'commentpress-theme' );
							
						}
						
						// if we're on the last, don't add
						if ( $n == $author_count ) { $sep = ''; }
						
						// echo name
						cp_echo_post_author( $author->ID );
						
						// and separator
						echo $sep;
						
						// increment
						$n++;
						
					}
					
					?></cite>
					
					<p class="coauthors-date"><a href="<?php the_permalink() ?>"><?php the_time('l, F jS, Y') ?></a></p>
					
					<?php
				
				} // end show_avatars check
				
			} else {
			
				// just the one author, revert to standard display method
			
				// get avatar
				$author_id = get_the_author_meta( 'ID' );
				echo get_avatar( $author_id, $size='32' );
				
				?>
				
				<cite class="fn"><?php cp_echo_post_author( $author_id ) ?></cite>
				
				<p><a href="<?php the_permalink() ?>"><?php the_time('l, F jS, Y') ?></a></p>
				
				<?php 
		
			}
			
		}
	
	} else {
	
		// get avatar
		$author_id = get_the_author_meta( 'ID' );
		echo get_avatar( $author_id, $size='32' );
		
		?>
		
		<cite class="fn"><?php cp_echo_post_author( $author_id ) ?></cite>
		
		<p><a href="<?php the_permalink() ?>"><?php the_time('l, F jS, Y') ?></a></p>
		
		<?php 
	
	}

}
endif; // cp_echo_post_meta







if ( ! function_exists( 'cp_echo_post_author' ) ):
/** 
 * @description: show username (with link) in the loop
 * @todo: 
 *
 */
function cp_echo_post_author( $author_id ) {

	// get author details
	$user = get_userdata( $author_id );
	
	// kick out if we don't have a user with that ID
	if ( !is_object( $user ) ) { return; }
	
	
	
	// access plugin
	global $commentpress_obj, $post;

	// if we have the plugin enabled and it's BP
	if ( is_object( $post ) AND is_object( $commentpress_obj ) AND $commentpress_obj->is_buddypress() ) {
	
		// construct user link
		echo bp_core_get_userlink( $user->ID );

	} else {
	
		// link to theme's author page
		$link = sprintf(
			'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
			get_author_posts_url( $user->ID, $user->user_nicename ),
			esc_attr( sprintf( __( 'Posts by %s' ), $user->display_name ) ),
			esc_html( $user->display_name )
		);
		echo apply_filters( 'the_author_posts_link', $link );

	}
		
}
endif; // cp_echo_post_author







if ( ! function_exists( 'cp_format_comment' ) ):
/** 
 * @description: format comment on comments pages
 * @todo: 
 *
 */
function cp_format_comment( $comment, $context = 'all' ) {

	// declare access to globals
	global $wpdb, $commentpress_obj, $cp_comment_output;

	// enable Wordpress API on comment
	//$GLOBALS['comment'] = $comment;


	// if context is 'all comments'...
	if ( $context == 'all' ) {
	
		// get author
		if ( $comment->comment_author != '' ) {
		
			// was it a registered user?
			if ( $comment->user_id != '0' ) {
			
				// get user details
				$user = get_userdata( $comment->user_id );
				//print_r( $user->display_name ); die();
				
				// get user link
				$user_link = cp_get_user_link( $user );
				
				// construct link to user url
				$_context = ( $user_link != '' AND $user_link != 'http://' ) ? 
							'by <a href="'.$user_link.'">'.$comment->comment_author.'</a>' : 
							'by '.$comment->comment_author;
				
			} else {
			
				// construct link to commenter url
				$_context = ( $comment->comment_author_url != '' AND $comment->comment_author_url != 'http://' ) ? 
							'by <a href="'.$comment->comment_author_url.'">'.$comment->comment_author.'</a>' : 
							'by '.$comment->comment_author;
				
			}
			
			
		} else { 
		
			// we don't have a name
			$_context = 'by Anonymous';
			
		}
	
	// if context is 'by commenter'
	} elseif ( $context == 'by' ) {
	
		// construct link
		$_page_link = trailingslashit( get_permalink( $comment->comment_post_ID ) );
		
		// construct context
		$_context = 'on <a href="'.$_page_link.'">'.$comment->post_title.'</a>';
	
	}
	
	// construct link
	$_comment_link = get_comment_link( $comment->comment_ID );

	// comment header
	$_comment_meta = '<div class="comment_meta"><a href="'.$_comment_link.'" title="See comment in context">Comment</a> '.$_context.' on '.date('F jS, Y',strtotime($comment->comment_date)).'</div>'."\n";

	// comment content
	$_comment_body = '<div class="comment_content">'.wpautop(convert_chars(wptexturize($comment->comment_content))).'</div>'."\n";
	
	// construct comment
	return '<div class="comment_wrapper">'."\n".$_comment_meta.$_comment_body.'</div>'."\n\n";
	
}
endif; // cp_format_comment






if ( ! function_exists( 'cp_get_all_comments_content' ) ):
/** 
 * @description: all-comments page display function
 * @todo: 
 *
 */
function cp_get_all_comments_content( $page_or_post = 'page' ) {

	// declare access to globals
	global $wpdb, $commentpress_obj, $cp_comment_output;

	// init page content
	$_page_content = '';
	
	
	
	// construct query
	$querystr = "
	SELECT $wpdb->comments.*, $wpdb->posts.post_title, $wpdb->posts.post_name, $wpdb->posts.comment_count
	FROM $wpdb->comments, $wpdb->posts
	WHERE $wpdb->comments.comment_post_ID = $wpdb->posts.ID 
	AND $wpdb->posts.post_type = '$page_or_post' 
	AND $wpdb->comments.comment_approved = '1' 
	AND $wpdb->comments.comment_parent = '0' 
	AND $wpdb->comments.comment_type != 'pingback' 
	ORDER BY $wpdb->posts.comment_count DESC, $wpdb->comments.comment_post_ID, $wpdb->comments.comment_date ASC
	";
	
	//echo $querystr; exit();
	
	
	// get data
	$_data = $wpdb->get_results($querystr, OBJECT);
	
	
	
	// did we get any?
	if ( count( $_data ) > 0 ) {
	
	
	
		// open ul
		$_page_content .= '<ul class="all_comments_listing">'."\n\n";
		
		// init title
		$_title = '';
	
		// init global comment output
		$cp_comment_output = '';
		
		// loop
		foreach ($_data as $comment) {
		
	
	
			// show page title, if not shown
			if ( $_title != $comment->post_title ) {
			
				// if not first...
				if ( $_title != '' ) {
				
					// close ul
					$_page_content .= '</ul>'."\n\n";
					
					// close item div
					$_page_content .= '</div><!-- /item_body -->'."\n\n";
					
					// close li
					$_page_content .= '</li><!-- /page li -->'."\n\n\n\n";
					
				}
		
				// open li
				$_page_content .= '<li><!-- page li -->'."\n\n";
				
				// count comments
				if ( $comment->comment_count > 1 ) { $_comment_count_text = 'comments'; } else { $_comment_count_text = 'comment'; }
		
				// show it
				$_page_content .= '<h3>'.$comment->post_title.' <span>('.$comment->comment_count.' '.$_comment_count_text.')</span></h3>'."\n\n";
	
				// open comments div
				$_page_content .= '<div class="item_body">'."\n\n";
				
				// open ul
				$_page_content .= '<ul>'."\n\n";
		
				// set mem
				$_title = $comment->post_title;
	
			}
		
			
			// open li
			$_page_content .= '<li><!-- item li -->'."\n\n";
	
			// show the comment
			$_page_content .= cp_format_comment( $comment );
		
			// get comment children
			$children = cp_get_children( $comment, $page_or_post );
			
			// do we have any?
			if( count( $children ) > 0 ) {
	
				// recurse
				cp_get_comments( $children, $page_or_post );
				
				// show them
				$_page_content .= $cp_comment_output;
				
				// clear global comment output
				$cp_comment_output = '';
				
			}
			
			// close li
			$_page_content .= '</li><!-- /item li -->'."\n\n";
	
		
			
		}
	
		// close ul
		$_page_content .= '</ul>'."\n\n";
		
		// close item div
		$_page_content .= '</div><!-- /item_body -->'."\n\n";
		
		// close li
		$_page_content .= '</li><!-- /page li -->'."\n\n\n\n";
		
		// close ul
		$_page_content .= '</ul><!-- /all_comments_listing -->'."\n\n";
	
	}
	
	
	
	// --<
	return $_page_content;
	
}
endif; // cp_get_all_comments_content
	
	
	



if ( ! function_exists( 'cp_get_all_comments_page_content' ) ):
/** 
 * @description: all-comments page display function
 * @todo: 
 *
 */
function cp_get_all_comments_page_content() {

	// declare access to globals
	global $commentpress_obj;

	
	
	// set default
	$pagetitle = apply_filters( 
		'cp_page_all_comments_title', 
		__( 'All Comments', 'commentpress-theme' )
	);

	// set title
	$_page_content = '<h2 class="post_title">'.$pagetitle.'</h2>'."\n\n";
	


	// get page or post
	$page_or_post = $commentpress_obj->get_list_option();
	
	
	
	// set default
	$blogtitle = apply_filters( 
		'cp_page_all_comments_blog_title', 
		__( 'Comments on the Blog', 'commentpress-theme' )
	);

	// set default
	$booktitle = apply_filters( 
		'cp_page_all_comments_book_title', 
		__( 'Comments on the Book', 'commentpress-theme' )
	);

	// get title
	$title = ( $page_or_post == 'page' ) ? $booktitle : $blogtitle;
	
	// set title
	$_page_content .= '<p class="comments_hl">'.$title.'</p>'."\n\n";
	
	// get data
	$_page_content .= cp_get_all_comments_content( $page_or_post );
	
	
	
	// get data for other page type
	$other_type = ( $page_or_post == 'page' ) ? 'post': 'page';
	
	// get title
	$title = ( $page_or_post == 'page' ) ? $blogtitle : $booktitle;
	
	// set title
	$_page_content .= '<p class="comments_hl">'.$title.'</p>'."\n\n";
	
	// get data
	$_page_content .= cp_get_all_comments_content( $other_type );
	
	
	
	// --<
	return $_page_content;
	
}
endif; // cp_get_all_comments_page_content

	
	



if ( ! function_exists( 'cp_get_comments_by_content' ) ):
/** 
 * @description: comments-by page display function
 * @todo: do we want trackbacks?
 *
 */
function cp_get_comments_by_content() {

	// declare access to globals
	global $wpdb, $commentpress_obj;

	// init page content
	$_page_content = '';
	
	
	
	// construct query
	$querystr = "
	SELECT $wpdb->comments.*, $wpdb->posts.post_title, $wpdb->posts.post_name
	FROM $wpdb->comments, $wpdb->posts
	WHERE $wpdb->comments.comment_post_ID = $wpdb->posts.ID 
	AND $wpdb->comments.comment_type != 'pingback' 
	AND $wpdb->comments.comment_approved = '1' 
	ORDER BY $wpdb->comments.comment_author, $wpdb->posts.post_title, $wpdb->comments.comment_post_ID, $wpdb->comments.comment_date ASC
	";
	
	//echo $querystr; exit();
	
	
	// get data
	$_data = $wpdb->get_results( $querystr, OBJECT );
	
	//print_r( $_data ); exit();
	
	
	// did we get any?
	if ( count( $_data ) > 0 ) {
	
	
	
		// open ul
		$_page_content .= '<ul class="all_comments_listing">'."\n\n";
		
		// init title
		$_title = '';
	
		// loop
		foreach ($_data as $comment) {
		
			// test for anonymous comment (usually generated by WP itself in multisite installs)
			if ( empty( $comment->comment_author ) ) {
			
				$comment->comment_author = 'Anonymous';
			
			}
	
			// show commenter, if not shown
			if ( $_title != $comment->comment_author ) {
			
				// if not first...
				if ( $_title != '' ) {
				
					// close ul
					$_page_content .= '</ul>'."\n\n";
					
					// close item div
					$_page_content .= '</div><!-- /item_body -->'."\n\n";
					
					// close li
					$_page_content .= '</li><!-- /author li -->'."\n\n\n\n";
					
				}
		
				// open li
				$_page_content .= '<li><!-- author li -->'."\n\n";
				
				// count comments
				//if ( $comment->comment_count > 1 ) { $_comment_count_text = 'comments'; } else { $_comment_count_text = 'comment'; }
		
				// show it --  <span>('.$comment->comment_count.' '.$_comment_count_text.')</span>
				
				// add gravatar
				$_page_content .= '<h3>'.get_avatar( $comment, $size='24' ).$comment->comment_author.'</h3>'."\n\n";
	
				// open comments div
				$_page_content .= '<div class="item_body">'."\n\n";
				
				// open ul
				$_page_content .= '<ul>'."\n\n";
		
				// set mem
				$_title = $comment->comment_author;
	
			}
		
			
			// open li
			$_page_content .= '<li><!-- item li -->'."\n\n";
	
			// show the comment
			$_page_content .= cp_format_comment( $comment, 'by' );
		
			// close li
			$_page_content .= '</li><!-- /item li -->'."\n\n";
	
		
			
		}
	
		// close ul
		$_page_content .= '</ul>'."\n\n";
		
		// close item div
		$_page_content .= '</div><!-- /item_body -->'."\n\n";
		
		// close li
		$_page_content .= '</li><!-- /author li -->'."\n\n\n\n";
		
		// close ul
		$_page_content .= '</ul><!-- /all_comments_listing -->'."\n\n";
	
	}
	
	
	
	// --<
	return $_page_content;
	
}
endif; // cp_get_comments_by_content

	
	



if ( ! function_exists( 'cp_get_comments_by_page_content' ) ):
/** 
 * @description: comments-by page display function
 * @todo: 
 *
 */
function cp_get_comments_by_page_content() {

	// declare access to globals
	global $commentpress_obj;

	
	
	// set title
	$_page_content = '<h2 class="post_title">Comments by Commenter</h2>'."\n\n";

	// get data
	$_page_content .= cp_get_comments_by_content();
	

	
	// --<
	return $_page_content;
	
}
endif; // cp_get_comments_by_page_content

	
	




if ( ! function_exists( 'cp_show_activity_tab' ) ):
/** 
 * @description: decide whether or not to show the Activity Sidebar
 * @todo: 
 *
 */
function cp_show_activity_tab() {

	// declare access to globals
	global $commentpress_obj, $post;

	
	
	/*
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// is this multisite?
		if ( 
		
			( is_multisite() 
			AND is_main_site() 
			AND $commentpress_obj->is_buddypress_special_page() )
			OR !is_object( $post )
			
		) {
		
			// ignore activity
			return false;
			
		}
		
	}
	*/



	// --<
	return true;
	
}
endif; // cp_show_activity_tab

	
	




if ( ! function_exists( 'cp_is_commentable' ) ):
/** 
 * @description: decide whether or not to show the Activity Sidebar
 * @todo: 
 *
 */
function cp_is_commentable() {

	// declare access to globals
	global $commentpress_obj, $post;

	
	
	// not if we're not on a page/post and especially not if there's no post object
	if ( !is_singular() OR !is_object( $post ) ) { return false; }
	
	
	
	// if we have the plugin enabled...
	if ( is_object( $commentpress_obj ) ) {
	
		// CP Special Pages special pages are not
		if ( $commentpress_obj->db->is_special_page() ) { return false; }

		// BuddyPress special pages are not
		if ( $commentpress_obj->is_buddypress_special_page() ) { return false; }

	}
	


	// --<
	return true;
	
}
endif; // cp_is_commentable

	
	




if ( ! function_exists( 'cp_get_comment_activity' ) ):
/** 
 * @description: activity sidebar display function
 * @todo: do we want trackbacks?
 *
 */
function cp_get_comment_activity( $scope = 'all' ) {

	// declare access to globals
	global $wpdb, $commentpress_obj, $post;

	// init page content
	$_page_content = '';
	
	
	
	// define defaults
	$args = array(
	
		'number' => 10,
		'status' => 'approve',
		
		// exclude trackbacks and pingbacks until we decide what to do with them
		'type' => '' 
	
	);
	


	// if we are on a 404, for example
	if ( $scope == 'post' AND is_object( $post ) ) {
	
		// get all comments
		$args['post_id'] = $post->ID;

	}
	


	// get 'em
	$_data = get_comments( $args );
	//print_r( $_data ); exit();
	
	
	
	// did we get any?
	if ( count( $_data ) > 0 ) {
	
	
	
		// open ul
		$_page_content .= '<ol class="comment_activity">'."\n\n";
		
		// init title
		$_title = '';
		
		// loop
		foreach ($_data as $comment) {
		
			// enable Wordpress API on comment
			$GLOBALS['comment'] = $comment;
		
			// only comments until we decide what to do with pingbacks
			if ( $comment->comment_type != 'pingback' ) //{



			// test for anonymous comment (usually generated by WP itself in multisite installs)
			if ( empty( $comment->comment_author ) ) {
			
				$comment->comment_author = 'Anonymous';
			
			}
			
			

			// was it a registered user?
			if ( $comment->user_id != '0' ) {
			
				// get user details
				$user = get_userdata( $comment->user_id );
				//print_r( $user->display_name ); die();
				
				// get user link
				$user_link = cp_get_user_link( $user );
				
				// construct author citation
				$author = '<cite class="fn"><a href="'.$user_link.'">'.esc_html( $comment->comment_author ).'</a></cite>';
				
				// construct link to user url
				$author = ( $user_link != '' AND $user_link != 'http://' ) ? 
							'<cite class="fn"><a href="'.$user_link.'">'.esc_html( $comment->comment_author ).'</a></cite>' : 
							 '<cite class="fn">'.esc_html( $comment->comment_author ).'</cite>';
				
			} else {
			
				// construct link to commenter url
				$author = ( $comment->comment_author_url != '' AND $comment->comment_author_url != 'http://' ) ? 
							'<cite class="fn"><a href="'.$comment->comment_author_url.'">'.esc_html( $comment->comment_author ).'</a></cite>' : 
							 '<cite class="fn">'.esc_html( $comment->comment_author ).'</cite>';
			
			}
				
			
			
			// approved comment?
			if ($comment->comment_approved == '0') {
				$comment_text = '<p><em>Comment awaiting moderation</em></p>';
			} else {
				$comment_text = get_comment_text( $comment->comment_ID );
			}
		
		
			
			// default to not on post
			$is_on_current_post = '';

			// on current post?
			if ( is_singular() AND is_object( $post ) AND $comment->comment_post_ID == $post->ID ) {
				
				// access paging globals
				global $multipage, $page;
				
				// is it the same page, if paged?
				if ( $multipage ) {
					
					/*
					print_r( array( 
						'multipage' => $multipage, 
						'page' => $page 
					) ); die();
					*/
					
					// if it has a text sig
					if ( 
					
						!is_null( $comment->comment_text_signature ) 
						AND $comment->comment_text_signature != '' 
						
					) {
		
						// set key
						$key = '_cp_comment_page';
						
						// if the custom field already has a value...
						if ( get_comment_meta( $comment->comment_ID, $key, true ) != '' ) {
						
							// get comment's page from meta
							$page_num = get_comment_meta( $comment->comment_ID, $key, true );
							
							// is it this one?
							if ( $page_num == $page ) {
							
								// is the right page
								$is_on_current_post = ' comment_on_post';
							
							}
							
						}
					
					} else {
					
						// it's always the right page for page-level comments
						$is_on_current_post = ' comment_on_post';
					
					}
					
				} else {
					
					// must be the right page
					$is_on_current_post = ' comment_on_post';
				
				}
				
			}
		
		
			
			// open li
			$_page_content .= '<li><!-- item li -->'."\n\n";
	
			// show the comment
			$_page_content .= '
<div class="comment-wrapper">

<div class="comment-identifier">
'.get_avatar( $comment, $size='32' ).'
'.$author.'		
<p class="comment_activity_date"><a class="comment_activity_link'.$is_on_current_post.'" href="'.htmlspecialchars( get_comment_link() ).'">'.get_comment_date().' at '.get_comment_time().'</a></p>
</div><!-- /comment-identifier -->



<div class="comment-content">
'.apply_filters('comment_text', $comment_text ).'
</div><!-- /comment-content -->

<div class="reply"><p><a class="comment_activity_link'.$is_on_current_post.'" href="'.htmlspecialchars( get_comment_link() ).'">'.__( 'See in context', 'commentpress-theme' ).'</a></p></div><!-- /reply -->

</div><!-- /comment-wrapper -->

';

			// close li
			$_page_content .= '</li><!-- /item li -->'."\n\n";
			
		}
	
		// close ul
		$_page_content .= '</ol><!-- /comment_activity -->'."\n\n";
	
	}
	
	
	
	// --<
	return $_page_content;
	
}
endif; // cp_get_comment_activity

	
	



if ( ! function_exists( 'cp_get_comments_by_para' ) ):
/** 
 * @description: get comments delimited by paragraph
 * @todo: translation
 *
 */
function cp_get_comments_by_para() {

	// declare access to globals
	global $post, $commentpress_obj;
	


	// get approved comments for this post, sorted comments by text signature
	$comments_sorted = $commentpress_obj->get_sorted_comments( $post->ID );
	
	// get text signatures
	$text_sigs = $commentpress_obj->db->get_text_sigs();



	// if we have any...
	if ( count( $comments_sorted ) > 0 ) {
	
		// default comment type to get
		$comment_type = 'all';

		// if we don't allow pingbacks...
		if ( !('open' == $post->ping_status) ) {
		
			// just get comments
			$comment_type = 'comment';
	
		}
		
		

		// init new walker
		$walker = new Walker_Comment_Press;
		
		// define args
		$args = array(
			
			// list comments params
			'walker' => $walker,
			'style'=> 'ol', 
			'type'=> $comment_type, 
			'callback' => 'cp_comments'
			
		);

		
		
		// init counter for text_signatures array
		$sig_counter = 0;
		
		// init array for tracking text sigs
		$used_text_sigs = array();
		
		

		// loop through each paragraph
		foreach( $comments_sorted AS $_comments ) {
		
			// is it the whole page
			if ( $sig_counter == 0 ) { 
			
				// clear text signature
				$text_sig = '';
				
				// clear the paragraph number
				$para_num = '';
				
				// define default phrase
				$paragraph_text = __( 'the whole page', 'commentpress-theme' );
				
				$current_type = get_post_type();
				//print_r( $current_type ); die();
				
				switch( $current_type ) {
					
					// we can add more of these if needed
					case 'post': $paragraph_text = __( 'the whole post', 'commentpress-theme' ); break;
					case 'page': $paragraph_text = __( 'the whole page', 'commentpress-theme' ); break;
					
				}
				
			} else {
			
				// get text signature
				$text_sig = $text_sigs[$sig_counter-1];
			
				// paragraph number
				$para_num = $sig_counter;
				
				// which parsing method?
				if ( defined( 'CP_BLOCK' ) ) {
				
					switch ( CP_BLOCK ) {
					
						case 'tag' :
							
							// set block identifier
							$block_name = __( 'paragraph', 'commentpress-theme' );
						
							break;
							
						case 'block' :
							
							// set block identifier
							$block_name = __( 'block', 'commentpress-theme' );
						
							break;
							
						case 'line' :
							
							// set block identifier
							$block_name = __( 'line', 'commentpress-theme' );
						
							break;
							
					}
				
				} else {
				
					// set block identifier
					$block_name = __( 'paragraph', 'commentpress-theme' );
				
				}
				
				// set paragraph text
				$paragraph_text = $block_name.' '.$para_num;
				
			}
			
			// count comments
			$comment_count = count( $_comments );
			
			// define heading text
			$heading_text = sprintf( _n(
				
				// singular
				'<span>%d</span> Comment on ', 
				
				// plural
				'<span>%d</span> Comments on ', 
				
				// number
				$comment_count, 
				
				// domain
				'commentpress-theme'
			
			// substitution
			), $comment_count );
			
			// append para text
			$heading_text .= $paragraph_text;
			
			// init no comment class
			$no_comments_class = '';
			
			// override if there are no comments (for print stylesheet to hide them)
			if ( $comment_count == 0 ) { $no_comments_class = ' class="no_comments"'; }
			
			// show heading
			echo '<h3 id="para_heading-'.$text_sig.'"'.$no_comments_class.'><a class="comment_block_permalink" title="Permalink for comments on '.$paragraph_text.'" href="#para_heading-'.$text_sig.'">'.$heading_text.'</a></h3>'."\n\n";

			// override if there are no comments (for print stylesheet to hide them)
			if ( $comment_count == 0 ) { $no_comments_class = ' no_comments'; }
			
			// open paragraph wrapper
			echo '<div id="para_wrapper-'.$text_sig.'" class="paragraph_wrapper'.$no_comments_class.'">'."\n\n";

			// have we already used this text signature?
			if( in_array( $text_sig, $used_text_sigs ) ) {
			
				// show some kind of message TO DO: incorporate para order too
				echo '<div class="reply_to_para" id="reply_to_para-'.$para_num.'">'."\n".
						'<p>'.
							'It appears that this paragraph is a duplicate of a previous one.'.
						'</p>'."\n".
					 '</div>'."\n\n";

			} else {
		
				// if we have comments...
				if ( count( $_comments ) > 0 ) {
				
					// open commentlist
					echo '<ol class="commentlist">'."\n\n";
			
					// use WP 2.7+ functionality
					wp_list_comments( $args, $_comments ); 
					
					// close commentlist
					echo '</ol>'."\n\n";
						
				}
				
				// add to used array
				$used_text_sigs[] = $text_sig;
			
				// only add comment-on-para link if comments are open
				if ( 'open' == $post->comment_status ) {
				
					// construct onclick 
					$onclick = "return addComment.moveFormToPara( '$para_num', '$text_sig', '$post->ID' )";
					
					// just show replytopara
					$query = remove_query_arg( array( 'replytocom' ) ); 
		
					// add param to querystring
					$query = esc_html( 
						add_query_arg( 
							array( 'replytopara' => $para_num ),
							$query
						) 
					);
					
					// if we have to log in to comment...
					if ( get_option('comment_registration') AND !is_user_logged_in() ) {
						
						// leave comment link
						echo '<div class="reply_to_para" id="reply_to_para-'.$para_num.'">'."\n".
								'<p><a class="reply_to_para" rel="nofollow" href="' . site_url('wp-login.php?redirect_to=' . get_permalink()) . '">'.
									'Login to leave a comment on '.$paragraph_text.
								'</a></p>'."\n".
							 '</div>'."\n\n";
						
					} else {
						
						// leave comment link
						echo '<div class="reply_to_para" id="reply_to_para-'.$para_num.'">'."\n".
								'<p><a class="reply_to_para" href="'.$query.'#respond" onclick="'.$onclick.'">'.
									'Leave a comment on '.$paragraph_text.
								'</a></p>'."\n".
							 '</div>'."\n\n";
						
					}
						 
				}
					 
			}

			// close paragraph wrapper
			echo '</div>'."\n\n\n\n";
			
			// increment signature array counter
			$sig_counter++;
			
		}
		
	}
	
}
endif; // cp_get_comments_by_para






/**
 * HTML comment list class.
 *
 * @package WordPress
 * @uses Walker
 * @since unknown
 */
class Walker_Comment_Press extends Walker_Comment {

	/**
	 * @see Walker_Comment::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of comment.
	 * @param array $args Uses 'style' argument for type of HTML list.
	 */
	function start_lvl(&$output, $depth, $args) {
	
		// if on top level
		if( $depth === 0 ) {
			//echo '<h3>New Top Level</h3>'."\n";
		}
		
		// store depth
		$GLOBALS['comment_depth'] = $depth + 1;
		
		// open children if necessary
		switch ( $args['style'] ) {
		
			case 'div':
				break;
				
			case 'ol':
				echo '<ol class="children">'."\n";
				break;
				
			default:
			case 'ul':
				echo '<ul class="children">'."\n";
				break;
		}
		
	}

}






if ( ! function_exists( 'cp_comment_form_title' ) ):
/** 
 * @description: alternative to the built-in WP function
 * @todo: 
 *
 */
function cp_comment_form_title( 
	
	$no_reply_text = 'Leave a Reply', 
	$reply_to_comment_text = 'Leave a Reply to %s', 
	$reply_to_para_text = 'Leave a Comment on %s', 
	$link_to_parent = TRUE 
	
) {

	// declare access to globals
	global $comment, $commentpress_obj;



	// get comment ID to reply to from URL query string
	$reply_to_comment_id = isset($_GET['replytocom']) ? (int) $_GET['replytocom'] : 0;

	// get paragraph number to reply to from URL query string
	$reply_to_para_id = isset($_GET['replytopara']) ? (int) $_GET['replytopara'] : 0;



	// if we have no comment ID AND no paragraph ID to reply to
	if ( $reply_to_comment_id == 0 AND $reply_to_para_id == 0 ) {
		
		// write default title to page
		echo $no_reply_text;
		
	} else {
	
		// if we have a comment ID AND NO paragraph ID to reply to
		if ( $reply_to_comment_id != 0 AND $reply_to_para_id == 0 ) {
	
			// get comment
			$comment = get_comment( $reply_to_comment_id );
			
			// get link to comment
			$author = ( $link_to_parent ) ? 
				'<a href="#comment-' . get_comment_ID() . '">' . get_comment_author() . '</a>' : 
				get_comment_author();
			
			// write to page
			printf( $reply_to_comment_text, $author );
			
		} else {
		
			// get paragraph text signature
			$text_sig = $commentpress_obj->get_text_signature( $reply_to_para_id );
		
			// get link to paragraph
			$paragraph = ( $link_to_parent ) ? 
				'<a href="#para_heading-' . $text_sig . '">Paragraph ' .$reply_to_para_id. '</a>' : 
				'Paragraph ' .$para_num;
			
			// write to page
			printf( $reply_to_para_text, $paragraph );
			
		}
	
	}
	
}
endif; // cp_comment_form_title






if ( ! function_exists( 'cp_comment_reply_link' ) ):
/** 
 * @description: alternative to the built-in WP function
 * @todo: 
 *
 */
function cp_comment_reply_link( $args = array(), $comment = null, $post = null ) {

	global $user_ID;

	$defaults = array(
	
		'add_below' => 'comment', 
		'respond_id' => 'respond', 
		'reply_text' => __('Reply','commentpress-theme'),
		'login_text' => __('Log in to Reply','commentpress-theme'), 
		'depth' => 0, 
		'before' => '', 
		'after' => ''
		
	);

	$args = wp_parse_args($args, $defaults);

	if ( 0 == $args['depth'] || $args['max_depth'] <= $args['depth'] ) {
		return;
	}

	extract($args, EXTR_SKIP);

	$comment = get_comment($comment);
	$post = get_post($post);

	// kick out if comments closed
	if ( 'open' != $post->comment_status ) { return false; }

	$link = '';
	
	// if we have to log in to comment...
	if ( get_option('comment_registration') && !$user_ID ) {
	
		$link = '<a rel="nofollow" href="' . site_url('wp-login.php?redirect_to=' . get_permalink()) . '">' . $login_text . '</a>';
		
	} else {
	
		// just show replytocom
		$query = remove_query_arg( array( 'replytopara' ), get_permalink( $post->ID ) ); 

		// define query string
		$addquery = esc_html( 
		
			add_query_arg( 
			
				array( 'replytocom' => $comment->comment_ID ),
				$query
				
			) 
			
		);
		
		// define link
		$link = "<a rel='nofollow' class='comment-reply-link' href='" . $addquery . "#" . $respond_id . "' onclick='return addComment.moveForm(\"$add_below-$comment->comment_ID\", \"$comment->comment_ID\", \"$respond_id\", \"$post->ID\", \"$comment->comment_text_signature\")'>$reply_text</a>";
		
	}
	
	// --<
	return apply_filters( 'comment_reply_link', $before . $link . $after, $args, $comment, $post );
	
}
endif; // cp_comment_reply_link







if ( ! function_exists( 'cp_comments' ) ):
/** 
 * @description: custom comments display function
 * @todo: 
 *
 */
function cp_comments( $comment, $args, $depth ) {

	// build comment as html
	echo cp_get_comment_markup( $comment, $args, $depth );
	
}
endif; // cp_comments






if ( ! function_exists( 'cp_get_comment_markup' ) ):
/** 
 * @description: wrap comment in its markup
 * @todo: 
 *
 */
function cp_get_comment_markup( $comment, $args, $depth ) {

	//print_r( $comment );
	//print_r( $args );

	// enable Wordpress API on comment
	$GLOBALS['comment'] = $comment;



	// was it a registered user?
	if ( $comment->user_id != '0' ) {
	
		// get user details
		$user = get_userdata( $comment->user_id );
		//print_r( $user->display_name ); die();
		
		// get user link
		$user_link = cp_get_user_link( $user );
		//print_r( array( 'u' => $user_link ) ); die();
		
		// construct author citation
		$author = ( $user_link != '' AND $user_link != 'http://' ) ? 
					'<cite class="fn"><a href="'.$user_link.'">'.get_comment_author().'</a></cite>' : 
					 '<cite class="fn">'.get_comment_author().'</cite>';
		
		//print_r( array( 'a' => $author ) ); die();

	} else {
	
		// construct link to commenter url
		$author = ( $comment->comment_author_url != '' AND $comment->comment_author_url != 'http://' AND $comment->comment_approved != '0' ) ? 
					'<cite class="fn"><a href="'.$comment->comment_author_url.'">'.get_comment_author().'</a></cite>' : 
					 '<cite class="fn">'.get_comment_author().'</cite>';
	
	}
		
	
	
	/*
	if ($comment->comment_approved == '0') {
		$author = '<cite class="fn">'.get_comment_author().'</cite>';
	} else {
		$author = '<cite class="fn">'.get_comment_author_link().'</cite>';
	}
	*/
	
	
	
	if ( $comment->comment_approved == '0' ) {
		$comment_text = '<p><em>Comment awaiting moderation</em></p>';
	} else {
		$comment_text = get_comment_text();
	}


	
	// empty reply div by default
	$comment_reply = '';

	// enable access to post
	global $post;
	
	// can we reply?
	if ( 
		
		// not if comments are closed
		$post->comment_status == 'open' 
		
		// we don't want reply to on pingbacks
		AND $comment->comment_type != 'pingback' 
		
		// nor on unapproved comments
		AND $comment->comment_approved == '1' 
		
	) {
	
		// are we threading comments?
		if ( get_option( 'thread_comments', false ) ) {
		
			// custom comment_reply_link
			$comment_reply = cp_comment_reply_link(
			
				array_merge(
				
					$args, 
					array(
						'reply_text' => 'Reply to '.get_comment_author(),
						'depth' => $depth, 
						'max_depth' => $args['max_depth']
					)
				)
				
			);
			
			// wrap in div
			$comment_reply = '<div class="reply">'.$comment_reply.'</div><!-- /reply -->';
			
		}
		
	}
	
	
	
	// init edit link
	$editlink = '';
	
	// if logged in and has capability
	if ( 
		is_user_logged_in() 
	AND 
		current_user_can('edit_posts') 
	AND 
		current_user_can( 'edit_comment', $comment->comment_ID ) 
	) {

		// get edit comment link
		$editlink = '<span class="alignright"><a class="comment-edit-link" href="'.get_edit_comment_link().'" title="Edit comment">(Edit)</a></span>';
		
	}
	
	
	
	// get comment class(es)
	$_comment_class = comment_class( null, $comment->comment_ID, $post->ID, false );
	
	
	
	// stripped source
	$html = '	
<li id="li-comment-'.$comment->comment_ID.'"'.$_comment_class.'>
<div class="comment-wrapper">
<div id="comment-'.$comment->comment_ID.'">



<div class="comment-identifier">
'.get_avatar( $comment, $size='32' ).'
'.$editlink.'
'.$author.'		
<a class="comment_permalink" href="'.htmlspecialchars( get_comment_link() ).'">'.get_comment_date().' at '.get_comment_time().'</a>
</div><!-- /comment-identifier -->



<div class="comment-content">
'.apply_filters('comment_text', $comment_text ).'
</div><!-- /comment-content -->



'.$comment_reply.'



</div><!-- /comment-'.$comment->comment_ID.' -->
</div><!-- /comment-wrapper -->
';



	// --<
	return $html;
	
}
endif; // cp_get_comment_markup






if ( ! function_exists( 'cp_get_full_name' ) ):
/** 
 * @description: utility to concatenate names
 * @todo: 
 *
 */
function cp_get_full_name( $forename, $surname ) {

	// init return
	$fullname = '';
	
	

	// add forename
	if ($forename != '' ) { $fullname .= $forename; } 
	
	// add surname
	if ($surname != '' ) { $fullname .= ' '.$surname; }
	
	// strip any whitespace
	$fullname = trim( $fullname );
	
	
	
	// --<
	return $fullname;
	
}
endif; // cp_get_full_name






if ( ! function_exists( 'cp_excerpt_length' ) ):
/** 
 * @description: utility to define length of excerpt
 * @todo: 
 *
 */
function cp_excerpt_length() {

	// declare access to globals
	global $commentpress_obj;
	
	
	
	// is the plugin active?
	if ( !is_object( $commentpress_obj ) ) {
	
		// --<
		return 55; // Wordpress default
		
	}
	
	
	
	// get length of excerpt from option
	$length = $commentpress_obj->db->option_get( 'cp_excerpt_length' );



	// --<
	return $length;
	
}
endif; // cp_excerpt_length

// add filter for excerpt length
add_filter( 'excerpt_length', 'cp_excerpt_length' );






if ( ! function_exists( 'cp_add_link_css' ) ):
/** 
 * @description: utility to add button css class to blog nav links
 * @todo: 
 *
 */
function cp_add_link_css( $link ) {

	// add css
	$link = str_replace( '<a ', '<a class="css_btn" ', $link );

	// --<
	return $link;
	
}
endif; // cp_add_link_css

// add filter for next/previous links
add_filter( 'previous_post_link', 'cp_add_link_css' );
add_filter( 'next_post_link', 'cp_add_link_css' );






if ( ! function_exists( 'cp_get_link_css' ) ):
/** 
 * @description: utility to add button css class to blog nav links
 * @todo: 
 *
 */
function cp_get_link_css() {

	// add css
	$link = 'class="css_btn"';

	// --<
	return $link;
	
}
endif; // cp_get_link_css

// add filter for next/previous posts links
add_filter( 'previous_posts_link_attributes', 'cp_get_link_css' );
add_filter( 'next_posts_link_attributes', 'cp_get_link_css' );






if ( ! function_exists( 'cp_add_loginout_id' ) ):
/** 
 * @description: utility to add button css id to login links
 * @todo: 
 *
 */
function cp_add_loginout_id( $link ) {

	// if logged in
	if ( is_user_logged_in() ) {
	
		// logout
		$_id = 'btn_logout';
		
	} else {
	
		// login
		$_id = 'btn_login';

	}
	
	// add css
	$link = str_replace( '<a ', '<a id="'.$_id.'" ', $link );

	// --<
	return $link;
	
}
endif; // cp_add_loginout_id

// add filter for next/previous links
add_filter( 'loginout', 'cp_add_link_css' );
add_filter( 'loginout', 'cp_add_loginout_id' );






if ( ! function_exists( 'cp_multipage_comment_link' ) ):
/** 
 * @description: filter comment permalinks for multipage posts
 * @todo: should this go in the plugin?
 *
 */
function cp_multipage_comment_link( $link, $comment, $args ) {

	// get multipage and post
	global $multipage, $post;
	
	// are there multiple (sub)pages?
	//if ( is_object( $post ) AND $multipage ) {
	
		// exclude page level comments
		if ( $comment->comment_text_signature != '' ) {
		
			// init page num
			$page_num = 1;
		
			// set key
			$key = '_cp_comment_page';
			
			// if the custom field already has a value...
			if ( get_comment_meta( $comment->comment_ID, $key, true ) != '' ) {
			
				// get the page number
				$page_num = get_comment_meta( $comment->comment_ID, $key, true );
				
			}
			
			// get current comment info
			$comment_path_info = parse_url( $link );
			
			// set comment path
			return cp_get_post_multipage_url( $page_num, get_post( $comment->comment_post_ID ) ).'#'.$comment_path_info['fragment'];

		}
		
	//}

	// --<
	return $link;

}
endif; // cp_multipage_comment_link

// add filter for the above
add_filter( 'get_comment_link', 'cp_multipage_comment_link', 10, 3 );






/**
 * Copied from wp-includes/post-template.php _wp_link_page()
 * @param int $i Page number.
 * @return string url.
 */
function cp_get_post_multipage_url( $i, $post = '' ) {

	// if we have no passed value
	if ( $post == '' ) {
		
		// we assume we're in the loop
		global $post, $wp_rewrite;
	
		if ( 1 == $i ) {
			$url = get_permalink();
		} else {
			if ( '' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending')) )
				$url = add_query_arg( 'page', $i, get_permalink() );
			elseif ( 'page' == get_option('show_on_front') && get_option('page_on_front') == $post->ID )
				$url = trailingslashit(get_permalink()) . user_trailingslashit("$wp_rewrite->pagination_base/" . $i, 'single_paged');
			else
				$url = trailingslashit(get_permalink()) . user_trailingslashit($i, 'single_paged');
		}
		
	} else {
		
		// use passed post object
		if ( 1 == $i ) {
			$url = get_permalink( $post->ID );
		} else {
			if ( '' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending')) )
				$url = add_query_arg( 'page', $i, get_permalink( $post->ID ) );
			elseif ( 'page' == get_option('show_on_front') && get_option('page_on_front') == $post->ID )
				$url = trailingslashit(get_permalink( $post->ID )) . user_trailingslashit("$wp_rewrite->pagination_base/" . $i, 'single_paged');
			else
				$url = trailingslashit(get_permalink( $post->ID )) . user_trailingslashit($i, 'single_paged');
		}
		
	}
	
	return esc_url( $url );
}







if ( ! function_exists( 'cp_multipager' ) ):
/** 
 * @description: adds some style
 * @todo: 
 *
 */
function cp_multipager() {

	// set default behaviour
	$defaults = array(
		
		'before' => '<div class="multipager">',
		'after' => '</div>',
		'link_before' => '', 
		'link_after' => '',
		'next_or_number' => 'next', 
		'nextpagelink' => '<span class="alignright">'.__('Next page','commentpress-theme').' &raquo;</span>',
		'previouspagelink' => '<span class="alignleft">&laquo; '.__('Previous page','commentpress-theme').'</span>',
		'pagelink' => '%',
		'more_file' => '', 
		'echo' => 0
		
	);
	
	// get page links
	$page_links = wp_link_pages( $defaults );
	//print_r( $page_links ); die();
	
	// add separator when there are two links
	$page_links = str_replace( 
	
		'a><a', 
		'a> <span class="multipager_sep">|</span> <a', 
		$page_links 
		
	);
	
	// get page links
	$page_links .= wp_link_pages( array(
	
		'before' => '<div class="multipager multipager_all"><span>' . __('Pages: ','commentpress-theme') . '</span>', 
		'after' => '</div>',
		'pagelink' => '<span class="multipager_link">%</span>',
		'echo' => 0 
		
	) );
	
	// --<
	return $page_links;

}
endif; // cp_multipager






/**
 * @description; adds the Next Page button to the TinyMCE editor
 * @param array $buttons The default TinyMCE buttons as set by WordPress
 * @return array $buttons The buttons with More removed
 */
function cp_add_tinymce_nextpage_button( $buttons ) {
	
	// try and place Next Page after More button
	$pos = array_search( 'wp_more', $buttons, true );
	
	// is it there?
	if ($pos !== false) {
	
		// get array up to that point
		$tmp_buttons = array_slice( $buttons, 0, $pos + 1 );
		
		// add Next Page button
		$tmp_buttons[] = 'wp_page';
		
		// recombine
		$buttons = array_merge( $tmp_buttons, array_slice( $buttons, $pos + 1 ) );
		
	}
	
	
	
	// --<
	return $buttons;

}

// add filter for the above
add_filter( 'mce_buttons', 'cp_add_tinymce_nextpage_button' );





if ( ! function_exists( 'cp_comment_post_redirect' ) ):
/** 
 * @description: filter comment post redirects for multipage posts
 * @todo: should this go in the plugin?
 *
 */
function cp_comment_post_redirect( $link ) {

	// get page var, indicating subpage
	$page = (isset($_POST['page'])) ? $_POST['page'] : 0;

	// are we on a subpage?
	if ( $page ) {
	
		// get current redirect
		$current_redirect = parse_url( $link );
	
		// we need to use the page that submitted the comment
		$page_info = $_SERVER['HTTP_REFERER'];
		
		// set redirect to comment on subpage
		return $page_info.'#'.$current_redirect['fragment'];
		
	}

	// --<
	return $link;

}
endif; // cp_comment_post_redirect

// add filter for the above, making it run early so it can be overridden by AJAX commenting
add_filter( 'comment_post_redirect', 'cp_comment_post_redirect', 4, 1 );






// remove caption shortcode
remove_shortcode( 'caption' );

if ( ! function_exists( 'cp_image_caption_shortcode' ) ):
/** 
 * @description: rebuild caption shortcode output
 * @param array $attr Attributes attributed to the shortcode.
 * @param string $content Optional. Shortcode content.
 * @return string
 * @todo: Do we need to hook into this?
 *
 */
function cp_image_caption_shortcode( $attr, $content ) {

	// Allow plugins/themes to override the default caption template.
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;
	
	// sanitise id
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
	
	// add space prior to alignment
	$_alignment = ' '.esc_attr($align);
	
	// get width
	$_width = (0 + (int) $width);

	return '<span class="captioned_image'.$_alignment.'" style="width: '.$_width.'px"><span '.$id.' class="wp-caption">'
	. do_shortcode( $content ) . '</span><small class="wp-caption-text">'.$caption.'</small></span>';
	
}
endif; // cp_image_caption_shortcode

// add a shortcode for the above
add_shortcode( 'caption', 'cp_image_caption_shortcode' );






if ( ! function_exists( 'add_commentblock_button' ) ):
/** 
 * @description: add filters for adding our custom TinyMCE button
 * @todo:
 *
 */
function add_commentblock_button() {

	// don't bother doing this stuff if the current user lacks permissions
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
		return;
	}
	
	// add only if user can edit in Rich-text Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	
		add_filter('mce_external_plugins', 'add_commentblock_tinymce_plugin');
		add_filter('mce_buttons', 'register_commentblock_button');
	
	}

}
endif; // add_commentblock_button






if ( ! function_exists( 'register_commentblock_button' ) ):
/** 
 * @description: add filters for adding our custom TinyMCE button
 * @todo:
 *
 */
function register_commentblock_button($buttons) {
	
	// add our button to the editor button array
	array_push($buttons, "|", "commentblock");
	
	// --<
	return $buttons;

}
endif; // register_commentblock_button






if ( ! function_exists( 'add_commentblock_tinymce_plugin' ) ):
/** 
 * @description: load the TinyMCE plugin : cp_editor_plugin.js
 * @todo:
 *
 */
function add_commentblock_tinymce_plugin($plugin_array) {

	$plugin_array['commentblock'] = get_template_directory_uri().'/style/js/tinymce/cp_editor_plugin.js';
	return $plugin_array;

}
endif; // add_commentblock_tinymce_plugin






if ( ! function_exists( 'cp_refresh_mce' ) ):
/** 
 * @description: load the TinyMCE plugin : cp_editor_plugin.js
 * @todo: can this be removed? doesn't seem to affect things...
 *
 */
function cp_refresh_mce($ver) {

	$ver += 3;
	return $ver;

}
endif; // cp_refresh_mce

// init process for button control
//add_filter( 'tiny_mce_version', 'cp_refresh_mce');
add_action( 'init', 'add_commentblock_button' );






if ( ! function_exists( 'cp_trap_empty_search' ) ):
/** 
 * @description: trap empty search queries and redirect
 * @todo: this isn't ideal, but works - awaiting core updates
 *
 */
function cp_trap_empty_search() {

	// take care of empty searches
	if ( isset( $_GET['s'] ) AND empty( $_GET['s'] ) ) {
	
		// send to search page
		return locate_template( array( 'search.php' ) );

	}

}
endif; // cp_trap_empty_search

// front_page_template filter is deprecated in WP 3.2+
if ( version_compare( $wp_version, '3.2', '>=' ) ) {

	// add filter for the above
	add_filter( 'home_template', 'cp_trap_empty_search' );

} else {

	// retain old filter for earlier versions
	add_filter( 'front_page_template', 'cp_trap_empty_search' );

}




if ( ! function_exists( 'cp_amend_password_form' ) ):
/** 
 * @description: adds some style
 * @todo: 
 *
 */
function cp_amend_password_form( $output ) {

	// add css class to form
	$output = str_replace( '<form ', '<form class="post_password_form" ', $output );
	
	// add css class to text field
	$output = str_replace( '<input name="post_password" ', '<input class="post_password_field" name="post_password" ', $output );

	// add css class to submit button
	$output = str_replace( '<input type="submit" ', '<input class="post_password_button" type="submit" ', $output );

	// --<
	return $output;

}
endif; // cp_amend_password_form

// add filter for the above
add_filter( 'the_password_form', 'cp_amend_password_form' );





if ( ! function_exists( 'commentpress_widgets_init' ) ):
/**
 * Register our widgets
 */
function commentpress_widgets_init() {

	// define an area where a widget may be placed
	register_sidebar( array(
		'name' => __( 'Commentpress Footer', 'commentpress-theme' ),
		'id' => 'cp-license-8',
		'description' => __( 'An optional widget area in the page footer of Commentpress theme', 'commentpress-theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// widget definitions
	require( get_template_directory() . '/style/widgets/widgets.php' );

	// and the widget
	register_widget( 'Commentpress_License_Widget' );

}
endif; // commentpress_widgets_init

add_action( 'widgets_init', 'commentpress_widgets_init' );






if ( ! function_exists( 'commentpress_license_image_css' ) ):
/**
 * Amend display of license plugin image
 */
function commentpress_license_image_css() {

	// give a bit more room to the image
	return 'display: block; float: left; margin: 0 6px 3px 0;';

}
endif; // commentpress_license_image_css

add_action( 'license_img_style', 'commentpress_license_image_css' );






if ( ! function_exists( 'commentpress_license_widget_compat' ) ):
/**
 * Remove license from footer when widget not active - wp_footer() is not inside #footer
 */
function commentpress_license_widget_compat() {

	// if the widget is not active, (i.e. the plugin is installed but the widget has not been 
	// dragged to a sidebar), then DO NOT display the license in the footer as a default
	if (!is_active_widget(false, false, 'license-widget', true) ) {
		remove_action( 'wp_footer', 'license_print_license_html' );			
	}

}
endif; // commentpress_license_widget_compat

// do this late, so license ought to be declared by then
add_action( 'widgets_init', 'commentpress_license_widget_compat', 100 );






if ( ! function_exists( 'commentpress_wplicense_compat' ) ):
/**
 * Remove license from footer - wp_footer() is not inside #footer
 */
function commentpress_wplicense_compat() {
	
	// let's not have the default footer
	remove_action('wp_footer', 'cc_showLicenseHtml');

}
endif; // commentpress_wplicense_compat

// do this late, so license ought to be declared by then
add_action( 'init', 'commentpress_wplicense_compat', 100 );






?>