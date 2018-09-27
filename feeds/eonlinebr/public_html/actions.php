<?
include($_SERVER["DOCUMENT_ROOT"]."/wp-blog-header.php");
echo("inicio-brasil-".time());
global $wpdb;
					//$wpdb->query("ALTER TABLE  `wp_ngg_album` ADD  `timefecha` TIMESTAMP NOT NULL;");
					$wpdb->query("ALTER TABLE  `wp_ngg_album` ADD  `agua` VARCHAR( 255 ) NOT NULL;");


					//ID PAGE
					$id_Page=24;
					$sqlstr="SELECT post_content FROM wp_posts WHERE ID=$id_Page AND post_status='publish' AND post_content <> '' ORDER BY post_modified DESC LIMIT 0,1";
					$post_content=$wpdb->get_var($sqlstr);
					$post_content=utf8_encode($post_content);
					$var_html = $post_content;		
					$var_html1=str_replace("[album id=", "",$var_html);
					$var_html1=str_replace("template=extend]", ",",$var_html1);
					$var_html1=str_replace(" ", "",$var_html1);
					//$final_string = substr_count($var_html1, ',');
					//echo ("<br>final_string: ".$final_string);
					$var_html1 = trim($var_html1, ',');
					$stack=explode(",", $var_html1);
					//print_r($var_html2);

					/*$stack = array();
					$valor="";

					for ($i = 0; $i < $final_string; $i++) {
								//echo ($var_html1[$i]."<br>");
								$sub = $var_html1[$i];
								
								if($sub== ","){
									$stack[] = $valor;
									$valor = "";
								}

								if($sub!=",")$valor = $valor.$sub;
					}*/
					krsort($stack);

					//print_r($stack);

					$cont=1;
					foreach ($stack as $album_id){
							$wpdb->query("UPDATE  `wp_ngg_album` SET  `agua` = '2' WHERE  `wp_ngg_album`.`id`=$album_id LIMIT 1;");
							echo("<br>".$cont.") ".$album_id);
							sleep(1);
							$cont++;
						
					}
					$wpdb->query("ALTER TABLE `wp_ngg_album` DROP `agua`;");
					echo("LLEGO AL FIN: ".time());

?>