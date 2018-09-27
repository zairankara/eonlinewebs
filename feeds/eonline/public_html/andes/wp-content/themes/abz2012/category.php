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
					
					if($catSlug=es_wakeup()) 
					{
					   	if($catSlug!="wakeup"){
						   	$nombre_feed="andes";

						   	if($catSlug=="personajes-wakeup")$catSlug="personajes";
						   	if($catSlug=="horarios")$catSlug="horarios1";
						   	if($catSlug=="galeria-wakeup"){
						   		
						   		if($_GET["gallery"]!=""){
						   			$catSlug="galeria";
						   			$getGal="?gallery=".$_GET["gallery"];
						   		}else{
						   			$catSlug="album";
						   		}
						   	}
						 	include ("/home/eonline/public_html/experience/ms_wakeup/".$catSlug.".php");
						 }else{
						 	//get_template_part( 'loop', 'category' );
						 	include ("/home/eonline/public_html/experience/ms_wakeup/horarios1.php");
						 }

					}else{
						 get_template_part( 'loop', 'category' );
					}
				?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

		<!-- #SIDEBARS -->
		<? if ( is_category( "the-kardashians" )) {?>
				<?php include (TEMPLATEPATH . '/kardashians/sidebar.php'); ?>
		<?}elseif (es_wakeup()) {?>
				<?php include (TEMPLATEPATH . '/wakeup/sidebar.php'); ?>
		<?}else{?>
				<?php get_sidebar(); ?>
		<?}?>

<?php get_footer(); ?>
