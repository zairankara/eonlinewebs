<?php
/**
 * Template for dispalying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>


    <div class="swiper-container col-md-9">
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-wrapper">

            <div class="col-md-12 content-area swiper-slide" id="main-column">
                    <?php $postSlug="Nota"; ?>


                    <div id="main-single" class="col-md-9 col-xs-12">

                                <!-- PLAYER DE LA HOME CON PLAYLIST-->
                                <div id="playlist_single" style="position: relative; display: block; max-width: 570px;"><div style="padding-top: 56.2509%;"><iframe src="//players.brightcove.net/96980687001/B1pqtqxtx_default/index.html?playlistId=<?php echo playlist_HM; ?>" 
                                allowfullscreen 
                                webkitallowfullscreen 
                                mozallowfullscreen 
                                style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%; height: 100%;"></iframe></div></div>

                                   
                                    <style>
                                    #playlist_single{
                                        margin: 10px auto;
                                    }
                                    
                                    </style>
                                    <!--/   PLAYER DE LA HOME CON PLAYLIST-->

                        <article id="post-<?php the_ID(); ?>" class="site-main hentry_gr" role="main">

    
                        <?php setPostViews(get_the_ID()); // seteo una vista ?>
                        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                            <!-- CATEGORIA / SECCION -->
                            <?php
                            $es_wakeup=0;
                            $categorias_name="";

                            foreach((get_the_category()) as $category) {
                                $name_cat2=$category->slug;
                                if($name_cat2=="wakeup") {$es_wakeup=1;}else{}

                                if(count(get_the_category())>1){
                                    $categorias_name.=$category->cat_name.", ";
                                }else{
                                    $categorias_name.=$category->cat_name;
                                }

                            }
                            $categorias_name=trim($categorias_name, ',');
                            ?>

                            <?php
                            // IMG POST
                            $Html_post = get_the_content();
                            preg_match("/<img\s+.*?src=[\"\']?([^\"\' >]*)[\"\']?[^>]*>/i",$Html_post,$m);
                            $image22 = $m[1];
                            ?>


                            <div class="bloquesuperior_nota">
                                <h1 class="entry-title clearfix"><?php echo the_title(); ?></h1>
                                <h2 class="entry-title_sing" style=""><span><?php echo $categorias_name; ?> </span> | <cite class="date updated"><?php echo the_time(); ?></cite></h2>
                                <div class="entry-social">
                                    <?php $urltoshare=urlencode(get_permalink());?>
                                    <a href="//www.facebook.com/sharer.php?u=<?php echo $urltoshare;?>" class="facebook" target="_blank"></a>
                                    <a href="//twitter.com/share?url=<?php echo $urltoshare;?>" class="twitter" target="_blank">&nbsp;</a>
                                    <a href="//plus.google.com/share?url=<?php echo $urltoshare;?>" class="google-plus" target="_blank">&nbsp;</a>
                                    <a href="//pinterest.com/pin/create/button/?url=<?php echo $urltoshare;?>&media={MEDIA}&description={DESCRIPTION}" class="pinterest" target="_blank"></a>
                                    <a href="whatsapp://send?text=<?php echo the_title(); ?> <?php echo $urltoshare;?>" class="whatsapp" target="_blank" data-mostrarMobile="1" style="display:none;"></a>
                                </div>
                                <span class="vcard author " style="display:none;">
                                    <span class="fn"><a href="https://plus.google.com/109640549139413649832?rel=author" rel="author">Eonline Latino</a></span>
                                </span>
                                <div class="clearfix"></div>
                            </div>

                            <!-- Banner 320x50 / ONLY MOBILE-->
                            <aside class="col-xs-12 hidden-sm hidden-md hidden-lg text-center marginTB10">
                                <div id="div-gpt-ad-home-320x50-1" style="width:320px;" class="publicidad">
                                    <script type="text/javascript">
                                        googletag.cmd.push(function() { 
                                            googletag.display('div-gpt-ad-home-320x50-1'); 
                                        });
                                    </script>
                                </div>
                            </aside>
                            <!-- Banner 320x50 -->
      

                            <?php
                            echo '<div id="post_'. get_the_ID() .'" class="entry-content">';
                                $Html_post2 = do_shortcode($Html_post);

                                echo(nggScrollGalleryReplace2016($Html_post2));

                                //get_template_part('content', get_post_format());

                                echo "\n\n";

                                bootstrapBasicPagination();

                                echo "\n\n";

                                // If comments are open or we have at least one comment, load up the comment template
                                /*if (comments_open() || '0' != get_comments_number()) {
                                    comments_template();
                                }*/

                                echo "\n\n";
                                ?>

                                <?php if($_GET["abz"]!=""){?>
                                    <!-- OUTBRAIN-->
                                    <aside class="div_outrain" style="margin: 10px auto;">
                                        <div class="OUTBRAIN" data-src="<?php the_permalink() ?>" data-widget-id="AR_10" data-ob-template="E!LATAM" ></div>
                                        <script type=text/javascript async="async" src="http://widgets.outbrain.com/outbrain.js"></script>
                                    </aside>
                                    <!-- / OUTBRAIN-->
                                <?php } ?>

 
                            <?php echo '</div>';

                        endwhile; //endwhile;
						?>

                        

                        <div id="nav-below" class="navigation visible-xs hidden-md hidden-lg" style="margin-bottom:30px;">
                            <div class="nav-next"><?php next_post_link( '%link', ' &laquo; Nota Anterior <span class="meta-nav"> ' . _x( '', 'Proxima entrada link', 'twentyten' ) . '</span>' ); ?></div>
                            <div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Entrada anterior link', 'twentyten' ) . '</span> Pr&oacute;xima nota &raquo;' ); ?></div>
                        </div><!-- #nav-below -->

                        <div id="nav-above_floating" class="navigation_single hidden-xs">
                            <?php
                            $previous_post = get_previous_posts_link();
                            $next_post = get_next_posts_link();

                            $next_post_link_url = get_permalink( get_adjacent_post(false,'',false)->ID );
                            $prev_post_link_url = get_permalink( get_adjacent_post(false,'',true)->ID );
                            ?>
                            <?php if ($prev_post_link_url !="" && $prev_post_link_url!=get_permalink()): // if there are older articles ?>
                                <div class="nav-previous"><a href="<?php echo $prev_post_link_url;?>" class="boton"></a><div class="text_oculto"><?php echo $primera_img;?><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentyten' ) . '</span> %title' ); ?></div></div>
                            <?php endif; ?>
                            <?php if ($next_post_link_url !="" && $next_post_link_url!=get_permalink()): // if there are newer articles ?>
                                <div class="nav-next"><a href="<?php echo $next_post_link_url;?>" class="boton" ></a><div class="text_oculto"><?php echo $primera_img;?><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentyten' ) . '</span>' ); ?></div></div>
                            <?php endif; ?>
                        </div><!-- #nav-above -->


                        <?php //comments_template( '', true ); ?>

                        <!--<div style="margin-bottom:30px;" id="faceComments">
                            <div id="fb-root"></div>
                            <script data-device="1">(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&status=0&version=v2.6";
                                    js.async = true;
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <fb:comments href="<?php the_permalink() ?>" data-href="<?php the_permalink() ?>" data-numposts="5" width="100%"></fb:comments >
                        </div>--><!-- #FACEBOOK COMMENT -->
					    </article>

                       
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $tags_list = get_the_tag_list('', __(' ', 'bootstrap-basic'));
                        if ($tags_list) {
                            ?>
                            <span class="tags-links" style="padding: 0 15px;">
                                <?php echo bootstrapBasicTagsList($tags_list); ?>
                            </span>
                        <?php } // End if $tags_list ?>
                    </div>


                    <div id="related-single" class="col-md-3 col-xs-12" data-mostrarMobile="0" style="display:none;">
                        <!-- MAS LEIDOS-->
                         <?php
                            $url = '../varios/JSON/JSONanalytics/argentina.json';
                            $contents = file_get_contents($url);
                            $json_str = utf8_encode($contents);
                            $mas_leidos = json_decode($json_str,true);
                            ?>
                        <?php include (STYLESHEETPATH . '/pages/masvistos_desktop.php'); ?>
                        
                        <div class="clearfix"></div>
                        <!-- ARTICULOS RELACIONADOS -->
                        <?php //include (STYLESHEETPATH . '/pages/related-post.php'); ?>
                        <div class="clearfix"></div>
                    </div>
				</div>
                <!-- PERSONAJES-->
                    <?php include (STYLESHEETPATH . '/pages/personajes.php'); ?>
                 <!-- PERSONAJES-->


            </div>
        </div>

        <div id="related-single_mobile" class="col-xs-12 visible-xs-12" style="width: 100%; display:none;">

            <!-- MAS LEIDOS-->
            <?php include (STYLESHEETPATH . '/pages/masvistos_mobile.php'); ?>
            <div class="clearfix"></div>
            
        </div>

        <?php //get_sidebar('single'); ?>

        <?php include (STYLESHEETPATH . '/sidebar-single.php'); ?>

        <?php get_footer(); ?>

        <?php if($_GET["abz"]!=""){?>
        <!--TEADS-->
            <script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/71618/tag"></script>
            <!--TEADS-->
            
        <?php }else{?>


            <!-- ADRENALINE TAG START-->
            <!-- <script>
                var aDlneOpt = {
                    adUnit: 'https://pubads.g.doubleclick.net/gampad/ads?sz=300x250|640x480&iu=/8877/<?php echo ucwords(NAMEFEED);?>/Adrenaline&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]&vpos=preroll&cust_params=postid%3D<?php echo(get_the_ID())?>'
                },aDlneProt;
                aDlneProt = document.location.protocol;
                (aDlneProt == 'https:') ? aDlneProt = 'https:' : aDlneProt = 'http:';
                document.write('<scr' + 'ipt src="' + aDlneProt + '//adrenalinecdn.com/nbcUniversal/creatives/breaking_ad/aDlne.js"></scr' + 'ipt>');
            </script>-->
            <!-- / ADRENALINE TAG START-->

            <!-- / ADRENALINE TAG START-->
            <script>
                var adlneInreadOpt = {
                    adTag: 'https://pubads.g.doubleclick.net/gampad/ads?sz=300x250|640x480&iu=/8877/<?php echo ucwords(NAMEFEED);?>/Adrenaline&impl=s&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]&vpos=preroll&cust_params=postid%3D<?php echo(get_the_ID())?>',
                    mute: true,
                    skip: true
                }
            </script>
            <script src="//adlne.com/eonline/creatives/inread/adlnev2-inread-min.js"></script>
            <!-- ADRENALINE TAG END -->
            
        <?php } ?>

</div>

<script type="text/javascript">
    /*jQuery(document).ready(function($) {

        if(isMobile()){
             //$("#debug-video").html("Entró");

            var theProtocol = location.protocol,
              theURL = theProtocol + "//players.brightcove.net",
              // Get a reference to the iframe element
              iframeTag = document.querySelector("iframe"),
              // Retrieve window object needed for postMessage
              win = iframeTag.contentWindow;


            function playVideo() {
              // Post message passing 'playVideo' as the data addEventListener
              win.postMessage("playVideo", theURL);
            }

            function pauseVideo() {
              // Post message passing 'pauseVideo' as the data addEventListener
              win.postMessage("pauseVideo", theURL);
            }

            //console.log('theURL:', theURL);
            //console.log('win:', win);
            //$("#debug-video").html(theURL+"-- 1810");

            playVideo();

        }
    })*/
</script>