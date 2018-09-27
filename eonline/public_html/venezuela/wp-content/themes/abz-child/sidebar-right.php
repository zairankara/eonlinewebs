<?php if (is_active_sidebar('sidebar-right')) { ?>

				<div class="col-lg-3 col-xs-12 text-center" id="sidebar-right" data-sticky_column>

                    <!-- Banner native ad -->
                    <aside class="widget publicidad">
                        <div id='div-gpt-ad-native-300x250-1' style='height:250px; width:300px;'>
                            <script type="text/javascript">
                                googletag.cmd.push(function() {
                                    googletag.display('div-gpt-ad-native-300x250-1');
                                });
                            </script>
                        </div>
                    </aside>
                    <!-- / Banner native ad -->

                    <!-- Banner DoubleBox -->
                    <aside class="widget publicidad">
                        <!--<img class="replace-2x" src="http://placehold.it/300x600" width="300" height="600" alt="">-->
                        <?php echo que_doublebox_es();?></aside>
                    <!-- / Banner DoubleBox -->


                    <?php if(is_category("amamos-las-pelis")):?>

                        <ul class="sidebar_300" style="margin-bottom:10px;">
                            <li>
                                <?php include(STYLESHEETPATH."/pages/amamos_las_pelis_side.php");?>
                            </li>
                        </ul>

                    <?php endif; ?>

                    <!-- FOTO DEL DIA AMAMOS-->
                    <?php include(STYLESHEETPATH ."/foto_del_dia_amamos.php"); ?>
                    <!-- / FOTO DEL DIA AMAMOS-->

                    <!-- ADSERVER 300X250 ARRIBA-->
                    <aside class="widget publicidad">
                        <!--<img class="replace-2x" src="http://placehold.it/300x250" width="300" height="250" alt="">-->
                        <?php echo quien_es("300","250","1");?>
                    </aside>
                    <!-- / ADSERVER-->

                    <!-- SLIDER BANNERS -->
                    <?if(is_home()){?>

                        <aside id="modulo_imagenes_slider" class="widget">

                            <!-- Slider -->
                            <div id="slides" class="JSON">
                                    <?php
                                    function fecha (){
                                        $vect=getdate();
                                        $vect_dia=array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
                                        return $vect_dia[$vect[wday]];
                                    }

                                    $dia_semana= fecha();
                                    $hoy_fecha=date("Ymd");

                                    $urlBanners = 'http://la.eonline.com/varios/JSON/JSONbanners/banners.json';
                                    $contentsBanners = file_get_contents($urlBanners);
                                    $json_strBanners = utf8_encode($contentsBanners);
                                    
                                    $bannersJSON = json_decode($json_strBanners,true);

                                    foreach ($bannersJSON["vz"] as $row) {
                                        $diaJSON = str_replace("-", "", $row["dia"]);
                                        $dia_finJSON = str_replace("-", "", $row["dia_fin"]);

                                        if(  ($hoy_fecha>=$diaJSON && $hoy_fecha<=$dia_finJSON && $diaJSON!='00000000' && $dia_finJSON!='00000000') || $row[$dia_semana]==1 ){
                                            
                                            $id_banner = $row["id"];
                                            $id_feed =  $row["id_feed"];
                                            $link   =   $row["link"];
                                            $texto  =   utf8_decode($row["texto"]);
                                            $target =   $row["target"];

                                            if($link=="") $link="#";

                                            ?>
                                            <div class="slide">
                                                <?if($link!="#"){?><a href="<?php echo $link?>" target="<?php echo $target?>" title="<?php echo $texto?>" alt="<?php echo $texto?>" <?php echo $var_on;?>><?}?>
                                                    <img src="/admin2012/banners/uploads/<?php echo $id_banner?>.jpg" title="<?php echo $texto?>" alt="<?php echo $texto?>" class="img-responsive" />
                                                    <?if($link!="#"){?></a><?}?>
                                                <div class="captionslider" style="bottom:0">
                                                    <p><?php echo $texto?></p>
                                                </div>
                                            </div>
                                            <?
                                        }
                                    }
                                    ?>

                            </div>

                        </aside>
                        <!-- / slider -->

                    <?}?>
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
                    <!-- <aside id="" class="widget">
                        <h3 class="cab_sidebar_instagram"><a href="#" class="widget-title"><strong>EONLINELATINO</strong> EN INSTAGRAM </a></h3>
                        <?php include($_SERVER["DOCUMENT_ROOT"].'/varios/JSON/JSONinstagram/frontend-LA.php');?>
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