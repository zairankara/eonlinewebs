<?php
include(TEMPLATEPATH."/var_constantes.php");


// MOBILE 
//include(TEMPLATEPATH."/detectar_movil_br.php");


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
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Organization">
<head>
<?php if($_GET[""]!=""){?>
<!-- MOBIFY - DO NOT ALTER - PASTE IMMEDIATELY AFTER OPENING HEAD TAG -->
<script type="text/javascript">/*<![CDATA[*/(function(e,f){function h(a){if(a.mode){var b=g("mobify-mode");b&&a[b]||(b=a.mode(c.ua));return a[b]}return a}function m(){function a(a){e.addEventListener(a,function(){c[a]=+new Date},!1)}e.addEventListener&&(a("DOMContentLoaded"),a("load"))}function n(){var a=new Date;a.setTime(a.getTime()+3E5);f.cookie="mobify-path=; expires="+a.toGMTString()+"; path=/";e.location.reload()}function p(){k({src:"https://preview.mobify.com/v7/"})}function g(a){if(a=f.cookie.match(RegExp("(^|; )"+a+"((=([^;]*))|(; |$))")))return a[4]||""}function l(a){f.write('<plaintext style="display:none">');setTimeout(function(){d.capturing=!0;a()},0)}function k(a,b){var e=f.getElementsByTagName("script")[0],c=f.createElement("script"),d;for(d in a)c[d]=a[d];b&&c.setAttribute("class",b);e.parentNode.insertBefore(c,e)}var d=e.Mobify={},c=d.Tag={};d.points=[+new Date];d.tagVersion=[7,0];c.ua=e.navigator.userAgent;c.getOptions=h;c.init=function(a){c.options=a;if(""!==g("mobify-path"))if(m(),a.skipPreview||"true"!=g("mobify-path")&&!/mobify-path=true/.test(e.location.hash)){var b=h(a);if(b){var d=function(){b.post&&b.post()};a=function(){b.pre&&b.pre();k({id:"mobify-js",src:b.url,onerror:n,onload:d},"mobify")};!1===b.capture?a():l(a)}}else l(p)}})(window,document);(function(){var e="//cdn.mobify.com/sites/e-online-brasil/production/adaptive.min.js";Mobify.Tag.init({mode:function(e){return/ip(hone|od)|android.*(mobile)|blackberry.*applewebkit|bb1\d.*mobile/i.test(e)?"enabled":"desktop"},enabled:{url:e},desktop:{capture:!1,url:"//a.mobify.com/e-online-brasil/a.js"}})})();/*]]>*/</script>
<!-- END MOBIFY -->
<?}?>

<!-- is es una nota va a mobile-->
<?php
if(is_single() && $_GET["mobify-path"]==""){?>
	<script type="text/javascript" src="/mobile/detectar_BRASIL.js"></script>
<?}?>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Language" content="pt-BR">
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Language" content="portuguese" />
<meta name="Category" content="entertainment" />
<link rel="shortcut icon" href="<?php echo $var_con[200]?>images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />


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

<!--<meta property="fb:app_id" content="268102679875815">-->


<!-- FACEBOOK OPENGRAPH -->
<?php
if(is_single()){

	$primera_img=sacar_img_sin_src();
}

$default_img = "http://la.eonline.com/mexico/wp-content/themes/abz2012/images/generica_blanca.jpg";


if(is_single()) { 
				$title_site="E! Online Brasil";
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
				<meta property="og:url" content="<?php the_permalink(); ?>"/>
				<meta property="og:description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
					
				<meta itemprop="name" content="<?php echo $title_post;?>"/>
				<meta itemprop="image" content="<?php echo $primera_img ;?>" />
				<meta itemprop="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />

		<?php } elseif(is_category()||is_tag()||is_page()) { ?>
				
				<? 
				$feed_site="E! Online Brasil";
				$title_site=$feed_site;
				$description_site="E! Online Brasil é o site do canal E! Entertainment Television. Notícias, fotos e vídeos exclusivos sobre famosos e celebridades do Brasil e de Hollywood. Guia da programação do E! no Brasil ".$title_site;


				if(is_category( "enews" )){
					$title_site="Notícias de Famosos, Notas, Entrevistas, Fotos, Fofocas | ".$feed_site;
					$description_site="Notícias de Famosos, Notícias de Celebridades, Fotos de Famosos, Fotos de celebridades, Gossip, Entrevistas, Fofocas. ".$title_site;
				}elseif ( is_category("efashionblogger")) {
					$title_site="Moda, Notícias de Famosos , Fotos, Modelos, Passarel | ".$feed_site;
					$description_site="Notícias de Famosos, Celebridades, Modelos, Entrevistas, Notícias sobre moda, Passarela. ".$title_site;
				}elseif ( is_category("tapetevermelho" )) {
					$title_site="Tapete Vermelho, Notícias de Famosos, Globo, Prêmios, Fotos de Famosos, Estrelas. ".$feed_site;
					$description_site="Tapete Vermelho, Notícias de famosos, Premiações, Red Carpet, Celebridades, Premios, Globo de Ouro, Oscar, Grammy, Emmy, Golden Globe, Academy Awards, SAG | ".$title_site;
				}elseif ( is_category("the-kardashians" )) {
					$title_site="É Tão Kardashian, Series de tv | ".$feed_site;
					$description_site="É tão Kardashian, Estreia, Kardashians, Kim Kardashian, Khloé Kardashian Odom, Episódios, Videos. ".$title_site;
				}elseif ( is_category( "copa-do-mundo" )) {
				      $title_site="Copa do mundo E! Online Brasil | ".$feed_site;
				      $description_site="".$title_site;	
				}elseif ( is_category("thetrend" )) {
					$title_site="The Trend | ".$feed_site;
					$description_site="O mais recente em tendências de Celebridades. ".$title_site;
				}elseif ( is_category("marriedtojonas" )) {
				      $title_site="Marries to Jonas. ".$feed_site;
				      $description_site="Kevin Jonas & Danielle Deleasa. O amor na batida do Pop.".$title_site;
				}elseif ( is_category("lol" )) {
				      $title_site="Os memes e virais das celebridades mais quentes da internet. ".$feed_site;
				      $description_site="LOL é o canal do E! Online Brasil onde se fala de tudo que é quente e viral do mundo dos famosos na na web. Memes, vídeos divertidos, gags, flagras, gifs, colagem, antes e depois e muito mais.".$title_site;
				}elseif ( is_category("amamos-cinema")) {
					$title_site="Amamos Cinema | ".$feed_site;
					$description_site="AGORA TEMOS FILMES!. ".$title_site;
				}elseif ( is_category("musica")) {
					$title_site="Música | ".$feed_site;
					$description_site="Como bons amantes da cultura pop, precisamos saber tudo sobre o mundo da música! Então nós trazemos esta seção completa de notícias, vídeos, fotos e opiniões de diversos especialistas sobre eventos e calendário lances. ".$title_site;
				}

				
				if(is_tag())
				{
				 $current_tag = single_tag_title("", false);
				 $title_site=$current_tag.". ".$feed_site;
				 $description_site="Todas as notas ".$current_tag.". ".$feed_site;
				}
				if(is_page("eshows")){
					$title_site="Programas de E! Entertainment Television. ".$feed_site;
					$description_site="Programas: Kardashians, E Vip Brasil, Fashion Police y más. ".$title_site;
				}elseif(is_page("glamcam360")){
					$title_site="Glam Cam 360. | ".$feed_site;
					$description_site="Los Famosos que pasaron por la ".$title_site;
				}elseif(is_page("programas")){
					$title_site="Programação, Filmes, Series de tv, Estreias, Episódios, Movies. ".$feed_site;
					$description_site="Programação, Filmes, Series de tv, Estreias, Vídeos, Episódios, Movies. ".$title_site;
				}elseif(is_page("galerias") || is_page("galerias_page")){
					$title_site="Fotos de Famosos, Modelos, Artistas, Premios. ".$feed_site;
					$description_site="Fotos de Famosos, Flagras de Famosos, Artistas, Premios, Premiações, Celebridades, Estrelas. ".$title_site;
					if($_GET["img"]!="")$default_img=$_GET["img"];
					if($_GET["t"]!="")$title_site=$_GET["t"]." ".$_GET["d"];
				}elseif(is_page("videos")){
					$title_site="Videos de Famosos, Notas, Entrevistas, Noticias, TV. ".$feed_site;
					$description_site="Videos, Video, Entrevistas, Noticias, TV. ".$title_site;
				}elseif(is_page("politicas-de-privacidade")){
					$title_site="Políticas de Privacidade. ".$feed_site;
					$description_site="Políticas de Privacidade. ".$title_site;
				}elseif(is_page("termos-de-uso")){
					$title_site="Termos de Uso. ".$feed_site;
					$description_site="Termos de Uso. ".$title_site;
				}elseif(is_page("politica-de-remocion")){
					$title_site="Política de Remoción. ".$feed_site;
					$description_site="Política de Remoción de E! Online Brasil. ".$title_site;
				}elseif(is_page("contacto")){
					$title_site="Contacto. ".$feed_site;
					$description_site="Contacto ".$title_site;
				}elseif(is_page("timeline")){
					$title_site="Timeline. ".$feed_site;
					$description_site="Timeline Kim Kardashian ".$title_site;
				}elseif(is_page("app")){
					$title_site="Baixe o app. ".$feed_site;
					$description_site="Melhor do E! Online está disponível para o seu telefone ".$title_site;
				}elseif(is_page("fashionpolice")){
					$title_site="Fashion Police. ".$feed_site;
					$description_site="Com a língua afiada Joan Rivers, junto com Giuliana Rancic, Kelly Osbourne e George Kotsiopoulos, comentam dos looks mais marcantes de Hollywood.".$title_site;
				}



				?>
				<title><?php echo $title_site ?></title>
				<meta name="description" content="<?php echo $description_site ?>" />
				<meta name="abstract" content="<?php echo $description_site ?>"/>
				<meta property="og:type" content="article" />
				<meta property="og:title" content="<?php echo $title_site ?>" />
				<meta property="og:url" content="<?php echo $var_con[1]; ?>"/>
				<meta property="og:description" content="<?php echo $description_site ?>" />
				<meta property="og:image" content="<?php echo $default_img ;?>" />
				<meta itemprop="description" content="<?php echo $description_site ?>"/>
				<meta itemprop="name" content="<?php echo $title_site ?>"/>
				<meta itemprop="image" content="<?php echo $default_img ;?>" />

		<?php } else { ?>


				<? 
				$title_site="E! Online Brasil | E! Entertainment Television Brasil.";
				$description_site="E! Online Brasil é o site do canal E! Entertainment Television. Notícias, fotos e vídeos exclusivos sobre famosos e celebridades do Brasil e de Hollywood. Guia da programação do E! no Brasil ";
				?>
				<title><?php echo $title_site ?></title>
				<meta name="description" content="<?php echo $description_site ?>" />
				<meta name="abstract" content="<?php echo $description_site ?>"/>
				<meta property="og:type" content="article" />
				<meta property="og:title" content="<?php echo $title_site ?>" />
				<meta property="og:url" content="<?php echo $var_con[1]; ?>"/>
				<meta property="og:description" content="<?php echo $description_site ?>" />
				<meta property="og:image" content="<?php echo $default_img ;?>" />
				<meta itemprop="description" content="<?php echo $description_site ?>"/>
				<meta itemprop="name" content="<?php echo $title_site ?>"/>
				<meta itemprop="image" content="<?php echo $default_img ;?>" />

		<?php } ?>

<!-- FACEBOOK OPENGRAPH -->

<!-- ADDTHIS -->
<script type="text/javascript">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script>
<script type="text/javascript" src="http://br.eonline.com/varios/modulos_extra/addthis_widget.js#pubid=matibur"></script>
<!-- / ADDTHIS -->

<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>font-face/font-face.css" />
<!-- / FONT-FACE -->

<!--CSS CYCLE-->
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]?>cycle-slider/cycle.css" />


<?
if ( in_category( "tapetevermelho" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "tapetevermelho" )) $cat_alf2=1;
if ( is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" ) ||  is_category( "latinbillboard" )) $cat_alf3=1;
?>

<!-- STYLES -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
if ($cat_alf2==1){?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_alfombra.css" />
<?php }  elseif (is_category( "enews" ) || is_category( "foto-do-dia-2" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_enews.css" />
<?php }  elseif (is_category( "estrenos" )) {?>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_estrenos.css" />
<?php }  elseif (is_category( "imperdivel" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_imperdible.css" />
<?php }  elseif (is_category( "goldenglobe" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_golden.css" />
<?php }  elseif (is_category( "sag" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_sag.css" />
<?php }  elseif (is_category( "grammy" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_grammy.css" />
<?php }  elseif (is_category( "oscar" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_oscar.css" />
<?php }  elseif (is_category( "emmy" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_emmy.css" />
<?php }  elseif (is_category( "latinbillboard" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_latin.css" />
<?php }  elseif ( is_page( "programas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>programacion/css/programacion_2014.css" />
<?php }  elseif ( is_page( "galerias" )  || is_page( "galerias_page" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_fotos.css" />
<?php }  elseif ( is_page( "galerias_page" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_gallery.css" />
<?php }  elseif ( is_category( "the-kardashians" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_the-kardashians.css" />
<?php }  elseif ( is_category( "efashionblogger" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_micaela.css" />
<?php }  elseif ( is_category( "musica" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_musica.css" />
<?php } elseif ( is_category( "amamos-cinema" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_amamos-las-pelis.css" />
<?php }  elseif ( is_category( "thetrend" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_thetrend.css" />
<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_cine_by_dos_equis.css" />
<?php }  elseif ( is_category( "marriedtojonas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_marriedtojonas.css" />
<?php }  elseif ( is_page( "fashionpolice" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>fashion-police/fashion-police.css" />
<?php }  elseif ( is_category( "copa-do-mundo" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
<?php }  elseif (is_category( "carnaval2014" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
<?php }  elseif (is_category( "lol" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />-->
<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>style_seccion.css" />
<?}?>
<!-- / STYLES -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/media_queries.css" />

<!-- STYLES COLORES CATEGORIAS-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]?>colores.css" />
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
  </script> -->
<?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga_solo.php");
?>



<!-- JS -->
<script type="text/javascript" src="http://br.eonline.com/varios/modulos_extra/jquery.min.js"></script>




<?if( is_page("eshows") ):?>
	<!-- TOOLTIP TEXT ESHOWS THUMB-->
	<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]?>da-thumb/css/style.css" />
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
	<script type="text/javascript" src="<?php echo $var_con[200]?>da-thumb/js/jquery.hoverdir.js"></script>
	
	<script type="text/javascript">
		$(function() {
		
			$('#da-thumbs > li').hoverdir();

		});

	</script>
<?php endif; ?>
	
<?if( is_page("beta") ):?>
	<script type="text/javascript" src="http://la.eonline.com/common/msCarousel/jquery.msCarousel-min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://la.eonline.com/common/msCarousel/mscarousel_2014.css" />
<?php endif; ?>

<?if( is_page("galerias_page") ):?>
<script type="text/javascript" src="http://la.eonline.com/common/msCarousel/jquery.msCarousel-min.js"></script>
<link rel="stylesheet" type="text/css" href="http://la.eonline.com/common/msCarousel/mscarousel_2014_v2.css" />
<?php endif; ?>


<!-- SLIDER -->
<link rel="stylesheet" href="http://la.eonline.com/admin2012/banners/slider/global_2012.css">
<script src="http://la.eonline.com/admin2012/banners/slider/slides.min.jquery.js"></script>
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


<script language="JavaScript" type="text/javascript" src="http://br.eonline.com/varios/modulos_extra/BrightcoveExperiences.js"></script>

 <!-- LIGHTBOX -->
<script type="text/javascript" src="<?php echo $var_con[200]?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $var_con[200]?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200]?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


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

	<a id="various3" href="http://br.eonline.com/experience/EncuestaNombreShow/index.php?f=99"></a>
<?}?>
-->

<!--/ ENCUESTA ABZ -->



<!-- FANBOX FLOATING -->
<?php if(is_home() && !isset($_COOKIE['encuestaleidanew']) ){?>
	<!--<style type="text/css">
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

	<a id="various3" href="http://br.eonline.com/varios/encuesta2013/index.php"></a>-->
<?}?>
<!-- /FANBOX FLOATING-->

<?php
	/*if ( is_singular() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
		wp_head();
	}*/
	wp_head();
    /*wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'http://br.eonline.com' .'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js', FALSE, '1.4.4');*/
	wp_deregister_script('jquery');
	wp_register_script('jquery',("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '');
	wp_enqueue_script('jquery');


?>


 <!-- BRIGHTCOVE -->
<script src="<?php echo $var_con[200]?>scripts/trace.js" type="text/javascript"></script>
<script src="http://br.eonline.com/varios/modulos_extra/APIModules_all.js"></script> 
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
	document.getElementById(divid).style.height = newH+"px";
}
function setFlashWidth(divid, newH){
	document.getElementById(divid).style.width = newH+"px";
}
</script>
 <!-- SCRIPT PARA EXPANDIBLE -->
 

<?if(!is_single()){?>
	<script src="http://malsup.github.io/jquery.cycle.all.js"></script> 
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
<?}?>

 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->


	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->
	
	<!--/* Defineslots */-->
	<? include(TEMPLATEPATH."/defineslots_brasil.php");?>
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

	<?if(!is_single()){?>
		<!--/* skin */-->
		<?php echo quien_es_skin();?>
		<!--/* skin */-->

		<!-- Banner Floor Ad.-->
		<?php //echo que_floorAd_es();?>
		<!-- / Banner Floor Ad.-->
	<?}?>

	<!--/* ad_pagebanner */-->
	<? include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->

 	<!--/* Floating */-->
	<?if(is_home()){?>
			<div id='div-gpt-ad-home-720x300' class="floating hideMobify" >
				<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-home-720x300').remove();"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
				<div class="floating_content_table">
					<?php echo que_cat_es("home","720","300",NULL);?>
				</div>
			</div>
	<?}elseif(is_category("thetrend")){?>
			<div id='div-gpt-ad-thetrend-720x300' class="floating hideMobify">
					<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-thetrend-720x300').remove();"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
					<div class="floating_content_table">
						<?php echo que_cat_es("thetrend","720","300",NULL);?>
					</div>
			</div>
	<?}elseif(is_page("programas")){?>
			<div id='div-gpt-ad-programas-720x300' class="floating hideMobify">
					<a href="#" style="float:right" onclick="javascript:document.getElementById('div-gpt-ad-programas-720x300').remove();"><img src="http://la.eonline.com/common/imgs/boton_cerrar.gif" alt="boton cerrar"></a>
					<div class="floating_content_table">
						<?php echo que_cat_es("programas","720","300",NULL);?>
					</div>
			</div>
	<?}?>
	<!--/* Floating */-->
	


<div id="wrapper" class="hfeed">

	<?if(!is_page("galerias_page")):?>
		<!-- AD flyout-->
		<div class="flyout flyout-video" id="flyout">
			<div class="redes">
				<a href="https://www.facebook.com/Eonlinebrasil?ref=sgm" target="_blank" class="facebook"></a>
				<a href="https://twitter.com/Eonlinebrasil" target="_blank" class="twitter"></a>
			</div>
		</div>
		<!-- AD flyout-->
	<?endif;?>

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
							<h5><a href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Início</a></h5>
						</li> -->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/copa-do-mundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('copa-do-mundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copa-do-mundo');?>; <?if(is_category('copa-do-mundo')) echo ("border-color:".cat_color('copa-do-mundo').";");?>">COPA</a></h5>
						</li>-->
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/lol" OnMouseOver="this.style.borderColor='<?php echo cat_color('lol');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('lol');?>; <?if(is_category('lol')) echo ("border-color:".cat_color('lol').";");?>">LOL</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/thetrend" OnMouseOver="this.style.borderColor='<?php echo cat_color('thetrend');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('thetrend');?>; <?if(is_category('thetrend')) echo ("border-color:".cat_color('thetrend').";");?>">The Trend</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/efashionblogger" OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="color:#fff; <?if(is_category('efashionblogger')) echo ("border-color:'#fff';");?>">Moda</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/tapetevermelho" OnMouseOver="this.style.borderColor='<?php echo cat_color('tapetevermelho');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('tapetevermelho');?>; <?if(is_category('tapetevermelho')) echo ("border-color:".cat_color('tapetevermelho').";");?>">Tapete Vermelho</a></h5>
						</li>
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>galerias" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('galerias')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>videos" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos');?>; <?if(is_page('videos')) echo ("border-color:".cat_color('videos').";");?>">Vídeos</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programação</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a></h5>
							<?include(TEMPLATEPATH."/submenu.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/amamos-cinema" OnMouseOver="this.style.borderColor='<?php echo cat_color('copa-do-mundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copa-do-mundo');?>; <?if(is_category('amamos-cinema')) echo ("border-color:".cat_color('copa-do-mundo').";");?>">Cinema</a></h5>
						</li>
						
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>category/carnaval2014" OnMouseOver="this.style.borderColor='<?php echo cat_color('carnaval2014');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('carnaval2014');?>; <?if(is_category('carnaval2014')) echo ("border-color:".cat_color('carnaval2014').";");?>">Carnaval</a></h5>
						</li>-->
					
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a href="<?php echo home_url( '/' ); ?>glamcam360" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('glamcam360')) echo ("border-color:".cat_color('glamcam360').";");?>">GlamCam 360</a></h5>
						</li>-->

						
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
		<div id="div-gpt-ad-home-970x31" class="borde_billboard_banner hideMobify">
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
				left:570px;
			}

			#submenu .items_sponsor{
				width: 180px;
				height: 130px;
				position: absolute;
				top: 10px;
				right: 30px;
			}
			.category-tapetevermelho  #submenu {
				background-image: url(<?php echo $var_con[200]; ?>/images/bgs/cab_red.png);
			}
			</style>
        <div id="submenu">
          <div class="items_submenu">
              <?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'secondary' ) ); ?>
          </div>
        </div>
    <?}elseif ( is_category() || is_page("fashionpolice")) {?>    
	    <?php if (!is_category( "carnaval2014" ) && !is_category("lol")) {?>
	      <div id="libre"></div>
        <?}?>
    <?}?>
    <!-- / ESPACIO LIBRE -->

	<div id="main">
