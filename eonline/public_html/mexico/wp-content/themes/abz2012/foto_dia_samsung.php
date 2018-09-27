<div style="background: black;
width: 300px;
height: 100%;
float: left;">
	
	<?
	global $wpdb;

		$galleries = obtener_galerias("12845", "1", "pg.orden", "ASC", NULL);	

		foreach($galleries as $image)
		{

			$urlImg=$image["filename"];
			$vecUrl=explode("http://",$image["filename"]);
			$id_galeria=$image["gid"];
			$title=$image["title"];
			$title_gal=$image["title_gal"];

			if($vecUrl[1]=="")
			{
					$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
			}else{
					$urlImg="http://".$vecUrl[1];
			}
			if($urlImg){?>
					<div style="margin:5px;">
						<img src="<?php echo $urlImg;?>" alt="" width="290" title="" />
						<br/><p style="color:#fff;text-align: center;"><?=$title?></p>
					</div>
			<?
			}
		}
	?>
	
</div>