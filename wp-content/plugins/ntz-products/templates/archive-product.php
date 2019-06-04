<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
	<nav class="header-breadcrumbs">
		<?php Semicolon::breadcrumbs(); ?>
	</nav>
	<?php 
		if ( ! is_home()) : /*fix: не показывать заголовок на главной и странице последних записей*/?>

		<header class="page-header page-description">
			<h1 class="page-title">
				<?php post_type_archive_title(); ?>
			</h1>
		</header><!-- .page-header -->
	<?php endif; // is_home ?>

	<div id="content" class="site-content">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

				<?php semicolon_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
<?php get_footer(); ?>
