<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>

<?php
/**
 * Template Name: VIDEOS
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>


<script src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="/experience/js/jquery.tinycarousel.js"></script>


<?
$token="I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..";
?>


<script>
//define var omniture
var objectGlobalVideos = {};


function cargar(desde)
{
  $("#destino").load("/varios/videos/index.php?id="+desde);
   //window.location = '#myExperience';
   //console.log();
  $(window).scrollTop($('#destino').offset().top);
}

function seconds2time (seconds) {
    var hours   = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds - (hours * 3600)) / 60);
    var seconds =  Math.round(seconds - (hours * 3600) - (minutes * 60));
    var time = "";

    if (hours != 0) {
      time = hours+":";
    }
    if (minutes != 0 || time !== "") {
      minutes = (minutes < 10 && time !== "") ? "0"+minutes : String(minutes);
      time += minutes+"m ";
    }
    if (time === "") {
      time = seconds+"s";
    }
    else {
      time += (seconds < 10) ? "0"+seconds : String(seconds);
    }
    return time;
}

function addScriptTag(id, url, callback) {
  var scriptTag = document.createElement("script");
  var noCacheIE = '&noCacheIE=' + (new Date()).getTime();
   
   // Add script object attributes
   scriptTag.setAttribute("type", "text/javascript");
   scriptTag.setAttribute("charset", "utf-8");
   scriptTag.setAttribute("src", url + "&callback=" + callback + noCacheIE);
   scriptTag.setAttribute("id", id);
  
  var head = document.getElementsByTagName("head").item(0);
  head.appendChild(scriptTag);  
}

function getTopVideos() {
  addScriptTag("topVideos", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_EL?>&media_delivery=http&token=<?=$token?>", "response");
}
function getTopVideos_MV() {
  addScriptTag("topVideos_MV", "http://api.brightcove.com/services/library?command=find_all_videos&page_size=10&media_delivery=http&sort_by=PLAYS_TRAILING_WEEK&sort_order=DESC&page_number=1&get_item_count=true&token=<?=$token?>", "response_MV");
}
function getTopVideos_RC() {
  addScriptTag("topVideos_RC", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_RC?>&media_delivery=http&token=<?=$token?>", "response_RC");
}
function getTopVideos_CB() {
  addScriptTag("topVideos_CB", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_CB?>&media_delivery=http&token=<?=$token?>", "response_CB");
}
function getTopVideos_TK() {
  addScriptTag("topVideos_TK", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_TK?>&media_delivery=http&token=<?=$token?>", "response_TK");
}
function getTopVideos_EN() {
  addScriptTag("topVideos_EN", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_EN?>&media_delivery=http&token=<?=$token?>", "response_EN");
}
function getTopVideos_HM() {
  addScriptTag("topVideos_HM", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_HM?>&media_delivery=http&token=<?=$token?>", "response_HM");
}
function getTopVideos_IB() {
  addScriptTag("topVideos_IB", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_IB?>&media_delivery=http&token=<?=$token?>", "response_IB");
}


function setObjectOmniture(titleSTR, titleID){
  objectGlobalVideos.title = titleSTR;
  objectGlobalVideos.id = titleID;
  if(location.pathname.indexOf("videos-2")!=-1) {
      console.log(location.hostname+location.pathname+titleSTR);
      objectGlobalVideos.pageName = location.hostname+location.pathname+titleSTR;
  }else{
      objectGlobalVideos.pageName = location.hostname+location.pathname+"pagina/videos-2/"+titleSTR;
  }
}

function traer_data(info, jsonData){
    // display the results
  var resp = document.getElementById(info);
  resp.innerHTML="";
  for (var i=0; i<jsonData["items"].length; i++) {
    var title = jsonData["items"][i];
    var str = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    var VAR_gaq = "_gaq.push(['_trackPageview' ,'/<?=$name_feed?>/pagina/videos-2/"+ titleSTR +"']);";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";

    if(title.videoStillURL != null){
      str+='<a href="javascript:void(0);" onclick="'+VAR_DTM+'cargar('+title.id+');'+ VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration"></div></div><div class="feed-caption"><h3>'+title.name + '</h3></div></div></a>';
      resp.innerHTML+=str;
    }
  }
}

function traer_data_2(info, jsonData2){
  // display the results
  var resp_RC = document.getElementById(info);
  resp_RC.innerHTML="";

  for (var i=0; i<jsonData2["videos"].length; i++) {
    var title = jsonData2["videos"][i];
    var duration = seconds2time(title.videoFullLength.videoDuration/1000);
    var str_RC = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    if (i==0 && info=="resp_HM") cargar(title.id);

    var VAR_gaq = "_gaq.push(['_trackPageview' ,'/<?=$name_feed?>/pagina/videos-2/"+ titleSTR +"']);";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    if(title.videoStillURL != null){
      str_RC+= '<li><a href="javascript:void(0);" onclick="'+VAR_DTM+'cargar('+title.id+');'+ VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration">'+duration+'</div></div><div class="feed-caption"><h3>'+title.name + '</h3></div></div></a></li>';
      resp_RC.innerHTML+=str_RC;
    }
  }
}

function response(jsonData) {
  //output the query
  var q = document.getElementById("qDiv");
  var s = document.getElementById("topVideos");

  traer_data_2("resp", jsonData);

   $('#videoUltimos').tinycarousel({
        axis   : "y"
    });
}


function response_MV(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_MV");
  var s = document.getElementById("topVideos_MV");

  traer_data("resp_MV", jsonData);

   $('#videoVISTOS').tinycarousel({
        axis : "y"
    });
}
function response_RC(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_RC");
  var s = document.getElementById("topVideos_RC");
  
  traer_data_2("resp_RC", jsonData);

  $('#videoRC').tinycarousel({
   display: 4 // how many blocks do you want to move at a time?
  });

}

function response_CB(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_CB");
  var s = document.getElementById("topVideos_CB");

   traer_data_2("resp_CB", jsonData);

  $('#videoCB').tinycarousel();

}

function response_TK(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_TK");
  var s = document.getElementById("topVideos_TK");

     traer_data_2("resp_TK", jsonData);

  $('#videoTK').tinycarousel();

}

function response_EN(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_EN");
  var s = document.getElementById("topVideos_EN");

    traer_data_2("resp_EN", jsonData);

  $('#videoEN').tinycarousel();
}


function response_HM(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_HM");
  var s = document.getElementById("topVideos_HM");

     traer_data_2("resp_HM", jsonData);

  $('#videoHM').tinycarousel();

}
function response_IB(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_IB");
  var s = document.getElementById("topVideos_IB");

     traer_data_2("resp_IB", jsonData);

  $('#videoIB').tinycarousel();

}

//inicializo los plailist  
getTopVideos();
getTopVideos_RC();
getTopVideos_CB();
getTopVideos_EN();
getTopVideos_MV();
getTopVideos_TK();
getTopVideos_EN();
getTopVideos_HM();
getTopVideos_IB();
</script>


		<div id="container" class="one-column">
			<div id="content" role="main">
				<div class="cont_one-clumn">
          <h2 style="color:<?php echo cat_color('videos-2');?>; margin-bottom:20px;">VIDEOS</h2>
			

          <?if($_GET["web"]==""){?>
                 <div id="carrousel_MV" class="tira_chica">
                      <div class="super-snipe_green franja"><h2>MAS VISTOS</h2></div>
                      <div class="video-landing-main-content" id="videoVISTOS" style="position:relative;">
                          <p id="qDiv_MV"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_MV"><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:0 auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#"><img src="/varios/assets/btn-up.png"/></a>
                          <a class="buttons prev" href="#"><img src="/varios/assets/btn-down.png"></a>
                      </div>
                  </div>

                   <div style="width:550px;float:left;margin-bottom:10px;">
                  
                        <div id="destino" style="width:550px;height:400px;float:left;overflow:hidden;">
                          <?
                          if($_GET['id']!=""){
                            $Video=$_GET['id'];
                          }else{
                            $Video="3767771299001";
                          }
                          ?>
                        <!-- Start of Brightcove Player -->
                        <div style="display:none"></div>
                        <object id="myExperience" class="BrightcoveExperience">
                          <param name="bgcolor" value="#FFFFFF" />
                          <param name="width" value="550" />
                          <param name="height" value="400" />
                          <param name="playerID" value="773795205001" />
                          <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" />
                          <param name="isVid" value="true" />
                          <param name="isUI" value="true" />
                          <param name="dynamicStreaming" value="true" />
                          <param name="autoStart" value="true" />
                          <param name="@videoPlayer" value="<?=$Video?>" />
                          <!-- smart player api params -->
                          <param name="includeAPI" value="true">
                          <param name="templateLoadHandler" value="Test">
                          <param name="templateLoadHandler" value="myTemplateLoaded">
                          <param name="templateReadyHandler" value="onTemplateReady">
                        </object>
                        <script type="text/javascript">brightcove.createExperiences();</script>

                        <!-- End of Brightcove Player -->
                        </div>
                        <div style="width:550px;height:280px;float:left;overflow:hidden;background:#272727;">
                            <div id="carrousel_HM" class="tira_media" data-HM="<?=$playlist_HM;?>">
                                <div class="video-landing-main-content" id="videoHM" style="position:relative;">
                                    <a class="buttons prev" href="#">&#60;</a>
                                    <p id="qDiv_HM"></p>
                                    <div class="viewport">
                                      <ul class="overview" id="resp_HM" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                                    </div>
                                    <a class="buttons next" href="#">&#62;</a>
                                </div>
                            </div>
                        </div>
                  </div>


                  

                  <div id="carrousel_UL" class="tira_chica">
                      <div class="super-snipe_green franja"><h2>LIVE FROM E!</h2></div>
                      <div class="video-landing-main-content" id="videoUltimos" style="position:relative;">
                          <p id="qDiv"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#"><img src="/varios/assets/btn-up.png"/></a>
                          <a class="buttons prev" href="#"><img src="/varios/assets/btn-down.png"></a>

                      </div>
                  </div>


                 <div class="super-snipe_red franja"><h2>RED CARPET</h2></div>
                 <div id="carrousel_RC" class="fondoFranja" data-RC="<?=$playlist_RC;?>">
                      <div class="video-landing-main-content" id="videoRC" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_RC"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_RC" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>


                 <div class="super-snipe_marron franja"><h2>COFFEE BREAK</h2></div>
                 <div id="carrousel_CB" class="fondoFranja" data-CB="<?=$playlist_CB;?>">
                      <div class="video-landing-main-content" id="videoCB" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_CB"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_CB" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>

                 <div class="super-snipe_orange franja"><h2>ES TAN KARDASHIAN</h2></div>
                 <div id="carrousel_TK" class="fondoFranja" data-TK="<?=$playlist_TK;?>">
                      <div class="video-landing-main-content" id="videoTK" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_TK"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_TK" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>

                 <div class="super-snipe_lightblue franja"><h2>E! NEWS</h2></div>
                 <div id="carrousel_EN" class="fondoFranja" data-EN="<?=$playlist_EN;?>">
                      <div class="video-landing-main-content" id="videoEN" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_EN"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_EN" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>

                  <div class="super-snipe_lila franja"><h2>INSTABITES</h2></div>
                 <div id="carrousel_IB" class="fondoFranja" data-IB="<?=$playlist_IB;?>">
                      <div class="video-landing-main-content" id="videoIB" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_IB"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_IB" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>
          <?}else{?>
                  <!-- Start of Brightcove Player -->
                  <div style="display:none"></div>
                  <object id="myExperience" class="BrightcoveExperience">
                    <param name="bgcolor" value="#FFFFFF" />
                    <param name="width" value="930" />
                    <param name="height" value="654" />
                    <param name="playerID" value="<?=$var_con[7]?>" />
                    <param name="playerKey" value="<?=$var_con[8]?>" />
                    <param name="isVid" value="true" />
                    <param name="isUI" value="true" />
                    <param name="dynamicStreaming" value="true" />
                    <param name="wmode" value="transparent" />
                  </object>
                  <script type="text/javascript">brightcove.createExperiences();</script>
          <?}?>

          <!-- End of Brightcove Player -->
				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
