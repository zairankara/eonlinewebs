<?php
/**
 * Template Name: Fotos_automatico_2014
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); 

?>
<style>
.ngg-albumoverview {
	padding:10px 15px;
	border: none !important;
}
#paginafotos h3{
	font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;
	font-weight: normal;
	text-rendering: optimizeLegibility;
	text-transform: uppercase;
	font-size: 36px;
	line-height: 32px;
	color: #000;
	margin-bottom: 8px !important;
	
}

#paginafotos h2{
	text-align: left;
	font-family: "DIN Web Condensed", "Arial Narrow", Sans-Serif;
	font-size: 26px;
	line-height: 26px;
	color: #fff;
}

#paginafotos h4{
	font-size: 38px;
	font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;
	letter-spacing: 1px;
	text-rendering: optimizeLegibility;
	text-transform: uppercase;
	line-height: 32px !important;
	margin: 15px 25px !important;
	color:#ff24d1;
}
</style>
<div id="container" class="one-column">
	<div id="content" role="main">
		<div class="cont_one-clumn" id="paginafotos">
		<h4>FOTOS</h4>

					<?
					global $wpdb;
					if($_GET["albumID"]==""){

					$sql_test="SELECT id FROM wp_ngg_album group by id ORDER by timefecha DESC LIMIT 25 ";
					$albunem_test = $wpdb->get_results($sql_test, ARRAY_A);
					
					$stack = array();
					
					foreach($albunem_test as $album_test){
						$stack[]=$album_test[id];
						array_push();
					}
					//print_r($stack);


					//ID PAGE
					/*$id_Page=2;
					$sqlstr="SELECT post_content FROM wp_posts WHERE ID=$id_Page AND post_status='publish' AND post_content <> '' ORDER BY post_modified DESC LIMIT 0,1";
					$post_content=$wpdb->get_var($sqlstr);
					$post_content=utf8_encode($post_content);
					$var_html = $post_content;		
					$var_html1=str_replace("[album id=", "",$var_html);
					$var_html1=str_replace("template=extend]", ",",$var_html1);
					$var_html1=str_replace(" ", "",$var_html1);
					$pos= strpos($var_html1,',');


					$stack = array();
					$valor="";
					$final_string = strlen($var_html1);
					

					for ($i = 0; $i <= $final_string; $i++) {
								$sub = $var_html1[$i];
								
								if($sub== ","){
									$stack[] = $valor;
									$valor = "";
								}

								if($sub!=",")$valor = $valor.$sub;
					}
					print_r($stack);*/

					foreach ($stack as $album_id){
						
							$sql2="SELECT sortorder,name FROM wp_ngg_album WHERE id=".$album_id." ORDER by id  ";
							$albunes = $wpdb->get_results($sql2, ARRAY_A);
							//$query2=mysql_query($sql2);
							foreach($albunes as $album){
								$obj = unserialize($album["sortorder"]);
								//$alb = utf8_encode($album["name"]);
								$alb = $album["name"];
							}

							/*foreach($obj as $where){
								$where_q .= " gid=".$where." OR";
							}
							//exit($where_q."--");

							//print_r($obj);
							$sql22="SELECT gid FROM wp_ngg_gallery WHERE 1=1 $where_q 1=1 ORDER by gallery_modified_SAGE DESC";
							$albunes12 = $wpdb->get_results($sql22, ARRAY_A);
							print_r($albunes12);*/


							unset($array_2);


							// lleno un array con las fechas modificadas y los id de las galleries
							foreach ($obj as $v) {
								$sqlVector = "select gid, gallery_modified_SAGE from wp_ngg_gallery where gid = ".$v;
								
								$ejecutar = $wpdb->get_results($sqlVector, ARRAY_A);
   								foreach($ejecutar as $recorrido){
   									$modified= $recorrido["gallery_modified_SAGE"];
   									// el gid es el array key y el valor es la fecha de modificacion de la gallerie
   									$array_2[$recorrido["gid"]] = $modified;
								}
							}
							// ordeno por fecha el array cargado anteriormente
							arsort($array_2);
							//echo("array GALLERIES");
							//print_r($array_2);


							
							/*$act = false;
							for($al=0;$al<=2;$al++){
								
								if($obj[$al]!=""){
									$sql3= "SELECT np.galleryid, ng.path ,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid 
									FROM wp_ngg_pictures np, wp_ngg_gallery ng 
									WHERE np.galleryid=ng.gid AND np.galleryid=".$obj[$al]." 
									UNION SELECT np.galleryid, ng.path,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid 
									FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng 
									WHERE np.galleryid=ng.gid AND pg.gid=".$obj[$al]." AND pg.pid=np.pid LIMIT 1";
									$galleries = $wpdb->get_results($sql3, ARRAY_A);
									//$query3=mysql_query($sql3);
									//while($row3=mysql_fetch_array($query3)){
									foreach($galleries as $gallery_for){
													if($al==0){?>
														<div class="ngg-albumoverview">	
														<h3><?php echo ($alb);?> (<?=$album_id?>)</h3>
														
													<?}
													$urlImg="";
													$act = true;
													$galeria_ubicacion= $gallery_for["galleryid"];
													$urlImg=$gallery_for["filename"];
													$vecUrl=explode("http://",$gallery_for["filename"]);
													//print_r($gallery_for["name"]);
													//exit;
													$id_galeria=$gallery_for["gid"];
													//echo("galeria: ".$id_galeria);
													$desc=$gallery_for["name"];

													if($vecUrl[1]=="")
													{
															$urlImg=$var_con[1].$gallery_for["path"]."/".$gallery_for["filename"];
													}else{
															$urlImg="http://".$vecUrl[1];
															//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
															//$urlImg=$urlImg."?api-key=eonlinelatino";
													}
													if($urlImg){?>

															<div class="ngg-album">
																<div class="ngg-albumcontent">
																		<div class="ngg-thumbnail">
																		<a href="/galerias/?gallery=<?php echo $id_galeria;?>"><img class="Thumb" src="<?php echo $urlImg; ?>" alt="" title=""/></a>
																		<div class="ngg-albumtitle"><a href="/galerias?gallery=<?php echo $id_galeria;?>"><?php echo ($desc);?>- <?=$id_galeria?></a></div>
																		</div>

																		<div class="ngg-description">
																		<h2><?php echo ($desc);?></h2>
																		</div>
																</div>
															</div>

													<?}
									}
								}
							}*/

							$act = false;
									/* GALLERIES */
						

									$al=0;
									foreach($array_2 as $key2 => $value2){ 
										if($al <= 2){
									
									
												$sql3= "SELECT np.galleryid, ng.path ,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=".$key2."  UNION SELECT np.galleryid, ng.path,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=".$key2." AND pg.pid=np.pid LIMIT 1";
												
												$galleries = $wpdb->get_results($sql3, ARRAY_A);
												//$query3=mysql_query($sql3);
												//while($row3=mysql_fetch_array($query3)){
												foreach($galleries as $gallery_for){
																if($al==0){?>
																	<div class="ngg-albumoverview">
																<h3><?php echo ($alb);?></h3>
																
															<?}
															
															$galeria_ubicacion= $gallery_for["galleryid"];
															$urlImg=$gallery_for["filename"];
															$vecUrl=explode("http://",$gallery_for["filename"]);
															//print_r($gallery_for["name"]);
															//exit;
															$id_galeria=$gallery_for["gid"];
															//echo("galeria: ".$id_galeria);
															$desc=$gallery_for["name"];

															if($vecUrl[1]=="")
															{
																	$urlImg=$var_con[1].$gallery_for["path"]."/".$gallery_for["filename"];
															}else{
																	$urlImg="http://".$vecUrl[1];
																	//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
																	//$urlImg=$urlImg."?api-key=eonlinelatino";
															}
															if($urlImg){?>

																	<div class="ngg-album">
																		<div class="ngg-albumcontent">
																				<div class="ngg-thumbnail">
																				<a href="http://br.eonline.com/galerias_page?gallery=<?php echo $id_galeria;?>"><img class="Thumb" src="<?php echo $urlImg; ?>" alt="<?php echo ($desc);?>" title="<?php echo ($desc);?>"/></a>
																				<div class="ngg-albumtitle"><a href="http://br.eonline.com/galerias_page?gallery=<?php echo $id_galeria;?>"><?php echo ($desc);?></a></div>
																				</div>

																				<div class="ngg-description">
																				<h2><?php echo ($desc);?></h2>
																				</div>
																		</div>
																	</div>

															<?}
												}
												$al++;
										}
										else{
											
											break;
										}
									}
						?>
						
						<!--DIV QUE CIERRA EL ALBUM -->
						<? if ($al > 0){?>
						<div class="ngg-clear"> </div>
						
						<div style="clear:both; float:right;width:80px;"><a href="http://br.eonline.com/galerias/?albumID=<?php echo $album_id ?>" style=" font-size:11px; text-decoration:none; margin-right:10px;">Ver más</a></div>
						<div style="height:25px; border-bottom:1px dotted #ccc; width:910px;"></div>
						</div>
						<?}?>

						<?
					}
					
	}else{

							if(!is_numeric($_GET["albumID"])) exit("Error en la validación.");
							$album_id=$_GET["albumID"];
							
							$sql2="SELECT sortorder,name FROM wp_ngg_album WHERE id=".$album_id." ORDER by id  ";
							$albunes = $wpdb->get_results($sql2, ARRAY_A);
							//$query2=mysql_query($sql2);
							foreach($albunes as $album){
								$obj = unserialize($album["sortorder"]);
								//$alb = utf8_encode($album["name"]);
								$alb = $album["name"];

							}
							
							unset($array_2);


							// lleno un array con las fechas modificadas y los id de las galleries
							foreach ($obj as $v) {
								$sqlVector = "select gid, gallery_modified_SAGE from wp_ngg_gallery where gid = ".$v;
								
								$ejecutar = $wpdb->get_results($sqlVector, ARRAY_A);
   								foreach($ejecutar as $recorrido){
   									$modified= $recorrido["gallery_modified_SAGE"];
   									// el gid es el array key y el valor es la fecha de modificacion de la gallerie
   									$array_2[$recorrido["gid"]] = $modified;
								}
							}
							// ordeno por fecha el array cargado anteriormente
							arsort($array_2);
	

							$act = false;
									/* GALLERIES */
						

									$al=0;
									foreach($array_2 as $key2 => $value2){ 
										
									
									
												$sql3= "SELECT np.galleryid, ng.path ,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=".$key2."  UNION SELECT np.galleryid, ng.path,ng.name,ng.gid, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=".$key2." AND pg.pid=np.pid LIMIT 1";
												
												$galleries = $wpdb->get_results($sql3, ARRAY_A);
												//$query3=mysql_query($sql3);
												//while($row3=mysql_fetch_array($query3)){
												foreach($galleries as $gallery_for){
																if($al==0){?>
																	<div class="ngg-albumoverview">
																<h3><?php echo ($alb);?></h3>
																
															<?}
															
															$galeria_ubicacion= $gallery_for["galleryid"];
															$urlImg=$gallery_for["filename"];
															$vecUrl=explode("http://",$gallery_for["filename"]);
															//print_r($gallery_for["name"]);
															//exit;
															$id_galeria=$gallery_for["gid"];
															//echo("galeria: ".$id_galeria);
															$desc=$gallery_for["name"];

															if($vecUrl[1]=="")
															{
																	$urlImg=$var_con[1].$gallery_for["path"]."/".$gallery_for["filename"];
															}else{
																	$urlImg="http://".$vecUrl[1];
																	//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
																	//$urlImg=$urlImg."?api-key=eonlinelatino";
															}
															if($urlImg){?>

																	<div class="ngg-album">
																		<div class="ngg-albumcontent">
																				<div class="ngg-thumbnail">
																				<a href="http://br.eonline.com/galerias_page?gallery=<?php echo $id_galeria;?>"><img class="Thumb" src="<?php echo $urlImg; ?>" alt="<?php echo ($desc);?>" title="<?php echo ($desc);?>"/></a>
																				<div class="ngg-albumtitle"><a href="http://br.eonline.com/galerias_page?gallery=<?php echo $id_galeria;?>"><?php echo ($desc);?></a></div>
																				</div>

																				<div class="ngg-description">
																				<h2><?php echo ($desc);?></h2>
																				</div>
																		</div>
																	</div>

															<?}
												}
												$al++;
										
										
									}
							?>
							<div class="ngg-clear"> </div>
							<div style="clear:both; float:right;width:80px;"><a href="http://br.eonline.com/galerias/" style=" font-size:11px; text-decoration:none;">Volver</a></div>
						<?


	}
?>

	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
