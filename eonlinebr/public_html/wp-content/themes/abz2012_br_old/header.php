<?php
include(TEMPLATEPATH."/var_constantes.php");


// MOBILE 
include(TEMPLATEPATH."/detectar_movil_br.php");


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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

?></title>
<meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
<meta name="Keywords" content="Eonlinebrasil, E! Brasil, E!, onlinebrasil, estréias, gente e, Brasil, brazil, programação, eonline, tapete vermelho, fotos, fotos gente, famosos, espetáculo, notícias, e! News, concursos, esta noite, contatos, Gilberto Scarpa, behind the scenes, dr. 90210, e! Specials, Grammy awards, girls of the playboy mansion, histórias verdadeiras, e! Fashion week, keeping up with the Kardashian, Kendra, Hollywood, chelsea lately, the soup, kourtney&khloe take Miami, Project runway, zona e!, zona trendy, relaxed, true beauty, meu book, Brasil bites, Brasil, Emmy awards, fashion, naked wild on, forbes special, E! News live, E! News weekend, sexiest, temptation island, golden globe, awards, academy awards, oscars, sag awards, the daily 10, Joan Rivers, how’d you get so rich?, E! VIP, Amaury jr, informercial, spotlight on, meu book, style her famous, ricos, rica, estrelas, famosos, celebridades, fofocas, novidades, artista, TV, Globo, globais, Alicia Kuczman, Aline Schneider, Kelly Gomes, Priscila Mallmann, Candy Ames, moda, glam, glamour, modelos, passarela, rich, famous, comercial, episódio, humor, E! Special, realities e ponto, behind the scenes, movies, filmes, festival, cinema, prêmios, premio, premiação" />
<meta name="author" content="http://www.abzcomunicacion.com" />
<meta name="identifier-url" content="http://br.eonline.com/">
<meta name="Language" content="Spanish" />
<meta name="Distribution" content="Global" />
<meta name="revisit-after" content="1 day" />
<meta name="Category" content="entertainment" />
<link rel="shortcut icon" href="<?php bloginfo('template_url')?>/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com" />

<!-- GOOGLE PLUS -->
<!-- Update your html tag to include the itemscope and itemtype attributes -->
<html itemscope itemtype="http://schema.org/Organization">

<meta property="fb:app_id" content="268102679875815">


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
$default_img = "http://la.eonline.com/mexico/wp-content/themes/abz2012/images/generica_blanca.jpg";

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


<!-- FONT-FACE -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/font-face/font-face.css" />
<!-- / FONT-FACE -->

<!--CSS CYCLE-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/cycle-slider/cycle.css" />


<?
if ( in_category( "tapetevermelho" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" )  ||  in_category( "baftaawards" ) ||  in_category( "latinbillboard" )) $cat_alf=1;
if ( is_category( "tapetevermelho" )) $cat_alf2=1;
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
<?php }  elseif ( is_page( "galerias" )  || is_page( "galerias_page" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_fotos.css" />
<?php }  elseif ( is_category( "the-kardashians" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_the-kardashians.css" />
<?php }  elseif ( is_category( "efashionblogger" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_micaela.css" />
<?php }  elseif ( is_category( "cine_by_dos_equis" )) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_cine_by_dos_equis.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( ) || is_attachment()) {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/style_seccion.css" />
<?}?>
<!-- / STYLES -->

<!-- STYLES COLORES CATEGORIAS-->
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/colores.css" />
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
    <script src="<?php bloginfo('template_url')?>/paginator/js/js.js"></script>
	<script src="<?php bloginfo('template_url')?>/paginator/js/jPages.js"></script>
 
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
<link rel="stylesheet" href="http://la.eonline.com/admin2012/banners/slider/global_2012.css">
<script src="http://la.eonline.com/admin2012/banners/slider/slides.min.jquery.js"></script>
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
 $descripcion = '<meta name="description" content="E! Online Brasil | E! Entertainment Television Brasil. Todos los artículos sobre '.$categoria.''; 

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


	<!--/* script_pagebanner */-->
	<? include(TEMPLATEPATH."/script_pagebanner.php");?>
	<!--/* script_pagebanner */-->

</head>

<?php flush(); ?>

<body <?php body_class(); ?>>


	<!--/* ad_pagebanner */-->
	<? include(TEMPLATEPATH."/ad_pagebanner.php");?>
	<!--/* ad_pagebanner */-->
	
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
							<a href="<?php echo home_url( '/' ); ?>"  OnMouseOver="this.style.borderColor='#fff';"  OnMouseOut="this.style.borderColor='#000';" style="<?if(is_home()) echo ("border-color:#fff");?>">Início</a>
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
							<a href="<?php echo home_url( '/' ); ?>category/tapetevermelho" OnMouseOver="this.style.borderColor='<?php echo cat_color('tapetevermelho');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('tapetevermelho');?>; <?if(is_category('tapetevermelho')) echo ("border-color:".cat_color('tapetevermelho').";");?>">Tapete Vermelho</a>
						</li>
						
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>galerias" OnMouseOver="this.style.borderColor='<?php echo cat_color('fotos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('fotos');?>; <?if(is_page('galerias')) echo ("border-color:".cat_color('fotos').";");?>">Fotos</a>
						</li>
						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>videos" OnMouseOver="this.style.borderColor='<?php echo cat_color('videos');?>';"  OnMouseOut="this.style.borderColor='#000';"  style="color:<?php echo cat_color('videos');?>; <?if(is_page('videos')) echo ("border-color:".cat_color('videos').";");?>">Vídeos</a>
						</li>

						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>programas" OnMouseOver="this.style.borderColor='<?php echo cat_color('programas');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('programas');?>; <?if(is_page('programas')) echo ("border-color:".cat_color('programas').";");?>">Programação</a>

						</li>
						
						<!--<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/carnaval-2013-2" OnMouseOver="this.style.borderColor='<?php echo cat_color('carnaval-2013-2');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('carnaval-2013-2');?>; <?if(is_category('carnaval-2013-2')) echo ("border-color:".cat_color('carnaval-2013-2').";");?>">Carnaval</a>
						</li>-->

						<li class="menu-item menu-item-type-post_type menu-item">
							<a href="<?php echo home_url( '/' ); ?>category/the-kardashians" OnMouseOver="this.style.borderColor='<?php echo cat_color('the-kardashians');?>';"  OnMouseOut="this.style.borderColor='#000';" style="color:<?php echo cat_color('the-kardashians');?>; <?if(is_category('the-kardashians')) echo ("border-color:".cat_color('the-kardashians').";");?>">Kardashians</a>
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
	<?php if ( is_category( "efashionblogger" ) || is_category( "cine_by_dos_equis" )  || is_category( "the-kardashians" ) ) {?>
		<div id="libre">
		</div>
	<?}?>
	<!-- / ESPACIO LIBRE -->

	<div id="main">