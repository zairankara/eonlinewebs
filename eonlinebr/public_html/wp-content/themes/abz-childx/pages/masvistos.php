<h3 style="margin:10px 0;">MAIS LIDAS</h3>
<div id="mas_leidas" >
	<div class="popular-posts">
	<?php
	global $wpdb;
	//$wpdb->show_errors();

	$cantidadCaracteres = 43;

	$querystr = "SELECT wp_posts.post_content, wp_posts.post_date, wp_posts.post_name, wp_posts.post_title, wp_postmeta.meta_value AS cant_views
	FROM wp_posts, wp_postmeta
	WHERE wp_postmeta.post_id = wp_posts.ID 
	AND wp_posts.post_date <= CURDATE( ) 
	AND wp_posts.post_date >= DATE_SUB( CURDATE( ) , INTERVAL 7 DAY )
	AND wp_postmeta.meta_key = 'post_views_count' 
	AND wp_posts.post_status = 'publish' AND wp_posts.post_type =  'post'
	ORDER BY CAST( cant_views AS SIGNED INTEGER ) DESC 
	LIMIT 8";

    $mas_leidos = $wpdb->get_results($querystr, ARRAY_A);	

	$count_masleidas=1;
	foreach ($mas_leidos as $key) {
			//$cadena_titulo=substr($texto,0,strrpos(substr($texto,0,$cantidadCaracteres)," "));
		$fecha_post = substr($key["post_date"],0,4);

		// IMG POST
		$Html = $key["post_content"];
		$image3=sacar_img_con_src($Html);
		$image_ch_explode_resize=url_resize($Html,420);


		if($image_ch_explode_resize){?>

			<div class="client-slice col-md-12 col-sm-6 col-xs-12">

				<div class='imagen_post'>
					<a href="<?php echo home_url();?>/<?php echo($fecha_post); ?>/<?=$key["post_name"]?>" title="<?=$key["post_title"]?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" alt="<?php echo $key["post_title"]; ?>" title="<?php echo $key["post_title"]; ?>" class="img-responsive" /></a>
				</div>

				<div class='tit_post'>
					<a href="<?php echo home_url();?>/<?php echo($fecha_post); ?>/<?=$key["post_name"]?>" title="<?=$key["post_title"]?>"><?php echo $key["post_title"]; ?></a>
				</div>

			</div>
			<?
			$p++;
		}
	$count_masleidas++;
	}?>
	</div>
</div>