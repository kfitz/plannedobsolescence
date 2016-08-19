<?php
/**
 * Template part for displaying posts.
 *
 * @package Independent_Publisher
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php independent_publisher_entry_header(); ?>
	<?php independent_publisher_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			if ( 'status' === get_post_format() ) {
				printf( '<a class="status-avatar" href="%s">%s</a>',
					esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ),
					get_avatar( get_the_author_meta( 'email' ), 100 )
				);
			}

			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'independent-publisher' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'independent-publisher' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>

		<div class="post-details">
			<?php independent_publisher_entry_footer(); ?>
		</div><!-- .post-details -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->