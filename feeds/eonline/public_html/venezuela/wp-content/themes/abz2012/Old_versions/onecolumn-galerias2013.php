<?php
/**
 * Template Name: GALERIAS 2013 Jquery
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

include(TEMPLATEPATH."/var_constantes.php");
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
		width: 350px;
		margin: 20px 0;
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
<script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script>

		<div id="container">
			<div id="content" role="main">
			<div class="cont_one-clumn" style="background-color: #1a1a1a;padding-top: 20px; margin:10px;">
									<?
									$gallery=$_GET["gallery"];
									$foto=$_GET["foto"];
									$idfoto=$_GET["idfoto"];
									if(!is_numeric($gallery)) exit("Error de Validación");

									global $wpdb;
									$name_gallery=$wpdb->get_var("SELECT title FROM wp_ngg_gallery WHERE gid=" . $gallery . " ");
									//$sqlstr="SELECT np.galleryid, ng.path, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND np.galleryid=$gallery UNION SELECT np.galleryid, ng.path, np.alttext, np.description, np.filename, np.pid FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng WHERE np.galleryid=ng.gid AND pg.gid=$gallery AND pg.pid=np.pid;";
									$sqlstr="SELECT  * 
									FROM ( 
										SELECT np.sortorder, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
										FROM wp_ngg_pictures np, wp_ngg_gallery ng
										WHERE np.galleryid = ng.gid AND np.galleryid =".$gallery."
									UNION 
										SELECT np.sortorder, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
										FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng
										WHERE np.galleryid = ng.gid AND pg.gid =".$gallery." AND pg.pid = np.pid ) AS a
									ORDER  BY a.sortorder DESC limit 25";
									//echo($sqlstr);
									$galleries = $wpdb->get_results($sqlstr, ARRAY_A);?>
									
									<h2 style="color:<?php echo cat_color(fotos);?>; margin-left: 25px !important;">FOTOS</h2>
									<h1 style="color:#fff; margin-left: 25px !important;"><?=$name_gallery?></h1>
									
									<div class="mainGallery">
									
										    <div class="left"><a href="javascript:void(0)" id="imgLeftBig" class="nextPreviousBig previousBig">Previous</a></div>
										    <div id="carouselBig" style="float:left;">
										    		<div id="bannerGaleria" style="position:absolute; right: 80px;z-index:100;"><?php echo quien_es("300","250","1");?></div>

										          <?foreach($galleries as $image){?>


														<div class="set">
												            <?
															$vecUrl=explode("http://",$image["filename"]);
															$desc=$image["description"];
															$alttext=$image["alttext"];

															if($alttext==""){
																$alttext=$desc;
															}
															if($vecUrl[1]=="")
															{
																	$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
															}else{
																	$urlImg="http://".$vecUrl[1];

															}
															?>
												            <div class="imgCaption">
																	<p><iframe src="//www.facebook.com/plugins/like.php?href=<?=$urlImg?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe></p>
																	<p><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$urlImg?>" data-text="<?=$desc?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a></p>
																	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
																	
																	<div style="margin-bottom:30px;">
																		<div id="fb-root<?=$image["pid"]?>"></div> 
																		<fb:comments href="<?=$urlImg;?>" width="400" num_posts="2" colorscheme="dark"></fb:comments >
																	</div><!-- #FACEBOOK COMMENT -->
												            </div>
												            <div class="imgImage">
												            	<img src="<?=$urlImg;?>" title="<?=$alttext?>" alt="<?=$alttext?>" /><br/>
												            	<h2 style="margin-top: 10px; margin-bottom:5px; color:<?php echo cat_color(fotos);?>; text-transform: none; letter-spacing:normal; font-family: 'Din Web Condensed', 'Arial Narrow', Sans-Serif; text-rendering: optimizeLegibility;color:#fff; font-size:18px; line-height:1.2 !important;"><?=$alttext?></h2>
														        <h2 style="color:<?php echo cat_color(fotos);?>; text-transform: none; letter-spacing:normal; font-family: 'Din Web Condensed', 'Arial Narrow', Sans-Serif; text-rendering: optimizeLegibility;color:#fff; font-size:18px; line-height:1.2 !important;"><a href="../<?=$var_con[90];?>/" style="color:#fff;">Ver más galerias</a></h2>

												            </div>
												            <div class="clear"></div>
												       	</div>
											
													<?}?>
										    </div>
										    <div class="right"><a href="javascript:void(0)" id="imgRightBig" class="nextPreviousBig nextBig">Next</a></div>
										    
										    <div class="galeri_inferior">
										      	<div class="left footer"><a href="javascript:void(0)" id="imgLeftThumb" class="nextPrevious previous">Previous</a></div>
										      	<div class="centro footer">
										          <ul id="carouselThumb" class="gallerythumb">
										            <?foreach($galleries as $image_ch){

																		$vecUrl=explode("http://",$image_ch["filename"]);
																		//print_r($vecUrl);
																		//exit;
																		$desc=$image_ch["description"];

																		$alttext=$image_ch["alttext"];

																		if($alttext==""){
																			$alttext=$desc;
																		}
																		if($vecUrl[1]=="")
																		{
																				$urlImg=$var_con[1].$image_ch["path"]."/".$image_ch["filename"];
																		}else{
																				$urlImg="http://".$vecUrl[1];

																		}
																		if($idfoto==$image_ch["pid"])
																			{
																				$height=70;
																			}else{
																				$height=50;
																		}
																		?>
																		 <li><img src="<?=$urlImg;?>" height="140" /></li>
													<?}?>
												   </ul>
										        </div>
										     	<div class="right footer" style="text-align:left"><a href="javascript:void(0)" id="imgRightThumb" class="nextPrevious next">Next</a></div>
										    </div>
									</div>

										<script type="text/javascript">
										function activateThumb(no) {
											$("#carouselThumb li").removeClass("active");
											$("#carouselThumb li:eq("+no+")").addClass("active");
										}
										function bigSlideControl(arg) {
											var oBigController = arg;
											var currentItem = oBigController.getCurrentID();
											activateThumb(currentItem);
											if(currentItem==0) {
												$("#imgLeftBig").css({opacity:0.4});
											} else {
												$("#imgLeftBig").css({opacity:1});
											}
											
											//console.debug("currentItem "+currentItem)
											if(thumbs!=undefined) {
												thumbs.goto(parseInt(currentItem));
											}	
										//	alert(currentItem);
										}
										function thumbSlideControl(arg) {
											var oController = arg;
											var currentItem = oController.getCurrentID();
											if(currentItem==0) {
												$("#imgLeftThumb").css({opacity:0.4});
											} else {
													$("#imgLeftThumb").css({opacity:1})
											}
										}

										// autoSlide:2000, 
										var oBigController = $("#carouselBig").msCarousel({width:860, height:800,callback:bigSlideControl, showMessage:true, messageOpacity:1}).data("msCarousel");
										var thumbs = $("#carouselThumb").msCarousel({boxClass:'li', width:860, height:140, callback:thumbSlideControl, scrollSpeed:500}).data("msCarousel");

										//big button click
										$("#imgRightBig").click(function() {
											oBigController.next();
										});
										$("#imgLeftBig").click(function() {
											oBigController.previous();
										})

										//thumb click
										$("#imgRightThumb").click(function() {
											thumbs.next();
										});
										$("#imgLeftThumb").click(function() {
											thumbs.previous();
										})

										//add click event
										$("#carouselThumb li").click(function(arg) {
											var target = this;
											var counter = $("#carouselThumb li").index(target);
											oBigController.goto(parseInt(counter));
										})
											//no use
											$("#ver").html("v"+oBigController.getVersion());	
										</script>



			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
