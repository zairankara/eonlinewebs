<?php include("constantes.php");?>
<?php
$volver = "Voltar"; 
$color = "#FFF";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="font-face/font-face.css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="shortcut icon" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/favicon.ico"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">

<?
$title_site="Fotos e galerias de imagens dos famosos |E! Online Brasil Mobile | ".ucfirst(strtolower($ufeed));
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
<meta property="og:url" content="<?php echo $servername;?>"/>
<meta property="og:description" content="<?php echo $description_site ?>" />
<meta property="og:image" content="<?php echo $default_img ;?>" />
<meta itemprop="description" content="<?php echo $description_site ?>"/>
<meta itemprop="name" content="<?php echo $title_site ?>"/>
<meta itemprop="image" content="<?php echo $default_img ;?>" /><!--<link href="gallery.css" type="text/css" rel="stylesheet" />-->

<link href="photoswipe.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="lib/klass.min.js"></script>
<script type="text/javascript" src="code.photoswipe-3.0.5.min.js"></script>

<style>
	.gallery { list-style: none; padding: 0; margin: 0; }
	.gallery:after { clear: both; content: "."; display: block; height: 0; visibility: hidden; }
	.gallery li { float: left; width: 30%; max-height: 250px; overflow: hidden; margin-top: 10px; }
	.gallery li a { display: block; margin: 5px; border: 1px solid #3c3c3c; }
	.gallery li img { display: block; width: 100%; height: auto; max-width: none;}
	#Gallery1 .ui-content, #Gallery2 .ui-content { overflow: hidden; }
	img{max-width:none;}

@media screen and (max-width: 500px) and (min-width: 100px) {
.gallery li { float: left; width: 30%; max-height: 60px; overflow: hidden; margin-top: 10px; }
}


</style>

<script type="text/javascript">
	(function(window, PhotoSwipe){
		document.addEventListener('DOMContentLoaded', function(){
			var
				options = {},
				instance = PhotoSwipe.attach( window.document.querySelectorAll('#Gallery a'), options );
		
		}, false);
	}(window, window.Code.PhotoSwipe));	
</script>


<script type="text/javascript">
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setDomainName', 'eonline.com'],
            ['_setAllowLinker', true],
			['_setPageGroup', 3, 'Mobile'],
	        ['_setPageGroup', 4, 'Página'],
			['_trackPageview', '/mobile/<?=$ufeed?>/galeria/<?=$gallery?>']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();


var activado = "";
function menu_open(){

if (activado != true){
window.scrollTo(0,0);
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");
document.getElementById("Gallery").style.display = "none";
document.body.style.backgroundColor="#000";
activado = true;
}
else{
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='none';
window.scrollTo(0,0);
$("body").css("overflow", "auto");
document.getElementById("Gallery").style.display = "block";
document.body.style.background = '#EEEBEB';
activado = false;
}
}			  
			  
 </script>
 </head>
<body>
		<div id="headerwrap">
			
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
		

		<div id="contentwrap">
		
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

<ul id="Gallery" class="gallery">
			<? 
			require_once('../wp-config.php');
			global $wpdb;
			$id_gal=$_GET["gallery"];
			if(!is_numeric($id_gal))exit("forbiden access");

					
					$galleries = obtener_galerias($id_gal, "28", "ng.fecha", "DESC", NULL);									

					
					/* GALLERIES */

					//$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
					//$valor_season = $mydb2->get_results('SELECT mundial_ar FROM abmGalDestacadas', ARRAY_A);
					//$mundial_ar=$valor_season[0]["mundial_ar"];

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



									?>

										<li><a href="<?=$urlImg?>" rel="external"><img src="<?=$urlImg?>" alt="<?=$title?>" /></a></li>
									<?
								
					}
								
					?>

		
			
				 
				
			</ul>
			
		<div style="margin:15px; 0 0 10px;">
					<?include("app.php");?>
		</div>
		
		<!-- footer -->	
		<?php include("footer.php");?>

<!-- Comscore -->
<? include("/home/eonlinebr/public_html/varios/comscore/index.php");?>
	</body>
</html>
