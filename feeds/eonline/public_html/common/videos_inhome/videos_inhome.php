						<link rel="stylesheet" type="text/css" media="screen" href="/common/videos_inhome/videos_inhome.css" />

						<script type="text/javascript" src="http://la.eonline.com/experience/js/jquery.tinycarousel.js"></script>

						<?
						$token="I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..";
						$name_feed="DEV";
						$playlist_HM=664965169001;
						?>

						<script>
						var objectGlobalVideos = {};

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

						function getTopVideos_HM() {
						  addScriptTag("topVideos_HM", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=<?=$playlist_HM?>&media_delivery=http&token=<?=$token?>", "response_HM");
						}


						function setObjectOmniture(VideoTitle, VideoID){
							objectGlobalVideos.title = VideoTitle;
							objectGlobalVideos.id = VideoID;
							objectGlobalVideos.pageName = location.hostname+location.pathname+titleSTR;
						}

						function traer_data_2(info, jsonData2){
							
							jQuery(".loading_videos").remove();
							var resp_RC = document.getElementById(info);
							resp_RC.innerHTML="";
							for (var i=0; i<jsonData2["videos"].length; i++) {
							    var title = jsonData2["videos"][i];
							    var duration = seconds2time(title.videoFullLength.videoDuration/1000);
							    var str_RC = "";
							    var titleSTR = title.name; 
							    titleSTR = titleSTR.replace(/["']/g, "");
							    //if (i==0 && info=="resp_HM") cargar(title.id, "'"+titleSTR+"'");

							    if(title.videoStillURL != null){
							      str_RC+= '<li data-idvideo="'+title.id+'" data-idtitle="'+titleSTR+'" ><a href="javascript:void(0);" ><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><div class="play"></div><img rel="fancybox" src="'+title.videoStillURL+'" alt="testing"><div class="feed-duration">'+duration+'</div></div><div class="feed-caption"><h4>'+title.name + '</h4></div></div></a></li>';
							      resp_RC.innerHTML+=str_RC;
							    }
							}
						  //console.log("carga");
						  		$("#resp_HM li").click(function(){
									//console.log($(this).data("idvideo"));
									//console.log(jQuery(this).attr("data-idvideo"));
									//console.log("que divertido");
									//console.log(desde);
									var desde=jQuery(this).attr("data-idvideo");
									var title=jQuery(this).attr("data-idtitle");
									
									if(jQuery("#destino").hasClass("convideo")){
										jQuery("#destino h3").html("cargando").delay("3000");

									}else{
										//jQuery("#destino").slideDown(1300);
										jQuery(".bot_up").show();
										jQuery("#destino").addClass("convideo");
									}
									jQuery("#destino h3").html(title);
									jQuery(".video_cargado").load("/varios/videos/index.php?id="+desde).show("3000");
									//var _gaq = _gaq || []; _gaq.push(['_trackPageview' ,'/<?=$name_feed?>/home/videos/'+ title]);

									setObjectOmniture(title, desde);
									console.log(title+"----"+desde);

								});

								$(".bot_up").click(function(){
									jQuery("#destino h3").html("");
									jQuery("#destino .video_cargado").html("");
									//jQuery("#destino").slideUp();
									jQuery("#destino").removeClass("convideo");
									jQuery(this).hide();
								});
						}

						function response_HM(jsonData) {
						  //output the query
						  var q = document.getElementById("qDiv_HM");
						  var s = document.getElementById("topVideos_HM");

						    traer_data_2("resp_HM", jsonData);
						  	jQuery('#videoHM').tinycarousel();

						}
						getTopVideos_HM();

						
										
					 //_gaq.push(["_trackPageview" ,"/<?=$name_feed?>/home/videos/"+ title +""]);
							
						</script>

						<?
						function noCache() {
							header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
							header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
							header("Cache-Control: no-store, no-cache, must-revalidate");
							header("Cache-Control: post-check=0, pre-check=0", false);
							header("Pragma: no-cache");
						}
						noCache();



						$activar_videos=1;

						/*$query2 = mysql_query("SELECT lt_".$var_feed." FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
						$row2 = mysql_fetch_array($query2);
						$abmLivesRows2=$row2[0];*/
						
						if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
						    $ip=$_SERVER['HTTP_CLIENT_IP'];
						} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
						    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
						    $ip=$_SERVER['REMOTE_ADDR'];
						}
						if($desarrollo==1 && ($ip=="190.111.232.51" || $ip=="200.68.75.9" || $ip=="181.167.9.227" || $ip=="200.63.162.6")){
							$activar_videos=1;
						}?>
					
						<div id="div_content_tira">
								<h3 style="padding-top:10px;">últimos videos E!</h3>
								<div id="div_tira_videos">
									<div id="carrousel_HM" class="tira_media">
		                                <div class="video-landing-main-content" id="videoHM" style="position:relative;">
		                                    <a class="buttons prev" href="#">&#60;</a>
		                                    <p id="qDiv_HM"></p>
		                                    <div class="viewport">
		                                    	<img src="/common/videos_inhome/ellipsis.svg" class="loading_videos" style="margin:auto;"/>
		                                      <ul class="overview" id="resp_HM"></ul>
		                                    </div>
		                                    <a class="buttons next" href="#">&#62;</a>
		                                </div>
		                            </div>
		                        </div>
		                        <div id="destino">
		                        	<h3></h3>
		                        	<div class='video_cargado'></div>
		                        	<div class='bot_up'></div>
		                        </div>
						</div>
					
