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

<script>
//define var omniture
var objectGlobalVideos = {};

function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
  vars[key] = value;
  });
  return vars;
}

function cargar(desde,titulo,img)
{
  $("#destino").load("/varios/videos/index.php?id="+desde);
  $.ajaxSetup(function(){
    async:true;
  })

  $("#datosVideo").html(titulo);
  $("#datosVideo").attr("data-name",titulo);
  $("#datosVideo").attr("data-id",desde);
  $("#datosVideo").attr("data-img", img);
  var stateObj = { foo: "bar" };
  window.history.replaceState(stateObj, titulo, "/videos/?id="+desde);

  $(window).scrollTop($('#container').offset().top);
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
  //addScriptTag("topVideos", "http://api.brightcove.com/services/library?command=find_all_videos&page_size=10&media_delivery=http&sort_by=PUBLISH_DATE&sort_order=DESC&page_number=1&get_item_count=true&token=<?php echo TOKEN; ?>", "response");
  addScriptTag("topVideos", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_TR?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response");
}
function getTopVideos_MV() {
  addScriptTag("topVideos_MV", "http://api.brightcove.com/services/library?command=find_all_videos&page_size=10&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&sort_by=PLAYS_TRAILING_WEEK&sort_order=DESC&page_number=1&get_item_count=true&token=<?php echo TOKEN; ?>", "response_MV");
}
function getTopVideos_RC() {
  addScriptTag("topVideos_RC", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_RC?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_RC");
}
/*function getTopVideos_CB() {
  addScriptTag("topVideos_CB", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_CB?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_CB");
}*/
function getTopVideos_TK() {
  addScriptTag("topVideos_TK", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_TK?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_TK");
}
function getTopVideos_EN() {
  addScriptTag("topVideos_EN", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_EN?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_EN");
}
function getTopVideos_HM() {
  addScriptTag("topVideos_HM", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_HM?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_HM");
}
/*function getTopVideos_SN() {
  addScriptTag("topVideos_SN", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_SN?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_SN");
}*/
function getTopVideos_SW() {
  addScriptTag("topVideos_SW", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_SW?>&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&media_delivery=http&token=<?php echo TOKEN; ?>", "response_SW");
}
function findVideo(idVIDEO) {
  addScriptTag("topFind", "http://api.brightcove.com/services/library?command=find_video_by_id&video_id="+idVIDEO+"&video_fields=id%2Cname%2CshortDescription%2CvideoStillURL%2CcustomFields&media_delivery=default&token=<?php echo TOKEN; ?>", "response_find");
}
function setObjectOmniture(titleSTR, titleID){
  objectGlobalVideos.title = titleSTR;
  objectGlobalVideos.id = titleID;
  if(location.pathname.indexOf("videos")!=-1) {
      //console.log(location.hostname+location.pathname+titleSTR);
      objectGlobalVideos.pageName = location.hostname+location.pathname+titleSTR;
  }else{
      objectGlobalVideos.pageName = location.hostname+location.pathname+"videos/"+titleSTR;
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

        //chequeo su tiene datos los custom fields
    if(title.customFields !== null){
      titleSTR=title.customFields.titlebrasil;
      //console.log(title.name+"-------"+titleSTR);
      //if (info=="resp_HM") console.log("++" + title.name +"---"+ (title["customFields"] === null));
    }

    var VAR_gaq = "_gaq.push(['_trackPageview' ,'/<?=$name_feed?>/videos/"+ titleSTR +"']);";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    var VAR_Data = "cargar('"+title.id+"', '"+titleSTR+"', '"+title.videoStillURL+"');";
    if(title.videoStillURL != null){
      str+='<a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration"></div></div><div class="feed-caption"><h3>'+titleSTR + '</h3></div></div></a>';
      resp.innerHTML+=str;
    }
  }
}

function traer_data_2(info, jsonData2){
  // display the results
  var resp_RC = document.getElementById(info);
  resp_RC.innerHTML="";
  if(jsonData2["videos"].length<31){cantVideos=jsonData2["videos"].length+1;}else{cantVideos=30}

  for (var i=0; i<cantVideos; i++) {
    var title = jsonData2["videos"][i];
    var duration = seconds2time(title.videoFullLength.videoDuration/1000);
    var str_RC = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    var first = getUrlVars()["id"];
    
    //chequeo su tiene datos los custom fields
    if(title.customFields !== null){
      titleSTR=title.customFields.titlebrasil;
      //console.log(title.name+"-------"+titleSTR);
      //if (info=="resp_HM") console.log("++" + title.name +"---"+ (title["customFields"] === null));
    }

    if(!first){
      if (i==0 && info=="resp_HM") cargar(title.id, titleSTR, '"'+title.videoStillURL+'"');

    }else{
      
      if (i==0 && info=="resp_HM") {
         //console.log("first: "+first);
         findVideo(first);
         //titleSTR=$("#datosVideo").attr("data-name");
         cargar(first, titleSTR, '"'+title.videoStillURL+'"');
       }
    }
    var VAR_gaq = "_gaq.push(['_trackPageview' ,'/<?=$name_feed?>/videos/"+ titleSTR +"']);";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    var VAR_Data = "cargar('"+title.id+"', '"+titleSTR+"', '"+title.videoStillURL+"');";
    if(title.videoStillURL != null){
      str_RC+= '<li><a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration">'+duration+'</div></div><div class="feed-caption"><h3>'+titleSTR + '</h3></div></div></a></li>';
      resp_RC.innerHTML+=str_RC;
    }
  }
}
        
function traer_data_3(info, jsonData2){
  // display the results
  var resp_RC = document.getElementById(info);
  resp_RC.innerHTML="";
  if(jsonData2["videos"].length<21){cantVideos=jsonData2["videos"].length+1;}else{cantVideos=20}

  for (var i=0; i<cantVideos; i++) {
    var title = jsonData2["videos"][i];
    var str_RC = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    if (i==0 && info=="resp_HM") cargar(title.id);

        //chequeo su tiene datos los custom fields
    if(title.customFields !== null){
      titleSTR=title.customFields.titlebrasil;
      //console.log(title.name+"-------"+titleSTR);
      //if (info=="resp_HM") console.log("++" + title.name +"---"+ (title["customFields"] === null));
    }

    var VAR_gaq = "_gaq.push(['_trackPageview' ,'/<?=$name_feed?>/videos/"+ titleSTR +"']);";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    var VAR_Data = "cargar('"+title.id+"', '"+titleSTR+"', '"+title.videoStillURL+"');";
    if(title.videoStillURL != null){
      str_RC+= '<li><a href="javascript:void(0);" onclick="'+VAR_DTM+VAR_Data+ VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"></div><div class="feed-caption"><h3>'+titleSTR + '</h3></div></div></a></li>';
      resp_RC.innerHTML+=str_RC;
    }
  }
}

function response_find(jsonDataFind) {

  var q = document.getElementById("findVideo");
  var s = document.getElementById("topFind");

  //var title = jsonDataFind["videos"][0];
  //var titleSTR = title.name; 
  //titleSTR = titleSTR.replace(/["']/g, "");

  //traer_data_2("resp", jsonData);
  
  //console.log("jsonDataFind: "+JSON.stringify(jsonDataFind));
  //console.log("--17.12---"+jsonDataFind.customFields.titlebrasil);
  var titleSTR=jsonDataFind.name;
  titleSTR = titleSTR.replace(/["']/g, "");

  var newSTR = jsonDataFind.customFields.titlebrasil;

  //if(jsonDataFind.customFields !== null){
  if(newSTR.length>0){
    titleSTR=newSTR;
    console.log(newSTR.length+"-1740------------------");
    //if (info=="resp_HM") console.log("++" + title.name +"---"+ (title["customFields"] === null));
  }
    
  $("#datosVideo").attr("data-name",titleSTR);
  $("#datosVideo").attr("data-id",jsonDataFind.id);
  $("#datosVideo").attr("data-img",jsonDataFind.videoStillURL);
  $("#datosVideo").html(titleSTR);

  var url_share="http://br.eonline.com/videos/?id="+jsonDataFind.name;

  $('meta[property="og:url"]').attr('content', url_share); 
  $('meta[property="og:title"]').attr('content', titleSTR); 
  $('meta[property="og:image"]').attr('content', jsonDataFind.videoStillURL); 
  $('meta[itemprop="name"]').attr('content', titleSTR); 
  $('meta[itemprop="image"]').attr('content', jsonDataFind.videoStillURL);

  //console.log(title.name+"-------"+titleSTR);


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
/*
function response_CB(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_CB");
  var s = document.getElementById("topVideos_CB");

   traer_data_2("resp_CB", jsonData);

  $('#videoCB').tinycarousel();

}*/

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

/*function response_SN(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_SN");
  var s = document.getElementById("topVideos_SN");

     traer_data_2("resp_SN", jsonData);

  $('#videoSN').tinycarousel();

}*/

function response_SW(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_SW");
  var s = document.getElementById("topVideos_SW");

  traer_data_3("resp_SW", jsonData);

  $('#videoSW').delay(1500).tinycarousel();
  //console.log("ACA LLEGA");

}

//inicializo los plailist  
getTopVideos();
getTopVideos_RC();
//getTopVideos_CB();
getTopVideos_EN();
getTopVideos_MV();
getTopVideos_TK();
getTopVideos_EN();
getTopVideos_HM();
//getTopVideos_SN();
getTopVideos_SW();

</script>


    <div id="container" class="one-column">
      <div id="content" role="main">
        <div class="cont_one-clumn">
          <h2 style="color:<?php echo cat_color('videos');?>; margin-bottom:20px;">VIDEOS</h2>
      

                 <div id="carrousel_MV" class="tira_chica">
                      <div class="super-snipe_green franja"><h2>MAIS VISTOS</h2></div>
                      <div class="video-landing-main-content" id="videoVISTOS" style="position:relative;">
                          <p id="qDiv_MV"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_MV"><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:0 auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#"><img src="/varios/assets/btn-up.png"/></a>
                          <a class="buttons prev" href="#"><img src="/varios/assets/btn-down.png"></a>
                      </div>
                  </div>

                   <div id="playerPrincipal" style="width:570px;float:left;margin-bottom:10px;">
                  
                         <!--datosVideo -->
                        <div class="super-snipe_green franja"  style="width:570px; margin-top:0px;"><h2 id="datosVideo" data-name="" data-id="" data-img="" style="margin-top:0px;"></h2></div>
                         <!-- /datosVideo -->

                        <div id="destino" style="width:570px;height:410px;float:left;overflow:hidden;"></div>
                        
                        <div style="width:570px;height:260px;float:left;overflow:hidden;background:#272727;">
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
                      <div class="super-snipe_green franja" data-RC="<?=$playlist_TR;?>"><h2>THE ROYALS</h2></div>
                      <div class="video-landing-main-content" id="videoUltimos" style="position:relative;">
                          <p id="qDiv"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#"><img src="/varios/assets/btn-up.png"/></a>
                          <a class="buttons prev" href="#"><img src="/varios/assets/btn-down.png"></a>

                      </div>
                  </div>


                 <div class="super-snipe_red franja"><h2>TAPETE VERMELHO</h2></div>
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


                 <!--<div class="super-snipe_marron franja"><h2>COFFEE BREAK</h2></div>
                 <div id="carrousel_CB" class="fondoFranja" data-CB="<?=$playlist_CB;?>">
                      <div class="video-landing-main-content" id="videoCB" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_CB"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_CB" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>-->

                 <div class="super-snipe_orange franja"><h2>#KARDASHIANS</h2></div>
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

                  <div class="super-snipe_orange franja"><h2>E! SHOWS</h2></div>
                 <div id="carrousel_SW" class="fondoFranja" data-SW="<?=$playlist_SW;?>">
                      <div class="video-landing-main-content" id="videoSW" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_SW"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_SW" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>

                  <!--<div class="super-snipe_rosa franja"><h2>UM SHOW DE NOIVA</h2></div>
                 <div id="carrousel_SN" class="fondoFranja" data-SN="<?=$playlist_SN;?>">
                      <div class="video-landing-main-content" id="videoSN" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_SN"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_SN" ><img src="/varios/assets/ajax-loading_ch2.gif" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div>-->

        </div>
      </div><!-- #content -->
    </div><!-- #container -->

<?php get_footer(); ?>
