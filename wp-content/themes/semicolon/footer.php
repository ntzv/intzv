<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*/
?><!— #content —>

<footer class="footer-container">
<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
<div class="footer-sidebar" id="footer" >

<?php dynamic_sidebar( 'footer-sidebar' ); ?>
</div>
<?php endif; ?>
</footer>

<?php wp_footer();?>

<!— .site-info —>
<!— #colophon —>
<!— #page —>




