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

			<?php include ("/home/eonline/public_html/experience/ms_".$concurso."/index.php"); ?>
	</main><!-- #content -->
</div><!-- #container -->


<?php get_footer(); ?>
