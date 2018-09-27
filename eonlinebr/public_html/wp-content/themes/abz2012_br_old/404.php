<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div id="container">
		<div id="content" role="main">
		<div class="cont_blanco">

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Não foram encontrados resultados', 'twentyten' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Desculpe, mas não houve resultados para o conteúdo que você está pedindo. Tente palavras-chave diferentes.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->

		</div>
		</div><!-- #content -->
	</div><!-- #container -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>