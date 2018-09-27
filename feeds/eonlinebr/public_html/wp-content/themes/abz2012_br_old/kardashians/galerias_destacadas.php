<div id="clients" style="background-color:#000000;">
	<div class="entry-utility" style="float:left; width:310px; ">
		<h3 style="color:#ff9c00; background-color:#000000; margin: 8px; display:block;">GALERIAS DAS KARDASHIANS</h3>
	</div>
	<br clear=all/>
	<br clear=all/>
	<?
	$idalbum=1222;
	global $wpdb;

	//$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.filename, ng.name FROM wp_ngg_album na, wp_ngg_pictures np, wp_ngg_gallery ng WHERE na.wp_ngg_album= AND np.galleryid=ng.gid AND np.galleryid=$id_galeria ORDER by na.id LIMIT 5", ARRAY_A);
	$albumes = $wpdb->get_results("SELECT sortorder FROM wp_ngg_album WHERE id=$idalbum ORDER by id DESC LIMIT 1", ARRAY_A);
									
	foreach($albumes as $album)
	{

				$obj = unserialize($album["sortorder"]);
   				//print_r($obj);
   				for($al=0;$al<=4;$al++){
						$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.filename, ng.name, ng.gid FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=".$obj[$al]." LIMIT 1", ARRAY_A);
						foreach($galleries as $image)
						{
							$urlImg=$image["filename"];
							$vecUrl=explode("http://",$image["filename"]);
							//print_r($image["name"]);
							//exit;
							$id_galeria=$image["gid"];
							$desc=$image["name"];

							if($vecUrl[1]=="")
							{
									$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
							}else{
									$urlImg="http://".$vecUrl[1];
									//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
									//$urlImg=$urlImg."?api-key=eonlinelatino";
							}
							if($urlImg){?>

								<div class="client-slice">
								
										<div class='imagen_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias?gallery=<?=$id_galeria?>" rel="bookmark" title="<?php echo $desc; ?>"><img src="<?php echo $urlImg;?>" alt="<?php echo $desc; ?>" /></a>
										</div>
										
										<div class='tit_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias?gallery=<?=$id_galeria?>" rel="bookmark" title="<?php echo $desc; ?>" style="color:#fff;"><?php echo $desc; ?></a>
										</div>

								</div>
							<?
							}
						
		   				}
		   		}
   	}
	?>
	
</div>