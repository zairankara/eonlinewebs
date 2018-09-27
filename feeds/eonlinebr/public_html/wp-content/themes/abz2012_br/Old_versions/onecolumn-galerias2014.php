<?php
/**
 * Template Name: GALERIAS 2014 v2.0
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

$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
include(TEMPLATEPATH."/var_constantes.php");
?>


		<div id="container">
		
			<div id="content" role="main">
			<div class="cont_one-clumn" id="galeria_foto">
									<?

									global $wpdb;
										$galleries = obtener_galerias($gallery, NULL, "pg.orden", "ASC");									
									?>
									<h2 style="color:<?php echo cat_color('fotos');?>; margin-left: 25px !important;">FOTOS /<span style="color:#fff; margin-left: 25px !important;"><?=$galleries[0]["title_gal"]?></span></h2>
  									<script>var fruits = [];var alttext = [];var tit_text = [];</script>
						            <?
						          	$miarray_url = array();
						          	$miarray_desc = array();
						          	$miarray_id = array();
						            ?>
									<div class="mainGallery">
										    <!-- Carrosuel principal -->
										    <div class="left"><a href="javascript:void(0)" id="imgLeftBig" class="nextPreviousBig previousBig">Previous</a></div>
										    <div id="carouselBig" style="float:left;">
										        <div class="imgImage" id="imgImage"></div>
										        <!--TIRA DE THUMBS-->
										     <br clear="all"/>
										     <div class="galeri_inferior">
										      	<div class="left2 footer"><a href="javascript:void(0)" id="imgLeftThumb" class="nextPrevious2 previous2">Previous</a></div>
										      	<div class="centro footer">
										          <ul id="carouselThumb" class="gallerythumb">
										            <?
										            $cont_img=1;
										            foreach($galleries as $image_ch){

																		$vecUrl=explode("http://",$image_ch["filename"]);
																		$description=$image_ch["description"];
																		$titulo=$image_ch["title"];

																		if($vecUrl[1]=="")
																		{
																				$urlImg=$var_con[1].$image_ch["path"]."/".$image_ch["filename"];
																		}else{
																				$urlImg="http://".$vecUrl[1];

																		}
																		$image_ch_thumb_explode_resize=url_resize_sola_h($urlImg,66);
																		$image_gr_explode_resize=url_resize_sola_h($urlImg,480);
																		?>
																		<script>
																		fruits.push("<?=$image_gr_explode_resize?>");
																		alttext.push("<?=$description?>");
																		tit_text.push("<?=$titulo?>");
																		</script>
																		<?
																		array_push($miarray_url, $image_gr_explode_resize);
															          	array_push($miarray_desc, $description);

																		if($idfoto==$image_ch["pid"])
																			{
																				$height=70;
																			}else{
																				$height=50;
																		}
																		?>
																		 <li><img src="<?=$image_ch_thumb_explode_resize;?>" height="66" alt="<?=$titulo?>" title="<?=$titulo?>"/></li>
													<?
													 $cont_img++;
													 }?>
												   </ul>
										        </div>
										        <div class="right2 footer" style="text-align:left"><a href="javascript:void(0)" id="imgRightThumb" class="nextPrevious2 next2">Next</a></div>

										    </div>
										   
										    <!-- /TIRA DE THUMBS-->
												<div class="imgCaption" id="imgCaption" >
													<div style="margin-left:20px;">
														<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
														<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

														<p><iframe src="//www.facebook.com/plugins/like.php?href=<?=$miarray_url[0]?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe> <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$miarray_url[0]?>" data-text="<?=$miarray_desc[0]?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a></p>
														
														<div style="margin-bottom:30px;">
															<div id="fb-root"></div> 
															<fb:comments href="<?=$miarray_url[0];?>?b=1" width="480" num_posts="5" colorscheme="dark"></fb:comments >
														</div>
														<?//echo $miarray_url[0];?>
														<?//echo $miarray_desc[0];?>
														<?//echo $miarray_id[0];?>

													</div>
												</div>
												<div class="clear"></div>
										        
										    </div>
										    <div class="right"><a href="javascript:void(0)" id="imgRightBig" class="nextPreviousBig nextBig">Next</a></div>
										    <!-- / carrosuel principal -->


											<!-- BANNER 300X250 -->
										    <div id="bannerGaleria"><?php echo quien_es("300","250","1");?></div>
											<!-- / BANNER 300X250 -->

											<!-- GALERIAS DESTACADAS -->
											<? include (TEMPLATEPATH . '/galerias_destacadas_in_gallery.php');?>
											<!-- / GALERIAS DESTACADAS -->
		    
		    
										   
									</div>

										<script type="text/javascript">

										function activateThumb(no) {
											//console.log(no+"----activateThumb");
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
											
											if(thumbs!=undefined) {
												thumbs.goto(parseInt(currentItem));
											}	

										}
										function thumbSlideControl(arg) {
											//console.log(arg+"-----------");
											var oController = arg;
											var currentItem = oController.getCurrentID();
											if(currentItem==0) {
												$("#imgLeftThumb").css({opacity:0.4});
											} else {
												$("#imgLeftThumb").css({opacity:1})
											}
										}
										function obtener_height(){
											//console.log("height 1235: "+$("#imgsrc").height());
										}

										function traer_facebook(url, desc){
											$.post("<?=$var_con[100]?>/carga_facebook.php?rand<?=rand(0,500);?>",{purl:url,pdesc:desc},
												function(respuesta){ 
													$("#imgCaption").html(respuesta);
													FB.XFBML.parse();
													//FB.Canvas.setAutoResize();
													twttr.widgets.load();
												});
										}
										
										// autoSlide:2000, 
										var oBigController = $("#carouselBig").msCarousel({width:525, callback:bigSlideControl, showMessage:true, messageOpacity:1}).data("msCarousel");
										var thumbs = $("#carouselThumb").msCarousel({boxClass:'li', width:460, height:80, callback:thumbSlideControl, scrollSpeed:500}).data("msCarousel");
										var contador = 0;
										activateThumb(contador);
										//console.log("Contador inicial: "+contador);
										var count = 1;
										//console.log("CANTIDAD ELEMENTOS 2:"+fruits.length);
										var cantidad_array = fruits.length;
										$("#imgLeftBig").css({"display": "none"});
										obtener_height();
										$(function(){
											$("#imgImage").html('<img src="'+fruits[0]+'" id="imgsrc" title="'+alttext[0]+'" alt="'+alttext[0]+'"/><h2>'+tit_text[0]+'</h2><p>'+alttext[0]+'</p>').fadeIn(9000);  
											
										});
										</script>

										<script type="text/javascript">
										//big button click
										
										$("#imgImage").click(function() {
												contador=contador+1;
												activateThumb(contador);
												var img=contador;
												console.log("img: "+img);
												console.log("cantidad_array: "+cantidad_array);
												if(img!=0){
													$("#imgLeftBig").css({"display": "block"});
												}
												if(img==cantidad_array-1){
													$("#imgRightBig").css({"display": "none"});
												}else{
													$("#imgRightBig").css({"display": "block"});
												}
												if(img!=cantidad_array){
													$("#imgImage").css({opacity: 0});
													$("#imgImage").html('<img src="'+fruits[img]+'" id="imgsrc" title="'+alttext[img]+'" alt="'+alttext[img]+'"/><h2>'+tit_text[img]+'</h2><p>'+alttext[img]+'</p>');
													$("#imgImage").animate({
														opacity:1
													},2000);
													traer_facebook(fruits[img], alttext[img]);
												}else{
													$("#imgImage").css({opacity: 0});
													$("#imgImage").html('<img src="'+fruits[0]+'" id="imgsrc" title="'+alttext[0]+'" alt="'+alttext[0]+'"/><h2>'+tit_text[0]+'</h2><p>'+alttext[0]+'</p>');
													$("#imgImage").animate({
														opacity:1
													},2000);
													traer_facebook(fruits[0], alttext[0]);
													thumbs.goto(parseInt(0));
													contador = 0;
													activateThumb(contador);
													$("#imgLeftBig").css({"display": "none"});
												}
										});

										$("#imgRightBig").click(function() {
												
												obtener_height(); 
												contador=contador+1;
												activateThumb(contador);
												var img=contador;
												if(img!=0){
													$("#imgLeftBig").css({"display": "block"});
												}
												if(img==cantidad_array-1){
													$("#imgRightBig").css({"display": "none"});
												}else{
													$("#imgRightBig").css({"display": "block"});
												}
												$("#imgImage").css({opacity: 0});
												$("#imgImage").html('<img src="'+fruits[img]+'" id="imgsrc" title="'+alttext[img]+'" alt="'+alttext[img]+'"/><h2>'+tit_text[img]+'</h2><p>'+alttext[img]+'</p>');
												$("#imgImage").animate({
													opacity:1
												},2000);
												traer_facebook(fruits[img], alttext[img]);

										});

										$("#imgLeftBig").click(function() {
												obtener_height(); 
												contador=contador-1;
												activateThumb(contador);
												var img=contador;
												//console.log("img:"+img);
												if(img==0){
													$(this).css({"display": "none"});
												}else{
													$(this).css({"display": "block"});
												}
												if(img!=cantidad_array-1){
													$("#imgRightBig").css({"display": "block"});
												}
												//var counter = $("#carouselThumb li").index(target);
												$("#imgImage").css({opacity: 0});
												$("#imgImage").html('<img src="'+fruits[img]+'"  id="imgsrc" title="'+alttext[img]+'" alt="'+alttext[img]+'"/><h2>'+tit_text[img]+'</h2><p>'+alttext[img]+'</p>');
												$("#imgImage").animate({
													opacity:1
												},2000);
												traer_facebook(fruits[img], alttext[img]);
										});
		
										//thumb click
										$("#imgRightThumb").click(function() {
											thumbs.next();
										});

										$("#imgLeftThumb").click(function() {
											thumbs.previous();
										})

										//add click event
										$("#carouselThumb li").click(function(arg) {
											
											obtener_height(); 
											var target = this;
											var counter = $("#carouselThumb li").index(target);
											oBigController.goto(parseInt(counter));
											activateThumb(parseInt(counter));

											if(counter!=0){
												$("#imgLeftBig").css({"display": "block"});
											}else{
												$("#imgLeftBig").css({"display": "none"});
											}
											if(counter==cantidad_array-1){
												$("#imgRightBig").css({"display": "none"});
											}else{
												$("#imgRightBig").css({"display": "block"});
											}
											$("#imgImage").css({opacity: 0});
											$("#imgImage").html('<img src="'+fruits[counter]+'"  id="imgsrc" title="'+alttext[counter]+'" alt="'+alttext[counter]+'"/><h2>'+tit_text[counter]+'</h2><p>'+alttext[counter]+'</p>');
											$("#imgImage").animate({
												opacity:1
											},2000);
											contador=counter;
											traer_facebook(fruits[counter], alttext[counter]);
										})
										
										//no use
										//$("#ver").html("v"+oBigController.getVersion());	
										</script>


			</div>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>