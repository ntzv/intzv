<?php
/*
Template Name: Search Results
*/
get_header();
global $wp_query;
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php if ( have_posts() ) : ?>

        <?php get_search_form(); ?>
 
        <ul сlass="search-results">

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <li class="search-results">
            <h3><a href="<?php echo get_permalink(); ?>">
              <?php the_title();  ?>
            </a></h3>
            <?php  /*the_post_thumbnail('medium') */?>
            <?php echo get_the_excerpt(); ?>
            <span class="h-readmore"> <a href="<?php the_permalink(); ?>">Далее</a></span>
          </li>
          <?php /*get_template_part( 'content' );*/ ?>

        <?php endwhile; ?>
      
        </ul>
      
        <?php semicolon_paging_nav(); ?>

      <?php else : ?>

        <?php get_template_part( 'content', 'none' ); ?>

      <?php endif; ?>


    </main><!-- #main -->
  </div><!-- #primary -->
</div>

<?php get_footer(); ?>