<style type="text/css">
	#collapscat-5{
		display:none !important;
	
	}
    #entry-title{
			font-size: 0px !important;
		
		}
	#primary #main{
		margin-left:0 !important;
	}
</style>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
			<style>
.link {display: inline-block; padding: 0 0; text-align: center; !position: center; margin: 30px}
			</style>
			<center>
<style>
    .link {
     width: 300px; /* Ширина слоя */
     height: 200px; /* Высота слоя */
     background: rgba(0, 170, 238, 0.9);/* Цвет фона */
    }
 
	 }
    .link a {

     display: block; /* Ссылка как блочный элемент */
     text-align: center; /* Выравнивание по центру */
     height: 100%; /* Высота на весь слой */
		width: 100%;
     color: #666; /* Цвет ссылки */
		background: rgba(0, 0, 0, 0.5);
    }
  </style>
				</center>
		
		
			</main><!-- #main -->
	</div><!-- #primary -->



<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
