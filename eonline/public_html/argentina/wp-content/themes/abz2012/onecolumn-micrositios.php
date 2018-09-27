<?php
/**
 * Template Name: MICROSITIOS 2013
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


		<div id="container">
			<div id="content" role="main">
			<div class="cont_one-clumn" style="padding-top: 20px; margin:10px; background:none;">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$concurso=get_the_content();
				endwhile;
			endif;
			?>

			<?php include ("/home/eonline/public_html/experience/ms_".$concurso."/index.php"); ?>


			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
