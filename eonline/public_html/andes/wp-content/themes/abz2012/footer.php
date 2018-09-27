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
include(TEMPLATEPATH."/var_constantes.php");

?>
	</div><!-- #main -->

	<?php if(!is_page("timeline")){?>
	<div id="footer" role="contentinfo">

		<?php
		/* A sidebar in the footer? Yep. You can can customize
		 * your footer with four columns of widgets.
		 */
		get_sidebar( 'footer' );
		?>

			<!-- LOGO E! online latino -->
			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="menu-item-a" >
					<?php bloginfo( 'name' ); ?>
				</a>
			</div>
			<!-- / LOGO E! online latino -->
			
			
			<!-- links Pie -->
			<div class="links_pie">
				<div class="ad_sales"><a href="http://enowlatino.com/" target="_blank" class="menu-item-a" >E Now Latino</a> 
				| <a href="http://www.eonlinesaladeprensa.com/" target="_blank" class="menu-item-a" >DIGITAL PressRoom</a> 
				| <a href="http://la.eonline.com/experience/mediakit/" target="_blank"class="menu-item-a" >MEDIA KIT</a> 
				| <a href="http://www.eonlineadsales.com/" target="_blank"class="menu-item-a" >ad sales</a></div>

        		<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'tertiary' ) ); ?>
        	</div>
        	<!-- / links Pie -->

        	<div class="logo_lamac"></div>
        
        <div class="abz"><a href="http://www.abzcomunicacion.com" target="_blank">ABZ Diseño y Comunicación: Diseño y desarrollo de sitios web, marketing digital y BTL.</a></div>
        <p class="copy">&copy; <?php echo date('Y'); ?> E! Entertaiment Television, Inc. Todos los derechos reservados.</p>


	</div><!-- #footer -->
	<?}?>

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
		<a href="http://www.enowlatino.com" target="_blank" class="logo_ch"></a>
		<div class="media">

						<div style="margin-right:10px; margin-top: 7px; float:right;">
							<form id="formCountry" method="post" name="buscador" action="<?=$_SERVER["REQUEST_URI"]?>">
							<select id="changeCountry" name="cual" style="font: 11px/13px Arial, Tahoma, Verdana, Helvetica, Sans-serif; background-color:#e3e3e3;" onChange="document.forms.buscador.submit();_satellite.track('changeCountry');">
							<option value="" selected>Selecciona tu país</option>
							<option value="2-AR">Argentina</option>
							<option value="1-CO">Aruba</option>
							<option value="1-CO">Barbados</option>
							<option value="1-CO">Bolivia</option>
							<option value="99-BR">Brasil</option>
							<option value="1-CO">Chile</option>
							<option value="1-CO">Colombia</option>
							<option value="1-CO">Costa Rica</option>
							<option value="1-CO">Curacao</option>
							<option value="1-CO">Ecuador</option>
							<option value="1-CO">El Salvador</option>
							<option value="1-CO">Guatemala</option>
							<option value="1-CO">Honduras</option>
							<option value="3-mx">México</option>
							<option value="1-CO">Nicaragua</option>
							<option value="1-CO">Panamá</option>
							<option value="2-AR">Paraguay</option>
							<option value="1-CO">Perú</option>
							<option value="1-CO">Puerto Rico</option>
							<option value="1-CO">Republica Dominicana</option>
							<option value="1-CO">Trinidad & Tobago</option>
							<option value="2-AR">Uruguay</option>
							<option value="4-VE">Venezuela</option>

							</select>
							 <input type="hidden" name="flag" value="1">
							</form>
						</div>
						

						<div style="margin-right:10px; margin-top: 7px; float:right;">
								<?php //get_search_form(); ?>
								<style>
									li.ui-menu-item {
										text-align:left !important;
										color: #000;
										font-size: 12px;
									}
								</style>
								<script>
									$(function() {
										$( "#psearch" ).autocomplete({
											position: { my: "left bottom", at: "left top", collision: "flip" },
											max:4,
											appendTo: "#container_search",
											source: "/common/psearch/search.php",
											minLength: 2
										});
									});

								</script>
								<?php
								$user_search = $_GET['s'];
								$escape_url = esc_url( home_url( '/' ) );
								$label = _x("Search for:", "label" );
								$value_submit = esc_attr_x( 'Search', 'submit button' );

								echo <<<EOT
								<div itemscope itemtype="http://schema.org/WebSite">
									<meta itemprop="url" content="http://la.eonline.com/andes"/>
									<form itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" url="$var_con[1]" role="search" method="get" id="searchform" class="searchform" action="$escape_url">
										<div>
											<label class="screen-reader-text" for="s">$label</label>
											<div id="container_search" style="float:left;">
												<meta itemprop="target" content="$var_con[1]?s={s}"/>
												<input itemprop="query-input" type="text" value="$user_search" name="s" id="psearch" style="height: 15px !important;"/>
											</div>
											<input type="submit" id="searchsubmit" value="$value_submit" style="float:left;"/>
										</div>
									</form>
								</div>
EOT;
								?>
						</div>

						<div style="margin-right:10px; margin-top: 7px; float:right;" id="iconos_footer">
							<span itemscope itemtype="http://schema.org/Organization">
							<!--<a class="addthis_button_email envio"></a>-->
							<a href="<?=get_bloginfo( 'siteurl' );?>/feed/" class="rss"></a>
							<a itemprop="sameAs" href="http://twitter.com/EonlineLatino" class="twitter" target="blank"></a>
							<a itemprop="sameAs" href="http://www.facebook.com/pages/E-Online-Latino/116264915095072?ref=sgm" class="facebook" target="blank"></a>
							<a itemprop="sameAs" href="http://www.youtube.com/EonlineLatinola" class="youtube" target="blank"></a>
							<a itemprop="sameAs" href="https://plus.google.com/109640549139413649832?rel=author" class="google" target="blank"></a>
							<a itemprop="sameAs" href="http://instagram.com/eonlinelatino" class="instagram" target="blank"></a>
							</span>
						</div>

						<div style="margin-right:10px; margin-top: 10px; float:right;">
							<a href="http://twitter.com/share" class="twitter-share-button" data-text="Sitio recomendado" data-count="horizontal" data-via="EonlineLatino" data-lang="es">Tweet</a><script async type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div>

						<div style="margin-right:10px; margin-top: 10px; float:right;">
							<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FEonlinelatino&layout=button_count&show_faces=true&width=120&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" height="30" style="border:none;overflow:hidden;width:120px;height:30px;text-align:center;"></iframe>							
						</div>



						
		</div>
	</div>
</div>


<!-- TAGS CODE mindshareworld.com -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/mindshare/code.php');?>
<!-- END TAGS CODE mindshareworld.com -->

<!-- TAGS CODE THE ROYALS -->
<!-- <?php if( is_category("the-royals") || in_array("category-the-royals", add_category_to_single()) ){?>
		<? include($_SERVER["DOCUMENT_ROOT"].'/varios/the_royals_codes/code_footer.php');?>
<?}?> -->
<!-- END TAGS CODE THE ROYALS -->


<!-- Google Code for Etiqueta de remarketing: -->
<? include("/home/eonline/public_html/varios/remarketing/remarketing.php");?>

<!-- Crazzy Egg Code -->
<? //include("/home/eonline/public_html/varios/crazzy_egg/index.php");?>

<!-- Comscore -->
<? include("/home/eonline/public_html/varios/comscore/index.php");?>

<!-- CodeBasic Omniture-->
<script type="text/javascript" data-device="1">_satellite.pageBottom();</script>
<!-- / CodeBasic Omniture-->
</body>
</html>
