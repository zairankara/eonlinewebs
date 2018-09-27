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
							<div class="vacio"></div>
							<!-- ADSERVER 300X250 ARRIBA-->
							<? echo quien_es("300","100","1");?>
							<!-- / ADSERVER-->
							</li>
						</ul>

						<!-- BRIGHTCOVE -->
						<div id="modulo_videos_arriba">
								<?php include(TEMPLATEPATH ."/videos.php"); ?>		
						</div>
						<!-- /-->

						<ul class="sidebar_300">
							<li>
								 <div class="widget_twitter"></div>
								 <div class="widget_twitter_api">
									 <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/twitter2013.php'); ?>
								 </div>
							</li>
						</ul>

						

		<div class="vacio"></div>
		</div>

	</div>
