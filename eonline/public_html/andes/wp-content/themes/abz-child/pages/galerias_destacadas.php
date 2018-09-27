<article id="galeriadestacada_home"  class="galdest col-sm-4 col-xs-12 grid-item">
	<div class="entry-utility">
		<h3>NUEVAS FOTOS</h3>
	</div>
	
	<?
	global $wpdb;
	$mydb2 = new wpdb(DBUSER,DBPASS,DBNAME,DBHOST);
	$galerias = $mydb2->get_results("SELECT an_1, an_2, an_3, an_4, an_5 FROM abmGalDestacadas", ARRAY_A);
	
	
		for($al=1;$al<=5;$al++){

				$id_galeria=$galerias[0]["an_".$al];

				$galleries = obtener_galerias($id_galeria, "1", "pg.orden", "ASC", NULL);

				foreach($galleries as $image)
				{

					$urlImg=$image["filename"];
					$vecUrl=explode("http://",$image["filename"]);
					$title=$image["title"];
					$title_gal=$image["title_gal"];

					if($vecUrl[1]=="")
					{
							$urlImg=URLCOMPLETE.$image["path"]."/".$image["filename"];
					}else{
							$urlImg="http://".$vecUrl[1];
					}
					if($urlImg){?>

						<?if($al==1){?>
							<div class="imagen_post" id="firstImgGalDest">
								<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" title=""><img src="<?php echo url_resize_sola($urlImg,460);?>" alt="" class="img-responsive" title="<?php echo $title_gal;?>" /></a>
							</div>
							<h2 class="entry-title" id="firstTxtGalDest">
								<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
							</h2>
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
					<a href="<?php echo home_url( '/' ); ?>pagina/fotos-andes" rel="bookmark">Ver más galerias</a>
				</div>

		</div>
	
</article>
