<?
if($_GET["attachment_id"]!="" and is_numeric($_GET["attachment_id"])){
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://la.eonline.com/andes/" );
}
/*if (is_404()) {
	# code...
	$rul_new=str_replace("/", "", $_SERVER["REQUEST_URI"]);
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://dev.eonlinelatinola.com/?pagename=$rul_new" );
}*/
?>

<?php
include(TEMPLATEPATH."/var_constantes.php");

//include(TEMPLATEPATH."/detectar_movil.php");

/*
// MOBILE 
	if(is_single() || is_page( ) || is_attachment()){
		$id_post="reader.php?f=".$var_con[0]."&id=".get_the_ID();
	}else{
		$id_post="parser.php?f=".$var_con[0]."";
	}

	$agent = $_SERVER['HTTP_USER_AGENT'];  
	$mobile=0;
	 
	if(strpos($agent, "iPhone")!== FALSE){
		$mobile=1;
	}elseif(strpos($agent, "Android")!== FALSE){
		$mobile=1;
	}elseif(strpos($agent, "BlackBerry")!== FALSE){
		$mobile=1;
	}

	if(is_page("galerias") && $mobile==1){
		header("Location:http://la.eonline.com/mobile/gallery.php?f=".$var_con[0]."&gallery=".$_GET["gallery"]);
	    exit();  
	}elseif($mobile==1){
		header('Location:http://la.eonline.com/mobile/'.$id_post);
	    exit;  
	}

*/

// CAMBIO LA COOKIE
	if($_POST["flag"]==1){
		$cual=$_POST["cual"];
		//if($cual!="99") setcookie("ubicacion","$cual",time()+365*24*60*60);
		switch($cual){
			case "1":header('Location:/andes/');break;
			case "2":header('Location:/argentina/');break;
			case "3":header('Location:/mexico/');break;
			case "4":header('Location:/venezuela/');break;
			case "99":header('Location:http://br.eonline.com/');break;
		}
	}

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/Organization" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Language" content="es"/>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="author" content="http://www.abzcomunicacion.com" />
<meta name="identifier-url" content="http://www.eonlinelatinola.com/" />
<meta name="Language" content="Spanish" />
<meta name="Distribution" content="Global" />
<meta name="revisit-after" content="1 day" />
<meta name="Category" content="entertainment" />
<link rel="shortcut icon" href="<?php echo $var_con[100]; ?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com" />
<META name="robot" content="noindex,nofollow">

<?php echo meta_alternate();?>

<!--<meta property="fb:app_id" content="268102679875815">-->


<?if(!is_single() && !is_page()){
	$page_actual=$wp_query->query_vars['paged'];

	if($page_actual<=1){
		$proxpag=$page_actual+1;?>
		<link rel="next" href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/page/".$proxpag."/"?>"/>
	<?}elseif(is_paged()){
		$proxpag=$page_actual+1;
		$antpag=$page_actual-1;?>
		<link rel="prev" href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/page/".$antpag."/"?>"/>
		<link rel="next" href="<? echo "http://" . $_SERVER['HTTP_HOST'] . "/page/".$proxpag."/"?>"/>
	<?}?>
<?}?>

<!-- GOOGLE PLUS -->
<!-- Update your html tag to include the itemscope and itemtype attributes -->





<!-- FACEBOOK OPENGRAPH -->
		<?php
		if(is_single()){
			$primera_img=sacar_img_sin_src();
			echo ('<!--
			  <PageMap>
			    <DataObject type="publication">
			      <Attribute name="author" value="John Tagliabue"/>
			      <Attribute name="date" value="March 14, 2014"/>
			      <Attribute name="category" value="Business/World Business"/>
			    </DataObject>
			    <DataObject type="thumbnail">
			      <Attribute name="src" value="'.$primera_img.'"/>
			      <Attribute name="width" value="100"/>
			      <Attribute name="height" value="130"/>
			    </DataObject>
			  </PageMap>
			-->');
		}
		
		$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";

		if(is_single()) {
				$feed_site="Andes";
				$title_site="E! Online Latino | ".$feed_site;
				$metadescription=obtener_metadescription();
				
				$title_post=wp_title('', false);
				if($metadescription==""){
					$metadescription=$title_post;
				}
				?>
				<title><?php single_post_title('');?>. E! Online Latino | Andes</title>
				<meta name="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
				<meta name="abstract" content="<?php echo $metadescription;?>. <?=$title_site?>" />
				
				<meta property="og:type" content="article" />
				<meta property="og:title" content="<?php echo $title_post;?>" />
				<meta property="og:image" content="<?php echo $primera_img;?>" />
				<meta property="og:url" content="<?php the_permalink(); ?>"/>
				<meta property="og:description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
					
				<meta itemprop="name" content="<?php echo $title_post;?>"/>
				<meta itemprop="image" content="<?php echo $primera_img ;?>" />
				<meta itemprop="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />

		<?php } elseif(is_category()||is_tag()||is_page()) { ?>
				
				<? 
				$feed_site="Andes";
				$title_site="E! Online Latino | ".$feed_site;
				$description_site="E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood. ".$title_site;


				if(is_category( "enews" )){
					$title_site="Ultimas noticias, fotos y videos de los famosos. E! Online Latino | ".$feed_site;
					$description_site="Lo último en noticias, fotos y videos de las celebridades. Todo lo que necesitas saber. ".$title_site;
				}elseif ( is_category("efashionblogger")) {
					$title_site="Moda, estilo, desfiles y celebridades. E! Online Latino | ".$feed_site;
					$description_site="Lo último en noticias, fotos y videos de las celebridades. Todo lo que necesitas saber. ".$title_site;
				}elseif ( is_category("alfombraroja" )) {
					$title_site="Noticias, fotos y videos de las premiaciones. E! Online Latino | ".$feed_site;
					$description_site="Las Alfombras Rojas de las premiaciones más importantes de Hollywood y Latinoamérica. ".$title_site;
				}elseif ( is_category("the-kardashians" )) {
					$title_site="Noticias, fotos y videos de la Familia Kardashian. E! Online Latino | ".$feed_site;
					$description_site="Todo el Universo Kardashian en un solo lugar. ".$title_site;
				}elseif ( is_category("thetrend" )) {
					$title_site="The Trend. E! Online Latino | ".$feed_site;
					$description_site="Lo último en tendencias de las celebridades. ".$title_site;
				}elseif (es_wakeup()) {
					$title_site="WakeUp. E! Online Latino | ".$feed_site;
					$description_site="WakeUp. ".$title_site;
				}

				if(is_tag())
				{
				 $current_tag = single_tag_title("", false);
				 $title_site=$current_tag.". E! Online Latino | ".$feed_site;
				 $description_site="Todos los articulos de ".$current_tag.". E! Online Latino | ".$feed_site;
				}
				if(is_page("eshows")){
					$title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
					$description_site="Programas: Kardashians, Zona Trendy, E! Latin News, Fashion Police y más. ".$title_site;
				}elseif(is_page("programas")){
					$title_site="Horarios de los programas de E! Latinoamérica. E! Online Latino | ".$feed_site;
					$description_site="¿A qué hora ver los programas de E! Latinoamérica? Todos los programas, estrenos, series, horarios. ".$title_site;
				}elseif(is_page("fotos-argentina") || is_page("galerias")){
					$title_site="Fotos, imágenes y galerías de Celebridades. E! Online Latino | ".$feed_site;
					$description_site="El mundo del espectáculo en imágenes. ".$title_site;

					if($_GET["img"]!="")$default_img=$_GET["img"];
					if($_GET["t"]!="")$title_site=$_GET["t"]." ".$_GET["d"];
				}elseif(is_page("videos-2")){
					$title_site="Videos y entrevistas de famosos y la Alfombra Roja. E! Online Latino | ".$feed_site;
					$description_site="Noticias y entrevistas de las Celebridades en video. ".$title_site;
				}elseif(is_page("politicas-de-privacidad")){
					$title_site="Políticas de Privacidad. E! Online Latino | ".$feed_site;
					$description_site="Políticas de privacidad. ".$title_site;
				}elseif(is_page("terminos-de-uso")){
					$title_site="Términos de Uso. E! Online Latino | ".$feed_site;
					$description_site="Términos de Uso de E! Online Latinoamérica. ".$title_site;
				}elseif(is_page("politica-de-remocion")){
					$title_site="Política de Remoción. E! Online Latino | ".$feed_site;
					$description_site="Política de Remoción de E! Online Latinoamérica. ".$title_site;
				}elseif(is_page("contacto")){
					$title_site="Contacto. E! Online Latino | ".$feed_site;
					$description_site="¿Quieres comunicarte con nosotros? ".$title_site;
				}elseif(is_page("app")){
					$title_site="Descarga App. E! Online Latino | ".$feed_site;
					$description_site="Lo mejor de E! ONLINE está disponible en tu móvil ".$title_site;
				}elseif(is_page("lasopacolombia")){
					$title_site="La Sopa Colombia | ".$feed_site;
					$description_site="El comediante de la noche Alejandro Riaño será el anfitrión de la versión colombiana de The Soup en E! Colombia.";
				}elseif(is_page("zonatrendycolombia")){
					$title_site="Zona Trendy Colombia | ".$feed_site;
					$description_site="Si deseas contemplar muy de cerca el lifestyle de las celebridades y la socialité colombiana, Alexandra Santos te lleva a conocerlo.";
				}elseif(is_page("coffeebreak")){
					$title_site="Coffee Break con Patricia | ".$feed_site;
					$description_site="Llega a la pantalla de E!, el nuevo programa de entrevistas que te acerca más y más a tus celebridades favoritas.";
				}
				

				?>
				<title><?php echo $title_site ?></title>
				<meta name="description" content="<?php echo $description_site ?>" />
				<meta name="abstract" content="<?php echo $description_site ?>"/>
				<meta property="og:type" content="article" />
				<meta property="og:title" content="<?php echo $title_site ?>" />
				<meta property="og:url" content="http://dev.eonlinelatinola.com/page/galerias?img=<?=$default_img?>" />
				<meta property="og:description" content="<?php echo $description_site ?>" />
				<meta property="og:image" content="<?php echo $default_img ;?>" />
				<meta itemprop="description" content="<?php echo $description_site ?>"/>
				<meta itemprop="name" content="<?php echo $title_site ?>"/>
				<meta itemprop="image" content="<?php echo $default_img ;?>" />
				<meta name="twitter:widgets:csp" content="on">


		<?php } else { ?>


				<? 
				$title_site="E! Online Latino | Andes";
				$description_site="E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood. ".$title_site;
				?>
				<title><?php echo $title_site ?></title>
				<meta name="description" content="<?php echo $description_site ?>" />
				<meta name="abstract" content="<?php echo $description_site ?>"/>
				<meta property="og:type" content="blog" />
				<meta property="og:title" content="<?php echo $title_site ?>" />
				<meta property="og:url" content="<?php echo $var_con[1]; ?>"/>
				<meta property="og:description" content="<?php echo $description_site ?>" />
				<meta property="og:image" content="<?php echo $default_img ;?>" />
				<meta itemprop="description" content="<?php echo $description_site ?>"/>
				<meta itemprop="name" content="<?php echo $title_site ?>"/>
				<meta itemprop="image" content="<?php echo $default_img ;?>" />

		<?php } ?>

<!-- FACEBOOK OPENGRAPH -->

<!-- GOOGLE TRANSLATE -->
<meta name="google-translate-customization" content="4ec3c4730a580427-28fe3158eb9ed5f0-g08d064f13abb6371-17"></meta>
<!-- / GOOGLE TRANSLATE -->


<!-- ADDTHIS -->
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script>
<script type="text/javascript" src="http://la.eonline.com/varios/modulos_extra/addthis_widget.js#pubid=matibur"></script>
<!-- / ADDTHIS -->

<!-- STYLES -->

		<!-- FONT-FACE -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/font-face/font-face.css" />
		<!-- / FONT-FACE -->


		<!--CSS CYCLE-->
		<link rel="stylesheet" type="text/css" href="<?php echo $var_con[100]; ?>/cycle-slider/cycle.css" />

		<?
		if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
		if ( is_category( "alfombraroja" )) $cat_alf2=1;
		if ( is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" ) ||  is_category( "latinbillboard" )) $cat_alf3=1;
		?>

		<!-- STYLES -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php
		if ($cat_alf2==1){?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_alfombra.css" />
		<?php }  elseif (is_category( "enews" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_enews.css" />
		<?php }  elseif (is_category( "goldenglobe" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_golden.css" />
		<?php }  elseif (is_category( "sag" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_sag.css" />
		<?php }  elseif (is_category( "grammy" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_grammy.css" />
		<?php }  elseif (is_category( "oscar" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_oscar.css" />
		<?php }  elseif (is_category( "emmy" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_emmy.css" />
		<?php }  elseif (is_category( "latinbillboard" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_latin.css" />
		<?php }  elseif ( is_page( "programas" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/programacion/css/programacion.css" />
		<?php }  elseif ( is_page( "fotos-andes" )  || is_page( "galerias" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_fotos.css" />
		<?php }  elseif ( is_category( "efashionblogger" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_micaela.css" />
		<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_cine_by_dos_equis.css" />
		<?php }  elseif ( is_category( "the-kardashians" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_the-kardashians.css" />
		<?php }  elseif ( is_category( "thetrend" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />-->
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_thetrend.css" />
		<?php }  elseif (es_wakeup()) {?>
				<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_wakeup.css" />
		<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/style_seccion.css" />
		<?}?>

		
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/media_queries.css" />

		<!-- STYLES COLORES CATEGORIAS-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[100]; ?>/colores.css" />
		<!-- / STYLES -->

<!-- / STYLES -->

<?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga_dev.php");
?>

<!-- JS -->
<script type="text/javascript" src="http://la.eonline.com/varios/modulos_extra/jquery.min.js"></script>

<?if( is_page("eshows") ):?>
	<!-- TOOLTIP TEXT ESHOWS THUMB-->
	<link rel="stylesheet" type="text/css" href="<?php echo $var_con[100]; ?>/da-thumb/css/style.css" />
	<noscript>
		<style>
			.da-thumbs li a h3 {
				top: 0px;
				left: -100%;
				-webkit-transition: all 0.3s ease;
				-moz-transition: all 0.3s ease-in-out;
				-o-transition: all 0.3s ease-in-out;
				-ms-transition: all 0.3s ease-in-out;
				transition: all 0.3s ease-in-out;
			}
			.da-thumbs li a:hover h3{
				left: 0px;
			}
		</style>
	</noscript>
	<script type="text/javascript" src="<?php echo $var_con[100]; ?>/da-thumb/js/jquery.hoverdir.js"></script>
	
	<script type="text/javascript">
		$(function() {
		
			$('#da-thumbs > li').hoverdir();

		});

	</script>
<?php endif; ?>
	
<?if( is_page("galerias") ):?>
<script type="text/javascript" src="http://la.eonline.com/common/msCarousel/jquery.msCarousel-min.js"></script>
<link rel="stylesheet" type="text/css" href="/common/msCarousel/mscarousel_2014_v2.css" />
<?php endif; ?>

 <!-- SLIDER -->
<link rel="stylesheet" href="http://la.eonline.com/admin2012/banners/slider/global_2012.css"/>
<script type="text/javascript" src="http://la.eonline.com/admin2012/banners/slider/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				/*preload: true,
				preloadImage: 'http://la.eonline.com/admin2012/banners/slider/loading.gif',*/
				pagination: false,
				generatePagination: false,
				play: 5000,
				pause: 2500,
				hoverPause: true,
				effect: 'slide, fade',
				animationStart: function(current){
					$('.captionslider').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						//console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.captionslider').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						//console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.captionslider').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
 <!-- SLIDER -->

<script language="JavaScript" type="text/javascript" src="http://la.eonline.com/varios/modulos_extra/BrightcoveExperiences.js"></script>

 <!-- LIGHTBOX -->
<script type="text/javascript" src="<?php echo $var_con[100]; ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $var_con[100]; ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[100]; ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- PREDICTIVE SEARCH -->
<script src="/psearch/jquery-ui-1.10.4.custom.min.js"></script>
<link rel="stylesheet" href="/psearch/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="/psearch/css/styles.css">
<!-- / PREDICTIVE SEARCH -->


<!-- ENCUESTA ABZ Ryan Lochte -->
<!--
<?
if(isset($_COOKIE["voted_poll_new"]))
{
	$voted_poll_new=1;
}else{
	$voted_poll_new=0;
}?>

<?php if(is_home()){?>
	
	<style type="text/css">
	#fancybox-content, #fancybox-outer{
		width: 405px !important;
		height: 305px !important;
		border: none !important;
		background: #000;
	}
	#fancybox-content{
		border: 2px solid #fff !important;
	}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$("#variousURL").fancybox().trigger('click');
		});
	</script>

	<a id="variousURL" href="http://la.eonline.com/varios/demoEncuesta/test.php"></a>
<?}?>
-->
<!--/ ENCUESTA ABZ Ryan Lochte -->



<!-- FANBOX FLOATING-->
<!--
<?php if(is_home() ){?>
	
	<style type="text/css">
	#fancybox-content, #fancybox-outer{
		width: 555px !important;
		height: 345px !important;
		border: none !important;
		background: #fff;
	}
	#fancybox-content{
		border: 2px solid #ddd !important;
	}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$("#various3").fancybox().trigger('click');
		});
	</script>

	<a id="various3" href="http://dev.eonlinelatinola.com/fanbox/br/index.php"></a>
<?}?>
-->
<!-- /FANBOX FLOATING-->


<!-- FLOATING ENCUESTA-->
<?php/* if(is_home() && !isset($_COOKIE['encuestaleida']) ){?>
	<style type="text/css">
	#fancybox-content, #fancybox-outer{
		width: 870px !important;
		height: 670px !important;
		border: none !important;
		background: #fff;
	}
	#fancybox-content{
		border: 2px solid #ddd !important;
	}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$("#various3").fancybox().trigger('click');
		});
	</script>

	<a id="various3" href="http://dev.eonlinelatinola.com/varios/encuesta2013/index.php"></a>
<?}*/?>
<!-- / FLOATING ENCUESTA-->



<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>


 <!-- BRIGHTCOVE -->
<script src="<?php echo $var_con[100]; ?>/scripts/trace.js" type="text/javascript"></script>
<script src="http://la.eonline.com/varios/modulos_extra/APIModules_all.js"></script> 
<script type="text/javascript">

var player;
function onTemplateLoaded(id) {
  player = brightcove.getExperience(id);
  player.getModule(APIModules.EXPERIENCE).addEventListener(BCExperienceEvent.TEMPLATE_READY, onTemplateReady);
}
function onTemplateReady(event) {
  player.getModule(APIModules.EXPERIENCE).removeEventListener(BCExperienceEvent.TEMPLATE_READY, onTemplateReady);
  //player.getModule(APIModules.VIDEO_PLAYER).mute();
}
</script>

 <!-- SCRIPT PARA EXPANDIBLE -->
<script language="JavaScript">
function setFlashHeight(divid, newH){
	//alert("---"+newH);
	document.getElementById(divid).style.height = newH+"px";
}
function setFlashWidth(divid, newH){
	//alert("---"+newH);
	document.getElementById(divid).style.width = newH+"px";
}
</script>
 <!-- SCRIPT PARA EXPANDIBLE -->
 
 
<script language="JavaScript">
jQuery(document).ready(function($) {
	$("#slider_cycle ul").cycle({fx: "fade", timeout: 4000});
});
</script>
 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->


 	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->

	<!--/* Defineslots */-->
	<? include(TEMPLATEPATH."/defineslots.php");?>
	<!--/* Defineslots */-->

	<!--/* script_skin */-->
	<? include(TEMPLATEPATH."/script_skin.php");?>
	<!--/* script_skin */-->

	<!--/* topscroll menu */-->
	<?if(!is_page("galerias")){?><script type="text/javascript" src="<?php echo $var_con[100]; ?>/nagging-menu.js" charset="utf-8"></script><?}?>
	<!--/* topscroll menu */-->

<?if(is_home()){?>	
<style type="text/css">
.grid {
	width: 100%;
	max-width: 100%;
	list-style: none;
	margin: 0 !important;
	padding: 0;
}

.grid>li {
	display: block;
	float: left;
	width: 310px;
	opacity: 0;
	height:auto;
	margin-right: 15px;
}

.grid>li.shown,
.no-js .grid li,
.no-cssanimations .grid li {
	opacity: 1;
}

/*

@-webkit-keyframes fadeIn {
	0% { }
	100% { opacity: 1; }
}

@keyframes fadeIn {
	0% { }
	100% { opacity: 1; }
}

@-webkit-keyframes moveUp {
	0% { }
	100% { -webkit-transform: translateY(0); opacity: 1; }
}

@keyframes moveUp {
	0% { }
	100% { -webkit-transform: translateY(0); transform: translateY(0); opacity: 1; }
}

@-webkit-keyframes scaleUp {
	0% { }
	100% { -webkit-transform: scale(1); opacity: 1; }
}

@keyframes scaleUp {
	0% { }
	100% { -webkit-transform: scale(1); transform: scale(1); opacity: 1; }
}


@-webkit-keyframes fallPerspective {
	0% { }
	100% { -webkit-transform: translateZ(0px) translateY(0px) rotateX(0deg); opacity: 1; }
}

@keyframes fallPerspective {
	0% { }
	100% { -webkit-transform: translateZ(0px) translateY(0px) rotateX(0deg); transform: translateZ(0px) translateY(0px) rotateX(0deg); opacity: 1; }
}
@-webkit-keyframes fly {
	0% { }
	100% { -webkit-transform: rotateX(0deg); opacity: 1; }
}

@keyframes fly {
	0% { }
	100% { -webkit-transform: rotateX(0deg); transform: rotateX(0deg); opacity: 1; }
}


@-webkit-keyframes flip {
	0% { }
	100% { -webkit-transform: rotateX(0deg); opacity: 1; }
}

@keyframes flip {
	0% { }
	100% { -webkit-transform: rotateX(0deg); transform: rotateX(0deg); opacity: 1; }
}


@-webkit-keyframes helix {
	0% { }
	100% { -webkit-transform: rotateY(0deg); opacity: 1; }
}

@keyframes helix {
	0% { }
	100% { -webkit-transform: rotateY(0deg); transform: rotateY(0deg); opacity: 1; }
}


@-webkit-keyframes popUp {
	0% { }
	70% { -webkit-transform: scale(1.1); opacity: .8; -webkit-animation-timing-function: ease-out; }
	100% { -webkit-transform: scale(1); opacity: 1; }
}

@keyframes popUp {
	0% { }
	70% { -webkit-transform: scale(1.1); transform: scale(1.1); opacity: .8; -webkit-animation-timing-function: ease-out; animation-timing-function: ease-out; }
	100% { -webkit-transform: scale(1); transform: scale(1); opacity: 1; }
}
*/

.grid.effect-5>li.animate {
	-webkit-transform: translateY(200px);
	transform: translateY(200px);
	-webkit-animation: moveUp 0.65s ease forwards;
	animation: moveUp 0.65s ease forwards;
}

@-webkit-keyframes moveUp {
	0% { }
	100% { -webkit-transform: translateY(0); opacity: 1; }
}

@keyframes moveUp {
	0% { }
	100% { -webkit-transform: translateY(0); transform: translateY(0); opacity: 1; }
}

/*.grid.effect-5 li:nth-child(odd){
	margin-right: 20px;
}*/
.social-icons-small{z-index: 1;}
div.social-icons-small a.social-fb{position: absolute;top: 0;}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 50%; top: 150px; margin-left: -65px;margin-top: -20px;}

</style>
			<script src="/common/js/modernizr.custom.js"></script>
			<script src="/common/js/masonry.pkgd.min.js"></script>
			<script src="/common/js/imagesloaded.pkgd.min.js"></script>
			<script src="/common/js/classie.js"></script>
			<script src="/common/js/AnimOnScroll.js"></script>

			<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
			</script>
  <?}?>
</head>

<?php flush(); ?>

<body <?php body_class(); ?>>
	<style type="text/css">
		.flyout-video {
		height: 236px;
		width: 510px;
		left: -520px;
	}
	.flyout {
		background-color: #A91503;
		box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.25);
		color: #fff;
		height: 112px;
		top:250px;
		position: fixed;
		width: 410px;
		z-index: 1010;
	}
	.fixed_flyout {
		left: 0;
	}
	</style>
	<div class="flyout flyout-video" id="flyout"></div>
		
	<!--/* skin */-->
	<?php echo quien_es_skin();?>
	<!--/* skin */-->

	<!--/* ad_pagebanner */-->
	<? include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->

	<!--/* Floating */-->
	<?if(is_home()){?>
		<div id='div-gpt-ad-home-720x300' class="floating">
				<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-home-720x300').remove();"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
				<div class="floating_content_table">
					<?php echo que_cat_es("home","720","300",NULL);?>
				</div>
		</div>
	<?}elseif(is_category("thetrend")){?>
		<div id='div-gpt-ad-thetrend-720x300' class="floating">
				<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-thetrend-720x300').remove();"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
				<div class="floating_content_table">
					<?php echo que_cat_es("thetrend","720","300",NULL);?>
				</div>
		</div>
	<?}?>

	<!-- PARA TODO EL SITIO
	<script type="text/javascript">					
				var t = setTimeout("sacarfloating()",8000);//8segundos
		
				function sacarfloating() {
					$('.floating').css("display", "none");
					$('.floating').removeAttr('disabled');
				}
	</script>
	<div id='div-gpt-ad-home-720x300' class="floating">
		<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-home-720x300').style.display='none';"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
		<div class="floating_content_table">
			<?php echo que_cat_es("home","720","300",NULL);?>
		</div>
	</div>-->
	<!--/* Floating */-->


<div id="wrapper" class="hfeed">
	<!-- HEADER -->
	<div id="header">
		
		<!-- Links superiores, Buscador y Banners -->
		<div id="cont_search_banners">
			<div id="cont_banners_top" >
				<div id="banner_top_242x90">
					<? echo quien_es("240","90",NULL);?>
				</div>

				<div id="exp_banner" class="banner_top_728x90">
					<!--<div id='div-gpt-ad-home-728x90'>
					<script type='text/javascript'>
					googletag.display('div-gpt-ad-home-728x90');
					</script>
					</div>-->
					<? echo quien_es("728","90",NULL);?>
				</div>
				<br clear="all" />
			</div>
			
		</div>
		<!-- / Links superiores, Buscador y Banners -->
		
		<!-- CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		<?if(is_home()){$h_logo="h1";}else{$h_logo="h4";}?>
		<div id="masthead" class="default">
			<!-- CABEZAL LOGO -->
			<<?=$h_logo?> id="site-title">
				<span>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</<?=$h_logo?>>
			<!-- / CABEZAL LOGO -->

			<!-- MENU -->
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?> --- </a></div>
				<?php //wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				<div class="menu-header">
					<ul id="menu-principal" class="menu">
						<!--<li class="menu-item menu-item-type-custom menu-item-object-custom <?if(is_home()) {echo ('current-menu-item current_page_item');}else{echo ('menu-item');}?>">
							<h5><a href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Inicio</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a href="<?php echo home_url( '/' ); ?>eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a></h5>
							<?include(TEMPLATEPATH."/submenu.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/alfombraroja" OnMouseOver="this.style.borderColor='<?php echo cat_color('alfombraroja');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('alfombraroja');?>; <?if(is_category('alfombraroja')) echo ("border-color:".cat_color('alfombraroja').";");?>">RED CARPET</a></h5>
						</li>
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>fotos-argentina" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('fotos-argentina')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>videos-2" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos-2');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos-2');?>; <?if(is_page('videos-2')) echo ("border-color:".cat_color('videos-2').";");?>">Videos</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programación</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/efashionblogger" OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="color:#fff; <?if(is_category('efashionblogger')) echo ("border-color:'#fff';");?>">Fashion Blogger</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/thetrend" OnMouseOver="this.style.borderColor='<?php echo cat_color('thetrend');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('thetrend');?>; <?if(is_category('thetrend')) echo ("border-color:".cat_color('thetrend').";");?>">The Trend</a>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/wakeup" OnMouseOver="this.style.borderColor='<?php echo cat_color('wakeup');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('wakeup');?>; <?if(is_category('wakeup')) echo ("border-color:".cat_color('wakeup').";");?>">Wake Up</a>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>glamcam360" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('glamcam360')) echo ("border-color:".cat_color('glamcam360').";");?>">GlamCam 360</a></h5>
						</li>
						
						
					</ul>
				</div>
			</div>
			<!-- / MENU -->

		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->

	</div>
	<!-- / HEADER -->


	<?if(is_home()){?>
	<!-- Banner Billboard-->
	<div id="div-gpt-ad-home-970x31" style="float:left; margin:10px 5px; width:970px; height:auto; border: 1px solid #ddd;">
			<script type="text/javascript">
			googletag.display('div-gpt-ad-home-970x31');
			</script>
	</div>
	<!-- /Banner Billboard-->
	<!-- Banner pushdown-->
	
	<div id="div-gpt-ad-home-970x90" style="float:left; margin:10px 5px; width:970px; height:auto; border: 1px solid #ddd;">
			<script type="text/javascript">
			googletag.display('div-gpt-ad-home-970x90');
			</script>
	</div>
	<!-- / Banner pushdown-->
	<!-- TEST Banner Slider-->
	<div id="div-gpt-ad-home-slider">
			<script type="text/javascript">
			googletag.display('div-gpt-ad-home-slider');
			</script>
	</div>
<!-- / TEST Banner Slider-->

<!-- TEST Banner Floor Ad.-->
	<div id="div-gpt-ad-home-floorad">
			<script type="text/javascript">
			googletag.display('div-gpt-ad-home-floorad');
			</script>
	</div>
<!-- / TEST Banner Floor Ad.-->
	<?}?>



<!-- TEST Banner floating 3ros-->
	<div id="div-gpt-ad-home-floating_3ros">
			<script type="text/javascript">
			googletag.display('div-gpt-ad-home-floating_3ros');
			</script>
	</div>
<!--/ TEST Banner floating 3ros-->
	

	<!-- SUBMENU -->
	<?php
	if ($cat_alf2==1 || $cat_alf3==1){?>
			<style>
			#submenu .items_submenu{
				position: absolute;
				width: 170px;
				padding-bottom: 10px;
				height: 110px;
				_height: 120px;
				bottom:0;
				left:570px;
			}

			#submenu .items_sponsor{
				width: 180px;
				height: 130px;
				position: absolute;
				top: 10px;
				right: 30px;
			}
			.category-goldenglobe #submenu  .items_sponsor{
				background-image: url(<?php echo $var_con[100]; ?>/images/patrocinio_redcarpet_MX.png);
			}
			</style>
			<div id="submenu">
				<div class="items_submenu">
						<?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'secondary' ) ); ?>
				</div>
				<div class="items_sponsor">
				</div>
			</div>
	<?}elseif ( is_category()) {?>
		<?if($catSlug=es_wakeup()) {?>		
			<div id="libre">
				<a href="http://www.coca-cola.tv/" target="_blank" id="cocacolatv"></a>
				<div id="submenu">
				<div class="items_submenu">
						<ul id="menu_wakeup">
							<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/personajes-wakeup">Personajes</a></h3></li>
							<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/capitulos">Sinopsis capitular</a></h3></li>
							<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/sinopsis">Sinopsis General</a></h3></li>
							<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/horarios">Horarios</a></h3></li>
						</ul>
				</div>
			</div>
			</div>
		<?}else{?>
			<div id="libre"></div>
		<?}?>
	<?}?>
	<!-- / ESPACIO LIBRE -->

	<div id="main" style="width: 100%; max-width:980px;">
