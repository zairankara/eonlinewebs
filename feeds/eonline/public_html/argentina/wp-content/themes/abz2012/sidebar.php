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
if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )  ||  is_category( "baftaawards" )  ||  is_category( "efashionblogger" )  ||  is_category( "latinbillboard" )) $cat_alf2=1;
?>

		<div id="primary" class="widget-area" role="complementary">
		<div class="cont_sidebar">


						
						<?if(is_category("musica")):?>
						  <iframe style="margin-bottom:10px;" width="300" height="400" src="//www.youtube.com/embed/videoseries?list=PLgYgM3DDFAuieXd1H16xha5Cvf4_Fcg5X" frameborder="0" allowfullscreen></iframe>
						<?php endif; ?>

						<!-- LIVETWEETING RC-->
							<?if($cat_alf2==1 && !is_category( "efashionblogger" )){?>
								<div style="margin-bottom:10px;">
									<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/twitterRC.php'); ?>
								</div>
							<?}?>
						<!-- LIVETWEETING RC-->

						

						<!-- modulo the Royals-->
							<?if(is_category("the-royals")):?>
								<?php include($_SERVER["DOCUMENT_ROOT"]."/varios/the_royals/sidebar.php"); ?>	
							<?php endif; // end primary widget area ?>
						<!-- modulo the Royals-->


						
						<?php if(is_single()){?>
							<?php //echo que_cat_es("nota","300","250",NULL);?>
						<?}?>
						
						<!-- LIVETWEETING-->
							<script>
							$(document).on("ready", function(){
								var ch = window.sessionStorage.getItem("ch");
								if(ch==1){
									$( "#LT" ).html( '<a class="twitter-timeline" href="https://twitter.com/hashtag/AlfombraRojaE" data-widget-id="438338743779336192">Tweets sobre #AlfombraRojaE</a>' );
									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
									$( "#LT" ).show();
									window.sessionStorage.removeItem("ch");
								}
							})
							</script>

							<div style="width:290px; height:455px;border:5px solid #000;margin-bottom:10px;display:none;" id="LT"></div>
						<!-- / LIVETWEETING-->

						<!-- LIVETWEETING LIVE FROM E-->
							<script>
							$(document).on("ready", function(){
								var chliveFromE = window.sessionStorage.getItem("chliveFromE");
								if(chliveFromE==1){
									$( "#LTlivefromE" ).html( '<a class="twitter-timeline" href="https://twitter.com/hashtag/LiveFromELatino" data-widget-id="586545866766422017">Tweets sobre #LiveFromELatino</a>' );
									!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
									$( "#LTlivefromE" ).show();
									window.sessionStorage.removeItem("chliveFromE");
								}
							})
							</script>

							<div style="width:290px; height:455px;border:5px solid #000;margin-bottom:10px;display:none;" id="LTlivefromE"></div>
						<!-- / LIVETWEETING LIVE FROM E-->

						<!-- Banner DoubleBox -->
						<? echo que_doublebox_es();?>
						<!-- / Banner DoubleBox -->
						
						
						<!-- MODULO FOTOS MUNDIAL  -->
						<?if(is_category("copadelmundo")):?>
						<!--<iframe src="/varios/countdownMundial/countdown.php?rnd<?=rand(0,1000)?>" width="300" height="120"></iframe>
						<h3><a href="#" class="widget-title">PARTIDOS DE HOY</a></h3>
						<iframe src="/experience/loamoloodioMundial/proximos_partidos.php?rnd<?=rand(0,1000)?>" id="partidos" width="300" height="300"></iframe>-->
						<ul class="sidebar_300">
							<li>
							<?include("/home/eonline/public_html/".$name_feed."/wp-content/themes/abz2012/galerias_destacadas_copa.php");?>
							</li>
						</ul>
						<ul class="sidebar_300" >
							<li>
								<a class="twitter-timeline" href="https://twitter.com/EonlineLatino/lists/mundial-2014" data-widget-id="473517463334711296">Tweets de https://twitter.com/EonlineLatino/lists/mundial-2014</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</li>
						</ul>
						<?php endif; ?>


						<?if(is_category("amamos-las-pelis")):?>
						
						<ul class="sidebar_300" style="margin-bottom:10px;">
							<li>
							<?include("/home/eonline/public_html/".$name_feed."/wp-content/themes/abz2012/amamos_las_pelis_side.php");?>
							</li>
						</ul>
						
						<?php endif; ?>

						
						<!-- ENCUESTA BABY KIM -->
						<!--<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>-->
						   <!-- <ul>
						        <li><?php get_poll(123);?></li>
						    </ul>
						<?php endif; ?>-->
						<!-- / ENCUESTA BABY KIM -->

						<!-- BANNER ARRIBA -->
						<ul class="sidebar_300">
							<li>
							<!-- ADSERVER 300X250 ARRIBA-->
							<? echo quien_es("300","250","1");?>
							<!-- / ADSERVER-->
							</li>
						</ul>

						<!-- MAXIMA  -->
						<!--<ul class="sidebar_300 popular-posts">
								<?php include(TEMPLATEPATH ."/maxima/post.php"); ?>		
						</ul>-->
						<!-- /-->

						<!-- MEME DEL DIA -->
						<!-- <?php include(TEMPLATEPATH ."/foto_del_dia_lol.php"); ?>-->
						<!-- / MEME DEL DIA -->

						<!-- FOTO DEL DIA AMAMOS-->
						<?php include(TEMPLATEPATH ."/foto_del_dia_amamos.php"); ?>
						<!-- / FOTO DEL DIA AMAMOS-->
						
						<!-- SLIDER BANNERS -->
						<?if(is_home()){?>
							
							<div id="modulo_imagenes_slider">

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
													<img src="http://la.eonline.com/admin2012/banners/uploads/<?=$id_banner?>.jpg" title="<?=$texto?>" alt="<?=$texto?>" width="300" height="338">
												<?if($link!="#"){?></a><?}?>
												<div class="captionslider" style="bottom:0">
													<p><?=$texto?></p>
												</div>
											</div>
											<?

										}
										?>
						            </div>
						            <a href="#" class="prev"><img src="http://la.eonline.com/admin2012/banners/images/prev2.png" width="24" height="24" alt="Arrow Prev"></a>
									<a href="#" class="next"><img src="http://la.eonline.com/admin2012/banners/images/next2.png" width="24" height="24" alt="Arrow Next"></a>
								</div>
								
							</div>
							<!-- / slider -->
						
						<?}?>
						<!-- /-->

						


						<!-- BRIGHTCOVE -->
						<div id="modulo_videos_arriba">
								<?php include(TEMPLATEPATH ."/videos.php"); ?>		
						</div>
						<!-- /-->


						<!-- SI ES HOME O CATEGORIA FASHIONBLOGGER -->
						<?php
						if(is_home() || is_category("efashionblogger")){?>
							<? include($_SERVER["DOCUMENT_ROOT"].'/varios/EFB/index.php');?>
						<?}?>
						<!-- /-->

						<!-- MODULO TWITTER FELIZ CUMPLE JOAN  -->
						<!--<?if(is_home()):?>
							 <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/felizcumplejoan.php'); ?>
						<?php endif; ?>-->
						<!-- /-->


						<!-- MODULO TWITTER EFASHIONBLOGGER  -->
						<?if(is_category("efashionblogger")):?>
							<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/twitter/efashionblogger.php'); ?>
						<?php endif; ?>
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
						<ul class="sidebar_300" style="float: left;">
							<li>
								<?php if(!is_home()){?>
									<? echo quien_es("300","250","2");?>
								<?}?>
							</li>
						</ul>

						<!-- Banner 300x100 -->
						<? echo que_300x100_es();?>
						<!-- / Banner 300x100 -->

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
