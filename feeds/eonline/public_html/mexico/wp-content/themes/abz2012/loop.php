<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>


		<?php if ( ! have_posts() ) : ?>
			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'No se ha encontrado ningún resultado', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Disculpe, pero no hay resultados para el contenido que está solicitando.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
		<?php endif; ?>

		<!-- LIVESTREAMING-->
		<?if(is_home()){
			$postSlug="home";
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
		}
		?>
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

		<?php 
		if( is_home() || is_front_page()){?>
				
				<!-- VIDEOS IN HOME-->
					<script language="javascript" type="text/javascript" data-device="1" id="script_videos_inhome">
						var name_feed = "<?=ucwords($name_feed);?>";
						var playlist = "<?=$playlist_HM;?>";

						$.ajax({
						   type: "GET",
						   url: "/common/videos_inhome/videos_inhome.php",
						   data: "name_feed="+name_feed+"&playlist="+playlist+"",
						   cache: true,
						   success: function(respuesta) {
						      $("#videos_inhome").html(respuesta);
						   }
						});
					</script>

					<div id="videos_inhome"></div>
				<!-- / VIDEOS IN HOME-->

				<!-- counter chicaE 635X100-->
				<!-- <div class='hideMobify' style="display: block;float: left;text-align: center;margin-left: 15px;">
					<iframe src="http://la.eonline.com/varios/countdown/ChicaE.php" width="635" height="110" scrolling="no" style="overflow: hidden; border: none;"></iframe>
				</div> -->			
				<!-- /counter chicaE 635X100--->


				<!-- ADSERVER TOP POST 630X50-->
				<div id='div-gpt-ad-home-630x50' class='zona_banner_toppost hideMobify' ><? echo que_cat_es("home","630","50",NULL);?></div>			
				<!-- ADSERVER TOP POST 630X50-->
				
				<ul class="grid effect-5" id="grid">
				<?
				//EXTRAER IMPERDIBLE
				$imperdible = get_category_by_slug('imperdible');
				$IDimperdible=$imperdible->term_id;

				//EXTRAER the trends
				$thetrends = get_category_by_slug('thetrend');
				$IDthetrends=$thetrends->term_id;
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$do_not_duplicate = array(); // set befor loop variable as array
					$anchofoto=310;
					$i=1;
					query_posts("cat=-$IDimperdible,-$IDfoto_del_dia,-$IDthetrends&paged=$paged");
						if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if ( !in_array( $post->ID, $do_not_duplicate ) ) :?>
								<?php if( !is_sticky() ):?>
									<?php $do_not_duplicate[] = $post->ID; ?>
	
									<?php echo("<li>");include (TEMPLATEPATH . '/post.php'); echo("</li>");?>
									<?php if($i==1) {echo("<li>");include (TEMPLATEPATH . '/post_destacados.php');echo("</li>");}?>
									<?php if($i==1) {echo("<li>");include (TEMPLATEPATH . '/galerias_destacadas.php');echo("</li>");}?>
									<?php if($i==6) {echo("<li style='z-index:10000;'>");echo quien_es("300","250","2");echo("</li>");}?>
									<?php if($i==12) {echo("<li>");include (TEMPLATEPATH . '/masvistos.php');echo("</li>");}?>
									<?php $i++;?>
								<?php endif; ?>
							<?php endif; ?>



						<?php endwhile; endif;// End the loop. Whew. ?>
					<?php wp_reset_query(); ?>
				</ul>


		<?php }elseif(is_category()){?>

					<!-- MODULO THE ROYALS-->
					<?if(is_category("the-royals")){?>

							<?php include ($_SERVER["DOCUMENT_ROOT"].'/varios/the_royals/index.php');?>
											
					<?}?>
					<!-- / MODULO THE ROYALS-->

					<?//if(is_category("wakeup")) include (TEMPLATEPATH . '/wakeup/lives.php');?>

					<!-- AD TOPPOST AMAMOS-->
					<?if(is_category("amamos-las-pelis")){?>
						<div class='zona_banner_toppost'><? echo quien_es("630","50",NULL);?></div>
					<?}?>
					<!-- / AD TOPPOST AMAMOS-->

					<!-- MODULO RED CARPET SEASON-->
					<?if(is_category("alfombraroja")){?>

							<?php include ($_SERVER["DOCUMENT_ROOT"].'/varios/el_veredicto/el_veredicto.php');?>
							<?php //include (TEMPLATEPATH . '/loamoloodio_RC.php');?>
						
					<?}?>
					<!-- / MODULO RED CARPET SEASON-->

					<!-- MODULO MUNDIAL-->
					<!--<?if(is_category("copadelmundo")){?>

						<?php include (TEMPLATEPATH . '/loamoloodio_CM.php');?>

					<?}?>-->
					<!-- / MODULO MUNDIAL-->


					<!-- MODULO Fashion Blogger-->
					<!--<?if(is_category("efashionblogger")){?>

						<?php include (TEMPLATEPATH . '/loamoloodio_EFB.php');?>
			
					<?
					}?>-->
					<!-- / MODULO Fashion Blogger-->

					<!-- MODULO CUIDATE-->
					<?if(is_category("cuidate-de-la-camara")){?>
						<style type="text/css">
							#video_cuidate, #host_cuidate{float: left; margin-left: 20px;}
							#host_cuidate a{float: left;}
						</style>
						<div id="video_cuidate"> 
							<!-- Start of Brightcove Player -->
							<div style="display:none"></div>
							<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
							<object id="myExperience" class="BrightcoveExperience">
							  <param name="bgcolor" value="#FFFFFF" />
							  <param name="width" value="610" />
							  <param name="height" value="500" />
							  <param name="playerID" value="4345724344001" />
							  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWORCr_WNc1Q2IyRpl6_eiu9" />
							  <param name="isVid" value="true" />
							  <param name="isUI" value="true" />
							  <param name="dynamicStreaming" value="true" />
							  <!-- smart player api params -->
							  <param name="includeAPI" value="true">
							  <param name="templateLoadHandler" value="myTemplateLoaded">
							  <param name="templateReadyHandler" value="onTemplateReady">
							</object>
							<script type="text/javascript">brightcove.createExperiences();</script>
						</div>
						<!-- End of Brightcove Player -->
						
						<?php include (TEMPLATEPATH . '/cuidatedelacamara/bios.php');?>
						

						<?php include (TEMPLATEPATH . '/loamoloodio_CUIDATE.php');?>
			
					<?
					}?>
					<!-- / MODULO Fashion Blogger-->



					
					<!-- MODULO Fashion Blogger American Express-->
					<?if(is_category("efashionblogger") && $_GET["abz"] == 1){?>
					
						<style>
						#nuevo_fashion{
							background-color: #000 !important;
							width: 630px;
							height: 730px;
							position: relative;
							float: left;
							margin-left: 20px;
						}
						.zona_banner_toppost{
							background: url(http://la.eonline.com/experience/fashion-blogger-mx/cab.jpg) bottom no-repeat;
							width: 630px;
							height: 47px;
							float: left;
							
						}
						</style>


						
						
						<div class='zona_banner_toppost'></div>

						<div id="nuevo_fashion">
							<iframe src="http://la.eonline.com/experience/fashion-blogger-mx/index.php" width="630" height="730" scrolling="no" style="overflow: hidden; border: none;"></iframe>
						</div>

						
					<?
					}?>
					<!-- / MODULO Fashion Blogger-->
					
					<?
					
					$cat = get_term_by('name', single_cat_title('',false), 'category'); 
					$postSlug=$cat->slug;
					$postID = get_category_by_slug($postSlug);
					$postID2=$postID->term_id;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$do_not_duplicate = array(); // set befor loop variable as array
					$anchofoto=310;


					if(is_category("alfombraroja")){
							$anchofoto=600;

							$sticky = get_option( 'sticky_posts' );
							$args = array(
								'cat' => $postID2,
								'post__in'  => $sticky,
							);
							$query = new WP_Query( $args );
							if ( isset($sticky[0]) ) {
								if ( $query->have_posts() ) : $query->the_post();
									echo("<div class='firstPost'>");include (TEMPLATEPATH . "/post.php");echo("</div>");
								endif;// End the loop. Whew.
								wp_reset_query(); 
							}

							$anchofoto=310;
							echo ('<ul class="grid effect-5" id="grid" style="display: -webkit-inline-box; display:-moz-inline-box; display:inline-box;">');
							$args2 = array(
								'cat' => $postID2,
								'post__not_in'  => $sticky,
								'paged' => $paged
							);
							$query2 = new WP_Query( $args2 );
								if ( $query2->have_posts() ) : while ( $query2->have_posts() ) :  $query2->the_post(); ?>
									<?php if ( !in_array( $post->ID, $do_not_duplicate ) ) :?>
										<?php $do_not_duplicate[] = $post->ID; ?>

										<?php echo("<li>");include (TEMPLATEPATH . '/post.php'); echo("</li>");?>

										<?php 
										if(is_category("alfombraroja") && $i==1) {echo("<li>"); include ($_SERVER["DOCUMENT_ROOT"].'/common/galerias_destacadas/galerias_destacadas_rc.php');echo("</li>");}

									endif; ?>

									<?php $i++;?>


								<?php endwhile; endif;// End the loop. Whew. ?>
							<?php wp_reset_query(); ?>
							</ul>
					<?}else{
							
							echo ('<ul class="grid effect-5" id="grid">');
					
							$i=1;
							query_posts("cat=-31174,".$postID2."&paged=$paged");
								if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
									<?php if ( !in_array( $post->ID, $do_not_duplicate ) ) :?>
										<?php $do_not_duplicate[] = $post->ID; ?>

										<?php echo("<li>");include (TEMPLATEPATH . '/post.php'); echo("</li>"); ?>

										<?php 
										if(is_category("the-kardashians") && $i==1) {echo("<li>");include ($_SERVER["DOCUMENT_ROOT"].'/common/galerias_destacadas/galerias_destacadas_kardashians.php');echo("</li>");}
										if((is_category("enews") || is_category("estrenos") || is_category("cine_by_dos_equis")) &&  $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas.php');echo("</li>");}
										if(is_category("thetrend") && $i==1) {echo("<li>"); include ($_SERVER["DOCUMENT_ROOT"].'/common/galerias_destacadas/galerias_destacadas_tt.php');echo("</li>");}
										if(is_category("efashionblogger") && $i==1) {echo("<li>"); include ($_SERVER["DOCUMENT_ROOT"].'/common/galerias_destacadas/galerias_destacadas_efb.php');echo("</li>");}
										if(is_category("efashionblogger") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/loamoloodio_EFB_ch.php');echo("</li>");}
										if(is_category("wakeup") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_wakeup.php');echo("</li>");}
										if(is_category("the-royals") && $i==1) {echo("<li>"); include ($_SERVER["DOCUMENT_ROOT"].'/common/galerias_destacadas/galerias_destacadas_the-royals.php');echo("</li>");}
										if(is_category("amamos-las-pelis") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_amamos.php');echo("</li>");}
										//if(is_category("cuidate-de-la-camara") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_cuidate-de-la-camara.php');echo("</li>");}

									endif; ?>

									<?php $i++;?>


								<?php endwhile; endif;// End the loop. Whew. ?>
							<?php wp_reset_query(); ?>
						</ul>
					<?}?>

		<?php }else{
			echo ("<div id='col_doble'>");
				$c = 0;
				$cz = 1; 
				$archive = 0;
				if(is_archive()) $archive=1;
				while (have_posts() && $cz < 18) : the_post();
					include (TEMPLATEPATH . '/post.php');
				$c++;
				$cz++; 
				endwhile; 
			echo ("</div>");
		}?>

		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-below" class="navigation">
							<div class="nav-next"><?php previous_posts_link( __( 'Regresar', 'twentyten' ) ); ?></div>
							<div class="nav-previous"><?php next_posts_link( __( '+ Información', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->
		<?php endif; ?>
