<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>

<?php
/**
 * Template Name: GENERICO SIN SIDEBAR
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
				<div class="cont_one-clumn" style="text-align:center;">
      			<?php the_content(); ?>
				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
