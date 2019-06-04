<?php
/**
 * Страница обзора продукции
 */

get_header(); ?>

	<div id="path"></div> <!-- #path -->
	<div id="content" class="site-content">
		<?php get_sidebar(); ?>

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
