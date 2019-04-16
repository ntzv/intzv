<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title1"><?php _e( 'Nothing Found', 'semicolon' ); ?></h1>
		<style>
		.page-title1
			{
				line-height:20px;
				font-size: 32px;
				position: center;
			}
		</style>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'semicolon' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'semicolon' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( '', 'semicolon' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
