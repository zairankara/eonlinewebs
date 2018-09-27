<article id="galeriadestacada_home"  class="galdest col-sm-4 col-xs-12 grid-item galJSON">
	<div class="entry-utility">
		<h3>NUEVAS FOTOS</h3>
	</div>	
	<?php

	if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.1.50" ){
		$json_str = file_get_contents('../admin2012/galeriasdestacadas_la.json');
	} else {
		$url = '../varios/JSON/JSONgaleriasdestacadas/galeriasdestacadas_la.json';
		$contents = file_get_contents($url); 
		$json_str = utf8_encode($contents); 
	}
	
	$gal = json_decode($json_str,true);

	for($al=1;$al<=5;$al++){
		foreach ($gal as $value) {

			foreach($value as $key => $val)
			{
				if($key=="vz_$al"){

					$urlImg=$val["filename"];
					$vecUrl=explode("http://",$val["filename"]);
					$title=$val["title"];
					$title_gal=$val["title_gal"];
					$id_galeria=$val["gid"];
					$urlImg="http://".$vecUrl[1];
					if(isset($urlImg)){
						if($al==1){
							?>
								<div class="imagen_post" id="firstImgGalDest">
									<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" title=""><img src="<?php echo url_resize_sola($urlImg,460);?>" alt="" class="img-responsive" title="<?php echo $title_gal;?>" /></a>
								</div>
								<h2 class="entry-title" id="firstTxtGalDest">
									<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
								</h2>
							<?php 
						}else{ 
							?>
								<div class="client-slice">
									<div class='imagen_post'>
										<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark"><img src="<?php echo url_resize_sola($urlImg,80);?>" alt="<?php echo $alttext; ?>" title="<?php echo $alttext; ?>" /></a>
									</div>
									<div class='tit_post'>
										<a href="<?php echo home_url( '/' ); ?>pagina/galerias?gallery=<?=$id_galeria?>" rel="bookmark" style="color:#fff;"><?php echo $title_gal; ?></a>
									</div>
								</div>
							<?php 
						} 
					}
				}
			}
		}
	}
	?>
	<div class="client-slice">
		<div class='tit_post'>
			<a href="<?php echo home_url( '/' ); ?>pagina/fotos-venezuela" rel="bookmark">Ver más galerias</a>
		</div>
	</div>	
</article>