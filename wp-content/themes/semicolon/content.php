<?php
/**
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php #Semicolon::inline_controls(); #временно отключить кнопки редактирования записей ?>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<div class="entry-meta">
			<?php the_content(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

</article><!-- #post-## -->