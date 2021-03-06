<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Independent_Publisher
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( ! independent_publisher_has_cover_image() ) :
		independent_publisher_entry_header();
		independent_publisher_post_thumbnail();
	endif;
	?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() || wp_link_pages( array( 'echo' => false ) ) ) : ?>
		<div class="entry-footer">
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'independent-publisher' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

				edit_post_link( esc_html__( 'Edit', 'independent-publisher' ), '<span class="post-edit-link">', '</span>' );
			?>
		</div><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
