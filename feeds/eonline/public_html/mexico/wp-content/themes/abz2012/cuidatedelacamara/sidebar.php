<?php
include(TEMPLATEPATH."/var_constantes.php");
?>

	<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">


						<!-- BANNER  -->
						<ul class="sidebar_300">
						<li>
							<!-- ADSERVER 300X250 ARRIBA-->
							<? echo quien_es("300","250","1");?>
							<!-- / ADSERVER-->
						</li>
						</ul>
						
						<ul class="sidebar_300 widgetInstagram" style="display:block;margin-bottom:8px;">
						<li>
							<img src="<?php bloginfo('template_url')?>/cuidatedelacamara/cab_instagram.jpg" alt="Cabezal"/>
							<iframe src="http://www.intagme.com/in/?h=Y3VpZGF0ZWRlbGFjYW1hcmF8c2x8MzAwfDJ8M3x8eWVzfDV8dW5kZWZpbmVkfHllcw==" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:315px; height: 315px" ></iframe>
						</li>
						</ul>				

						<?php include (TEMPLATEPATH . '/cuidatedelacamara/foto.php'); ?>

						<!-- TWITTER -->
						<?php include (TEMPLATEPATH . '/cuidatedelacamara/twitter.php'); ?>

						<?php get_poll(133); ?>
						

		<div class="vacio"></div>
		</div>

	</div>
