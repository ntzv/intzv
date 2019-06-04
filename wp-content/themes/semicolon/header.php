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
		<div class="header-container">
			<div class="site-branding">
				<div class="site-logo-wrapper"><?php
				if ( function_exists( 'the_custom_logo' ) ) {
	    			the_custom_logo();
				} ?></div>
				<div class="site-title-container">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>	
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<a class="menu-toggle"><?php _e( 'Menu', 'semicolon' ); ?></a>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'semicolon' ); ?></a>

				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'semicolon-navigation',
					'link_before'    => '<span>',
					'link_after'     => '</span>',
					'depth'          => 2,
				) ); ?>


			</nav><!-- #site-navigation -->
			<div id="header-user-menu" class="main-navigation">
				<?php 
					$current_user = wp_get_current_user();
					if ( is_user_logged_in() ) { ?>

						<ul>
							<li>
								<a class="user-bar">
									<?php echo get_avatar( $current_user->user_email, 30, '', 'User avatar', array('class'=>'user-avatar') ); ?>
									<span class="user-name"><?php echo $current_user->display_name; ?></span>
								</a>
								<?php wp_nav_menu( array(
									'theme_location' => 'user',
									'menu_class'     => 'sub-menu',
									'container'      => false,
									'link_before'    => '<span>',
									'link_after'     => '</span>',
									'fallback_cb'    => '',
									'depth'          => 1,
								) ); ?>
							</li>
						</ul>

					<?php } else {?>
						<?php wp_nav_menu( array(
							'theme_location' => 'user-unregistered',
							'menu_class'     => 'semicolon-user-unregistered',
							'container'      => false,
							'depth'          => 1,
						) ); ?>
					<?php } ?>
						
			</div><!-- .header-user-menu -->

		</div><!-- .header-container -->
	</header><!-- #masthead -->

	<?php do_action( 'semicolon_header_after' ); ?>