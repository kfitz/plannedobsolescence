<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Independent_Publisher
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'independent-publisher' ); ?></a>

	<?php get_template_part( 'template-parts/header', 'cover-image' ); ?>

	<div id="content-wrapper">
		<header id="masthead" class="site-header" role="banner">
			<?php if ( independent_publisher_show_site_branding() ) : ?>
				<div class="site-branding">
					<?php if ( true === get_theme_mod( 'independent_publisher_display_gravatar', true ) ) : ?>
						<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img alt="" class="site-logo-image no-grav" width="100" height="100" src="<?php echo esc_url( get_avatar_url( get_theme_mod( 'independent_publisher_gravatar_email', get_option( 'admin_email' ) ), array( 'size' => 100 ) ) ); ?>" />
						</a><!-- .site-logo-link -->
					<?php endif; ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav id="social-navigation" class="social-navigation" role="navigation">
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
					</nav><!-- #social-navigation -->
				<?php endif; ?>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'independent-publisher' ); ?></button>
						<?php
							// Primary Navigation
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container'      => false,
							) );
						?>
					</nav><!-- #site-navigation -->
				<?php endif; ?>
			<?php endif; ?>

			<?php get_sidebar(); ?>
		</header><!-- #masthead -->

		<div id="content" class="site-content">
