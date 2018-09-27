<?php
/**
 * Template Name: MICROSITIOS 2016
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
include(TEMPLATEPATH."/var_constantes.php");

get_header(); 
?>
<div class="col-md-12 col-lg-12">
	<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$concurso=get_the_content();
				endwhile;
			endif;
			?>

			<?php include ("/home/eonlinebr/public_html/experience/ms_".$concurso."/index.php"); ?>



			<?php // SOLO SI ES ALTO LEBLON
			if( is_page("altoleblon") ){
				
				echo '<h2>NOTICIAS</h2>';
		        
		        $args = array(
		            'posts_per_page' => 21,
		            'tag' => 'altoleblon'
		        );
		        echo '<aside class="grid effect-5" id="grid">';
		        	$anchofoto=420;

			        $c = 0;
			        $cz = 1;
			        $my_query = new wp_query($args);
			        if($my_query->have_posts() ) {
			        	while ($my_query->have_posts()) {
			                $my_query->the_post();

			                $examplePost = get_post();

			                $Html = $examplePost->post_content;

			                $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is';
			                $extracto_caption = '';

			                if (preg_match($patron, $Html, $extracto1))
			                {
			                    $extracto_caption = $extracto1[1];
			                    $cant_len=strlen($extracto_caption);
			                }

			                // Extraemos todas las imagenes
			                $extrae = '/<img .*src=["\']([^ ^"^\']*)["\']/';

			                // Extraemos todas las imágenes
			                $Html = str_replace("SRC", "src", $Html);
			                $Html = str_replace("<IMG", "<img", $Html);

			                preg_match_all($extrae, $Html , $matches);

			                $extrae_new = '/<img (.+?)>/';

			                // Extraemos todas las imágenes
			                preg_match_all($extrae_new, $Html , $matches_new);
			                $image_ch = $matches_new[1][0];
			                $image_ch_explode=explode("title",$image_ch);
			                $image_ch_explode=$image_ch_explode[0];
			                $image_ch_explode = str_replace("src='", "", $image_ch_explode);
			                $image_ch_explode = str_replace("'", "", $image_ch_explode);

					        	?>
					        	
				                <div id="post-<?php the_ID(); ?>" class="col-sm-4 col-xs-12 grid-item">

				                    <div class="entry-content" style="padding: 10px;">
				                        <div class="imagen_post">
				                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive"/></a>
				                            <?php echo("<div class='caption_img'>".$extracto_caption."</div>");?>
				                        </div>
				                        <div class="contenido_nota_ch">
				                            <header class="entry-header">
				                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				                            </header><!-- .entry-header -->

				                            <div class="clearfix"></div>
				                        </div>
				                    </div>
				                </div>

				                <?
			                $c++;
                            $cz++;
			        	}
			        	
			        }
			       
		        echo '</aside>';
		    }elseif(is_page("dragmeasaqueen")){
				echo '<h2 style="color:white;">NOTICIAS</h2>';
		        
		        $args = array(
		            'posts_per_page' => 21,
		            'tag' => 'dragmeasaqueen'
		        );
		        echo '<aside class="grid effect-5" id="grid">';
		        	$anchofoto=420;

			        $c = 0;
			        $cz = 1;
			        $my_query = new wp_query($args);
			        if($my_query->have_posts() ) {
			        	while ($my_query->have_posts()) {
			                $my_query->the_post();

			                $examplePost = get_post();

			                $Html = $examplePost->post_content;

			                $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is';
			                $extracto_caption = '';

			                if (preg_match($patron, $Html, $extracto1))
			                {
			                    $extracto_caption = $extracto1[1];
			                    $cant_len=strlen($extracto_caption);
			                }

			                // Extraemos todas las imagenes
			                $extrae = '/<img .*src=["\']([^ ^"^\']*)["\']/';

			                // Extraemos todas las imágenes
			                $Html = str_replace("SRC", "src", $Html);
			                $Html = str_replace("<IMG", "<img", $Html);

			                preg_match_all($extrae, $Html , $matches);

			                $extrae_new = '/<img (.+?)>/';

			                // Extraemos todas las imágenes
			                preg_match_all($extrae_new, $Html , $matches_new);
			                $image_ch = $matches_new[1][0];
			                $image_ch_explode=explode("title",$image_ch);
			                $image_ch_explode=$image_ch_explode[0];
			                $image_ch_explode = str_replace("src='", "", $image_ch_explode);
			                $image_ch_explode = str_replace("'", "", $image_ch_explode);

					        	?>
					        	
				                <div id="post-<?php the_ID(); ?>" class="col-sm-4 col-xs-12 grid-item" style="border: 1px solid red;">

				                    <div class="entry-content" style="padding: 10px;">
				                        <div class="imagen_post">
				                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive"/></a>
				                            <?php echo("<div class='caption_img'>".$extracto_caption."</div>");?>
				                        </div>
				                        <div class="contenido_nota_ch">
				                            <header class="entry-header">
				                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" style="color: #ddd;"><?php the_title(); ?></a></h2>
				                            </header><!-- .entry-header -->

				                            <div class="clearfix"></div>
				                        </div>
				                    </div>
				                </div>

				                <?
			                $c++;
                            $cz++;
			        	}
			        	
			        }
			       
		        echo '</aside>';
		    }
		    ?>
		
	</main><!-- #content -->
</div><!-- #container -->


<?php get_footer(); ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {

		if( $("body").hasClass("page-id-1000002131") || $("body").hasClass("1000002137") ){ //altoleblon //dragmeasaqueen

			var $container = $('.grid');
		    $container.imagesLoaded( function () {
		        $container.fadeIn();
		        $container.masonry({
		            columnWidth: '.grid-item',
		            itemSelector: '.grid-item'
		        });
		       
		    });
		}
     });
</script>