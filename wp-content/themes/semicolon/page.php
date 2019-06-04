<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

	<div id="content" class="site-content">
		<main id="main" class="site-main" role="main">
			<?php if ( ! is_front_page()) { Semicolon::breadcrumbs(); } /*fix: не показывать навигацию на главной*/?> 
			<?php 
			while ( have_posts() ) : the_post(); 

				get_template_part( 'content', 'page' );

			endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #content -->

<?php get_footer(); ?>