<?php
/**
 * The main template file
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>

<?php //get_sidebar('left'); ?>

                <!-- Banner 320x50 / ONLY MOBILE-->
                <aside id="menu-tabs" class="row hidden-sm hidden-md hidden-lg text-center">
                   <a href="#" class="col-xs-4">NOTICIAS</a>
                    <a href="<?php echo home_url( '/' ); ?>pagina/fotos-mexico" class="col-xs-4">FOTOS</a>
                    <a href="<?php echo home_url( '/' ); ?>pagina/videos-2/" class="col-xs-4">VIDEOS</a>
                </aside>
                <!-- Banner 320x50 -->

                <div class="col-md-12 col-lg-12">

                     <!-- BANNER ARIANA GRANDE -->
                    <!-- descomentar -->
                        
                           <!--   <a href="http://la.eonline.com/experience/onelovemanchester" target="_blank"><img src="/common/imgs/banner_acceso_home.png" alt="" class="img-responsive" style="margin:5px auto; max-width: 970px" />   -->

                    <!-- /BANNER ARIANA GRANDE -->
                
                    <?php if(is_home()){
                        $postSlug="home";
                    }elseif(is_category()){
                        $cat = get_term_by('name', single_cat_title('',false), 'category');
                        $postSlug=$cat->slug;
                    }elseif(is_page()){
                        $postSlug=explode("/", $_SERVER["REQUEST_URI"]);
                        $postSlug=$postSlug[3];
                    }
                    ?>


                    <?php
                    if( (is_home() || is_front_page()) && !is_paged() ){?>
                        
                        
                        <!-- LIVESTREAMING-->
                        <script type="text/javascript" id="script_live">
                            var var_feed = <?php echo IDFEED;?>;
                            var testliveS = '<?php echo $_GET["testliveS"];?>';
                            var testliveE = '<?php echo $_GET["testliveE"];?>';
                            var existeLS = '';

                            if(isMobile()) {var varMobile = 1;}else{var varMobile = 0;}

                            jQuery.getJSON( "/common/status_lives/live_status.json", function(data) {
                                
                                 if(data.eventos.livefrome==1){
                                    console.log("LFE");
                                    
                                    //habilitar LFE
                                    jQuery.ajax({
                                        type: "GET",
                                        url: "/common/liveFromE_2016.php",
                                        data: "var_feed="+var_feed+"&testlive="+testliveE+"&varMobile="+varMobile+"&Slug=<?php echo $postSlug?>",
                                        cache: true,
                                        async: true,
                                        success: function(respuesta2) {
                                            var str2 = respuesta2;
                                            var res2 = str2.replace(" ", "");
                                            res2 = res2.trim();
                            
                                            //console.log("liveFromE Index: "+res2.indexOf("iframe"));

                                            if(res2.indexOf("iframe")!=-1){ // si existe Livestreaming no muestro los videos
                                                 ejecutarVIDEOS(0);
                                                 jQuery("article#liveFromE").html(res2);
                                                 //console.log("no muestra video");
                                            }else{
                                                //console.log("muestra video");
                                                ejecutarVIDEOS(1);
                                            }
                                        }
                                    });

                                 }else if(data.eventos.livestreaming==1){
                                     console.log("LIVES");
                                      //habilitar LIVESstreamings

                                      jQuery.ajax({
                                            type: "GET",
                                            url: "/common/lives_2016.php",
                                            data: "var_feed="+var_feed+"&testlive="+testliveS+"&varMobile="+varMobile+"&Slug=<?php echo $postSlug?>",
                                            cache: true,
                                            async: true,
                                            success: function(respuesta3) {
                                                var str3 = respuesta3;
                                                var res3 = str3.replace(" ", "");
                                                res3 = res3.trim();
                                
                                                //console.log("lives Index: "+res3.indexOf("iframe"));

                                                if(res3.indexOf("iframe")!=-1){ // si existe Livestreaming no muestro los videos
                                                     ejecutarVIDEOS(0);
                                                     jQuery("article#lives").html(res3);
                                                     //console.log("no muestra video");
                                                }else{
                                                    //console.log("muestra video");
                                                    ejecutarVIDEOS(1); 
                                                }
                                            }
                                        });


                                 }else{
                                    //console.log("NADA");
                                 }
                            })
        
                            
                        </script>
                        <!-- LIVESTREAMING-->


                        <!-- VIDEOS IN HOME-->
                        <script type="text/javascript" data-device="1" id="script_videos_inhome">
                                //console.log("mostrarVideos");

                                function ejecutarVIDEOS(status){

                                    if(status==1){
                                        var name_feed = "<?php echo ucwords(NAMEFEED);?>";
                                        var playlist = "<?php echo $playlist_HM;?>";

                                        jQuery.ajax({
                                            type: "GET",
                                            url: "/common/videos_inhome/videos_inhome_2017_mx.php",
                                            data: "name_feed=" + name_feed + "&playlist=" + playlist + "",
                                            cache: true,
                                            async: true,
                                            success: function (respuesta) {
                                                jQuery("#videos_inhome").html(respuesta);
                                            },
                                            error: function (error) {
                                                //console.log(error);
                                            }
                                        });
                                    }
                                }
                                
                        </script>

                        <div id="videos_inhome" ></div>
                        <!-- / VIDEOS IN HOME-->

                        
                    <?php } ?>
                </div>

                <!-- Banner 320x50 / ONLY MOBILE-->
                <aside class="col-xs-12 hidden-sm hidden-md hidden-lg text-center">
                    <div id="div-gpt-ad-home-320x50-1" style="width:320px; margin-bottom:10px;" class="publicidad">
                        <script type="text/javascript">
                        googletag.cmd.push(function() {
                            googletag.display('div-gpt-ad-home-320x50-1');
                        });
                        </script>
                    </div>
                </aside>
  

                <div class="col-xs-12 col-lg-<?php echo $main_column_size;?> content-area" id="main-column" data-sticky_column>
                
	            
	                        <!-- MODULO RED CARPET SEASON-->
	                        <script type="text/javascript" data-device="1" id="script_lineup">
	                            var var_feed = <?php echo IDFEED;?>;
	
	                            jQuery.getJSON( "/experience/redcarpetseason/estado.json", function(data) {
	                                if(data.eventos.lineup==1){
	                                        jQuery.ajax({
	                                           type: "POST",
	                                           url: "/experience/redcarpetseason/lineup/index.php",
	                                           data: "var_feed="+var_feed+"&dateCache=" + new Date().getTime(),
	                                           cache: false,
	                                           success: function(respuesta) {
	                                              jQuery("#lineup").html(respuesta).show();
	                                           }
	                                        });
	                                } else{
	                                        jQuery("#content_lineup").remove();
	                                }
	                            })
	                            .done(function() {
	                            	//console.log( "second success" );
	                            })
	                            .fail(function() {
	                            	//console.log( "error" );
	                            })
	                            .always(function() {
	                            	//console.log( "complete" );
	                            });
	
	                        </script>
	                    
	                         <div class="col-md-12 col-lg-12" id="content_lineup">
	                            <div id="lineup"></div>
	                         </div>

                        <article id="lives" class="col-xs-12"></article>
                        <article id="liveFromE" class="col-xs-12"></article>
                        <main id="main" class="site-main" role="main">
                            <aside class="grid effect-5" id="grid" >
                                
                                <!-- Brangelina -->
                                <!--<article class="col-xs-12 col-sm-4 grid-item"><a href="/<?php echo NAMEFEED; ?>/tag/brangelina/"><img src="/varios/assets/variete/brangelina.jpg" class="img-responsive"></a></article>-->
                                <!-- / Brangelina -->

                                <!-- CELEBRITE 2016 -->
                                 <!--<article class="col-xs-12 col-sm-4 grid-item"><a href="http://la.eonline.com/experience/celebrity_2016/" target="_blank"><img src="/varios/assets/variete/fijo_celebrity.gif" class="img-responsive"></a></article>-->
                                 <!-- / CELEBRITE 2016 -->

                                 <!-- DiaDeAmigas -->
                                <!--<article class="col-xs-12 col-sm-4 grid-item"><a href="http://la.eonline.com/diadeamigas/"><img src="/varios/assets/variete/diadeamigas.jpg" class="img-responsive"></a></article>-->
                                <!-- / DiaDeAmigas -->
                                
                                <?php if (have_posts()) { ?>

                                        <?php
                                        $i=1;
                                        // start the loop
                                        while (have_posts()) {
                                            the_post();

                                            get_template_part('content', get_post_format());
                                            if($i==3) include (STYLESHEETPATH . '/pages/galerias_destacadasJSON.php');
                                            if($i==3) include (STYLESHEETPATH . '/pages/post_destacados.php');
                                            
                                            if($i==3) {?>
                                                <article class="grid-item col-xs-12 hidden-sm col-md-4 text-center publicidad box_middle" >
                                                    <?php echo quien_es("300","250","3");?>
                                                </article>
                                            <?php }

                                            if($i==4) {?>
                                                <article class="grid-item col-xs-12 hidden-sm col-md-4 text-center publicidad box_middle" >
                                                   <!-- Banner native ad -->
                                                        <div id='div-gpt-ad-native-300x250-2' style='height:250px; width:300px;'>
                                                           <script type="text/javascript">
                                                           googletag.cmd.push(function() {
                                                                googletag.display('div-gpt-ad-native-300x250-2');
                                                            });
                                                            </script>
                                                        </div>
                                                    <!-- / Banner native ad -->
                                                </article>
                                            <?php }

                                             if($i==10) {?>
                                                <article class="grid-item col-xs-12 hidden-sm col-md-4 text-center publicidad box_middle" >
                                                    <?php echo quien_es("300","250","4");?>
                                                </article>
                                            <?php }

                                            if($i==13) {?>
                                                <article class="grid-item col-xs-12 hidden-sm col-md-4 text-center publicidad box_middle" >
                                                    <?php echo quien_es("300","250","5");?>
                                                </article>
                                            <?php }
                                            $i++;
                                        }
                                        //bootstrapBasicPagination();
                                        ?>
                                <?php } else { ?>
                                    <?php get_template_part('no-results', 'index'); ?>
                                <?php } // endif; ?>
                            </aside>
                        </main>
                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                        <nav id="nav-below" class="navigation">
                            <div class="nav-previous" style="display: none;"><?php previous_posts_link( __( 'Regresar', 'boostrap-basic' ) ); ?></div>
                            <div class="nav-next categorygrid__morebutton"><?php next_posts_link( __( '+ Información', 'boostrap-basic' ) ); ?></div>
                        </nav><!-- #nav-below -->
                    <?php endif; ?>
                </div>

<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 