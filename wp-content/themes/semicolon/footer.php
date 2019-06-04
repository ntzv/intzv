<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*/
?>

<div class="footer-container">

	<?php if (function_exists('slbd_display_widgets') ) { echo slbd_display_widgets(); } ?>
	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<div class="footer-sidebar" id="footer" >
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	</div>
	<?php endif; ?>
</div>
<?php wp_footer();?>
</div><!-- #page -->