<?php if (is_active_sidebar('sidebar-right')) { ?>

				<div class="col-lg-3 col-xs-12 text-center" id="sidebar-right" data-sticky_column>

                    <!-- Banner native ad -->
                    <aside class="widget publicidad">
                        <div id='div-gpt-ad-native-300x250-1' style='height:250px; width:300px;'>
                            <script type="text/javascript">
                                googletag.cmd.push(function() { googletag.display('div-gpt-ad-native-300x250-1'); });
                            </script>
                        </div>
                    </aside>
                    <!-- / Banner native ad -->

                    <!-- Banner DoubleBox -->
                    <aside class="widget publicidad">
                        <!--<img class="replace-2x" src="http://placehold.it/300x600" width="300" height="600" alt="">-->
                        <?php echo que_doublebox_es();?></aside>
                    <!-- / Banner DoubleBox -->


                    <!-- ADSERVER 300X250 ARRIBA-->
                    <aside class="widget publicidad">
                        <!--<img class="replace-2x" src="http://placehold.it/300x250" width="300" height="250" alt="">-->
                        <?php echo quien_es("300","250","1");?>
                    </aside>
                    <!-- / ADSERVER-->

                    <!-- SLIDER BANNERS -->

                        <aside id="modulo_imagenes_slider" class="widget" >

                            <!-- Slider -->
                            <div id="slides">
                                    <?php
                                    function fecha (){
                                        $vect=getdate();
                                        $vect_dia=array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
                                        return $vect_dia[$vect[wday]];
                                    }

                                    $dia_semana= fecha();
                                    $hoy_fecha=date("Y-m-d");

                                    $mydb = new wpdb(DBUSER,DBPASS,DBNAME,DBHOST);

                                    $sqlstr="SELECT *
										FROM abmBanners
										WHERE id_feed=". IDFEED ." AND activo=1 AND newdesign=1 AND ( (CURDATE()>=dia AND CURDATE()<=dia_fin AND dia!='0000-00-00' AND dia_fin!='0000-00-00') OR ".$dia_semana."=1) ORDER by fecha DESC";

                                    $testRows = $mydb->get_results($sqlstr);
                                    foreach ($testRows as $row) {

                                        $id_banner =$row->id;
                                        $id_feed =	$row->id_feed;
                                        $link	=	$row->link;
                                        $texto	=	utf8_decode($row->texto);
                                        $target	=	$row->target;

                                        if($link=="") $link="#";

                                        ?>
                                        <div class="slide">
                                            <?if($link!="#"){?><a href="<?=$link?>" target="<?=$target?>" title="<?=$texto?>" alt="<?=$texto?>" <?php echo $var_on;?>><?}?>
                                                <img src="http://la.eonline.com/admin2012/banners/uploads/<?=$id_banner?>.jpg" title="<?=$texto?>" alt="<?=$texto?>" class="img-responsive" />
                                                <?if($link!="#"){?></a><?}?>
                                            <div class="captionslider" style="bottom:0">
                                                <p><?=$texto?></p>
                                            </div>
                                        </div>
                                        <?

                                    }
                                    ?>

                            </div>

                        </aside>
                        <!-- / slider -->

                    <!-- /-->


                    <!-- BRIGHTCOVE -->
                    <aside id="modulo_videos_arriba" class="widget">
                        <?php include(STYLESHEETPATH ."/videos.php"); ?>
                    </aside>
                    <!-- /-->


                    <!-- SI ES HOME O CATEGORIA FASHIONBLOGGER -->
                    <?php
                    if(is_home() || is_category("efashionblogger")){?>
                        <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/EFB/index.php');?>
                    <?}?>
                    <!-- /-->

                    <!-- INSTAGRAM -->
                   <!--  <aside id="" class="widget">
                        <h3 class="cab_sidebar_instagram"><a href="#" class="widget-title"><strong>E! ONLINE BRASIL </strong>NO INSTAGRAM</a></h3>
                        <?php include('http://la.eonline.com/varios/JSON/JSONinstagram/frontend-BR.php');?>
                      
                    </aside> -->
                    <!-- /INSTAGRAM -->

                    <!-- ADSERVER 300X250 ABAJO-->
                    <aside class="widget publicidad">
                        <!--<img class="replace-2x" src="http://placehold.it/300x250" width="300" height="250" alt="">-->
                        <?php echo quien_es("300","250","2");?>
                    </aside>
                    <!-- / ADSERVER-->

                    <!-- the trend -->
                    <aside id="thetrendbox" class="widget">
                        <?php include(STYLESHEETPATH ."/pages/post_thetrend.php"); ?>
                    </aside>
                    <!-- /the trend -->

                    <!-- POST DEL DIA -->
                    <aside id="fotodeldiabox" class="widget">
                        <?php include(STYLESHEETPATH ."/pages/foto_del_dia.php"); ?>
                    </aside>
                    <!-- /POST DEL DIA -->


                    <?php do_action('before_sidebar'); ?>
					<?php dynamic_sidebar('sidebar-right'); ?> 
				</div>
<?php } ?> 