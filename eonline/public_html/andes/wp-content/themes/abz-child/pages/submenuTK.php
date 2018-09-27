                            <ul id="Header_TKSubMenu" class="submenu container col-md-12">
								<?php
								// The Query
								query_posts( 'category_name=the-kardashians&posts_per_page=7' );

								// The Loop
								while ( have_posts() ) : the_post();
                                    echo '<li>';
                                    //the_title();
                                    //the_content(bootstrapBasicMoreLinkText());
                                    //the_excerpt();

                                    // IMG POST
                                    $Html = get_the_content();
                                    $image3=sacar_img_con_src($Html);
                                    $image_ch_explode_resize=url_resize($Html,145);


                                    if($image_ch_explode_resize){?>

                                        <div class="client-slice">

                                            <div class='imagen_post'>
                                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" width="145" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
                                            </div>

                                            <div class='tit_post'>
                                                <a class="entry-text" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                            </div>

                                        </div>
                                        <?
                                        $p++;
                                    }

                                    echo '</li>';
                                endwhile;

								// Reset Query
								wp_reset_query();
								?>
                            </ul>

