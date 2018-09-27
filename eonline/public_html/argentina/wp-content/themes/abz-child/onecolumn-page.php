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

get_header(); ?>

		<div id="container" class="one-column">
			<div id="content" role="main">
					<h3 class="site-title" style="color:<?php echo cat_color(programas);?>">PROGRAMACIÓN</h3>
					<?php include ('/varios/programacion/programacion2016.php'); ?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
