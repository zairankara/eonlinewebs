						<?php
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


						function setObjectOmniture(VideoTitle, VideoID){
							objectGlobalVideos.title = VideoTitle;
							objectGlobalVideos.id = VideoID;
							objectGlobalVideos.pageName = location.hostname+location.pathname+"videos-2/"+VideoTitle;
						}


						var BCLS = (function(window, document) {
					        //define var omniture
							function traer_data_2(info, jsonData2){
								
	                            jQuery(".loading_videos").remove();
	                            var resp_RC = document.getElementById(info);
	                            resp_RC.innerHTML="";

	                            var resp_RC2 = document.getElementById("tira_sidebar");
	                            resp_RC2.innerHTML="";

	                            if(jsonData2.length > 3){
	                                cantidad = 3;
	                            }else{
	                                cantidad = jsonData2.length;
	                            }

	                            for (var i=0; i<cantidad; i++) {
	                                
	                                var elemento = jsonData2[i];
	                                var duration = seconds2time(elemento.duration/1000);
	                                var str_RC = "";
	                                var str_RC2 = "";
	                                var titleSTR = elemento.name;
	                                titleSTR = titleSTR.replace(/["']/g, "");
 									var imagenThumb;
 										                                        
 									 imagenThumb = elemento.images.thumbnail.src;
 									 imagenPoster = elemento.images.poster.src;


	                                if(i==0){

	                                    if(imagenPoster != null){
	                                        str_RC+= '<article data-idvideo="'+elemento.id+'" data-idtitle="'+titleSTR+'"  data-src="'+imagenPoster+'" data-duration="'+duration+'" data-name="'+titleSTR + '"></article>';
	                                        resp_RC.innerHTML+=str_RC;

	                                        var desde=elemento.id;
	                                        var title=titleSTR;
	                                       

	                                        if(jQuery("#div_content_tira").hasClass("convideo")){
	                                            //jQuery("#destino h3").html("cargando").delay("3000");
	                                        }else{
	                                            jQuery("#div_content_tira").addClass("convideo");
	                                        }
											jQuery(".featuredvideo__title").html(titleSTR);
											jQuery(".featuredvideo__description").html("DURACION: "+duration);
											
	                                        jQuery(".video_cargado").load("/varios/videos/index2016.php?id="+desde+"&name_feed=<?php echo strtolower($name_feed)?>&titulo=<?php echo str_replace("'", "", $title);?>", function(){

	                                            jQuery(".featuredvideo__herotext").show();

	                                            setObjectOmniture(title, desde);
	                                        });

	                                    }
	                                }else{
	                                        str_RC2='<article data-idvideo="'+elemento.id+'" data-idtitle="'+titleSTR+'" ><a href="/<?php echo strtolower($name_feed)?>/pagina/videos-2/?id='+elemento.id+'" ><div class="videos" videoId="'+elemento.id+'"><div class="feed-image-container"><div class="play"></div><img rel="fancybox" src="'+imagenPoster+'" class="img-responsive" alt="testing"></div><div class="feed-caption"><h4>'+titleSTR+'</h4></div></div></a></article>';
	                                        resp_RC2.innerHTML+=str_RC2;

	                                }

	                            }

							}



					        function init(){
					            setRequestData('lastUpdated', null, null);
					        }

					        var baseURL = 'https://cms.api.brightcove.com/v1/accounts/96980687001',
					            proxyURL = 'http://la.eonline.com/varios/videos/proxy.php';

					        function setRequestData(id, playlistID, videoID) {
					            var endPoint = '',
					            	ad='',
					                requestData = {};

					            if(playlistID != null ){
					                playlist_id=playlistID;
					            }

					            if(videoID != null ){
					                video_id=videoID;
					            }

					          

					            switch (id) {
					                case 'sort':
					                    endPoint = '/videos?limit=5&sort=name';
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id);
					                    break;
					                case 'get1video':
					                    endPoint = '/videos/' + video_id;
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id);
					                    break;
					                case 'search':
					                    endPoint = '/videos?q=' + encodeURI('name:sea');
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id);
					                    break;
					                case 'moreViewsLastWeek':
					                    endPoint = '/videos?&sort=-plays_trailing_week';
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id, null);
					                    break;
					                case 'lastUpdated':
						                endPoint = '/videos?&q=tags:destacado+destacado_ar&sort=-updated_at&limit=5';
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id, null);
					                    break;
					                    
					                case 'get1playlist':
					                    endPoint = '/playlists/' + playlist_id;
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id);
					                    break;
					                case 'getPlaylistVideos':
					                    endPoint = '/playlists/' + playlist_id + '/videos';
					                    requestData.url = baseURL + endPoint;
					                    requestData.requestType = 'GET';
					                    getMediaData(requestData, id, playlist_id);
					                    break;
					            }
					        }

					        function getMediaData(options, requestID, playlistID=null) {
					            var httpRequest = new XMLHttpRequest(),
					                responseRaw,
					                parsedData,
					                requestParams,
					                dataString,

					                getResponse = function() {
					                    try {
					                        if (httpRequest.readyState === 4) {
					                            if (httpRequest.status === 200) {
					                                responseRaw = httpRequest.responseText;

					                                parsedData = JSON.parse(responseRaw);

					                                if ( requestID === 'lastUpdated'){
					                                    //console.log("options: "+JSON.stringify(options));
					                                    //console.log("parsedData: "+JSON.stringify(parsedData));
					                                    var nameDiv="resp_HM";
					                                    traer_data_2(nameDiv, parsedData);
					                                }

					                            } else {
					                                //alert('There was a problem with the request. Request returned ' + httpRequest.status);
					                            }
					                        }
					                    } catch (e) {
					                        //console.log('/////Caught Exception: ' + e);
					                    }
					                };
					            // set up request data
					            requestParams = "url=" + encodeURIComponent(options.url) + "&requestType=" + options.requestType;
					            if (options.requestBody) {
					                dataString = JSON.stringify(options.requestBody);
					                requestParams += "&requestBody=" + encodeURIComponent(dataString);
					            }

					            httpRequest.onreadystatechange = getResponse;
					            httpRequest.open('POST', proxyURL);
					            httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					            httpRequest.send(requestParams);

					        }

					        init();

					    })(window, document);
                        </script>

                        <div class="row">
                            <div id="div_content_tira" class="col-md-9 col-sm-12 row-eq-height">
                                <div id="destino">
                                    <p id="qDiv_HM"></p>
                                    <div id="resp_HM"></div>
                                    <div id="featuredvideo__herotext" class="featuredvideo__herotext js-featuredvideo__herotext">
                                        <div class="featuredvideo__flag"></div>
                                        <div class="featuredvideo__snipe">Video DESTACADO</div>
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