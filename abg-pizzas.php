<?php

/*
 * Template Name: ABG Pizzas
 * Description: A Page Template with sidebar widgets.
 *
 * @package discovery
 * @since discovery 1.0
 */



get_header(); ?>

			<header class="entry-header">
			<h1 class="page-title"><?php the_title(); ?><span class="breadcrumbs"><?php if (function_exists('discovery_breadcrumbs')) discovery_breadcrumbs(); ?></span></h1>
			</header><!-- .entry-header -->

			<div id="primary" class="content-area">

				<div id="content" role="main">
					<div id="menu-items">
				<?php
	          		if (have_posts()) :  while ( have_posts() ) : the_post();
	          	?>
	          	<?php the_content();?>
	      		<?php endwhile;endif;?> 
	          	<?php query_posts('posts_per_page=-1&orderby=date&order=ASC&post_type=pizzas&paged='.$paged); ?>
	          	<?php
	          		if (have_posts()) :  while ( have_posts() ) : the_post();
	          	?>
	          	<div class="abg-row romana-pizza-item">
	            	<div class="abg-col-2-3 romana-pizza-item-description">
		              	<h1><?php the_title();?></h1>
		              	<p><?php echo (get_post_meta(get_the_ID(), 'pizza_description', true )); ?></p>
	            	</div>
	            	<div class="abg-col-1-3 romana-pizza-item-price">
	            		<span class="romana-prix"><?php echo (get_post_meta(get_the_ID(), 'pizza_normal_price', true )); ?></span>
	            		<span class="romana-mini-prix"><?php echo (get_post_meta(get_the_ID(), 'pizza_small_price', true )); ?></span>
	        		</div>
	          	</div>
	          <?php endwhile;endif;?> 
	          	<p>Garniture supplémentaire</p>
          		<ul>
					<li>Œuf	2.-</li>
					<li>Lardons, poivrons, olives, anchois, ananas, jambon 3.-</li>
					<li>Merguez, rucola, salami piquant, champignons 3.-</li>
					<li>Câpres, Grana Padano, gorgonzola 3.-</li>
					<li>Jambon cru, carpaccio bœuf, crevettes, saumon fumé 6.-</li>
				</ul>
	  			<div id="abg-pagination"><?php my_pagination(); ?></div>

	  				</div>
				</div><!-- #content .site-content -->

			</div><!-- #primary .content-area -->

<?php get_footer( 'menu' ) ?>
