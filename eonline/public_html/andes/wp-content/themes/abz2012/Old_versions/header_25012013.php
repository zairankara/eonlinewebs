<?php
include(TEMPLATEPATH."/var_constantes.php");

// MOBILE 
	if(is_single() || is_page( ) || is_attachment()){
		$id_post="reader.php?f=".$var_con[0]."&id=".get_the_ID();
	}else{
		$id_post="parser.php?f=".$var_con[0]."";
	}

	$agent = $_SERVER['HTTP_USER_AGENT'];  
	$mobile=0;
	 
	if(strpos($agent, "iPhone")!== FALSE){
		$mobile=1;
	}elseif(strpos($agent, "Android")!== FALSE){
		$mobile=1;
	}elseif(strpos($agent, "BlackBerry")!== FALSE){
		$mobile=1;
	}

	if(is_page("galerias") && $mobile==1){
		header("Location:http://la.eonline.com/mobile/gallery.php?f=".$var_con[0]."&gallery=".$_GET["gallery"]);
	    exit();  
	}elseif($mobile==1){
		header('Location:http://la.eonline.com/mobile/'.$id_post);
	    exit;  
	}

// CAMBIO LA COOKIE
	if($_POST["flag"]==1){
		$cual=$_POST["cual"];
		if($cual!="99") setcookie("ubicacion","$cual",time()+365*24*60*60);
		switch($cual){
			case "1":header('Location:/andes/');break;
			case "2":header('Location:/argentina/');break;
			case "3":header('Location:/mexico/');break;
			case "4":header('Location:/venezuela/');break;
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
<html <?php language_attributes(); ?> >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
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

<meta name="author" content="http://www.abzcomunicacion.com" />
<meta name="identifier-url" content="http://www.eonlinelatinola.com/" />
<meta name="Language" content="Spanish" />
<meta name="Distribution" content="Global" />
<meta name="revisit-after" content="1 day" />
<meta name="Category" content="entertainment" />
<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com" />

<!-- GOOGLE PLUS -->
<!-- Update your html tag to include the itemscope and itemtype attributes -->
<html itemscope itemtype="http://schema.org/Organization" >

<!-- FACEBOOK OPENGRAPH -->
		<?php
		if(is_single()){

			// Recuperamos el post
			global $wp_query;
		 	$thePostID = $wp_query->post->ID;
			$post_id = get_post($thePostID);
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
		}
		$default_img = "http://la.eoline.com/andes/wp-content/themes/abz2012/images/generica_blanca.jpg";

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
			<meta name="Description" content="<?php bloginfo('description'); ?>"/>
			<meta name="Abstract" content="<?php bloginfo('description'); ?>"/>
			<meta property="og:description" content="<?php bloginfo('description'); ?>" />
			<meta itemprop="description" content="<?php bloginfo('description'); ?>"/>
			<meta property="og:image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />
			<meta itemprop="image" content="<?php  if ( $thumb == "" ) { echo $default_img; } else { echo $thumb; } ?>" />

		<?php } ?>
<!-- FACEBOOK OPENGRAPH -->

<!-- STYLES -->

		<!-- FONT-FACE -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/font-face/font-face.css" />
		<!-- / FONT-FACE -->


		<!--CSS CYCLE-->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/cycle-slider/cycle.css" />

		<?
		if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
		if ( is_category( "alfombraroja" )) $cat_alf2=1;
		if ( is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )   ||  is_category( "baftaawards" ) ||  is_category( "latinbillboard" )) $cat_alf3=1;
		?>

		<!-- STYLES -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php
		if ($cat_alf2==1){?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_alfombra.css" />
		<?php }  elseif (is_category( "enews" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_enews.css" />
		<?php }  elseif (is_category( "goldenglobe" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_golden.css" />
		<?php }  elseif (is_category( "sag" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_sag.css" />
		<?php }  elseif (is_category( "grammy" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_grammy.css" />
		<?php }  elseif (is_category( "oscar" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_oscar.css" />
		<?php }  elseif (is_category( "emmy" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_emmy.css" />
		<?php }  elseif (is_category( "latinbillboard" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_latin.css" />
		<?php }  elseif ( is_page( "programas" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/programacion/css/programacion.css" />
		<?php }  elseif ( is_page( "fotos" )  || is_page( "galerias" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_fotos.css" />
		<?php }  elseif ( is_category( "efashionblogger" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_micaela.css" />
		<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_cine_by_dos_equis.css" />
		<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
			<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
		<?}?>



		<!-- STYLES COLORES CATEGORIAS-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/colores.css" />
		<!-- / STYLES -->

<!-- / STYLES -->


<!-- G.A. -->
<script type="text/javascript">
	var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', '<?=$var_con[2]?>'],
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

<!-- JS -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


<?if( is_page("eshows") ):?>
	<!-- TOOLTIP TEXT ESHOWS THUMB-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/da-thumb/css/style.css" />
	<noscript>
		<style>
			.da-thumbs li a div {
				top: 0px;
				left: -100%;
				-webkit-transition: all 0.3s ease;
				-moz-transition: all 0.3s ease-in-out;
				-o-transition: all 0.3s ease-in-out;
				-ms-transition: all 0.3s ease-in-out;
				transition: all 0.3s ease-in-out;
			}
			.da-thumbs li a:hover div{
				left: 0px;
			}
		</style>
	</noscript>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/da-thumb/js/jquery.hoverdir.js"></script>
	
	<script type="text/javascript">
		$(function() {
		
			$('#da-thumbs > li').hoverdir();

		});

	</script>
<?php endif; ?>
	

<?if( is_page("galerias") ):?>
	<link rel="stylesheet" href="<?php bloginfo('template_url')?>/paginator/css/jPages.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url')?>/paginator/css/animate.css">

    <script type="text/javascript" src="<?php bloginfo('template_url')?>/paginator/js/highlight.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url')?>/paginator/js/tabifier.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url')?>/paginator/js/js.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url')?>/paginator/js/jPages.js"></script>
 
	<script>
	    /* when document is ready */
	    $(function(){
	    
	        /* initiate the plugin */
	        $("div.holder").jPages({
	            containerID  : "itemContainer",
	            perPage      : 9,
	            startPage    : 1,
	            startRange   : 1,
	            midRange     : 5,
	            endRange     : 1,
		        previous    : "anterior",
		        next        : "próximo",
		        scrollBrowse   : true,
		        keyBrowse   : true
	        });	    
	    });
	</script>

    <style type="text/css">
        .holder {
        	float: left;
        	clear: both;
    		margin: 15px 0;
    	}
    
    	.holder a {
    		font-size: 12px;
    		cursor: pointer;
    		margin: 0 5px;
    		color: #333;
    	}
    
    	.holder a:hover {
    		background-color: #222;
    		color: #fff;
    	}
    
    	.holder a.jp-previous { margin-right: 15px; }
    	.holder a.jp-next { margin-left: 15px; }
    
    	.holder a.jp-current, a.jp-current:hover { 
    		color: #FF4242;
    		font-weight: bold;
    	}
    
    	.holder a.jp-disabled, a.jp-disabled:hover {
    		color: #bbb;
    	}
    
    	.holder a.jp-current, a.jp-current:hover,
    	.holder a.jp-disabled, a.jp-disabled:hover {
    		cursor: default; 
    		background: none;
    	}
    
    	.holder span { margin: 0 5px; }
    	.codeBlocks {display: none;}
	</style>
<?php endif; ?>


 <!-- SLIDER -->
<link rel="stylesheet" href="http://la.eonline.com/admin2012/banners/slider/global_2012.css"/>
<script type="text/javascript" src="http://la.eonline.com/admin2012/banners/slider/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				/*preload: true,
				preloadImage: 'http://la.eonline.com/admin2012/banners/slider/loading.gif',*/
				pagination: false,
				generatePagination: false,
				play: 5000,
				pause: 2500,
				hoverPause: true,
				effect: 'slide, fade',
				animationStart: function(current){
					$('.captionslider').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.captionslider').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.captionslider').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
 <!-- SLIDER -->


<!-- ADSERVER -->
<script type='text/javascript' src='http://adsrv01.eonlinelatinola.com/www/delivery/spcjs.php?id=<?=$page_adserver?>'></script>
 

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

 <!-- LIGHTBOX -->
<script type="text/javascript" src="<?php bloginfo('template_url')?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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


 <!-- BRIGHTCOVE -->
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

 <!-- SCRIPT PARA EXPANDIBLE -->
<script language="JavaScript">
function setFlashHeight(divid, newH){
	document.getElementById(divid).style.height = newH+"px";
}
function setFlashWidth(divid, newH){
	document.getElementById(divid).style.width = newH+"px";
}
</script>
 <!-- SCRIPT PARA EXPANDIBLE -->
 
 
<script language="JavaScript">
jQuery(document).ready(function($) {
	$("#slider_cycle ul").cycle({fx: "fade", timeout: 4000});
});
</script>
 <!--/* ENCUESTA ONLINE */-->
 <!--<script src="http://static.ecglobal.com/survey/scripts/ecGlobal.js"></script> -->
 <!--<script src="http://static.ecglobal.com/survey/EMaterialaEvaluar/popup.js" ></script> -->
 <!--/* ENCUESTA ONLINE  */-->
</head>

<?php flush(); ?>

<body <?php body_class(); ?>>

<!-- Google Code for Etiqueta de remarketing: -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1007010875;
var google_conversion_label = "y3zzCL2IiwgQu4iX4AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1007010875/?value=0&amp;label=y3zzCL2IiwgQu4iX4AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<!--/* OpenX Floating */-->
<div style="display:block; z-index:1000; ">
<script type='text/javascript'><!--//<![CDATA[
   var ox_u = 'http://adsrv01.eonlinelatinola.com/www/delivery/al.php?zoneid=<?=$zone_floating?>&target=_blank&cb=INSERT_RANDOM_NUMBER_HERE&layerstyle=simple&align=center&valign=middle&padding=0&closetime=20&padding=0&shifth=0&shiftv=0&closebutton=t&nobg=t&noborder=t';
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
			<div id="cont_banners_top" >
				<div id="banner_top_242x90">
						<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
										<div id="third" class="widget-area">
											<ul class="xoxo">
												<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
											</ul>
										</div><!-- #third .widget-area -->
						<?php endif; ?>
				</div>

				<div id="exp_banner" class="banner_top_728x90">
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
			
		</div>
		<!-- / Links superiores, Buscador y Banners -->
		
		<!-- CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		<div id="masthead">
			<!-- CABEZAL LOGO -->
			<h1 id="site-title">
				<span>
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</h1>
			<!-- / CABEZAL LOGO -->

			<!-- MENU -->
			<div id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?> --- </a></div>
				<?php //wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				<div class="menu-header">
					<ul id="menu-principal" class="menu">
						<li class="menu-item menu-item-type-custom menu-item-object-custom <?if(is_home()) {echo ('current-menu-item current_page_item');}else{echo ('menu-item');}?>">
							<a href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Inicio</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/enews/" OnMouseOver="this.style.borderColor='<?php echo cat_color('enews');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('enews');?>; <?if(is_category('enews')) echo ("border-color:".cat_color('enews').";");?>">News</a>
						</li>
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/estrenos" OnMouseOver="this.style.borderColor='<?php echo cat_color('estrenos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('estrenos');?>; <?if(is_category('estrenos')) echo ("border-color:".cat_color('estrenos').";");?>">Estrenos</a>
						</li>-->
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>eshows" OnMouseOver="this.style.borderColor='<?php echo cat_color('eshows');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('eshows');?>; <?if(is_page('eshows')) echo ("border-color:".cat_color('eshows').";");?>">E! shows</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/alfombraroja" OnMouseOver="this.style.borderColor='<?php echo cat_color('alfombraroja');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('alfombraroja');?>; <?if(is_category('alfombraroja')) echo ("border-color:".cat_color('alfombraroja').";");?>">RED CARPET</a>
						</li>
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>fotos" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('fotos')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>videos-2" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos-2');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos-2');?>; <?if(is_page('videos-2')) echo ("border-color:".cat_color('videos-2').";");?>">Videos</a>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programación</a>
						</li>
					</ul>
				</div>
			</div>
			<!-- / MENU -->



		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		
	</div>
	<!-- / HEADER -->


	<!-- SUBMENU ALFOMBRA -->
	<?php
	if ($cat_alf2==1 || $cat_alf3==1){?>
			<div id="submenu">
				<div class="items_submenu">
						<?php wp_nav_menu( array( 'container_class' => 'sbmn_redcarpet', 'theme_location' => 'secondary' ) ); ?>
				</div>
			</div>
	<?}?>
	<!-- / SUBMENU ALFOMBRA -->

	
	<!-- ESPACIO LIBRE -->
	<?php if ( is_category( "efashionblogger" ) || is_category( "cine_by_dos_equis" ) ) {?>
		<div id="libre">
		</div>
	<?}?>
	<!-- / ESPACIO LIBRE -->

	<div id="main">