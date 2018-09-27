<ul id="Header_VideosSubMenu" class="submenu container col-md-12">
    <?php
    $return = getRemoteFile("http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=". $_GET["playlist"] ."&video_fields=id%2Cname%2CvideoFullLength%2CthumbnailURL%2CcustomFields&media_delivery=http&token=". $_GET["token"] ."");
    $videos = json_decode($return);
    //echo ("<pre>");
    //var_dump($videos);
    //echo ("</pre>");
	$cant=1;
    foreach($videos->videos as $video) {
	    if($cant<8){
	        //var_dump($video); die();
	        $id_video=$video->id;
	        $name_video=$video->name;
	        $image_video=$video->thumbnailURL;
	
	        ?>
	        <li>
	            <div class="client-slice">
	
	                <div class='imagen_post'>
	                    <a href="/<?php echo $_GET["feed"];?>/pagina/videos-2/?id=<?php echo $id_video;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	                        <div class="nav__image-icon nav__image-icon--video"></div>
	                        <img src="<?php echo $image_video;?>" width="145" alt="<?php echo $name_video; ?>" title="<?php echo $name_video; ?>" /></a>
	                </div>
	
	                <div class='tit_post'>
	                    <a class="entry-text" href="/<?php echo $_GET["feed"];?>/pagina/videos-2/?id=<?php echo $id_video;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo $name_video; ?></a>
	                </div>
	
	            </div>
	        </li>
	    <?php $cant++; }
    } ?>
</ul>

