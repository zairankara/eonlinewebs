<?
/*if(is_home()){
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://br.eonline.com/category/tapetevermelho/" );
}*/
?>

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
	<!-- MOBIFY - DO NOT ALTER - PASTE IMMEDIATELY AFTER OPENING HEAD TAG -->
	<script type="text/javascript">/*<![CDATA[*/(function(e,f){function h(a){if(a.mode){var b=g("mobify-mode");b&&a[b]||(b=a.mode(c.ua));return a[b]}return a}function m(){function a(a){e.addEventListener(a,function(){c[a]=+new Date},!1)}e.addEventListener&&(a("DOMContentLoaded"),a("load"))}function n(){var a=new Date;a.setTime(a.getTime()+3E5);f.cookie="mobify-path=; expires="+a.toGMTString()+"; path=/";e.location.reload()}function p(){k({src:"https://preview.mobify.com/v7/"})}function g(a){if(a=f.cookie.match(RegExp("(^|; )"+a+"((=([^;]*))|(; |$))")))return a[4]||""}function l(a){f.write('<plaintext style="display:none">');setTimeout(function(){d.capturing=!0;a()},0)}function k(a,b){var e=f.getElementsByTagName("script")[0],c=f.createElement("script"),d;for(d in a)c[d]=a[d];b&&c.setAttribute("class",b);e.parentNode.insertBefore(c,e)}var d=e.Mobify={},c=d.Tag={};d.points=[+new Date];d.tagVersion=[7,0];c.ua=e.navigator.userAgent;c.getOptions=h;c.init=function(a){c.options=a;if(""!==g("mobify-path"))if(m(),a.skipPreview||"true"!=g("mobify-path")&&!/mobify-path=true/.test(e.location.hash)){var b=h(a);if(b){var d=function(){b.post&&b.post()};a=function(){b.pre&&b.pre();k({id:"mobify-js",src:b.url,onerror:n,onload:d},"mobify")};!1===b.capture?a():l(a)}}else l(p)}})(window,document);(function(){var e="//cdn.mobify.com/sites/e-online-brasil/production/adaptive.min.js";Mobify.Tag.init({mode:function(e){return/ip(hone|od)|android.*(mobile)|blackberry.*applewebkit|bb1\d.*mobile/i.test(e)?"enabled":"desktop"},enabled:{url:e},desktop:{capture:!1,url:"//a.mobify.com/e-online-brasil/a.js"}})})();/*]]>*/</script>
	<!-- END MOBIFY -->

<!-- is es una nota va a mobile-->
<!--<?php
if(is_single() && $_GET["mobify-path"]==""){?>
	<script type="text/javascript" src="/mobile/detectar_BRASIL.js"></script>
<?}?>-->

<!-- CAMBIO DE HOME A RED CARPET-->
<!--<?php if(is_home()){?>
	<meta http-equiv="refresh" content="0;url=http://br.eonline.com/category/tapetevermelho">
<?}?>-->


<meta name="theme-color" content="#000000">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Language" content="pt-BR">
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Language" content="portuguese" />
<meta name="Category" content="entertainment" />
<link rel="shortcut icon" href="<?php echo $var_con[200];?>images/favicon.ico"/>
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
$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";

if(is_single()){
		$primera_img=sacar_img_sin_src();
		$default_img = $primera_img;
		
		$title_site="E! Online Brasil";
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
		}elseif ( is_category("noivas")) {
			$title_site="Noivas | ".$feed_site;
			$description_site="".$title_site;
		}elseif ( is_category("the-royals" )) {
		      $title_site="The Royals. | ".$feed_site;
		      $description_site=".".$title_site;
		}elseif ( is_category("carnaval2015")) {
			$title_site="Carnaval | ".$feed_site;
			$description_site="".$title_site;
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


		<?
		$noes_galeria=1;
		if(is_page("galerias_page")){ 
			$noes_galeria=0;
		}

		if($noes_galeria==1){
		// las escribo en la page de galerias con los datos de la primera?> 
			<?
			if(is_page("videos")){
					function getRemoteFile($url, $timeout = 10) {
					  $ch = curl_init();
					  curl_setopt ($ch, CURLOPT_URL, $url);
					  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					  curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					  $file_contents = curl_exec($ch);
					  curl_close($ch);
					  return ($file_contents) ? $file_contents : FALSE;
					}

					function obtener_meta_video($idVIDEO){
					     //$return = file_get_contents("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%videoStillURL&media_delivery=default&token=".$token."", "response_img");

					     $return = getRemoteFile("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%2CvideoStillURL%2CcustomFields&media_delivery=default&token=".TOKEN."", "response_img");
					     $decode = json_decode($return);
					     $decode_array['uri']=$decode->videoStillURL;
					     $decode_array['name']=$decode->name;
					     if($decode->customFields->titlebrasil!="") $decode_array['name']=$decode->customFields->titlebrasil;

					  return $decode_array;
					}
					function obtener_meta_video_first($videos){
					     //$return = file_get_contents("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%videoStillURL&media_delivery=default&token=".$token."", "response_img");

					     $return = getRemoteFile("http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=".$videos."&video_fields=id%2Cname%2CvideoStillURL%2CcustomFields&media_delivery=http&token=".TOKEN."");
					     $decode = json_decode($return);
					     $decode_array['primer_video']=$decode->videoIds[0];

					  return $decode_array;
					}

					if($_GET["id"]!=""){
						$datoVideo=obtener_meta_video($_GET["id"]);
						$videoID=$_GET["id"];
					}else{
						$primer_video=obtener_meta_video_first($playlist_HM);
						$datoVideo=obtener_meta_video($primer_video["primer_video"]);
						$videoID=$primer_video["primer_video"];
					}
					?>
					<meta property="og:type" content="video.other" />
					<meta property="og:image" content="<?php echo $datoVideo["uri"];?>" />
					<meta property="og:title" content="<?php echo $datoVideo["name"];?>" />
					<meta property="og:url" content="http://br.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
					<meta itemprop="name" content="<?php echo $datoVideo["name"];?>"/>
					<meta itemprop="image" content="<?php echo $datoVideo["uri"];?>" />
			<?}else{?>
					<!--ABZ-->
					<meta property="og:type" content="article" />
					<meta property="og:title" content="<?php echo $title_site ?>" />
					<meta property="og:url" content="http://br.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
					<meta property="og:description" content="<?php echo $description_site ?>" />
					<meta property="og:image" content="<?php echo $default_img ;?>" />
					<meta itemprop="name" content="<?php echo $title_site ?>"/>
					<meta itemprop="image" content="<?php echo $default_img ;?>" />
					<meta itemprop="url" content="http://br.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
		
			<?}

		}elseif($noes_galeria==0){
			//traigo data galeria
			$gallery=$_GET["gallery"];
			$galleries_GET = obtener_galerias($gallery, NULL, "pg.orden", "ASC");
			$vecUrl=$galleries_GET[0]["filename"];
			$titulo=$galleries_GET[0]["title"];

			$title_site=$titulo;
			$description_site=$galleries_GET[0]["title_gal"];
			$default_img=$vecUrl;
			?>
			<meta property="og:type" content="article" />
			<meta property="og:title" content="<?=$galleries_GET[0]["title_gal"]?>" />
			<meta property="og:url" content="http://br.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
			<meta property="og:description" content="<?=$titulo?>" />
			<meta property="og:image" content="<?=$vecUrl?>" />
			<meta itemprop="name" content="<?php echo $titulo ?>"/>
			<meta itemprop="image" content="<?php echo $vecUrl ;?>" />
			<meta itemprop="url" content="http://br.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>

		<?}?>
		<meta property="og:image:width" content="300" />

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
<meta property="og:site_name" content="E! Online Brasil" />
<!-- FACEBOOK OPENGRAPH -->

<!-- TWITTER OPENGRAPH -->
<meta name="twitter:widgets:csp" content="on">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@eonlinebrasil" />
<meta name="twitter:title" content="<?php echo $title_site ?>">
<meta name="twitter:description" content="<?php echo $description_site ?>">
<meta name="twitter:image:src" content="<?php echo $default_img ;?>">
<!-- TWITTER OPENGRAPH -->

<!-- PINTEREST OPENGRAPH -->
<meta name="p:domain_verify" content="030307ccae34396f35ea7f38d631a0f4"/>
<!-- PINTEREST OPENGRAPH -->

<?if(is_single()){?>
<!-- ADDTHIS -->
<!--
<script type="text/javascript" data-device="1">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script><script type="text/javascript" src="/varios/modulos_extra/addthis_widget.js#pubid=matibur"  data-device="1"></script>-->
<script type="text/javascript" data-device="1">var addthis_config = {"data_track_addressbar":false, "data_track_clickback":false};</script>
<script type="text/javascript" src="//s7.addthis.com/js/250/addthis_widget.js#pubid=matibur" async="async" data-device="1"></script>
<!-- / ADDTHIS -->
<?}?>


<!-- schema -->
<?if(is_home()){$type="WebSite";}elseif(is_single()){$type="NewsArticle";$GetData= obtener_date(); }else{$type="WebPage";}?>
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
      "logo": "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg",
      "sameAs" : [ "http://www.facebook.com/pages/E-Online-Brasil/145725988795846?ref=sgm",
      "http://instagram.com/eonlinebrasil",
      "http://www.youtube.com/user/EonlineBr",
      "http://twitter.com/Eonlinebrasil",
      "https://plus.google.com/101179119468166386373/posts"] 
    }
</script>
<!-- /schema -->

<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>font-face/font-face.css" />
<!-- / FONT-FACE -->

<!--CSS CYCLE-->
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200];?>cycle-slider/cycle.css" />


<?
if ( in_category( "tapetevermelho" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "tapetevermelho" )) $cat_alf2=1;
if ( is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" ) ||  is_category( "latinbillboard" )) $cat_alf3=1;
?>

<!-- STYLES -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $var_con[200]; ?>/style.css?r=<?=$rand?>" />
<?php
if (is_category( "tapetevermelho" )){?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $var_con[200];?>style_alfombra.css?r=<?=$rand?>" />
<?php }  elseif (is_category( "enews" ) || is_category( "foto-do-dia-2" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_enews.css" />
<?php }  elseif (is_category( "estrenos" )) {?>
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_estrenos.css" />
<?php }  elseif (is_category( "imperdivel" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_imperdible.css" />
<?php }  elseif (is_category( "goldenglobe" )) {?>
<?php }  elseif (is_category( "sag" )) {?>
<?php }  elseif (is_category( "grammy" )) {?>
<?php }  elseif (is_category( "oscar" )) {?>
<?php }  elseif (is_category( "emmy" )) {?>
<?php }  elseif (is_category( "latinbillboard" )) {?>
<?php }  elseif ( is_page( "programas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>programacion/css/programacion_2014.css" />
<?php }  elseif ( is_page( "galerias" )  || is_page( "galerias_page" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_fotos.css" />
<?php }  elseif ( is_page( "galerias_page" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_gallery.css" />
<?php }  elseif ( is_category( "the-kardashians" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_the-kardashians.css" />
<?php }  elseif ( is_category( "efashionblogger" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_micaela.css" />
<?php }  elseif ( is_category( "musica" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>style_musica.css" />
<?php } elseif ( is_category( "amamos-cinema" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>style_amamos-las-pelis.css" />
<?php }  elseif ( is_category( "thetrend" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_thetrend.css" />
<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_cine_by_dos_equis.css" />
<?php }  elseif ( is_category( "marriedtojonas" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_marriedtojonas.css" />
<?php }  elseif ( is_page( "fashionpolice" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>fashion-police/fashion-police.css" />
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
<?php }  elseif ( is_page( "videos" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>videos.css" />
<?php }  elseif ( is_category( "copa-do-mundo" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
<?php }  elseif (is_category( "carnaval2015" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
<?php }  elseif (is_category( "lol" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_lol.css" />
<?php }  elseif ( is_category( "the-royals" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>/style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200]; ?>style_the-royals.css" />
<?php }  elseif (is_category( "noivas" )) {?>
	<!--<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />-->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_noivas.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>style_seccion.css" />
<?}?>
<!-- / STYLES -->

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>/media_queries.css" />

<!-- STYLES COLORES CATEGORIAS-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $var_con[200];?>colores.css" />
<!-- / STYLES -->

<?
//NUEVO GA
include($_SERVER["DOCUMENT_ROOT"]."/common/ga_solo.php");
?>


<!-- JS -->
<!-- <script type="text/javascript" src="/varios/modulos_extra/jquery.min.js" data-device="1"></script>-->
<script src="http://code.jquery.com/jquery-1.9.0.min.js" data-device="1"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js" data-device="1"></script>
<script type="text/javascript" data-device="1">
function isMobile(){
    return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
}
</script>

<?if( is_page("eshows") ):?>
	<!-- TOOLTIP TEXT ESHOWS THUMB-->
	<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200];?>da-thumb/css/style.css" />
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
	<script type="text/javascript" src="<?php echo $var_con[200];?>da-thumb/js/jquery.hoverdir.js"></script>
	
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
<?if(is_home()){?>
<link rel="stylesheet" href="http://la.eonline.com/admin2012/banners/slider/global_2012.css">
<script src="http://la.eonline.com/admin2012/banners/slider/slides.min.jquery.js"></script>
	<script>
		$(function(){
			if($('body').hasClass('home')) {
				$('#slider_cycle').slides({start: 1, container: 'slides_container_EFB', pagination: false, generatePagination: false, play: 5000, pause: 2500, hoverPause: false, effect: 'fade'});
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
			}
		});
	</script>
 <!-- SLIDER -->
<?}?>



<!--<script language="JavaScript" type="text/javascript" src="/varios/modulos_extra/BrightcoveExperiences.js" data-device="1"></script>-->
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js" data-device="1"></script>

 <!-- LIGHTBOX -->
 <!--<script type="text/javascript" src="<?php echo $var_con[200];?>fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo $var_con[200];?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $var_con[200];?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />-->


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

	<a id="various3" href="/varios/encuestaMilian/index.php?f=<?=$var_con[0];?>&r=<?=$rand;?>"></a>
<?}?>-->
<!-- / FLOATING encuestaMilian-->


<?php
	/*if ( is_singular() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
		wp_head();
	}*/
	wp_head();
    /*wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'http://br.eonline.com' .'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js', FALSE, '1.4.4');*/
	
	/*wp_deregister_script('jquery');
	wp_register_script('jquery',("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '');
	wp_enqueue_script('jquery');*/


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
         //modVP.addEventListener(brightcove.api.events.MediaEvent.PROGRESS, onMediaProgressFired);
         modVP.addEventListener(brightcove.api.events.MediaEvent.STOP, onMediaEventFired);
         modVP.addEventListener(brightcove.api.data.Media, onMediaEventFired);
     }
     
     function onMediaEventFired(evt) {
         	objectGlobalVideos.title = evt.media.displayName;
			objectGlobalVideos.id = evt.media.id;
			objectGlobalVideos.pageName = location.hostname+location.pathname+evt.media.displayName;


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
 

<!--<?if(!is_single()){?>
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
<?}?>-->

 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->


	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->
	
	<!--/* Defineslots */-->
	
	<?if($_GET["abz"]!=""){?>
		<? //include(TEMPLATEPATH."/defineslots_brasil_dynamic.php");?>
	<?}else{?>
		<? //include(TEMPLATEPATH."/defineslots_brasil.php");?>
	<?}?>

	<? include(TEMPLATEPATH."/defineslots_brasil_dynamic.php");?>


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
			$('.pushdownAD').has('iframe').show();
			$('.pushdownAD').has('div').show();

			$('.billboardAD').has('iframe').show();
			$('.billboardAD').has('div').show();


			if($('.floating .floating_content_table:has("iframe")').length>0) {$('.floating').show();}
			if($('.floating .floating_content_table:has("div")').length>0) {$('.floating').show();}
		});
	</script>

	
  	<!-- DEFINE PARA NOTAS BATANGA-->
  	<!-- <?if(is_single()){?>
		<script src="<?php echo $var_con[200];?>single_batangaNEW.js?r=<?=$rand?>" data-device="1"></script>
	<?}?>-->
	<!-- / DEFINE PARA NOTAS BATANGA-->


<!-- CodeBasic PageScroll Omniture-->
<script type="text/javascript" src="/varios/omniture/pagescroll.js"  data-device="1"></script>
<!-- / CodeBasic PageScroll Omniture-->


<!-- CodeBasic Omniture-->
<script src="//assets.adobedtm.com/2f40ac3634dda54927109ac2de7fff195b55011d/satelliteLib-8b6d7310838d03b742a124c9601810ce8e8d2d15.js" data-device="1"></script>
<!-- / CodeBasic Omniture-->


	<!-- PIXEL FACEBOOK-->
	<script>(function() {
	var _fbq = window._fbq || (window._fbq = []);
	if (!_fbq.loaded) {
	var fbds = document.createElement('script');
	fbds.async = true;
	fbds.src = '//connect.facebook.net/en_US/fbds.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(fbds, s);
	_fbq.loaded = true;
	}
	_fbq.push(['addPixelId', '1117982814882848']);
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', 'PixelInitialized', {}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1117982814882848&amp;ev=PixelInitialized" /></noscript>
	<!-- PIXEL FACEBOOK-->
	
</head>

<?php flush(); ?>
<style type="text/css">
	body{
		overflow: visible !important;
	}
</style>
<body <?php body_class(); ?> <?if($title_post) echo ('data-title="'. utf8_decode($title_post).'"');?>>

		<!--/* skin */-->
		<?php echo quien_es_skin();?>
		<!--/* skin */-->

		<!-- Banner floating -->
		<?php echo que_floating_es("720","300",NULL);?>
		<!-- / Banner floating -->


		<!-- Banner floating 3ros-->
		<?php echo que_floating_3ros_es();?>
		<!-- / Banner floating 3ros-->

		<!-- Banner Floor Ad.-->
		<?php echo que_floorAd_es();?>
		<!-- / Banner Floor Ad.-->

	<!--/* ad_pagebanner */-->
	<? //include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->

<div id="wrapper" class="hfeed">

	<!-- AD flyout-->
	<!--<?if(!is_page("galerias_page")):?>
		
		<div class="flyout flyout-video" id="flyout">
			<div class="redes">
				<a href="https://www.facebook.com/Eonlinebrasil?ref=sgm" target="_blank" class="facebook"></a>
				<a href="https://twitter.com/Eonlinebrasil" target="_blank" class="twitter"></a>
			</div>
		</div>
		
	<?endif;?>-->
	<!-- AD flyout-->

	<!-- HEADER -->
	<div id="header">
		
		<!-- Links superiores, Buscador y Banners -->
		<div id="cont_search_banners">
			<div id="cont_banners_top" >
				<div id="banner_top_242x90">
					<? echo quien_es("240","90",NULL);?>
				</div>

				<div id="exp_banner" class="banner_top_728x90">
					<!-- BATANGA O DFP 728X90 -->
					<? 
			        //$data=que_batanga_es("728x90");
			        //if($data==""){echo quien_es("728","90",NULL);}else{echo $data;}
			        echo quien_es("728","90",NULL);
			        ?>
			        <!-- / BATANGA O DFP 728X90 -->
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
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Início</a></h5>
						</li> -->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a></h5>
						</li>
						<li data-category="tapetevermelho" class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/tapetevermelho" OnMouseOver="this.style.borderColor='<?php echo cat_color('tapetevermelho');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('tapetevermelho');?>; <?if(is_category('tapetevermelho')) echo ("border-color:".cat_color('tapetevermelho').";");?>">tapete vermelho</a></h5>
							<?include(TEMPLATEPATH."/submenuRC.php");?>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/copa-do-mundo" OnMouseOver="this.style.borderColor='<?php echo cat_color('copa-do-mundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copa-do-mundo');?>; <?if(is_category('copa-do-mundo')) echo ("border-color:".cat_color('copa-do-mundo').";");?>">COPA</a></h5>
						</li>-->
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a></h5>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/lol" OnMouseOver="this.style.borderColor='<?php echo cat_color('lol');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('lol');?>; <?if(is_category('lol')) echo ("border-color:".cat_color('lol').";");?>">LOL</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/thetrend" OnMouseOver="this.style.borderColor='<?php echo cat_color('thetrend');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('thetrend');?>; <?if(is_category('thetrend')) echo ("border-color:".cat_color('thetrend').";");?>">The Trend</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/efashionblogger" OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="color:#fff; <?if(is_category('efashionblogger')) echo ("border-color:'#fff';");?>">Moda</a></h5>
						</li>
						
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>galerias" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('galerias')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a></h5>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>videos" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos');?>; <?if(is_page('videos')) echo ("border-color:".cat_color('videos').";");?>">Vídeos</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programação</a></h5>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item" style="padding-bottom:30px;">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a></h5>
							<?include(TEMPLATEPATH."/submenu.php");?>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/amamos-cinema" OnMouseOver="this.style.borderColor='<?php echo cat_color('copa-do-mundo');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('copa-do-mundo');?>; <?if(is_category('amamos-cinema')) echo ("border-color:".cat_color('copa-do-mundo').";");?>">Cinema</a></h5>
						</li>
						
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/carnaval2015" OnMouseOver="this.style.borderColor='<?php echo cat_color('carnaval2015');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('carnaval2015');?>; <?if(is_category('carnaval2015')) echo ("border-color:".cat_color('carnaval2015').";");?>">Carnaval</a></h5>
						</li>-->
					
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>glamcam360" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('glamcam360')) echo ("border-color:".cat_color('glamcam360').";");?>">GlamCam 360</a></h5>
						</li>-->

						<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/musica" OnMouseOver="this.style.borderColor='<?php echo cat_color('glamcam360');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('glamcam360');?>; <?if(is_category('musica')) echo ("border-color:".cat_color('glamcam360').";");?>">Música</a></h5>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<h5><a class="menu-item-a" href="<?php echo home_url( '/' ); ?>category/noivas" OnMouseOver="this.style.borderColor='<?php echo cat_color('noiva');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('noiva');?>; <?if(is_category('noiva')) echo ("border-color:".cat_color('noiva').";");?>">Noivas</a></h5>
						</li>-->
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
			#submenu {
			    width: 980px;
			    height: 155px;
			    margin: 0;
			    padding: 0;
			    position: relative;
			}
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
			.category-tapetevermelho #submenu,
			.category-sag #submenu,
			.category-oscar #submenu,
			.category-grammy #submenu,
			.category-emmy #submenu,
			.category-goldenglobe #submenu,
			.category-latinbillboard #submenu{
				background-image: url(<?php echo $var_con[200]; ?>/images/bgs/cab_red.png);
			}
			/*.category-tapetevermelho #submenu  .items_sponsor{
				background: url(<?php echo $var_con[200]; ?>/images/patrocinio_redcarpet_BR.png) no-repeat right;
			}*/

			</style>
        <div id="submenu">
          <!--<div class="items_submenu">
              <?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'secondary' ) ); ?>
          </div>-->
          	<div class="items_sponsor"></div>

        </div>

        <?if($_GET["debug"]!=""){?>
				<!-- MODULO RED CARPET SEASON-->
				<script language="javascript" type="text/javascript" id="script_lineup">
					var var_feed = <?=$var_con[0];?>;

					$.ajax({
					   type: "POST",
					   url: "/experience/redcarpetseason/lineup/index.php",
					   data: "var_feed="+var_feed+"&dateCache=" + new Date().getTime(),
					   cache: false,
					   success: function(respuesta) {
					      $("#lineup").html(respuesta);
					   }
					});
				</script>
				<style>
				#lineup{
					background-color: #d00000;
					width: 980px;
					height: 400px;
					position: relative;
				}
				</style>
				<div id="lineup"></div>
			<?}?>

    <?}elseif ( is_category() || is_page("fashionpolice")) {?>    
	    <?php if (!is_category( "carnaval2015" )) {?>
	      <div id="libre"></div>
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
