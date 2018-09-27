  <!-- Start of Brightcove Player 1611-->
  <div style="display:none"></div>
  <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
  <object id="myExperience<?php echo $_GET['id']?>" class="BrightcoveExperience" autoStart="true">
    <param name="bgcolor" value="#FFFFFF" />
    <param name="width" value="570" />
    <param name="height" value="370" />
    <param name="playerID" value="773795205001" />
    <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" />
    <param name="isVid" value="true" />
    <param name="isUI" value="true" />
    <param name="dynamicStreaming" value="true" />
    <param name="autoStart" value="true" />
    <param name="autoPlay" value="true" />
    <param name="forceHTML" value="true" />
    <param name="language" value="es" />
    <param name="@videoPlayer" value="<?php echo $_GET['id'] ?>" />
        <param name="includeAPI" value="true">
        <param name="templateLoadHandler" value="myTemplateLoaded">
        <param name="templateReadyHandler" value="onTemplateReady">
  </object>
  <script type="text/javascript">brightcove.createExperiences();</script>

  <!-- End of Brightcove Player -->
<?php
$url="http://".$_SERVER["SERVER_NAME"]."/".$_GET["name_feed"]."/pagina/videos-2/?id=".$_GET["id"];
?>

<style type="text/css">
 #destino iframe{
   margin: 0 auto;
    width: 570px;
    display: inherit;
 }
.social-videos{max-width: 570px; width: 100%;height:40px;margin: 0 auto;}
.social-videos .facebook{
  float: left;
  width: 260px;
  height: 40px;
}
.social-videos .social-fb{
  background: url("http://la.eonline.com/varios/videos/button_fb1.jpg") no-repeat !important;
}
.social-videos .twitter{
  float: left;
  width: 260px;
  height: 40px;
}
.social-videos a{
  width: 285px !important;
  height: 40px !important;
  display: block;
}
.social-videos .social-tw{
  background: url("http://la.eonline.com/varios/videos/button_tw1.jpg") no-repeat !important;
}
.social-videos .link{
  float: left;
  width: 50px;
  height: 40px;
}
.social-videos .social-link{
  background: url("http://la.eonline.com/varios/videos/button_link1.jpg") no-repeat !important;
  width: 50px !important;
}

</style>
<div class="social-videos">
            <div class="social-icon facebook">
              <a class="social-fb" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=<?=$url?>"></a>
            </div>
            <div class="social-icon twitter">
              <a class="social-tw" href="https://twitter.com/share?text=<?=$descShare?>&url=<?=$url?>" target="_blank"></a>
            </div>
             <div class="social-icon link">
               <a class="social-link" onclick="prompt('Presione Ctrl + C, luego Enter para copiar la URL al portapapeles','<?=$url?>');return false;" href="#"></a>
             </div>
</div>