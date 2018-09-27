<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" )  ||  in_category( "efashionblogger" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" )  ||  is_category( "efashionblogger" ) ||  is_category( "latinbillboard" )) $cat_alf2=1;
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">
						<!-- BRIGHTCOVE -->
						 <ul class="xoxo" >
								<?php include("wp-content/themes/E-online/videos.php"); ?>		
						</ul>

						<!-- BANNER MEDALLERO-->
						<!--<ul class="xoxo" >
							<style>
							#medallero{
								width:300px;
								height:350px;
								background: url(http://la.eonline.com/admin2012/medallero.jpg) top no-repeat;
								position: relative;
							}
							#medallero .modulo{
								width:170px;
								height:30px;
								float:left;
								margin-left: 150px;
							}
							#medallero .modulo .data{ width:50px; height:30px; float:left; vertical-align: middle; text-align:center; }
							</style>

							<?
							$wpdbtest_otherdb = new wpdb("eonline_usr", "30nl1n3", "eonline_argentina", "preprodabzdb");
							$wpdbtest_otherdb->show_errors();
							$datos_medallas=$wpdbtest_otherdb->get_row("SELECT * FROM abmMedallero where id=1");
							?>

							<li id="medallero">
								<div class="modulo" style="margin-top:115px;">
									<div class="data"><?=$datos_medallas->venezuela_oro;?></div>
									<div class="data"><?=$datos_medallas->venezuela_plata;?></div>
									<div class="data"><?=$datos_medallas->venezuela_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->colombia_oro;?></div>
									<div class="data"><?=$datos_medallas->colombia_plata;?></div>
									<div class="data"><?=$datos_medallas->colombia_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->chile_oro;?></div>
									<div class="data"><?=$datos_medallas->chile_plata;?></div>
									<div class="data"><?=$datos_medallas->chile_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->argentina_oro;?></div>
									<div class="data"><?=$datos_medallas->argentina_plata;?></div>
									<div class="data"><?=$datos_medallas->argentina_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->uruguay_oro;?></div>
									<div class="data"><?=$datos_medallas->uruguay_plata;?></div>
									<div class="data"><?=$datos_medallas->uruguay_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->brasil_oro;?></div>
									<div class="data"><?=$datos_medallas->brasil_plata;?></div>
									<div class="data"><?=$datos_medallas->brasil_bronce;?></div>
								</div>
								<div class="modulo">
									<div class="data"><?=$datos_medallas->mex_oro;?></div>
									<div class="data"><?=$datos_medallas->mex_plata;?></div>
									<div class="data"><?=$datos_medallas->mex_bronce;?></div>
								</div>
							</li>
						</ul>-->
						<!-- BANNER FASHION BLOGGER 
						 <ul class="xoxo" >
								<li>
								<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="300" height="115" id="e_fashionblogger" align="middle">
								<param name="allowScriptAccess" value="sameDomain" />
								<param name="allowFullScreen" value="false" />
								<param name="movie" value="<?php bloginfo('template_url')?>/images/banners/e_fashionblogger_ANDES.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />	<embed src="<?php bloginfo('template_url')?>/images/banners/e_fashionblogger_ANDES.swf" quality="high" bgcolor="#ffffff" width="300" height="115" name="e_fashionblogger" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
								</object>
								</li>
						</ul>-->
						
						<!-- BANNER ROYAL WEDDING-->
						<!--  <ul class="xoxo" >
								<li>
								<a href="<?php echo home_url( '/' ); ?>category/kim_wedding"><IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/banners/ingreso.gif" WIDTH="300" HEIGHT="102" BORDER="0" ALT=""></a>
								</li>
						</ul> -->

						<?php if($cat_alf2!=1 || $cat_alf!=1):?>

						<!-- SIDEBAR 1 -->
						<ul class="xoxo">
						<?php
							if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

									<li id="search" class="widget-container widget_search">
										<?php //get_search_form(); ?>
									</li>

									<li id="archives" class="widget-container">
										<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
										<ul>
											<?php wp_get_archives( 'type=monthly' ); ?>
										</ul>
									</li>


									<li id="meta" class="widget-container">
										<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
										<ul>
											<?php wp_register(); ?>
											<li><?php wp_loginout(); ?></li>
											<?php wp_meta(); ?>
										</ul>
									</li>

							<?php endif; // end primary widget area ?>
						</ul>
						<?php endif; // end primary widget area ?>

							<?php 	$color_fondo="344a61";?>
							<?php 	$archivo_widget="widget";?>
							
							<?php
							if ( is_category( "efashionblogger") ){?><!--  SI ES CATEGORIA FASHIONBLOGGER -->
										<div class="xoxo">
										<!-- <IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/twitter/header_fashion.gif" WIDTH="300" HEIGHT="70" BORDER="0" ALT=""> -->
											<script src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/widget_fashion.js"></script>
											<script>
											new TWTR.Widget({
											  version: 2,
											  type: 'profile',
											  rpp: 4,
											  interval: 6000,
											  width: 300,
											  height: 300,
											  theme: {
												shell: {
												  background: '#b59b80',
												  color: '#ffffff'
												},
												tweets: {
												  background: '#ffffff',
												  color: '#adadad',
												  links: '#073a73'
												}
											  },
											  features: {
												scrollbar: true,
												loop: false,
												live: true,
												hashtags: true,
												timestamp: true,
												avatars: false,
												behavior: 'all'
											  }
											}).render().setUser('MicaeladelPrado').start();
											</script>
											</div>
									<!-- SIDEBAR 2 -->
									<?php
									if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

											<ul class="xoxo">
												<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/comunes/fashion_fotos.gif" WIDTH="300" HEIGHT="50" BORDER="0" ALT="">
												<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
											</ul>

									<?php endif; ?>

							<?}elseif ( is_category( "cine_by_john_paul") ){?>
										<br clear="all"/>
										<div class="xoxo" style="border:1px solid ##B59B80;">
										<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
										<script>
										new TWTR.Widget({
										  version: 2,
										  type: 'profile',
										  rpp: 4,
										  interval: 30000,
										  width: 300,
										  height: 300,
										  theme: {
												shell: {
												  background: '#b59b80',
												  color: '#ffffff'
												},
												tweets: {
												  background: '#ffffff',
												  color: '#adadad',
												  links: '#073a73'
												}
											  },
										  features: {
											scrollbar: false,
											loop: false,
											live: false,
											behavior: 'all'
										  }
										}).render().setUser('JohnPaulOspina').start();
										</script>
										</div>
							<?}else{?>

										<?php
										if ( ($cat_alf2==1 || $cat_alf==1) && !(is_home())){
											$color_fondo="6d5928";$archivo_widget="widget_alfombra";$ad="_alfombra";
										}?>
											<div class="xoxo">
											<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/twitter/header<?=$ad?>.gif" WIDTH="300" HEIGHT="53" BORDER="0" ALT="">
												<script src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/widget3.js"></script>
												<script>
												new TWTR.Widget({
												  version: 2,
												  type: 'list',
												  rpp: 30,
												  interval: 6000,
												  width: 300,
												  height: 300,
												  theme: {
													shell: {
													  background: '#<?=$color_fondo?>',
													  color: '#ffffff'
													},
													tweets: {
													  background: '#ffffff',
													  color: '#a8a8a8',
													  links: '#073a73'
													}
												  },
												  features: {
													scrollbar: true,
													loop: false,
													live: true,
													hashtags: true,
													timestamp: true,
													avatars: true,
													behavior: 'all'
												  }
												}).render().setList('e_celebrity_la', 'test').start();
												</script>
											</div>
											<!-- #primary .widget-area -->

						<?}?>
							

						<div class="xoxo" style="margin:10px 0;">
						<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FEonlinelatino&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;height=350" scrolling="no" frameborder="0" style="border:none; background: #fff; overflow:hidden; width:300px; height:350px;" allowTransparency="true"></iframe>
						</div>

						 <div class="widget_redes"></div>
								  <div style="width: 150px; background-color:white;padding-top: 35px;padding-bottom: 10px; text-align:center;float:left; height:50px;">
												<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FEonlinelatino&layout=button_count&show_faces=true&width=120&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" height="30" style="border:none;overflow:hidden;width:120px;height:30px;text-align:center;"></iframe>

								</div>
								<div style="width: 150px; background-color:white;padding-top: 35px;padding-bottom: 10px; text-align:center;float:left;height:50px;">
								<a href="http://twitter.com/share" class="twitter-share-button" data-text="Sitio recomendado" data-count="horizontal" data-via="EonlineLatino" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div>

						<div class="xoxo" style="margin:15px 0;">
								<style>
								.shadow{
									-webkit-box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
									-moz-box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
									box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
									border:1px solid #ccc;
									margin-right:10px;
								}
								</style>
								<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/comunes/talentos.gif" WIDTH="300" HEIGHT="29" BORDER="0" ALT="">
								<div style='height:170px; _height:180px; overflow-y:auto; width:300px; background:#fff; padding-top:10px;'>
											
											<div style="width:130px; margin-left:5px; padding-bottom:10px; float:left;">
													<table style="margin:0px;">
													<tr>
														<td valign="top" width="130" align="center"> <div style="width:90px; height:54px; overflow:hidden;" class="shadow">
														<A HREF="" target="_blank"><img src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/celebridades/leandro_leunis.jpg" alt="" width="90" border="0" /></A></div></td>
													</tr>
													<tr>
														<td class="mod_chico_programa" style="text-align:center;" ><A HREF="" target="_blank" style="text-decoration:none;">Leandro Leunis</A></td>
													</tr>
													</table>
											</div>
											
											<div style="width:130px;margin-left:5px; padding-bottom:10px; float:left;">
													<table style="margin:0px;">
													<tr>
														<td valign="top" width="130" align="center"> <div style="width:90px; height:54px; overflow:hidden;" class="shadow">
														<A HREF="http://www.facebook.com/CoffeeBreakE" target="_blank"><img src="http://la.eonline.com/andes/wp-content/themes/E-online/celebridades/patricia_zabala.jpg" alt="" width="90" border="0" /></A></div></td>

													</tr>
													<tr>
														<td class="mod_chico_programa" style="text-align:center;" ><A HREF="http://www.facebook.com/CoffeeBreakE" target="_blank" style="text-decoration:none;">Patricia Zavala</A></td>
													</tr>
													</table>
											</div>

											<!--<div style="width:130px;margin-left:5px; padding-bottom:10px; float:left;">
													<table style="margin:0px;">
													<tr>
														<td valign="top" width="130" align="center"> <div style="width:90px; height:54px; overflow:hidden;" class="shadow">
														<A HREF="" target="_blank"><img src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/celebridades/chechu_bonelli.jpg" alt="" width="90" border="0" /></A></div></td>
													</tr>
													<tr>
														<td class="mod_chico_programa" style="text-align:center;" ><A HREF="" target="_blank" style="text-decoration:none;">Chechu Bonelli</A></td>
													</tr>
													</table>
											</div>-->

									</div>

						</div>

						<ul class="xoxo" style="margin-top:20px,">
								<li>
								<a href="http://www.lamac.org/" style="margin-left:70px;" target="_blank"><IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/banners/boto-final-real.png" WIDTH="138" HEIGHT="84" BORDER="0" ALT=""></a>
								</li>
						</ul>


						
			</div>
			</div>
