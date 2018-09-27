<?
if($_GET["attachment_id"]!="" and is_numeric($_GET["attachment_id"])){
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://la.eonline.com/venezuela/" );
}
?>

<?php
include(TEMPLATEPATH."/var_constantes.php");

//include(TEMPLATEPATH."/detectar_movil.php");

// MOBILE 
//include(TEMPLATEPATH."/detectar_movil.php");
/*
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
		$paiscual=$_POST["cual"];
		$cual_array=explode("-", $paiscual);
		$pais=$cual_array[1];
		$cual=$cual_array[0];
			setcookie("ubicacion","$cual",0, "/");
			setcookie("selectorE","$pais",0, "/");
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
<html lang="es-VE" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" itemscope itemtype="http://schema.org/Organization">
<head>

<!-- MOBIFY - DO NOT ALTER - PASTE IMMEDIATELY AFTER OPENING HEAD TAG -->
<script type="text/javascript">/*<![CDATA[*/(function(e,f){function h(a){if(a.mode){var b=g("mobify-mode");b&&a[b]||(b=a.mode(c.ua));return a[b]}return a}function m(){function a(a){e.addEventListener(a,function(){c[a]=+new Date},!1)}e.addEventListener&&(a("DOMContentLoaded"),a("load"))}function n(){var a=new Date;a.setTime(a.getTime()+3E5);f.cookie="mobify-path=; expires="+a.toGMTString()+"; path=/";e.location.reload()}function p(){k({src:"https://preview.mobify.com/v7/"})}function g(a){if(a=f.cookie.match(RegExp("(^|; )"+a+"((=([^;]*))|(; |$))")))return a[4]||""}function l(a){f.write('<plaintext style="display:none">');setTimeout(function(){d.capturing=!0;a()},0)}function k(a,b){var e=f.getElementsByTagName("script")[0],c=f.createElement("script"),d;for(d in a)c[d]=a[d];b&&c.setAttribute("class",b);e.parentNode.insertBefore(c,e)}var d=e.Mobify={},c=d.Tag={};d.points=[+new Date];d.tagVersion=[7,0];c.ua=e.navigator.userAgent;c.getOptions=h;c.init=function(a){c.options=a;if(""!==g("mobify-path"))if(m(),a.skipPreview||"true"!=g("mobify-path")&&!/mobify-path=true/.test(e.location.hash)){var b=h(a);if(b){var d=function(){b.post&&b.post()};a=function(){b.pre&&b.pre();k({id:"mobify-js",src:b.url,onerror:n,onload:d},"mobify")};!1===b.capture?a():l(a)}}else l(p)}})(window,document);(function(){var e="//cdn.mobify.com/sites/e-entertainment-latino/production/adaptive.min.js";Mobify.Tag.init({mode:function(e){return/ip(hone|od)|android.*(mobile)|blackberry.*applewebkit|bb1\d.*mobile/i.test(e)?"enabled":"desktop"},enabled:{url:e},desktop:{capture:!1,url:"//a.mobify.com/e-entertainment-latino/a.js"}})})();/*]]>*/</script>
<!-- END MOBIFY -->


<?php if(is_category("the-royals")){?>
<!-- TAGS CODE THE ROYALS -->
	<? include("/home/eonline/public_html/varios/the_royals_codes/code_head.php");?>
<!-- END TAGS CODE THE ROYALS -->
<?}?>


<!-- is es una nota va a mobile-->
<!--<?php
if(is_single() && $_COOKIE["mobify-path"]==""){?>
	<script type="text/javascript" src="/mobile/detectar_VENEZUELA.js"></script>
<?}?>-->
<meta name="theme-color" content="#000000">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Language" content="es-VE"/>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Category" content="entertainment">
<link rel="shortcut icon" href="<?php echo $var_con[200]; ?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="https://plus.google.com/+Eonlinelatinoplus" />

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

<!-- FACEBOOK OPENGRAPH -->
<?php
$default_img = "http://la.eonline.com/venezuela/wp-content/themes/abz2012/images/generica_blanca.jpg";

if(is_single()){
	$primera_img=sacar_img_sin_src();
	$default_img = $primera_img;
}

if(is_single()) { 
		$feed_site="Venezuela";
		$title_site="E! Online Latino | ".$feed_site;
		$metadescription=obtener_metadescription();
		$title_post=wp_title('|', false, 'right');
		if($metadescription==""){
			$title_post_array=explode("|", $title_post);
			$metadescription=$title_post_array[0];
		}
		$description_site=$metadescription;
		?>
		<title><?php echo $title_post;?></title>
		<meta name="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
		<meta name="abstract" content="<?php echo $metadescription;?>. <?=$title_site?>" />
		
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?php echo $title_post;?>" />
		<meta property="og:image" content="<?php echo $primera_img;?>" />
		<meta property="og:image:width" content="200" />
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<meta property="og:description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
			
		<meta itemprop="name" content="<?php echo $title_post;?>"/>
		<meta itemprop="image" content="<?php echo $primera_img ;?>" />
		<meta itemprop="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
		<meta itemprop="url" content="<?php the_permalink(); ?>"/>

<?php } elseif(is_category()||is_tag()||is_page()) { ?>
		
		<? 
		$feed_site="Venezuela";
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
		}elseif(is_page("iamcait")){
			$title_site="I am Cait. E! Online Latino | ".$feed_site;
			$description_site=" Caitlyn Jenner se apodera del mundo - Docuserie de  E! OnlineLatino | ".$title_site;
		}elseif(is_page("younger")){
			$title_site="Younger. E! Online Latino | ".$feed_site;
			$description_site=" Del creador de Sex and the City - E! OnlineLatino | ".$title_site;
		}elseif ( is_category("thetrend" )) {
			$title_site="The Trend. E! Online Latino | ".$feed_site;
			$description_site="Lo último en tendencias de las celebridades. ".$title_site;
		}elseif ( is_category( "copadelmundo" )) {
		      $title_site="Copa del mundo. E! Online Latino | ".$feed_site;
		      $description_site="".$title_site;
		}elseif ( is_category("estrenos" )) {
		      $title_site="Toda la información sobre los estrenos. E! Online Latino | ".$feed_site;
		      $description_site="Entérate aquí de los estrenos y nuevos capítulos de nuestros programas. Lo último está aquí. ".$title_site;
		}elseif ( is_category( "lol" )) {
		      $title_site="Los memes y virales más divertidos de internet. E! Online Latino | ".$feed_site;
		      $description_site="Lol donde estan todos los temas calientes y virales del mundo de los famosos en la web. Memes, videos divertidos, gags, gifd, colages y mucho más. ".$title_site;			
		}elseif ( is_category("marriedtojonas" )) {
		      $title_site="Marries to Jonas. E! Online Latino | ".$feed_site;
		      $description_site="Kevin Jonas & Danielle Deleasa. El amor el clave de Pop. ".$title_site;
		}elseif ( is_category("amamos-las-pelis")) {
			$title_site="Amamos las pelis. E! Online Latino  | ".$feed_site;
			$description_site="Lo Ãºltimo en Peliculas. Todo lo que necesitas saber. ".$title_site;
		}elseif ( is_category("the-royals" )) {
		      $title_site="The Royals. E! Online Latino | ".$feed_site;
		      $description_site=".".$title_site;
		}elseif ( is_category("musica" )) {
		      $title_site="Música. E! Online Latino | ".$feed_site;
		      $description_site="Como buenos amantes de la cultura Pop, ¡necesitamos saberlo todo acerca del mundo de la música! Por eso te traemos esta sección llena de noticias, vídeos, fotos y la opinión de distintos expertos sobre los sucesos y lanzamientos del momento.".$title_site;
		}elseif( is_category("e-shows")){
			$title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
			$description_site="Programas: Kardashians, E! VIP Caracas, E! Latin News, Fashion Police y más. ".$title_site;
		}elseif (es_wakeup()) {
			$title_site="WakeUp. E! Online Latino | ".$feed_site;
			$description_site="En “Wake Up” Abril, la protagonista, emprenderá un camino de autodescubrimiento al cual se irán uniendo poco a poco un grupo de amigos, para conquistar sus sueños y convertirse en un exitoso grupo musical.".$title_site;
		}

		if(is_tag())
		{
		 $current_tag = single_tag_title("", false);
		 $title_site=$current_tag.". E! Online Latino | ".$feed_site;
		 $description_site="Todos los articulos de ".$current_tag.". E! Online Latino | ".$feed_site;
		}
		if(is_page("eshows")){
			$title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
			$description_site="Programas: Kardashians, E! VIP Caracas, E! Latin News, Fashion Police y más. ".$title_site;
		}elseif(is_page("glamcam360")){
			$title_site="Glam Cam 360. E! Online Latino | ".$feed_site;
			$description_site="Las celebridades que pasaron por la ".$title_site;
		}elseif(is_page("programas")){
			$title_site="Horarios de los programas de E! Latinoamérica. E! Online Latino | ".$feed_site;
			$description_site="¿A qué hora ver los programas de E! Latinoamérica? Todos los programas, estrenos, series, horarios. ".$title_site;
		}elseif(is_page("fotos-venezuela") || is_page("galerias")){
			$title_site="Fotos, imágenes y galerías de Celebridades. E! Online Latino | ".$feed_site;
			$description_site="El mundo del espectáculo en imágenes. ".$title_site;
			if($_GET["img"]!="")$default_img=$_GET["img"];
			if($_GET["t"]!="")$title_site=$_GET["t"]." ".$_GET["d"];
		}elseif(is_page("videos-2")){
			$title_site="Videos y entrevistas de famosos y la Alfombra Roja. E! Online Latino | ".$feed_site;
			$description_site="Noticias y entrevistas de las Celebridades en video. ".$title_site;
		}elseif(is_page("politicas-de-privacidad")){
			$title_site="Políticas de Privacidad. E! Online Latino | ".$feed_site;
			$description_site="Políticas de privacidad de E! Online Latinoamérica. ".$title_site;
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
		}elseif(is_page("timeline")){
			$title_site="Timeline. E! Online Latino | ".$feed_site;
			$description_site="El timeline de Kim Kardashian ".$title_site;
		}elseif(is_page("lasopavenezuela")){
			$title_site="La Sopa Venezuela | ".$feed_site;
			$description_site="Led Varela ofrece comentarios sarcásticos y punzantes en los clips de televisión diferentes y momentos de la cultura pop de la semana.";
		}elseif(is_page("coffeebreak")){
			$title_site="Coffee Break con Patricia | ".$feed_site;
			$description_site="Llega a la pantalla de E!, el nuevo programa de entrevistas que te acerca más y más a tus celebridades favoritas.";
		}elseif(is_page("zonatrendycaracas")){
			$title_site="E! Zona Trendy Caracas | ".$feed_site;
			$description_site="Caterina Valentino, te brinda acceso VIP a los lugares, eventos y personalidades más importantes de una de las ciudades más movidas de Latinoamérica: Caracas.";
		}elseif(is_page("epop")){
			$title_site="Epop | ".$feed_site;
			$description_site="Renato y Lety nos preparan una explosiva malteada de la cultura pop.";
		}elseif(is_page("yosoyelartista")){
			$title_site="Yo soy el Artista | ".$feed_site;
			$description_site="El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, sin acceso a los medios tradicionales de comunicación, de convertirse en estrella a través del canto.";
		}elseif(is_page("fashionpolice")){
			$title_site="Fashion Police | ".$feed_site;
			$description_site="La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.";
		}
		

		?>
		<title><?php echo $title_site ?></title>
		<meta name="description" content="<?php echo $description_site ?>" />
		<meta name="abstract" content="<?php echo $description_site ?>"/>
		<meta property="og:type" content="blog" />
		<meta property="og:title" content="<?php echo $title_site ?>" />
		<meta property="og:url" content="http://la.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
		<meta property="og:description" content="<?php echo $description_site ?>" />
		<meta property="og:image" content="<?php echo $default_img ;?>" />
		<meta property="og:image:width" content="200" />
		<meta itemprop="description" content="<?php echo $description_site ?>"/>
		<meta itemprop="name" content="<?php echo $title_site ?>"/>
		<meta itemprop="image" content="<?php echo $default_img ;?>" />
		<meta itemprop="url" content="http://la.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>

<?php } else { ?>


		<? 
		$title_site="E! Online Latino | Venezuela";
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
		<meta property="og:image:width" content="200" />
		<meta itemprop="description" content="<?php echo $description_site ?>"/>
		<meta itemprop="name" content="<?php echo $title_site ?>"/>
		<meta itemprop="image" content="<?php echo $default_img ;?>" />
		<meta itemprop="url" content="<?php echo $var_con[1]; ?>"/>

<?php } ?>
<meta property="og:site_name" content="E! Online Latino" />
<!-- FACEBOOK OPENGRAPH -->


<!-- TWITTER OPENGRAPH -->
<meta name="twitter:widgets:csp" content="on">
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@eonlinelatino" />
<meta name="twitter:title" content="<?php echo $title_site ?>">
<meta name="twitter:description" content="<?php echo $description_site ?>">
<meta name="twitter:image:src" content="<?php echo $default_img ;?>">
<!-- TWITTER OPENGRAPH -->


<?if(is_single()){?>
<!-- ADDTHIS -->
<!--
<script type="text/javascript" data-device="1">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script><script type="text/javascript" src="/varios/modulos_extra/addthis_widget.js#pubid=matibur"  data-device="1"></script>-->
<script type="text/javascript" data-device="1">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js#pubid=matibur" async="async" data-device="1"></script>
<!-- / ADDTHIS -->
<?}?>

<!-- schema -->
<?
if(is_home() || is_search()){$type="WebSite";}elseif(is_single()){$type="NewsArticle";$GetData= obtener_date(); }else{$type="WebPage";}?>
<script type="application/ld+json" data-device="1">
    {
      "@context": "http://schema.org",
      "@type": "<?php echo $type; ?>",
      "url": "<?php echo $var_con[1]; ?>",
      "name": "<?php echo $title_site ?>",
      "headline": "<?php echo $title_site ?>",
	  "image": "<?php echo $default_img ;?>",
	  "description": "<?php echo $description_site ?>",
	  <?if(is_single()) {echo ('"datePublished": "'. $GetData.'",');}?>
	  <?if(is_search()) {echo ('"potentialAction": {
	     "@type": "SearchAction",
	     "target": "'.$var_con[1].'?s={s}",
	     "query-input": "name=s"
	   },');}?>
      "sameAs" : [ "http://www.facebook.com/pages/E-Online-Latino/116264915095072?ref=sgm",
      "http://instagram.com/eonlinelatino",
      "http://www.youtube.com/EonlineLatinola",
      "http://twitter.com/EonlineLatino",
      "https://plus.google.com/109640549139413649832?rel=author"]

    }
</script>
<!-- /schema -->

<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/font-face/font-face.css" />
<!-- / FONT-FACE -->


<!--CSS CYCLE-->
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]; ?>/cycle-slider/cycle.css" />


<?
if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "alfombraroja" )) $cat_alf2=1;
if ( is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" ) ||  is_category( "latinbillboard" )) $cat_alf3=1;
?>

<!-- STYLES -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $var_con[200]; ?>/style.css" />
<?php
if ($cat_alf2==1){?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_alfombra.css" />
<?php }  elseif (is_category( "enews" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_enews.css" />
<?php }  elseif (is_category( "imperdible" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_imperdible.css" />
<?php }  elseif (is_category( "estrenos" )) {?>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_estrenos.css" />
<?php }  elseif (is_category( "goldenglobe" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_golden.css" />
<?php }  elseif (is_category( "sag" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_sag.css" />
<?php }  elseif (is_category( "grammy" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_grammy.css" />
<?php }  elseif (is_category( "oscar" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_oscar.css" />
<?php }  elseif (is_category( "emmy" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_emmy.css" />
<?php }  elseif (is_category( "latinbillboard" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_latin.css" />
<?php }  elseif ( is_page( "programas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="/varios/programacion/css/programacion_2014.css" />
<?php }  elseif ( is_page( "fotos-venezuela" )  || is_page( "galerias" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_fotos.css" />
<?php }  elseif ( is_category( "efashionblogger" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_micaela.css" />
<?php }  elseif ( is_category( "thetrend" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_thetrend.css" />
<?php }  elseif ( is_category( "the-kardashians" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_the-kardashians.css" />
<?php }  elseif ( is_category( "copadelmundo" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_cine_by_dos_equis.css" />
<?php }  elseif ( is_category( "marriedtojonas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_marriedtojonas.css" />
<?php }  elseif (is_category( "e-shows" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php }  elseif ( is_category( "musica" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_musica.css" />
<?php }  elseif (is_category( "lol" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php }  elseif ( is_category( "the-royals" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_the-royals.css" 
<?php } elseif ( is_category( "amamos-las-pelis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_amamos-las-pelis.css" />
<?php } elseif (es_wakeup()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_wakeup.css" />
<?php }  elseif ( is_page( "videos-2" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/videos.css" />
<?php }  elseif ( is_page( "fashionpolice" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/fashion-police/fashion-police.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />
<?}?>

<!-- / STYLES -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/media_queries.css" />

<!-- STYLES COLORES CATEGORIAS-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/colores.css" />
<!-- / STYLES -->

<?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga_solo.php");
?>
<!-- JS -->
<!-- <script type="text/javascript" src="/varios/modulos_extra/jquery.min.js" data-device="1"></script>
<script src="http://code.jquery.com/jquery-1.9.0.min.js" data-device="1"></script>-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" data-device="1"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js" data-device="1"></script>
<script type="text/javascript" data-device="1">
function isMobile(){
    return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
}
</script>

<?if( is_page("eshows") ):?>
	<!-- TOOLTIP TEXT ESHOWS THUMB-->
	<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]; ?>/da-thumb/css/style.css" />
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
	<script type="text/javascript" src="<?php echo $var_con[200]; ?>/da-thumb/js/jquery.hoverdir.js"></script>
	
	<script type="text/javascript">
		$(function() {
		
			$('#da-thumbs > li').hoverdir();

		});

	</script>
<?php endif; ?>
	
<?if( is_page("galerias") || (is_category("galeria-wakeup") && $_GET["gallery"]!="")):?>
<script type="text/javascript" src="http://la.eonline.com/common/msCarousel/jquery.msCarousel-min.js"></script>
<link rel="stylesheet" type="text/css" href="/common/msCarousel/mscarousel_2014_v2.css" />
<?php endif; ?>

 <!-- SLIDER -->
<link rel="stylesheet" href="/admin2012/banners/slider/global_2012.css">
<script src="/admin2012/banners/slider/slides.min.jquery.js"></script>
	<script>
		$(function(){
			if($('body').hasClass('home')) {
				$('#slider_cycle').slides({start: 1, container: 'slides_container_EFB', pagination: false, generatePagination: false, play: 5000, pause: 2500, hoverPause: false, effect: 'fade'});
				$('#slides').slides({
					/*preload: true,
					preloadImage: '/admin2012/banners/slider/loading.gif',*/
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
			}else if($('body').hasClass('category-efashionblogger')) {
				$('#slider_cycle').slides({start: 1, container: 'slides_container_EFB', pagination: false, generatePagination: false, play: 5000, pause: 2500, hoverPause: false, effect: 'fade'});
			}		
		});
	</script>
 <!-- SLIDER -->

 
<!--<script language="JavaScript" type="text/javascript" src="/varios/modulos_extra/BrightcoveExperiences.js" data-device="1"></script>-->
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js" data-device="1"></script>


 <!-- LIGHTBOX -->
<script type="text/javascript" src="<?php echo $var_con[200]; ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $var_con[200]; ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]; ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- PREDICTIVE SEARCH -->
<script src="/common/psearch/jquery-ui-1.10.4.custom.min.js"></script>
<link rel="stylesheet" href="/common/psearch/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="/common/psearch/css/styles.css">
<!-- / PREDICTIVE SEARCH -->

<!-- ENCUESTA ABZ -->

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
        width: 435px !important;
        height: 350px !important;
		border: none !important;
		background: #000;
	}
	#fancybox-content{
		border: 2px solid #fff !important;
	}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$("#various3").fancybox().trigger('click');
		});
	</script>

	<a id="various3" href="/experience/EncuestaNombreShow/index.php?f=4"></a>
<?}?>
-->

<!--/ ENCUESTA ABZ -->


<!-- FLOATING ENCUESTA -->
<!--<?php if(is_home() && !isset($_COOKIE['encuestaleidanew']) ){?>
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

	<a id="various3" href="/varios/encuesta2013/index.php"></a>
<?}?>-->
<!-- / FLOATING ENCUESTA-->


<!-- FLOATING encuestaMilian -->
<!--<?php if(is_home() && !isset($_COOKIE['voted_poll_new']) ){?>
	<style type="text/css">
	#fancybox-content, #fancybox-outer{
		width: 405px !important;
		height: 305px !important;
		border: none !important;
		background: #000;
	}
	#fancybox-content{
		border: 2px solid #ddd !important;*/
	}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			$("#various3").fancybox().trigger('click');
		});
	</script>

	<a id="various3" href="/varios/encuestaMilian/index.php?f=<?=$var_con[0];?>"></a>
<?}?>-->
<!-- / FLOATING encuestaMilian-->


<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>


<!-- BRIGHTCOVE -->
<script type="text/javascript" data-device="1">
	var objectGlobalVideos = {};
     var player;
     var modVP;
     var modExp;
     var modCon;  

     function myTemplateLoaded(experienceID) {
         player = brightcove.api.getExperience(experienceID);
         modVP = player.getModule(brightcove.api.modules.APIModules.VIDEO_PLAYER);
         modExp = player.getModule(brightcove.api.modules.APIModules.EXPERIENCE);
         modCon = player.getModule(brightcove.api.modules.APIModules.CONTENT);
         modExp.addEventListener(brightcove.api.events.ExperienceEvent.TEMPLATE_READY, onTemplateReady);

     }

     function onTemplateReady(evt) {
         modVP.addEventListener(brightcove.api.events.MediaEvent.BEGIN, onMediaEventFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.CHANGE, onMediaEventFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.COMPLETE, onMediaEventFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.ERROR, onMediaEventFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.PLAY, onMediaEventFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.PROGRESS, onMediaProgressFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.STOP, onMediaEventFired);
         modVP.addEventListener(brightcove.api.data.Media, onMediaEventFired);
     }
     
     function onMediaEventFired(evt) {
         	objectGlobalVideos.title = evt.media.displayName;
			objectGlobalVideos.id = evt.media.id;
			nameseccion=location.pathname;
			if(nameseccion.indexOf("videos-2")!=-1) {feedSection=location.pathname;}else{feedSection=location.pathname+"pagina/videos-2/";}
			objectGlobalVideos.pageName = location.hostname+feedSection+evt.media.displayName;


         if (evt.type === brightcove.api.events.MediaEvent.BEGIN) {
             //console.log('Here Video Begins!!');
             _satellite.track("beginVideo");
             _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_start', objectGlobalVideos.title]);

         }else if (evt.type === brightcove.api.events.MediaEvent.COMPLETE) {
             //console.log('Here Video Begins!!');
             _satellite.track("completeVideo");
             _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);

         }
     }
</script>

 <!-- SCRIPT PARA EXPANDIBLE -->
<script language="JavaScript">
function setFlashHeight(divid, newH){
	document.getElementById(divid).style.height = newH+"px";
}
function setFlashWidth(divid, newH){
	document.getElementById(divid).style.width = newH+"px";
}
</script>
 <!-- SCRIPT PARA EXPANDIBLE -->
 

<!--<script>
jQuery(document).ready(function($) {
	$("#slider_cycle ul").cycle({fx: "fade", timeout: 4000});
	$(".slideshow").cycle({ 
	    fx:     "fade", 
	    speed:  "fast", 
	    timeout: 0, 
	    next:   "#next2", 
	    prev:   "#prev2" 
	});
});
</script>-->

 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->


	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->

	<!--/* Defineslots */-->
	<? include(TEMPLATEPATH."/defineslots_venezuela_dynamic.php");?>
	<!--/* Defineslots */-->

	<!--/* script_skin */-->
	<? include(TEMPLATEPATH."/script_skin.php");?>
	<!--/* script_skin */-->

	<!--/* topscroll menu */-->
	<script type="text/javascript" src="<?php echo $var_con[200]; ?>/nagging-menu.js" charset="utf-8"></script>
	<!--/* topscroll menu */-->
	
	<!--/* ScrollAnimacion */-->
	<?if(is_home() || is_category()){?>	
			<style type="text/css">
			.grid {
				width: 100%;
				max-width: 100%;
				list-style: none;
				margin: 0 !important;
				padding: 0;
				float: left;
			}

			.grid>li {
				display: block;
				float: left;
				width: 310px;
				opacity: 0;
				height:auto;
				margin-left: 15px;
			}

			.grid>li.shown,
			.no-js .grid li,
			.no-cssanimations .grid li {
				opacity: 1;
			}
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
			</style>

			<script src="/common/AnimOnScroll/modernizr.custom.js"></script>
			<script src="/common/AnimOnScroll/masonry.pkgd.min.js"></script>
			<script src="/common/AnimOnScroll/imagesloaded.pkgd.min.js"></script>
			<script src="/common/AnimOnScroll/classie.js"></script>
			<script src="/common/AnimOnScroll/AnimOnScroll.js"></script>

			<script>
			$(document).ready(function() {
				function showpanel(){
					new AnimOnScroll( document.getElementById( 'grid' ), {
						minDuration : 0.4,
						maxDuration : 0.7,
						viewportFactor : 0.2
					});
				}
				// use setTimeout() to execute
 				setTimeout(showpanel, 1000)
			});
			</script>
  	<?}?>	
  	<!--/* ScrollAnimacion */-->

  	<script>
		$(document).ready(function() {
			$('.floating').attr('disabled','-1');

			$('.pushdownAD').has('iframe').show();
			$('.pushdownAD').has('div').show();

			$('.billboardAD').has('iframe').show();
			$('.billboardAD').has('div').show();

			//$('.floating').show();

			if($('.floating .floating_content_table:has("iframe")').length>0) {$('.floating').show();}
			if($('.floating .floating_content_table:has("div")').length>0) {$('.floating').show();}
		});
	</script>

<!-- CodeBasic PageScroll Omniture-->
<script type="text/javascript" src="/varios/omniture/pagescroll.js"  data-device="1"></script>
<!-- / CodeBasic PageScroll Omniture-->

<!-- CodeBasic Omniture-->
<script src="//assets.adobedtm.com/2f40ac3634dda54927109ac2de7fff195b55011d/satelliteLib-8b6d7310838d03b742a124c9601810ce8e8d2d15.js" data-device="1"></script>
<!-- / CodeBasic Omniture-->

</head>

<?php flush(); ?>

<body <?php body_class(); ?> <?if($title_post) echo ('data-title="'. utf8_decode($title_post).'"');?>>

	<!--/* skin */-->
	<?php echo quien_es_skin();?>
	<!--/* skin */-->

	<!--/* ad_pagebanner */-->
	<? include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->

	<!-- Banner floating -->
	<?php echo que_floating_es("720","300",NULL);?>
	<!-- / Banner floating -->

	<!-- Banner floating 3ros-->
	<?php echo que_floating_3ros_es();?>
	<!-- / Banner floating 3ros-->

	<!-- Banner Floor Ad.-->
	<?php echo que_floorAd_es();?>
	<!-- / Banner Floor Ad.-->

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
						<!-- <li class="menu-item menu-item-type-custom menu-item-object-custom <?if(is_home()) {echo ('current-menu-item current_page_item');}else{echo ('menu-item');}?>">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Inicio</a></h5>
						</li> -->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>pagina/eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a></h5>
							<?include(TEMPLATEPATH."/submenu.php");?>
						</li>
						<li data-category="alfombraroja" class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/alfombraroja" OnMouseOver="this.style.borderColor='<?php echo cat_color('alfombraroja');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('alfombraroja');?>; <?if(is_category('alfombraroja')) echo ("border-color:".cat_color('alfombraroja').";");?>">RED CARPET</a></h5>
							<?include(TEMPLATEPATH."/submenuRC.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>pagina/fotos-venezuela" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('fotos-venezuela')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>pagina/videos-2" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos-2');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos-2');?>; <?if(is_page('videos-2')) echo ("border-color:".cat_color('videos-2').";");?>">Videos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>pagina/programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programación</a></h5>
						</li>
						 <li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/lol" OnMouseOver="this.style.borderColor='<?php echo cat_color('lol');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('lol');?>; <?if(is_category('lol')) echo ("border-color:".cat_color('lol').";");?>">LOL</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="#" OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="color:#fff; <?if(is_category('efashionblogger')) echo ("border-color:'#fff';");?>">E! Blogs</a></h5>
							<?include(TEMPLATEPATH."/submenu_bloggers.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/thetrend" OnMouseOver="this.style.borderColor='<?php echo cat_color('thetrend');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('thetrend');?>; <?if(is_category('thetrend')) echo ("border-color:".cat_color('thetrend').";");?>">The Trend</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/copadelmundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('copadelmundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copadelmundo');?>; <?if(is_category('copadelmundo')) echo ("border-color:".cat_color('copadelmundo').";");?>">COPA</a></h5>
						</li> -->
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/wakeup" OnMouseOver="this.style.borderColor='<?php echo cat_color('wakeup');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('wakeup');?>; <?if(is_category('wakeup')) echo ("border-color:".cat_color('wakeup').";");?>">Wake Up</a></h5>
						</li> -->
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>pagina/glamcam360" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('glamcam360')) echo ("border-color:".cat_color('glamcam360').";");?>">GlamCam 360</a></h5>
						</li>-->
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/musica" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('musica')) echo ("border-color:".cat_color('glamcam360').";");?>">Música</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/copadelmundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">Copa</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/amamos-las-pelis" OnMouseOver="this.style.borderColor='<?php echo cat_color('amamos-las-pelis');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('amamos-las-pelis');?>; <?if(is_category('amamos-las-pelis')) echo ("border-color:".cat_color('amamos-las-pelis').";");?>">Pelis</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/the-royals" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-royals');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-royals');?>; <?if(is_category('the-royals')) echo ("border-color:".cat_color('the-royals').";");?>">The Royals</a></h5>
						</li>-->
					</ul>
				</div>
			</div>
			<!-- / MENU -->



		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		
	</div>
	<!-- / HEADER -->

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
				width: 450px;
				height: 130px;
				position: absolute;
				top: 10px;
				right: 30px;
			}
			.category-alfombraroja #submenu {
				background-image: url(<?php echo $var_con[200]; ?>/images/bgs/cab_red.png?i=<?=$rand?>);
			}
			.category-alfombraroja #submenu  .items_sponsor{
				background: url(<?php echo $var_con[200]; ?>/images/patrocinio_redcarpet_VZ.png?i=<?=$rand?>) no-repeat right;
			}
			</style>
        	<div id="submenu">
	          	<div class="items_submenu" style="display:none;">
					<?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'secondary' ) ); ?>
				</div>
				<div class="items_sponsor"></div>
			</div>
    <?}elseif ( is_category()) {?>
			<?if($catSlug=es_wakeup()) {?>			
				<div id="libre">
					<a href="http://www.coca-cola.tv/" target="_blank" id="cocacolatv"></a>
					<div id="submenu">
					<div class="items_submenu">
							<ul id="menu_wakeup">
								<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/personajes-wakeup">Personajes</a></h3></li>
								<!--<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/capitulos">Sinopsis capitular</a></h3></li>-->
								<!--<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/sinopsis">Sinopsis General</a></h3></li>-->
								<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/horarios">Horarios</a></h3></li>
								<li><h3><a href="<?php echo home_url( '/' ); ?>category/wakeup/galeria-wakeup">Galerias de fotos</a></h3></li>
							</ul>
					</div>
				</div>
				</div>
			<?}else{?>
				<?php if (!is_category("lol") && !is_category("e-shows")) {?>
					<div id="libre"></div>
				<?}?>			
			<?}?>
	<?}?>
    <!-- / ESPACIO LIBRE -->

    <style>
	.borde_billboard_banner{float:left; margin:10px 5px; width:970px; height:auto; border: 1px solid #ddd; display:none;}
	.floating{ display:none;}
	</style>

	<!-- Banner Billboard-->
		<? echo que_billboard_es();?>
	<!-- /Banner Billboard-->

	<!-- Banner pushdown-->
		<? echo que_pushdown_es();?>
	<!-- / Banner pushdown-->

	<!-- Banner Masthead -->
	<? echo que_masthead_es();?>
	<!-- / Banner Masthead -->

	<div id="main">
