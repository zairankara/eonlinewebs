<?
if ( ($cat_alf2==1 || $cat_alf==1) && !(is_home()))
{
	if (is_category( "efashionblogger" )) {?>

		<IMG SRC="<?php bloginfo('template_url')?>/images/comunes/cab_videos_efashion.jpg" WIDTH="300" HEIGHT="45" BORDER="0" ALT="">
		<!-- HOME Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[9]?>" />
		  <param name="playerKey" value="<?=$var_con[10]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="forceHTML" value="true" />

		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

		<!-- End of Brightcove Player -->

	<?}elseif ($cat_alf2==1){?>

		<!-- HOME Start of Brightcove Player -->
		<a href="<?=$var_con[1]?>pagina/videos-2" class="widget_redcarpet"></a>
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[11]?>" />
		  <param name="playerKey" value="<?=$var_con[12]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

		<!-- End of Brightcove Player -->

				
		<!-- Banners GANADORES NOMINADOS  -->
		<br />
		<div style="margin-top:8px; float:left; display:block;" id="bannersganadores">
					<?
					$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

					$sqlstr="SELECT *
					FROM abmGanadores
					WHERE feed=$var_con[0] ORDER by orden ASC";

					$testRows = $mydb->get_results($sqlstr);
					foreach ($testRows as $row) {
						
						$feed =	$row->feed;
						$link	=	$row->link;
						$titulo	=	utf8_decode($row->titulo);
						$titulo2	=	utf8_decode($row->titulo2);
						$imagen_host	=	$row->imagen;

						if($link=="") $link="#";
						if($imagen_host=="1") {
							$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/ryan.jpg) no-repeat;";
						}else{
							$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/guiliana.jpg) no-repeat;";
						}
					
						?>
						<div class="banner_gan" style="<?=$imagen_host?>">
							<a href="<?=$link?>" class="tit1 <?if($row->imagen=="1") echo ("ryan");?>"><?=$titulo?></a>
							<a href="<?=$link?>" class="tit2 <?if($row->imagen=="1") echo ("ryan");?>"><?=$titulo2?></a>
						</div>
						<?

					}
					?>
		</div>
		
		<div style="margin-top:8px;"></div>
	<?}?>


<?php }  elseif ( is_home() ||  is_category( "zonae" ) ||  is_category( "enews" )) {?>
		
		<?php if($_GET["abz"]!="") {?>
			 
			 <style>
			 	ol.vjs-playlist {
			 		padding: 0 !important; 
			 		margin: 0 !important; 
			 		font-size: 13px !important;
			        overflow: auto;
			        max-height: 300px;
			    }

				#modulo_videos_arriba ::-webkit-scrollbar {
				  width: 7px;
				  height: 7px;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-button {
				  width: 0px;
				  height: 0px;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-thumb {
				  background: #ccf4f7;
				  border: 0px none #ffffff;
				  border-radius: 50px;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-thumb:hover {
				  background: #ffffff;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-thumb:active {
				  background: #000000;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-track {
				  background: #666666;
				  border: 0px none #ffffff;
				  border-radius: 50px;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-track:hover {
				  background: #666666;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-track:active {
				  background: #333333;
				}
				#modulo_videos_arriba ::-webkit-scrollbar-corner {
				  background: transparent;
				}
				</style>
				 <div style="display: block; position: relative;"><div style="padding-top: 100%;"><video id="player" data-playlist-id="613485272001" 
				 data-account="96980687001" 
				 data-player="SJ3LpQ77" 
				 data-embed="default" 
				 class="video-js" 
				 controls 
				 style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video>
				 <script async data-device="1" src="//players.brightcove.net/96980687001/SJ3LpQ77_default/index.min.js"></script></div></div><ol class="vjs-playlist"></ol>
			 <?}else{?>
			<!-- HOME -->
			<div style="display:none"></div>
			<object id="myExperience" class="BrightcoveExperience">
			  <param name="bgcolor" value="#FFFFFF" />
			  <param name="width" value="300" />
			  <param name="height" value="370" />
			  <param name="playerID" value="<?=$var_con[13]?>" />
			  <param name="playerKey" value="<?=$var_con[14]?>" />
			  <param name="isVid" value="true" />
			  <param name="isUI" value="true" />
			  <param name="dynamicStreaming" value="true" />
			  <param name="wmode" value="transparent" />
			  <param name="forceHTML" value="true" />
			  <!-- smart player api params -->
			  <param name="includeAPI" value="true">
			  <param name="templateLoadHandler" value="myTemplateLoaded">
			  <param name="templateReadyHandler" value="onTemplateReady">
			</object>
			<script type="text/javascript">brightcove.createExperiences();</script>
		<?}?>
		

<? }elseif (is_category("the-royals")){?>
		<!-- Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[23]?>" />
		  <param name="playerKey" value="<?=$var_con[24]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>
		<!-- End of Brightcove Player -->
		
<? }elseif (is_category("musica")){?>
		<!-- HOME Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[21]?>" />
		  <param name="playerKey" value="<?=$var_con[22]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>
		<!-- End of Brightcove Player -->
		
<?php }  elseif (in_category( "estrenos" ) ||  is_category( "estrenos" )) {?>
		
		<div style="display:none"></div>
		
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[15]?>" />
		  <param name="playerKey" value="<?=$var_con[16]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
 		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

<?php }  elseif ((in_category( "cine_by_john_paul" ) ||  is_category( "cine_by_john_paul" )) && !(is_home())) {?>

		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[17]?>" />
		  <param name="playerKey" value="<?=$var_con[18]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

<?php }  elseif ((in_category( "thetrend" ) ||  is_category( "thetrend" )) && !(is_home())) {?>

		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[19]?>" />
		  <param name="playerKey" value="<?=$var_con[20]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

<?php }  else {?>
		
		<!-- Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?=$var_con[13]?>" />
		  <param name="playerKey" value="<?=$var_con[14]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="transparent" />
		  <param name="forceHTML" value="true" />
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>


<?}?>
