<li>
<?
if ( ($cat_alf2==1 || $cat_alf==1) && !(is_home()))
{
	if ((in_category( "efashionblogger" ) ||  is_category( "efashionblogger" )) && !(is_home())) {?>

		<IMG SRC="<?php bloginfo('template_url')?>/images/comunes/cab_videos_efashion.jpg" WIDTH="300" HEIGHT="45" BORDER="0" ALT="">
		<!-- HOME Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[9]?>" />
		  <param name="playerKey" value="<?=$var_con[10]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />

		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

		<!-- End of Brightcove Player -->

	<?}else{?>

		<!-- HOME Start of Brightcove Player -->
		<div class="widget_redcarpet"></div>
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[11]?>" />
		  <param name="playerKey" value="<?=$var_con[12]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />

		  
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

		<!-- End of Brightcove Player -->

				
		<!-- Banners GANADORES NOMINADOS  -->
		<br />
		<div style="margin-top:8px; float:left; display:block;">
					<?
					$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
					
					$sqlstr="SELECT *
					FROM abmGanadores
					WHERE feed=$var_con[0] ORDER by id DESC";

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
		<!-- HOME -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[13]?>" />
		  <param name="playerKey" value="<?=$var_con[14]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="transparent" />
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>
		

<?php }  elseif (in_category( "estrenos" ) ||  is_category( "estrenos" )) {?>
		
		<div style="display:none"></div>
		
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[15]?>" />
		  <param name="playerKey" value="<?=$var_con[16]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
 		  <param name="wmode" value="opaque" />
		  <param name="dynamicStreaming" value="true" />
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

<?php }  elseif ((in_category( "cine_by_john_paul" ) ||  is_category( "cine_by_john_paul" )) && !(is_home())) {?>

		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[17]?>" />
		  <param name="playerKey" value="<?=$var_con[18]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="opaque" />

		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>

<?php }  else {?>
		
		<!-- Start of Brightcove Player -->
		<div style="display:none"></div>
		<object id="myExperience" class="BrightcoveExperience">
		  <param name="bgcolor" value="#FFFFFF" />
		  <param name="width" value="300" />
		  <param name="height" value="340" />
		  <param name="playerID" value="<?=$var_con[13]?>" />
		  <param name="playerKey" value="<?=$var_con[14]?>" />
		  <param name="isVid" value="true" />
		  <param name="isUI" value="true" />
		  <param name="dynamicStreaming" value="true" />
		  <param name="wmode" value="transparent" />

		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>


<?}?>
</li>