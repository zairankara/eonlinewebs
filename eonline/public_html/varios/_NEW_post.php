<?php if(is_home() || is_category()){?>
                  <li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

											<?
											
                      /*$anunciante=get_post_meta($post->ID, 'anunciante', true);
											$anunciante_array=explode("###",$anunciante);
											if($anunciante_array[1]!="") {?>
												<!-- BANNER ADPOST-->
												<?echo quien_es_adpost("310","30",$post->ID,$anunciante_array[1]);?>
										 		<!-- / BANNER ADPOST-->
									 		<?}?>
                      */?>
                      <?//echo quien_es("310","30",$post->ID);?>
									 
											<div class="entry-content2">

												<?
												$random=rand(1,10);
												$bg_fondo=rnd_color($random);
												?>

												<!-- CATEGORIA / SECCION -->
												<div class="entry-utility">
													<?php //echo $post->ID;?> <?php
                          if(is_home()){
                               if ( count( get_the_category() ) ) {
      														foreach((get_the_category()) as $category) {
      														     $name_cat=$category->slug;
      														}
      														?>
    														<h3 style="background-color: <?php echo cat_color($name_cat);?> !important;">
    															<?php echo get_the_category_list( ', ' ); ?>
    														</h3>
    													<?}
                            }else{
                                $cat = get_term_by('name', single_cat_title('',false), 'category'); 
                                $name_cat=$cat->slug;
                                $cat_name=$cat->name;
                                ?>
                                <h3 style="background-color: <?php echo cat_color($name_cat);?> !important;">
                                  <?php echo $cat_name; ?>
                                </h3>
                                <?
                            }?>
												</div>
												<!-- / CATEGORIA / SECCION -->

  											<?php 
												$Html="";
												$Html = get_the_content();
												$patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
											    $extracto_caption = '';
										     
										        if (preg_match($patron, $Html, $extracto1)) 
										        { 
										            $extracto_caption = $extracto1[1];
                                $cant_len=strlen($extracto_caption);
										        } 

											    $tiene_video_home=sacar_video($Html);
											    $image_ch_explode=sacar_img_con_src($Html);
                          $image_ch_explode_resize=url_resize($Html,310);
														
											    if($tiene_video_home==""){
												    if($image_ch_explode_resize)
												    {?>
  														<div class="imagen_post">
  														<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
  														</div>
  														<?php echo("<div class='caption_img'>".$extracto_caption."</div>");?>
	                       		<?}?>
	                       	<?}else{?>
														<?php echo $tiene_video_home;?>
	                       	<?}?>
		
	
											</div><!-- .entry-content -->
											
											<div class="entry-content <?php echo $bg_fondo;?>">


                        <!-- REDES SOCIALES POR POST-->
                        <div class="social-icons-small" data-url="<?php the_permalink() ?>">
                                <div class="social-icon facebook">
                                  <a class="social-fb" target="_blank" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"></a>
                                </div>
                                <div class="social-icon twitter">
                                  <a class="social-tw" href="https://twitter.com/share?text=<?php echo urlencode($post->post_title); ?>&url=<?php the_permalink(); ?>" target="_blank"></a>
                                </div>
                        </div>
                        <!-- / REDES SOCIALES POR POST-->

												<div class="entry-meta">
													<div style="float:left; font-size:10px;"><?php twentyten_posted_on(); ?></div>
												</div><!-- .entry-meta -->
												<h2 class="entry-title">
													<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
												</h2>
												<span class="entry-text">
												<?php 
                        wp_limit_abz($cant_len);
												//wp_limit_post($extracto_caption, 250,'...',true);
												?>
												</span>
											</div>
											
									</li>
                  <!-- #post-## -->
									<?
									$tiene_video_home=0;
}?>	


<!-- SI ES ARCHIVO, BUSQUEDA Y TAGS -->
<?php if( is_search() || is_tag() ){?>

  <!-- PRIMER POST DESTACADO -->
  <?php if($c==0) {?>
                  <div id="post-<?php the_ID(); ?>" class="hentry_gr">
                        <div class="entry-content_int_gr_arr">
    
                          <?php //the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); 
                            
                            $Html="";
                            $Html = get_the_content();
                            $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is'; 
                              $extracto_caption = '';
                             
                                if (preg_match($patron, $Html, $extracto1)) 
                                { 
                                    $extracto_caption = $extracto1[1];
                                } 

                              $tiene_video_home=sacar_video($Html);
                              $image_ch_explode=sacar_img_con_src($Html);
                              $image_ch_explode_resize=url_resize($Html,310);
                  
                                                                    
                              if($tiene_video_home==""){
                                if($image_ch_explode_resize)
                                {?>
                                <div class="imagen_post">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                <img src="<?php echo $image_ch_explode_resize;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                </a>
                                </div>
                                <?php echo("<div class='caption_img'>".$extracto_caption."</div>"); ?>
                                 <?}?>
                              <?}else{?>
                                <?php echo $tiene_video_home;?>
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
                              } elseif ( in_category('efashionblogger') || is_category('efashionblogger')) {
                                $color_txt="style_fashion_txt";
                              } elseif ( in_category('thetrend') || is_category('thetrend')) {
                                $color_txt="style_thetrend_txt";
                              } elseif ( in_category('estrenos') || is_category('estrenos')) {
                                $color_txt="style_estrenos_txt";
                              }else{
                                $color_txt="";
                              }?>
                            <?php endif; ?>
                            <span class="<?=$color_txt?>"><?php echo get_the_category_list( ', ' ); ?> / </span>
                            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                          </h1>
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
                        
        
                            <div class="entry-content4">
        
                              <?php 
                                $Html="";
                                $Html = get_the_content();
                                $image_ch_explode=sacar_img_con_src($Html);
                                $image_ch_explode_resize=url_resize($Html,140);

                              if($image_ch_explode){?>
                                  <div class="imagen_post">
                                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                  <img src="<?php echo $image_ch_explode_resize;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                  </a>
                                  </div>
                                <?}else{?>
                                  <div class="imagen_post_gen">
                                    <a href="#">
                                      <img src="<?php bloginfo('template_url')?>/images/generica.jpg" alt="Imagen E!" title="Imagen E!" />
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
                              </span>

                              <?php
                            $tags_list = get_the_tag_list( '', ', ' );
                            if ( $tags_list ):
                          ?>
                            <span class="tag-links">
                              <?php printf( __( '<span class="%1$s">Etiquetas</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
                            </span>
                            <span class="meta-sep">|</span>
                          <?php endif; ?>

                              <div class="entry-meta">
                                <div style="float:left; font-size:12px; color: <?php echo cat_color($name_cat2);?> !important;"><?php twentyten_posted_on(); ?></div>
                              </div><!-- .entry-meta -->
                            </div>
                            
                      </div>
    
  <?}?>
<?}?>