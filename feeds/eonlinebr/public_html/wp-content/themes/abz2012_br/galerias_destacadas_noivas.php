<div id="clients" class="galerias_dest_noivas">
	<div class="entry-utility">
		<h3 style="background-color: <?php echo cat_color($name_cat);?> !important; color: #fff !important;">GALERIA DE Noivas</h3>
	</div>
	
	
	<?
	global $wpdb;
	$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$galerias = $mydb2->get_results("SELECT noivas_br_1, noivas_br_2, noivas_br_3, noivas_br_4, noivas_br_5 FROM abmGalDestacadas", ARRAY_A);

	for($al=1;$al<=5;$al++){

						$id_galeria=$galerias[0]["noivas_br_".$al];

						$galleries = obtener_galerias($id_galeria, "1", "pg.orden", "ASC", NULL);					

						foreach($galleries as $image)
						{

							$urlImg=$image["filename"];
							$vecUrl=explode("http://",$image["filename"]);
							$title=$image["title"];
							$title_gal=$image["title_gal"];

							if($vecUrl[1]=="")
							{
									$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
							}else{
									$urlImg="http://".$vecUrl[1];
							}
							if($urlImg){?>

								<?if($al==1){?>
									<div class="imagen_post" style="margin:10px;" id="firstImgGalDest">
										<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" title=""><img src="<?php echo url_resize_sola($urlImg,290);?>" alt="" width="290" title="" /></a>
									</div>
									<h2 class="entry-title" style="margin:0 10px;" id="firstTxtGalDest">
										<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
									</h2>
									<div class="client-slice" style="padding:0;"></div>
								<?}else{?>
									<div class="client-slice">
									
											<div class='imagen_post'>
												<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark"><img src="<?php echo url_resize_sola($urlImg,80);?>" alt="<?php echo $alttext; ?>" title="<?php echo $alttext; ?>" /></a>
											</div>
											
											<div class='tit_post'>
												<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
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
							<a href="<?php echo home_url( '/' ); ?>galerias" rel="bookmark" style="color:#d677d3; font-size:18px;">Ver mais galerias</a>
						</div>

				</div>
	
</div>