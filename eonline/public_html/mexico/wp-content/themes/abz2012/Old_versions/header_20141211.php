<?
if($_GET["attachment_id"]!="" and is_numeric($_GET["attachment_id"])){
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://la.eonline.com/mexico/" );
}
?>

<?php
include(TEMPLATEPATH."/var_constantes.php");

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
<html lang="es-MX" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" itemscope itemtype="http://schema.org/Organization">
<head>
<!-- MOBIFY - DO NOT ALTER - PASTE IMMEDIATELY AFTER OPENING HEAD TAG -->
<script type="text/javascript">/*<![CDATA[*/(function(e,f){function h(a){if(a.mode){var b=g("mobify-mode");b&&a[b]||(b=a.mode(c.ua));return a[b]}return a}function m(){function a(a){e.addEventListener(a,function(){c[a]=+new Date},!1)}e.addEventListener&&(a("DOMContentLoaded"),a("load"))}function n(){var a=new Date;a.setTime(a.getTime()+3E5);f.cookie="mobify-path=; expires="+a.toGMTString()+"; path=/";e.location.reload()}function p(){k({src:"https://preview.mobify.com/v7/"})}function g(a){if(a=f.cookie.match(RegExp("(^|; )"+a+"((=([^;]*))|(; |$))")))return a[4]||""}function l(a){f.write('<plaintext style="display:none">');setTimeout(function(){d.capturing=!0;a()},0)}function k(a,b){var e=f.getElementsByTagName("script")[0],c=f.createElement("script"),d;for(d in a)c[d]=a[d];b&&c.setAttribute("class",b);e.parentNode.insertBefore(c,e)}var d=e.Mobify={},c=d.Tag={};d.points=[+new Date];d.tagVersion=[7,0];c.ua=e.navigator.userAgent;c.getOptions=h;c.init=function(a){c.options=a;if(""!==g("mobify-path"))if(m(),a.skipPreview||"true"!=g("mobify-path")&&!/mobify-path=true/.test(e.location.hash)){var b=h(a);if(b){var d=function(){b.post&&b.post()};a=function(){b.pre&&b.pre();k({id:"mobify-js",src:b.url,onerror:n,onload:d},"mobify")};!1===b.capture?a():l(a)}}else l(p)}})(window,document);(function(){var e="//cdn.mobify.com/sites/e-entertainment-latino/production/adaptive.min.js";Mobify.Tag.init({mode:function(e){return/ip(hone|od)|android.*(mobile)|blackberry.*applewebkit|bb1\d.*mobile/i.test(e)?"enabled":"desktop"},enabled:{url:e},desktop:{capture:!1,url:"//a.mobify.com/e-entertainment-latino/a.js"}})})();/*]]>*/</script>
<!-- END MOBIFY -->

<!-- is es una nota va a mobile-->
<!-- 
<?php
if(is_single() && $_COOKIE["mobify-path"]==""){?>
	<script type="text/javascript" src="/mobile/detectar_MEXICO.js"></script>
<?}?>-->

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Language" content="es-MX"/>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Category" content="entertainment">
<link rel="shortcut icon" href="<?php echo $var_con[200]; ?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="https://plus.google.com/+Eonlinelatinoplus" />

<?php echo meta_alternate();?>

<?
/*$url_texto=str_replace("mexico/","",$_SERVER["REQUEST_URI"]);
$res_an=http_response('http://la.eonline.com/andes'.$url_texto);
if($res_an==1) echo("<link rel='alternate' hreflang='es' href='http://la.eonline.com/andes".$url_texto."' />");
$res_ar=http_response('http://la.eonline.com/argentina'.$url_texto);
if($res_ar==1) echo("<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina".$url_texto."' />");
$res_vz=http_response('http://la.eonline.com/venezuela'.$url_texto);
if($res_vz==1) echo("<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela".$url_texto."' />");*/
?>


<!--<meta property="fb:app_id" content="268102679875815">-->

<?
if(is_single() || is_page( ) || is_attachment()){
	$id_post="reader.php?f=".$var_con[0]."&id=".get_the_ID();
}else{
	$id_post="parser.php?f=".$var_con[0]."";
}?>
<link rel="alternate" media="only screen and (max-width: 640px)" href="/mobile/<?=$id_post?>" /> 

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
if(is_single()){
	$primera_img=sacar_img_sin_src();
}
		
$default_img = "/mexico/wp-content/themes/abz2012/images/generica_blanca.jpg";

if(is_single()) {
				$feed_site="México";
				$title_site="E! Online Latino | ".$feed_site;
				$metadescription=obtener_metadescription();
				$title_post=wp_title('|', false, 'right');
				if($metadescription==""){
					$title_post_array=explode("|", $title_post);
					$metadescription=$title_post_array[0];
				}
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


		<?php } elseif(is_category()||is_tag()||is_page()) { ?>
				
				<? 
				$feed_site="México";
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
			  	}elseif ( is_category("estrenos" )) {
				    $title_site="Toda la información sobre los estrenos. E! Online Latino | ".$feed_site;
				    $description_site="Entérate aquí de los estrenos y nuevos capítulos de nuestros programas. Lo último está aquí. ".$title_site;
				}elseif ( is_category( "copadelmundo" )) {
				      $title_site="Copa del mundo. E! Online Latino | ".$feed_site;
				      $description_site="".$title_site;
				}elseif (is_category("e-shows")){
					$title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
					$description_site="Programas: Kardashians, La Sopa, Zona Trendy, E! Latin News, Fashion Police y más. ".$title_site;
				}elseif ( is_category( "lol" )) {
				      $title_site="Los memes y virales más divertidos de internet. E! Online Latino | ".$feed_site;
				      $description_site="Lol donde estan todos los temas calientes y virales del mundo de los famosos en la web. Memes, videos divertidos, gags, gifd, colages y mucho más. ".$title_site;		
				}elseif ( is_category("musica" )) {
				      $title_site="Música. E! Online Latino | ".$feed_site;
				      $description_site="Como buenos amantes de la cultura Pop, ¡necesitamos saberlo todo acerca del mundo de la música! Por eso te traemos esta sección llena de noticias, vídeos, fotos y la opinión de distintos expertos sobre los sucesos y lanzamientos del momento.".$title_site;
				}elseif ( is_category("marriedtojonas" )) {
				      $title_site="Marries to Jonas. E! Online Latino | ".$feed_site;
				      $description_site="Kevin Jonas & Danielle Deleasa. El amor el clave de Pop. ".$title_site;
				}elseif ( is_category("amamos-las-pelis")) {
					$title_site="Amamos las pelis. E! Online Latino  | ".$feed_site;
					$description_site="Lo Ãºltimo en Peliculas. Todo lo que necesitas saber. ".$title_site;
				}elseif (es_wakeup()) {
					$title_site="WakeUp. E! Online Latino | ".$feed_site;
					$description_site="En Wake Up Abril, la protagonista, emprenderá un camino de autodescubrimiento al cual se irán uniendo poco a poco un grupo de amigos, para conquistar sus sueños y convertirse en un exitoso grupo musical.".$title_site;
				}
				if(is_tag())
				{
				 $current_tag = single_tag_title("", false);
				 $title_site=$current_tag.". E! Online Latino | ".$feed_site;
				 $description_site="Todos los articulos de ".$current_tag.". E! Online Latino | ".$feed_site;
				}
				if(is_page("eshows")){
					$title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
					$description_site="Programas: Kardashians, La Sopa, Zona Trendy, E! Latin News, Fashion Police y más. ".$title_site;
				}elseif(is_page("glamcam360")){
					$title_site="Glam Cam 360. E! Online Latino | ".$feed_site;
					$description_site="Las celebridades que pasaron por la ".$title_site;
				}elseif(is_page("programas")){
					$title_site="Horarios de los programas de E! Latinoamérica. E! Online Latino | ".$feed_site;
					$description_site="¿A qué hora ver los programas de E! Latinoamérica? Todos los programas, estrenos, series, horarios. ".$title_site;
				}elseif(is_page("fotos-mexico") || is_page("galerias")){
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
				}elseif(is_page("fashionpolicemx")){
					$title_site="Fashion Police México. E! Online Latino | ".$feed_site;
					$description_site="Horacio Villalobos, Ileana Rodríguez, Olivia Peralta y JuanJo Herrera dan una mirada despiadada a la moda de las estrellas mexicanas e internacionales ".$title_site;
				}elseif(is_page("fashionpolice")){
					$title_site="Fashion Police | ".$feed_site;
					$description_site="La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.";
				}elseif(is_page("app")){
					$title_site="Descarga App. E! Online Latino | ".$feed_site;
					$description_site="Lo mejor de E! ONLINE está disponible en tu móvil ".$title_site;
				}elseif(is_page("coffeebreak")){
					$title_site="Coffee Break con Patricia | ".$feed_site;
					$description_site="Llega a la pantalla de E!, el nuevo programa de entrevistas que te acerca más y más a tus celebridades favoritas.";
				}elseif(is_page("lasopamexico")){
					$title_site="La Sopa México | ".$feed_site;
					$description_site="Eduardo Videgaray hace su versión mexicana de la Sopa para reirte con su visión única, humorística y ácida de los programas de televisión de Latinoamérica.";
				}elseif(is_page("epop")){
					$title_site="Epop | ".$feed_site;
					$description_site="Renato y Lety nos preparan una explosiva malteada de la cultura pop.";
				}elseif(is_page("timeline")){
					$title_site="Timeline. E! Online Latino | ".$feed_site;
					$description_site="El timeline de Kim Kardashian ".$title_site;
				}elseif(is_page("yosoyelartista")){
					$title_site="Yo soy el Artista | ".$feed_site;
					$description_site="El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, sin acceso a los medios tradicionales de comunicación, de convertirse en estrella a través del canto.";
				}elseif(is_page("zonatrendymexico")){
					$title_site="Zona Trendy Mexico | ".$feed_site;
					$description_site="Si deseas contemplar muy de cerca el lifestyle de las celebridades y la socialité mexicana. No te pierdas Zona Tendy con Gonzalo García Vivanco.";
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

		<?php } else { ?>


				<? 
				$title_site="E! Online Latino | México";
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

		<?php } ?>

<!-- FACEBOOK OPENGRAPH -->

<!-- ADDTHIS -->
<script type="text/javascript" data-device="1">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script><script type="text/javascript" src="/varios/modulos_extra/addthis_widget.js#pubid=matibur"  data-device="1"></script>
<!-- / ADDTHIS -->

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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
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
<?php }  elseif ( is_page( "fotos-mexico" )  || is_page( "galerias" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_fotos.css" />
<?php }  elseif ( is_page( "fashionpolicemx" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/fashion-police/fashion-police.css" />
<?php }  elseif ( is_page( "fashionpolice" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/fashion-police/fashion-police_generico.css" />
<?php }  elseif ( is_category( "efashionblogger" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_micaela.css" />
<?php }  elseif ( is_category( "copadelmundo" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php }  elseif ( is_category( "thetrend" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_thetrend.css" />
<?php }  elseif ( is_category( "the-kardashians" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_the-kardashians.css" />
<?php }  elseif ( is_category( "marriedtojonas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_marriedtojonas.css" />
<?php }  elseif (is_category( "e-shows" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php }  elseif ( is_category( "musica" )) {?>
			<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_musica.css" />
<?php }  elseif (is_category( "lol" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>/style_seccion.css" />-->
<?php } elseif ( is_category( "amamos-las-pelis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_amamos-las-pelis.css" />
<?php }elseif (es_wakeup()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_wakeup.css" />
<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_cine_by_dos_equis.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />
<?}?>


<!-- / STYLES -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/media_queries.css" />

<!-- STYLES COLORES CATEGORIAS-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/colores.css" />
<!-- / STYLES -->


<!-- G.A. 
<script type="text/javascript">
	var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', '<?=$var_con[2]?>'],
				['_trackPageview'],
				['b._setAccount', 'UA-18061947-40'],
				['b._setDomainName', 'eonline.com'],
				['b._setAllowLinker', true],
				['b._trackPageview']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>

  -->

  <?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga_solo.php");
?>

<!-- JS -->
<script type="text/javascript" src="/varios/modulos_extra/jquery.min.js"></script>


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
		});
	</script>
 <!-- SLIDER -->


<script language="JavaScript" type="text/javascript" src="/varios/modulos_extra/BrightcoveExperiences.js" data-device="1"></script>

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

	<a id="various3" href="/experience/EncuestaNombreShow/index.php?f=3"></a>
<?}?>
-->

<!--/ ENCUESTA ABZ -->


<!-- FLOATING ENCUESTA -->
<?php/* if(is_home() && !isset($_COOKIE['encuestaleidanew']) ){?>
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
<?}*/?>
<!-- / FLOATING ENCUESTA-->

<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>


 <!-- BRIGHTCOVE -->
<script src="<?php echo $var_con[200]; ?>/scripts/trace.js" type="text/javascript" data-device="1"></script>
<script src="/varios/modulos_extra/APIModules_all.js" data-device="1"></script> 
<script type="text/javascript" data-device="1">

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
	document.getElementById(divid).style.height = newH+"px";
}
function setFlashWidth(divid, newH){
	document.getElementById(divid).style.width = newH+"px";
}
</script>
 <!-- SCRIPT PARA EXPANDIBLE -->
 
<script language="JavaScript">
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
</script>
 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->


	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->

	<!--/* Defineslots */-->
	<? include(TEMPLATEPATH."/defineslots_mexico.php");?>
	<!--/* Defineslots */-->

	<!--/* script_skin */-->
	<? include(TEMPLATEPATH."/script_skin.php");?>
	<!--/* script_skin */-->

	<!--/* topscroll menu */-->
	<script type="text/javascript" src="<?php echo $var_con[200]; ?>/nagging-menu.js" charset="utf-8"></script>
	<!--/* topscroll menu */-->
	
</head>

<?php flush(); ?>

<body <?php body_class(); ?>>
	<!--/* div float  lateral */-->
	<?if($_GET["abz"]!=""){?>
		<a href="/letysahagun/" class="flyout flyout-video" id="flyout"></a>
	<?}?>

	<!--/* skin */-->
	<?php echo quien_es_skin();?>
	<!--/* skin */-->

	<!--/* ad_pagebanner */-->
	<? include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->

<?if(is_home()){?>

	<!-- Banner floating -->
	<?php echo que_floating_es("720","300",NULL);?>
	<!-- / Banner floating -->


	<!-- Banner floating 3ros-->
	<?php echo que_floating_3ros_es();?>
	<!-- / Banner floating 3ros-->

	<!-- Banner Floor Ad.-->
	<?php //echo que_floorAd_es();?>
	<!-- / Banner Floor Ad.-->
<?}?>	


<div id="wrapper" class="hfeed">
	<!-- HEADER -->
	<div id="header">
		
		<!-- Links superiores, Buscador y Banners -->
		<div id="cont_search_banners">
			<div id="cont_banners_top" >
				<div id="banner_top_242x90">
					<? echo quien_es("240","90",NULL);?>
				</div>

				<div id="exp_banner" class="banner_top_728x90" style="overflow:hidden;">
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
							<h5><a href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Inicio</a></h5>
						</li> -->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a href="<?php echo home_url( '/' ); ?>pagina/eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a></h5>
							<?include(TEMPLATEPATH."/submenu.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/alfombraroja" OnMouseOver="this.style.borderColor='<?php echo cat_color('alfombraroja');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('alfombraroja');?>; <?if(is_category('alfombraroja')) echo ("border-color:".cat_color('alfombraroja').";");?>">RED CARPET</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>pagina/fotos-mexico" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('fotos-mexico')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>pagina/videos-2" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos-2');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos-2');?>; <?if(is_page('videos-2')) echo ("border-color:".cat_color('videos-2').";");?>">Videos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>pagina/programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programación</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/lol" OnMouseOver="this.style.borderColor='<?php echo cat_color('lol');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('lol');?>; <?if(is_category('lol')) echo ("border-color:".cat_color('lol').";");?>">LOL</a></h5>
						</li> 
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="#" OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="color:#fff; <?if(is_category('efashionblogger')) echo ("border-color:'#fff';");?>">E! Blogs</a></h5>
							<?include(TEMPLATEPATH."/submenu_bloggers.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/thetrend" OnMouseOver="this.style.borderColor='<?php echo cat_color('thetrend');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('thetrend');?>; <?if(is_category('thetrend')) echo ("border-color:".cat_color('thetrend').";");?>">The Trend</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/copadelmundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('copadelmundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copadelmundo');?>; <?if(is_category('copadelmundo')) echo ("border-color:".cat_color('copadelmundo').";");?>">COPA</a></h5>
						</li> -->
						<!--  <li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/wakeup" OnMouseOver="this.style.borderColor='<?php echo cat_color('wakeup');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('wakeup');?>; <?if(is_category('wakeup')) echo ("border-color:".cat_color('wakeup').";");?>">Wake Up</a></h5>
						</li>-->
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>pagina/glamcam360" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('glamcam360')) echo ("border-color:".cat_color('glamcam360').";");?>">GlamCam 360</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/copadelmundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">Copa</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/amamos-las-pelis" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('amamos-las-pelis')) echo ("border-color:".cat_color('glamcam360').";");?>">Pelis</a></h5>
						</li>
					</ul>
				</div>
			</div>
			<!-- / MENU -->


		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		
	</div>
	<!-- / HEADER -->
<style>
.borde_billboard_banner{
	float:left; margin:10px 5px; width:970px; height:auto; border: 1px solid #ddd;
}
</style>

	<?if(is_home()){?>
		<!-- Banner Billboard-->
		<div id="div-gpt-ad-home-970x31" class="borde_billboard_banner hideMobify" class='hideMobify'>
				<script type="text/javascript">
				googletag.display('div-gpt-ad-home-970x31');
				</script>
		</div>
		<!-- /Banner Billboard-->
		<!-- Banner pushdown-->
		<div id="div-gpt-ad-home-970x90" class="borde_billboard_banner hideMobify">
				<script type="text/javascript">
				googletag.display('div-gpt-ad-home-970x90');
				</script>
		</div>
		<!-- / Banner pushdown-->
		<!-- Banner Slider-->
		<!--<div id="div-gpt-ad-home-slider" class='hideMobify'>
				<script type="text/javascript">
				googletag.display('div-gpt-ad-home-slider');
				</script>
		</div>-->
	<!-- / Banner Slider-->
	<?}?>

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
				left:500px;
			}

			#submenu .items_sponsor{
				width: 250px;
				height: 130px;
				position: absolute;
				top: 10px;
				right: 30px;
			}
			.category-alfombraroja #submenu {
				background-image: url(<?php echo $var_con[200]; ?>/images/bgs/cab_red.png);
			}
			.category-alfombraroja #submenu  .items_sponsor{
				background-image: url(<?php echo $var_con[200]; ?>/images/patrocinio_redcarpet_MX.png);
			}
			</style>
			<div id="submenu">
				<div class="items_submenu">
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
				<?php if (!is_category("lol") && !is_category("e-shows") ) {?>
				<div id="libre"></div>
				<?}?>
			<?}?>
	 <?}elseif ( is_page("fashionpolicemx")) {?>
			 <div id="libre"></div>
	<?}?>
    <!-- / ESPACIO LIBRE -->

	<div id="main">
