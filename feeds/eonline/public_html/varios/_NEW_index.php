<?php

get_header();

//include(TEMPLATEPATH."/detectar_movil.php");
 ?>

		<div id="container">
			<div id="content" role="main"  style="width: 100%;">
			<div class="cont_blanco" style="width: 100%;">

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>
			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php if(!is_home()):?>
	<?php get_sidebar(); ?>
<?php endif;?>
<?php get_footer(); ?>
