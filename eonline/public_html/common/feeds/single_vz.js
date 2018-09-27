jQuery(document).ready(function($) {


    jQuery("div, a").each(function(){
        muestro = jQuery(this).attr("data-mostrarMobile");
        if(muestro == 1 && isMobile()){
            jQuery(this).show();
        }else if(muestro == 0 && isMobile()){
            jQuery(this).hide();
        }else if(muestro == 0 && !isMobile()){
            jQuery(this).show();
        }else if(muestro == 1 && !isMobile()){
            jQuery(this).hide();
        }
    })

    $('#status').fadeOut();
    $('#preloader').fadeOut('slow');
    $('body').css({'overflow':'visible'});


    jQuery("article").find("img").addClass("img-responsive");
    jQuery(".entry-content>p").first().addClass("dest");


    // add responsive to the videos
    jQuery('iframe[src*="youtube.com"], iframe[src*="player.vimeo.com"], iframe[src*="vine.co"], iframe[src*="c.brightcove.com"], iframe[src*="instagram.com"]').each(function() {
        jQuery(this).wrap('<div class="embed-responsive embed-responsive-16by9"/>');
        jQuery(this).addClass('embed-responsive-item');
    });


    if(isMobile()){

        jQuery(".wp-caption").first().prependTo("article.site-main");
        jQuery("h2.entry-title_sing").insertBefore("h1.entry-title");
        jQuery(".entry-social").insertBefore("h1.entry-title");

        var owlT = jQuery('#videos_insingle');
        owlT.owlCarousel({ 
            items : 1,
            loop:false,
            dots:false,
            lazyLoad:true,
            navText : ["",""],
            autoplay:true,
            nav:true,
            responsive:{
                0:{
                    items:1,
                    height: 200,
                    nav:true
                },
                480:{
                    items:4,
                    nav:false
                }
            }
        })
    }else{
         //console.log("No ES Mobile");
    }

    setTimeout(function() {
        var owlML = jQuery('#mas_leidas_mobile');
        owlML.owlCarousel({ 
            items : 1,
            loop:true,
            dots:true,
            lazyLoad:true,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true
        });
     },5000);

    var owlP = jQuery('#personajes_owl');
    owlP.owlCarousel({ 
        items : 3,
        autoHeight: true,
        loop:true,
        dots:false,
        lazyLoad:true,
        navText : ["",""],
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        nav:true,
        responsive:{
            0:{
                items:3,
                nav:false,
                loop:true,
                dots:true,
            },
            480:{
                items:6,
                nav:false
            }
        }
    }).show();



})

var BCLS = (function(window, document) {
    function traer_data_2(info, jsonData2){
        
        var resp_RC = document.getElementById(info);
        resp_RC.innerHTML="";

        cantidad = jsonData2.length;

        for (var i=0; i<cantidad; i++) {
            
            var elemento = jsonData2[i];
            var str_RC = "";
            var str_RC2 = "";
            var titleSTR = elemento.name;
            titleSTR = titleSTR.replace(/["']/g, "");
            var imagenThumb, imagenPoster;
                                                        
             imagenThumb = elemento.images.thumbnail.src;
             imagenPoster = elemento.images.poster.src;


            if(imagenPoster != null){
                str_RC+= '<article class="slide" data-idvideo="'+elemento.id+'" data-idtitle="'+titleSTR+'" ><a href="/venezuela/pagina/videos-2/?id='+elemento.id+'" ><div class="videos" videoId="<?php echo $id_video;?>"><div class="feed-image-container"><div class="play"></div><img rel="fancybox" src="'+imagenPoster+'" class="img-responsive" alt="testing"></div><div class="feed-caption"><h4>'+titleSTR+'</h4></div></div></a></article>';
                resp_RC.innerHTML+=str_RC;
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
            requestData = {};

        if(playlistID != null ){
            playlist_id=playlistID;
        }

        if(videoID != null ){
            video_id=videoID;
        }

        if (id == 'lastUpdated') {
                endPoint = '/videos?&q=tags:destacado&sort=-updated_at&limit=10';
                requestData.url = baseURL + endPoint;
                requestData.requestType = 'GET';
                getMediaData(requestData, id);

        }
    }

    function getMediaData(options, requestID) {
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
                                var nameDiv="videos_insingle";
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