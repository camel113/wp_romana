<?php
/**
 * The template for displaying the footer for the home page.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package discovery
 * @since discovery 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer_container">
    <div class="section group">
    
	<div class="col span_1_of_3">
    <?php if ( is_active_sidebar( 'left_column' ) && dynamic_sidebar('left_column') ) : else : ?>
         <div class="widget">
			<?php echo '<h4>' . __('Widget Ready', 'discovery') . '</h4>'; ?>
            <?php echo '<p>' . __('This left column is widget ready! Add one in the admin panel.', 'discovery') . '</p>'; ?>
            </div>     
	<?php endif; ?>  
		</div>
        
	<div class="col span_1_of_3">
	<?php if ( is_active_sidebar( 'center_column' ) && dynamic_sidebar('center_column') ) : else : ?>
         <div class="widget">
			<?php echo '<h4>' . __('Widget Ready', 'discovery') . '</h4>'; ?>
            <?php echo '<p>' . __('This center column is widget ready! Add one in the admin panel.', 'discovery') . '</p>'; ?>
            </div>     
	<?php endif; ?> 

	</div>
    
	<div class="col span_1_of_3">
	<?php if ( is_active_sidebar( 'right_column' ) && dynamic_sidebar('right_column') ) : else : ?>
         <div class="widget">
			<?php echo '<h4>' . __('Widget Ready', 'discovery') . '</h4>'; ?>
            <?php echo '<p>' . __('This right column is widget ready! Add one in the admin panel.', 'discovery') . '</p>'; ?>
            </div>     
	<?php endif; ?> 
	</div>
	</div>
        </div><!-- footer container -->
        <div class="site-info ">
        	<div class="vcard">
            	<span class="fn">La Romana | Restaurant Pizzeria</span> - <span class="adr"><span class="street-address">Place de la gare 2</span> - <span class="postal-code">1580</span> <span class="locality">Avenches</span></span> - <span class="tel">026 675 13 75</span>
			</div><!-- .vcard -->
			<a href="http://www.pme-web.ch" title="Conception site internet">pme-web.ch</a>
        </div>
	</footer><!-- #colophon .site-footer -->
    <a href="#top" id="smoothup"></a>
</div><!-- #page .hfeed .site -->
</div><!-- end of wrapper -->
<?php wp_footer(); ?>

</body>
</html>