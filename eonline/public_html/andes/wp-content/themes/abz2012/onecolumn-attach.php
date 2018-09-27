<?php
/**
 * Template Name: ATTACH 2013
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

<style type="text/css">
.slide_foto{
	width: 550px;
	margin: 20px;
	position: relative;
	float: left
}
.banner_slider{
	width: 300px;
	_width: 400px;
	padding: 0 50px; 
	margin: 20px 40px;
	position: relative;
	float: left
}
.share_foto{
	width: 250px;
	margin: 20px;
	position: relative;
	float: left
}
.next_foto{
	position: absolute;
	right: 10px;
	top: 250px;
}
.prev_foto{
	position: absolute;
	left: 10px;
	top: 250px;
}
.slide_foto a img{
	max-width: 550px !important;
}
</style>
	

		<div id="container">
			<div id="content" role="main">
			<div class="cont_one-clumn" style="background-color: #1a1a1a;padding-top: 20px; margin:10px;">

					

									<? 
									$media=$_GET["media"];
									//if(!is_numeric($media)) exit("Error de Validación");
									exit($media."---");

									global $wpdb;

									$galleries = $wpdb->get_results("SELECT ng.path, np.description, np.filename FROM ".$wpdb->prefix."ngg_pictures np, ".$wpdb->prefix."ngg_gallery ng WHERE np.galleryid=ng.gid AND np.pid=" . $media . " ", ARRAY_A);
									$max_count = $wpdb->num_rows;
								
					

										foreach($galleries as $image)
										{

												print_r($galleries);
												exit;
											
													?>


													<h2 style="color:<?php echo cat_color(fotos);?>; margin-left: 25px !important;">FOTOS / <span style="color:#fff;"><?=$image["description"]?></span></h2>
													<div class="slide_foto">
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

													
													</div>

													<div class="share_foto">
														<p><iframe src="//www.facebook.com/plugins/like.php?href=<?=$urlImg?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></p>
														<p><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$urlImg?>" data-text="<?=$desc?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a></p>
														<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
													</div>
												<?}?>
											
										


 


			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
