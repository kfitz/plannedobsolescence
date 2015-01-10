<?php
/**
 * @package WordPress
 * @subpackage Chunky Child
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(); ?> <?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo('description') ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<meta name="google-site-verification" content="HN9oMGr_Lfjnq-qVV_VfDlvkl1GpIBYYw9ctQVL5UJQ" />

<script type="text/javascript">var a=new Date,b=a.getUTCHours();if(0==a.getUTCMonth()&&2012==a.getUTCFullYear()&&((18==a.getUTCDate()&&13<=b)||(19==a.getUTCDate()&&0>=b)))window.location="http://sopastrike.com/strike";</script>


	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
	?>
</head>
<body <?php body_class(); ?>>

<div id="container">

	<div id="header">
		<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>

	<div id="menu">
		<?php
			// Do we have a header image around?
			if ( '' != get_header_image() ) :
		?>
		<div id="header-image">
			<a href="<?php echo home_url( '/' ); ?>">
				<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
			</a>
		</div>
		<?php endif; ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</div>
