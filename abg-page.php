<?php

/*
 * Template Name: ABG Page
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



				<?php while ( have_posts() ) : the_post(); ?>



					<?php get_template_part( 'content', 'page' ); ?>


				<?php endwhile; // end of the loop. ?>



			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>   
			<?php endif; ?> 
			<?php if ( is_active_sidebar( 'center_column' ) && dynamic_sidebar('center_column') ) : else : ?>   
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'right_column' ) && dynamic_sidebar('right_column') ) : else : ?>   
			<?php endif; ?>
		</div>