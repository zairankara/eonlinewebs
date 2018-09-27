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
					<iframe src ="<?php echo home_url( '/' ); ?>wp-content/themes/E-online/programacion/programacion.php"name="cata" id="cata" width="100%" height="980" scrolling="no" frameborder="0"></iframe>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
