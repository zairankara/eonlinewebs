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
	        
	        $id_video=$video->id;
	        $name_video=$video->name;
	        $image_video=$video->thumbnailURL;
	        $customFields=$video->customFields->titlebrasil;
	
	        if($customFields !== null){
	          $name_video=$customFields;
	        }
	        ?>
	        <li>
	            <div class="client-slice">
	
	                <div class='imagen_post'>
	                    <a href="/videos/?id=<?php echo $id_video;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
	                        <div class="nav__image-icon nav__image-icon--video"></div>
	                        <img src="<?php echo $image_video;?>" alt="<?php echo $name_video; ?>" title="<?php echo $name_video; ?>" /></a>
	                </div>
	
	                <div class='tit_post'>
	                    <a class="entry-text" href="/videos/?id=<?php echo $id_video;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo $name_video; ?></a>
	                </div>
	
	            </div>
	        </li>
	    <?php $cant++; }
    } ?>
</ul>

