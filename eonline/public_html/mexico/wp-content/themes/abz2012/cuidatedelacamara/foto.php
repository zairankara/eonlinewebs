<?php if(is_category("cuidate-de-la-camara")){?>
	<h3 style="margin-top:8px; background:#ff7400;"><a href="<?php echo home_url( '/' ); ?>category/cuidate-de-la-camara" class="widget-title" style="text-align: center;
  display: block;color:#fff; font-size:25px; background:none;">ANTES Y DESPUES DE LA QUINCENA</a></h3>


	<ul id="slider_cycle" class="sidebar_300" style="display:block;margin-bottom:8px;">
		<li>
			<div class="slides_container_cuidate" style="overflow:hidden; height: 300px; display:block;">
			<? 
			$gallery="16712";
			global $wpdb;

			$galleries = obtener_galerias($gallery, "10", "pg.orden", "ASC", NULL);	

			foreach($galleries as $image)
			{?>
					
					<?
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
					$urlImg=url_resize_sola($urlImg,290);
					?>
					<div class="slide"><img src="<?=$urlImg;?>" alt="<?=$title?>" title="<?=$title?>" width="290" /></div> 
						
			<?}?>
			</div>
		</li>
	</ul>

<?}?>