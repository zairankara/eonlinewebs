<?php
if($_GET["page"]=="videos"){
  $autoplay="autoplay";
  $adicionales="playsinline muted";
}else{
  $autoplay="";
  $adicionales="";
}
?>
<div style="display: block; position: relative; max-width: 100%;"><div style="padding-top: 56.25%;"><video data-video-id="<?php echo $_GET['id'] ?>" 
data-account="96980687001" 
data-player="553b59c3-4773-4446-8ce1-9a4199b98a2f" 
data-embed="default" 
class="video-js" 
controls
<?php echo $adicionales; ?> 
<?php echo $autoplay; ?> 
style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></video>
<script src="//players.brightcove.net/96980687001/553b59c3-4773-4446-8ce1-9a4199b98a2f_default/index.min.js"></script></div></div>


  <!-- End of Brightcove Player -->
<?php
$url="http://".$_SERVER["SERVER_NAME"]."/".$_GET["name_feed"]."/pagina/videos-2/?id=".$_GET["id"];
?>


  <!-- REDES SOCIALES POR POST-->
  <div class="social-icons-small" data-url="<?php echo $url; ?>&utm_campaign=VisitorShare" data-title="<?php echo $_GET["titulo"] ?>">
      <div class="social-icon facebook">
          <a class="social-fb" target="_blank" onclick="share('Facebook','<?php echo $url; ?>&utm_campaign=VisitorShare', '<?php echo $_GET["titulo"] ?>', 'Video', null);" href="javascript:void(0);"></a>
      </div>
      <div class="social-icon twitter">
          <a class="social-tw" onclick="share('Twitter', '<?php echo $_GET["titulo"] ?>&url=<?php echo $url; ?>&utm_campaign%3DVisitorShare', '<?php echo $_GET["titulo"] ?>', 'Video', null)" href="javascript:void(0);" ></a>
      </div>
      <div class="social-icon link">
          <a class="social-link" onclick="prompt('Presione Ctrl + C, luego Enter para copiar la URL al portapapeles','<?=$url?>');return false;" href="#"></a>
      </div>
  </div>
  <!-- / REDES SOCIALES POR POST-->
  