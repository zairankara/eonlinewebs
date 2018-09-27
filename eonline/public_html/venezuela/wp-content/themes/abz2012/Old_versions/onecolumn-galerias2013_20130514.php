<?php
/**
 * Template Name: GALERIAS 2013
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

<style type="text/css">
.slide_foto{
	width: 550px;
	margin: 20px;
	position: relative;
	float: left
}
.banner_slider{
	width: 300px;
	_width: 400px;
	padding: 0 50px; 
	margin: 20px 40px;
	position: relative;
	float: left
}
.share_foto{
	width: 350px;
	margin: 20px 0;
	position: relative;
	float: left
}
.next_foto{
	position: absolute;
	right: 10px;
	top: 250px;
}
.prev_foto{
	position: absolute;
	left: 10px;
	top: 250px;
}
.slide_foto a img{
	max-width: 550px !important;
}
</style>
	

		<div id="container">
			<div id="content" role="main">
			<div class="cont_one-clumn" style="background-color: #1a1a1a;padding-top: 20px; margin:10px;">

					

									<? 

									$url = 'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php?zoneid=142';
									$h = file_get_contents($url, true);
									$resultado = strpos($h, "http://adsrv01.eonlinelatinola.com/www/");

									if($resultado !== FALSE){
										$hay_="1";
									}else {
										$hay_="0";
									}

									$gallery=$_GET["gallery"];
									$foto=$_GET["foto"];
									if(!is_numeric($gallery)) exit("Error de Validación");
									

									global $wpdb;

									//$galleries = $wpdb->get_results("SELECT ng.path, np.alttext, np.description, np.filename FROM ".$wpdb->prefix."ngg_pictures np, ".$wpdb->prefix."ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=" . $gallery . " ", ARRAY_A);
									 $sqlstr="SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=$gallery UNION SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=$gallery AND pg.pid=np.pid;";

									$galleries = $wpdb->get_results($sqlstr, ARRAY_A);
									$max_count = $wpdb->num_rows;
									$name_gallery=$wpdb->get_var("SELECT title FROM wp_ngg_gallery WHERE gid=" . $gallery . " ");
									$resto=floor($max_count/3);
									
									if($hay_=="1"){
										$suma=$max_count+$resto;
									}else{
										$suma=$max_count;
									}

									//echo("<br>CANT. DE FOTOS: ".$max_count);
									//echo("<br>RESTO: ".$resto);
									//echo("<br>TOTAL: ".$suma);
									//echo("<br>----------: ");
									//echo("<br>GET FOTO: ".$_GET["foto"]);

									$contador_fotos=1;
									if($_GET["foto"]!=""){
										
										if(!is_numeric($_GET["foto"])) exit("Error de Validación");
										$actual=$_GET["foto"];
										$paginador=$_GET["foto"];
										
										//if($gallery=="7215" && $_GET["foto"]==3)$max_count++;

										if($_GET["foto"]=="0" || $_GET["foto"]==$suma+1){
											header ("Location: http://la.eonline.com/venezuela/galerias?gallery=$gallery");
											//header ("Location: http://www.ole.com.ar/");
										}

									}else{
										
										//exit("----------");
										$actual=1;
										$paginador=1;

									}
									
									if($hay_=="1"){
										$saldo=floor($_GET["foto"]/3);
										$actual=$actual-$saldo;
									}
									
									
									//echo("<br>ACTUAL FOTO: ".$actual);


									if($_GET["foto"]%3==0 && $_GET["foto"]!="" && $hay_=="1"){?>

										<h2 style="color:<?php echo cat_color(fotos);?>; margin-left: 25px !important;">FOTOS / <span style="color:#fff;"><?=$name_gallery?></span></h2>
										<div class="banner_slider">
											<script type='text/javascript'><!--// <![CDATA[
											    OA_show(142);
											// ]]> --></script><noscript>
											<a target='_blank' href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=80db974'><img border='0' alt='' src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=142&amp;n=80db974' /></a>
											</noscript>

												<a href="?gallery=<?=$gallery?>&foto=<?=$paginador-1?>" class="prev_foto" style="top: 120px !important;"><img src="http://la.eonline.com/admin2012/banners/images/prev3.png" alt="Arrow Prev"></a>
												<a href="?gallery=<?=$gallery?>&foto=<?=$paginador+1?>" class="next_foto" style="top: 120px !important;"><img src="http://la.eonline.com/admin2012/banners/images/next3.png" alt="Arrow Next"></a>

										</div>
					


									<?}else{

										foreach($galleries as $image)
										{

												//print_r($galleries);
												//exit;
											if($contador_fotos==$actual){
											
													?>


													<h2 style="color:<?php echo cat_color(fotos);?>; margin-left: 25px !important;">FOTOS / <span style="color:#fff;"><?=$name_gallery?></span></h2>
													<div class="slide_foto">
															<?
															$vecUrl=explode("http://",$image["filename"]);
															//print_r($vecUrl);
															//exit;
															$alttext=$image["alttext"];

															if($alttext==""){
																$alttext=$desc;
															}
															$desc=$image["description"];

															if($vecUrl[1]=="")
															{
																	$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
															}else{
																	$urlImg="http://".$vecUrl[1];
																	//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
																	//$urlImg=$urlImg."?api-key=eonlinelatino";
															}
															?>
															<a href="<?=$urlImg;?>" class="shutterset_set_14">
																<img src="<?=$urlImg;?>" title="<?=$alttext?>" alt="<?=$alttext?>"/>
															</a> 

															<a href="?gallery=<?=$gallery?>&foto=<?=$paginador-1?>" class="prev_foto"><img src="http://la.eonline.com/admin2012/banners/images/prev3.png" alt="Arrow Prev"></a>
															<a href="?gallery=<?=$gallery?>&foto=<?=$paginador+1?>" class="next_foto"><img src="http://la.eonline.com/admin2012/banners/images/next3.png" alt="Arrow Next"></a>

													</div>

													<div class="share_foto">
														<h2 style="color:<?php echo cat_color(fotos);?>; text-transform: none; letter-spacing:normal; font-family: 'Din Web Condensed', 'Arial Narrow', Sans-Serif; text-rendering: optimizeLegibility;color:#fff; font-size:18px; line-height:1.2 !important;"><?=$image["alttext"]?></h2>
														<p><iframe src="//www.facebook.com/plugins/like.php?href=<?=$urlImg?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></p>
														<p><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$urlImg?>" data-text="<?=$desc?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a></p>
														<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
														
														<div style="margin-bottom:30px;">
															<div id="fb-root"></div><script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script> 
															<fb:comments href="<?=$urlImg;?>" width="350" num_posts="5" colorscheme="dark"></fb:comments >
														</div><!-- #FACEBOOK COMMENT -->
													</div>
											<?
											}
											$contador_fotos++;
											?>
										<?}
									}?>


 


			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
