<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<!-- LOGO E! online latino -->
			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><br clear="all" />
			<!-- / LOGO E! online latino -->
			
			<!-- MENU PIE -->
			<div id="menu_pie" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'E-online' ); ?>"><?php _e( 'Skip to content', 'E-online' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php /*wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); */?>
				<div style="float: right;"><?php get_search_form(); ?></div><br clear="all" />
			</div>
			<!-- / MENU PIE -->
			
			<!-- links Pie -->
			<div class="links_pie">
			<div class="ad_sales"><a href="http://www.eonlinesaladeimprensa.com/" target="_blank">SALA DE IMPRENSA</a> | <a href="http://la.eonline.com/venezuela/beone/" target="_blank">Be on E!</a> |  <a href="http://www.eonlineadsales.com/" target="_blank">ad sales</a></div>
        	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'secondary' ) ); ?>
        	<br clear="all" />
        	</div>
        	<!-- / links Pie -->
        
        <div class="abz"><a href="http://www.abzcomunicacion.com" target="_blank">ABZ Diseño y Comunicación: Diseño y desarrollo de sitios web, marketing digital y BTL.</a></div>
        <p class="copy">&copy; <?php echo date('Y'); ?> E! Entertaiment Television, Inc. Todos os direitos reservados.</p>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
	//define( 'FB_WPDO_FRONTEND', TRUE );
?>
</body>
</html>
