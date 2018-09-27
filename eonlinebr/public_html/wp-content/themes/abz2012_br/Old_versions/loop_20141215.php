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

		<?php 
		if( is_home() || is_front_page()){?>

				<!-- LIVESTREAMING-->
				<? include (TEMPLATEPATH . '/lives.php');?>

				
				<!-- ADSERVER TOP POST 630X50-->
				<div id='div-gpt-ad-home-630x50' class='zona_banner_toppost' class='hideMobify'><? echo que_cat_es("home","630","50",NULL);?></div>
				<!-- ADSERVER TOP POST 630X50-->
				<?
				//EXTRAER IMPERDIBLE
				$imperdible = get_category_by_slug('imperdivel');
				$IDimperdible=$imperdible->term_id;

                //EXTRAER the trends
				$thetrends = get_category_by_slug('thetrend');
				$IDthetrends=$thetrends->term_id;
				
				$IDfoto_del_dia=29064;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$i=0;
				echo ("<div class='col_izq'>");

					query_posts("cat=-$IDfoto_del_dia&paged=$paged");
					while ( have_posts() ) : the_post(); ?>

								<?php if($i%2==0){?>
										<?php include (TEMPLATEPATH . '/post.php'); ?>
								<?}?>

								<!-- ADSERVER 300X250 ABAKO-->
								<?php if($i==2){?>
								<div class="zona_banner">
									<? echo quien_es("300","250","2");?>
								</div>
								<?}?>


					<?php $i++;?>
					<?php endwhile; // End the loop. Whew. ?>
					<div class='vacio'></div>
				</div>

				<?
				$d=0;
				echo ("<div class='col_der'>");

					include (TEMPLATEPATH . '/post_destacados.php');
					include (TEMPLATEPATH . '/galerias_destacadas.php');

					query_posts("cat=-$IDfoto_del_dia&paged=$paged");
					while ( have_posts() ) : the_post(); ?>
								<?php if($d%2!=0){?>
											<?php include (TEMPLATEPATH . '/post.php'); ?>
								<?}?>
					<?php $d++;?>
					<?php endwhile; // End the loop. Whew. ?>
					<div class='vacio'></div>
				</div>


		<?php }elseif(is_category()){?>

					<!-- AD TOPPOST AMAMOS-->
					<?if(is_category("amamos-cinema")){?>
						<div class='zona_banner_toppost'><? echo quien_es("630","50",NULL);?></div>
					<?}?>
					<!-- / AD TOPPOST AMAMOS-->

					<!-- MODULO RED CARPET SEASON-->
					<?if(is_category("tapetevermelho")){?>
					
						<style>
						#loamoloodio{
							background-color: #d00000;
							width: 630px;
							height: 750px;
							position: relative;
							margin-left: 15px;
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
						<!-- <div id="loamoloodio">
							<iframe src="http://www.abzsites.com.ar/E/loamoloodioBR/BR/index.php?frome=1" width="630" height="740" scrolling="no" style="overflow: hidden; border: none;"></iframe>
							<div id="banner_redcarpet"><? echo quien_es("300","100","1");?></div>
						</div> -->
						<div id="loamoloodio">
							<iframe src="http://br.eonline.com/experience/redcarpetseason/loamoloodio/BR/index.php" width="630" height="740" scrolling="no" style="overflow: hidden; border: none;"></iframe>
							<div id="banner_redcarpet"><? echo quien_es("300","100","1");?></div>
						</div>
						
					<?}elseif(is_category("efashionblogger")){?>

						<style>
						#loamoloodio{
							background-color: #D677D3;
							width: 630px;
							height: 750px;
							position: relative;
							margin-left: 15px;
						}
						#banner_efb{
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
							<iframe src="http://br.eonline.com/experience/EFB_loamoloodio/BR/index.php" width="630" height="740" scrolling="no" style="overflow: hidden; border: none;"></iframe>
							<div id="banner_efb"><? echo quien_es("300","100","2");?></div>
						</div>
					<?}?>
					<!-- / MODULO RED CARPET SEASON-->

					<!-- MODULO MUNDIAL-->
					<?if(is_category("copa-do-mundo")){?>
					
						<style>
						#copadelmundo{
							background-color: #fff;
							width: 630px;
							height: 830px;
							position: relative;
							float: left;
							margin-left: 20px;
						}
						.zona_banner_toppost{
							width: 630px;
							float: left;
						}
						</style>
						<div class='zona_banner_toppost'><? echo quien_es("630","50",NULL);?></div>

						<div id="copadelmundo">
							<iframe src="http://br.eonline.com/experience/loamoloodioMundial/BR/index.php" width="630" height="830" scrolling="no" style="overflow: hidden; border: none;"></iframe>
						</div>
						
					<?}?>
					<!-- / MODULO MUNDIAL-->


					<?
					//EXTRAER the_kardashians
					   //$the_kardashians = get_category_by_slug('the-kardashians');
			          //$IDthe_kardashians=$the_kardashians->term_id;
			          $cat = get_term_by('name', single_cat_title('',false), 'category'); 
			          $postSlug=$cat->slug;
			          $postID = get_category_by_slug($postSlug);
			          $postID2=$postID->term_id;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$i=0;
					echo ("<div class='col_izq'>");

						query_posts("cat=$postID2&paged=$paged");
						while ( have_posts() ) : the_post(); ?>
										
									<?php if($i%2==0){?>
											<?php include (TEMPLATEPATH . '/post.php'); ?>
									<?}?>


						<?php $i++;?>
						<?php endwhile; // End the loop. Whew. ?>
						<div class='vacio'></div>
					</div>
					<?
					$d=0;
					echo ("<div class='col_der'>");

					  	if(is_category("the-kardashians")) include (TEMPLATEPATH . '/kardashians/galerias_destacadas.php');
				 		if(is_category("enews") || is_category("estrenos") || is_category("cine_by_dos_equis")) include (TEMPLATEPATH . '/galerias_destacadas.php');
						if(is_category("thetrend")) include (TEMPLATEPATH . '/galerias_destacadas_tt.php');
						if(is_category("efashionblogger")) include (TEMPLATEPATH . '/galerias_destacadas_efb.php');
						if(is_category("tapetevermelho")) include (TEMPLATEPATH . '/galerias_destacadas_rc.php');
						if(is_category("carnaval2014")) include (TEMPLATEPATH . '/galerias_destacadas_ca.php');
						if(is_category("amamos-cinema")) include (TEMPLATEPATH . '/galerias_destacadas_amamos.php');


						query_posts("cat=$postID2&paged=$paged");
						while ( have_posts() ) : the_post(); ?>
									
									<?php if($d%2!=0){?>
												<?php include (TEMPLATEPATH . '/post.php'); ?>
									<?}?>
						<?php $d++;?>
						<?php endwhile; // End the loop. Whew. ?>
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
			echo ("</div>");
		}?>

		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-below" class="navigation">
							<div class="nav-previous"><?php next_posts_link( __( '+ notícias', 'twentyten' ) ); ?></div>
							<div class="nav-next"><?php previous_posts_link( __( 'Voltar', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->
		<?php endif; ?>