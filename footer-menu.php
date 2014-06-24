<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package discovery
 * @since discovery 1.0
 */
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>   
		<?php endif; ?> 
		<?php if ( is_active_sidebar( 'center_column' ) && dynamic_sidebar('center_column') ) : else : ?>   
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'right_column' ) && dynamic_sidebar('right_column') ) : else : ?>   
		<?php endif; ?>
	</div>
	</div><!-- #main .site-main -->
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' ); ?>">
            <?php _e('Discovery WordPress Theme','discovery'); ?></a>
            <?php echo __( 'Powered By WordPress ', 'discovery' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
    <a href="#top" id="smoothup"></a>
</div><!-- #page .hfeed .site -->
</div><!-- end of wrapper -->
<?php wp_footer(); ?>

</body>
</html>