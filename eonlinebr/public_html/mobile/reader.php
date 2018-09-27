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
	$var_url="http://br.eonline.com/?p=".$_GET['id'];
	exit("<script>location.href='".$var_url."';</script>");    
}

$var_url="http://br.eonline.com/?p=".$_GET['id'];
exit("<script>location.href='".$var_url."';</script>");  

//valido los gets
if(!is_numeric($_GET['id']))exit("forbiden access");

if ($_GET['m']== 1) echo("<script>alert('a mensagem foi enviada com sucesso!'); </script>");
$urlMail ="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
$sql="SELECT ID, post_name, post_date, post_title, post_modified, post_content, post_status
FROM wp_posts
WHERE post_status='publish' AND post_type='post' AND post_content<>'' AND ID=".$_GET['id']."
ORDER BY post_modified DESC LIMIT 0,1";
$query=mysql_query($sql,$chandle);
$cant=mysql_num_rows($query);
$row=mysql_fetch_array($query);

$ID=$row["ID"];
$post_name =$row["post_name"];
$post_title =utf8_encode($row["post_title"]);
$post_content=utf8_encode($row["post_content"]);
$img_html=strip_tags($post_content, "<img><IMG>");
$img_html=trim(sacar_img_sin_src($img_html));

$dominio_solo=$servername;
$urlShareFB2="?u=".urlencode($dominio_solo);
 
$volver = "Voltar"; 
$color = "#FFF";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xml:lang="es" lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="es"/>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;"/>

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="width">

<? 
$title_site=$post_title;
$description_site="E! Online Mobile | ".ucfirst(strtolower($ufeed));
$default_img=$img_html;
//$default_img = "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg";
?>
<title><?php echo $title_site ?>. Mobile</title>
<meta name="description" content="<?php echo $description_site ?>" />
<meta name="abstract" content="<?php echo $description_site ?>"/>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $title_site ?>. Mobile" />
<meta property="og:url" content="<?php echo $servername?>"/>
<meta property="og:description" content="<?php echo $description_site ?>" />
<meta property="og:image" content="<?php echo $default_img ;?>" />
<meta itemprop="description" content="<?php echo $description_site ?>"/>
<meta itemprop="name" content="<?php echo $title_site ?>"/>
<meta itemprop="image" content="<?php echo $default_img ;?>" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="font-face/font-face.css" media="screen" />
<link rel="shortcut icon" href="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/favicon.ico"/>


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

<script type="text/javascript">
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setDomainName', 'eonline.com'],
            ['_setAllowLinker', true],
            ['_setPageGroup', 3, 'Mobile'],
	        ['_setPageGroup', 4, 'Nota'],
            ['_trackPageview', '/mobile/<?=$ufeed?>/post/<?=$post_name?>']
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>



  <!-- DFP -->
	<!-- <script type='text/javascript'>
	(function() {
	var useSSL = 'https:' == document.location.protocol;
	var src = (useSSL ? 'https:' : 'http:') +
	'//www.googletagservices.com/tag/js/gpt.js';
	document.write('<scr' + 'ipt src="' + src + '"></scr' + 'ipt>');
	})();
	</script>

	<script type='text/javascript'>
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Nota/Banner_1', [300, 50], 'div-gpt-ad-nota-300x50-1').addService(googletag.pubads());
	googletag.defineSlot('/8877/<?=$namefeed?>/Mobile/Nota/Banner_2', [300, 50], 'div-gpt-ad-nota-300x50-2').addService(googletag.pubads());
	googletag.defineOutOfPageSlot('/8877/<?=$namefeed?>/Mobile/adhesion', 'div-gpt-ad-home-adhesion').addService(googletag.pubads());
	googletag.pubads().enableSyncRendering();
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
	</script>-->
  <!-- /DFP -->



<script>



var min=8;
var max=18;
function increaseFontSize() {
	var p = document.getElementsByTagName('p');
	for(i=0;i<p.length;i++){
		if(p[i].style.fontSize) {
			var s = parseInt(p[i].style.fontSize.replace("px",""));
		} else {
			var s = 12;
		}
		if(s!=max) {
			s += 1;
		}
		p[i].style.fontSize = s+"px"
	}
}

function decreaseFontSize() {
	var p = document.getElementsByTagName('p');
	for(i=0;i<p.length;i++){
		if(p[i].style.fontSize) {
			var s = parseInt(p[i].style.fontSize.replace("px",""));
		} else {
			var s = 12;
		}
		if(s!=min) {
			s -= 1;
		}
		p[i].style.fontSize = s+"px"
	} 

}

function addthis(){
window.scrollTo(0,0);
var obj = document.getElementById("share_contenedor");
obj.style.display = obj.style.display ='block';
var obj = document.getElementById("share_botones2");
obj.style.display = obj.style.display ='none';
var obj = document.getElementById("share_botones");
obj.style.display = obj.style.display ='block';
$("body").css("overflow", "hidden");
}

function addthis2(){
window.scrollTo(0,0);
var obj = document.getElementById("share_botones");
obj.style.display = obj.style.display ='none';

var obj = document.getElementById("share_botones2");
obj.style.display = obj.style.display ='block';

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

function validarEmail() {
	var email = document.getElementById("email_addthis").value;
	expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) ){
        alert("Error: La dirección de correo " + email + " es incorrecta.");
   		return false;}
    	else
    	{
    	return true;
		}
}

</script>



<style type="text/css">

	body{background: #EEEBEB;}
	#contentwrap {background-color: #EEEBEB;}

</style>

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>



</head>
<body>
<div id="div-gpt-ad-home-adhesion">
		<script type="text/javascript">
		googletag.display('div-gpt-ad-home-adhesion');
		</script>
</div>

<div id="share_contenedor" style="display:none;" >
	
	<div id="share_cerrar">
		<img src="close_button.png" alt="cerrar" class="imgclose" onclick="addthis_close();"> 
	</div>
	<div id="share_botones" style="display:block;">

		<a target='_blank' href='http://www.facebook.com/sharer.php<?=$urlShareFB3?>'><img src="fb_share.png" alt="facebook"/> </a>
		<a target='_blank' href='http://mobile.twitter.com/home?status=<?=$dominio_solo?>'><img src="tw_share.png" alt="twitter"/></a>
		<a target='_blank' onclick="addthis2();" ><img src="e_share.png" alt="E-mail" /></a>
	</div>

	<div id="share_botones2" style="display:none;">

		<form name="input" action="email_process.php" method="post" onsubmit="return validarEmail();">

			<input type="hidden" name="url_mail" value="<?php echo($urlMail);?>">
			<h2 style="color:white;">digite aqui o endere&ccedil;o de Email</h2><br/>
			<input type="text" name="email_addthis" id="email_addthis" value="" style="width:90%;"><br/><br/>
			<input type="submit" name="enviar" value="Enviar" class="boton">  

		</form>
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

									<div class="item0" onclick="location.href='categoria.php?f=<?=$_GET['f']?>&c=<?php echo(base64_encode("wakeup"));?>';">
									<div class="item">
									Wake Up
									</div>
								</div>


				</div>
				<!-- // MENU DESPLEGABLE -->

					<?php include("menu_volver.php");?>


					<?

						$video=mostrar_video($post_content);
						//if($_GET["abz"]==1) echo ("1616--".$video);

						$post_content=strip_tags($post_content, '<img><span><p>');


						// IMG POST
						$Html = $post_content;

						//exit("<br>".$Html);
						$extrae = '/<img (.+?)>/';
						$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

					    // Extraemos todas las imágenes
					    preg_match_all( $extrae  , $Html , $matches );
						$image = $matches[1][0];

						preg_match_all( $extrae2 , $Html , $matches2 );
						$image2 = $matches2[1][0];
						//print_r($matches2);

						preg_match_all('/<img[^>]+>/i',$Html, $result); 

						$img = array();
						foreach( $result as $img_tag)
						{
						    preg_match_all('/(alt|title|src)=("[^"]*")/i',$img_tag, $img[$img_tag]);

						}

						$img_post = $img_tag[0];


						$Html = str_replace('/caption]', '/caption>', $Html);
						$Html = str_replace('caption]', 'caption>', $Html);
						$Html = str_replace('[caption', '<caption', $Html);
						$Html = str_replace('[/caption', '</caption', $Html);

						$var_html = $Html;
						$var_html1=str_replace("[scrollGallery id=", "[",$var_html);
						$var_html2=str_replace(" start=5 autoScroll=false", "]",$var_html1);
						$xplode=explode("[", $var_html2);
						$xplode2 = explode("]", $xplode[1]);
						$id_gallery = $xplode2[0];
						$var_html2=str_replace($id_gallery, "",$var_html2);
						$var_html2=str_replace("[]", "",$var_html2);
						//echo($var_html2);
				
				    	$patron = '/<caption (.+?)>/'; 
				        $extracto = '';
				        if (preg_match($patron, $Html, $extracto1)) 
				        { 
				            $extracto_caption = $extracto1[1];
				        } 
						
						$rest = substr($var_html2, 1705, 6);
						
				        $var_html2=str_replace(" thumbsdown=true]", "",$var_html2);
						$var_html2=str_replace($rest,"",$var_html2);
						$var_html2=str_replace("brightcove.createExperiences();","",$var_html2);
									

						if($row["post_modified"]>$row["post_date"]){
							$fecha=$row["post_modified"];
						}else{
							$fecha=$row["post_date"];
						}

						if($row["post_modified"]>$row["post_date"]){
							$fecha=$row["post_modified"];
						}else{
							$fecha=$row["post_date"];
						}

						?>


						<div class="reader_block">
							<div class="titulo">
								<h3><?php echo $post_title;?></h3>
								<div style="color:grey;"><?php echo $fecha;?></div>
							</div>
							<!-- Banner
								<div class="contenedor_banner_home">
								<img src="iab1.jpg" alt="" class="banner_home">
								</div> -->

								<!-- Banner-->
								<!-- <div class="contenedor_banner_home">
									<div id='div-gpt-ad-nota-300x50-1' style='width:300px; height:50px; margin-left:10px;'>
										<script type='text/javascript'>
										googletag.display('div-gpt-ad-nota-300x50-1');
										</script>
									</div>
								</div> -->
							<div style="margin:10px;">
							<a href="javascript:decreaseFontSize();" style="text-decoration:none;color:black;font-size:16px;">A-</a> 
							<a href="javascript:increaseFontSize();" style="text-decoration:none;color:black;font-size:16px;">A+</a>
							</div>

							<?php 
							if($video!="") echo $video;
							echo ("<br/>".$var_html2);
							?>

						</div>
			
					<!-- Banner-->
					<!--<div class="contenedor_banner_home">
						<div id='div-gpt-ad-nota-300x50-2' style='width:300px; height:50px; margin-left:10px;'>
							<script type='text/javascript'>
							googletag.display('div-gpt-ad-nota-300x50-2');
							</script>
						</div>
					</div>--> 
					
					<div style="margin:15px 0 15px 5px;">
						<?include("app.php");?>
					</div>

					<div style="text-align:center;margin-top:20px; margin-bottom:20px;">
						<img src="button_share2.png" width="58" height="32" onclick="addthis();" style="cursor:pointer;">
					</div>



					<!-- GALERIAS SOLO SI TIENE -->
					<?
					$cadena = $Html;
					$buscar = "[scrollGallery id=";
					$resultado = strpos($cadena, $buscar);

					if($resultado !== FALSE){?>

								<div class="related-stories-heading" ><div class="related-stories-heading_title">Galer&iacute;a</div></div>

								<div class="galery_1">
									<?
										$var_html = $Html;

										
										$var_html1=str_replace("[scrollGallery id=", "[",$var_html);
										$var_html2=str_replace(" start=5 autoScroll=false", "]",$var_html1);
										//echo($var_html2);

										$xplode=explode("[", $var_html2);
										$xplode2 = explode("]", $xplode[1]);
										$id_gallery = $xplode2[0];

										$sql="select * from wp_ngg_pictures where galleryid = ".$id_gallery." limit 3";
										$query=mysql_query($sql,$chandle);
										$cant=mysql_num_rows($query);
										$i=0;

										while($row=mysql_fetch_array($query))
									{?>
										<div class="img1">
										
										<a href="gallery.php?f=<? echo($feed); ?>&gallery=<? echo($id_gallery);?>"><img src="<? echo ($row[filename]);?>"></a>
										</div>
									<?
									}
									
									?>
								</div>


					<?}?>

					<!-- NOTAS RELACIONADAS-->
					<div class="related-stories-heading" ><div class="related-stories-heading_title">Notícias Relacionadas</div></div>

					<?
					$vector = array();
					//query para traer los tags del post
					$consulta = "SELECT DISTINCT wp_terms.name FROM wp_term_taxonomy
								LEFT OUTER JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id
								RIGHT OUTER JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
								RIGHT OUTER JOIN wp_posts ON wp_posts.ID = wp_term_relationships.object_id
								LEFT OUTER JOIN wp_users ON wp_users.ID = wp_posts.post_author
								WHERE (
								wp_term_taxonomy.taxonomy =  'post_tag'
								) AND (
								wp_posts.post_type =  'post'
								) AND (
								wp_posts.post_status =  'publish'
								) AND (
								wp_posts.ID ='".$_GET['id']."'
								)
								ORDER BY  wp_terms.name ASC LIMIT 5";
								$consulta = mysql_query($consulta);
								 

								$cont =0;
								while ($fila=mysql_fetch_array($consulta)) {
										$vector[] = utf8_encode($fila["name"]);
								}
						
						

									$sql1="SELECT DISTINCT wp_posts.ID, wp_posts.post_title, wp_posts.post_date, wp_terms.name
									FROM wp_term_taxonomy
									LEFT OUTER JOIN wp_terms ON wp_terms.term_id = wp_term_taxonomy.term_id
									RIGHT OUTER JOIN wp_term_relationships ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
									RIGHT OUTER JOIN wp_posts ON wp_posts.ID = wp_term_relationships.object_id
									
									WHERE (
									wp_term_taxonomy.taxonomy =  'post_tag'
									) AND (
									wp_posts.post_type =  'post'
									) AND (
									wp_posts.post_status =  'publish'
									) AND (
									wp_posts.ID <>'".$_GET['id']."'
									)AND ((
									wp_terms.name =  '".$vector[0]."'
									) OR (
									wp_terms.name =  '".$vector[1]."'
									) OR (
									wp_terms.name =  '".$vector[2]."'
									) OR (
									wp_terms.name =  '".$vector[3]."'
									) OR (
									wp_terms.name =  '".$vector[4]."'
									))
									ORDER BY wp_posts.post_date DESC 
									LIMIT 0 , 50";

								
									$vector2 = array();
									$query1=mysql_query($sql1);
									while ($row=mysql_fetch_array($query1)) {
									$vector2[] = $row["ID"];
									$activado = false;

									$max = sizeof($vector2);
									for ($i=0; $i<$max; $i++) {
									
									
						    		if ($vector2[$i-1] == $row["ID"])$activado = true;
						    		
						    		}


						    		if ($activado != true && $cont <5){
									?>
									<div class="related-stories-heading2">
											<div class="imagen"><IMG SRC="arrow_relatedArticles.png" alt=""/></div>
											<div class="texto">
												<a href="<?=$ruta_mobile?>reader.php?f=2&id=<?php echo($row['ID']);?>" rel="bookmark" title="Enlace permanente a" style="text-decoration:none;">
												<?php echo($row["post_title"]); ?>
												</a>
											</div>
										</div>
									<?
									$cont++;
									}
					
									
									}
								mysql_close($chandle);	
								
								?>

					     
				      		

		</div>
		

		<div id="infoblock">
		
			<h2><A HREF="<?=$ruta_mobile?>parser.php?f=<?=$_GET['f']?>" style="color:#fff;">Home</A></h2>
			
		</div>

		<!-- footer -->	
		<?php include("footer.php");?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>

<!-- Comscore -->
<? include("/home/eonlinebr/public_html/varios/comscore/index.php");?>

</body>
</html>
