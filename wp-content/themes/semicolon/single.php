<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?> 

	<!-- <div id="path"></div> --> <!-- #path -->
	<div id="content" class="site-content">

		<?php get_sidebar(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_footer(); ?>
</div><!-- #page -->

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