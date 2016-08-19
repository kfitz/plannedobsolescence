<?php
/**
 * Template part for displaying the custom header image and post cover images.
 *
 * @package Independent_Publisher
 */

if ( is_singular( array( 'post', 'page' ) ) && independent_publisher_has_cover_image() ) : ?>

<div id="post-cover-image" class="site-hero-section">
	<?php if( ! is_front_page() ) { ?>
		<a id="site-home-link" title="<?php esc_attr_e( 'Home', 'independent-publisher' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="screen-reader-text"><?php _e( 'Home', 'independent-publisher' ); ?></span></a>
	<?php } ?>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<a id="slide-menu-toggle" class="menu-toggle" href="#slide-menu" aria-controls="slide-menu" aria-expanded="false" role="button" onclick="return false;">
			<?php esc_html_e( 'Menu', 'independent-publisher' ); ?>
		</a><!-- #slide-menu-toggle -->
	<?php endif; ?>

	<div class="cover-meta-wrapper">
		<?php while ( have_posts() ) : the_post(); // We need to be in the loop to get the post metadata ?>
			<div class="cover-meta">
				<h1 class="single-post-title"><?php the_title(); ?></h1>
				<?php independent_publisher_entry_meta(); ?>
			</div><!-- .cover-meta -->
		<?php endwhile; ?>
	</div><!-- .cover-meta-wrapper -->
</div><!-- #post-cover-image -->

<?php elseif ( independent_publisher_has_header_image() ) : ?>

<div id="hero-header" class="site-hero-section">
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<a id="slide-menu-toggle" class="menu-toggle" href="#slide-menu" aria-controls="slide-menu" aria-expanded="false" role="button" onclick="return false;">
			<?php esc_html_e( 'Menu', 'independent-publisher' ); ?>
		</a><!-- #slide-menu-toggle -->
	<?php endif; ?>

	<div class="inner">
		<?php if ( true === get_theme_mod( 'independent_publisher_display_gravatar', true ) ) : ?>
			<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img alt="" class="site-logo-image no-grav" width="100" height="100" src="<?php echo esc_url( get_avatar_url( get_theme_mod( 'independent_publisher_gravatar_email', get_option( 'admin_email' ) ), array( 'size' => 100 ) ) ); ?>" />
			</a><!-- .site-logo-link -->
		<?php endif; ?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="hero-social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social Navigation
					wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
						'container'      => false,
						'depth'          => 1,
					) );
				?>
			</nav><!-- #hero-social-navigation -->
		<?php endif; ?>
	</div><!-- .inner -->
</div><!-- #hero-header -->

<?php endif; ?>