<?php
// MOBILE 
if(is_single() || is_page( ) || is_attachment()){
	$id_post="reader.php?f=1&id=".get_the_ID();
}else{
	$id_post="parser.php?f=1";
}

$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=false;
 
if(strpos($agent, "iPhone")!== FALSE){
	$mobile=true;
}elseif(strpos($agent, "Android")!== FALSE){
	$mobile=true;
}elseif(strpos($agent, "BlackBerry")!== FALSE){
	$mobile=true;
}
if($_GET["abz"]==1){
	echo ("<br>mobile".$mobile);
	exit ("<br>agent".$agent);
}


if($mobile==true){
	
	header('Location:http://la.eonline.com/mobile/'.$id_post);
    exit;  
}

// CAMBIO LA COOKIE
	if($_POST["flag"]==1){
		$cual=$_POST["cual"];
		if($cual!="99") setcookie("ubicacion","$cual",time()+365*24*60*60);
		switch($cual){
			case "1":header('Location:http://la.eonline.com/andes/');break;
			case "2":header('Location:http://la.eonline.com/argentina/');break;
			case "3":header('Location:http://la.eonline.com/mexico/');break;
			case "4":header('Location:http://la.eonline.com/venezuela/');break;
			case "99":header('Location:http://br.eonline.com/');break;
		}
	}


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
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

?></title>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Keywords" content="Eonlinelatino, E! latino, E!, estrenos, gente e, latinoamerica, programacion, 100%latino, eonline, alfombra roja, galerias, foros, fotos gente, espectaculo, noticias, e! news, concursos, vota por, esta noche, e! entertainment latinoamerica, contactos, chica e!, daniela kosan, lo mas e!" />
<meta name="author" content="http://www.abzcomunicacion.com">
<meta name="identifier-url" content="http://www.eonlinelatinola.com/">
<meta name="Language" content="Spanish">
<meta name="Distribution" content="Global">
<meta name="revisit-after" content="1 day">
<meta name="Category" content="entertainment">
<link rel="shortcut icon" href="http://la.eonline.com/andes/wp-content/themes/E-online/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com">

<!-- GOOGLE PLUS -->
<!-- Update your html tag to include the itemscope and itemtype attributes -->
<html itemscope itemtype="http://schema.org/Organization">

<!-- FACEBOOK OPENGRAPH -->
<?php
// Recuperamos el post
$post_id = get_post();
$Html = $post_id->post_content; 

// Extraemos todas las imagenes
$extrae = '/<img .*src=["\']([^ ^"^\']*)["\']/';

// Extraemos todas las imágenes
$Html = str_replace("SRC", "src", $Html);
$Html = str_replace("IMG", "img", $Html);

preg_match_all($extrae, $Html , $matches );
// donde
// [1] -> segundo elemento del array "texto/imagenes"
// [0] -> primera imagen del array de "imagenes"
$image = $matches[1][0];
if($image)
{
   $thumb=$image;
}


$default_img = "http://profile.ak.fbcdn.net/hprofile-ak-snc4/hs326.snc4/41590_116264915095072_5267_n.jpg";

if(is_single() || is_page()) { ?>
	<meta property="og:type" content="article" />
	<meta itemprop="name" content="<?php single_post_title('');?>"/>
	<meta property="og:title" content="<?php single_post_title('');?>" />
	<meta property="og:description" content="<?php
		while(have_posts()):the_post();
			$out_excerpt = strip_tags(str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt()));
			echo apply_filters('the_excerpt_rss', $out_excerpt);
		endwhile; ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<meta property="og:image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />
	<meta itemprop="image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />
<?php } else { ?>
	<meta property="og:type" content="article" />
	<meta itemprop="name" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
	<meta name="Description" content="<?php bloginfo('description'); ?>">
	<meta name="Abstract" content="<?php bloginfo('description'); ?>">
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta itemprop="description" content="<?php bloginfo('description'); ?>"/>
	<meta property="og:image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />
	<meta itemprop="image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />

<?php } ?>
<!-- FACEBOOK OPENGRAPH -->

<!-- G.A. -->
<script type="text/javascript">
var _gaq = _gaq || [];
                _gaq.push(
        ['_setAccount', 'UA-18061947-5'],
        ['_trackPageview'],
        ['b._setAccount', 'UA-18061947-40'],
        ['b._setDomainName', 'eonline.com'],
        ['b._setAllowLinker', true],
        ['b._trackPageview']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
                setTimeout(function() { _gaq.push(['b._trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>

<!-- JS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
 <!-- SCROLL -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/scroll/scroll.css" />
<script type="text/javascript" src="<?php bloginfo('template_url')?>/scroll/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/scroll/jquery.jscrollpane.min.js"></script>
<!-- /SCROLL -->
<script type="text/javascript" id="sourcecode">
	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
</script>


 <!-- ADSERVER -->
<script type='text/javascript' src='http://adsrv01.eonlinelatinola.com/www/delivery/spcjs.php?id=3'></script>


 <!-- LIGHTBOX -->
<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<!-- VIDEO KKTNY -->
<script type="text/javascript">
/*jQuery(document).ready(function() {
	$.fancybox(
		'<div><IMG SRC="http://la.eonline.com/andes/wp-content/themes/E-online/images/comunes/kourtneyTNY.gif" whidth="480" height="52" BORDER="0" ALT=""></div><div style="margin-top:5px;"><div style="display:none"></div><object id="myExperience1537343383001" class="BrightcoveExperience"><param name="bgcolor" value="#FFFFFF" /><param name="width" value="480" /><param name="height" value="270" /><param name="playerID" value="773795205001" /><param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWPZRpAgEIVYABg4ulQxTkb-" /><param name="isVid" value="true" /><param name="isUI" value="true" /><param name="dynamicStreaming" value="true" /><param name="@videoPlayer" value="1537343383001" /></object></div>',{
        	'autoDimensions'	: false,
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'width'         : 500,
			'height'        : 380
		}
	);
});*/
</script>
<script type="text/javascript">brightcove.createExperiences();</script>
<!-- / LIGHTBOX -->  

<!-- STYLES -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
if (( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" )  ||  in_category( "latinbillboard" )) && ! is_home() )
{
$cat_alf=1;
}
if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )  ||  is_category( "baftaawards" )  ||  is_category( "latinbillboard" )  ||  $cat_alf==1)
{
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_alfombra.css" />
<?php }  elseif ( is_category( "estrenos" ) || ( in_category( "estrenos" )==1 && ! is_home() &&  is_single())) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_estrenos.css" />
<?php }  elseif ( is_page( "programas" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_programacion.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/programacion/css/programacion.css" />
<?php }  elseif ( is_category( "enews" ) || ( in_category( "enews" )==1 && ! is_home() &&  is_single()) ) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_enews.css" />
<?php }  elseif ( is_category( "zonae" ) || ( in_category( "zonae" )==1 && ! is_home()  &&  is_single())) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_zonae.css" />
<?php }  elseif ( is_category( "efashionblogger" ) || ( in_category( "efashionblogger" )==1 && ! is_home()  &&  is_single())) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_efashionblogger.css" />
<?php }  elseif ( is_page( "fotos" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_fotos.css" />
<?php }  elseif ( is_page( "videos-2" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_videos.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( "glam" ) || is_page( ) || is_attachment()) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_generico.css" />
<?php }  else {
}  
if( in_category( "enews" )==1 && in_category( "zonae" )==1){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_generico.css" />
<?}
if( is_category( "royal_wedding") || ( in_category( "royal_wedding" )==1 && ! is_home()  &&  is_single())){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_royal.css" />
<?}
if( is_category( "kim_wedding") || ( in_category( "kim_wedding" )==1 && ! is_home()  &&  is_single())){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_kim.css" />
<?}
if( is_category( "cine_by_john_paul") || ( in_category( "cine_by_john_paul" )==1 && ! is_home()  &&  is_single())){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_cine_by_john_paul.css" />
<?}
if( is_tag( "olimpiadas") && ! is_home() ){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_londres2012.css" />
<?}
if(is_category( "latinbillboard") && ! is_home()){?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_latin.css" />
<?}?>

<!-- / STYLES -->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?  
//Elimina las Metadescripciones Duplicadas 
if(is_category()||is_tag()) 
{ 
 $categoria = single_cat_title('', FALSE); 
 $paginacion = get_query_var('paged'); 
 $descripcion = '<meta name="description" content="Todos los artículos sobre '.$categoria.''; 

 if($paginacion!=0) 
  $descripcion .= ' Página '.$paginacion.''; 

 $descripcion .= '" />'; 

 echo $descripcion; 
} 
?>


<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>

<SCRIPT language="JavaScript">
function tremer(n) {
   if (parent.moveBy) {
      for (i = 10; i > 0; i--) {
         for (j = n; j > 0; j--) {
            parent.moveBy(0,i);
            parent.moveBy(i,0);
            parent.moveBy(0,-i);
            parent.moveBy(-i,0);
            }
         }
      }
}
</SCRIPT> 


<script src="<?php bloginfo('template_url')?>/scripts/trace.js" type="text/javascript"></script>
<script src="http://admin.brightcove.com/js/APIModules_all.js"> </script> 
<script type="text/javascript">

var player;
function onTemplateLoaded(id) {
  player = brightcove.getExperience(id);
  player.getModule(APIModules.EXPERIENCE).addEventListener(BCExperienceEvent.TEMPLATE_READY, onTemplateReady);
}
function onTemplateReady(event) {
  player.getModule(APIModules.EXPERIENCE).removeEventListener(BCExperienceEvent.TEMPLATE_READY, onTemplateReady);
  //player.getModule(APIModules.VIDEO_PLAYER).mute();
}
</script>





<!-- SKITTER -->
<link rel='stylesheet' id='skitter.styles-css'  href='http://la.eonline.com/admin2012/banners/css/skitter.styles.css?ver=3.3.1' type='text/css' media='all' />
<script type='text/javascript' src='http://la.eonline.com/admin2012/banners/js/jquery.skitter.min.js?ver=3.3.1'></script> 
<script type='text/javascript' src='http://la.eonline.com/admin2012/banners/js/jquery.animate-colors-min.js?ver=3.3.1'></script>
<script type='text/javascript' src='http://la.eonline.com/admin2012/banners/js/jquery.easing.1.3.js?ver=3.3.1'></script>
<script type="text/javascript">
					$(document).ready(function() {
						jQuery('#wp_skitter').skitter({
							animation: "fadeFour",
							interval: 4000,
							navigation: true,
							label: true,
							numbers: false,
							hideTools: false,
							fullscreen: false,
							show_randomly: false,
							numbers_align: "left",
							enable_navigation_keys: false,
							controls: false,
							focus: false,
							preview: false	});
					});
</script>
<!-- / SKITTER -->

 <!--/* ENCUESTA ONLINE */-->
<!--<script src="http://static.ecglobal.com/survey/scripts/jquery-1.7.2.min.js"></script>-->

 <!--/* CODIGO NUEVO  */-->
<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script>
<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script>
 <!--/* CODIGO NUEVO  */-->

 <!--/* ENCUESTA FANCY */-->
	<script type="text/javascript" >
		/*$(document).ready(function(){
		 $("#autostart").fancybox({
		  'width': 1000,  
		  'height': 600,
		 'type': 'iframe' 
		 });

		$('#autostart').trigger('click');

		}); // document ready*/
	</script>
<!--/* ENCUESTA FANCY */-->

</head>

<?php flush(); ?>

<body <?php body_class(); ?>>
 
<!--/* ENCUESTA FANCY */-->
	 <!--<a href="http://author.euro.confirmit.com/eqt/extwix/extquicktest_p1049384546.aspx?__qtkey=96363d99dae04ecf9860ccdb251b080e&l=10" id="autostart"></a>-->
 <!--/* ENCUESTA FANCY */-->

<!--/* ENCUESTA OBSOLETA */-->
<!--
<div id="popup_86718675543" style="background:#FFF url(http://static.ecglobal.com/survey/websitevisitors/E_Logo_3D.png) left no-repeat; width:500px; height: 184px; position:absolute; float:left; border:#999999 3px double; border-radius:0.5em; padding:5px; padding-left:60px; left:30%; text-align: justify;font-size: 13px;top:20%; font-family:&#39;Helvetica Neue&#39;,Arial,Helvetica,&#39;Nimbus Sans L&#39;,sans-serif; display:none; z-index:999" >
<div><img id="exit" style="cursor:pointer;" align="right" src="http://static.ecglobal.com/survey/websitevisitors/bt_fechar_xp.gif"></div>
	<p align="center">Bienvenido al sitio <b>E! Entertainment</b></p>
 
    <p style="">Con el fin de conocerte aún más, queremos invitarte a responder una breve encuesta que no lleva más de 15 minutos. Además, por el simple hecho de contestarla participas en la rifa de un <b>iPad!</b> Agradecemos enormemente tu tiempo. Ten por seguro que tus respuestas nos ayudarán a crear el sitio ideal para ti.</p>
    
    <p>Haga <a id="surveyLink" target="_blank" href="">haz click aquí</a> para empezar!</p>
     
    <p>Gracias</p>
</div>
-->

<script>
document.getElementById("exit").onclick = function (){ document.getElementById("popup_86718675543").style.display ="none"}; 
 $.getJSON("http://smart-ip.net/geoip-json?callback=?",
        function(data){
            if (data.countryName=="Colombia" || data.countryName=="Brazil" || data.countryName=="Mexico" || data.countryName=="Venezuela" || data.countryName=="Argentina"){
            data.countryName=="Brazil" ? lCode='1046': lCode=10;
            ecGlobal.readCookie('SurveyAccessed')!="1" ? document.getElementById("popup_86718675543").style.display="" :"";
            document.getElementById('surveyLink').href='http://esurvey.ecglobalpanel.com/wix/p969359497.aspx?l='+lCode+'&country='+data.countryName;
}
            
        }
    ); 

document.getElementById("surveyLink").onclick = function (){
  ecGlobal.createCookie('SurveyAccessed','1',30);
  document.getElementById("popup_86718675543").style.display ="none";
}
</script>
 <!--/* ENCUESTA ONLINE */-->



 <!--/* OpenX Floating */-->
<div style="display:block; z-index:1000; ">
<script type='text/javascript'><!--//<![CDATA[
   var ox_u = 'http://adsrv01.eonlinelatinola.com/www/delivery/al.php?zoneid=104&target=_blank&cb=INSERT_RANDOM_NUMBER_HERE&layerstyle=simple&align=center&valign=middle&padding=0&closetime=20&padding=0&shifth=0&shiftv=0&closebutton=t&nobg=t&noborder=t';
   if (document.context) ox_u += '&context=' + escape(document.context);
   document.write("<scr"+"ipt type='text/javascript' src='" + ox_u + "'></scr"+"ipt>");
//]]>--></script>
</div>
<!--/* OpenX Floating */-->




 <div id="wrapper" class="hfeed">
	<!-- HEADER -->
	<div id="header">
		
		<!-- Links superiores, Buscador y Banners -->
		<div id="cont_search_banners">
			<div id="buscador_top">
			<ul id="menu_top">
				<li><a href="http://la.eonline.com/andes/index.php">Inicio</a> | </li>
				<li><a href="http://la.eonline.com/andes/contacto/">Contacto</a> | </li>
				<li><a href="feed/"><img src="<?php bloginfo('template_url')?>/images/comunes/ico_RSS.gif" alt="" width="23" height="17" border="0">Contenido RSS</a> | </li>
				<li><a href="http://www.facebook.com/pages/E-Online-Latino/116264915095072?ref=sgm" target="_blank">Síguenos en<img src="<?php bloginfo('template_url')?>/images/comunes/ico_facebook.gif" alt="" width="22" height="22" border="0"></a> | </li>
				<li><a href="http://twitter.com/EonlineLatino" target="_blank">Síguenos en<img src="<?php bloginfo('template_url')?>/images/comunes/ico_twitter.gif" alt="" width="22" height="22" border="0"></a></li>
			</ul>
			<?php get_search_form(); ?>
			<br clear="all" />
			</div>
			<div id="cont_banners_top">
				<div id="banner_top_242x90">
						<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
										<div id="third" class="widget-area">
											<ul class="xoxo">
												<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
											</ul>
										</div><!-- #third .widget-area -->
						<?php endif; ?>
				</div>

				<div id="banner_top_720x90">
					<?php
					 if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
									<div id="fourth" class="widget-area">
										<ul class="xoxo">
											<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
										</ul>
									</div><!-- #fourth .widget-area -->
					<?php endif; ?>
				</div>
				<br clear="all" />
			</div>
			<div id="paises">
							 <form method="post" name="buscador" action="<?=$_SERVER["REQUEST_URI"]?>">
							Selecciona tu país 
							<select name="cual" style="font: 11px/13px Arial, Tahoma, Verdana, Helvetica, Sans-serif;" onChange="document.forms.buscador.submit();">
							<option value="" selected>Selecciona tu país</option>
							<?php
							$mydb = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
							$mydb->show_errors();
							$carreras=$mydb-> get_results("SELECT id_beam, name_str FROM sched_country ORDER by name_str ASC");
								foreach ($carreras as $obj) :
											$id_beam=$obj->id_beam;
											$name_str=$obj->name_str;
											?>
											<option value="<?=$id_beam?>"><?=$name_str?></option>
								<?endforeach;
							?>
							</select>
							 <input type="hidden" name="flag" value="1">
							</form>
			</div>
		</div>
		<!-- / Links superiores, Buscador y Banners -->
		
		<!-- CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		<div id="masthead">
			<!-- MENU -->
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div>
			<!-- / MENU -->
			<!-- CABEZAL SECCION -->
			<?php
			if ( !is_home() )
			{
			?>
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<!-- Imagen Seccion -->
				<div id="cab_seccion"></div>
				<!-- / Imagen Seccion -->
			<?php }  else { ?>
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<!-- Destacados -->
				<div id="destacados_H">
					<div id="wp_skitter" class="box_skitter">
					<ul>
					<?
					function fecha (){
						$vect=getdate();
						$vect_dia=array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");
						return $vect_dia[$vect[wday]];
					}

					$dia_semana= fecha();
					
					$dbhost="preprodabzdb";
					$dbname="eonline_argentina";
					$dbuser="eonline_usr";
					$dbpass="30nl1n3";

					$wpdbtest_otherdb = new wpdb($dbuser, $dbpass, $dbname, $dbhost);
					$wpdbtest_otherdb->show_errors();

					$id_beam="1";

					//buscar los datos del beam
					$tz_beam =$wpdbtest_otherdb->get_var( "SELECT tz_str FROM sched_beam where id_beam = ".$id_beam);

					//crear un ts para la hora de inicio del beam
					date_default_timezone_set($tz_beam);

					$sqlstr="SELECT *
					FROM abmBanners
					WHERE id_feed=1  AND activo=1 AND newdesign=0 AND ( dia=CURDATE() OR ".$dia_semana."=1) ORDER by fecha DESC";

					$testRows = $wpdbtest_otherdb->get_results($sqlstr);
					foreach ($testRows as $row) {
						
						$id_banner =$row->id;
						$id_feed =	$row->id_feed;
						$link	=	$row->link;
						$texto	=	utf8_decode($row->texto);
						$target	=	$row->target;


						?><li><a href="<?=$link?>" target="<?=$target?>"><img src="http://la.eonline.com/admin2012/banners/uploads/<?=$id_banner?>.jpg"  /></a>
						<div class="label_text"><p><?=$texto?></p></div>
						</li><?

					}
					?>
					</ul>
					
					</div>
					
				</div>
				<!-- / Destacados -->
				<!-- Programacion -->
				<div id="programacion_H">
				  	<!-- <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="297" height="217" id="prog" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="wmode" value="transparent" />
					<param name="movie" value="<?php bloginfo('template_url')?>/images/swf/prog.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000033" /><embed src="<?php bloginfo('template_url')?>/images/swf/prog.swf" quality="high" bgcolor="#000033" wmode="transparent" width="297" height="217" name="prog" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>-->

					<!-- NUEVOS PROGRAMACION -->
					<div class="papel">
						<div class="scroll-pane">
							<?php include("wp-content/themes/E-online/clsNew2012.php"); ?>		
						</div >
					</div >
				</div>
				<!-- / Programacion -->
			<?php }  ?>
			</div>
			<!-- / CABEZAL SECCION -->
		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		
	</div>
	<!-- / HEADER -->

	<div id="main">
