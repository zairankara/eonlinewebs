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
			</div>
			<!-- / LOGO E! online latino -->
			
			
			<!-- links Pie -->
			<div class="links_pie">
				<div class="ad_sales"><a href="http://www.eonlinesaladeimprensa.com/" target="_blank">DIGITAL SALA DE IMPRENSA</a> | <a href="http://la.eonline.com/mexico/beone/" target="_blank">Be on E!</a> | <a href="http://www.eonlineadsales.com/" target="_blank">ad sales</a></div>

        		<?php
        		if(!is_page("programas")) wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'tertiary' ) ); ?>
        	</div>
        	<!-- / links Pie -->

        	<div class="logo_lamac"></div>
        
        <div class="abz"><a href="http://www.abzcomunicacion.com" target="_blank">ABZ Diseño y Comunicación: Diseño y desarrollo de sitios web, marketing digital y BTL.</a></div>
        <p class="copy">&copy; <?php echo date('Y'); ?> E! Entertaiment Television, Inc. Todos os direitos reservados.</p>


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
<div class="boton">
	<div class="boton_centro">
		<div class="logo_ch"></div>
		<div class="media">

						<div style="margin-right:10px; margin-top: 7px; float:right;">
							<?php get_search_form(); ?>
						</div>

						<div style="margin-right:10px; margin-top: 7px; float:right;" id="iconos_footer">
							<a class="addthis_button_email envio"></a>
							<a href="<?=get_bloginfo( 'siteurl' );?>/feed/" class="rss"></a>
							<a href="http://twitter.com/Eonlinebrasil" class="twitter" target="blank"></a>
							<a href="http://www.facebook.com/pages/E-Online-Brasil/145725988795846?ref=sgm" class="facebook" target="blank"></a>
							<a href="http://www.youtube.com/Eonlinebrasil" class="youtube" target="blank"></a>
						</div>

						<div style="margin-right:10px; margin-top: 10px; float:right;">
							<a href="http://twitter.com/share" class="twitter-share-button" data-text="Site recomendado" da ta-count="horizontal" data-via="EonlineBrasil" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div>

						<div style="margin-right:10px; margin-top: 10px; float:right;">
							<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%Eonlinebrasil&layout=button_count&show_faces=true&width=120&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" height="30" style="border:none;overflow:hidden;width:120px;height:30px;text-align:center;"></iframe>							
						</div>



						
		</div>
	</div>
</div>
<!-- Google Code for Etiqueta de remarketing: -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1007010875;
var google_conversion_label = "y3zzCL2IiwgQu4iX4AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1007010875/?value=0&amp;label=y3zzCL2IiwgQu4iX4AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
</body>
</html>
