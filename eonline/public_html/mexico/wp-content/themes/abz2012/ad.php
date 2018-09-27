<?
$hay="";
if($_GET["gclid"]!="")$hay.="&gclid=".$_GET["gclid"];
if($_GET["utm_source"]!="")$hay.="&utm_source=".$_GET["utm_source"];
if($_GET["utm_medium"]!="")$hay.="&utm_medium=".$_GET["utm_medium"];
if($_GET["utm_term"]!="")$hay.="&utm_term=".$_GET["utm_term"];
if($_GET["utm_content"]!="")$hay.="&utm_content=".$_GET["utm_content"];
if($_GET["utm_campaign"]!="")$hay.="&utm_campaign=".$_GET["utm_campaign"];
if($_GET["__utma"]!="")$hay.="&__utma=".$_GET["__utma"];
if($_GET["__utmb"]!="")$hay.="&__utmb=".$_GET["__utmb"];
if($_GET["__utmc"]!="")$hay.="&__utmc=".$_GET["__utmc"];
if($_GET["__utmx"]!="")$hay.="&__utmx=".$_GET["__utmx"];
if($_GET["__utmz"]!="")$hay.="&__utmz=".$_GET["__utmz"];
if($_GET["__utmv"]!="")$hay.="&__utmv=".$_GET["__utmv"];
if($_GET["__utmk"]!="")$hay.="&__utmk=".$_GET["__utmk"];
if($hay!="")$getVars="?a=0".$hay;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>EonlineLatino</TITLE>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Keywords" content="Eonlinelatino, E! latino, E!, estrenos, gente e, latinoamerica, programacion, 100%latino, eonline, alfombra roja, galerias, foros, fotos gente, espectaculo, noticias, e! news, concursos, vota por, esta noche, e! entertainment latinoamerica, contactos, chica e!, daniela kosan, lo mas e!" />

<meta name="author" content="http://www.abzcomunicacion.com">
<meta name="identifier-url" content="http://www.eonlinelatinola.com/">
<meta name="Language" content="Spanish">
<meta name="Distribution" content="Global">
<meta name="revisit-after" content="1 day">
<meta name="Category" content="entertainment">
<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com">
  <!-- G.A. -->
<script type="text/javascript">
	var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', 'UA-18061947-4'],
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
  <style>
  body{
	width:100%;
	height:100%;
	margin:0;
	text-align:center;
  }
  .content{
	margin:0 auto;
	width:960px;
	height:620px;
	border:1px solid red;
  }
  .omitir{
	margin:0 auto;
	width:960px;
	height:100px;
  }
  </style>

  <script type="text/javascript">
	
	var t = setTimeout("alerta()",5000);

	function alerta() { 
		header("Location:/mexico/index.php<?=$getVars?>");
		exit();
	}
</script>


 </HEAD>

 <BODY>
	<div class="content">
			 <!--/* OpenX Javascript Tag v2.8.5 */-->

			<script type='text/javascript'><!--//<![CDATA[
			   document.MAX_ct0 ='INSERT_CLICKURL_HERE';

			   var m3_u = (location.protocol=='https:'?'https://adsrv01.eonlinelatinola.com/www/delivery/ajs.php':'http://adsrv01.eonlinelatinola.com/www/delivery/ajs.php');
			   var m3_r = Math.floor(Math.random()*99999999999);
			   if (!document.MAX_used) document.MAX_used = ',';
			   document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
			   document.write ("?zoneid=124");
			   document.write ('&amp;cb=' + m3_r);
			   if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
			   document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
			   document.write ("&amp;loc=" + escape(window.location));
			   if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
			   if (document.context) document.write ("&context=" + escape(document.context));
			   if ((typeof(document.MAX_ct0) != 'undefined') && (document.MAX_ct0.substring(0,4) == 'http')) {
				   document.write ("&amp;ct0=" + escape(document.MAX_ct0));
			   }
			   if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
			   document.write ("'><\/scr"+"ipt>");
			//]]>--></script><noscript><a href='http://adsrv01.eonlinelatinola.com/www/delivery/ck.php?n=a7ada54c&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://adsrv01.eonlinelatinola.com/www/delivery/avw.php?zoneid=124&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a7ada54c&amp;ct0=INSERT_CLICKURL_HERE' border='0' alt='' /></a></noscript>

	</div>
	
	<div class="omitir"><a href="index.php<?=$getVars?>"><IMG SRC="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/omitir.png" BORDER="0" ALT=""></a></div>
 </BODY>
</HTML>
