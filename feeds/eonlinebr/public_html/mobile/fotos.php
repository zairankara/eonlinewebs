<?php include("constantes.php");?>
<?php
$volver = "Voltar"; 
$color = "#FFF";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">

<? 
$title_site="Fotos e galerias de imagens dos famosos |E! Online Brasil Mobile| ".ucfirst(strtolower($ufeed));
$description_site="Fotos e galerias de imagens dos famosos |E! Online Brasil Mobile. ".$title_site;
$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";

$dominio_solo=$servername;
$urlShareFB2="?u=".$dominio_solo."&t=".$post_title;
?>
<title><?php echo $title_site ?> Mobile</title>
<meta name="description" content="<?php echo $description_site ?>" />
<meta name="abstract" content="<?php echo $description_site ?>"/>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title_site ?> Mobile" />
<meta property="og:url" content="<?php echo $servername?>"/>
<meta property="og:description" content="<?php echo $description_site ?>" />
<meta property="og:image" content="<?php echo $default_img ;?>" />
<meta itemprop="description" content="<?php echo $description_site ?>"/>
<meta itemprop="name" content="<?php echo $title_site ?>"/>
<meta itemprop="image" content="<?php echo $default_img ;?>" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="font-face/font-face.css" media="screen" />
<link rel="shortcut icon" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/favicon.ico"/>


<!-- DFP -->
	<script type='text/javascript'>
	(function() {
	var useSSL = 'https:' == document.location.protocol;
	var src = (useSSL ? 'https:' : 'http:') +
	'//www.googletagservices.com/tag/js/gpt.js';
	document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
	})();
	</script>

	<script type='text/javascript'>
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Fotos/Banner_1', [300, 50], 'div-gpt-ad-fotos-300x50-1').addService(googletag.pubads());
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
	</script>
<!-- /DFP -->

<script> 
$(function(){

     $('a[href*=#]').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });

});
</script>

<script>

function addthis(){
var obj = document.getElementById("share_contenedor");
obj.style.display = obj.style.display ='block';
window.scrollTo(0,0);
$("body").css("overflow", "hidden");

}


function addthis_close(){
var obj = document.getElementById("share_contenedor");
obj.style.display = obj.style.display ='none';
window.scrollTo(0,0);
$("body").css("overflow", "auto");
}

var activado = "";
function menu_open(){

if (activado != true){
window.scrollTo(0,0);
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");
document.getElementById("page").style.display = "none";

activado = true;
}
else{
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='none';
window.scrollTo(0,0);
$("body").css("overflow", "auto");
document.getElementById("page").style.display = "block";
activado = false;
}
}

</script>

<script type="text/javascript">

var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setDomainName', 'eonline.com'],
            ['_setAllowLinker', true],
			['_setPageGroup', 3, 'Mobile'],
	        ['_setPageGroup', 4, 'Página'],
			['_trackPageview', '/mobile/<?=$ufeed?>/fotos']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
  
  
  </script>

</head>
<body>

<div id="share_contenedor" style="display:none;" >
	
	<div id="share_cerrar">
	<img src="close_button.png" alt="cerrar" class="imgclose" onclick="addthis_close();"> 
	</div>
	<div id="share_botones">
		<img src="fb_share.png" alt="facebook"> 
		<img src="tw_share.png" alt="twitter" > 
		<img src="e_share.png" alt="E-mail" > 
	</div>


</div>
		<div id="headerwrap">
				<div class="logo_volver" onclick="location.href='parser.php';"></div>
			<div id="header">
				
			<div id="menu_feed">
				<!-- FEED NAME
 				<div id="new_menu_boton">
				<h1><?=$name?>  <?=strToUPPER($ufeed);?> -&nbsp;</h1>
				</div>
				-->
				<div id="new_menu_boton2" onclick="menu_open();" >
				<h2>MENU</h2>
				</div>
			</div>

			</div>
			
		</div>
		

		<div id="contentwrap" style="text-align:center;">
		<!-- MENU DESPLEGABLE -->
				<div id="new_menu" style="display:none;" >
					
								<div class="item0" onclick="location.href='categoria.php?c=<?php echo(base64_encode("tapetevermelho"));?>';">
									<div class="item">
									Tapete Vermelho
									</div>
								</div>



								<div class="item0" onclick="location.href='categoria.php?c=<?php echo(base64_encode("efashionblogger"));?>';">
									<div class="item">
									Fashion Blogger
									</div>
								</div>

								<div class="item0" onclick="location.href='categoria.php?c=<?php echo(base64_encode("thetrend"));?>';">
									<div class="item">
									The Trend
									</div>
								</div>

								<div class="item0" onclick="location.href='categoria.php?c=<?php echo(base64_encode("the-kardashians"));?>';">
									<div class="item">
									The Kardashians
									</div>
								</div>


				</div>
				<!-- // MENU DESPLEGABLE -->
		
			<?php include("menu_volver.php");?>

			<!-- Banner -->
			<div id='div-gpt-ad-fotos-300x50-1' class="contenedor_banner_fotos">
				<script type='text/javascript'>
				googletag.display('div-gpt-ad-fotos-300x50-1');
				</script>
			</div>

			
			<ul class="page" id="page">
					

			<?
			require_once('../wp-config.php');

					global $wpdb;
					
					$id_gal=NULL;
					$galleries = obtener_galerias_page($id_gal, "28", "ng.fecha", "DESC", "ng.id");									

					
					/* GALLERIES */

					$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
					//$valor_season = $mydb2->get_results('SELECT mundial_ar FROM abmGalDestacadas', ARRAY_A);
					$mundial_ar=$valor_season[0]["mundial_ar"];

					foreach($galleries as $image){
								

								$urlImg=$image["filename"];
								$vecUrl=explode("http://",$image["filename"]);
								$id_galeria=$image["gid"];
								$title=$image["title"];
								$title_gal=$image["title_gal"];

								if($vecUrl[1]=="")
								{
										$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
								}else{
										$urlImg="http://".$vecUrl[1];
								}

								if($id_galeria!=$mundial_ar && $id_galeria!=12845  && $id_galeria!=10076 && $id_galeria!=13070 && $id_galeria!=7538 ){

									if($urlImg){?>

												<li class="post">
														
														<div class="image" style="background-color:black;">
															<img src="<?php echo $urlImg;?>" alt="<?php echo $title_gal; ?>" title="<?php echo $title_gal; ?>" />
															<div class="placa" style="bottom:10px;">
																<h3><a href="gallery.php?f=<? echo($feed); ?>&gallery=<? echo($id_galeria);?>"><?php echo $title_gal; ?></A></h3>
															</div>
														</div>
													</li>




									

									<?}
								}
					}
								
					?>


</ul>
		

		</div>
		



		<div id="infoblock">
		
			<h2><A HREF="<?=$ruta_mobile?>parser.php" style="color:#fff;">Home</A></h2>
			
		</div>

		<!-- footer -->	
		<?php include("footer.php");?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>


<!-- Comscore -->
<? include("/home/eonlinebr/public_html/varios/comscore/index.php");?>
</body>
</html>
