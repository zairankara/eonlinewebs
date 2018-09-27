<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
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

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
								<div id="post-<?php the_ID(); ?>" class="hentry_gr">
									<?php
									if (! is_page( "fotos" ))
									{?>
									<h3 class="entry-utility"><?php echo the_title(); ?></h3>
									<?}?>

									<?php if ( is_front_page() ) { ?>
										<h2 class="entry-title"><?php the_title(); ?></h2>
									<?php }else{?>
											<?if (! is_page( "fotos" ))
											{?>	
													<h1 class="entry-title"><?php the_title(); ?></h1>
											<?}?>		
									<?}?>		

									<div class="entry-content">
										<?php the_content(); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Paginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
								</div><!-- #post-## -->

								<?php //comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
