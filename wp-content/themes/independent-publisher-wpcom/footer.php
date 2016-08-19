<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Independent_Publisher
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'independent-publisher' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'independent-publisher' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'independent-publisher' ), 'Independent Publisher', '<a href="http://raamdev.com/" rel="designer">Raam Dev</a>' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #content-wrapper -->

	<?php if ( has_nav_menu( 'primary' ) && ! independent_publisher_show_site_branding() ) : ?>
		<div id="slide-menu" aria-expanded="false">
			<button class="menu-toggle" aria-controls="slide-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'independent-publisher' ); ?></button>

			<h2 class="menu-title"><?php _e( 'Menu', 'independent-publisher' ); ?></h2>
			<nav id="slide-navigation" class="main-slide-navigation" role="navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
					) );
				?>
			</nav><!-- #slide-navigation -->

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav id="slide-social-navigation" class="social-navigation" role="navigation">
					<?php
						// Social Navigation
						wp_nav_menu( array(
							'theme_location' => 'social',
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
							'container'      => false,
							'depth'          => 1,
						) );
					?>
				</nav><!-- #slide-social-navigation -->
			<?php endif; ?>
		</div><!-- #slide-menu -->
	<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>