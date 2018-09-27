<?php
/**
 * Template Name: PROGRAMAS_old
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
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php
					$contenido=the_content();
					include (home_url( '/' )."wp-content/themes/E-online/programacion/".$contenido.".php");
					?>
					<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
