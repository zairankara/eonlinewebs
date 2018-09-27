<?
 $dbname="eonline_argentina";
$volver="Volver";
$dbhost="preprodabzdb";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle){
		$error = msg_error_conexion;
	}else{
		$db_selected= mysql_select_db($dbname, $chandle);
		if (!$db_selected) {
			$error = msg_error_conexion;
		}
	}
echo mysql_error();


	$abmLivesRows = mysql_query("SELECT * FROM abmLives WHERE NOW()>=desde AND NOW()<=hasta");
	while($fila = mysql_fetch_array($abmLivesRows)){

	$urlM = $fila["url"];
	$urlM = substr($urlM,0,-4);
	$urlM = $urlM."_mobile.php";
 	$url_br = $fila["url_br"];
	$ls_mobile_la = $fila["ls_mobile_la"];
	$lt_mobile_la = $fila["lt_mobile_la"];

}
mysql_close();
?>

<?php include("constantes.php");?>
<?php include("functions.php");?>
<?
$agent="";
$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=0;
 
if(strpos($agent, "iPhone")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "Android")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "BlackBerry")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "iPod")==TRUE){
	$mobile=1;
}

if($mobile==0){
	$var_url="http://br.eonline.com/";
	exit("<script>location.href='".$var_url."';</script>");    
}

$var_url="http://br.eonline.com/";
exit("<script>location.href='".$var_url."';</script>"); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="font-face/font-face.css" media="screen" />
<link rel="shortcut icon" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/favicon.ico"/>


<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">

<? 
$title_site="E! Online | ".ucfirst(strtolower($ufeed));
$description_site="E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood. ".$title_site;
$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";
?>
<title><?php echo $title_site ?> Mobile</title>
<meta name="description" content="<?php echo $description_site ?>" />
<meta name="abstract" content="<?php echo $description_site ?>"/>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title_site ?> Mobile" />
<meta property="og:url" content="<?php $_SERVER["REQUEST_URI"] ?>"/>
<meta property="og:description" content="<?php echo $description_site ?>" />
<meta property="og:image" content="<?php echo $default_img ;?>" />
<meta itemprop="description" content="<?php echo $description_site ?>"/>
<meta itemprop="name" content="<?php echo $title_site ?>"/>
<meta itemprop="image" content="<?php echo $default_img ;?>" />

<script type="text/javascript">
		var _gaq = _gaq || [];
	       _gaq.push(
	            ['_setAccount', 'UA-18061947-40'],
	            ['_setDomainName', 'eonline.com'],
	            ['_setAllowLinker', true],
	            ['_setPageGroup', 3, 'Mobile'],
	            ['_setPageGroup', 4, 'Home'],
	            ['_trackPageview', '/mobile/<?=$ufeed?>/home']
	      );
	      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
  </script>

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
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Prehome/Box_Banner_1', [300, 250], 'div-gpt-ad-prehome-300x250').addService(googletag.pubads());
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Home/Banner_1', [300, 50], 'div-gpt-ad-home-300x50-1').addService(googletag.pubads());
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Home/Banner_2', [300, 50], 'div-gpt-ad-home-300x50-2').addService(googletag.pubads());
	googletag.defineOutOfPageSlot('/8877/<?=$namefeed?>/Mobile/adhesion', 'div-gpt-ad-home-adhesion').addService(googletag.pubads());
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
	</script>
  <!-- DFP -->
  
   
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




function banner_open(){
	console.log("LLEGOOOO");
window.scrollTo(0,0);
var obj = document.getElementById("div-gpt-ad-prehome-300x250");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");

}


function banner_close(){
var obj = document.getElementById("div-gpt-ad-prehome-300x250");
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

</head>
<body>

		<div id="div-gpt-ad-home-adhesion">
				<script type="text/javascript">
				googletag.display('div-gpt-ad-home-adhesion');
				</script>
		</div>
		
		<div id="div-gpt-ad-prehome-300x250" style="">
			
			<div id="banner_botones">
					<!-- PREHOME -->
						<script type='text/javascript'>
						googletag.display('div-gpt-ad-prehome-300x250');
						</script>
			</div>
			<div onclick="banner_close();" class="omitir">
			<h2>FECHAR</h2>
			</div>

		</div>

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

			<div id="infoblock">
				<ul>
		            <li>
		             	<a href="parser.php" class="menu_item"><h2 class="news" >NEWS</h2></a>
		            </li>
		            <li>
		              <a href="fotos.php" class="menu_item"><h2 class="fotos">FOTOS</h2></a>
		            </li>
		             <li>
		              <a href="videos.php" class="menu_item"><h2 class="videos_menu">VÍDEOS</h2></a>
		            </li>

		        </ul>
			</div>

			<ul class="page" id="page">
			<?
					$sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
					FROM wp_posts
					WHERE post_status='publish' AND post_type='post' AND post_content<>''
					ORDER BY post_date DESC LIMIT 0,37";
					$query=mysql_query($sql,$chandle);
					$cant=mysql_num_rows($query);
					$i=0;

					while($row=mysql_fetch_array($query))
					{
						$ID =$row["ID"];
						$post_title =utf8_encode($row["post_title"]);
						$post_content=utf8_encode($row["post_content"]);
						$video2 = verifico_video($post_content);
						$sacar_idvideo=sacar_idvideo($post_content);
						$sacar_idvideo = str_replace("myExperience", "", $sacar_idvideo);
						

						$post_content=explode("<em><!--more--></em>",$post_content);
						$post_content=$post_content[0];
						$post_content=strip_tags($post_content, '<img><span><p>');
						$post_content=str_replace("brightcove.createExperiences();","",$post_content);
						

						if($row["post_modified"]>$row["post_date"]){
							$fecha=$row["post_modified"];
						}else{
							$fecha=$row["post_date"];
						}
						?>

<?if ($i == 0) {?>
<!-- HOME 1 -->
	<div id='div-gpt-ad-home-300x50-1' class="contenedor_banner_home">
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-home-300x50-1');
		</script>
	</div>



		<?
			if($_GET["abz"] == "1"){

			if ($ls_mobile_la == 1){?>
				<div class="contenedor_banner_home">
				<div style="margin:5px auto; width:320px; height:208px;"><iframe src="<?=$urlM?>?" width="320" height="208" scrolling="no" frameborder="0" allowtransparency="allowtransparency"></iframe></div>
				</div>

			<?}?>

			<?if ($lt_mobile_la == 1){?>
				<div class="contenedor_banner_home">
				<div style="width:320px; height:182px; overflow:hidden; margin:5px auto;"><iframe src="http://la.eonline.com/argentina/wp-content/themes/abz2012/tweets.php" width="320" height="182" scrolling="no" frameborder="0" allowtransparency="allowtransparency" style="width: 320px !important;"></iframe></div>
				</div>

			<?}}?>





<?}?>

<?if ($i==4) {?>
<!-- HOME 2 -->
	<div id='div-gpt-ad-home-300x50-2' class="contenedor_banner_home">
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-home-300x50-2');
		</script>
	</div>

<?}?>

<?if ($i == 0){?>
<li class="post_destacado">
								
								<div class="image">
								<?
									$img = img_home_destacado($post_content);
									if ($img!=""){
									echo $post_content;}
									else
									{ ?>
								<img src="test.png" alt="video">

								<?
								}?>
								</div>
									<div class="placa">
										<h3><A HREF="reader.php?id=<?=$ID?>"><?php echo $post_title;?></A></h3>
									</div>
								
							</li>


<?}
else{?>
							<li class="post">
								
								<div class="image">
								<?
									$img = img_home($post_content);
									if ($img!=""){
									echo $post_content;}
									else
									{ ?>
								<img src="test.png" alt="video">

								<?
								}?>
									
								</div>
								<div class="placa">
										<h3><A HREF="reader.php?id=<?=$ID?>"><?php echo $post_title;?></A></h3>
								</div>
							</li>
						<?
					}
						$i++;
					}
					mysql_close($chandle);
					?>

			</ul>
					
		</div>
		<!-- footer -->	
		<?php include("footer.php");?>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

		<script>
		$(document).ready(function() {
			    var heightDIV = $("#banner_botones").height();
			    //$("#debug").html(heightDIV);
			    if(heightDIV>0) {banner_open();}
		});
		</script>

		<!-- Comscore -->
<? include("/home/eonlinebr/public_html/varios/comscore/index.php");?>
</body>
</html>
