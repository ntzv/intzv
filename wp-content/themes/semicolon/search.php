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

			<?php if ( have_posts() ) : get_search_form(); ?>
 
				<?php $post_types = get_post_types( array( 'exclude_from_search' => false ), 'objects' );
				
				unset($post_types['attachment']); // исключить тип записей "вложения"
				unset($post_types['page']);
				
				$post_types = array_reverse($post_types, true); 
				$post_types[''] = (object) array('name' => '', 'label' => 'Все'); //добавить к массиву типов записей в начало
				$post_types = array_reverse($post_types, true); 
				?>
			 
				<nav>
					<?php foreach ( $post_types as $post_type => $value ) { ?>
						<li сlass="search-results-type-item<?php echo ( $post_type == get_query_var('post_type') ) ? ' current-search-results-type-item':'';?>">
							<?php printf('<a href="%s">%s</a>', home_url('/?s=').get_query_var('s').'&post_type='. $post_type , $value->label ); ?>
						</li> 

					<?php } ?>
					</ul>

				</nav>

				<ul сlass="search-results">
				
				<?php
				while ( have_posts() ) : the_post(); //Start the Loop

				$postType = get_post_type_object(get_post_type());  ?>

						<li class="search-results">
							<h3>
								<a href="<?php the_permalink() ?>">
									<?php ( function_exists( 'relevanssi_the_title' ) ) ? relevanssi_the_title() : the_title() ; ?>
								</a>
							</h3>
							<?php  /*the_post_thumbnail('medium') */?>
							<p>
								<?php echo get_the_excerpt(); ?>
								<span class="h-readmore"> <a href="<?php the_permalink(); ?>">Далее</a></span>
							</p>
						</li>
						<?php /*get_template_part( 'content' );*/ ?>
					<?php  

				endwhile; ?>

				</ul>
				<?php 
		
				semicolon_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>