<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="yandex-verification" content="9d0f67897cc5cb04" />
<meta name="yandex-verification" content="de24bca65bed5366" />	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="https://intzv.ru/ntz-volhov1.ico" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script type="text/javascript">document.body.className = document.body.className.replace('no-js','js');</script>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
			<div class="site-logo-wrapper"><?php
			if ( function_exists( 'the_custom_logo' ) ) {
    			the_custom_logo();
			} ?></div>
			<div class="site-title-container">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="menu-toggle"><?php _e( 'Menu', 'semicolon' ); ?></a>
					<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'semicolon' ); ?></a>

					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'semicolon-navigation',
						'depth'          => 1,
					) ); ?>

					<?php wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'semicolon-social',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => '',
						'depth'          => 1,
					) ); ?>

				</nav><!-- #site-navigation -->
			</div>
		</div>

	</header><!-- #masthead -->

	<?php do_action( 'semicolon_header_after' ); ?>

	<div id="content" class="site-content">
