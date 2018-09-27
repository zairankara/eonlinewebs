<?php
/**
 * Template Name: ESHOWS
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
<style type="text/css">
	.bannereshows{
		position:absolute; 
		top:67px; 
		right:16px;
		z-index:500;
	}
</style>
<div class="col-md-12 col-lg-12">
	<main id="main" class="site-main" role="main">
        <h3 class="site-title" style="color:<?php echo cat_color("eshows");?>;">E! NOW</h3>

        <ul id="da-thumbs" class="da-thumbs JSON">
                
                <?php
                //$conn_generico2 = new wpdb(DBUSER,DBPASS,'generic_db',DBHOST);
                //$sqlstr_eshows="SELECT * FROM e_now where selector = 'latinoamerica' ORDER by orden ASC";
                //$result_eshows = $conn_generico2->get_results( $sqlstr_eshows, ARRAY_A);
                if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.1.50" ){
                    $json_str = file_get_contents('enow/e_now_la.json');
                } else {
                    $url = '../varios/JSON/JSONenow/e_now_la.json';
                    $contents = file_get_contents($url); 
                    $json_str = utf8_encode($contents); 
                }
                
                $eshows = json_decode($json_str,true);
                foreach ($eshows as $row_eshows) {
                ?>
                    <li class="eshow">
                        <a href="<?php echo $row_eshows['url'];?>" target="_blank">
                            <img src="/admin2012/enow/<?php echo $row_eshows['foto'];?>"  alt="<?php echo $row_eshows['titulo'];?>" title="<?php echo $row_eshows['titulo'];?>"/>
                            <div><h2 class="hide"><?php echo $row_eshows['titulo'];?></h2><h3><?php echo $row_eshows['descripcion'];?></h3></div>
                        </a>
                    </li>
                <?php }

                 //wp_reset_query();
                ?>

        </ul>
    </main>
</div>
<script src="http://la.eonline.com/argentina/wp-content/themes/abz2012/da-thumb/js/jquery.hoverdir.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#da-thumbs > li').hoverdir();
    });
</script>
<?php get_footer(); ?>