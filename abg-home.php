<?php

/*
 * Template Name: ABG HOME
 * Description: A Page Template with no sidebar.
 *
 * @package discovery
 * @since discovery 1.0
 */



get_header(); ?>

		<div id="primary_home" class="content-area">

			<div id="content" class="fullwidth" role="main">



				<?php while ( have_posts() ) : the_post(); ?>



					<?php get_template_part( 'content', 'page' ); ?>


				<?php endwhile; // end of the loop. ?>



			</div><!-- #content .site-content -->

		</div><!-- #primary .content-area -->



<?php get_footer(); ?>