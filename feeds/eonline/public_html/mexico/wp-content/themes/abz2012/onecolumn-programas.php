<?php
/**
 * Template Name: PROGRAMAS
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
						<h2 style="color:<?php echo cat_color(programacion);?>">PROGRAMACION</h2>

						<?php include (TEMPLATEPATH . '/programacion/programas.php'); ?>			
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
