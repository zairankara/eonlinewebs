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

get_header();

?>

<script src="http://code.jquery.com/jquery.js"></script>
<script src="/common/owl.carousel/owl.carousel.min.js"></script>
<style>
    .owl-controls{margin-top:10px;text-align:center;-webkit-tap-highlight-color:transparent}.owl-controls .owl-nav [class*=owl-]{color:#fff;font-size:14px;margin:5px;padding:4px 20px;background:#464646;display:inline-block;cursor:pointer;-webkit-border-radius:50%;-moz-border-radius:3px;border-radius:3px}.owl-controls .owl-nav [class*=owl-]:hover{background:#869791;color:#fff;text-decoration:none}.owl-controls .owl-nav .disabled{opacity:.5;cursor:default}.owl-dots .owl-dot{display:inline-block;zoom:1;*display:inline}.owl-dots .owl-dot span{width:10px;height:10px;margin:5px 7px;background:#d6d6d6;display:block;-webkit-backface-visibility:visible;-webkit-transition:opacity 200ms ease;-moz-transition:opacity 200ms ease;-ms-transition:opacity 200ms ease;-o-transition:opacity 200ms ease;transition:opacity 200ms ease;-webkit-border-radius:30px;-moz-border-radius:30px;border-radius:30px}.owl-dots .owl-dot.active span,.owl-dots .owl-dot:hover span{background:#869791}
    .owl-nav{ height: 37px; margin-top: 10px}
    .owl-prev{
        float: left;
        cursor: pointer;
        padding: 4px 8px;
        color: #fff;
        border-radius: 3px;}
    .owl-next{
        float: right;
        cursor: pointer;
        padding: 4px 8px;
        color: #fff;
        border-radius: 3px;}
    .cont_one-clumn *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
    #carrousel_HM{width:100%;height:310px}
    #carrousel_HM .owl-nav > div {background: #46b936;}
    #carrousel_MV .owl-nav > div {background: #46b936;}
    #carrousel_UL .owl-nav > div {background: #46b936;}
    #carrousel_RC{width:100%;height:310px;border:1px solid red}
    #carrousel_RC .owl-nav > div {background: red;}
    #carrousel_CB{width:100%;height:310px;border:1px solid #5e150c}
    #carrousel_CB .owl-nav > div {background: red;}
    #carrousel_CC{width:100%;height:310px;border:1px solid #5e150c}
    #carrousel_CC .owl-nav > div {background: #5e150c;}
    #carrousel_TK{width:100%;height:310px;border:1px solid #f99903}
    #carrousel_TK .owl-nav > div {background: #f99903;}
    #carrousel_EN{width:100%;height:310px;border:1px solid #03CDFF}
    #carrousel_EN .owl-nav > div {background: #03CDFF;}
    #carrousel_IB{width:100%;height:310px;border:1px solid #400187}
    #carrousel_IB .owl-nav > div {background: #400187;}
    #carrousel_RY{width:100%;height:310px;border:1px solid #03CDFF}
    #carrousel_RY .owl-nav > div {background: #03CDFF;}

    #videoPrincipal{float:left;width:480px}
    #videoRC{height:310px}
    .video-landing-main-content .feed-duration{font-family:"Oswald","Arial Narrow",Sans-Serif;font-size:16px;line-height:28px;color:#fff;text-align:right;width:68px;height:26px;padding-right:6px;position:absolute;right:0;bottom:0;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjM4JSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);background:-moz-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 38%,rgba(0,0,0,1) 100%);background:-webkit-gradient(linear,left top,right top,color-stop(0%,rgba(0,0,0,0)),color-stop(38%,rgba(0,0,0,1)),color-stop(100%,rgba(0,0,0,1)));background:-webkit-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 38%,rgba(0,0,0,1) 100%);background:-o-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 38%,rgba(0,0,0,1) 100%);background:-ms-linear-gradient(left,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 38%,rgba(0,0,0,1) 100%);background:linear-gradient(to right,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 38%,rgba(0,0,0,1) 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000',endColorstr='#000000',GradientType=1)}
    .video-landing-main-content .feed-image-container{overflow:hidden;height:130px;position:relative;background-color:#000}
    .video-landing-main-content .feed-caption p{    font-family: "Oswald","Arial Narrow",Sans-Serif;
        font-size: 16px;
        margin: 10px;
        font-weight: 200;
        letter-spacing: 0px;
        line-height: 1.32;}

    .video-landing-main-content #resp_RC{height:310px}
    .video-landing-main-content a{width:200px;height:225px;text-decoration:none;cursor:pointer;float:left;margin-right:10px;margin-bottom:10px}
    .video-landing-main-content .feed-image-container img{max-width:200px!important;height:auto;-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-o-transition:all .4s ease;-ms-transition:all .4s ease;transition:all .4s ease}
    .video-landing-main-content a:hover .feed-image-container img{-webkit-filter:grayscale(100%);-webkit-transform:scale(1.15);-moz-transform:scale(1.15);-ms-transform:scale(1.15);-o-transform:scale(1.15);transform:scale(1.15)}
    .videos{width:200px;height:225px;border:solid 1px #e3e3e3;background-color:#fff}
    .super-snipe_green{background-color:#46b936!important}
    .super-snipe_orange{background-color:#f99903!important;clear:both}
    .super-snipe_marron{background-color:#5e150c!important;clear:both}
    .super-snipe_red{background-color:#f93c53!important;clear:both}
    .super-snipe_lightblue{background-color:#03CDFF!important;clear:both}
    .super-snipe_lila{background-color:#400187!important;clear:both}

    .franja{width:100%;margin-top:25px;clear:both}
    .franja h2{color:#fff!important;font-family:"Oswald","Arial Narrow",Sans-Serif;margin-bottom:0;font-size:20px!important;height:45px;letter-spacing:1px;line-height:48px;padding:0 15px;text-rendering:optimizeLegibility;text-transform:uppercase}
    .video-landing-main-content{height:1%;padding:0 0 10px}
    .video-landing-main-content .viewport{float:left;width:100%;height:290px;_height:310px;overflow:hidden;position:relative;padding:10px}
    .video-landing-main-content .buttons{display:block;margin:100px 10px 0 0;float:left;width:35px;height:35px;position:relative;color:#fff;font-weight:700;text-align:center;line-height:35px;text-decoration:none;font-size:22px}
    #videoHM .buttons{background:#999}
    #videoEN .buttons{background:#03CDFF}
    #videoTK .buttons{background:#f99903}
    #videoRC .buttons{background:#f93c53}
    #videoCB .buttons{background:#5e150c}
    #videoCC .buttons{background:#5e150c}
    #videoIB .buttons{background:#400187}
    #videoRY .buttons{background:#03CDFF}
    .video-landing-main-content .next{margin:100px 0 0 10px}
    .video-landing-main-content .buttons:hover{color:#ddd;background:#fff}
    .video-landing-main-content .disable{visibility:hidden}
    .video-landing-main-content .overview{list-style:none;position:relative;padding:0;margin:0;left:0 top: 0;text-align:center;color:#302f69;font-size:13px}
    .video-landing-main-content .overview li{float:left;margin:0 12px 0 0;width:200px;text-align:center;line-height:16px}
    .video-landing-main-content .overview li input{width:120px!important;margin-left:45px}
    .video-landing-main-content .overview li img{cursor:pointer}
    .fondoFranja{background-color:#f8f8f8}
    .tira_chica{width:calc(100% - 10px);float:left; margin: 0 5px; height: 400px}
    .tira_media{width:140px;height:700px}
    .tira_media .videos,.tira_chica .videos{width:100%;height:200px}
    .tira_media .franja,.tira_chica .franja{width:100%;margin-top:0}
    .tira_media h2,.tira_chica h2{margin:0!important}
    .tira_media .feed-image-container,.tira_chica .feed-image-container{overflow:hidden;height:85px;position:relative;background-color:#000}
    .tira_media a,.tira_chica a{width:100%;height:190px;text-decoration:none;cursor:pointer;float:left;margin-bottom:10px}
    .tira_media .videos,.tira_media .franja,.tira_media a{width:140px}
    .tira_chica .buttons{background:#999;width:85px;height:30px;margin:0}
    .tira_media .buttons img,.tira_chica .buttons img{max-height:25px;width:auto}
    .tira_media .feed-image-container img,.tira_chica .feed-image-container img{max-width:100%!important;height:auto;-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-o-transition:all .4s ease;-ms-transition:all .4s ease;transition:all .4s ease}
    .tira_media a:hover .feed-image-container img,.tira_chica a:hover .feed-image-container img{-webkit-filter:grayscale(100%);-webkit-transform:scale(1.15);-moz-transform:scale(1.15);-ms-transform:scale(1.15);-o-transform:scale(1.15);transform:scale(1.15)}
    .tira_chica .viewport{float:left; width: 100%; height: 300px;overflow:hidden;position:relative;background-color:#fff;padding:0}
    #carrousel_MV{float:left}
    #carrousel_HM .viewport{width:calc(100% - 20px);background:none; height: 270px;_height: 290px;}
    #carrousel_HM .viewport .videos{border:1px solid #999}
    #carrousel_HM .overview li{margin:0 14px 0 0;height:200px;width:140px;text-align:center;line-height:16px}
    #carrousel_UL{margin-right:0}
    @media (max-width: 767px) {
        .tira_chica {
            height: 320px;
            width: 100%;
            margin: 0;
        }
        .tira_chica .viewport {
            height: 260px;
        }
        .video-landing-main-content .feed-caption p{
            font-size: 13px;
        }
        .franja h2{
            font-size: 17px !important;
        }

    }
</style>
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

function cargar(desde,titulo,img){
  //console.log(desde);
  //console.log(titulo);
  //console.log(img);
  jQuery("#destino").load("/varios/videos/index2016.php?id="+desde+"&name_feed=<?php echo NAMEFEED;?>");

  jQuery("#datosVideo").html(titulo);
  jQuery("#datosVideo").attr("data-name",titulo);
  jQuery("#datosVideo").attr("data-id",desde);
  jQuery("#datosVideo").attr("data-img", img);
  var stateObj = { foo: "bar" };
  window.history.replaceState(stateObj, titulo, "/<?php echo NAMEFEED;?>/pagina/videos-2/?id="+desde);

  jQuery("html, body").scrollTop(jQuery('header').offset().top);
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
  addScriptTag("topVideos", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_EL;?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response");
}
function getTopVideos_MV() {
  addScriptTag("topVideos_MV", "http://api.brightcove.com/services/library?command=find_all_videos&page_size=10&media_delivery=http&sort_by=PLAYS_TRAILING_WEEK&sort_order=DESC&page_number=1&get_item_count=true&token=<?php echo TOKEN; ?>", "response_MV");
}
function getTopVideos_RC() {
  addScriptTag("topVideos_RC", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_RC?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_RC");
}
function getTopVideos_CB() {
  addScriptTag("topVideos_CB", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_CB?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_CB");
}
function getTopVideos_TK() {
  addScriptTag("topVideos_TK", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_TK?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_TK");
}
function getTopVideos_EN() {
  addScriptTag("topVideos_EN", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_EN?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_EN");
}
function getTopVideos_HM() {
  addScriptTag("topVideos_HM", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_HM?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_HM");
}
function getTopVideos_IB() {
  addScriptTag("topVideos_IB", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_IB?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_IB");
}
function getTopVideos_RY() {
  addScriptTag("topVideos_RY", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_RY?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_RY");
}
function getTopVideos_CC() {
  addScriptTag("topVideos_CC", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?php echo playlist_CC?>&media_delivery=http&token=<?php echo TOKEN; ?>", "response_CC");
}
function findVideo(idVIDEO) {
 /*var urlJson="http://api.brightcove.com/services/library?command=find_video_by_id&video_id="+idVIDEO+"&video_fields=id%2Cname%2CshortDescription&media_delivery=default&token=<?php echo TOKEN; ?>..";
  $.getJSON(urlJson, function(response_Json){
    console.log(response_Json.name);
  })*/
 addScriptTag("topFind", "http://api.brightcove.com/services/library?command=find_video_by_id&video_id="+idVIDEO+"&video_fields=id%2Cname%2CshortDescription%2CvideoStillURL&media_delivery=default&token=<?php echo TOKEN; ?>", "response_find");
}

function setObjectOmniture(titleSTR, titleID){
  objectGlobalVideos.title = titleSTR;
  objectGlobalVideos.id = titleID;
  if(location.pathname.indexOf("videos-2")!=-1) {
      //console.log(location.hostname+location.pathname+titleSTR);
      objectGlobalVideos.pageName = location.hostname+location.pathname+titleSTR;
  }else{
      objectGlobalVideos.pageName = location.hostname+location.pathname+"pagina/videos-2/"+titleSTR;
  }
}

function traer_data(info, jsonData){
    // display the results
  var resp = document.getElementById(info);
  resp.innerHTML = "";
  //resp.empty();

    //console.log(jsonData["items"].length);
  if(jsonData["items"].length > 20){
    cantidad = 20;
  }else{
    cantidad = jsonData["items"].length;
  }
  for (var i=0; i<cantidad; i++) {
    var title = jsonData["items"][i];
    var str = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    var VAR_gaq = "ga('send', 'pageview', '/<?php echo NAMEFEED; ?>/pagina/videos-2/"+ titleSTR +"');";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    var VAR_Data = "cargar('"+title.id+"', '"+titleSTR+"', '"+title.videoStillURL+"');";
    if(title.videoStillURL != null){
      //str+='<a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration"></div></div><div class="feed-caption"><h3>'+title.name + '</h3></div></div></a>';
      str+='<a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div itemscope itemtype="http://schema.org/VideoObject" class="videos" videoId="'+title.id+'"><link itemprop="url" href="http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/videos-2/?id='+title.id+'"/><link itemprop="thumbnailUrl" href="'+title.videoStillURL+'"><meta itemprop="videoId" content="'+title.id+'"><div class="feed-image-container"><img src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration"></div></div><div class="feed-caption"><p itemprop="name">'+title.name + '</p></div></div></a>';      resp.innerHTML+=str;
    }

  }
}

function traer_data_2(info, jsonData2){
  // display the results
  var resp_RC = document.getElementById(info);
  resp_RC.innerHTML="";
  //resp_RC.empty();

  //console.log(jsonData2["videos"].length);
  if(jsonData2["videos"].length > 20){
    cantidad = 20;
  }else{
    cantidad = jsonData2["videos"].length;
  }
    //console.log(cantidad);
    for (var i=0; i<cantidad; i++) {
    var title = jsonData2["videos"][i];
    var duration = seconds2time(title.videoFullLength.videoDuration/1000);
    var str_RC = "";
    var titleSTR = title.name; 
    titleSTR = titleSTR.replace(/["']/g, "");
    var first = getUrlVars()["id"];
    if(!first){
      if (i==0 && info=="resp_HM") cargar(title.id, titleSTR, '"'+title.videoStillURL+'"');
    }else{
     
      if (i==0 && info=="resp_HM") {
         findVideo(first);
         //console.log("first: "+first);
         //titleSTR=jQuery("#datosVideo").attr("data-name");
         cargar(first, titleSTR, '"'+title.videoStillURL+'"');
       }
      //ga('send', 'pageview', '/<?php echo NAMEFEED;?>/pagina/videos-2/"+ titleSTR +"']);
    }

    var VAR_gaq = "ga('send', 'pageview', '/<?php echo NAMEFEED; ?>/pagina/videos-2/"+ titleSTR +"');";
    var VAR_DTM = "setObjectOmniture('"+titleSTR+"', '"+title.id+"');";
    var VAR_Data = "cargar('"+title.id+"', '"+titleSTR+"', '"+title.videoStillURL+"');";
    if(title.videoStillURL != null){
      //str_RC+= '<li><a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration">'+duration+'</div></div><div class="feed-caption"><h3>'+title.name + '</h3></div></div></a></li>';
      str_RC+= '<a href="javascript:void(0);" onclick="'+ VAR_DTM + VAR_Data + VAR_gaq +'"><div itemscope itemtype="http://schema.org/VideoObject" class="videos" videoId="'+title.id+'"><link itemprop="url" href="http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/videos-2/?id='+title.id+'"/><link itemprop="thumbnailUrl" href="'+title.videoStillURL+'"><meta itemprop="duration" content="'+duration+'"><meta itemprop="videoId" content="'+title.id+'"><div class="feed-image-container"><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration">'+duration+'</div></div><div class="feed-caption"><p itemprop="name">'+title.name +'</p></div></div></a>';

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
  //console.log(": "+jsonDataFind.name);
  var titleSTR=jsonDataFind.name;
  titleSTR = titleSTR.replace(/["']/g, "");
  jQuery("#datosVideo").attr("data-name",titleSTR);
  jQuery("#datosVideo").attr("data-id",jsonDataFind.id);
  jQuery("#datosVideo").attr("data-img",jsonDataFind.videoStillURL);
  jQuery("#datosVideo").html(titleSTR);

  var url_share="http://la.eonline.com/<?php echo NAMEFEED; ?>/pagina/videos-2/?id="+jsonDataFind.name;

  jQuery('meta[property="og:url"]').attr('content', url_share); 
  jQuery('meta[property="og:title"]').attr('content', titleSTR); 
  jQuery('meta[property="og:image"]').attr('content', jsonDataFind.videoStillURL); 
  jQuery('meta[itemprop="name"]').attr('content', titleSTR); 
  jQuery('meta[itemprop="image"]').attr('content', jsonDataFind.videoStillURL); 

}


function response(jsonData) {
  //output the query
  var q = document.getElementById("qDiv");
  var s = document.getElementById("topVideos");

  traer_data_2("resp", jsonData);

   jQuery('#resp').owlCarousel({
       items: 3,
       nav:true,
       dots:false,
       navText: ["< Anterior","Siguiente >"] ,
       margin: 10,
       responsive: {
           0: {
               nav:false,
               items: 2
           },
           600: {
               nav:true,
               items: 3
           },
           1000: {
               items: 3
           }
       }
    });
}


function response_MV(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_MV");
  var s = document.getElementById("topVideos_MV");

  traer_data("resp_MV", jsonData);

   jQuery('#resp_MV').owlCarousel({
       items: 3,
       nav:true,
       dots:false,
       navText: ["< Anterior","Siguiente >"] ,
       margin: 10,
       responsive: {
           0: {
               nav:false,
               items: 2
           },
           600: {
               nav:true,
               items: 3
           },
           1000: {
               items: 3
           }
       }
   });
}
function response_RC(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_RC");
  var s = document.getElementById("topVideos_RC");
  
  traer_data_2("resp_RC", jsonData);

  jQuery('#resp_RC').owlCarousel({
      nav:true,
      dots: false,
      autoWidth:true,
      navText: ["< Anterior","Siguiente >"] ,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });

}
function response_CB(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_CB");
  var s = document.getElementById("topVideos_CB");

   traer_data_2("resp_CB", jsonData);

  jQuery('#resp_CB').owlCarousel({
      nav:true,
      autoWidth:true,
      navText: ["< Anterior","Siguiente >"] ,
      dots: false,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });

}
function response_TK(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_TK");
  var s = document.getElementById("topVideos_TK");

     traer_data_2("resp_TK", jsonData);

  jQuery('#resp_TK').owlCarousel({
      nav:true,
      dots: false,
      navText: ["< Anterior","Siguiente >"] ,
      autoWidth:true,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });

}
function response_EN(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_EN");
  var s = document.getElementById("topVideos_EN");

    traer_data_2("resp_EN", jsonData);

  jQuery('#resp_EN').owlCarousel({
      nav:true,
      dots: true,
      navText: ["< Anterior","Siguiente >"] ,
      autoWidth:true,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });
}
function response_HM(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_HM");
  var s = document.getElementById("topVideos_HM");

     traer_data_2("resp_HM", jsonData);

  jQuery('#resp_HM').owlCarousel({
      nav:true,
      dots: false,
      autoWidth:true,
      navText: ["< Anterior","Siguiente >"] ,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });
}
function response_IB(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_IB");
  var s = document.getElementById("topVideos_IB");

     traer_data_2("resp_IB", jsonData);

  jQuery('#resp_IB').owlCarousel({
      nav:true,
      dots: false,
      navText: ["< Anterior","Siguiente >"] ,
      autoWidth:true,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });
}

function response_RY(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_RY");
  var s = document.getElementById("topVideos_RY");

     traer_data_2("resp_RY", jsonData);

  jQuery('#resp_RY').owlCarousel({
      nav:true,
      dots: false,
      autoWidth:true,
      navText: ["< Anterior","Siguiente >"] ,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });
}

function response_CC(jsonData) {
  //output the query
  var q = document.getElementById("qDiv_CC");
  var s = document.getElementById("topVideos_CC");

     traer_data_2("resp_CC", jsonData);

  jQuery('#resp_CC').owlCarousel({
      nav:true,
      dots: false,
      autoWidth:true,
      navText: ["< Anterior","Siguiente >"] ,
      responsive: {
          0: {
              nav:false,
              items: 1
          },
          600: {
              nav:false,
              items: 3
          },
          1000: {
              items: 5
          }
      }
  });
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
getTopVideos_CC();
getTopVideos_RY();

</script>


<div class="col-md-12 col-lg-12">
    <main id="main" class="site-main" role="main">
                <h3 class="site-title" style="color:<?php echo cat_color('videos-2');?>; margin-top:10px;">VIDEOS</h3>
                <div class="">
                    <aside class="col-md-8 col-sm-12">
                         <div id="playerPrincipal" style="width:100%;float:left;margin-bottom:10px;">

                                 <!--datosVideo -->
                                <div class="super-snipe_green franja"  style="width:100%; margin-top:0px;"><h2 id="datosVideo" data-name="" data-id="" data-img="" style="margin-top:0px;"></h2></div>
                                 <!-- /datosVideo -->

                                <div id="destino">
                                    <div style="display: block; position: relative; max-width: 100%;"><div style="padding-top: 56.25%;"><iframe src="//players.brightcove.net/96980687001/553b59c3-4773-4446-8ce1-9a4199b98a2f_default/index.html?videoId=<?php echo $_GET['id'] ?>"
                                                                                                                                         allowfullscreen
                                                                                                                                         webkitallowfullscreen
                                                                                                                                         mozallowfullscreen
                                                                                                                            style="width: 100%; height: 100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px;"></iframe></div></div>
                                </div>
                                <script type="text/javascript">
                                  jQuery(document).ready(function ($) {
                                    $("video").bind( 'contextmenu', function() { return false; } );
                                  });
                                  </script>


                                <div style="width:100%;height:290px;float:left;overflow:hidden;background:#272727;">
                                    <div id="carrousel_HM" class="tira_media" data-HM="<?php echo playlist_HM;?>">
                                        <div class="video-landing-main-content" id="videoHM" style="position:relative;">

                                            <p id="qDiv_HM"></p>
                                            <div class="viewport">
                                              <ul class="overview" id="resp_HM" ><img src="/common/videos_inhome/ellipsis.svg" style="position:absolute; top:50%; left: 50%; margin:-25px 0 0 -25px;"/></ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                          </div>
                    </aside>
                    <aside class="col-md-4 col-sm-6">
                        <div id="carrousel_MV" class="tira_chica">
                            <div class="super-snipe_green franja"><h2>MAS VISTOS</h2></div>
                            <div class="video-landing-main-content" id="videoVISTOS" style="position:relative;">
                                <p id="qDiv_MV"></p>
                                <div class="viewport">
                                    <ul class="overview" id="resp_MV"><img src="/common/videos_inhome/ellipsis.svg" style="margin:0 auto;"/></ul>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <aside class="col-md-4 col-sm-6">
                        <div id="carrousel_UL" class="tira_chica">
                            <div class="super-snipe_green franja"><h2>LIVE FROM E!</h2></div>
                            <div class="video-landing-main-content" id="videoUltimos" style="position:relative;">
                              <p id="qDiv"></p>
                              <div class="viewport">
                                <ul class="overview" id="resp" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                              </div>
                            </div>
                        </div>
                    </aside>
                </div>

                 <div class="super-snipe_red franja"><h2>RED CARPET</h2></div>
                 <div id="carrousel_RC" class="fondoFranja" data-RC="<?php echo playlist_RC;?>">
                      <div class="video-landing-main-content" id="videoRC" style="position:relative;">
                          <p id="qDiv_RC"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_RC" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                      </div>
                  </div>

				        <!-- <div class="super-snipe_marron franja"><h2>CUIDATE DE LA CAMARA</h2></div>
                 <div id="carrousel_CC" class="fondoFranja" data-CC="<?php echo playlist_CC;?>">
                      <div class="video-landing-main-content" id="videoCC" style="position:relative;">
                          <p id="qDiv_CC"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_CC" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                      </div>
                  </div> -->

                 <div class="super-snipe_orange franja"><h2>ES TAN KARDASHIAN</h2></div>
                 <div id="carrousel_TK" class="fondoFranja" data-TK="<?php echo playlist_TK;?>">
                      <div class="video-landing-main-content" id="videoTK" style="position:relative;">
                          <p id="qDiv_TK"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_TK" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                      </div>
                  </div>

               <!--   <div class="super-snipe_lightblue franja"><h2>E! NEWS</h2></div>
                 <div id="carrousel_EN" class="fondoFranja" data-EN="<?php echo playlist_EN;?>">
                      <div class="video-landing-main-content" id="videoEN" style="position:relative;">
                          <a class="buttons prev" href="#">&#60;</a>
                          <p id="qDiv_EN"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_EN" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                          <a class="buttons next" href="#">&#62;</a>
                      </div>
                  </div> -->

        <!--<div class="super-snipe_lightblue franja"><h2>TH ROYALS</h2></div>
                 <div id="carrousel_RY" class="fondoFranja" data-RY="<?php echo playlist_RY;?>">
                      <div class="video-landing-main-content" id="videoRY" style="position:relative;">
                          <p id="qDiv_RY"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_RY" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                      </div>
                  </div> -->
 
                 <!--<div class="super-snipe_lila franja"><h2>INSTABITES</h2></div>
                 <div id="carrousel_IB" class="fondoFranja" data-IB="<?php echo playlist_IB;?>">
                      <div class="video-landing-main-content" id="videoIB" style="position:relative;">
                          <p id="qDiv_IB"></p>
                          <div class="viewport">
                            <ul class="overview" id="resp_IB" ><img src="/common/videos_inhome/ellipsis.svg" style="margin:auto;"/></ul>
                          </div>
                      </div>
                  </div>-->
    </main><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
