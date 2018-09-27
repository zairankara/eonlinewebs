<?php
include(TEMPLATEPATH."/var_constantes.php");
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

if ( in_category( "tapetevermelho" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" )  ||  in_category( "efashionblogger" )  ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "tapetevermelho" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" )  ||  is_category( "efashionblogger" )  ||  is_category( "latinbillboard" )) $cat_alf2=1;
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">

						
						<!-- modulo the Royals-->
							<?if(is_category("the-royals")):?>
								<?php include($_SERVER["DOCUMENT_ROOT"]."/varios/the_royals/sidebar.php"); ?>	
							<?php endif; // end primary widget area ?>
						<!-- modulo the Royals-->

						<?if(is_category("musica")):?>
						  <iframe style="margin-bottom:10px;" width="300" height="400" src="//www.youtube.com/embed/videoseries?list=PL2yltlRjDVVFYTk3s-D_hnLqdKLzZMV7W" frameborder="0" allowfullscreen></iframe>
						<?php endif; ?>

						<!-- LIVETWEETING-->
							<?if(is_home() && $_SESSION["liveT"]=="ch"){?>
								<div style="width:290px; height:440px;border:5px solid #000;margin-bottom:10px;">
									<?include("/home/eonlinebr/public_html/experience/redcarpetseason/oscar2014/timeline.php");?>
								</div>
							<?}?>
						<!-- / LIVETWEETING-->

							<!-- LIVETWEETING-->
							<script>
							$(document).on("ready", function(){
								var ch = window.sessionStorage.getItem("ch");
								if(ch==1){
									$( "#LT" ).html( '<a class="twitter-timeline" href="https://twitter.com/search?q=%23TapeteVermelhoE%21" data-widget-id="694953749207474182">Tweets sobre "#TapeteVermelhoE!"</a>' );

									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
									$( "#LT" ).show();
									window.sessionStorage.removeItem("ch");
								}
							})
							</script>

							<div style="width:290px; height:455px;border:5px solid #000;margin-bottom:10px;display:none;" id="LT"></div>
						<!-- / LIVETWEETING-->

						<!-- LIVETWEETING RC-->
							<?if($cat_alf2==1 && !is_category( "efashionblogger" )){?>
								<div style="margin-bottom:10px;">
									<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/twitterRC.php'); ?>
								</div>
							<?}?>
						<!-- LIVETWEETING RC-->

						<!-- Banner DoubleBox -->
						<? echo que_doublebox_es();?>
						<!-- / Banner DoubleBox -->

						<!-- MODULO FOTOS MUNDIAL  -->
						<?if(is_category("copa-do-mundo")):?>
						<!--<iframe src="/varios/countdownMundial/countdown.php?rnd<?=rand(0,1000)?>" width="300" height="140"></iframe>
						<h3><a href="#" class="widget-title">JOGOS DE HOJE</a></h3>
						<iframe src="/experience/loamoloodioMundial/proximos_partidos.php?rnd<?=rand(0,1000)?>" width="300" height="220"></iframe>-->
						<ul class="sidebar_300">
							<li>
							<?include("/home/eonlinebr/public_html/wp-content/themes/abz2012_br/galerias_destacadas_copa.php");?>
							</li>
						</ul>
						<?php endif; ?>
						<!-- /-->

						<?if(is_category("amamos-cinema")):?>
					
						<ul class="sidebar_300" style="margin-bottom:10px;">
							<li>
							<?include("/home/eonlinebr/public_html/wp-content/themes/abz2012_br/amamos_las_pelis_side.php");?>
							</li>
						</ul>
					
						<?php endif; ?>


						<!-- ENCUESTA -->
						<!--<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
						 <h3> <img src="<?php echo esc_url( get_template_directory_uri() )?>/images/bebe_kate_br.jpg" ></h3>
							 <ul>
					            <li><?php get_poll(73);?></li>
					        </ul>
						<?php endif; ?>-->
						<!-- / ENCUESTA  -->
						
						<!-- MEME DEL DIA -->
						<?php include(TEMPLATEPATH ."/foto_del_dia_lol.php"); ?>
						<!-- / MEME DEL DIA -->

						<!-- FOTO DEL DIA AMAMOS-->
						<?php include(TEMPLATEPATH ."/foto_del_dia_amamos.php"); ?>
						<!-- / FOTO DEL DIA AMAMOS-->

						<!-- SLIDER BANNERS -->
						<?if(is_home()){?>

							<?php include(TEMPLATEPATH ."/foto_del_dia.php"); ?>
							
							<ul class="sidebar_300" style="height:335px;" id="modulo_imagenes_slider">

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
										WHERE id_feed=".$var_con[0]." AND activo=1 AND newdesign=1 AND (  (CURDATE()>=dia AND CURDATE()<=dia_fin AND dia!='0000-00-00' AND dia_fin!='0000-00-00') OR ".$dia_semana."=1) ORDER by fecha DESC";

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
													<img src="http://la.eonline.com/admin2012/banners/uploads/<?=$id_banner?>.jpg" title="<?=$texto?>" alt="<?=$texto?>" width="300">
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
						
						
						<!-- notas relacionadas -->
						<?php if(is_single()){
							include (TEMPLATEPATH . '/related-post-single.php');
						}?>
						<!-- /-->

						<!-- BANNER 300x100 -->
							<ul class="sidebar_300">
								<li>
								<? 
						        echo quien_es("300","100",NULL);
						        ?>
								</li>
							</ul>
						<!-- BANNER 300x100 -->


						<!-- SI ES  parabens-joan -->
						<?php
						if(!is_page("parabens-joan")){?>
							
							<!-- BANNER ARRIBA -->
							<ul class="sidebar_300">
								<li>
								<!-- BATANGA O DFP 300X250 ARRIBA -->
								<? 
						        //$data=que_batanga_es("300x250");
						        //if($data==""){echo quien_es("300","250","1");}else{echo $data;}
						        echo quien_es("300","250","1");
						        ?>
						        <!-- / BATANGA O DFP 300X250 ARRIBA -->
								</li>
							</ul>

							<!-- MODULO TWITTER NOIVAS  -->
							<?if(is_category("noivas")):?>
								 <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/twitterNoivas.php'); ?>
							<?php endif; ?>

							<!-- BRIGHTCOVE -->
							<div id="modulo_videos_arriba">
									<?php include(TEMPLATEPATH ."/videos.php"); ?>		
							</div>
							<!-- /-->

							<!-- SI ES HOME O CATEGORIA FASHIONBLOGGER -->
							<?php
							if(is_home()){?>
								<? include($_SERVER["DOCUMENT_ROOT"].'/varios/EFB/index.php');?>
							<?}?>
							<!-- /-->


							<!-- The Trend -->
							<ul class="sidebar_300" >
								<?php include(TEMPLATEPATH ."/post_thetrend.php"); ?>	
							</ul>
							<!-- /-->

							<!-- MODULO TWITTER EFASHIONBLOGGER  -->
							<?if(is_category("efashionblogger")):?>
								 <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/efashionblogger.php'); ?>
							<?php endif; ?>
							<!-- /-->

		
							
						<?}else{?>
							
							<? include (TEMPLATEPATH . '/related-post-single.php');?>

							<ul class="sidebar_300" >
								<li>
									<!-- Start of Brightcove Player -->
									<div style="display:none"></div>
									<object id="myExperience" class="BrightcoveExperience">
									  <param name="bgcolor" value="#FFFFFF" />
									  <param name="width" value="300" />
									  <param name="height" value="340" />
									  <param name="playerID" value="2405412294001" />
									  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWMeEF6aH3zXROYRFMOwOnZa" />
									  <param name="isVid" value="true" />
									  <param name="isUI" value="true" />
									  <param name="dynamicStreaming" value="true" />
									  <param name="wmode" value="opaque" />
									</object>
									<script type="text/javascript">brightcove.createExperiences();</script>
									<!-- End of Brightcove Player -->
								</li>
							</ul>

							<h3><a href="#" class="widget-title" style="color:#4E5756">GALERIA <span style="color:#C7177A;">ESPECIAL JOAN RIVERS</span></a></h3>
							<ul id="slider_cycle" class="sidebar_300" style="height:450px;overflow:hidden;">
							<li>
								<ul style="height:auto;display:block;">
											
													<? 
													$gallery="8955";

													global $wpdb;
													//$wpdb->show_errors();

													//$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.alttext, np.filename FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=" . $gallery . " LIMIT 0,30",ARRAY_A);
													
													//$sqlstr="SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=$gallery UNION SELECT ng.path, np.alttext, np.description, np.filename FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=$gallery AND pg.pid=np.pid LIMIT 0,30;";
													//$galleries = $wpdb->get_results($sqlstr, ARRAY_A);

													$galleries = obtener_galerias($gallery, "30", "pg.orden", "ASC", NULL);		


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
															<li><img src="<?=$urlImg;?>" alt="<?=$img_des?>" title="<?=$img_des?>" width="300" /></li> 
																
													<?}?>
													 
	
									</ul>
									<!-- / slider -->

							</li>
							</ul>

							<ul class="sidebar_300" >
								
								<li><img src="<?php echo esc_url( get_template_directory_uri() )?>/images/recado.jpg" alt="recado" title="recado"></li>
								<li>
									<a class="twitter-timeline" href="https://twitter.com/search?q=%23parab%C3%A9nsjoan" data-widget-id="339021561317179392">Tweets sobre "#parabénsjoan"</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</li>
							</ul>
							<ul class="sidebar_300" >
								<li>
									<div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script> 
									<fb:comments href="http://br.eonline.com/parabens-joan/" width="300"></fb:comments >
								</li>
							</ul>
						<?}?>
						

						<?php if(!is_home()){?>
							<!-- ADSERVER 300X250 ABAKO-->
							<ul class="sidebar_300" style="float: left;">
								<li>
									
										<!-- BATANGA O DFP 300X250 ABAKO -->
										<? 
								        //$data=que_batanga_es("300x250");
								        //if($data==""){echo quien_es("300","250","2");}else{echo $data;}
								        echo quien_es("300","250","2");
								        ?>
								        <!-- / BATANGA O DFP 300X250 ABAKO -->
								</li>
							</ul>
							<div style="float:left; width:300px; height:10px; display:block;"></div>
						<?}?>

						
						<!-- WIDGETS -->
						<?php if(($cat_alf2!=1 || $cat_alf!=1) && !is_search() && !is_page("parabens-joan") ):?>

							
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

						

						<?if(is_home()):?>

							<ul class="sidebar_300">
							<li>
								 <div class="widget_twitter"></div>
								 <div class="widget_twitter_api">
									 <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/twitter2013.php'); ?>
								 </div>
							</li>
							</ul>
						<?php endif; // end primary widget area ?>

					
		<div class="vacio"></div>
		</div>

		</div>
