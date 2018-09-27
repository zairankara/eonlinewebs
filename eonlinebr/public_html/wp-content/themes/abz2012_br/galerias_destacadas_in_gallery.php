<div id="clients">
	<div >
		<h3>GALERIAS DESTACADAS</h3>
	</div>

	<?
	global $wpdb;
	$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$galerias = $mydb2->get_results("SELECT br_1, br_2, br_3, br_4, br_5 FROM abmGalDestacadas", ARRAY_A);

	
	
				for($al=1;$al<=5;$al++){

						$id_galeria=$galerias[0]["br_".$al];

						$galleries = obtener_galerias($id_galeria, "1", "pg.orden", "ASC", NULL);					

						foreach($galleries as $image)
						{
							$urlImg=$image["filename"];
							$vecUrl=explode("http://",$image["filename"]);

							$title=$image["title"];
							$title_gal=$image["title_gal"];

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


								<div class="client-slice">
								
										<div class='imagen_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark"><img src="<?php echo url_resize_sola($urlImg,80);?>" alt="<?php echo $alttext; ?>" title="<?php echo $alttext; ?>" /></a>
										</div>
										
										<div class='tit_post'>
											<a href="<?php echo home_url( '/' ); ?>galerias_page?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
										</div>

								</div>
							<?
							}
						
		   				}
		   		}
		   		?>
		   		<div class="client-slice">
					
						<div class='tit_post'>
							<a href="<?php echo home_url( '/' ); ?>galerias" rel="bookmark" style="color:#ff0099; font-size:18px;">Ver mais galerias</a>
						</div>

				</div>
	
</div>
