<h3 style="margin:10px 0 0 0;"><img src="<?php bloginfo('template_url')?>/images/cab_masleidas.png" alt="más leídas" title="más leídas"></h3>
<div id="clients" style="margin: 0;padding: 10px 5px; width:300px;background-color:#000000;">
	<div class="popular-posts">
	<?php
	global $wpdb;
	//$wpdb->show_errors();

	$cantidadCaracteres = 43;

	$querystr = "  
	SELECT wp_posts.post_date, wp_posts.post_name, wp_posts.post_title, wp_postmeta.meta_value AS cant_views
	FROM wp_posts, wp_postmeta
	WHERE wp_postmeta.post_id = wp_posts.ID 
	AND wp_posts.post_date <= CURDATE( ) 
	AND wp_posts.post_date >= DATE_SUB( CURDATE( ) , INTERVAL 4 DAY ) 
	AND wp_postmeta.meta_key = 'post_views_count' 
	AND wp_posts.post_status = 'publish' AND wp_posts.post_type =  'post'
	ORDER BY CAST( cant_views AS SIGNED INTEGER ) DESC 
	LIMIT 8";

    $mas_leidos = $wpdb->get_results($querystr, ARRAY_A);	

	$count_masleidas=1;
	foreach ($mas_leidos as $key) {
		//$texto=$key["post_title"];
		//$cadena_titulo=substr($texto,0,strrpos(substr($texto,0,$cantidadCaracteres)," "));
		$fecha_post = substr($key["post_date"],0,4);

		?>
		<div class="client-slice" style="background-color:#fff; margin: 0 5px;">
						
				<div class='tit_post' style="width: 270px;margin-left:0;">
					
					<a href="<?php echo home_url();?>/<?php echo($fecha_post); ?>/<?=$key["post_name"]?>" title="<?=$key["post_title"]?>">
					<div style="font-size:36px;color: #03CDFF; width: 50px; text-align: center; float: left; margin-top: 20px;"><?php echo $count_masleidas?></div>
					<div class="wpp-post-title" style="width:220px; font-size: 20px;float: left; "><?php echo $key["post_title"]; ?></div>
					</a>				
				</div>

		</div>

	<?
	$count_masleidas++;
	}?>
	</div>
</div>