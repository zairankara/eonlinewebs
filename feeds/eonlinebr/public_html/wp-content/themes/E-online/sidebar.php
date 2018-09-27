<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
if ( in_category( "tapetevermelho" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" )  ||  in_category( "efashionblogger" )   ||  in_category( "latinbillboard" ) ) $cat_alf=1;
if ( is_category( "tapetevermelho" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" )  ||  is_category( "efashionblogger" )  ||  is_category( "latinbillboard" )) $cat_alf2=1;
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">
						<!-- BRIGHTCOVE -->
						 <ul class="xoxo" >
								<?php include("wp-content/themes/E-online/videos.php"); ?>		
						</ul>
						
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
						 <!--<ul class="xoxo" >
								<li>
								<a href="<?php echo home_url( '/' ); ?>category/kim_wedding"><IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/banners/ingreso.gif" WIDTH="300" HEIGHT="102" BORDER="0" ALT=""></a>
								</li>
						</ul>

						<?php if($cat_alf2!=1 || $cat_alf!=1):?> -->

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

						<?php
							if ( is_category( "efashionblogger") ){?><!--  SI ES CATEGORIA FASHIONBLOGGER -->
										
										<!--/* BANNER FLASHION BLOGGER */-->

										<script type='text/javascript'><!--//<![CDATA[
										   var m3_u = (location.protocol=='https:'?'https://adsrv01.eonlinelatinola.com/www/delivery/ajs.php':'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php');
										   var m3_r = Math.floor(Math.random()*99999999999);
										   if (!document.MAX_used) document.MAX_used = ',';
										   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
										   document.write ("?zoneid=48");
										   document.write ('&amp;cb=' + m3_r);
										   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
										   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
										   document.write ("&amp;loc=" + escape(window.location));
										   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
										   if (document.context) document.write ("&context=" + escape(document.context));
										   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
										   document.write ("'><\/scr"+"ipt>");
										//]]>--></script><noscript><a href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=af3cd795&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=48&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=af3cd795' border='0' alt='' /></a></noscript>

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
											}).render().setUser('EFashionBlogBr').start();
											</script>

								<!-- SIDEBAR 2 -->
								<?php
								if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

										<ul class="xoxo">
											<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/comunes/fashion_fotos.gif" WIDTH="300" HEIGHT="50" BORDER="0" ALT="">
											<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
										</ul>

							<?php endif; ?>
							
							<?}else{?>
							
									<?php 	$color_fondo="344a61";?>
									<?php 	$archivo_widget="widget2";?>
									<?php
									if ( ($cat_alf2==1 || $cat_alf==1) && !(is_home()))
									{$color_fondo="6d5928";$archivo_widget="widget2";$ad="_alfombra";}?>
										<div class="xoxo">
										<IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/twitter/header<?=$ad?>.gif" WIDTH="300" HEIGHT="53" BORDER="0" ALT="">
											<script src="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/widget.js"></script>
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
											}).render().setList('CelebEonlineB', 'test').start();
											</script>
										</div>
								<?}?>
								<!-- #primary .widget-area -->

						<div class="xoxo" style="margin:10px 0;">
							<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FEonlinebrasil&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;height=350" scrolling="no" frameborder="0" style="border:none; background: #fff; overflow:hidden; width:300px; height:350px;" allowTransparency="true"></iframe>
						</div>


							
 						<div class="widget_redes"></div>
						  <div style="width: 150px; background-color:white;padding-top: 35px;padding-bottom: 10px; text-align:center;float:left; height:50px;">
										<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2FEonlinebrasil&layout=button_count&show_faces=true&width=120&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" height="30" style="border:none;overflow:hidden;width:120px;height:30px;text-align:center;"></iframe>

						</div>
						<div style="width: 150px; background-color:white;padding-top: 35px;padding-bottom: 10px; text-align:center;float:left;height:50px;">
						<a href="http://twitter.com/share" class="twitter-share-button" data-text="site recomendado" data-count="horizontal" data-via="Eonlinebrasil" data-lang="br">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div>

						<ul class="xoxo" style="margin-top:20px,">
								<li>
								<a href="http://www.lamac.org/" style="margin-left:70px;" target="_blank"><IMG SRC="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/images/banners/boto-final-real.png" WIDTH="138" HEIGHT="84" BORDER="0" ALT=""></a>
								</li>
						</ul>
</div>
</div>
