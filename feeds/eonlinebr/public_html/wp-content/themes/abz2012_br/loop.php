<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>

		<?php if ( ! have_posts() ) : ?>
			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Não foram encontrados resultados', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Desculpe, mas não houve resultados para o conteúdo que você está pedindo. Tente palavras-chave diferentes.', 'twentyten' ); ?></p>
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
			$postSlug=$postSlug[1];
		}
		?>
		<script language="javascript" type="text/javascript" data-device="1" id="script_live">
			var var_feed = <?=$var_con[0];?>;
			var testliveS = '<?=$_GET["testliveS"];?>';
			if(isMobile()) {var varMobile = 1;}else{var varMobile = 0;}


			$.ajax({
			   type: "GET",
			   url: "/common/lives.php",
			   data: "var_feed="+var_feed+"&testlive="+testliveS+"&varMobile="+varMobile+"&Slug=<?=$postSlug?>",
			   cache: false,
			   success: function(respuesta) {
			      $("#lives").html(respuesta);
			   }
			});
		</script>
		<div id="lives"></div>
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
						   data: "name_feed="+name_feed+"&playlist="+playlist,
						   cache: false,
						   success: function(respuesta) {
						      $("#videos_inhome").html(respuesta);
						   }
						});
					</script>

					<div id="videos_inhome"></div>
				<!-- / VIDEOS IN HOME-->

				
				<!-- ADSERVER TOP POST 630X50-->
				<div id='div-gpt-ad-home-630x50' class='zona_banner_toppost' class='hideMobify'><? echo que_cat_es("home","630","50",NULL);?></div>
				<!-- ADSERVER TOP POST 630X50-->
				

				<ul class="grid effect-5" id="grid">
				<?
				//EXTRAER IMPERDIBLE
				$imperdible = get_category_by_slug('imperdivel');
				$IDimperdible=$imperdible->term_id;

				//EXTRAER the trends
				$thetrends = get_category_by_slug('thetrend');
				$IDthetrends=$thetrends->term_id;
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$do_not_duplicate = array(); // set befor loop variable as array
					$anchofoto=310;

					$i=1;
					query_posts("cat=-$IDfoto_del_dia&paged=$paged");
						if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php if ( !in_array( $post->ID, $do_not_duplicate ) ) :?>
								<?php if( !is_sticky() ):?>

									<?php $do_not_duplicate[] = $post->ID; ?>
									<?php //$data=que_batanga_es("300x250");if($data==""){$imprimo=quien_es("300","250","2");}else{$imprimo=$data;}?>
	
									<?php $imprimo=quien_es("300","250","2");?>

									<?php echo("<li>");include (TEMPLATEPATH . '/post.php'); echo("</li>");?>
									<?php if($i==1) {echo("<li>");include (TEMPLATEPATH . '/post_destacados.php');echo("</li>");}?>
									<?php if($i==1) {echo("<li>");include (TEMPLATEPATH . '/galerias_destacadas.php');echo("</li>");}?>
									<?php if($i==4) {echo("<li><div class='zona_banner' style='height:250px;'>".$imprimo."</div></li>");}?>
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


					<!-- AD TOPPOST AMAMOS-->
					<?if(is_category("amamos-cinema")){?>
						<div class='zona_banner_toppost'><? echo quien_es("630","50",NULL);?></div>
					<?}?>
					<!-- / AD TOPPOST AMAMOS-->

					<!-- MODULO RED CARPET SEASON-->
					<?if(is_category("tapetevermelho")){?>

							<?php include (TEMPLATEPATH . '/loamoloodio_RC.php');?>
							<?php include ($_SERVER["DOCUMENT_ROOT"].'/varios/el_veredicto/el_veredicto.php');?>
						
					<?}elseif(is_category("efashionblogger")){?>

							<?php //include (TEMPLATEPATH . '/loamoloodio_EFB.php');?>

					<?}elseif(is_category("the-kardashians")){?>

							<?php include (TEMPLATEPATH . '/loamoloodio_TK.php');?>
					<?}?>
					<!-- / MODULO RED CARPET SEASON-->

					<!-- MODULO MUNDIAL-->
					<?if(is_category("copa-do-mundo")){?>

						<?php include (TEMPLATEPATH . '/loamoloodio_CM.php');?>
						
					<?}?>
					<!-- / MODULO MUNDIAL-->

					<?
					$cat = get_term_by('name', single_cat_title('',false), 'category'); 
					$postSlug=$cat->slug;
					$postID = get_category_by_slug($postSlug);
					$postID2=$postID->term_id;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$do_not_duplicate = array(); // set befor loop variable as array
	
					$anchofoto=310;


					if(is_category("tapetevermelho")){
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
										if(is_category("tapetevermelho") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_rc.php');echo("</li>");}

									endif; ?>

									<?php $i++;?>


								<?php endwhile; endif;// End the loop. Whew. ?>
							<?php wp_reset_query(); ?>
							</ul>
					<?}else{
							
							echo ('<ul class="grid effect-5" id="grid">');					
								
								$i=1;
								query_posts("cat=$postID2&paged=$paged");
									if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
										<?php if ( !in_array( $post->ID, $do_not_duplicate ) ) :?>
											<?php $do_not_duplicate[] = $post->ID; ?>
			
											<?php echo("<li>");include (TEMPLATEPATH . '/post.php'); echo("</li>");?>
			
											<?php 
											if(is_category("the-kardashians") && $i==1) {echo("<li>");include (TEMPLATEPATH . '/kardashians/galerias_destacadas.php');echo("</li>");}
											if((is_category("enews") || is_category("estrenos") || is_category("cine_by_dos_equis")) &&  $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas.php');echo("</li>");}
											//if(is_category("thetrend") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_tt.php');echo("</li>");}
											if(is_category("efashionblogger") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_efb.php');echo("</li>");}
											if(is_category("efashionblogger") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/loamoloodio_EFB_ch.php');echo("</li>");}
											if(is_category("noivas") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/post_especialista.php');echo("</li>");}
											if(is_category("noivas") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_noivas.php');echo("</li>");}
											if(is_category("tapetevermelho") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_rc.php');echo("</li>");}
											if(is_category("carnaval2015") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_ca.php');echo("</li>");}
											if(is_category("the-royals") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_the-royals.php');echo("</li>");}
											if(is_category("amamos-cinema") && $i==1) {echo("<li>"); include (TEMPLATEPATH . '/galerias_destacadas_amamos.php');echo("</li>");}
			
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
				while (have_posts() && $cz < 16) : the_post();
					include (TEMPLATEPATH . '/post.php');
				$c++;
				$cz++; 
				endwhile; 
			echo ("</div>");
		}?>

		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-below" class="navigation">
							<div class="nav-previous"><?php next_posts_link( __( '+ notícias', 'twentyten' ) ); ?></div>
							<div class="nav-next"><?php previous_posts_link( __( 'Voltar', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->
		<?php endif; ?>
