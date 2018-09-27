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
				if( is_category( "alfombraroja" ) )
				{ ?>
				<div id="sbmn_redcarpet">
					<ul>
						<li><a href="#" class="ico_golden">GOLDEN GLOBE AWARDS</a></li>
						<li><a href="#" class="ico_sag">SAG AWARDS</a></li>
						<li><a href="#" class="ico_grammy">GRAMMY AWARDS</a></li>
						<li><a href="#" class="ico_oscar">ACADEMY AWARDS</a></li>
						<li><a href="#" class="ico_emmy">EMMY AWARDS</a></li>
					</ul>
				</div>
				<br clear="all" />
				<?php }  ?>
				
				<h1 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

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
