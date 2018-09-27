<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<?php if ( is_page( "fotos" )) {?>
<p style="font-family: 'Ostrich Sans Pro Regular', 'Arial Narrow', Sans-Serif;font-weight: normal;	text-rendering: optimizeLegibility;	text-transform: uppercase; font-size: 36px; line-height: 32px; color:#6ea914; margin-bottom:8px !important;"><?php echo $gallery->title ?></p>
<?php } ?>

<div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">

	
	<!-- Thumbnails -->
	<?php foreach ( $images as $image ) : ?>
	

			<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box" >
				<div class="ngg-gallery-thumbnail" >
						<?
						$vecUrl=explode("http://",$image->thumbnailURL);
						//print_r($vecUrl);
						if($vecUrl[2]=="")
						{
								$urlImg=$image->thumbnailURL;
						}else{
								$urlImg="http://".$vecUrl[2];
								$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
								$urlImg=$urlImg."?api-key=eonlinelatino";
								$image->imageURL="http://".$vecUrl[2];
								$image->size="";
						}
						?>
					<a href="<?php echo $image->imageURL ?>" title="<?php echo html_entity_decode($image->description);?>" <?php echo $image->thumbcode ?> >
						<?php if ( !$image->hidden ) { ?>
						<img src="<?php echo $urlImg;?>" <?php echo $image->size ?> />
						<?php } 
						//title="<?php echo $image->alttext
						?>
					</a>
					<div class="ngg-gallery-albumtitle"><p><?php echo html_entity_decode($image->description);?></p></div>
				</div>

			</div>
	
	<?php if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>

 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
</div>

<?php endif; ?>

