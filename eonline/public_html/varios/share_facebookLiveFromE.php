<?
function noCache() {
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
}
noCache();

$dominio="http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";
$dominio_face="http://la.eonline.com/experience/live_fromE/FB_image.jpg";
$titulo_face="Live from E! Latino en Vivo";
$desc_face="Estoy viendo Live From E! Latino, un show que trae las opiniones más nutridas y variadas sobre las noticias del mundo del espectáculo.";
$url_face="http://la.eonline.com/experience/live_fromE/mexico.php";
$titulo="E! Online Latino";

?>
<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="http://la.eonline.com/argentina/wp-content/themes/abz2012/font-face/font-face.css" />
<!-- / FONT-FACE -->
<style>
body{

	background: #000;
}

.contenedor{
	width: 100%;
	text-align: center;
	
	
}

.contenedor img {
	max-height: 700px;
	margin:auto;
}

h3 {
color: #fff;
font-size: 30px !important;
margin-bottom: 30px;
margin-top: 30px;
font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;
letter-spacing: 1px;
text-rendering: optimizeLegibility;
text-transform: uppercase;
}


</style>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	  xmlns:og="http://ogp.me/ns#"
	  xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Organization" lang="es">
	  <head>
	<meta itemprop="name" content="<? echo $titulo_face;?>" />
	<meta property="og:url" content="http://la.eonline.com/varios/share_facebookLiveFromE.php"/>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<? echo $titulo_face;?>" />
	<meta property="og:description" content="<? echo $desc_face;?>" />

		<meta property="og:image" content="<?=$dominio_face?>" />
		<meta itemprop="image" content="<?=$dominio_face?>" />
		<link rel="image_src" href="<?=$dominio_face?>">
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title><? echo $titulo_face;?></title>
	<meta name="description" content="<? echo $desc_face;?>"/>
	<meta http-equiv="refresh" content="0.1; url=http://la.eonline.com/argentina/"/>

	<link rel="canonical" href="http://la.eonline.com/varios/share_facebookLiveFromE.php" />
</head>
<body>
<div class="contenedor">
<!--<img src="<?=$dominio_face;?>">
<h3><?=$titulo_face;?></h3>-->
</div>
</body>
</html>