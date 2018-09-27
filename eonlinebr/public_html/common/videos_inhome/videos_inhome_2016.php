						<!--<link rel="stylesheet" type="text/css" media="screen" href="/common/videos_inhome/videos_inhome.css" />-->

						<?
						$token="I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..";
						if($_GET["name_feed"]!=""){
							$name_feed=$_GET["name_feed"];
						}else{
							$name_feed=$_POST["name_feed"];
						}

						if($_GET["playlist"]!=""){
							$playlist_HM=$_GET["playlist"];
						}else{
							$playlist_HM=$_POST["playlist"];
						}
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
							addScriptTag("topVideos_HM", "http://api.brightcove.com/services/library?command=search_videos&any=tag%3Adestacado_br&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&page_size=10&media_delivery=http&sort_by=MODIFIED_DATE%3ADESC&token=<?php echo $token;?>", "response_HM");
						}


						function setObjectOmniture(VideoTitle, VideoID){
							objectGlobalVideos.title = VideoTitle;
							objectGlobalVideos.id = VideoID;
							objectGlobalVideos.pageName = location.hostname+location.pathname+"videos/"+VideoTitle;
						}



						function traer_data_2(info, jsonData2){
							
                            jQuery(".loading_videos").remove();
                            var resp_RC = document.getElementById(info);
                            resp_RC.innerHTML="";

                            var resp_RC2 = document.getElementById("tira_sidebar");
                            resp_RC2.innerHTML="";

                            //console.log(jsonData2["items"].length+"--------");
                            if(jsonData2["items"].length > 3){
                                cantidad = 3;
                            }else{
                                cantidad = jsonData2["items"].length;
                            }


                            for (var i=0; i<cantidad; i++) {

                                var title = jsonData2["items"][i];
                                var duration = seconds2time(title.videoFullLength.videoDuration/1000);
                                var str_RC = "";
                                var str_RC2 = "";
                                var titleSTR = title.name;
                                titleSTR = titleSTR.replace(/["']/g, "");

                                 //chequeo su tiene datos los custom fields
								    if(title.customFields !== null){
								      titleSTR=title.customFields.titlebrasil;
								      //console.log(title.name+"-------"+titleSTR);
								      //if (info=="resp_HM") console.log("++" + title.name +"---"+ (title["customFields"] === null));
								    }
								    
                                //console.log("CONTADOR: "+i);

                                if(i==0){

                                    if(title.videoStillURL != null){
                                        str_RC+= '<article data-idvideo="'+title.id+'" data-idtitle="'+titleSTR+'"  data-src="'+title.videoStillURL+'" data-duration="'+duration+'" data-name="'+titleSTR + '"></article>';
                                        resp_RC.innerHTML+=str_RC;

                                        var desde=title.id;
                                        var title=titleSTR;

                                        if(jQuery("#div_content_tira").hasClass("convideo")){
                                            //jQuery("#destino h3").html("cargando").delay("3000");
                                        }else{
                                            jQuery("#div_content_tira").addClass("convideo");
                                        }
										jQuery(".featuredvideo__title").html(titleSTR);
										jQuery(".featuredvideo__description").html("DURAÇÃO: "+duration);
										
                                        //jQuery("#div_content_tira h3").html(title);
                                        jQuery(".video_cargado").load("/varios/videos/index2016.php?id="+desde+"&name_feed=<?php echo strtolower($name_feed)?>&titulo=<?php echo str_replace("'", "", $title);?>", function(){
                                            // add responsive to the videos

                                            jQuery(".featuredvideo__herotext").show();


                                            setObjectOmniture(title, desde);
                                        });

                                    }
                                }else{
                                        str_RC2='<article data-idvideo="'+title.id+'" data-idtitle="'+titleSTR+'" ><a href="/videos/?id='+title.id+'" ><div class="videos" videoId="'+title.id+'"><div class="feed-image-container"><div class="play"></div><img rel="fancybox" src="'+title.videoStillURL+'" class="img-responsive" alt="testing"></div><div class="feed-caption"><h4>'+titleSTR + '</h4></div></div></a></article>';
                                        resp_RC2.innerHTML+=str_RC2;

                                }

                            }

						}

						function response_HM(jsonData) {
						  //output the query
						  var q = document.getElementById("qDiv_HM");
						  var s = document.getElementById("topVideos_HM");

						    traer_data_2("resp_HM", jsonData);

						}
						getTopVideos_HM();
                        </script>

                        <div class="row">
                            <div id="div_content_tira" class="col-md-9 col-sm-12 row-eq-height">
                                <div id="destino">
                                    <p id="qDiv_HM"></p>
                                    <div id="resp_HM"></div>
                                    <div id="featuredvideo__herotext" class="featuredvideo__herotext js-featuredvideo__herotext">
                                        <div class="featuredvideo__flag"></div>
                                        <div class="featuredvideo__snipe">VÍDEO EM DESTAQUE</div>
                                        <h3 class="featuredvideo__title"></h3>
                                        <div class="featuredvideo__description"></div>
                                    </div>


                                    <div class='video_cargado'></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 row-eq-height">
                                <div id="tira_sidebar"></div>
                            </div>
                        </div>
					
