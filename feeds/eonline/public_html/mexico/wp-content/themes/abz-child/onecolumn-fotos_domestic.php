<?php
/**
 * Template Name: DOMESTIC
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


get_header(); ?>
<div class="col-md-12 col-lg-12">
	<main id="main" class="site-main" role="main">
        <h3 class="site-title" style="color:<?php echo cat_color("eshows");?>;">TEST DOMESTIC</h3>

        <?php
        $ID=15508;
        $galleries2 = obtener_galerias($ID, NULL, "pg.orden", "ASC");?>
        <h2><?php echo $galleries2[0]["title_gal"];?></h2>

        <?php
        foreach($galleries2 as $image_gr){

                $vecUrl=explode("http://",$image_gr["filename"]);
                $description=strip_tags($image_gr["description"], "<a><strong>");
                $description_limpio=strip_tags($image_gr["description"]);
                $titulo=$image_gr["title"];

                $urlImg="http://".$vecUrl[1];
                $posPNG = strpos($urlImg, ".png");
                $posGIF = strpos($urlImg, ".gif");
                if($posPNG!== FALSE || $posPNG!== $posGIF){
                    $image_gr_explode_resize=str_replace("http://www.eonline", "http://images.eonline", trim($urlImg));
                }else{
                    $image_gr_explode_resize=str_replace("http://www.eonline", "http://images.eonline.com/resize/300/300/images.eonline", trim($urlImg)) ;
                }
                //$image_gr_explode_resize=url_resize_sola($urlImg,720);

                ?>
                <picture class="thumbnail col-xs-12 col-sm-3" style="margin-right:10px;">
                    <img class="img-responsive" src="<?php echo $image_gr_explode_resize;?>" alt="<?php echo $titulo?>" title="<?php echo $titulo?>"/>
                    <div class="titulo_galeria" style='padding: 0 10px; font-family: "Oswald";'>
                        <p><?php echo $titulo; ?></h3>
                    </div>
                </picture>
                <?
                $cont_img++;
         }?>

    </main>
</div>

<?php get_footer(); ?>
