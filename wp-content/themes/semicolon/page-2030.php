<?php
/**
 * Страница подбора продукции
 */

get_header(); ?>
<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		<?php the_post();
			get_template_part( 'content', 'page' ); 

			if ( is_user_logged_in() ) {
				get_template_part( 'podbor' ); 
			}?>

	</main><!-- #main -->
</div><!-- #content -->
<?php get_footer(); ?>
