<div id="clients" style="margin-bottom:10px;">
	<div class="entry-utility">
		<h3 style="background-color: #c6e6f9 !important;">FOTOS DEL MUNDIAL </h3>
	</div>
	
	<?
	global $wpdb;
	$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

	$galerias = $mydb2->get_results("SELECT copa_mundo_1, copa_mundo_2, copa_mundo_3, copa_mundo_4, copa_mundo_5 FROM abmGalDestacadas", ARRAY_A);

	
				for($al=1;$al<=5;$al++){

						$id_galeria=$galerias[0]["copa_mundo_".$al];

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
									<div class="imagen_post" style="margin:10px;">
										<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" title=""><img src="<?php echo url_resize_sola($urlImg,290);?>" alt="" width="290" title="" /></a>
									</div>
									<h2 class="entry-title" style="margin:0 10px;">
										<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
									</h2>
									<div class="client-slice" style="padding:0;"></div>
								<?}else{?>
									<div class="client-slice">
									
											<div class='imagen_post'>
												<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark"><img src="<?php echo url_resize_sola($urlImg,80);?>" alt="<?php echo $alttext; ?>" title="<?php echo $alttext; ?>" /></a>
											</div>
											
											<div class='tit_post'>
												<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
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
							<a href="<?php echo home_url( '/' ); ?>pagina/fotos-argentina" rel="bookmark" style="color:#c6e6f9; font-size:18px;">Ver más galerias</a>
						</div>

				</div>
	
</div>