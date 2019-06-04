<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> 

	<?php if ( !is_front_page() ) : /*не показывать заголовок на главной странице*/ ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'semicolon' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
