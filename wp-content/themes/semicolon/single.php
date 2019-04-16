<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>
    <div id="path"></div> <!-- #path навигационная цепочка-->
    <?php get_sidebar(); /*Боковая панель*/?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					//if ( comments_open() || '0' != get_comments_number() ) :
					//	comments_template();
					//endif;
				?>

			<?php endwhile; // end of the loop. ?>

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