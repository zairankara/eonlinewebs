<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<div class="cont_blanco">

<?php if ( have_posts() ) : ?>
				
				<?
				/*if($_GET["abz"]==1){
					global $wp_query;
					echo $wp_query->request;
				}*/?>
				<h1 class="page-title"><?php printf( __( 'Resultado da busca: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Não foram encontrados resultados ', 'twentyten' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Desculpe, mas não encontramos o que você está procurando. Por favor, tente palavras-chave diferentes.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
					<?
					/*if($_GET["abz"]==1){
						global $wp_query;
						echo $wp_query->request;
					}*/?>
				</div><!-- #post-0 -->
<?php endif; ?>
			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
