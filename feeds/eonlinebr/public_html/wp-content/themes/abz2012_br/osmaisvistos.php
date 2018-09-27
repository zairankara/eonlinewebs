<h3 class="widget-title" style="margin-top:10px;">OS 5 MAIS VISTOS</h3>
						<ul class="popular-posts">
						<?php
						global $wpdb;
						$wpdb->show_errors();

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
						LIMIT 5";

					    $mas_leidos = $wpdb->get_results($querystr, ARRAY_A);	

						foreach ($mas_leidos as $key) {
							//$texto=$key["post_title"];
							//$cadena_titulo=substr($texto,0,strrpos(substr($texto,0,$cantidadCaracteres)," "));
							?>
							<li><a href="<?php echo home_url();?>/<?=$key["post_name"]?>" title="<?=$key["post_title"]?>"><span class="wpp-post-title"><?php echo $key["post_title"]; ?> <?if($_GET["abz"]==1) echo $key["cant_views"];?></span></a> </li>
						<?}?>
						</ul>