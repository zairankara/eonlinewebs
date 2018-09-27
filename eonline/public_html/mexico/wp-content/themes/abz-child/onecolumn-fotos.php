<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

/**
 * Template Name: Fotos_automatico_2014 v2.0
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
?>

<div class="col-md-12 col-lg-12">
    <main id="main" class="site-main" role="main">
        <div class="col-md-6 col-xs-12">
            <h3 class="site-title">ÚLTIMAS GALERIAS
                <?php if($_POST["buscar_gal"]!=""){?><span>Búsqueda: <?=$_POST["buscar_gal"]?></span><?}?>
            </h3></div>
        <div class="col-md-6 col-xs-12 text-right" id="buscadorGalerias">
            <form class="form-search form-inline" method="post" action="<?=$_SERVER["REQUEST_URI"]?>" id="buscador_gal">
                <input type="text" value="" name="buscar_gal" id="psearch">
                <input type="submit" id="searchsubmit_gal" value="Buscar">
                <input type="hidden" name="flag_gal" value="1" />
            </form>
        </div>
        <br clear="all"/>
		<aside class="gridGalerias effect-5" style="display:none;">


            <?php
            if($_POST["buscar_gal"]!="" && $_POST["flag_gal"]==1){
                   $galleries = obtener_galerias_string($_POST["buscar_gal"], "30", "ng.fecha", "DESC", "ng.id");
            }else{
                $id_gal=NULL;
                $galleries = obtener_galerias_page($id_gal, "30", "ng.fecha", "DESC", "ng.id");
            }
            
            /* GALLERIES */
            //include($_SERVER["DOCUMENT_ROOT"].'/varios/connect/galerias_wp.php');
            //$valor_season = $mydb3->get_results('SELECT mundial_ar FROM abmGalDestacadas', ARRAY_A);
           //$mundial_ar=$valor_season[0]["mundial_ar"];

            $cont="";
            $contador=1;

            foreach($galleries as $image){

                $urlImg=$image["filename"];
                $urlImg=url_resize_sola($urlImg,460);
                $vecUrl=explode("http://",$image["filename"]);
                $id_galeria=$image["gid"];
                $title=$image["title"];
                $title_gal=$image["title_gal"];
                $desc="";

               ?>
                <div class="col-sm-3 col-xs-12 grid-item-Gal">
                    <div class="entry-content">
                        <div class="imagen_post">
                            <div class="nav__image-icon nav__image-icon--photo"></div>
                            <a href="/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>" rel="bookmark" >
                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-original="<?php echo $urlImg; ?>" alt="<?php echo $urlImg; ?>" title="<?php echo $urlImg; ?>" class="img-responsive" /></a>
                            <?php echo("<div class='caption_img'>".$title_gal."</div>");?>

                            <!-- REDES SOCIALES POR POST-->
                            <div class="social-icons-small" data-url="http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>?utm_campaign=VisitorShare" data-title="<?php echo $urlImg; ?>">
                                <div class="social-icon facebook">
                                    <a class="social-fb" target="_blank" onclick="share('Facebook','http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>&utm_campaign=VisitorShare', '<?php echo  $title_gal; ?>', 'Gallery', '<?php echo $urlImg; ?>');" href="javascript:void(0);"></a>
                                </div>
                                <div class="social-icon twitter">
                                    <a class="social-tw" onclick="share('Twitter','http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>&utm_campaign=VisitorShare', '<?php echo  $title_gal; ?> http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>&utm_campaign=VisitorShare', 'Gallery', '<?php echo $urlImg; ?>');" href="javascript:void(0);"></a>
                                </div>

                                <div class="social-icon whatsapp" data-mostrarMobile="1" style="display:none;">
                                    <a class="social-whatsapp" onclick="share('Whatsapp', 'whatsapp://send?text=<?php echo $title_gal; ?> http://la.eonline.com/<?php echo NAMEFEED;?>/pagina/galerias?gallery=<?php echo $id_galeria;?>&utm_campaign=VisitorShare', '<?php echo  $title_gal; ?>', 'Gallery', null)" href="javascript:void(0);" ></a>
                                </div>
                            </div>
                            <!-- / REDES SOCIALES POR POST-->
                        </div>
                    </div>
                </div>
            <?php }?>
        </aside>
    </main><!-- #content -->
</div><!-- #container -->
 <script type="text/javascript">
        jQuery(document).ready(function($) {

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
        })
    </script>
<?php get_footer(); ?>
