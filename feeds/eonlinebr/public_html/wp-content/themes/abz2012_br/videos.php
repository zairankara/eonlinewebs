<?
if ( ($cat_alf2==1 || $cat_alf==1) && !(is_home()))
{
	if ((in_category( "efashionblogger" ) ||  is_category( "efashionblogger" )) && !(is_home())  && (!is_category("tapetevermelho"))  ) {?>

		<h3><a href="<?php echo esc_url( home_url() )?>/videos" class="widget-title" style="color:#4E5756">VIDEOS <span style="color:#d677d3;">E! <!-- FASHION BLOGGER --></span></a></h3>							

		<!-- HOME Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[9]?>" />
		  <param name="playerKey" value="<?php echo $var_con[10]?>" />
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

	<?}else{?>

		<?if (!is_category("copa-do-mundo")){?>
		<!-- HOME Start of Brightcove Player -->
		<a href="<?php echo $var_con[1]?>videos" class="widget_redcarpet"></a>
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[11]?>" />
		  <param name="playerKey" value="<?php echo $var_con[12]?>" />
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
		<?}?>

				
		<!-- Banners GANADORES NOMINADOS  -->
		<?if (!is_category("imperdivel") && !is_category("copa-do-mundo")){?>
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
						$titulo2 =	utf8_decode($row->titulo2);
						$imagen_host	=	$row->imagen;

						if($link=="") $link="#";
						if($imagen_host=="1") {
							$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/ryan.jpg) no-repeat;";
						}else{
							$imagen_host="background: url(http://la.eonline.com/admin2012/nom_gan/imgs/guiliana.jpg) no-repeat;";
						}
					
						?>
						<div class="banner_gan" style="<?php echo $imagen_host?>">
							<a href="<?php echo $link?>" class="tit1 <?if($row->imagen=="1") echo ("ryan");?>"><?php echo $titulo?></a>
							<a href="<?php echo $link?>" class="tit2 <?if($row->imagen=="1") echo ("ryan");?>"><?php echo $titulo2?></a>
						</div>
						<?

					}
					?>
		</div>
		
		
		<div style="margin-top:8px;"></div>
		<?}?>
	<?}?>


<? }elseif (is_category("the-royals")){?>
		<!-- Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[233]?>" />
		  <param name="playerKey" value="<?php echo $var_con[244]?>" />
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
		  <param name="playerID" value="<?php echo $var_con[23]?>" />
		  <param name="playerKey" value="<?php echo $var_con[24]?>" />
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

<? }elseif (is_category("noivas")){?>
		<!-- HOME Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[21]?>" />
		  <param name="playerKey" value="<?php echo $var_con[22]?>" />
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

<?php }  elseif ( is_home() ||  is_category( "zonae" ) ||  is_category( "enews" )) {?>
		<!-- HOME -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[13]?>" />
		  <param name="playerKey" value="<?php echo $var_con[14]?>" />
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
		

<?php }  elseif (in_category( "estrenos" ) ||  is_category( "estrenos" )) {?>
		
		<div style="display:none"></div>
		
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="370" />
		  <param name="playerID" value="<?php echo $var_con[15]?>" />
		  <param name="playerKey" value="<?php echo $var_con[16]?>" />
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
		  <param name="playerID" value="<?php echo $var_con[17]?>" />
		  <param name="playerKey" value="<?php echo $var_con[18]?>" />
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
		  <param name="playerID" value="<?php echo $var_con[19]?>" />
		  <param name="playerKey" value="<?php echo $var_con[20]?>" />
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
		  <param name="playerID" value="<?php echo $var_con[13]?>" />
		  <param name="playerKey" value="<?php echo $var_con[14]?>" />
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
