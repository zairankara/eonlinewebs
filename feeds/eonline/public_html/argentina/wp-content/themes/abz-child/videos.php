<?
if ( (es_Redcarpet() ||is_category( "efashionblogger" )) && !(is_home()))
{
	if (is_category( "efashionblogger" )) {?>

		<div style="display: block; position: relative;"><div style="padding-top: 100%;"><video id="player" data-playlist-id="<?php echo playlist_EFB; ?>"
																							data-account="96980687001"
																							data-player="<?php echo player_EFB; ?>"
																							data-embed="default"
																							class="video-js"
																							controls
																							style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video>
			<script src="//players.brightcove.net/96980687001/<?php echo player_EFB; ?>_default/index.min.js"></script></div></div><ol class="vjs-playlist"></ol>

	<?}elseif (es_Redcarpet()){?>

		<div style="display: block; position: relative;"><div style="padding-top: 100%;"><video id="player" data-playlist-id="<?php echo playlist_RC; ?>"  data-account="96980687001"  data-player="<?php echo player_RC; ?>" data-embed="default" class="video-js" controls style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video><script src="//players.brightcove.net/96980687001/<?php echo player_RC; ?>_default/index.min.js"></script></div></div><ol class="vjs-playlist"></ol>

				
		<!-- Banners GANADORES NOMINADOS  -->
		<div style="margin:10px auto; width: 100%; display:block;" id="bannersganadores">
			<?php include(STYLESHEETPATH."/pages/nominados_ganadores.php");?>
		</div>
	<?}?>


<?php }  elseif ( is_home() ||  is_category( "zonae" ) ||  is_category( "enews" )) {?>
		<!-- HOME -->

	<div style="display: block; position: relative;"><div style="padding-top: 100%;"><video id="player" data-playlist-id="<?php echo playlist_HM; ?>"
																							data-account="96980687001"
																							data-player="SJ3LpQ77"
																							data-embed="default"
																							class="video-js"
																							controls
																							style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video>
			<script src="//players.brightcove.net/96980687001/SJ3LpQ77_default/index.min.js"></script></div></div><ol class="vjs-playlist"></ol>

	<!--<script type="text/javascript">
        var objectGlobalVideos = {};
		videojs('player').ready(function(){
			var myPlayer = this,
                videoName,
                flag=0;

            myPlayer.on('loadstart',function(){
                videoName = myPlayer.mediainfo['name'];
                //console.log('This loadstart name: ', videoName);
                //console.log('Objeto: ', myPlayer.mediainfo);
                //console.log('This name: ', videoName);

                objectGlobalVideos.title=videoName;
                objectGlobalVideos.id = myPlayer.mediainfo['id'];
                nameseccion=location.pathname;
                if(nameseccion.indexOf("videos-2")!=-1) {feedSection=location.pathname;}else{feedSection=location.pathname+"pagina/videos-2/";}
                objectGlobalVideos.pageName = location.hostname+feedSection+videoName;

            });

            myPlayer.on("timeupdate", function() {

                currentPosition = myPlayer.currentTime();

                if(Math.round(currentPosition)>2 && flag==0){
                    //console.log("beginVideo: "+Math.round(currentPosition));
                    _satellite.track("beginVideo");
                    _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_start', objectGlobalVideos.title]);
                    flag=1;
                }

            });


            myPlayer.on("ended", function () {
                //console.log('This VIDEO end: ', objectGlobalVideos.title);

                _satellite.track("completeVideo");
                _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);
            });
		});
	</script>-->
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
		  
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>
<?php }  elseif (is_single()) {?>

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
		  
		  <!-- smart player api params -->
          <param name="includeAPI" value="true">
          <param name="templateLoadHandler" value="myTemplateLoaded">
          <param name="templateReadyHandler" value="onTemplateReady">
		</object>
		<script type="text/javascript">brightcove.createExperiences();</script>


<?}?>

