videojs.plugin('customEventPlugin', function() {
	
  var myPlayer = this,
                videoName,
                feedSection,
                flag=0;

            myPlayer.on('loadstart',function(){
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
                    _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_start', objectGlobalVideos.title]);
                    flag=1;
                }

            });
            myPlayer.on("pause", function () {
                console.log('This VIDEO pause v8 ');
                if(parent.document.getElementById('featuredvideo__herotext') !=null ){
                    parent.document.getElementById("featuredvideo__herotext").style.display = 'block';
                }
            });

            myPlayer.on("play", function () {
                console.log('This VIDEO play v8');
                if(parent.document.getElementById('featuredvideo__herotext') !=null ){
                    parent.document.getElementById("featuredvideo__herotext").style.display = 'none';
                }
            });

            
             myPlayer.on("playing", function () {
                //console.log('This VIDEO playing v6 ');
                //parent.document.getElementById("featuredvideo__herotext").style.display = 'none';

                //_satellite.track("completeVideo");
                //_gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);
            });


            myPlayer.on("ended", function () {
                //console.log('This VIDEO end: ', objectGlobalVideos.title);

                _satellite.track("completeVideo");
                _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);
            });
});