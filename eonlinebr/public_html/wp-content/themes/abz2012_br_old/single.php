<?php
get_header(); 
?>

		<div id="container">
			<div id="content" role="main">
				<div class="cont_blanco">


					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
									<div id="post-<?php the_ID(); ?>" class="hentry_gr">
										<!-- CATEGORIA / SECCION -->
												<?php foreach((get_the_category()) as $category) {
										    		 $name_cat2=$category->slug;
												}?>
												<style type="text/css">
												.hentry_gr h2 span,
												.hentry_gr h2 span a{
													color: <?php echo cat_color($name_cat2);?> !important;
												}
												</style>

												<?
												// IMG POST
												$Html_post = get_the_content();
 											    /*$extrae = '/<img (.+?)>/';
    											$extrae22 = '/<img .*src=["\']([^ ^"^\']*)["\']/';

												preg_match_all($extrae22, $Html_post, $matches22);
												$image22 = $matches22[1][0];*/
												preg_match("/<img\s+.*?src=[\"\']?([^\"\' >]*)[\"\']?[^>]*>/i",$Html_post,$m);
												$image22 = $m[1];
												//if($_GET["web"]==1) echo ".".$image22;
												?>
										
										<h2 class="entry-title_sing"><span ><?php echo get_the_category_list( ', ' ); ?> / </span><?php the_title(); ?></h2>

										<div class="entry-meta">
											<?php twentyten_posted_on(); ?>
										</div><!-- .entry-meta -->

										<div class="entry-social">
											
											<!-- AddThis Button BEGIN -->
											<div class="addthis_toolbox addthis_default_style ">
											<?php //sfc_like_button();?>
											<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
											<a class="addthis_button_tweet"></a>
											<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink());?>&media=<?php echo urlencode($image22);?>&description=<?php urlencode(the_title()); ?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
											<!--a class="addthis_button_preferred_1"></a>-->
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter"></a>
											<a class="addthis_button_email"></a>
											</div>
										</div><!-- .entry-meta -->

										<div class="entry-content entry-content_sing">
											<?php the_content(); ?>

											<!-- ARTICULOS RELACIONADOS -->
											<?php //include (TEMPLATEPATH . '/related-post.php'); ?>
											
											<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
										</div><!-- .entry-content -->

										<div class="entry-social" style="float:left; width:600px; border-bottom:none;">
											
											<!-- AddThis Button BEGIN -->
											<div class="addthis_toolbox addthis_default_style ">
											<?php //sfc_like_button();?>
											<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
											<a class="addthis_button_tweet"></a>
											<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink());?>&media=<?php echo urlencode($image22);?>&description=<?php urlencode(the_title()); ?>" class="pin-it-button" count-layout="none"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
											<!--a class="addthis_button_preferred_1"></a>-->
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter"></a>
											<a class="addthis_button_email"></a>
											</div>
											<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
										</div><!-- .entry-meta -->


										

									</div><!-- #post-## -->

									<div id="nav-below" class="navigation" style="margin-bottom:30px;">
										<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Entrada anterior link', 'twentyten' ) . '</span> Anterior' ); ?></div>
										<div class="nav-next"><?php next_post_link( '%link', 'Próxima <span class="meta-nav">' . _x( '&rarr;', 'Proxima entrada link', 'twentyten' ) . '</span>' ); ?></div>
									</div><!-- #nav-below -->

									<?php //comments_template( '', true ); ?>

									<div style="margin-bottom:30px;">
										<div id="fb-root"></div><script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script> 
										<fb:comments href="<?php the_permalink() ?>" width="600"></fb:comments >
									</div><!-- #FACEBOOK COMMENT -->

								
					<?php endwhile; // end of the loop. ?>



				</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
