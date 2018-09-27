<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>
<?php
get_header(); 
?>

		<div id="container">
			<div id="content" role="main">
				<div class="cont_blanco">

					<!-- LIVESTREAMING-->
					<?php $postSlug="Nota"; ?>
					<script language="javascript" type="text/javascript" data-device="1" id="script_live">
						var var_feed = <?=$var_con[0];?>;
						var testliveS = '<?=$_GET["testliveS"];?>';
						var testliveE = '<?=$_GET["testliveE"];?>';
						if(isMobile()) {var varMobile = 1;}else{var varMobile = 0;}

						$.ajax({
						   type: "GET",
						   url: "/common/lives.php",
						   data: "var_feed="+var_feed+"&testlive="+testliveS+"&varMobile="+varMobile+"&Slug=<?=$postSlug?>",
						   cache: true,
						   success: function(respuesta) {
						      $("#lives").html(respuesta);
						   }
						});

						$.ajax({
						   type: "GET",
						   url: "/common/liveFromE.php",
						   data: "var_feed="+var_feed+"&testlive="+testliveE+"&varMobile="+varMobile+"&Slug=<?=$postSlug?>",
						   cache: true,
						   success: function(respuesta) {
						      $("#liveFromE").html(respuesta);
						   }
						});
					</script>
					<div id="lives"></div>
					<div id="liveFromE"></div>
					<!-- LIVESTREAMING-->
				
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
									<?php setPostViews(get_the_ID()); ?>
									<div id="post-<?php the_ID(); ?>" class="hentry_gr">
										<!-- CATEGORIA / SECCION -->
												<?php 
												$categorias_name="";
												$es_wakeup=0;
												foreach((get_the_category()) as $category) {
										    		 $name_cat2=$category->slug;
										    		 if($name_cat2=="wakeup") {$es_wakeup=1;}else{}
										    		 $categorias_name.=$category->cat_name.", ";
												}
												if(trim(substr($categorias_name, -1))==", "){
										    		$categorias_name=trim(substr($categorias_name, 0, -1));
										    	}
												?>

												<style type="text/css">
												.hentry_gr h2 span,
												.hentry_gr h2 span a{
													color: <?php echo cat_color($name_cat2);?> !important;
												}
												.hentry_gr h1, .hentry_gr h2 {
													display: inline;
												}
												</style>

												<?
												// IMG POST
												$Html_post = get_the_content();
 											    /*$extrae = '/<img (.+?)>/';
    											$extrae22 = '/<img .*src=["\']([^ ^"^\']*)["\']/';

												preg_match_all($extrae22, $Html_post, $matches22);
												$image22 = $matches22[1][0];*/
												preg_match("/<img\s+.*?src=[\"\']?([^\"\' >]*)[\"\']?[^>]*>/i",$Html_post,$m);
												$image22 = $m[1];
												//if($_GET["web"]==1) echo ".".$image22;
												?>
										
										<h2 class="entry-title_sing" style=""><span><?php echo $categorias_name; ?> / </span></h2>
										<h1 class="entry-title_sing"><?php the_title(); ?></h1>

										<div class="entry-meta">
											<?php twentyten_posted_on(); ?>
										</div><!-- .entry-meta -->
										<?php /*if($post->ID=="717703"){?>
										<p>
											
											<script data-device="1">
											var aDlneOpt = {
											    adUnit: 'https://pubads.g.doubleclick.net/gampad/ads?sz=300x250|640x480&iu=/8877/Mexico/Adrenaline&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]&vpos=preroll'
											    //video: ''
											}, aDlneProt;
											aDlneProt = document.location.protocol;
											(aDlneProt == 'https:') ? aDlneProt = 'https:' : aDlneProt = 'http:';
											document.write('<scr' + 'ipt id="adlneF1Scr" src="' + aDlneProt + '//adrenalinecdn.com/nbcUniversal/creatives/breaking_ad/aDlne.js"></scr' + 'ipt>');
											</script>

										</p>
										<?}*/?>


										<!-- BANNER ADPOST-->
										<?
										$texto="";
										$texto = get_post_meta($post->ID, 'adpost', true);
										if ($texto) {?>
											<div style="width:600px;height:30px; border-top:1px solid #ddd; "><div style="float:left;width:310px; height:30px; display:block;"><?=$texto?></div></div>
								 		<?}?>
								 		<!-- / BANNER ADPOST-->
								 		<!-- BANNER ADPOST-->
								 		<!--<div id='div-gpt-ad-home-310x30-<?=$post->ID?>' style="width:600px;height:30px; border-top:1px solid #ddd;" class='hideMobify'>
											<div style="float:left;width:310px; height:30px; display:block;">
												<script type='text/javascript'>
												googletag.display('div-gpt-ad-home-310x30-<?=$post->ID?>');
												</script>
											</div>
										</div>-->
								 		<!-- / BANNER ADPOST-->


										<div class="entry-social">
											<div class="addthis_native_toolbox"></div>
											
											<!-- AddThis Button BEGIN
											<div class="addthis_toolbox addthis_default_style ">
											<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
											<a class="addthis_button_tweet"></a>
											<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink());?>&media=<?php echo urlencode($image22);?>&description=<?php urlencode(the_title()); ?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter" addthis:url="<?php echo wp_get_shortlink();?>" addthis:title="E! Online Argentina. <?php single_post_title('');?>"></a>
											<a class="addthis_button_email"></a>
											</div> -->
										</div><!-- .entry-meta -->


										<div class="entry-content entry-content_sing">
											<?php 
												$Html_post = get_the_content();
												$Html_post2 = apply_filters('the_content', $Html_post);
												
												echo(nggScrollGalleryReplace($Html_post2));
												?>

											<?php //the_content(); ?>

											<!-- ARTICULOS RELACIONADOS -->
											<?php include (TEMPLATEPATH . '/related-post.php'); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>

											
											<!-- TAG PARA NOTA Nike START-->
											<?php if(is_single("741356")) :?>
												<script data-device="1" id="navegg" type="text/javascript" src="//tag.navdmp.com/tm38318.js"></script>
											<?php endif;?>
											<!-- / TAG PARA NOTA Nike TAG END-->


											<!-- ADRENALINE TAG START-->
											<?php if(is_single("647397")) :?>
													<script>
											            var aDlneOpt = {
											                adUnit: 'https://pubads.g.doubleclick.net/gampad/ads?sz=300x250|640x480&iu=/8877/Dev/Adrenaline&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]&vpos=preroll'
											            },aDlneProt;
											            aDlneProt = document.location.protocol;
											            (aDlneProt == 'https:') ? aDlneProt = 'https:' : aDlneProt = 'http:';
											            document.write('<scr' + 'ipt src="' + aDlneProt + '//adrenalinecdn.com/nbcUniversal/creatives/breaking_ad/aDlne.js"></scr' + 'ipt>');
											        </script>
									   		<?php else:?>
										   			<script data-device="1">
													if(isMobile()){
														window.onload = function () {
														    'use strict';
														    $(window).on('swipe', function(){
														        console.log('Secondary swipe registered'); 
														    });
														    $(window).on('touchstart', function(){
														        console.log('Touchstart registered');
														    });
														};
													}
										            var aDlneOpt = {
										                adUnit: 'https://pubads.g.doubleclick.net/gampad/ads?sz=300x250|640x480&iu=/8877/Mexico/Adrenaline&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]&vpos=preroll&cust_params=postid%3D<?php echo(get_the_ID())?>'
										            },aDlneProt;
										            aDlneProt = document.location.protocol;
										            (aDlneProt == 'https:') ? aDlneProt = 'https:' : aDlneProt = 'http:';
										            document.write('<scr' + 'ipt src="' + aDlneProt + '//adrenalinecdn.com/nbcUniversal/creatives/breaking_ad/aDlne.js"></scr' + 'ipt>');
										       		</script>
									        <?php endif;?>
									        <!-- / ADRENALINE TAG START-->


										</div><!-- .entry-content -->

										<div class="entry-social" style="float:left; width:600px; border-bottom:none;">
											
											<!-- AddThis Button BEGIN -->
											<div class="addthis_native_toolbox"></div>
											<!--<div class="addthis_toolbox addthis_default_style" s>
											<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
											<a class="addthis_button_tweet"></a>
											<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink());?>&media=<?php echo urlencode($image22);?>&description=<?php urlencode(the_title()); ?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter" addthis:url="<?php echo wp_get_shortlink();?>" addthis:title="E! Online Argentina. <?php single_post_title('');?>"></a>
											<a class="addthis_button_email"></a>
											</div>
											<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"  data-device="1"></script>-->
										</div><!-- .entry-meta -->
			

									</div><!-- #post-## -->

									<div id="nav-below" class="navigation" style="margin-bottom:30px;">
										<div class="nav-next"><?php next_post_link( '%link', ' &laquo; Nota Anterior <span class="meta-nav"> ' . _x( '', 'Proxima entrada link', 'twentyten' ) . '</span>' ); ?></div>
										<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Entrada anterior link', 'twentyten' ) . '</span> Pr&oacute;xima nota &raquo;' ); ?></div>
									</div><!-- #nav-below -->

											
									<div id="nav-above_floating" class="navigation_single">
									<?php
									$previous_post = get_previous_posts_link();
									$next_post = get_next_posts_link();

									$next_post_link_url = get_permalink( get_adjacent_post(false,'',false)->ID ); 
									$prev_post_link_url = get_permalink( get_adjacent_post(false,'',true)->ID );
									?>
									<?php if ($prev_post_link_url !="" && $prev_post_link_url!=get_permalink()): // if there are older articles ?>
										<div class="nav-previous"><a href="<?php echo $prev_post_link_url;?>" class="boton"></a><div class="text_oculto"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div></div>
									<?php endif; ?>
									<?php if ($next_post_link_url !="" && $next_post_link_url!=get_permalink()): // if there are newer articles ?>
										<div class="nav-next"><a href="<?php echo $next_post_link_url;?>" class="boton" ></a><div class="text_oculto"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div></div>
									<?php endif; ?>
									</div><!-- #nav-above -->

									
									<?php //comments_template( '', true ); ?>

									<div style="margin-bottom:30px;" id="faceComments">
										<div id="fb-root"></div>
										<script data-device="1">(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.async = true;
										  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&status=0&version=v2.4";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<fb:comments href="<?php the_permalink() ?>" data-href="<?php the_permalink() ?>" data-numposts="5" width="100%"></fb:comments >
									</div><!-- #FACEBOOK COMMENT -->

									<!-- Espacio blanco -->
									<div style="width:500px; height:50px;"></div>
								
					<?php endwhile; // end of the loop. ?>


				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<!-- #SIDEBARS -->
<? if ($es_wakeup==1) {?>
		<?php include (TEMPLATEPATH . '/wakeup/sidebar.php'); ?>
<?}else{?>
		<?php get_sidebar(); ?>
<?}?>
<?php get_footer(); ?>
