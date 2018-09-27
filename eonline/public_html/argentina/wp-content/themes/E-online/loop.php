<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '+ Información', 'twentyten' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Regresar', 'twentyten' ) ); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php 
		$i=0;
		while ( have_posts() ) : the_post(); ?>
						
						<!-- MODULO BANNER CONCURSOS-->
						<!-- <?php if ( is_home() && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<a href="http://www.eonlineexperiences.com/avengers/LA/" target="_blank"><img src="<?php bloginfo('template_url')?>/images/comunes/toppost_AR.jpg" alt="" width="590" height="116" border="0"></a></div>
						<?}?>-->
						


						<!-- MODULO ALFOMBRA ROJA TWITTER -->
						
						<!--<?php if ( is_home() && $i==0){?>
								<div style="margin-left:10px; margin-bottom:10px; width:586px; height:179px; _width:596px; _height:209px; padding-top:30px; padding-left:10px; background: url(<?php bloginfo('template_url')?>/images/bgs/ultimas_noticias.jpg) no-repeat; border:0px solid red;">
										<iframe src="<?php bloginfo('template_url')?>/tweets.php" width="430" height="150" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
								</div>
						<?}?>-->
						
						<!-- MODULO TWITTER -->
						<?
						date_default_timezone_set("America/Buenos_Aires");
						$todo=date("YmdHi");
						
						$dia=date("d");
						$mes=date("m");
						$anio=date("Y");

						$hora=date("H");// DE 0 A 23
						$inicio="201204261925";
						$fin="201204262200";
						
						if($todo>=$inicio && $todo<=$fin ){
						?>
								<?php if (is_home() && $i==0 ){?>
										   <!--  <div style="margin-left:10px; margin-bottom:10px; width:586px; height:189px; _width:596px; _height:209px; padding-top:20px; padding-left:10px; background: url(http://la.eonline.com/argentina/wp-content/themes/E-online/images/bgs/ultimas_noticias.jpg) no-repeat; border:0px solid red;">
														<iframe src="http://la.eonline.com/argentina/wp-content/themes/E-online/tweets.php" width="430" height="170" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
											</div> -->
								<?}?>
						<?}?>

						<?
						$borrar_cache=$inicio+5;
						$ruta_cache=$_SERVER["DOCUMENT_ROOT"]."argentina/wp-content/cache/";

						if($todo==$borrar_cache){
							$handle=opendir($ruta_cache);

							$i = 0;
							while (($file = readdir($handle))!==false) {
								if($file!="."&&$file!=".."&&$file!="/"&&$file!="supercache"&&$file!="/supercache"&&$file!="meta"&&$file!="/meta")unlink($ruta_cache.$file);
							}
							closedir($handle);
						}
						?>
						<!-- cierre  MODULO TWITTER -->

						<!-- MODULO COUNTER -->
						<script language="JavaScript">
						TargetDate = "09/01/2012 01:00 AM";
						BackColor = "";
						ForeColor = "white";
						CountActive = true;
						CountStepper = -1;
						LeadingZero = true;
						DisplayFormat = "%%D%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%H%%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%%M%% ";
						FinishMessage = "It is finally here!";
						</script>
						
						<?
						date_default_timezone_set("America/Buenos_Aires");
						$todo=date("YmdHi");
						
						$dia=date("d");
						$mes=date("m");
						$anio=date("Y");

						$hora=date("H");// DE 00 A 23
						$inicio2="201208200200";
						$fin2="201209202300";

						if($todo>=$inicio2 && $hora<=$fin2 ){
						?>
								<?php if (is_home() && $i==0 ){?>
										  
										  <div style="z-index:1; margin-left:10px; margin-bottom:10px; width:590px; height:172px; background: url(http://la.eonline.com/argentina/wp-content/themes/E-online/images/comunes/counter_nuevo.jpg) no-repeat; border:0px solid red; position:relative; ">
										  <span class="f3e7cd" style="text-align:left; position:absolute; width:220px; top:95px; left:307px; z-index:10;font: 22px/26px Arial; color:#fff;">
										  <script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js"></script> 
										  </span>
										  </div>
										
								<?}?>
						<?}?> 
						<!-- cierre  MODULO COUNTER -->

						
						<!--  BORRAR CACHE COUNTER -->
						<?
						$borrar_cache=$inicio2+5;
						$ruta_cache=$_SERVER["DOCUMENT_ROOT"]."argentina/wp-content/cache/";

						if($todo==$borrar_cache){
							$handle=opendir($ruta_cache);

							$i = 0;
							while (($file = readdir($handle))!==false) {
								if($file!="."&&$file!=".."&&$file!="/"&&$file!="supercache"&&$file!="/supercache"&&$file!="meta"&&$file!="/meta")unlink($ruta_cache.$file);
							}
							closedir($handle);
						}
						?>
						<!-- cierre  BORRAR CACHE COUNTER -->


						<!-- ADSERVER TOPPOST-->
						<?php if ($i==0 ){?>
							<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
							<script type='text/javascript'><!--// <![CDATA[
							    OA_show(41);
							// ]]> --></script><noscript><a target='_blank' href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=63f549e'><img border='0' alt='' src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=41&amp;n=63f549e' /></a></noscript>
							</div>
						<?}?>
						<!-- ADSERVER TOPPOST-->

						<!-- ADSERVER TOPPOST ENTRE 1 Y 2-->
						<?php if ($i==1 ){?>
						<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
						 <script type='text/javascript'><!--// <![CDATA[
						    OA_show(81);
						// ]]> --></script><noscript><a target='_blank' href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=4e42577'><img border='0' alt='' src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=81&amp;n=4e42577' /></a></noscript>
						</div>
						<?}?>
						 <!--  ADSERVER TOPPOST-->

						<?php if ( !is_home() && is_category("oscar") && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<img src="<?php bloginfo('template_url')?>/images/banners/auspicio_oscar+_VEN.gif" alt="" width="593" height="64" border="0"></div>
						<?}?>

						<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
												<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

												<div class="entry-meta">
													<?php twentyten_posted_on(); ?>
												</div><!-- .entry-meta -->

												<div class="entry-content">
															<?php if ( post_password_required() ) : ?>
																			<?php the_content(); ?>
															<?php else : ?>
																			<div class="gallery-thumb">
															<?php
																$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
																$total_images = count( $images );
																$image = array_shift( $images );
																$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
															?>
																				<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
																			</div><!-- .gallery-thumb -->
																			<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ),
																					'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
																					$total_images
																				); ?></em></p>

																			<?php the_content(); ?>
															<?php endif; ?>
												</div><!-- .entry-content -->

												<div class="entry-utility">
													<a href="<?php echo get_term_link( _x('gallery', 'gallery category slug', 'twentyten'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'twentyten' ); ?>"><?php _e( 'Mas galerias', 'twentyten' ); ?></a>
													<!-- <span class="meta-sep">|</span>
													<?php edit_post_link( __( 'Editar', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?> -->
													<div class="post-comments"><?php comments_popup_link( __( 'Comentar', 'twentyten' ), __( '1 Comentario', 'twentyten' ), __( '% Comentarios', 'twentyten' ) ); ?></div>
												</div><!-- .entry-utility -->

												<!-- ARTICULOS RELACIONADOS -->
												<?php include (TEMPLATEPATH . '/related-post-ch.php'); ?>

							</div><!-- #post-## -->

							<?php /* How to display posts in the asides category */ ?>

					<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
					
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
								<div class="entry-summary">
									<?php the_content(); ?>
								</div><!-- .entry-summary -->
							<?php else : ?>
								<div class="entry-content">
									
									<?php the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); ?>
								</div><!-- .entry-content -->
							<?php endif; ?>

								<div class="entry-utility">
									<?php twentyten_posted_on(); ?>
									<!-- <span class="meta-sep">|</span>
									<?php edit_post_link( __( 'Editar', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?> -->
									<div class="post-comments"><?php comments_popup_link( __( 'Comentar', 'twentyten' ), __( '1 Comentario', 'twentyten' ), __( '% Comentarios', 'twentyten' ) ); ?></div>
								</div><!-- .entry-utility -->
							
							<!-- ARTICULOS RELACIONADOS -->
							<?php include (TEMPLATEPATH . '/related-post-ch.php'); ?>

							</div><!-- #post-## -->


					<?php /* How to display all other posts. */ ?>

					<?php else : ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
								<!-- CATEGORIA / SECCION -->
								<div class="entry-utility">
									<?php if ( count( get_the_category() ) ) : ?>
										<? if ( in_category('estrenos') || in_category('zonae')) {?>
										<h4>
											<?php echo get_the_category_list( ', ' ); ?>
										</h4>
										<?} elseif ( in_category('efashionblogger')) {?>
										<h5>
											<?php echo get_the_category_list( ', ' ); ?>
										</h5>
										<?} elseif ( in_category('cine_by_dos_equis')) {?>
										<h6>
											<?php echo get_the_category_list( ', ' ); ?>
										</h6>
										<?}else{?>
										<h3>
											<?php echo get_the_category_list( ', ' ); ?>
										</h3>
										<?}?>
									<?php endif; ?>
								</div>
								<!-- / CATEGORIA / SECCION -->
								
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								<div class="entry-meta">
									<?php twentyten_posted_on(); ?>
								</div><!-- .entry-meta -->

						<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
								<div class="entry-summary">
									<?php the_content(); ?>
								</div><!-- .entry-summary -->
						<?php else : ?>
								<div class="entry-content">
									<?php the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); ?>
									<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Paginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
								</div><!-- .entry-content -->
						<?php endif; ?>

								<div class="entry-utility">
									<?php if ( count( get_the_category() ) ) : ?>
										<span class="cat-links">
											<?php printf( __( '<span class="%1$s"><br>Categorias: </span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
										</span>
										<span class="meta-sep">|</span>
									<?php endif; ?>
									<?php
										$tags_list = get_the_tag_list( '', ', ' );
										if ( $tags_list ):
									?>
										<span class="tag-links">
											<?php printf( __( '<span class="%1$s">Etiquetas</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
										</span>
										<span class="meta-sep">|</span>
									<?php endif; ?>
									<!-- <?php edit_post_link( __( 'Editar', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?> -->
									<div class="post-comments"><?php comments_popup_link( __( 'Comentar', 'twentyten' ), __( '1 Comentario', 'twentyten' ), __( '% Comentarios', 'twentyten' ) ); ?></div>
								</div><!-- .entry-utility -->

							<!-- ARTICULOS RELACIONADOS -->
							<?php include (TEMPLATEPATH . '/related-post-ch.php'); ?>

							</div><!-- #post-## -->


							<?php comments_template( '', true ); ?>


					<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

					<?php if($i==0) echo ("");?>
					<?php if($i==1) echo ("");?>
		<?php $i++;?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '+ Información', 'twentyten' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Regresar', 'twentyten' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>
