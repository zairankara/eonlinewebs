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
						<!--copdigo nuevo-->
						<?php if (is_page(1000001389)){
									 $query= 'cat=9877&amp;orderby=date&amp;order=ASC'; //ordenacion ascendente por fecha
									 query_posts($query);
										
									if (have_posts()) : while (have_posts()) : the_post(); ?>
										<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<h3 class="entry-utility" style="color:#fff;"><?php echo the_title(); ?></h3>
											<h2 class="entry-title"><?php the_title(); ?></h2>
											<div class="entry-content">
													<?php the_content( __( '<span class="leer_mas"></span>', 'twentyten' ) ); ?>
													<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Paginas:', 'twentyten' ), 'after' => '</div>' ) ); ?>
								
												</div><!-- .entry-content -->
										</div>
										<?
										endwhile; 
									else:
										?><h2 class="entry-title">No se han encontrado registros</h2><?
									endif;
									wp_reset_query();
									?>

							<?}else{?>
							<!--HASTA ACA ES NUEVO, NO TE OLVIDES DEL CIERRE DEL IF-->
									<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

													<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
															<?php edit_post_link( __( 'Editar', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
														</div><!-- .entry-content -->
													</div><!-- #post-## -->

													<?php comments_template( '', true ); ?>

									<?php endwhile; ?>
							<?}?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
