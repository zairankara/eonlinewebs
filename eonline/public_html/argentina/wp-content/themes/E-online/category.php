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
				if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" ) ||  in_category( "baftaawards" )  ||  in_category( "latinbillboard" ))
				{
				$cat_alf=1;
				}
				if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )  ||   is_category( "baftaawards" )   ||   is_category( "latinbillboard" )  || $cat_alf==1)
				{ ?>
				<?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'fourth' ) ); ?>
				<?php }  ?>
				<br clear="all" />
				<!-- <h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1> -->
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
