<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			<div class="cont_blanco">

				<?php
					//$category_description = category_description();
					//if ( ! empty( $category_description ) )
						//echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<!-- #SIDEBARS -->
		<? if ( !is_category( "the-kardashians" )) {?>
			<?php get_sidebar(); ?>
		<?}else{?>
				<?php include (TEMPLATEPATH . '/kardashians/sidebar.php'); ?>
		<?}?>
		<!-- #SIDEBARS -->

<?php get_footer(); ?>
