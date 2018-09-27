<?php
include(TEMPLATEPATH."/var_constantes.php");
?>

	<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">

						<!-- BANNER  -->
						<ul class="sidebar_300">
							<li>
							<!-- BATANGA O DFP 300X250 ARRIBA -->
								<? 
						        $data=que_batanga_es("300x250");
						        if($data==""){echo quien_es("300","250","1");}else{echo $data;}
						        ?>
						        <!-- / BATANGA O DFP 300X250 ARRIBA -->
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
