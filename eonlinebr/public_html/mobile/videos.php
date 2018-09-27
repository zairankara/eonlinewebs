<?php include("constantes.php");
$volver = "Voltar"; 

$title_site="Videos Mobile. E! Online Latino | ".$ufeed;
$description_site="Videos y entrevistas de famosos y la Alfombra Roja. ".$title_site;
$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";

$dominio_solo=$servername;
//$photoShare=$default_img;
//$urlShareFB="?s=100&p[url]=".$dominio_solo."&p[title]=".$title_site."&p[summary]=".$description_site."&p[images][0]=".$photoShare."&rnd=".rand(0,500);
$urlShareFB2="?u=".$dominio_solo."&t=".$title_site;
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

<title>Videos. E! Online <?=$name;?> Mobile</title>
<meta name="description" content="<?php echo $description_site ?>" />
<meta name="abstract" content="<?php echo $description_site ?>"/>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title_site ?>" />
<meta property="og:url" content="<?php echo $servername;?>"/>
<meta property="og:description" content="<?php echo $description_site ?>" />
<meta property="og:image" content="<?php echo $default_img ;?>" />
<meta itemprop="description" content="<?php echo $description_site ?>"/>
<meta itemprop="name" content="<?php echo $title_site ?>"/>
<meta itemprop="image" content="<?php echo $default_img ;?>" />
<meta name="description"content="Todos los videos de <?=$ufeed?>" />
<meta name="abstract" content="Todos los videos de <?=$ufeed?>" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="font-face/font-face.css" media="screen" />
<link rel="shortcut icon" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/favicon.ico"/>


<style type="text/css">

	body{background: #EEEBEB;}
	#contentwrap {background-color: #EEEBEB;}

</style>


<script type="text/javascript">
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setDomainName', 'eonline.com'],
            ['_setAllowLinker', true],
			['_setPageGroup', 3, 'Mobile'],
	        ['_setPageGroup', 4, 'Página'],
			['_trackPageview', '/mobile/<?=$ufeed?>/videos']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
   
 </script>

<script type='text/javascript'>
	(function() {
	var useSSL = 'https:' == document.location.protocol;
	var src = (useSSL ? 'https:' : 'http:') +
	'//www.googletagservices.com/tag/js/gpt.js';
	document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
	})();
	</script>

	<script type='text/javascript'>
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Videos/Banner_1', [300, 50], 'div-gpt-ad-videos-300x50-1').addService(googletag.pubads());
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
	</script>

<script>
function addScriptTag(id, url, callback) {
  var scriptTag = document.createElement("script");
  var noCacheIE = '&noCacheIE=' + (new Date()).getTime();
   
   // Add script object attributes
   scriptTag.setAttribute("type", "text/javascript");
   scriptTag.setAttribute("charset", "utf-8");
   scriptTag.setAttribute("src", url + "&callback=" + callback + noCacheIE);
   scriptTag.setAttribute("id", id);
  
  var head = document.getElementsByTagName("head").item(0);
  head.appendChild(scriptTag);  
}

function getTopVideos() {
  addScriptTag("topVideos", "http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=605799146001&media_delivery=http&token=I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..", "response");
}

function response(jsonData) {
  //output the query
  var q = document.getElementById("qDiv");
  var s = document.getElementById("topVideos");
  

  // display the results
  var resp = document.getElementById("resp");
  resp.innerHTML="";
  for (var i=0; i<jsonData["videos"].length; i++) {
    var title = jsonData["videos"][i];
    var str = "";
    str+= '<a href="'+title.FLVURL+ '">	<div class="videos"><div class="thumb"> <img src="'+title.thumbnailURL+'" alt="testing"></div><div class="texto"><h2>'+title.name + '</h2></div><div class="boton"><img src="mas.png" alt="testing"></div></div>';
    
    resp.innerHTML += str;
  }
}

var activado = "";
function menu_open(){

if (activado != true){
window.scrollTo(0,0);
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");
document.getElementById("contentwrap").style.backgroundColor = "#000";
document.getElementById("contenido_videos").style.display = "none";
document.body.style.backgroundColor="#000";
activado = true;
}
else{
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='none';
window.scrollTo(0,0);
$("body").css("overflow", "auto");
document.getElementById("contentwrap").style.backgroundColor = "#EEEBEB";
document.getElementById("contenido_videos").style.display = "block";
document.body.style.backgroundColor="#EEEBEB";

activado = false;
}
}
</script>
</head>


<body onload="getTopVideos()">

		<div id="headerwrap">
				<div class="logo_volver" onclick="location.href='parser.php?f=<?=$_GET['f']?>';"></div>
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
			

			<div class="contenido_videos" id="contenido_videos">	


		<div id='div-gpt-ad-videos-300x50-1' class='contenedor_banner_videos'>
					<script type='text/javascript'>
					googletag.display('div-gpt-ad-videos-300x50-1');
					</script>
				</div>

				<p id="qDiv"></p>


				<div id="resp">loading...</div>
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
