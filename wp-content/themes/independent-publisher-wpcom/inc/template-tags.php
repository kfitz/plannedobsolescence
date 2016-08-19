<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Independent_Publisher
 */

if ( ! function_exists( 'independent_publisher_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 */
function independent_publisher_comment_nav( $id ) {
	// Are there any comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="<?php echo $id; ?>" class="navigation comment-navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'independent-publisher' ); ?></h2>
			<div class="nav-links">
				<?php
					$prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'independent-publisher' ) );
					$next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'independent-publisher' ) );

					if ( $prev_link ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
				?>
			</div><!-- .nav-links -->
		</nav><!-- .comment-navigation -->
		<?php
	endif;
}
endif;

if ( ! function_exists( 'independent_publisher_posted_time' ) ) :
/**
 * Returns the <time> element containing the post publication/modification date.
 */
function independent_publisher_posted_time() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	return $time_string;
}
endif;

if ( ! function_exists( 'independent_publisher_entry_header' ) ) :
/**
 * Displays the HTML for.entry-header on posts and pages.
 */
function independent_publisher_entry_header() {
	// Formats displayed without the post title.
	$ignored_formats = array( 'aside', 'quote', 'status' );

	if ( ! is_single() ) {
		// Hide image format post title on non single post views.
		$ignored_formats[] = 'image';
	}

	// Show sticky post label on archive views, when on the first page, and when no featured image is set.
	if ( is_sticky() && ! is_singular() && ! is_paged() && ! has_post_thumbnail() ) {
		printf( '<span class="sticky-label">%s</span>', esc_html__( 'Featured', 'independent-publisher' ) );
	}

	// Conditionally display the entry header.
	$title = get_the_title();
	if ( ! empty( $title ) && ! in_array( get_post_format(), $ignored_formats ) ) : ?>
		<header class="entry-header">
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
				endif;
			?>
		</header><!-- .entry-header --><?php
	endif;
}
endif;

if ( ! function_exists( 'independent_publisher_entry_meta' ) ) :
/**
 * Prints HTML with meta information for author and categories.
 */
function independent_publisher_entry_meta() {
	if ( is_singular( 'post' ) ) : ?>
		<div class="entry-meta light-text">
			<?php the_author_posts_link(); ?>
			<span class="cat-links">
				<?php
					/* translators: %s: the category list */
					printf( esc_html__( 'in %s', 'posted in', 'independent-publisher' ), get_the_category_list( ', ' ) );
				?>
			</span><!-- .cat-links -->

			<span class="published-on"><?php echo independent_publisher_posted_time(); ?></span>

			<?php if ( independent_publisher_show_word_count() ) : ?>
				<span class="word-count"><?php printf( esc_html_x( '%s Words', 'word count', 'independent-publisher' ), independent_publisher_word_count() ); ?></span>
			<?php endif; ?>

			<?php
				if ( '' != get_post_format() ) {
					printf(
						'<span class="post-format-link format-%s"><a href="%s">%s</a></span>',
						get_post_format(),
						esc_url( get_post_format_link( get_post_format() ) ),
						get_post_format_string( get_post_format() )
					);
				}
			?>
		</div><!-- .entry-meta -->
	<?php endif;
}
endif;

if ( ! function_exists( 'independent_publisher_entry_footer' ) ) :
/**
 * Prints HTML with meta information for categories, tags, comments, publish date and word count.
 */
function independent_publisher_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		printf(
			esc_html_x( 'By %s', 'post author', 'independent-publisher' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'independent-publisher' ) );
		if ( $categories_list && independent_publisher_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'in %1$s', 'independent-publisher' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		if ( is_single() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'independent-publisher' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'independent-publisher' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}

	// Display post format archive link.
	if ( '' != get_post_format() ) {
		printf(
			'<span class="post-format-link"><a href="%s">%s</a></span>',
			esc_url( get_post_format_link( get_post_format() ) ),
			get_post_format_string( get_post_format() )
		);
	}

	// Display posted date for singular posts.
	if ( is_singular() ) {
		echo independent_publisher_posted_time();
	} else {
		printf( '<span class="post-permalink"><a href="%s" rel="bookmark">%s</a></span>', esc_url( get_permalink() ), independent_publisher_posted_time() );
	}

	// Show word count on standard post formats and pages.
	if ( independent_publisher_show_word_count() ) {
		printf( '<span class="word-count">%s</span>', sprintf( esc_html_x( '%s Words', 'word count', 'independent-publisher' ), independent_publisher_word_count() ) );
	}

	// Comments link
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'independent-publisher' ), esc_html__( '1 Comment', 'independent-publisher' ), esc_html__( '% Comments', 'independent-publisher' ) );
		echo '</span><!-- .comments-link -->';
	}

	// Edit post link
	edit_post_link( esc_html__( 'Edit', 'independent-publisher' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'independent_publisher_post_thumbnail' ) ) :
/**
 * Displays the featured image of the post.
 */
function independent_publisher_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) {
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
	} else {
		printf( '<div class="post-image-link"><a rel="bookmark" href="%s">', esc_url( get_permalink() ) );

		if ( is_sticky() && ! is_paged() ) {
			printf( '<span class="sticky-label">%s</span>', esc_html__( 'Featured', 'independent-publisher' ) );
		}

		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		echo '</a></div><!-- .post-image-link -->';
	}

	if ( 'image' === get_post_format() && ! is_single() ) {
		the_title( '<header class="entry-header"><h1 class="image-post-title">', '</h1></header><!-- .entry-header -->' );
	}
}
endif;

if ( ! function_exists( 'independent_publisher_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function independent_publisher_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'independent-publisher' ), array( 'span' => array( 'class' => array() ) ) ),
			'<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
		)
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'independent_publisher_excerpt_more' );
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function independent_publisher_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'independent_publisher_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'independent_publisher_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so independent_publisher_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so independent_publisher_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in independent_publisher_categorized_blog.
 */
function independent_publisher_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'independent_publisher_categories' );
}
add_action( 'edit_category', 'independent_publisher_category_transient_flusher' );
add_action( 'save_post',     'independent_publisher_category_transient_flusher' );