<?php

/*
 * Template Name: ABG Sidebar
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

						<?php while ( have_posts() ) : the_post(); ?>



							<?php the_content(); ?>


						<?php endwhile; // end of the loop. ?>

	  				</div>
				</div><!-- #content .site-content -->

			</div><!-- #primary .content-area -->

<?php get_footer( 'menu' ) ?>
