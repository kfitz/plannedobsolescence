<?php
/**
 * Template part for displaying single posts.
 *
 * @package Independent_Publisher
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( ! independent_publisher_has_cover_image() ) :
			if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
				independent_publisher_entry_meta();
				independent_publisher_entry_header();
			} else {
				independent_publisher_entry_header();
				independent_publisher_post_thumbnail();
				independent_publisher_entry_meta();
			}
		endif;
	?>

	<div class="entry-content">
		<?php
			if ( 'status' === get_post_format() ) {
				printf( '<a class="status-avatar" href="%s">%s</a>',
					esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ),
					get_avatar( get_the_author_meta( 'email' ), 100 )
				);
			}

			the_content();
		?>
	</div><!-- .entry-content -->

	<?php if ( get_the_tags() || get_edit_post_link() || wp_link_pages( array( 'echo' => false ) ) || get_the_author_meta( 'description' ) ) : ?>
		<div class="entry-footer">
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'independent-publisher' ),
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

				the_tags( '<ul class="post-tags light-text"><li>' . __( 'Tagged', 'independent-publisher' ) . '</li><li>', '</li><li>', '</li></ul><!-- .post-tags -->' );
				edit_post_link( esc_html__( 'Edit', 'independent-publisher' ), '<span class="post-edit-link">', '</span>' );
			?>

			<?php if ( is_singular( 'post' ) && get_the_author_meta( 'description' ) && independent_publisher_has_cover_image() ) : ?>
				<div class="post-author-card">
					<a class="author-card-avatar" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="home"><?php echo get_avatar( (int) get_the_author_meta( 'ID' ) , 100 ); ?></a>

					<div class="author-meta">
						<span class="author vcard"><?php the_author_posts_link(); ?></span>
						<span class="author-description">
							<?php
								echo wp_kses( get_the_author_meta( 'description' ), array(
									'a'      => array( 'href' => array() ),
									'strong' => array(),
									'u'      => array(),
								) );
							?>
						</span><!-- .author-description -->
					</div><!-- .author-meta -->

					<aside class="site-posted-on">
						<strong><?php esc_html_e( 'Published', 'post published', 'independent-publisher' ); ?></strong>
						<?php echo independent_publisher_posted_time(); ?>
					</aside><!-- .site-posted-on -->
				</div><!-- .post-author-card -->
			<?php endif; ?>
		</div><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->