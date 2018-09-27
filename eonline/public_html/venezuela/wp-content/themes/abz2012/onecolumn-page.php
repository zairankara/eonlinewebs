<?php
/**
 * Template Name: One column, no sidebar
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

get_header(); ?>

		<div id="container" class="one-column">
			<div id="content" role="main">
					<h2 style="color:<?php echo cat_color(programas);?>">PROGRAMACIÓN</h2>
					<?php include ('/home/eonline/public_html/varios/programacion/programacion2014.php'); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
