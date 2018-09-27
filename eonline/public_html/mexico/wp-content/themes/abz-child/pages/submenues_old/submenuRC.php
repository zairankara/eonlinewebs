                            <style type="text/css">
                            .nav__subnav--type2 {
                                text-align: center;
                                background-color: #212b37;
                                width: 290px;
                                border-left: 5px solid #f93c53;
                                padding: 0;
                                font-family: "Oswald","Helvetica",sans-serif;
                                font-size: 16px;
                                font-weight: 700;
                                letter-spacing: .05em;
                            }
                            .nav__subnav--type2 li{
                                max-width: 100%;
                                width: 100%;
                                min-height: inherit;
                                padding: 15px 5px 15px 20px;
                                margin: 0;
                                border-bottom: 1px solid #37485d;
                            }
                            .nav__subnav--type2 li a{
                                color: white;
                                min-height: inherit;
                            }
                            .nav__subnav--type2 a:hover {
                                color: #ebd913;
                            }
                            </style>

                            <ul id="Header_RCSubMenu" class="submenu container col-md-12">
                                <li style="max-width: 290px;">
                                    <ul class="nav__subnav--type2">
                                        <li><a href="/argentina/?s=oscar" class="">OSCAR</a></li>
                                        <li><a href="/argentina/?s=grammy" class="">GRAMMY AWARDS</a></li>
                                        <li><a href="/argentina/?s=sag" class="">SAG AWARDS</a></li>
                                        <li><a href="/argentina/?s=emmy" class="">EMMY AWARDS</a></li>
                                    </ul>
                                </li>
								<?php
								// The Query
								query_posts( 'category_name=alfombraroja&posts_per_page=5' );

								// The Loop
								while ( have_posts() ) : the_post();
                                    echo '<li>';
                                    //the_title();
                                    //the_content(bootstrapBasicMoreLinkText());
                                    //the_excerpt();

                                    // IMG POST
                                    $Html = get_the_content();
                                    //$image3=sacar_img_con_src($Html);
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

