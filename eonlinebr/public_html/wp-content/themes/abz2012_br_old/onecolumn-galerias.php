<?php
/**
 * Template Name: GALERIAS
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
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

									<div class="ngg-galleryoverview">

										
								        
								        <!-- item container -->
								        <div id="itemContainer">
	
													<? 

													$gallery=$_GET["gallery"];

													global $wpdb;

													$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.filename FROM ".$wpdb->prefix."ngg_pictures np, ".$wpdb->prefix."ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=" . $gallery . " ",ARRAY_A);

													foreach($galleries as $image)
													{

															//print_r($galleries);
															//exit;
															?>
															<div class="ngg-gallery-thumbnail-box" >
																<div class="ngg-gallery-thumbnail" >
																	<?
																	$vecUrl=explode("http://",$image["filename"]);
																	//print_r($vecUrl);
																	//exit;
																	$desc=$image["description"];

																	if($vecUrl[1]=="")
																	{
																			$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
																	}else{
																			$urlImg="http://".$vecUrl[1];
																			//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
																			//$urlImg=$urlImg."?api-key=eonlinelatino";
																	}
																	?>
																	<a href="<?=$urlImg;?>" title="<?=$desc?>" class="shutterset_set_14">
																		<img src="<?=$urlImg;?>">
																	</a>
																	<?
																	if($desc!=""){?>
																		<div class="ngg-gallery-albumtitle"><p><?=$desc?></p></div>
																	<?}?> 
																	
																</div>	

															</div>
													<?}?> 
										</div>
										<!-- navigation holder -->
								        <div class="holder"></div>		

								</div>	

				<?php endwhile; ?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
