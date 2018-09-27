<?php
/**
 * Template Name: GALERIAS 2016
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header();

$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];

function ObtenerHeight($url_imagen){

    $extrae3 = explode("//rs_",$url_imagen);
    if($extrae3[1]!=""){
        $image3 = explode("-",$extrae3[1]);
        $image3=$image3[0];

        $image_wh = explode("x",$image3);

        $image_h = $image_wh[1];

        return($image_h);

    }
}

function ObtenerWidth($url_imagen){

    $extrae3 = explode("//rs_",$url_imagen);
    if($extrae3[1]!=""){
        $image3 = explode("-",$extrae3[1]);
        $image3=$image3[0];

        $image_wh = explode("x",$image3);
        $image_w = $image_wh[0];


        return($image_w);

    }
}
?>

<script>
    jQuery(document).ready(function($) {

        jQuery('#status').fadeOut(); // will first fade out the loading animation
        jQuery('#preloader').fadeOut('slow'); // will fade out the white DIV that covers the website.
        jQuery('.todoGalerias').fadeIn();

        jQuery( "#cont_search_banners" ).remove();
        jQuery( "#div-gpt-ad-galerias-2000x1000" ).remove();
    });
</script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo FOLDERTHEME;?>/assets/style_gallery.css" />
<?
global $wpdb;
$gallery=$_GET["gallery"];
if($gallery!=""){

    $galleries2 = obtener_galerias($gallery, NULL, "pg.orden", "ASC");
    $contador=count($galleries2);

}else{
    exit('<span class="alert alert-danger" style="left: 50%; top: 50%; position: absolute;">No se encuentra la Galeria<br><a href="/mexico/pagina/fotos-mexico" class="btn btn-default">Volver</a></span>');
}
?>

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div class="todoGalerias">

    <div class="mainGallery">
        <div id="sync1" class="owl-carousel">
            <?
            $cont_img=1;
            foreach($galleries2 as $image_gr){

                $vecUrl=explode("http://",$image_gr["filename"]);
                $description=strip_tags($image_gr["description"], "<a><strong>");
                $description_limpio=strip_tags($image_gr["description"]);
                $titulo=$image_gr["title"];

                $urlImg="http://".$vecUrl[1];
                //$image_gr_explode_resize=$urlImg;
                $image_gr_explode_resize=url_resize_sola_h($urlImg,720);

                $wid=ObtenerWidth($image_gr_explode_resize);
                $hei=ObtenerHeight($image_gr_explode_resize);
                $title_gal=str_replace("'", " ", $galleries2[0]["title_gal"]);

                
                if($wid>$hei){
                    $class=" style='height: auto;'";
                }else{
                    $class=" style='height: inherit;'";
                }
                ?>
                <picture class="item">
                    <div class="titulo_galeria">
                        <h2><?php echo $title_gal;?></h2>
                        <h3><?php echo $titulo; ?></h3>
                        <h4><?php echo $cont_img;?>/<?php echo $contador; ?></h4>
                        <p><?php echo $description_limpio; ?></p>

                        <!-- REDES SOCIALES POR POST-->
                        <div class="social-icons-small" data-url="<?php the_permalink() ?>?gallery=<?php echo $_GET['gallery'];?>&utm_campaign=VisitorShare" data-title="<?php echo $titulo; ?>">
                            <div class="social-icon facebook">
                                <a class="social-fb" target="_blank" onclick="share('Facebook','<?php the_permalink() ?>?gallery=<?php echo $_GET['gallery'];?>&utm_campaign=VisitorShare', '<?php echo $titulo; ?> :: <?php echo  $title_gal; ?> <?php the_permalink(); ?>?utm_campaign%3DVisitorShare', 'Gallery', '<?php echo $image_gr_explode_resize;?>');" href="javascript:void(0);"></a>
                            </div>
                            <div class="social-icon twitter">
                                <a class="social-tw" onclick="share('Twitter', '<?php the_permalink(); ?>?gallery=<?php echo $_GET['gallery'];?>&utm_campaign%3DVisitorShare', '<?php echo $titulo; ?> :: <?php echo  $title_gal; ?> <?php the_permalink(); ?>?gallery=<?php echo $_GET['gallery'];?>&utm_campaign%3DVisitorShare', 'Gallery', '<?php echo $image_gr_explode_resize;?>')" href="javascript:void(0);" ></a>
                            </div>
                            <div class="social-icon whatsapp" data-mostrarMobile="1" style="display:none;">
                                <a class="social-whatsapp" onclick="share('Whatsapp', 'whatsapp://send?text=<?php echo $titulo; ?> <?php echo $description_limpio; ?> <?php echo  $title_gal; ?> <?php the_permalink(); ?>?gallery=<?php echo $_GET['gallery'];?>&utm_campaign%3DVisitorShare', '<?php echo $titulo; ?> :: <?php echo  $title_gal; ?>', 'Gallery', null)" href="javascript:void(0);" ></a>
                            </div>
                        </div>
                        <!-- / REDES SOCIALES POR POST-->

                    </div>
                    <img class="owl-lazy img-responsive" <?php echo $class; ?> data-src="<?php echo $image_gr_explode_resize;?>" alt="<?php echo $titulo?>" title="<?php echo $titulo?>"/>
                </picture>
                <?
                $cont_img++;
            }?>
        </div>
    </div>
    <div class="thumbs">
        <div class="container">
            <div id="sync2" class=" owl-carousel">
                <?
                $cont_img=1;
                foreach($galleries2 as $image_ch){

                    $vecUrl=explode("http://",$image_ch["filename"]);
                    $description=strip_tags($image_ch["description"], "<a><strong>");
                    $description_limpio=strip_tags($image_ch["description"]);
                    $titulo=$image_ch["title"];

                    $urlImg="http://".$vecUrl[1];
                    $image_ch_thumb_explode_resize=url_resize_sola_h($urlImg,150);
                    //$image_gr_explode_resize=url_resize_sola_h($urlImg,600);
                    //$image_gr_explode_resize=$urlImg;
                    ?>
                    <picture>
                        <img src="<?php echo $image_ch_thumb_explode_resize;?>" width="90" alt="<?php echo $titulo; ?>" title="<?php echo $titulo; ?>"/>
                    </picture>
                    <?
                    $cont_img++;
                }?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function ckech(){
        jQuery("div, a").each(function(){
            muestro = jQuery(this).attr("data-mostrarMobile");
            if(muestro == 1 && isMobile()){
                jQuery(this).show();
            }else if(muestro == 0 && isMobile()){
                jQuery(this).hide();
            }else if(muestro == 0 && !isMobile()){
                jQuery(this).show();
            }else if(muestro == 1 && !isMobile()){
                jQuery(this).hide();
            }
        })
    }
    var Hmasthead=jQuery("#masthead").height();
    var Hfooter=90;
    var winHeight2 = (jQuery(window).height())-Hmasthead-90;
    
    var objectGlobal = {};
    function changePageName(is_load, titGal, titFoto){
        if(is_load==0) {
            _satellite.track('galleryImg');
        }else{
            //console.log("titFoto: "+titFoto);
            ga('send', 'pageview', '/<?php echo NAMEFEED; ?>/pagina/galerias/'+titGal+'/'+titFoto);
            objectGlobal.pageName = location.hostname+location.pathname+'/'+titGal+'/'+titFoto;
        }
        //console.log("is_load: "+is_load);
    }

    jQuery(document).ready(function($) {
        ckech();
        $("footer").hide();
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage;
        if(isMobile()){
            slidesPerPage=4;
        }else{
            slidesPerPage=10;
        }
        //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            dots: false,
            lazyLoad:true,
            lazyContent: true,
            loop: true,
            navText: ['',''],
            //navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items : slidesPerPage,
                dots: false,
                nav: true,
                navText: ['',''],
                slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        nav: false,
                    },
                    // breakpoint from 480 up
                    480 : {
                        nav: true,
                    }
                }
            });
            //}).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {


            //if you set loop to false, you have to restore this next line
            //var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count-1;
            var current = Math.round(el.item.index - (el.item.count/2) - .5);
            if(current < 0) {
                current = count;
            }
            if(current > count) {
                current = 0;
            }

            console.log(el);
            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }

            setTimeout(function(){
                var tituloIMG=jQuery("#sync1 .active").find("h3").html();
                changePageName(1,'<?=$title_gal?>', tituloIMG);
                ckech();
            }, 2000);

        }

        function syncPosition2(el) {
            if(syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

        sync2.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                sync2.trigger('next.owl');
            } else {
                sync2.trigger('prev.owl');
            }
            e.preventDefault();
        });

        var tituloIMG=jQuery("#sync1 .active").find("h3").html();
        changePageName(0,'<?=$title_gal?>', tituloIMG);

        jQuery("#sync1").height(winHeight2);

    });

</script>

<?php  get_footer(); ?>