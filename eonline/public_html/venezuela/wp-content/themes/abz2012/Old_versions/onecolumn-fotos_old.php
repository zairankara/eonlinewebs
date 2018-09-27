<?php
/**
 * Template Name: Fotos_Old
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

get_header(); 
?>



		<div id="container">
			<div id="content" role="main">
			<div class="cont_blanco">
				<h1 class="titulo_page" style="color:#ff24d1;">FOTOS</h1>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
								<div id="post-<?php the_ID(); ?>" class="hentry_gr" <?if($_GET["gallery"]!="") echo('style="max-height:2200px !important; overflow:hidden;"');?>>

									<div class="entry-content">
										<?php the_content(); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Paginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
								</div><!-- #post-## -->

				<?php endwhile; ?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
