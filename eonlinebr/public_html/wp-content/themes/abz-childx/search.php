<?php
/**
 * The template for displaying search results.
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
				<div class="col-md-12 col-lg-9 content-area" id="main-column">
                    <div id="preloader">
                        <div id="status">&nbsp;</div>
                    </div>
                    <header class="page-header">
                        <h3 class="site-title"><?php printf(__('RESULTADO DA BUSCA: %s', 'bootstrap-basic'), '<span>' . get_search_query() . '</span>'); ?></h3>
                    </header><!-- .page-header -->

                    <ul id="tabs" class="nav nav-tabs marginTB10" data-tabs="tabs" role="tablist">
                        <li class="active"><a href="#noticias" role="tab" data-toggle="tab" data-category="noticias">NOTICIAS</a></li>
                        <!--<li><a href="#videos" role="tab" data-toggle="tab" data-category="videos">VíDEOS</a></li>-->
                        <li><a href="#galerias" role="tab" data-toggle="tab" data-category="galerias">GALERIAS</a></li>
                    </ul>

					<main id="main" class="site-main tab-content" role="main">
                        <aside id="noticias" role="tabpanel" class="tab-pane fade in active">
                            <?php
                            global $wpdb; // If not, global it so it can be read from
                            $term2=htmlentities($_GET["s"], ENT_QUOTES, "UTF-8");
               
                            $sql="wp_posts.post_title LIKE '%".$term2."%'"; //busqueda literal
                            $query="SELECT * FROM wp_posts WHERE 1=1 
                                AND ($sql)
                                AND (wp_posts.post_password = '') 
                                AND wp_posts.post_type IN ('post', 'page', 'attachment') 
                                AND (wp_posts.post_status = 'publish') 
                                ";

                                $maxregistros=10;
                                if($_GET["pageId"]>"1"){
                                    $desde=($_GET["pageId"]*10)-10;
                                    $hasta=$_GET["pageId"]*10;
                                }else{
                                    $desde=0;
                                    $hasta=10;
                                }

                            

                            $latestposts = $wpdb->get_results( $query . " ORDER BY wp_posts.post_date DESC LIMIT ".$desde.", ".$maxregistros."" );
                            $cantidad_posts=$wpdb->num_rows;


                            echo '<aside class="grid effect-5" id="grid" >';
                            $c = 0;
                            $cz = 1;
                            if(count($latestposts) > 0) // equivalent to have_posts()
                            {
                                foreach ($latestposts as $post) {
                                    setup_postdata($post);
                                    //the_post();

                                    get_template_part('content', get_post_format());
                                    $c++;
                                    $cz++;
                                }

                            }else {?>
                                <div id="post-0" class="post no-results not-found">
                                    <h2 class="entry-title"><?php _e( 'Conteúdo não encontrado', 'twentyten' ); ?></h2>
                                    <div class="entry-content">
                                        <p><?php _e( 'Desculpe, mas não há resultados para a sua busca. Por favor, tente novamente usando outras palavras-chaves.', 'twentyten' ); ?></p>
                                        <?php get_search_form(); ?>
                                    </div><!-- .entry-content -->
                                </div><!-- #post-0 -->
                            <?}?>
                            <?php echo '</aside>'; ?>

                            <?php
                            if(count($latestposts) > 0) // equivalent to have_posts()
                            {?>
                                <div id="nav-below" class="navigation clearfix">

                                    <?
                                    $page_actual=$_GET["pageId"];

                                    if($page_actual<=1 || $page_actual==""){
                                        $proxpag=$page_actual+1;?>
                                        <div class="nav-next categorygrid__morebutton"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/?s=".$_GET["s"]."&pageId=2"?>">LEIA MAIS</a></div>
                                    <?}else{
                                        $proxpag=$page_actual+1;
                                        $antpag=$page_actual-1;?>
                                        <div class="nav-previous categorygrid__morebutton"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/?s=".$_GET["s"]."&pageId=".$antpag.""?>">+ VOLTAR</a></div>
                                        <?if($cantidad_posts==10){?><div class="nav-next categorygrid__morebutton"><a href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/?s=".$_GET["s"]."&pageId=".$proxpag.""?>">LEIA MAIS</a></div><?}?>
                                    <?}?>
                                </div>
                            <?}?>
                        </aside>
                        <!--<aside id="videos" role="tabpanel" class="tab-pane fade ">
                            <section id="gridGalerias" class="gridGalerias effect-5">
                                <?php
                                $return_videos = getRemoteFile("http://api.brightcove.com/services/library?command=search_videos&all=".$_GET["s"]."&page_size=30&media_delivery=http&sort_by=MODIFIED_DATE%3ADESC&token=".TOKEN."");
                                $decode_videos = json_decode($return_videos);
                                
                                if(count($decode_videos->items)>=1){

                                    foreach($decode_videos->items as $video) {

                                        $id_video=$video->id;
                                        $name_video=$video->name;
                                        $image_video=$video->videoStillURL;
                                        $urlVideo='http://br.eonline.com/videos/?id='. $id_video .'&utm_campaign=VisitorShare';

                                        if($image_video){?>

                                            <article class="col-sm-4 col-xs-12 grid-item">
                                                <div class="entry-content">
                                                    <div class="imagen_post">
                                                        <div class="nav__image-icon nav__image-icon--video"></div>
                                                        <a href="<?php echo $urlVideo;?>" rel="bookmark" >
                                                            <img src="<?php echo $image_video;?>" data-original="<?php echo $image_video;?>" alt="<?php echo $name_video; ?>" title="<?php echo $name_video; ?>" class="img-responsive" /></a>
                                                        <?php echo("<div class='caption_img'>".$name_video."</div>");?>
                                                        <div class="social-icons-small" data-url="<?php echo $urlVideo;?>" data-title="<?php echo $name_video; ?>">
                                                            <div class="social-icon facebook">
                                                                <a class="social-fb" target="_blank" onclick="share('Facebook','<?php echo $urlVideo; ?>', '<?php echo $name_video; ?>', 'Video', '<?php echo $image_video; ?>');" href="javascript:void(0);"></a>
                                                            </div>
                                                            <div class="social-icon twitter">
                                                                <a class="social-tw" onclick="share('Twitter', '<?php echo $urlVideo; ?>', '<?php echo $name_video; ?>', 'Video', <?php echo $image_video; ?>)" href="javascript:void(0);" ></a>
                                                            </div>
                                                            <?php if( wp_is_mobile() ){?>
                                                                <div class="social-icon whatsapp">
                                                                    <a class="social-whatsapp" onclick="share('Whatsapp', 'whatsapp://send?text='<?php echo urlencode($name_video); ?> <?php echo $urlVideo; ?>', '<?php echo $name_video; ?>', 'Video', null)" href="javascript:void(0);" ></a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php } ?>

                                    <?php } ?>
                                <?php }else{?>
                                    <h3 class="site-title">Desculpe, mas não há resultados para a sua busca. Por favor, tente novamente usando outras palavras-chaves.</h3>
                                <?php }?>
                            </section>
                        </aside>-->
                        <aside id="galerias" role="tabpanel" class="tab-pane fade ">

                            <section id="gridGaleriasSearch" class="gridGaleriasSearch effect-5">

                                <?php
                                $galleries = obtener_galerias_string($_GET["s"], "30", "ng.fecha", "DESC", "ng.id");

                                /* GALLERIES */
                                include($_SERVER["DOCUMENT_ROOT"].'/varios/connect/galerias_wp.php');
                                $valor_season = $mydb3->get_results('SELECT mundial_ar FROM abmGalDestacadas', ARRAY_A);
                                $mundial_ar=$valor_season[0]["mundial_ar"];

                                $cont="";
                                $contador=1;
                                if(count($galleries)>=1){
                                    
                                    foreach($galleries as $image){

                                        $urlImg=$image["filename"];
                                        $urlImg=url_resize_sola($urlImg,460);
                                        $vecUrl=explode("http://",$image["filename"]);
                                        $id_galeria=$image["gid"];
                                        $title=$image["title"];
                                        $title_gal=$image["title_gal"];
                                        $desc="";

                                        ?>
                                        <article class="col-sm-4 col-xs-12 grid-item">
                                            <div class="entry-content">
                                                <div class="imagen_post">
                                                    <div class="nav__image-icon nav__image-icon--photo"></div>
                                                    <a href="http://br.eonline.com/galerias_page/?gallery=<?php echo $id_galeria;?>" rel="bookmark" >
                                                        <img src="<?php echo $urlImg; ?>" data-original="<?php echo $urlImg; ?>" alt="<?php echo $urlImg; ?>" title="<?php echo $urlImg; ?>" class="img-responsive" "/></a>
                                                    <?php echo("<div class='caption_img'>".$title_gal."</div>");?>
                                                    <!-- REDES SOCIALES POR POST-->
                                                    <div class="social-icons-small" data-url="http://br.eonline.com/galerias_page/?gallery=<?php echo $id_galeria;?>?utm_campaign=VisitorShare" data-title="<?php echo $urlImg; ?>">
                                                        <div class="social-icon facebook">
                                                            <a class="social-fb" target="_blank" onclick="share('Facebook','http://www.facebook.com/sharer/sharer.php?u=http://br.eonline.com/galerias_page/?gallery=<?php echo $id_galeria;?>&utm_campaign=VisitorShare', '<?php echo $urlImg; ?>', 'Gallery', '<?php echo $urlImg; ?>');" href="javascript:void(0);"></a>
                                                        </div>
                                                        <div class="social-icon twitter">
                                                            <a class="social-tw" onclick="share('Twitter', 'https://twitter.com/share?text=<?php echo $urlImg; ?>&url=http://br.eonline.com/galerias_page/?gallery=<?php echo $id_galeria;?>&utm_campaign%3DVisitorShare', '<?php echo $urlImg; ?>', 'Gallery', <?php echo $urlImg; ?>)" href="javascript:void(0);" ></a>
                                                        </div>
                                                        <?php if( wp_is_mobile() ){?>
                                                            <div class="social-icon whatsapp">
                                                                <a class="social-whatsapp" onclick="share('Whatsapp', 'whatsapp://send?text='<?php echo urlencode($titulo); ?> :: <?php echo urlencode($description_limpio); ?> <?php the_permalink(); ?>?utm_campaign%3DVisitorShare', '<?php echo $titulo; ?> :: <?php echo  $galleries2[0]["title_gal"]; ?>', 'Gallery', null)" href="javascript:void(0);" ></a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <!-- / REDES SOCIALES POR POST-->
                                                </div>
                                            </div>
                                        </article>
                                    <?php }?>
                                <?php }else{?>
                                    <h3 class="site-title">Desculpe, mas não há resultados para a sua busca. Por favor, tente novamente usando outras palavras-chaves.</h3>
                                <?php }?>
                            </section>
                        </aside>

					</main>

				</div>
<?php get_sidebar('right'); ?> 
<?php get_footer(); ?> 