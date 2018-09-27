<?php include("constantes.php");?>
<?php include("functions.php");?>
<?php

$var_url="http://br.eonline.com/";
exit("<script>location.href='".$var_url."';</script>"); 


$c = base64_decode($_GET["c"]);
switch ($c) {

    case "efashionblogger":
        $volver = "E! Fashion Blogger"; 
		$color = "#E29FE0";
$sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.slug = 'efashionblogger' AND wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.term_taxonomy_id =wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID ORDER BY post_date DESC limit 16";
        break;


    case "tapetevermelho":
        $volver = "Tapete Vermelho"; 
		$color = "#FC3C46";
$sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.slug = 'tapetevermelho' AND wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.term_taxonomy_id =wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID ORDER BY post_date DESC limit 16";
        break;

    case "thetrend":
        $volver = "The Trend"; 
		$color = "#FFDC00";
 $sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.slug = 'thetrend' AND wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.term_taxonomy_id =wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID ORDER BY post_date DESC limit 16";
        break;

    case "the-kardashians":
    	$volver = "The Kardashians";
        $color = "#F77D00";

$sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.slug = 'the-kardashians' AND wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.term_taxonomy_id =wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID ORDER BY post_date DESC limit 16";
        break;
}
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
$title_site="E! Online Latino | ".ucfirst(strtolower($ufeed));
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
	<?if ($c=="tapetevermelho") {?>
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Red_Carpet/Banner_1', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-1').addService(googletag.pubads());
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Red_Carpet/Banner_2', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-2').addService(googletag.pubads());
	<?}elseif ($c=="efashionblogger") {?>
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Fashion_Blogger/Banner_1', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-1').addService(googletag.pubads());
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/Fashion_Blogger/Banner_2', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-2').addService(googletag.pubads());
	<?}elseif ($c=="thetrend") {?>
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/The_Trend/Banner_1', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-1').addService(googletag.pubads());
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/The_Trend/Banner_2', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-2').addService(googletag.pubads());
	<?}elseif ($c=="the-kardashians") {?>
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/The_Kardashians/Banner_1', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-1').addService(googletag.pubads());
		googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Category/The_Kardashians/Banner_2', [300, 50], 'div-gpt-ad-<?=$c?>-300x50-2').addService(googletag.pubads());
	<?}?>
	googletag.defineOutOfPageSlot('/8877/<?=$namefeed?>/Mobile/adhesion', 'div-gpt-ad-home-adhesion').addService(googletag.pubads());
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
	</script>
  <!-- DFP -->


<script type="text/javascript">
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setDomainName', 'eonline.com'],
            ['_setAllowLinker', true],
			['_setPageGroup', 3, 'Mobile'],
	        ['_setPageGroup', 4, 'Categoria'],
            ['_trackPageview', '/mobile/<?=$ufeed?>/category']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

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

var activado = "";
function menu_open(){

if (activado != true){
window.scrollTo(0,0);
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");
activado = true;
}
else{
var obj = document.getElementById("new_menu");
obj.style.display = obj.style.display ='none';
window.scrollTo(0,0);
$("body").css("overflow", "auto");
activado = false;
}
}

</script>
<style type="text/css">
h2 {  	
width: 180px;
text-align: left;
}
</style>
</head>


<!-- Para <body onload="banner_open();"> -->
<body>

<div id="div-gpt-ad-home-adhesion">
		<script type="text/javascript">
		googletag.display('div-gpt-ad-home-adhesion');
		</script>
</div>
		
<div id="banner_contenedor" style="display:none;" >
	
	
	<div id="banner_botones">
		<img src="iab2.jpg" alt="banner" width="300" height="250" /> 

	</div>
	<div onclick="banner_close();">
	<h2>Omitir Anuncio</h2>
	</div>


</div>

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
				<h2 style="width:30px;text-align:center;">MENU</h2>
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
			<?php include("menu_volver.php");?>

			<ul class="page">

					<?
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
	<!-- Banner -->
	<!-- <?=$c?> 1 -->
	<div id='div-gpt-ad-<?=$c?>-300x50-1' class="contenedor_banner_home">
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-<?=$c?>-300x50-1');
		</script>
	</div>
<?}?>


<?if ($i == 4) {?>
	<!-- Banner -->
	<!-- <?=$c?> 2 -->
	<div id='div-gpt-ad-<?=$c?>-300x50-2' class="contenedor_banner_home">
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-<?=$c?>-300x50-2');
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
										<h3><A HREF="reader.php?id=<?=$ID?>&f=<?=$feed?>&rnd=<?=rand(0,500);?>"><?php echo $post_title;?></A></h3>
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
										<h3><A HREF="reader.php?id=<?=$ID?>&f=<?=$feed?>&rnd=<?=rand(0,500);?>"><?php echo $post_title;?></A></h3>
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


<!-- Comscore -->
<? include("/home/eonlinebr/public_html/varios/comscore/index.php");?>

</body>
</html>
