                            <ul id="Header_FotosSubMenu" class="submenu container col-md-12">
                                <?php
                                $id_gal=NULL;
                                $galleries = obtener_galerias_page($id_gal, "7", "ng.fecha", "DESC", "ng.id");

                                foreach($galleries as $image) {

                                    $urlImg = $image["filename"];
                                    $urlImg = url_resize_sola($urlImg, 145);
                                    $vecUrl = explode("http://", $image["filename"]);
                                    $id_galeria = $image["gid"];
                                    $title = $image["title"];
                                    $title_gal = $image["title_gal"];
                                    $desc = "";
                                    ?>
                                    <li>
                                        <div class="client-slice">

                                            <div class='imagen_post'>
                                                <a href="/<?php echo $_GET["feed"];?>/pagina/galerias?gallery=<?php echo $id_galeria;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">                                                
                                                    <div class="nav__image-icon nav__image-icon--photo"></div>
                                                    <img src="<?php echo $urlImg;?>" width="145" alt="<?php echo $title_gal; ?>" title="<?php echo $title_gal; ?>" /></a>
                                            </div>

                                            <div class='tit_post'>
                                                <a class="entry-text" href="/<?php echo $_GET["feed"];?>/pagina/galerias?gallery=<?php echo $id_galeria;?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo $title_gal; ?></a>
                                            </div>

                                        </div>
                                    </li>
                                    <?
                                }

                                // Reset Query
                                wp_reset_query();
                                ?>
                            </ul>