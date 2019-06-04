<?php
/**
 * Шаблон категории
 */

get_header(); ?>

	<!-- <div id="path"></div> --> <!-- #path -->
	<div id="content" class="site-content">

		<?php get_sidebar(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
				<header class="entry-header">
					<?php Semicolon::breadcrumbs(); ?>
					<h1 class="entry-title"><?php single_cat_title(); ?></h1>
				</header><!-- .entry-header -->
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