<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php Semicolon::breadcrumbs(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

<div class="entry-content">
		<!-- main desc -->
	<div class="production">
			
		<div class="product-main" style="clear: both;">
			<?php 
			$mainimage = get_field('main_image');

			if( $mainimage ): ?>

	
			</div>
				<div class="product-main-image" style="width: 300px; float: left;">
					<img src="<?php echo $mainimage['sizes']['medium']; ?>" alt="<?php echo $mainimage['alt']; ?>"/>
				</div><!-- .product-main-image -->

			<?php endif; ?>

			<div class="product-desc">
				<?php the_field('desc'); ?>			
			</div><!-- .product-desc -->
		   
		<div  class="buttonpro" style="padding-bottom: 100px; ">
			<a href="https://ntz-volhov.r-host.ru/?page_id=2030"p><button id="myActionButton">Подобрать по параметрам</button></a>
		</div>

	<div class="korpus1">
		<input type="radio" name="odin" checked="checked" id="vkl1"/><label for="vkl1">Параметры</label>
		<input type="radio" name="odin" id="vkl2"/><label for="vkl2">Документы</label>
		<input type="radio" name="odin" id="vkl3"/><label for="vkl3">Вопросы и ответы</label>
		<div>
			<?php the_field('chars'); ?>
		</div>
		<div>
			<?php get_template_part( 'content', 'attached' ); ?>
		</div>
		<div>
			<?php the_field('certs'); ?>
		</div>
	</div>
</div>
<!--
 		<div class="product-tabs-body">
			<section id="chars" class="product-tab">
				<?php the_field('chars'); ?>
			</section>	
			<section id="docs" class="product-tab tab-hidden">
				<?php the_field('docs'); ?>
			</section>	
			<section id="certs" class="product-tab tab-hidden">
				<?php the_field('certs'); ?>
			</section>	
		</div> --> <!-- .product-tabs-body -->


		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'semicolon' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
