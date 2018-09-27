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
								<div id="post-<?php the_ID(); ?>" <?php if (! is_page( "parabens-joan" )) {?>class="hentry_gr"<?}?>>
									<?php if ( is_front_page() ) { ?>
										<h2 class="entry-title"><?php the_title(); ?></h2>
									<?php }else{?>
											<?if (! is_page( "fotos" ) && ! is_page( "parabens-joan" )  && ! is_page( "glamcam360" ))
											{?>	
												<h1 class="entry-title"><?php the_title(); ?></h1>
											<?}?>		
									<?}?>		

									<div <?php if (! is_page( "parabens-joan" )) {?>class="entry-content"<?}?>>
										<?php the_content(); ?>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Paginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
								</div><!-- #post-## -->

								<?php //comments_template( '', true ); ?>

				<?php endwhile; ?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?if(is_page("glamcam360")){?>
	<?php include (TEMPLATEPATH . '/glamcam360/sidebar.php'); ?>
<?}else{?>
	<?php get_sidebar(); ?>
<?}?>

<?php get_footer(); ?>
