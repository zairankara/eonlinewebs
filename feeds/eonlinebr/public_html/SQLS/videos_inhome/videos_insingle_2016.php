<?php
$token="I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..";

$return = file_get_contents("http://api.brightcove.com/services/library?command=search_videos&any=tag%3Adestacado_br&video_fields=id%2Cname%2CvideoFullLength%2CvideoStillURL%2CcustomFields&page_size=4&media_delivery=http&sort_by=MODIFIED_DATE%3ADESC&token=".$token);
$videos = json_decode($return);

foreach($videos->items as $video) {
    $id_video=$video->id;
    $name_video=$video->name;
    $image_video=$video->videoStillURL;
    $customFields=$video->customFields->titlebrasil;

    if($customFields !== null){
      $name_video=$customFields;
    }
    ?>
    <article class="slide" data-idvideo="<?php echo $id_video;?>" data-idtitle="<?php echo $name_video; ?>" ><a href="/videos/?id=<?php echo $id_video;?>" ><div class="videos" videoId="<?php echo $id_video;?>"><div class="feed-image-container"><div class="play"></div><img rel="fancybox" src="<?php echo $image_video;?>" class="img-responsive" alt="<?php echo $name_video; ?>"></div><div class="feed-caption"><h4><?php echo $name_video; ?></h4></div></div></a></article>
            
<?php } ?>