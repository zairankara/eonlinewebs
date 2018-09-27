<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>

<?php
/**
 * Template Name: ECARD
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

		<div id="container" class="one-column">
			<div id="content" role="main">
				<div class="cont_one-clumn">
          <h2>FLECHADOS</h2>
              <?if(is_page('flechados') && $_GET["id"]!=""){?>
                 <iframe src="http://ecard.eonlineexperiences.com/flechados/content/e-card.php?id=<?=$_GET['id']?>&feed=1" width="630" height="473" scrolling="no"></iframe>
              <?}else{?>
                 <iframe src="http://ecard.eonlineexperiences.com/flechados/?feed=1" width="630" height="473" scrolling="no"></iframe>
              <?}?>

				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
