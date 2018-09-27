videojs.registerPlugin('customEventPlugin', function() {
	var objectGlobalVideos = {};
  var myPlayer = this,
                videoName,
                feedSection,
                flag=0;

            myPlayer.on('loadstart',function(){
                //console.log('V13');
                //console.log('playlist', myPlayer.playlist());

                 var objBC=myPlayer.playlist();

                /*var index;
                for (index = 0; index < objBC.length; ++index) {
                    console.log(objBC[index]["custom_fields"]["titlebrasil"]);
                }*/

                jQuery( ".vjs-playlist-item" ).each( function( index, element ){
                    //console.log( this.html("cite") );
                    //console.log('div' + index + ':' + $(this).find('.vjs-playlist-name')); 
                    var tituloESP=jQuery(this).find('.vjs-playlist-name').html();
                    var tituloPOR=objBC[index]["custom_fields"]["titlebrasil"];
                    //console.log('div' + index + ':' + jQuery(this).find('.vjs-playlist-name').html()); 
                    if(tituloPOR!=""){
                        jQuery(this).find('.vjs-playlist-name').html(tituloPOR);
                    }
                });

                videoName = myPlayer.mediainfo['name'];
                //console.log('This loadstart name: ', videoName);
                //console.log('Objeto: ', myPlayer.mediainfo);
                //console.log('This name: ', videoName);

                objectGlobalVideos.title=videoName;
                objectGlobalVideos.id = myPlayer.mediainfo['id'];
                nameseccion=location.pathname;

                if(location.hostname=="la.eonline.com"){
                	if(nameseccion.indexOf("videos-2")!=-1) {feedSection=location.pathname;}else{feedSection=location.pathname+"pagina/videos-2/";}
                }else if(location.hostname=="br.eonline.com"){
                	if(nameseccion.indexOf("videos")!=-1) {feedSection=location.pathname;}else{feedSection=location.pathname+"videos/";}

                }
                objectGlobalVideos.pageName = location.hostname+feedSection+videoName;

            });

            myPlayer.on("timeupdate", function() {

                currentPosition = myPlayer.currentTime();

                if(Math.round(currentPosition)>2 && flag==0){
                    //console.log("beginVideo: "+Math.round(currentPosition));
                    _satellite.track("beginVideo");
                    //_gaq.push(['_trackEvent', 'Videos Brightcove', 'video_start', objectGlobalVideos.title]);
                    ga('send', 'event', 'Videos Brightcove', 'video_start', objectGlobalVideos.title);
                    flag=1;
                }

            });
            myPlayer.on("pause", function () {
                jQuery(".featuredvideo__herotext").show();
            });

            myPlayer.on("play", function () {
                jQuery(".featuredvideo__herotext").hide();
            });

            
             myPlayer.on("playing", function () {
                console.log('This VIDEO playing: ');

                //_satellite.track("completeVideo");
                //_gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);
            });


            myPlayer.on("ended", function () {
                //console.log('This VIDEO end: ', objectGlobalVideos.title);

                _satellite.track("completeVideo");
                //_gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);
                ga('send', 'event', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title);

            });
});