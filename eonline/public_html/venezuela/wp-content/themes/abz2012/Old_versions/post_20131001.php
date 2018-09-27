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
									
		
									</div><!-- #post-## -->
		
		
									<?php /* How to display all other posts. */ ?>

					<?php else : ?>

						<?php if(is_category("the-kardashians")){?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

											<!-- BANNER ADPOST-->
											<?echo quien_es("310","30",$post->ID);?>
									 		<!-- / BANNER ADPOST-->

											<div class="entry-content2">

												<?
												$random=rand(1,10);
												$bg_fondo=rnd_color($random);
												?>

												<!-- CATEGORIA / SECCION -->
												<div class="entry-utility">
													<?php if ( count( get_the_category() ) ) : 
														foreach((get_the_category()) as $category) {
														     $name_cat=$category->slug;
														}
														?>
														<h3 style="background-color: <?php echo cat_color($name_cat);?> !important;"><a href="<?php echo home_url( '/' ); ?>category/<?=$name_cat?>" title="THE KARDASHIANS" rel="category tag">THE KARDASHIANS</a></h3>
													<?php endif; ?>
												</div>
												<!-- / CATEGORIA / SECCION -->
	
												<?php //the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); 
													
														$tiene_video_home=0;
														
														//YOUTUBE $content 
														$embed2_home="";
														$embed_home="";
														$Html_vid="";
														$Html_vid = get_the_content();
													    $extrae_vid = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vid , $Html_vid , $matches_vid );
														$video = $matches_vid[1][0];
														$video=substr($video,0, 28);
														//echo($video."::VIDEO");
														 if($video=="http://www.youtube.com/embed")
														{
													    	$parser_vid='|\<iframe (.*?)iframe\>|is'; 
		
															if(preg_match($parser_vid, $Html_vid, $embed3)) 
															{ 
																$embed2_home=$embed2_home.$embed3[1];
															} 
		
															$embed_home=str_replace('width="570"', 'width="310"', $embed2_home);
															$embed_home=str_replace('height="370"', 'height="200"', $embed_home);
															$embed_home=str_replace('height="412"', 'height="200"', $embed_home);

															if($embed_home) echo'<div class="entry-thumb"/><iframe  '.$embed_home.'iframe></div>';
															$video_youtube=1;
													    }else{
													    	$video_youtube=0;
													    }

												     	//VIMEO $content 
														$embed_cod22="";
													    $extrae_vimeo = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vimeo , $Html_vid , $matches_vimeo );
														$video_vimeo = $matches_vimeo[1][0];
														$video_vimeo=substr($video_vimeo,0, 30);

														//echo($video."::VIDEO");
														 if($video_vimeo=="http://player.vimeo.com/video/")
														{
															$parser_vimeo='|\<iframe (.*?)iframe\>|is'; 

															if(preg_match($parser_vimeo, $Html_vid, $embed33)) 
															{ 
																$embed22=$embed22.$embed33[1];
															} 

															$embed_cod22=str_replace('width="570"', 'width="310"', $embed22);
															$embed_cod22=str_replace('height="370"', 'height="200"', $embed_cod22);
															$embed_cod22=str_replace('height="412"', 'height="200"', $embed_cod22);

															if($embed_cod22) echo ('<div class="entry-thumb"/><iframe  '.$embed_cod22.'iframe></div>');
															$video_vimeo=1;

														}else{
															$video_vimeo=0;
														}

	
													    //BRIGHTCOVE
														$embed_cod="";
														$brightcove="";
														$brightcove_inicio=explode("<!-- Start of Brightcove Player -->", $Html_vid);
														$comienzo=$brightcove_inicio[1];

														$brightcove_fin=explode('<script type="text/javascript">brightcove.createExperiences();</script>', $comienzo);
														$brightcove=$brightcove_fin[0];
														
														if($brightcove!="") {
															$parser='|\<object (.*?)object>|is'; 
															     
															if(preg_match($parser, $brightcove, $embed1)) 
															{ 
																$embed=$embed.$embed1[1];
															} 

															$embed_cod=str_replace('<param name="width" value="480" />', '<param name="width" value="310" />', $embed);
															$embed_cod=str_replace('<param name="height" value="270" />', '<param name="height" value="200" />', $embed_cod);
															$embed_cod=str_replace('<param name="width" value="570" />', '<param name="width" value="310" />', $embed_cod);
															$embed_cod=str_replace('<param name="height" value="370" />', '<param name="height" value="200" />', $embed_cod);

														
													  		echo("<object ".$embed_cod."object><script type='text/javascript'>brightcove.createExperiences();</script>");
															$video_brigth=1;
														}else{
													    	$video_brigth=0;
													    }
	
														// IMG POST
														//$Html = get_the_content();
		 											    $extrae = '/<img (.+?)>/';
		    											$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';
		
													    // Extraemos todas las imágenes
													    preg_match_all( $extrae  , $Html_vid , $matches );
													    $image = $matches[1][0];
														preg_match_all( $extrae2 , $Html_vid , $matches2 );
														$image2 = $matches2[1][0];
														$tiene_video=1;
														
									
														 $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
													     $extracto_caption = '';
													     
													        if (preg_match($patron, $Html_vid, $extracto1)) 
													        { 
													            $extracto_caption = $extracto1[1];
													        } 

													    if($video_brigth==1 or $video_youtube==1 or $video_vimeo==1) $tiene_video_home=1;
													    
													    $image_explode=explode("title",$image);
														$image_explode=$image_explode[0];

													    if($tiene_video_home==0){
														    if($image)
														    {?>
																<div class="imagen_post">
																	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image_explode;?> alt="<?php the_title(); ?>" width="293" title="<?php the_title(); ?>" /></a>
																</div>
																<?
														       	echo("<div class='caption_img'>".$extracto_caption."</div>");
														       	?>
			                       							<?}?>
			                       						<?}?>
		
	
											</div><!-- .entry-content -->
											
											<div class="entry-content <?php echo $bg_fondo;?>">
												<div class="entry-meta">
													<div style="float:left; font-size:10px;"><?php twentyten_posted_on(); ?></div>
												</div><!-- .entry-meta -->
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
												</h2>
												<span class="entry-text">
												<?php 
												wp_limit_abz($extracto_caption);
												//wp_limit_post($extracto_caption, 250,'...',true);
												?>
												</span>
											</div>
											
									</div><!-- #post-## -->
									<?
									$tiene_video_home=0;
									?>

						<?}else{?>
							
							<!-- SI ES CATEGORIA, ARCHIVO, BUSQUEDA Y TAGS -->
									
									<!-- PRIMER POST DESTACADO -->
									<?
									
									if($c==0 && ( is_archive() || is_search() || is_tag() )) {
									
									?>

										<!-- VIDEO GLAMCAM :: PARA ACTIVAR SACAR ESTO-->
										<!-- $_GET["abz"]==1 && -->
										<?if ($_GET["abz"]==1 && is_category("emmy")){?> <div class="glam_cam">
											<div style="display:none"></div>
											<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
											<object id="myExperience" class="BrightcoveExperience">
											  <param name="bgcolor" value="#FFFFFF" />
											  <param name="width" value="630" />
											  <param name="height" value="500" />
											  <param name="playerID" value="1836693918001" />
											  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWNqum9JfDD7Zl28Yib4DaxO" />
											  <param name="isVid" value="true" />
											  <param name="isUI" value="true" />
											  <param name="dynamicStreaming" value="true" />
											</object>
											<script type="text/javascript">brightcove.createExperiences();</script>
											</div>
										<?}?>
										<!-- VIDEO GLAMCAM-->
									<div id="post-<?php the_ID(); ?>" class="hentry_gr">
												<div class="entry-content_int_gr_arr">
		
													<?php //the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); 
														$tiene_video_home=0;
														
														//YOUTUBE $content 
														$embed_home="";
														$Html_vid="";
														$Html_vid = get_the_content();
													    $extrae_vid = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vid , $Html_vid , $matches_vid );
														$video = $matches_vid[1][0];
														$video=substr($video,0, 28);
														//echo($video."::VIDEO");
														 if($video=="http://www.youtube.com/embed")
														{
													    	$parser_vid='|\<iframe (.*?)iframe\>|is'; 
		
															if(preg_match($parser_vid, $Html_vid, $embed3)) 
															{ 
																$embed2_home=$embed2_home.$embed3[1];
															} 
		
															$embed_home=str_replace('width="570"', 'width="310"', $embed2_home);
															$embed_home=str_replace('height="370"', 'height="200"', $embed_home);
															$embed_home=str_replace('height="412"', 'height="200"', $embed_home);

															if($embed_home) echo'<div class="entry-thumb"/><iframe  '.$embed_home.'iframe></div>';
															$video_youtube=1;
													    }else{
													    	$video_youtube=0;
													    }

													   //VIMEO $content 
														$embed_cod22="";
													    $extrae_vimeo = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vimeo , $Html_vid , $matches_vimeo );
														$video_vimeo = $matches_vimeo[1][0];
														$video_vimeo=substr($video_vimeo,0, 30);

														//echo($video."::VIDEO");
														 if($video_vimeo=="http://player.vimeo.com/video/")
														{
															$parser_vimeo='|\<iframe (.*?)iframe\>|is'; 

															if(preg_match($parser_vimeo, $Html_vid, $embed33)) 
															{ 
																$embed22=$embed22.$embed33[1];
															} 

															$embed_cod22=str_replace('width="570"', 'width="310"', $embed22);
															$embed_cod22=str_replace('height="370"', 'height="200"', $embed_cod22);
															$embed_cod22=str_replace('height="412"', 'height="200"', $embed_cod22);

															if($embed_cod22) echo ('<div class="entry-thumb"/><iframe  '.$embed_cod22.'iframe></div>');
															$video_vimeo=1;

														}else{
															$video_vimeo=0;
														}

		
													    //BRIGHTCOVE
														$embed_cod="";
														$brightcove="";
														$brightcove_inicio=explode("<!-- Start of Brightcove Player -->", $Html_vid);
														$comienzo=$brightcove_inicio[1];

														$brightcove_fin=explode('<script type="text/javascript">brightcove.createExperiences();</script>', $comienzo);
														$brightcove=$brightcove_fin[0];
														
														if($brightcove!="") {
															$parser='|\<object (.*?)object>|is'; 
															     
															if(preg_match($parser, $brightcove, $embed1)) 
															{ 
																$embed=$embed.$embed1[1];
															} 

															$embed_cod=str_replace('<param name="width" value="480" />', '<param name="width" value="310" />', $embed);
															$embed_cod=str_replace('<param name="height" value="270" />', '<param name="height" value="200" />', $embed_cod);
															$embed_cod=str_replace('<param name="width" value="570" />', '<param name="width" value="310" />', $embed_cod);
															$embed_cod=str_replace('<param name="height" value="370" />', '<param name="height" value="200" />', $embed_cod);

														
													  		echo("<object ".$embed_cod."object><script type='text/javascript'>brightcove.createExperiences();</script>");
															$video_brigth=1;
														}else{
													    	$video_brigth=0;
													    }
	
														// IMG POST
														//$Html = get_the_content();
		 											    $extrae = '/<img (.+?)>/';
		    											$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';
		
													    // Extraemos todas las imágenes
													    preg_match_all( $extrae  , $Html_vid , $matches );
													    $image = $matches[1][0];
														preg_match_all( $extrae2 , $Html_vid , $matches2 );
														$image2 = $matches2[1][0];
														$tiene_video=1;
														
									
														 $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
													        $extracto = '';
													        if (preg_match($patron, $Html_vid, $extracto1)) 
													        { 
													            $extracto_caption = $extracto1[1];
													        } 

													    if($video_brigth==1 or $video_youtube==1 or $video_vimeo==1) $tiene_video_home=1;

													    $image_explode=explode("title",$image);
														$image_explode=$image_explode[0];
													    
													    if($tiene_video_home==0){
														    if($image)
														    {?>
																<div class="imagen_post">
																	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image_explode;?> alt="<?php the_title(); ?>" width="293" title="<?php the_title(); ?>" /></a>
																</div>
																<?
																
														       	echo("<div class='caption_img'>".$extracto_caption."</div>");
														       	?>
			                       							<?}?>
			                       						<?}?>
		
												</div><!-- .entry-content -->
		
												<div class="entry-content_int_gr_ab">
													
													<h1 class="entry-title">
														<?php if ( count( get_the_category() ) ) : ?>
															<? 
															if ( in_category('enews') || is_category('enews')) {
																$color_txt="style_enews_txt";
															} elseif ( in_category('alfombraroja') || is_category('alfombraroja')) {
																$color_txt="style_redcarpet_txt";
															} elseif ( in_category('videos-2') || is_category('videos-2')) {
																$color_txt="style_videos_txt";
															} elseif ( in_category('thetrend') || is_category('thetrend')) {
																		$color_txt="style_thetrend_txt";
															} elseif ( in_category('efashionblogger') || is_category('efashionblogger')) {
																$color_txt="style_fashion_txt";
															} elseif ( in_category('estrenos') || is_category('estrenos')) {
																$color_txt="style_estrenos_txt";
															}else{
																$color_txt="";
															}?>
														<?php endif; ?>
														<span class="<?=$color_txt?>"><?php echo get_the_category_list( ', ' ); ?> / </span>
														<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
													</h1>
													<span class="entry-text">
													<?php 
													//wp_limit_abz($extracto_caption);
													//wp_limit_post($extracto_caption, 250,'...',true);
													?>
													</span>
													<br clear=all/>
		
													<?php
														$tags_list = get_the_tag_list( '', ', ' );
														if ( $tags_list ):
													?>
														<span class="tag-links">
															<?php printf( __( '<span class="%1$s">Etiquetas</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
														</span>
														<span class="meta-sep">|</span>
													<?php endif; ?>

													<?php foreach((get_the_category()) as $category) {
														    		 $name_cat2=$category->slug;
													}?>
													<br clear=all/>
													<div class="entry-meta">
														<div style="float:left; font-size:14px; color: <?php echo cat_color($name_cat2);?> !important;"><?php twentyten_posted_on(); ?></div>
													</div><!-- .entry-meta -->
												</div>
									</div>
									<?}?>
									
									
									<!-- POSTS SIGUIENTES -->
									<?if($c>=1){?>
											<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
												
												<?php if ( is_archive() || is_search() || is_tag() ) : // Only display excerpts for archives and search. ?>
				
														<div class="entry-content4">
				
															<?php 
																// IMG POST
																$Html_ch = "";
																$Html_ch = get_the_content();
																//exit("<br>".$Html);
				 											    $extrae = '/<img (.+?)>/';
				    											$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';
				
															    // Extraemos todas las imágenes
															    preg_match_all( $extrae  , $Html_ch , $matches );
															    $image_ch = $matches[1][0];
																preg_match_all( $extrae2 , $Html_ch , $matches2 );
																$image2 = $matches2[1][0];
																
																/*if($_GET["abz"]==1)
																{
																	echo("1) ".$image);
																	exit("<br/>2) ".$image2);
																}*/
																//print_r($matches);
																$image_ch_explode=explode("title",$image_ch);
																$image_ch_explode=$image_ch_explode[0];
															 
															    if($image_ch)
															    {?>
																	<div class="imagen_post">
																			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image_ch_explode;?> alt="<?php the_title(); ?>" width="293" title="<?php the_title(); ?>" /></a>
																	</div>
																<?}else{?>
																	<div class="imagen_post_gen">
																		<a href="#">
																			<img src="<?php bloginfo('template_url')?>/images/generica.jpg" alt="E imagen generica" />
																		</a>
																	</div>
				                       							<?}?>
				
				                       							<?
														    	$patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
														        $extracto = '';
														        if (preg_match($patron, $Html, $extracto1)) 
														        { 
														            $extracto_caption = $extracto1[1];
														        } 
														       	?>
				
														</div><!-- .entry-content -->
				
				
														<div class="entry-content3">
															
																<!-- CATEGORIA / SECCION -->
																<?php foreach((get_the_category()) as $category) {
														    		 $name_cat2=$category->slug;
																}
																?>
																<style type="text/css">
																.entry-title span,
																.entry-title span a, 
																.entry-content_int_gr_ab .entry-title span a{
																	color: <?php echo cat_color($name_cat2);?> !important;
																}
																</style>
															<span class="entry-text"><!-- / CATEGORIA / SECCION -->
																<h2 class="entry-title">
																	<span ><?php echo get_the_category_list( ', ' ); ?> / </span>
																	<a href="<?php the_permalink();?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="titulo_ch"><?php the_title(); ?>
																	</a>
																</h2>
															<?php 
															//wp_limit_abz($extracto_caption);
															//wp_limit_post($extracto_caption, 250,'...',true);
															?>
															<?php //the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); ?>
															</span>

															<div class="entry-meta">
																<div style="float:left; font-size:12px; color: <?php echo cat_color($name_cat2);?> !important;"><?php twentyten_posted_on(); ?></div>
															</div><!-- .entry-meta -->
														</div>
														
												<?php endif; ?>
											</div>
		
									<?}?>
									
									<?php if (is_home()){?>
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									 		<!-- BANNER ADPOST-->
											<?echo quien_es("310","30",$post->ID);?>
									 		<!-- / BANNER ADPOST-->
									 
											<div class="entry-content2">

												<?
												$random=rand(1,10);
												$bg_fondo=rnd_color($random);
												?>

												<!-- CATEGORIA / SECCION -->
												<div class="entry-utility">
													<?php if ( count( get_the_category() ) ) : 
														foreach((get_the_category()) as $category) {
														     $name_cat=$category->slug;
														}
														?>
														<h3 style="background-color: <?php echo cat_color($name_cat);?> !important;">
															<?php echo get_the_category_list( ', ' ); ?>
														</h3>
													<?php endif; ?>
												</div>
												<!-- / CATEGORIA / SECCION -->
	
												<?php //the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); 
													
														$tiene_video_home=0;
														
														//YOUTUBE $content 
														$embed2_home="";
														$embed_home="";
														$Html_vid="";
														$Html_vid = get_the_content();
													    $extrae_vid = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vid , $Html_vid , $matches_vid );
														$video = $matches_vid[1][0];
														$video=substr($video,0, 28);
														//echo($video."::VIDEO");
														 if($video=="http://www.youtube.com/embed")
														{
													    	$parser_vid='|\<iframe (.*?)iframe\>|is'; 
		
															if(preg_match($parser_vid, $Html_vid, $embed3)) 
															{ 
																$embed2_home=$embed2_home.$embed3[1];
															} 
		
															$embed_home=str_replace('width="570"', 'width="310"', $embed2_home);
															$embed_home=str_replace('height="370"', 'height="200"', $embed_home);
															$embed_home=str_replace('height="412"', 'height="200"', $embed_home);

															if($embed_home) echo'<div class="entry-thumb"/><iframe  '.$embed_home.'iframe></div>';
															$video_youtube=1;
													    }else{
													    	$video_youtube=0;
													    }

												     	//VIMEO $content 
														$embed_cod22="";
													    $extrae_vimeo = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
														preg_match_all( $extrae_vimeo , $Html_vid , $matches_vimeo );
														$video_vimeo = $matches_vimeo[1][0];
														$video_vimeo=substr($video_vimeo,0, 30);

														//echo($video."::VIDEO");
														 if($video_vimeo=="http://player.vimeo.com/video/")
														{
															$parser_vimeo='|\<iframe (.*?)iframe\>|is'; 

															if(preg_match($parser_vimeo, $Html_vid, $embed33)) 
															{ 
																$embed22=$embed22.$embed33[1];
															} 

															$embed_cod22=str_replace('width="570"', 'width="310"', $embed22);
															$embed_cod22=str_replace('height="370"', 'height="200"', $embed_cod22);
															$embed_cod22=str_replace('height="412"', 'height="200"', $embed_cod22);

															if($embed_cod22) echo ('<div class="entry-thumb"/><iframe  '.$embed_cod22.'iframe></div>');
															$video_vimeo=1;

														}else{
															$video_vimeo=0;
														}

	
													    //BRIGHTCOVE
														$embed_cod="";
														$brightcove="";
														$brightcove_inicio=explode("<!-- Start of Brightcove Player -->", $Html_vid);
														$comienzo=$brightcove_inicio[1];

														$brightcove_fin=explode('<script type="text/javascript">brightcove.createExperiences();</script>', $comienzo);
														$brightcove=$brightcove_fin[0];
														
														if($brightcove!="") {
															$parser='|\<object (.*?)object>|is'; 
															     
															if(preg_match($parser, $brightcove, $embed1)) 
															{ 
																$embed=$embed.$embed1[1];
															} 

															$embed_cod=str_replace('<param name="width" value="480" />', '<param name="width" value="310" />', $embed);
															$embed_cod=str_replace('<param name="height" value="270" />', '<param name="height" value="200" />', $embed_cod);
															$embed_cod=str_replace('<param name="width" value="570" />', '<param name="width" value="310" />', $embed_cod);
															$embed_cod=str_replace('<param name="height" value="370" />', '<param name="height" value="200" />', $embed_cod);

														
													  		echo("<object ".$embed_cod."object><script type='text/javascript'>brightcove.createExperiences();</script>");
															$video_brigth=1;
														}else{
													    	$video_brigth=0;
													    }
	
														// IMG POST
														//$Html = get_the_content();
		 											    $extrae = '/<img (.+?)>/';
		    											$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';
		
													    // Extraemos todas las imágenes
													    preg_match_all( $extrae  , $Html_vid , $matches );
													    $image = $matches[1][0];
														preg_match_all( $extrae2 , $Html_vid , $matches2 );
														$image2 = $matches2[1][0];
														$tiene_video=1;
														
									
														 $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
													        $extracto_caption = '';
													        if (preg_match($patron, $Html_vid, $extracto1)) 
													        { 
													            $extracto_caption = $extracto1[1];
													        } 

													    if($video_brigth==1 or $video_youtube==1 or $video_vimeo==1) $tiene_video_home=1;

													    $image_explode=explode("title",$image);
														$image_explode=$image_explode[0];
													    
													    if($tiene_video_home==0){
														    if($image)
														    {?>
																<div class="imagen_post">
																	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img <?php echo $image_explode;?> alt="<?php the_title(); ?>" width="293" title="<?php the_title(); ?>" /></a>
																</div>
																<?
																
														       	echo("<div class='caption_img'>".$extracto_caption."</div>");
														       	?>
			                       							<?}?>
			                       						<?}?>
		
	
											</div><!-- .entry-content -->
											
											<div class="entry-content <?php echo $bg_fondo;?>">
												<div class="entry-meta">
													<div style="float:left; font-size:10px;"><?php twentyten_posted_on(); ?></div>
												</div><!-- .entry-meta -->
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
												</h2>
												<span class="entry-text">
												<?php 
												wp_limit_abz($extracto_caption);
												//wp_limit_post($extracto_caption, 250,'...',true);
												?>
												</span>
											</div>
											
									</div><!-- #post-## -->
									<?
									$tiene_video_home=0;
									}?>			

						<?}?>
					<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>