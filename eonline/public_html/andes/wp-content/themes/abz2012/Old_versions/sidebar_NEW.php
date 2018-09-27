<?php
include(TEMPLATEPATH."/var_constantes.php");
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" )  ||  in_category( "efashionblogger" )  ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" )  ||  is_category( "efashionblogger" )  ||  is_category( "latinbillboard" )) $cat_alf2=1;
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">

						<!-- BANNER ARRIBA -->
						<ul class="sidebar_300" style="height:250px;">
							<li>
							<!-- ADSERVER 300X250 ARRIBA-->
							<?if($zona_banner_300x250_arriba!="")  echo($zona_banner_300x250_arriba);?>
							<!-- / ADSERVER-->
							</li>
						</ul>

						<!-- MAXIMA  -->
						<ul class="sidebar_300 popular-posts">
								<?php include(TEMPLATEPATH ."/maxima/post.php"); ?>		
						</ul>
						<!-- /-->

						<!-- POST THE TREND  -->
						<ul class="sidebar_300 popular-posts">
								<?php include(TEMPLATEPATH ."/post_thetrend.php"); ?>		
						</ul>
						<!-- /-->
						
<!-- SLIDER BANNERS -->
						<?if(is_home()){?>
							
							<ul class="sidebar_300" style="height:335px;">

								<!-- Slider -->
								<div id="slides">
									<div class="slides_container">
										<?
										function fecha (){
											$vect=getdate();
											$vect_dia=array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
											return $vect_dia[$vect[wday]];
										}

										$dia_semana= fecha();
										$hoy_fecha=date("Y-m-d");

										$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');

										$sqlstr="SELECT *
										FROM abmBanners
										WHERE id_feed=".$var_con[0]." AND activo=1 AND newdesign=1 AND ( (CURDATE()>=dia AND CURDATE()<=dia_fin AND dia!='0000-00-00' AND dia_fin!='0000-00-00') OR ".$dia_semana."=1) ORDER by fecha DESC";

										$testRows = $mydb->get_results($sqlstr);
										foreach ($testRows as $row) {
											
											$id_banner =$row->id;
											$id_feed =	$row->id_feed;
											$link	=	$row->link;
											$texto	=	utf8_decode($row->texto);
											$target	=	$row->target;

											if($link=="") $link="#";
											if(substr($link , 0, 30)=="http://www.eonlineexperiences.") $var_on='onclick="_gaq.push(["b._link", "'.$link.'"]); return false;"'; // abcdef
											
											?>
											<div class="slide">
												<?if($link!="#"){?><a href="<?=$link?>" target="<?=$target?>" title="<?=$texto?>" alt="<?=$texto?>" <?php echo $var_on;?>><?}?>
													<img src="http://la.eonline.com/admin2012/banners/uploads/<?=$id_banner?>.jpg" alt="<?=$texto?>" width="300">
												<?if($link!="#"){?></a><?}?>
												<div class="captionslider" style="bottom:0">
													<p><?=$texto?></p>
												</div>
											</div>
											<?

										}
										?>
						            </div>
						            <a href="#" class="prev"><img src="http://la.eonline.com/admin2012/banners/images/prev2.png" alt="Arrow Prev"></a>
									<a href="#" class="next"><img src="http://la.eonline.com/admin2012/banners/images/next2.png" alt="Arrow Next"></a>
								</div>
								
							</ul>
							<!-- / slider -->
						
						<?}?>
						<!-- /-->

						


						<!-- BRIGHTCOVE -->
						<ul class="sidebar_300" >
								<?php include(TEMPLATEPATH ."/videos.php"); ?>		
						</ul>
						<!-- /-->


						<!-- SI ES HOME O CATEGORIA FASHIONBLOGGER -->
						<?php
						if(is_home() || is_category("efashionblogger")){?>
							<h3><a href="<?php bloginfo('url')?>/category/efashionblogger" class="widget-title" style="color:#4E5756">FOTOS <span style="color:#C7177A;">E! FASHION BLOGGER</span></a></h3>
							<ul id="slider_cycle" class="sidebar_300" style="height:480px;">
							<li>
								<ul style="height:auto;display:block;">
											
											
													<? 
													$gallery="7538";

													global $wpdb;
													$wpdb->show_errors();

													//$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.alttext, np.filename FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=" . $gallery . " ORDER by np.pid DESC LIMIT 0,40",ARRAY_A);
													$sqlstr="SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=$gallery UNION SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=$gallery AND pg.pid=np.pid;";
												                                                                        //echo($sqlstr);
	              $galleries = $wpdb->get_results($sqlstr, ARRAY_A);	

													foreach($galleries as $image)
													{?>
															
															<?
															$vecUrl=explode("http://",$image["filename"]);

															if($vecUrl[1]=="")
															{
																	$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
															}else{
																	$urlImg="http://".$vecUrl[1];
															}
															if($image["alttext"]!=""){
																$img_des=$image["alttext"];	
															}elseif($image["description"]!=""){
																$img_des=$image["description"];
															}else{
																$img_des="Foto E! fashion blogger";
															}
															?>
															<li><img src="<?=$urlImg;?>" alt="<?=$img_des?>" width="300" /></li>
																
													<?}?>
													 
	
									</ul>
									<!-- / slider -->

							</li>
							</ul>
						<?
						}?>
						<!-- /-->


						<div style="float:left; width:300px; height:10px; display:block;"></div>
						
						<!-- WIDGETS -->
						<?php if(($cat_alf2!=1 || $cat_alf!=1) && !is_single() && !is_search()):?>

							
							<ul class="sidebar_300" id="wid">
							<?php
								if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

										<li id="search" class="widget-container widget_search">
											<?php //get_search_form(); ?>
										</li>

										<li id="archives" class="widget-container">
											<h3 class="widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h3>
											<ul>
												<?php wp_get_archives( 'type=monthly' ); ?>
											</ul>
										</li>


										<li id="meta" class="widget-container">
											<h3 class="widget-title"><?php _e( 'Meta', 'twentyten' ); ?></h3>
											<ul>
												<?php wp_register(); ?>
												<li><?php wp_loginout(); ?></li>
												<?php wp_meta(); ?>
											</ul>
										</li>

								<?php endif; // end primary widget area ?>
							</ul>

						<?php endif; // end primary widget area ?>

						<!-- ADSERVER 300X250 ABAKO-->
						<?php if(!is_home()){?>
						<div class="zona_banner">
							<?if($zona_banner_300x250_abajo!="")  echo($zona_banner_300x250_abajo);?>
						</div>
						<?}?>

						<?if(is_home()):?>
							<ul class="sidebar_300">
							<li>
								 <div class="widget_twitter"></div>
								 <div class="widget_twitter_api">
									 <?php include ('http://la.eonline.com/varios/twitter/twitter2013.php'); ?>
								 </div>
							</li>
							</ul>
						<?php endif; // end primary widget area ?>


		<div class="vacio"></div>
		</div>

		</div>