<?php
/**
 * Template Name: APP
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
include(TEMPLATEPATH."/var_constantes.php");

get_header(); ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/images/app/script.js"></script>
		<div id="container" class="one-column">
			<div id="content" role="main">
					<h2>Descubre nuestra nueva APP para móviles</h2>
					
					<style type="text/css">
					.fondo_app{
						width: 100%;
						background-color: #000;
						color:#fff;
						padding: 0 20px;
						height: 780px;
					}
					.fondo_app .izq{
						float: left;
						width: 400px;
						height: 723px;
						position: relative;
					}
					.fondo_app .izq img{
						position: absolute;
						bottom: 0;
					}
					.fondo_app .der{
						float: left;
						width: 480px;
						font-family: "Din Web Condensed", "Arial Narrow", Sans-Serif;
						font-size: 22px;
						line-height: 1.23;
						margin-top: 15px;
					}
					.subtit_app{
						color:#30daff !important;
						font-size: 36px !important;
						float: right;
						text-align: right;
						width: 650px;
						margin:20px;
					}
					#inline1,#inline2,#inline3 {
						display:none;
						width: 600px;
						height: 400px;
					}
					.iconos{
						margin: 15px auto;
						height: 57px;
					}
					.iconos .apple,.iconos .android,.iconos .blackberry{
						width: 147px;
						height: 57px;
						float: left;
						margin-right: 10px;
						background: url(<?php bloginfo('template_directory'); ?>/images/iconos_app.gif) 0 0 no-repeat;
					}
					.iconos .android{
						background-position: -147px 0;
					}
					.iconos .blackberry{
						background-position: -294px 0;
					}
					.video_app{
						clear: both;
						width: 470px;
						height: 270px;
						margin: 15px auto;
					}

					#text {margin:50px auto; width:500px}
					.hotspot {color:#900; padding-bottom:1px; border-bottom:1px dotted #900; cursor:pointer}

					#tt {position:absolute; display:block; background:url(images/tt_left.gif) top left no-repeat}
					#tttop {display:block; height:5px; margin-left:5px; background:url(images/tt_top.gif) top right no-repeat; overflow:hidden}
					#ttcont {display:block; padding:10px; margin-left:5px; background:#fff; color:#FFF}
					#ttbot {display:block; height:5px; margin-left:5px; background:url(images/tt_bottom.gif) top right no-repeat; overflow:hidden}
					</style>
					<h2 class="subtit_app">Lo mejor de E! Online está disponible en tu MÓVIL</h2>
					<div class="fondo_app">
						<div class="izq">
							<img src="<?php bloginfo('template_directory'); ?>/images/img_app.png" alt="">
						</div>
						<div class="der">
						Nunca ha sido tan fácil acceder a tu dosis diaria de cultura pop. Obtén 
						las noticias más actuales del mundo del entretenimiento, las fotos y los
						 videos sin los que no puedes vivir! Mantente conectado a nuestros livestreams 
						y conoce minuto a minuto lo que sucede en el mundo del espectáculo en 
						Hollywood y Latinoamérica.
						Navega por las cientos de galerías con imágenes de las celebridades más
						 importantes y no te pierdas los clips de tus shows favoritos de E! como 
						Keeping Up With The Kardashians, Latin Bites, Zona Trendy, E! VIP, La Sopa y más.
						Ponte al día con los tópicos y las estrellas que son trending y los últimos 
						rumores de los que todo el mundo está hablando. Comparte artículos, fotos 
						y videos con tus amigos vía Facebook y Twitter!
						El nuevo app de E! Online tiene lo mejor del mundo del entretenimiento…
						La cultura pop nunca había estado tan cerca de ti. Be on E!
							
							<div class="iconos">
									<a href="https://itunes.apple.com/mx/app/e!-online/id576066937?ls=1&mt=8" class="apple" onmouseover="tooltip.show('<img src=\'<?php bloginfo('template_directory'); ?>/images/app/IOS_latam.png\'/>');" onmouseout="tooltip.hide();" onClick="_gaq.push(['b._trackEvent', 'Descargas APP', 'Iphone']);"></a>
								<a href="https://play.google.com/store/apps/details?id=com.eonline.la.Emx" class="android" onmouseover="tooltip.show('<img src=\'<?php bloginfo('template_directory'); ?>/images/app/google_play_espanol.png\'/>');" onmouseout="tooltip.hide();" onClick="_gaq.push(['b._trackEvent', 'Descargas APP', 'Android']);"></a>
								<a href="http://appworld.blackberry.com/webstore/content/19752303/?lang=en" class="blackberry" onmouseover="tooltip.show('<img src=\'<?php bloginfo('template_directory'); ?>/images/app/backberry_latam.png\'/>');" onmouseout="tooltip.hide();" onClick="_gaq.push(['b._trackEvent', 'Descargas APP', 'BB']);"></a>
							</div>

							<div class="video_app">
									<!-- Start of Brightcove Player -->
									<div style="display:none"></div>

									<!--
									By use of this code snippet, I agree to the Brightcove Publisher T and C 
									found at https://accounts.brightcove.com/en/terms-and-conditions/. 
									-->

									<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
									<object id="myExperience2008252904001" class="BrightcoveExperience">
									  <param name="bgcolor" value="#000000" />
									  <param name="width" value="470" />
									  <param name="height" value="270" />
									  <param name="playerID" value="773795205001" />
									  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" />
									  <param name="isVid" value="true" />
									  <param name="isUI" value="true" />
									  <param name="dynamicStreaming" value="true" />
									  <param name="wmode" value="opaque" />
									  <param name="@videoPlayer" value="2008252904001" />
									</object>

									<!-- 
									This script tag will cause the Brightcove Players defined above it to be created as soon
									as the line is read by the browser. If you wish to have the player instantiated only after
									the rest of the HTML is processed and the page load is complete, remove the line.
									-->
									<script type="text/javascript">brightcove.createExperiences();</script>

									<!-- End of Brightcove Player -->
							</div>

						</div>
					</div>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
