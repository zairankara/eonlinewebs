<div id="clients" style="background-color:#000000;">
	<div class="entry-utility" style="float:left;">
		<h3 style="color:#000; background-color:#F93C53; margin: 8px; display:block;">ÚLTIMAS GALERIAS</h3>
	</div>
	
	<?
	global $wpdb;
	$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$galerias = $mydb2->get_results("SELECT ca_br_1, ca_br_2, ca_br_3, ca_br_4, ca_br_5 FROM abmGalDestacadas", ARRAY_A);

	
	
				for($al=1;$al<=5;$al++){
							$sqlstr="SELECT  * 
						FROM ( 
							SELECT np.sortorder, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
							FROM wp_ngg_pictures np, wp_ngg_gallery ng
							WHERE np.galleryid = ng.gid AND np.galleryid =".$galerias[0]["ca_br_".$al]."
						UNION 
							SELECT np.sortorder, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
							FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng
							WHERE np.galleryid = ng.gid AND pg.gid =".$galerias[0]["ca_br_".$al]." AND pg.pid = np.pid ) AS a
						ORDER  BY a.sortorder DESC 
						LIMIT 1 ";
						$galleries = $wpdb->get_results($sqlstr, ARRAY_A);

						foreach($galleries as $image)
						{
							$urlImg=$image["filename"];
							$vecUrl=explode("http://",$image["filename"]);
							//print_r($image["name"]);
							//exit;
							$id_galeria=$image["gid"];
							$title=$image["title"];

							$alttext=$image["alttext"];
							$description=$image["description"];

							if($alttext==""){
								$alttext=$description;
							}

							if($vecUrl[1]=="")
							{
									$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
							}else{
									$urlImg="http://".$vecUrl[1];
							}
							if($urlImg){?>

								<?if($al==1){?>
									<div class="imagen_post" style="margin:10px;">
										<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" title=""><img src="<?php echo $urlImg;?>" alt="<?=$alttext?>" width="290" title="<?=$alttext?>" /></a>
									</div>
									<h2 class="entry-title" style="margin:0 10px;">
										<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title; ?></a>
									</h2>
									<div class="client-slice" style="padding:0;"></div>
								<?}else{?>
								<div class="client-slice">
								
										<div class='imagen_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark"><img src="<?php echo $urlImg;?>" alt="<?php echo $alttext; ?>" title="<?php echo $alttext; ?>" /></a>
										</div>
										<div class='tit_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title; ?></a>
										</div>

								</div>
								<?}?>
							<?
							}
						
		   				}
		   		}
		   		?>
		   		<div class="client-slice">
					
						<div class='tit_post'>
							<a href="<?php echo home_url( '/' ); ?>galerias" rel="bookmark" style="color:#F93C53; font-size:18px;">Ver mais galerias</a>
						</div>

				</div>
	
</div>
