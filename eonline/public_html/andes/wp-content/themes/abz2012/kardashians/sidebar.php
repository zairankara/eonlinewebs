<?php
include(TEMPLATEPATH."/var_constantes.php");
?>

	<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">

						<!-- BANNER  -->
						<ul class="sidebar_300" style="height:250px;">
							<li>
							<!-- ADSERVER 300X250 ARRIBA-->
							<? echo quien_es("300","250","1");?>
							<!-- / ADSERVER-->
							</li>
						</ul>


						<!-- BRIGHTCOVE -->
						<?php include(TEMPLATEPATH ."/kardashians/videos.php"); ?>	
						<!-- /-->

						<!-- FOTO DIA KARDASHIANS -->
						<?php include(TEMPLATEPATH ."/kardashians/foto_kardashians.php"); ?>
						

						<!-- TWITTER KARDASHIANS -->
						<?php include (TEMPLATEPATH . '/kardashians/twitter.php'); ?>
						

		<div class="vacio"></div>
		</div>

	</div>
