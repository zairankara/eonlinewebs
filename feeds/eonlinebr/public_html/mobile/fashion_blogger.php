<?php include("constantes.php");?>
<?php include("functions.php");?>
<? 
$volver = "Red Carpet"; 
$color = "#FC3C46";
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

<script type="text/javascript">

var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', 'UA-18061947-35'],
				['_trackPageview', '/mobile/home/<?=$ufeed?>'],
				['b._setAccount', 'UA-18061947-40'],
				['b._setDomainName', 'eonline.com'],
				['b._setAllowLinker', true],
				['b._trackPageview', '/mobile/home/<?=$ufeed?>']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
                setTimeout(function() { _gaq.push(['b._trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();



  
  </script>
  
    
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

</head>


<!-- Para <body onload="banner_open();"> -->
<body>

<div id="banner_contenedor" style="display:none;" >
	
	
	<div id="banner_botones">
		<img src="iab2.jpg" alt="banner" width="300" height="250" /> 

	</div>
	<div onclick="banner_close();">
	<h2>Omitir Anuncio</h2>
	</div>


</div>

		<div id="headerwrap">
			
			<div id="header">
				<div id="menu_feed">
				<div id="new_menu_boton">
				<h1><?=$name?>  <?=strToUPPER($ufeed);?> </h1>
				</div>
			
			</div>
			</div>
			
		</div>
		

		<div id="contentwrap" style="text-align:center;">

			<?php include("menu_volver.php");?>

			<ul class="page">

					<?
					$sql="SELECT ID, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.slug = 'alfombraroja' AND wp_terms.term_id = wp_term_taxonomy.term_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.term_taxonomy_id =wp_term_taxonomy.term_taxonomy_id AND wp_term_relationships.object_id = wp_posts.ID ORDER BY post_date DESC limit 16";






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

<?
if ($i == 0 || $i==4) {
?>
<!-- Banner 
<div class="contenedor_banner_home">
<img src="iab1.jpg" alt="" class="banner_home">
</div>
-->
<?}?>
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
									<div class="placa">
										<h3><A HREF="reader.php?nota=<?=$ID?>&f=<?=$feed?>&rnd=<?=rand(0,500);?>"><?php echo $post_title;?></A></h3>
									</div>
								</div>
							</li>
						<?
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


</body>
</html>
