<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>
		


		<?php if ( ! have_posts() ) : ?>
			
			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'sNo se ha encontrado ningún resultado', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Disculpe, pero no hay resultados para el contenido que está solicitando.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div> 
		<?php endif; ?>

		<?php 
		if( is_home() || is_front_page()){?>

				<!-- LIVESTREAMING-->
				<? include (TEMPLATEPATH . '/lives.php');?>

				
				<!-- ADSERVER TOP POST 630X50-->
				<div id='div-gpt-ad-home-630x50' class='zona_banner_toppost'><? echo que_cat_es("home","630","50",NULL);?></div>
				<ul class="grid effect-5" id="grid">
				<?
				//FIN TOPPOST

				
				//EXTRAER IMPERDIBLE
				$imperdible = get_category_by_slug('imperdible');
				$IDimperdible=$imperdible->term_id;
				$IDfoto_del_dia=10958;

				//EXTRAER the trends
				$thetrends = get_category_by_slug('thetrend');
				$IDthetrends=$thetrends->term_id;
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$i=0;

					query_posts("cat=-$IDimperdible,-$IDfoto_del_dia,-$IDthetrends&paged=$paged");
					if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); ?>

										<?php include (TEMPLATEPATH . '/post.php'); ?>

										<?php if($i==11) {echo("<li>");include (TEMPLATEPATH . '/masvistos.php');echo("</li>");}?>
							

										<?php if($i==0) {echo("<li>");include (TEMPLATEPATH . '/post_destacados.php');echo("</li>");}?>
										<?php //if($i==1) {echo("<li>"); get_sidebar(); echo("</li>");}?>
										<?php if($i==2) {echo("<li>");include (TEMPLATEPATH . '/galerias_destacadas.php');echo("</li>");}?>


					<?php $i++;?>
					<?php endwhile; // End the loop. Whew. ?>
					<?php endif; ?>

			</ul>

			<script src="/common/js/modernizr.custom.js"></script>
			<script src="/common/js/masonry.pkgd.min.js"></script>
			<script src="/common/js/imagesloaded.pkgd.min.js"></script>
			<script src="/common/js/classie.js"></script>
			<script src="/common/js/AnimOnScroll.js"></script>

			<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
			</script>


		<?php }elseif(is_category()){?>

					<?if(is_category("wakeup")) include (TEMPLATEPATH . '/wakeup/lives.php');?>

					<!-- MODULO RED CARPET SEASON-->
					<?if(is_category("alfombraroja")){?>
					
						<style>
						#loamoloodio{
							background-color: #d00000;
							width: 630px;
							height: 750px;
							position: relative;
						}
						#banner_redcarpet{
							position: absolute;
							bottom: 10px;
							left: 10px;
							z-index: 20;
							width: 300px;
							height: 100px;
							/*background-color: green;*/ 
						}
						</style>
						<div id="loamoloodio">
							<iframe src="http://la.eonline.com/experience/redcarpetseason/loamoloodio/AN/index.php" width="630" height="740" scrolling="no" style="overflow: hidden"></iframe>
							<div id="banner_redcarpet"><? echo quien_es("300","100","1");?></div>
						</div>
						
					<?}?>
					<!-- / MODULO RED CARPET SEASON-->

					<?
					//EXTRAER the_kardashians
					//$the_kardashians = get_category_by_slug('the-kardashians');
					//$IDthe_kardashians=$the_kardashians->term_id;
					$cat = get_term_by('name', single_cat_title('',false), 'category'); 
					$postSlug=$cat->slug;
					$postID = get_category_by_slug($postSlug);
					$postID2=$postID->term_id;
					//echo($postSlug."////   //".$postID2."///".date("Ydm"));

					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$i=0;
					echo ("<div class='col_izq'>");

						query_posts("cat=$postID2&paged=$paged");
						while ( have_posts() ) : the_post(); ?>
									<?php if($i%2==0){?>
											<?php include (TEMPLATEPATH . '/post.php'); ?>
									<?}?>


						<?php $i++;?>
						<?php endwhile; // End the loop. Whew. 
						wp_reset_query();?>
						<div class='vacio'></div>
					</div>
					<?
					$d=0;
					echo ("<div class='col_der'>");

						if(is_category("the-kardashians")) include (TEMPLATEPATH . '/kardashians/galerias_destacadas.php');
						if(is_category("thetrend")) include (TEMPLATEPATH . '/galerias_destacadas_tt.php');
						if(is_category("wakeup")) include (TEMPLATEPATH . '/galerias_destacadas_wakeup.php');
						query_posts("cat=$postID2&paged=$paged");
						while ( have_posts() ) : the_post(); ?>

									<?php if($d%2!=0){?>
												<?php include (TEMPLATEPATH . '/post.php'); ?>
									<?}?>
						<?php $d++;?>
						<?php endwhile; // End the loop. Whew. 
						wp_reset_query();?>
						<div class='vacio'></div>
					</div>
					
		<?php }else{
			echo ("<div id='col_doble'>");
				$c = 0;
				$cz = 1; 
				while (have_posts() && $cz < 16) : the_post();
					include (TEMPLATEPATH . '/post.php');
				$c++;
				$cz++; 
				endwhile; 
				wp_reset_query();
			echo ("</div>");
		}?>

		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-below" class="navigation">
							<div class="nav-next"><?php previous_posts_link( __( 'Regresar', 'twentyten' ) ); ?></div>
							<div class="nav-previous"><?php next_posts_link( __( '+ Información', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->
		<?php endif; ?>
