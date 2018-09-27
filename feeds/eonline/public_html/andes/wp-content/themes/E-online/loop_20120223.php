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
						<!-- CONCURSO CHINO Y NACHO
						<?php if ( is_home() && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<a href="http://la.eonline.com/concursos/chinoynacho/" target="_blank"><img src="<?php bloginfo('template_url')?>/images/chinoynacho_andes.jpg" alt="" width="590" height="116" border="0"></a></div>
						<?}?>
						-->

						<!--
						<?php if ( !is_home() && is_category("grammy") && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<img src="<?php bloginfo('template_url')?>/images/banners/auspicio_grammy_AND_MEX.gif" alt="" width="593" height="63" border="0"></div>
						<?}?>
						-->

						
						<?php if ( !is_home() && is_category("oscar") && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<img src="<?php bloginfo('template_url')?>/images/banners/auspicio_oscar+_VEN.gif" alt="" width="593" height="63" border="0"></div>
						<?}?>
						

						<!-- MODULO ALFOMBRA ROJA TWITTER -->
						<!--<?php if ( is_home() && $i==0){?>
								<div style="margin-left:10px; margin-bottom:10px; width:586px; height:179px; _width:596px; _height:209px; padding-top:30px; padding-left:10px; background: url(http://la.eonline.com/argentina/wp-content/themes/E-online/images/bgs/ultimas_noticias.jpg) no-repeat; border:0px solid red;">
										<iframe src="http://la.eonline.com/argentina/wp-content/themes/E-online/tweets.php" width="430" height="160" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
								</div>
						<?}?>-->			
						<!-- cierre MODULO ALFOMBRA ROJA TWITTER -->


						<!-- MODULO TWITTER -->
						<?
						date_default_timezone_set("America/Buenos_Aires");
						$todo=date("YmdHi");
						
						$dia=date("d");
						$mes=date("m");
						$anio=date("Y");

						$hora=date("H");// DE 0 A 23
						$inicio="201202261815";
						$fin="201202270030";
						
						if($todo>=$inicio && $todo<=$fin ){
						?>
								<?php if (is_home() && $i==0 ){?>
										    <div style="margin-left:10px; margin-bottom:10px; width:586px; height:189px; _width:596px; _height:209px; padding-top:20px; padding-left:10px; background: url(http://la.eonline.com/argentina/wp-content/themes/E-online/images/bgs/ultimas_noticias.jpg) no-repeat; border:0px solid red;">
														<iframe src="http://la.eonline.com/argentina/wp-content/themes/E-online/tweets.php" width="430" height="170" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe>
											</div>
								<?}?>
						<?}?>

						<?
						$borrar_cache=$inicio+5;
						$ruta_cache=$_SERVER["DOCUMENT_ROOT"]."andes/wp-content/cache/";

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


						<!-- ADSERVER TOPPOST-->
						<?php if ($i==0 ){?>
								<div style="margin-top:5px; margin-left:10px; margin-bottom:5px">
								<script type='text/javascript'><!--//<![CDATA[
								   var m3_u = (location.protocol=='https:'?'https://adsrv01.eonlinelatinola.com/www/delivery/ajs.php':'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php');
								   var m3_r = Math.floor(Math.random()*99999999999);
								   if (!document.MAX_used) document.MAX_used = ',';
								   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
								   document.write ("?zoneid=40");
								   document.write ('&amp;cb=' + m3_r);
								   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
								   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
								   document.write ("&amp;loc=" + escape(window.location));
								   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
								   if (document.context) document.write ("&context=" + escape(document.context));
								   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
								   document.write ("'><\/scr"+"ipt>");
								//]]>--></script><noscript><a href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=aaf40cc5&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=40&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=aaf40cc5' border='0' alt='' /></a></noscript>
								</div>
						<?}?>
						 <!--  ADSERVER TOPPOST-->

						 <!-- ADSERVER TOPPOST ENTRE 1 Y 2-->
						<?php if ($i==1 ){?>
						<div style="margin-top:5px; margin-left:10px; margin-bottom:5px">
						 <script type='text/javascript'><!--//<![CDATA[
						   var m3_u = (location.protocol=='https:'?'https://adsrv01.eonlinelatinola.com/www/delivery/ajs.php':'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php');
						   var m3_r = Math.floor(Math.random()*99999999999);
						   if (!document.MAX_used) document.MAX_used = ',';
						   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
						   document.write ("?zoneid=83");
						   document.write ('&amp;cb=' + m3_r);
						   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
						   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
						   document.write ("&amp;loc=" + escape(window.location));
						   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
						   if (document.context) document.write ("&context=" + escape(document.context));
						   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
							   document.write ("&amp;ct0=" + escape(document.MAX_ct0));
						   }
						   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
						   document.write ("'><\/scr"+"ipt>");
						//]]>--></script><noscript><a href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=a466041a&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=83&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a466041a&amp;ct0=INSERT_CLICKURL_HERE' border='0' alt='' /></a></noscript>
						</div>
						<?}?>
						 <!--  ADSERVER TOPPOST-->




						 <!--  <?php if ( !is_home() && is_category("emmy") && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<img src="<?php bloginfo('template_url')?>/images/banners/auspicio_emmy_AND.gif" alt="" width="593" height="64" border="0"></div>
						<?}?> 

						 <?php if ( !is_home() && is_category("latinbillboard") && $i==0 ){?>
								<div style="margin-top:10px; margin-left:10px; margin-bottom:10px">
								<img src="<?php bloginfo('template_url')?>/images/banners/auspicio_latin_AND.jpg" alt="" width="593" height="64" border="0"></div>
						<?}?>-->

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
