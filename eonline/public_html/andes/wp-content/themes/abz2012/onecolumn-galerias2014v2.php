<?php
/**
 * Template Name: GALERIAS 2014 v3.0
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

function ObtenerHeight($url_imagen){

	$extrae3 = explode("//rs_",$url_imagen);
	if($extrae3[1]!=""){
		$image3 = explode("-",$extrae3[1]);
		$image3=$image3[0];

		$image_wh = explode("x",$image3);
		
		$image_h = $image_wh[1];

		return($image_h);

	}
}
function ObtenerWidth($url_imagen){

	$extrae3 = explode("//rs_",$url_imagen);
	if($extrae3[1]!=""){
		$image3 = explode("-",$extrae3[1]);
		$image3=$image3[0];

		$image_wh = explode("x",$image3);
		$image_w = $image_wh[0];
		

		return($image_w);

	}
}
?>

<script>
$(document).ready(function() {
	$( "#cont_search_banners" ).remove();
	$( "#div-gpt-ad-galerias-2000x1000" ).remove();
 });
</script>
<script src="http://connect.facebook.net/es_ES/all.js#xfbml=1&status=0"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_gallery.css" />
<?
global $wpdb;
$gallery=$_GET["gallery"];

if($gallery!=""){
	$galleries2 = obtener_galerias($gallery, NULL, "pg.orden", "ASC");
}else{
	exit("Error de Galeria");
}//print_r($galleries);									
?>

<script>var fruits = [];var alttext = [];var tit_text = [];var alttext_limpio = [];</script>
<?
$miarray_tit = array();
$miarray_url = array();
$miarray_desc = array();
$miarray_desc_limpio = array();
$miarray_id = array();
?>



<div class="galeri_inferior" style="z-index:1000;">
	<div class="centro footer" >
		<div id="imgLeftThumb"></div>
		<div id="imgRightThumb"></div>
		
	<ul id="carouselThumb" class="gallerythumb">
	    <?
	    $cont_img=1;
	    foreach($galleries2 as $image_ch){

							$vecUrl=explode("http://",$image_ch["filename"]);
							$description=strip_tags($image_ch["description"], "<a><strong>");
							$description_limpio=strip_tags($image_ch["description"]);
							$titulo=$image_ch["title"];


							if($vecUrl[1]=="")
							{
									$urlImg=$var_con[1].$image_ch["path"]."/".$image_ch["filename"];
							}else{
									$urlImg="http://".$vecUrl[1];

							}
							$image_ch_thumb_explode_resize=url_resize_sola_h($urlImg,80);
							//$image_gr_explode_resize=url_resize_sola_h($urlImg,600);
							$image_gr_explode_resize=$urlImg;
							?>
							<script>
							fruits.push("<?=$image_gr_explode_resize?>");
							alttext.push("<?=$description?>");
							alttext_limpio.push("<?=$description_limpio?>");
							tit_text.push("<?=$titulo?>");
							</script>
							<?
							array_push($miarray_url, $image_gr_explode_resize);
				          	array_push($miarray_desc, $description);
				          	array_push($miarray_desc_limpio, $description_limpio);
				          	array_push($miarray_tit, $titulo);
				          	

							if($idfoto==$image_ch["pid"]){
									$height=70;
								}else{
									$height=50;
							}
							?>
							 <li><img src="<?=$image_ch_thumb_explode_resize;?>" height="80" alt="<?=$titulo?>" title="<?=$titulo?>"/></li>
		<?
		 $cont_img++;
		 }?>
	   </ul>
	</div>
</div>

<a href="javascript:void(0)" id="imgLeftBig" class="nextPreviousBig previousBig"><div class="volver"></div></a>
<div id="container">

	<div id="content" role="main" style="padding:0px;">
	<div class="cont_one-clumn" id="galeria_foto">

				        
							<div class="mainGallery">
									<div class="imgImageAnt" id="imgImageAnt"></div>
									 <div class="imgImageSig" id="imgImageSig"></div>

								    <!-- Carrosuel principal -->
								    <div id="carouselBig" style="position:absolute;">
								       	<!--<div class="imgImageAnt" id="imgImageAnt"></div>-->
								        <div class="imgImage" id="imgImage"></div>
								    </div>
								    <!-- / carrosuel principal -->
								    <div class="placa_galeria">
									<!--<h2 style="color:<?php echo cat_color('fotos');?>; margin-left: 25px !important;">FOTOS /<span style="color:#fff; margin-left: 25px !important;"><?=$galleries2[0]["title_gal"]?></span></h2>-->
									
									<!-- BANNER 300X250 -->
									<div id="bannerGaleria" style="margin:10px 0 0 30px;"><?php echo quien_es("300","250","1");?></div>
									<!-- / BANNER 300X250 -->
									
									<div class="titulo_galeria">
										<h2><?=$galleries2[0]["title_gal"]?></h2>
										<h3></h3>
										<p></p>

										
											<div class="share" id="share"> 
												<?
												$url_share2 = "http://la.eonline.com/varios/share_facebook13.php";
												$url_share3 = "http://la.eonline.com/varios/share_facebook13.php%26rnd=".rand(0,5000)."%26gal=".$gallery."%26img=".$miarray_url[0]."%26nogeo=1%26t=".$miarray_tit[0]."%26d=".$miarray_desc_limpio[0];
												$url_share3=str_replace("'", " ", $url_share3);
												$url_share3=str_replace('"', ' ', $url_share3);
												$ur_share5="?u=".$url_share2."?url=".$url_share3;
												echo("<a target='_blank' href='http://www.facebook.com/sharer.php".$ur_share5."' class='facebook-share'><span></span></a>");
												?>

												<!--<a target='_blank' href='http://www.facebook.com/sharer.php?u=http://dev.eonlinelatinola.com<?=$_SERVER["REQUEST_URI"]?>%26img=<?=$miarray_url[0]?>' class='facebook-share'><span></span></a>-->
												<!--<a target='_blank' href="https://plus.google.com/109640549139413649832?rel=author" class="plus-share" target="blank"><span></span></a>-->
												<!--<a target='_blank' href="https://twitter.com/share"  data-url="<?=$miarray_url[0]?>" data-text="<?=$miarray_desc[0]?>" data-via="eonlinelatino" data-lang="es" data-dnt="true"><span></span></a>-->
												<a target='_blank' href='http://twitter.com/home?status=<?php echo urlencode($miarray_desc_limpio[0]." ".$miarray_url[0]);?>' data-url='<?=$miarray_url[0]?>' data-text='<?=$miarray_desc_limpio[0]?>' class='twitter-share' data-via='eonlinelatino' data-lang='es' data-dnt='true'><span></span></a>
												<a class='addthis_button_email email-share'><span></span></a>
												
											</div>


									</div>

									<!-- BANNER 300X50 -->
									<div id="bannerGaleria1"><?php echo quien_es("300","50",NULL);?></div>
									<!-- / BANNER 300X50 -->

									</div>
									


    							
							</div>
							<div id="comentarios">

								<div class="comentario1" style="margin-top:40px;">
									
									<h3>COMENTARIOS</h3>
									<div id="fcom">
										
										<div id="fb-root"></div> 
										
										<fb:comments href="<?=$miarray_url[0];?>" width="480" num_posts="5" colorscheme="dark"></fb:comments>
									</div>
									
								</div>

								<div class="comentario2">
										<div style="margin:auto;background:#1A1A1A;">
										<div style="margin-left:30px;">
									<!-- GALERIAS DESTACADAS -->
									<? include (TEMPLATEPATH . '/galerias_destacadas_in_gallery.php');?>
									<!-- / GALERIAS DESTACADAS -->
									</div>
									</div>
								</div>

							</div>

						



	</div>
	</div><!-- #content -->
</div><!-- #container -->
<a href="javascript:void(0)" id="imgRightBig" class="nextPreviousBig nextBig"><div class="siguiente"></div></a>

<?php  get_footer(); ?>




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

	function traer_facebook(url, desc,title,gallery){
		$.post("<?=$var_con[100]?>/carga_facebook.php?rand<?=rand(0,500);?>",{purl:url,pdesc:desc},
			function(respuesta){ 
				$("#fcom").html(respuesta);
				FB.XFBML.parse();
				//FB.Canvas.setAutoResize();
				//twttr.widgets.load();
			});

		$.post("<?=$var_con[100]?>/carga_addthis.php?rand<?=rand(0,500);?>",{purl:url,pdesc:desc,ptitle:title,pgallery:gallery},
			function(respuesta){ 
				$("#share").html(respuesta);
				//FB.XFBML.parse();
				//FB.Canvas.setAutoResize();
				//twttr.widgets.load();
			});
	}
	
	// autoSlide:2000, 
	var winWidth = ($(window).width());
	var winHeight = ($(window).height())-50;
	var winHeight2 = ($(window).height())-175;

	$( '.mainGallery').height(winHeight2);
	//console.log("Contador winHeight2: "+winHeight2);


	var oBigController = $("#carouselBig").msCarousel({height:winHeight2, callback:bigSlideControl, showMessage:true, messageOpacity:1}).data("msCarousel");
	var thumbs = $("#carouselThumb").msCarousel({boxClass:'li', width:winWidth, height:80, callback:thumbSlideControl, scrollSpeed:500}).data("msCarousel");
	var contador = 0;
	activateThumb(contador);
	//console.log("Contador inicial: "+contador);
	var count = 1;
	//console.log("CANTIDAD ELEMENTOS 2:"+fruits.length);
	var cantidad_array = fruits.length;
	$("#imgLeftBig").css({"display": "none"});
	obtener_height();
	$(function(){

		$("#imgImage").html('<img src="'+fruits[0]+'" id="imgsrc" title="'+tit_text[0]+'" alt="'+tit_text[0]+'"/>');
		$("#imgImageSig").html('<img src="'+fruits[1]+'" id="imgsrc_sig" title="'+tit_text[1]+'" alt="'+tit_text[1]+'"/>');  

		//$('meta[property="og:image"]').remove();
		//$('meta[itemprop="image"]').remove();

 		//$("head").append('<meta property="og:image" content="'+url+'">');
 		//$("head").append('<meta itemprop="image" content="'+url+'">');

 		//$('meta[property="og:url"]').attr("content","http://dev.eonlinelatinola.com/page/galerias?gallery=12696");
 		//$('meta[property="og:image"]').attr("content",fruits[0]);
 		//$('meta[itemprop="image"]').attr("content",fruits[0]);
		
		todoPasa();
		changePageName(1,'<?=$galleries2[0]["title_gal"]?>', tit_text[0]);
	});
	
	$(".titulo_galeria h3").html(tit_text[0]);
	$(".titulo_galeria p").html(alttext[0]);
	
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
				$("#imgImageAnt").html('<img src="'+fruits[img-1]+'" id="imgsrc_ant" title="'+tit_text[img-1]+'" alt="'+tit_text[img-1]+'"/>');  
				$("#imgImage").html('<img src="'+fruits[img]+'" id="imgsrc" title="'+tit_text[img]+'"/>');
				$("#imgImageSig").html('<img src="'+fruits[img+1]+'" id="imgsrc_sig" title="'+tit_text[img+1]+'" alt="'+tit_text[img+1]+'"/>');  
				$(".titulo_galeria h3").html(tit_text[img]);
				$(".titulo_galeria p").html(alttext[img]);
				todoPasa();
				changePageName(0,'<?=$galleries2[0]["title_gal"]?>', tit_text[img]);
	
				traer_facebook(fruits[img], alttext_limpio[img],tit_text[img],<?=$gallery?>);

				if(tit_text[img]!='') var tituloPhoto=tit_text[img]+"/";
				_gaq.push(['_trackPageview', '/<?=$name_feed?>/pagina/galerias/<?=$gallery?>/<?=$galleries2[0]["title_gal"]?>/'+tituloPhoto]);

			}else{
				$("#imgImage").css({opacity: 0});
				$("#imgImageAnt").html('<img src="'+fruits[img-1]+'" id="imgsrc_ant" title="'+tit_text[img-1]+'" alt="'+tit_text[img-1]+'"/>');  
				$("#imgImage").html('<img src="'+fruits[0]+'" id="imgsrc" title="'+tit_text[0]+'" alt="'+tit_text[0]+'"/>');
				$("#imgImageSig").html('<img src="'+fruits[1]+'" id="imgsrc_sig" title="'+tit_text[1]+'" alt="'+tit_text[1]+'"/>');  
				$(".titulo_galeria h3").html(tit_text[img]);
				$(".titulo_galeria p").html(alttext[img]);
				
				todoPasa();
				changePageName(0,'<?=$galleries2[0]["title_gal"]?>', tit_text[0]);
	
				traer_facebook(fruits[0], alttext_limpio[0],tit_text[0],<?=$gallery?>);
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
			$("#imgImageAnt").html('<img src="'+fruits[img-1]+'" id="imgsrc_ant" title="'+tit_text[img-1]+'" alt="'+tit_text[img-1]+'"/>');  
			$("#imgImage").css({opacity: 0});
			$("#imgImage").html('<img src="'+fruits[img]+'" id="imgsrc" title="'+tit_text[img]+'" alt="'+tit_text[img]+'"/>');
			$("#imgImageSig").html('<img src="'+fruits[img+1]+'" id="imgsrc_sig" title="'+tit_text[img+1]+'" alt="'+tit_text[img+1]+'"/>');  
			$(".titulo_galeria h3").html(tit_text[img]);
			$(".titulo_galeria p").html(alttext[img]);
			
			todoPasa();
			changePageName(0,'<?=$galleries2[0]["title_gal"]?>', tit_text[img]);

	
			traer_facebook(fruits[img], alttext_limpio[img],tit_text[img],<?=$gallery?>);

			if(tit_text[img]!='') var tituloPhoto=tit_text[img]+"/";
			_gaq.push(['_trackPageview', '/<?=$name_feed?>/pagina/galerias/<?=$gallery?>/<?=$galleries2[0]["title_gal"]?>/'+tituloPhoto]);

	});

	$("#imgLeftBig").click(function() {
			obtener_height(); 
			contador=contador-1;
			activateThumb(contador);
			var img=contador;
			//console.log("img:"+img);
			if(img==0){
				$(this).css({"display": "none"});
				$("#imgImageAnt").html('');

			}else{
				$(this).css({"display": "block"});
				$("#imgImageAnt").html('<img src="'+fruits[img-1]+'" id="imgsrc_ant" title="'+tit_text[img-1]+'" alt="'+tit_text[img-1]+'"/>');  
			}
			if(img!=cantidad_array-1){
				$("#imgRightBig").css({"display": "block"});
			}
			//var counter = $("#carouselThumb li").index(target);
			$("#imgImage").css({opacity: 0});
			$("#imgImage").html('<img src="'+fruits[img]+'"  id="imgsrc" title="'+tit_text[img]+'" alt="'+tit_text[img]+'"/>');
			$("#imgImageSig").html('<img src="'+fruits[img+1]+'" id="imgsrc_sig" title="'+tit_text[img+1]+'" alt="'+tit_text[img+1]+'"/>');  
			$(".titulo_galeria h3").html(tit_text[img]);
			$(".titulo_galeria p").html(alttext[img]);

			todoPasa();
			changePageName(0,'<?=$galleries2[0]["title_gal"]?>', tit_text[img]);
			traer_facebook(fruits[img], alttext_limpio[img],tit_text[img],<?=$gallery?>);

			if(tit_text[img]!='') var tituloPhoto=tit_text[img]+"/";
			_gaq.push(['_trackPageview', '/<?=$name_feed?>/pagina/galerias/<?=$gallery?>/<?=$galleries2[0]["title_gal"]?>/'+tituloPhoto]);
	});

	var ContadorThumbs = 0;
	var winWidth = $(window).width();
		//var left = $("#carouselThumb_mscchild").css("left");
		var width = $("#carouselThumb_mscchild").width();
		var WidthTotal = parseInt(0);
		
		for ( var i = 0; i < fruits.length; i = i + 1 ) {
			var liWidth = $("#carouselThumb_mscchild li:eq("+i+")").width();
			WidthTotal=(parseInt(WidthTotal)+parseInt(liWidth));
			}

		if(WidthTotal<winWidth){
				$("#imgRightThumb").css({"display": "none"});
				$("#imgLeftThumb").css({"display": "none"});
				$(".galeri_inferior").css({"background": "transparent"});
				
			}

	var restoWidth = parseInt(WidthTotal)-parseInt(winWidth);
		//restoWidth = parseInt(restoWidth)*parseInt(-1);			


	var WidthUltimaImagen = liWidth;
	restoWidth = (parseInt(restoWidth) - parseInt(liWidth) - 1); 

	//thumb click
	$("#imgRightThumb").click(function() {
		
		
	
		//alert(liWidth);
		var left = $("#carouselThumb_mscchild").css("left");
		if (Math.abs(parseInt(left)) <= restoWidth){
			
			var CalculoSiguiente = $("#carouselThumb_mscchild li:eq("+ContadorThumbs+")").width();
			ContadorThumbs++;
			//alert("left"+left);
			//alert("restoWidth"+restoWidth);
		$( "#carouselThumb_mscchild" ).animate({
    		left: "-="+winWidth
    		}, 1000, function(){
    		// Animation complete.
  		});
	}
	});




	var WidthPrimerImagen = $("#carouselThumb_mscchild li:eq(1)").width();


	$("#imgLeftThumb").click(function() {
		
		

		var left = $("#carouselThumb_mscchild").css("left");
		if (ContadorThumbs > 0){
			ContadorThumbs--;
			var CalculoSiguiente = $("#carouselThumb_mscchild li:eq("+ContadorThumbs+")").width();

			//alert("left"+left);
			//alert("restoWidth"+WidthPrimerImagen);
		$( "#carouselThumb_mscchild" ).animate({
    		left: "+="+winWidth
    		}, 1000, function(){
    		// Animation complete.
  		});
	}



		
		//var test = $("#carouselThumb_mscchild").css({"left": "block"});
		
			
	//thumbs.previous();
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
			$("#imgImageAnt").html('<img src="'+fruits[counter-1]+'" id="imgsrc_ant" title="'+tit_text[counter-1]+'" alt="'+tit_text[counter-1]+'"/>');  

		}else{
			$("#imgLeftBig").css({"display": "none"});
			$("#imgImageAnt").html('');
		}
		if(counter==cantidad_array-1){
			$("#imgRightBig").css({"display": "none"});
		}else{
			$("#imgRightBig").css({"display": "block"});
		}
		$("#imgImage").css({opacity: 0});
		$("#imgImage").html('<img src="'+fruits[counter]+'"  id="imgsrc" title="'+tit_text[counter]+'" alt="'+tit_text[counter]+'"/>');
		$("#imgImageSig").html('<img src="'+fruits[counter+1]+'" id="imgsrc_sig" title="'+tit_text[counter+1]+'" alt="'+tit_text[counter+1]+'"/>');  

		$(".titulo_galeria h3").html(tit_text[counter]);
		$(".titulo_galeria p").html(alttext[counter]);
		
		todoPasa();
		changePageName(0,'<?=$galleries2[0]["title_gal"]?>', tit_text[counter]);
	
		contador=counter;
		traer_facebook(fruits[counter], alttext_limpio[counter],tit_text[counter],<?=$gallery?>);

		if(tit_text[counter]!='') var tituloPhoto=tit_text[counter]+"/";
		_gaq.push(['_trackPageview', '/<?=$name_feed?>/pagina/galerias/<?=$gallery?>/<?=$galleries2[0]["title_gal"]?>/'+tituloPhoto]);
	})

	//esta funciona calcula el height de la foto
	function methodToFixLayout_galeria() {
	    var winHeight = $(window).height();
	    return winHeight-175;
	}

	function calculoHeightimagen(){
	  	var winHeight = $(window).height();
    	winHeight = winHeight-175;
    	var imgHeight = $('#imgImage img').height();
    	
    	var calculoHeight = (parseInt(winHeight - imgHeight)/2);
    	
    	//$('#imgImage img').top(calculoHeight);
    	$("#carouselBig").height(winHeight);
    	$("#imgImage").height(imgHeight);
    
    	$("#carouselBig").css("marginTop", calculoHeight);
	}

	function calculoHeightimagenAnt(){
	  	var winHeight = $(window).height();
    	winHeight = winHeight-175;
    	var imgHeight = $('#imgImageAnt img').height();
    	
    	var calculoHeight = (parseInt(winHeight - imgHeight)/2);
    	
    	//$('#imgImage img').top(calculoHeight);
    	//$("#carouselBig").height(winHeight);
    	//$("#imgImage").height(imgHeight);
    
    	$("#imgImageAnt").css({top: calculoHeight});
	}

	function calculoTopimagenSig(height_prox,width_prox){
	  	var winHeight = $(window).height();
    	winHeight = winHeight-175;
    	var imgHeight = height_prox;
    	console.log ("img height"+imgHeight);
    	console.log("Win height:"+winHeight);
    	var calculoHeight = (parseInt(winHeight - imgHeight)/2);
    	//$( '#imgImageSig img').height(methodToFixLayout_galeria());
    	
		if (width_prox>height_prox && winHeight>height_prox){
    		$("#imgImageSig").css({top: calculoHeight});
    	}else{
			alert("entro");
	    	$("#imgImageSig").css({top: 0});
    	}


	}


	function todoPasa(){
		// aca recalculo y ejecuto el height imagen
		$("img#imgsrc").load(function(){
		    // Refresca el los divs de adunits
			//googletag.pubads().refresh();

		    var $this = $(this);
		    if ($this.width() < $this.height()) {
		       $('#imgImage img').height(methodToFixLayout_galeria());
		       $('#carouselBig').height(methodToFixLayout_galeria());
		       $('#carouselBig').width($this.width());
		    }else{
		    	$('#carouselBig').height($this.height());
		    	$('#carouselBig').width($this.width());
		  	}


			// Calculo position Imagen centrada
			var WidhtWindow=($(window).width()/2).toFixed();
			var MitadImage=($this.width()/2).toFixed();
		    var PosImage=WidhtWindow-MitadImage;
		    $("#carouselBig").css({left: PosImage});


		    //centrar verticalmente la img anterior
		    calculoHeightimagenAnt();
		           
		    //centrar verticalmente la img principal
		    calculoHeightimagen();

		 
		    // Calculo position Placa
		    var PosPlaca=(parseInt(WidhtWindow)+parseInt(MitadImage));
		    $(".placa_galeria").width(PosImage);
		    $(".comentario2").width(PosImage);
		    $("#clients").width(PosImage);
		    $(".comentario1").css({right: PosImage+80});

		    $('#imgImage').width($this.width());
		    $("#imgImage").css({opacity: 1});
		    $("#imgImageSig").css({left: PosPlaca});
		    $("#imgImageAnt").css({right: PosPlaca});

		});

		$("img#imgsrc_sig").load(function(){
		    var $this = $(this);
		    if ($this.width() < $this.height()) {
		       $( '#imgImageSig img').height(methodToFixLayout_galeria());
		       $("#imgImageSig").css({top: 0});
		    }else{
		    	//aca deberiamos centrar verticalemnte
		    	//calculoTopimagenSig();
		    	//var width_prox = width_img[img+2];
				//var height_prox = height_img[img+2];
		    	//calculoTopimagenSig(height_prox,width_prox);
		    		var winHeight = $(window).height();
			    	winHeight = winHeight-175;
			    	var imgHeight = $this.height();
			    	
			    	var calculoHeight = (parseInt(winHeight - imgHeight)/2);
			    
			    	 $("#imgImageSig").css({top: calculoHeight});
			    	//$(".titulo_galeria p").html(imgHeight);
			}
			$('#imgImage_sig').width($this.width());
		});

		$("img#imgsrc_ant").load(function(){
		    var $this = $(this);
		    if ($this.width() < $this.height()) {
		       $( '#imgImageAnt img').height(methodToFixLayout_galeria());
		    }
		    $('#imgImage_ant').width($this.width());
		});
	}

var objectGlobal = {};
function changePageName(is_load, titGal, titFoto){
  objectGlobal.pageName = location.hostname+location.pathname+titGal+'/'+titFoto;
  if(is_load==0) _satellite.track('galleryImg');
}
</script>