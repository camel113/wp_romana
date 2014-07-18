<?php

/*
 * Template Name: ABG Risottos
 * Description: A Page Template with sidebar widgets.
 *
 * @package discovery
 * @since discovery 1.0
 */
$post_type = 'menu_item';
$tax = 'menu_category';
$tax_terms = get_terms($tax);

remove_filter ('the_content', 'wpautop');


get_header(); ?>

			<header class="entry-header">
			<h1 class="page-title"><?php the_title(); ?><span class="breadcrumbs"><?php if (function_exists('discovery_breadcrumbs')) discovery_breadcrumbs(); ?></span></h1>
			</header><!-- .entry-header -->

			<div id="primary" class="content-area">

				<div id="content" role="main">
					<div id="menu-items">


						<?php 
			            	if ($tax_terms) {
							  	foreach ($tax_terms  as $tax_term) {
								    $args=array(
								      'post_type' => $post_type,
								      "$tax" => $tax_term->slug,
								      'post_status' => 'publish',
								      'posts_per_page' => -1,
								      'caller_get_posts'=> 1,
								      'orderby' =>'date',
								      'order' => 'asc'
								    );

								    $my_query = null;
								    $my_query = new WP_Query($args);
								    if( $my_query->have_posts() ):?>
								      	<?php while ($my_query->have_posts()) : $my_query->the_post(); 
								      		if($tax_term->slug == 'risottos'): ?>

								      		<div class="abg-row romana-menu-item">
								            	<div class="abg-col-2-3 romana-menu-item-description">
									              	<h1><?php the_title();?></h1>
								            	</div>
								            	<div class="abg-col-1-3 romana-menu-item-price">
								            		<span class="romana-prix"><?php echo (get_post_meta(get_the_ID(), 'menu_item_price', true )); ?></span>
								        		</div>
								          	</div>
								          	<?php endif;
								        endwhile; ?>
								   	<?php endif;
								    wp_reset_query();
							  }
							}?>

		  			<div id="abg-pagination"><?php my_pagination(); ?></div>

	  				</div>
				</div><!-- #content .site-content -->

			</div><!-- #primary .content-area -->

<?php get_footer( 'menu' ) ?>
