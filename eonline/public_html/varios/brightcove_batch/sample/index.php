<!DOCTYPE html>
<html>
<head>
      <title>TEST</title>
      <style>
            body {
                  margin: 1em 2em;
                  font-family: sans-serif;
            }
            h2 {
                  font-size: 1.1em;
            }
            button {
                  padding: .5em;
            }
            section {
                  background-color: #F1EFEE;
                  border-left: .5em solid #636363;
                  box-shadow: 5px 5px 10px rgba(192, 192, 192, 1.000);
                  font-family: Hack, monospace;
                  font-size: .8em;
                  padding: 1em;
                  display: block;
                  height: auto;
            }
            .video-item {
                  border: 1px solid #999;
                  margin: 0;
                  padding: 0;
                  height: 74px;
                  width: 480px;
                  overflow: scroll;
            }
            textarea {
                  width: 100%;
            }
            #apiData {
                  min-height: 100px;
            }
      </style>
</head>
<body>

<h1> API Tester <?php echo date("H:i:s");?></h1>
<div class="buttonBlock">
</div>
<p><strong>API request:</strong></p>
<section id="apiRequest"></section>

<p><strong>Request method:</strong></p>
<section id="apiMethod"></section>

<p><strong>Input data for write requests:</strong></p>
<section id="apiData"></section>

<p><strong>Response data</strong></p>
<section id="responseData"></section>
<script
      src="https://code.jquery.com/jquery-1.12.4.min.js"
      integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
      crossorigin="anonymous"></script>
<script>
      var BCLS = (function(window, document) {
            var baseURL = 'https://cms.api.brightcove.com/v1/accounts/96980687001',
                  ingestURL = 'https://ingest.api.brightcove.com/v1/accounts/96980687001',
                  ingestURLsuffix = '/ingest-requests',
                  proxyURL = 'brightcove-learning-proxy.php',
                  newVideo_id = '',
                  allButtons = document.getElementsByTagName('button'),
                  inicio = document.getElementById('inicio'),
                  createVideo = document.getElementById('createVideo'),
                  ingestVideo = document.getElementById('ingestVideo'),
                  retranscode = document.getElementById('retranscode'),
                  replace = document.getElementById('replace'),
                  addImages = document.getElementById('addImages'),
                  addTextTracks = document.getElementById('addTextTracks');
            /**

             * sets up the data for the API request
             * @param {String} id the id of the button that was clicked
             */
            function setRequestData(id, misDatos, miUrl, miImage) {
                  var endPoint = '',
                        requestData = {};
                  // disable buttons to prevent a new request before current one finishes
                  if (id=='inicio') {
                              endPoint = '/videos';
                              requestData.url = baseURL + endPoint;
                              requestData.requestType = 'POST';
                              requestData.requestBody = misDatos;
                              apiRequest.textContent += requestData.url;
                              apiData.textContent += JSON.stringify(requestData.requestBody, null, '  ');
                              apiMethod.textContent += requestData.requestType;
                              getMediaData(requestData, "createVideo");
                              
                              console.log("Crear ID: "+newVideo_id);

                              function explode(){
                                    //console.log(" es VIDEO? "+newVideo_id);
                                    if( newVideo_id != "" && newVideo_id != undefined ){
                                          console.log("Crear ID: "+newVideo_id);
                                          endPoint = '/videos/' + newVideo_id;
                                          requestData.url = ingestURL + endPoint + ingestURLsuffix;
                                          requestData.requestType = 'POST';
                                          requestData.requestBody = {
                                                master: {
                                                      url: miUrl
                                                }, "poster": {  "url": miImage,  "width": 480,"height": 360 }, "thumbnail": { "url": miImage,  "width": 160,"height": 90 },
                                                profile: 'high-resolution',
                                                'capture-images': false,
                                                'callbacks': ['di-callback.php']
                                          };
                                          //apiRequest.textContent += requestData.url;
                                          //apiData.textContent += JSON.stringify(requestData.requestBody, null, '  ');
                                          //apiMethod.textContent += requestData.requestType;
                                          getMediaData(requestData, "ingestVideo");
                                    }

                              }
                              setTimeout(explode, 5000);

                  }
            }
            /**
             * send API request to the proxy
             * @param  {Object} requestData options for the request
             * @param  {String} requestID the type of request = id of the button
             */
            function getMediaData(options, requestID) {
                  var httpRequest = new XMLHttpRequest(),
                        responseRaw,
                        parsedData,
                        requestParams,
                        dataString,
                  // response handler
                        getResponse = function() {
                              try {
                                    if (httpRequest.readyState === 4) {
                                          if (httpRequest.status === 200) {
                                                //console.log(httpRequest.responseText);
                                                responseRaw = httpRequest.responseText;
                                                responseData.textContent = responseRaw;
                                                //console.log(responseRaw);
                                                parsedData = JSON.parse(responseRaw);
                                                //console.log(parsedData[0].message);
                                                //console.log(parsedData[0].error_code);


                                                // save new ids on create requests
                                                if (requestID === 'createVideo') {
                                                      newVideo_id = parsedData.id;
                                                }

                                                /*$.ajax({
                                                      type:"POST",
                                                      cache: false,
                                                      url:"includes/grabar.php",
                                                      data: {
                                                            message: parsedData[0].message,
                                                            error_code: parsedData[0].error_code,
                                                            newVideo_code: newVideo_id,
                                                            action: requestID
                                                      },
                                                      success: function(result){
                                                            //console.log(result);
                                                            console.log('OK');

                                                      },
                                                      error: function(result){
                                                            //console.log(result);
                                                            console.log('ERROR');
                                                      }
                                                });*/

                                                //responseData.textContent += JSON.stringify(parsedData, null, '  ');
                                                //console.log( JSON.stringify(parsedData, null, '  '));
                                                // re-enable the buttons
                                          } else {
                                                //alert('There was a problem with the request. Request returned ' + httpRequest.status);
                                          }
                                    }
                              } catch (e) {
                                    //alert('Caught Exception: ' + e);
                              }
                        };
                  // set up request data
                  requestParams = 'url=' + encodeURIComponent(options.url) + '&requestType=' + options.requestType;
                  if (options.requestBody) {
                        dataString = JSON.stringify(options.requestBody);
                        requestParams += '&requestBody=' + encodeURIComponent(dataString);
                  }
                  //console.log(requestParams);
                  // set response handler
                  httpRequest.onreadystatechange = getResponse;
                  // open the request
                  httpRequest.open('POST', proxyURL);
                  // set headers
                  httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  // open and send request
                  httpRequest.send(requestParams);
            }
            // event listeners
            /*inicio.addEventListener('click', function() {
                  adddata = {  name: 'Watch Chris Evans Trying to Raise a Child Math Prodigy in 7', reference_id: 'ABZ_Test_7' };
                  setRequestData('inicio', adddata, 'http://link.theplatform.com/s/BdHJDC/media/NTjZ5tmsXVlX?feed=LatAm%20Brightcove&format=redirect');
            });*/

            function myTrim(x) {
                  return x.replace(/^\s+|\s+$/gm,'');
            }

            // INICIO ingest por for Array
            $.ajax({
                  type: "GET",
                  url: "http://feed.theplatform.com/f/BdHJDC/eon-bright-lat-am",
                  dataType: "xml",
                  success: function (xml) {
                        var data = [];
                        var adddata, str, res, addUrl, addImage, inicio, fin, caducidad, cont=0;
                        var xmlText = new XMLSerializer().serializeToString(xml);
                        var time = 0;
                        $(xmlText).find("media\\:content").each(function(){
                              var self = this
                              setTimeout( function(){
                                    if(cont<10){
                                          str =$(self).parent().find("media\\:keywords").text();

                                          addImage=$(self).parent().find("media\\:thumbnail").attr('url');
                                          res= str.split(", ");
                                          //res = str.replace(', ', '\", \"');

                                          caducidad=$(self).parent().find("dcterms\\:valid").text();
                                          //fin=;
                                          array_fechas=caducidad.split(";");
                                          for (x=0;x<array_fechas.length;x++){
                                                elementos=array_fechas[x].split("=");
                                                if(elementos[0]=="start"){
                                                      inicio=elementos[1];
                                                      agregar_cad=inicio;
                                                }
                                                if(elementos[0]=="end"){
                                                      fin=elementos[1];
                                                      //agregar_fin+=fin;
                                                }else{
                                                      fin=null;
                                                }
                                          }
                                          var parse_res = JSON.stringify(res);
                                         // var parse_res2 = parse_res.replace('" ', '"');
                                          //var starts_at = JSON.stringify(agregar_cad);

                                          cont+=1;
                                          adddata = {"name": $(self).parent().find("title").text(), "description": $(self).parent().find("description").text(), "reference_id": "NO_USAR_E_"+cont+"_"+$(self).parent().find("id").text(),"tags":  res, "schedule": {"starts_at":agregar_cad, "ends_at": fin} };
                                          addUrl =$(self).attr('url');
                                         // console.log(cont+")"+ addImage);
                                          setRequestData('inicio', adddata, addUrl, addImage);

                                    }

                              }, time);
                              /*console.log("time: "+time);
                              console.log("cont: "+cont);
                              console.log("$(this): "+$(this));
                              console.log("---------");*/
                              time += 20000;


                        });

                  }
            });

      })(window, document);

</script>
</body>
</html>