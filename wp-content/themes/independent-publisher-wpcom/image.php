<?php
/**
 * The template for displaying all image attachments.
 *
 * @package Independent_Publisher
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">

					<div class="entry-attachment">
						<?php
							/**
							 * Filter the default Independent Publisher image attachment size.
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'independent_publisher_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption image-post-title">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->

					<div class="entry-meta light-text">
						<span class="published-on"><?php echo independent_publisher_posted_time(); ?></span>
						<a class="full-size-link" href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a>
					</div><!-- .entry-meta -->

					<?php independent_publisher_entry_header(); ?>
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() || wp_link_pages( array( 'echo' => false ) ) ): ?>
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

			<nav id="image-navigation" class="image-navigation post-navigation" role="navigation">
				<div class="nav-links">
					<div class="nav-previous"><?php previous_image_link( false,  esc_html__( 'Previous Image', 'independent-publisher' ) ); ?></div>
					<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'independent-publisher' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- .image-navigation -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>