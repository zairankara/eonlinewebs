<?php
include(TEMPLATEPATH."/var_constantes.php");
?>

	<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">

						<!-- ADDTHIS -->
						<?php include(TEMPLATEPATH ."/wakeup/addthis.php"); ?>	
						<!-- /-->
						<!-- <img src="<?=$var_con[100]?>/wakeup/banner_horario.jpg" alt="Banner horario" title="Banner horario"/> -->
						<!-- BANNER  -->
						<ul class="sidebar_300">
							<li>
							<!-- ADSERVER 300X250 ARRIBA-->
							<? echo quien_es("300","250","1");?>
							<!-- / ADSERVER-->
							</li>
						</ul>


						<!-- BRIGHTCOVE -->
						<?php include(TEMPLATEPATH ."/wakeup/videos.php"); ?>	
						<!-- /-->

						<!-- FOTO DIA -->
						<?php include(TEMPLATEPATH ."/wakeup/foto_dia.php"); ?>
						

						<!-- TWITTER -->
						<?php include (TEMPLATEPATH . '/wakeup/twitter.php'); ?>

						<!-- fanbox -->
						<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fcocacola&amp;width=300&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=311432422287962" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:290px;" allowTransparency="true"></iframe>
						

		<div class="vacio"></div>
		</div>

	</div>
