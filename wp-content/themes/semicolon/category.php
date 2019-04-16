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

    <div id="path"></div> <!-- #path навигационная цепочка-->
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

<script>
    $ = window.jQuery;
	d = $('div[id^="collapsCat"][style^="display:block"]');
	a = d.siblings('a[href*="cat"]');
	s = '';
	for (i = 0; i < a.length; i++){
		c = '<a href="'+a[i].href+'" title="'+a[i].title+'">'+a[i].innerText+'</a>';
		if (i > 0) {s += ' > '}
		s += c;
	}
	 if (document.location.search.indexOf('p=')>0)
	 {document.getElementById('path').innerHTML = '<p>' + s +'</p>';}
  </script>

<?php get_footer(); ?>