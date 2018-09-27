videojs.plugin('customPlaylist', function (options) {
    var myPlayer = this,
        playlistItems;

    

    myPlayer.on('loadedmetadata', function () {
        console.log("ENTRO AL loadedmetadata");
        var playerEl = myPlayer.el(),
            playerParent = playerEl.parentNode,
            i,
            iMax,
            playlistItem,
            itemInnerDiv,
            itemTitle,
            playlistData = myPlayer.playlist(),
            videoItem;
        
        iMax = playlistData.length;
        console.log('iMax: '+iMax);
        for (i = 0; i < iMax; i++) {
            videoItem = playlistData[i];

            console.log('b-1800: '+videoItem);
            // create the playlist item and set its class and style
            //playlistItem = document.createElement('div');
            //playlistItem.setAttribute('data-playlist-index', i);
            //playlistItem.setAttribute('class', 'bcls-playlist-item');
            // create the inner div and set class and style
            //itemInnerDiv = document.createElement('div');
            //itemInnerDiv.setAttribute('class', 'bcls-item-inner-div');
            //itemInnerDiv.setAttribute('style', 'background-image:url(' + videoItem.thumbnail + ');');
            // create the title and set its class
            //itemTitle = document.createElement('span');
            //itemTitle.setAttribute('class', 'bcls-title');
            // add the video name to the title element
            //itemTitle.appendChild(document.createTextNode(videoItem.name));
            // now append the title to the innerdiv,
            // the innerdiv to the item,
            // and the item to the playlist
            //itemInnerDiv.appendChild(itemTitle);
            //playlistItem.appendChild(itemInnerDiv);
            //playlistWrapper.appendChild(playlistItem);
        }

        
    });
});