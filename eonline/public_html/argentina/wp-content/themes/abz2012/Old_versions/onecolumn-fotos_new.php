<?php
/**
 * Template Name: FOTOS 2012/13
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

										 <!-- wrapped custom buttons for easier styling -->
									    <div class="customBtns">
									      <span class="arrowPrev"></span>
									      <span class="arrowNext"></span>
									    </div>	
								        
								        <!-- item container -->
								        <div id="itemContainer" style="padding:0 35px; border:1px solid green;">
	
													<? 
													global $wpdb;

													$galleries = $wpdb->get_results("SELECT ag.album_id as albumID,na.name, ng.gid, ng.path, ng.title, np.filename 
													FROM wp_ngg_pictures np, wp_ngg_gallery ng, wp_ngg_album na, abmGaleriasAlbumes ag 
													WHERE ag.album_id=na.id AND ag.gall_id=ng.gid AND np.galleryid=ng.gid
													GROUP by ag.gall_id ORDER by ag.fecha DESC LIMIT 0,20",ARRAY_A);
													
													$newname="";

													foreach ($galleries as $gallery) : 
																	$vecUrl=explode("http://",$gallery["filename"]);
																	//print_r($vecUrl);
																	//exit;
																	$title=$gallery["title"];

																	if($vecUrl[1]=="")
																	{
																			$urlImg=$var_con[1].$gallery["path"]."/".$gallery["filename"];
																	}else{
																			$urlImg="http://".$vecUrl[1];
																			//$urlImg=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/293/293/0-0-293-293",$urlImg);
																			//$urlImg=$urlImg."?api-key=eonlinelatino";
																	}
																	
																	$name=$gallery["name"];
																	if($name!=$newname)$newname=$name;
																	?>
																	
																	<p><?=$newname?> - </p>
																	<div class="ngg-album" style="border:1px solid orange;">
																			<div class="ngg-albumcontent">
																				<div class="ngg-thumbnail">
																					<a href="/argentina/galerias/?gallery=<?php echo $gallery["gid"]; ?>">
																						<img class="Thumb" src="<?php echo $urlImg; ?>"/>
																					</a>
																					<div class="ngg-albumtitle"><a href="/argentina/galerias/?gallery=<?php echo $gallery["gid"]; ?>"><?php echo $title; ?> Album: <?php echo $gallery["albumID"]; ?></a></div>
																				</div>

																				
																			</div>
																	</div>
																	
																<?php 

													endforeach; ?>
										 	
											

										</div>
										<!-- navigation holder -->
								        <div class="holder"></div>		

								</div>	

				<?php endwhile; ?>

			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
