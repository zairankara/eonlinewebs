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
				

				<!-- DOMINGO 19HS DESDE ACA-->
				<?
				date_default_timezone_set("America/Buenos_Aires");
				$todo=date("YmdHi");

				$dia=date("d");
				$mes=date("m");
				$anio=date("Y");

				$hora=date("H");// DE 0 A 23
				$inicio="201302241930";
				$fin="201302250200";

				if($todo>=$inicio && $todo<=$fin ){?>
					<?php if (is_home() && $i==0){?>
						    <div style="margin-left:20px; margin-top:10px; margin-bottom:10px; width:630px; height:260px; background: #E4E4E4 url(http://la.eonline.com/argentina/wp-content/themes/abz2012/images/ultimas_noticias.jpg) no-repeat bottom; border:0px solid red;">
						    		 <div style="margin:5px 0; width:440px; height:250px; overflow:hidden;"><iframe src="http://br.eonline.com/wp-content/themes/abz2012_br/tweets.php" width="440" height="250" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 440px !important;"></iframe></div>
						    </div>
						     
					<?}?>
				<?}?>

				
				<!-- ADSERVER TOP POST 630X50-->
				<?
				if($zona_banner_toppost!="") echo("<div class='zona_banner_toppost'>".$zona_banner_toppost."</div>");
				//FIN TOPPOST

				//EXTRAER IMPERDIBLE
				$imperdible = get_category_by_slug('imperdivel');
				$IDimperdible=$imperdible->term_id;
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
									<?if($zona_banner_300x250_abajo!="") echo($zona_banner_300x250_abajo);?>
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
					query_posts("cat=-$IDfoto_del_dia&paged=$paged");
					while ( have_posts() ) : the_post(); ?>
								<?php if($d%2!=0){?>
											<?php include (TEMPLATEPATH . '/post.php'); ?>
								<?}?>
					<?php $d++;?>
					<?php endwhile; // End the loop. Whew. ?>
					<div class='vacio'></div>
				</div>


		<?php }elseif(is_category("the-kardashians")){?>

					<?
					//EXTRAER the_kardashians
					$the_kardashians = get_category_by_slug('the-kardashians');
					$IDthe_kardashians=$the_kardashians->term_id;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$i=0;
					echo ("<div class='col_izq'>");

						query_posts("cat=$IDthe_kardashians&paged=$paged");
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

						include (TEMPLATEPATH . '/kardashians/galerias_destacadas.php');
						query_posts("cat=$IDthe_kardashians&paged=$paged");
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
				while (have_posts() && $cz < 12) : the_post();
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