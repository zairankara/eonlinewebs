

videojs.registerPlugin('customEventPluginPlay', function() {
    var myPlayer = this,
        videoLoopNum = 0;

    myPlayer.play();
     myPlayer.volume(0);
});