<!-- Start of Brightcove Player -->
<div style="display:none"></div>
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
<object id="myExperience<?=$_GET['id']?>" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="550" />
  <param name="height" value="400" />
  <param name="playerID" value="773795205001" />
  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  <param name="autoStart" value="true" />
  <param name="@videoPlayer" value="<?=$_GET['id']?>" />
</object>
<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player -->