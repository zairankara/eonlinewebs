<?php
// CAMBIO LA COOKIE
	if($_POST["flag"]==1){
		$cual=$_POST["cual"];
		setcookie("ubicacion","$cual",time()+365*24*60*60);
		switch($cual){
			case "1":header('Location:/andes/');break;
			case "2":header('Location:/index.php');break;
			case "3":header('Location:/mexico/');break;
			case "4":header('Location:/venezuela/');break;
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
<meta name="Keywords" content="Eonlinelatino, E! latino, E!, estrenos, gente e, latinoamerica, programacion, 100%latino, eonline, alfombra roja, galerias, foros, fotos gente, espectaculo, noticias, e! news, concursos, vota por, esta noche, e! entertainment latinoamerica, contactos, chica e!, daniela kosan, lo mas e!" />
<meta name="Description" content="E! Entertainment Television Latinoamérica. Todo el mundo del espectáculo  las 24 horas del días, los 365 días del año. Desde Hollywood para toda Latinoamérica. En sintonía con todo el continente latinoaméricano" />
<meta name="Abstract" content="E! Entertainment Television Latinoamérica. Todo el mundo del espectáculo  las 24 horas del días, los 365 días del año. Desde Hollywood para toda Latinoamérica. En sintonía con todo el continente latinoaméricano" />
<meta name="author" content="http://www.abzcomunicacion.com">
<meta name="identifier-url" content="http://www.eonlinelatinola.com/">
<meta name="Language" content="Spanish">
<meta name="Distribution" content="Global">
<meta name="revisit-after" content="1 day">
<meta name="Category" content="entertainment">
<link rel="shortcut icon" href="/images/favicon.ico"/>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="author" href="http://www.abzcomunicacion.com">
<!-- JS -->

<!-- STYLES -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php
if ( in_category( "alfombraroja" ) ||  in_category( "goldenglobe" ) ||  in_category( "sag" ) ||  in_category( "grammy" ) ||  in_category( "oscar" ) ||  in_category( "emmy" )  ||  in_category( "teenchoice" ))
{
$cat_alf=1;
}
if ( is_category( "alfombraroja" ) ||  is_category( "goldenglobe" ) ||  is_category( "sag" ) ||  is_category( "grammy" ) ||  is_category( "oscar" ) ||  is_category( "emmy" )  ||  is_category( "teenchoice" )  ||  $cat_alf==1)
{
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_alfombra.css" />
<?php }  elseif ( is_category( "estrenos" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_estrenos.css" />
<?php }  elseif ( is_page( "programas" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_programacion.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/programacion/css/programacion.css" />
<?php }  elseif ( is_category( "enews" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_enews.css" />
<?php }  elseif ( is_category( "zonae" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_zonae.css" />
<?php }  elseif ( is_page( "galerias" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_fotos.css" />
<?php }  elseif ( is_page( "videos-2" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_videos.css" />
<?php }  elseif ( is_search() || is_archive() || is_page( "glam" )) {?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url')?>/argentina/style_generico.css" />
<?php }  else {
}  ?>
<!-- / STYLES -->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<!-- HEADER -->
	<div id="header">
		
		<!-- Links superiores, Buscador y Banners -->
		<div id="cont_search_banners">
			<div id="buscador_top">
			<ul id="menu_top">
				<li><a href="<?php echo TEMPLATEPATH ?>/index.php">Inicio</a> | </li>
				<li><a href="<?php echo TEMPLATEPATH ?>/contacto/">Contacto</a> | </li>
				<li><a href="feed/"><img src="<?php bloginfo('template_url')?>/images/comunes/ico_RSS.gif" alt="" width="23" height="17" border="0">Contenido RSS</a> | </li>
				<li><a href="http://www.facebook.com/pages/E-Online-Latino/116264915095072?ref=sgm" target="_blank">Síguenos en<img src="<?php bloginfo('template_url')?>/images/comunes/ico_facebook.gif" alt="" width="74" height="17" border="0"></a> | </li>
				<li><a href="http://twitter.com/EonlineLatino" target="_blank">Síguenos en<img src="<?php bloginfo('template_url')?>/images/comunes/ico_twitter.gif" alt="" width="58" height="17" border="0"></a></li>
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
							Seleccione su país 
							<select name="cual" style="font: 11px/13px Arial, Tahoma, Verdana, Helvetica, Sans-serif;" onChange="document.forms.buscador.submit();">
							<option value="" selected>Elija un país</option>
							<?
							$sql="SELECT id_beam, name_str FROM sched_country ORDER by name_str ASC";
							$query=mysql_query($sql);
							while($row=mysql_fetch_array($query)){?>
								<option value="<?=$row["id_beam"]?>"><?=$row["name_str"]?></option>
							<?}?>
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
					<?
				if($_COOKIE['ubicacion']=="4") {$cookie="slideshow_v.swf";}else{$cookie="slideshow.swf";}
					?>
					<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="509" height="217" id="slideshow" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="wmode" value="transparent" />
					<param name="movie" value="<?php bloginfo('template_url')?>/images/swf/<?=$cookie?>" /><param name="quality" value="high" /><param name="bgcolor" value="#000000" />	<embed src="<?php bloginfo('template_url')?>/images/swf/<?=$cookie?>" quality="high" bgcolor="#000000" wmode="transparent" width="509" height="217" name="slideshow" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
				</div>
				<!-- / Destacados -->
				<!-- Programacion -->
				<div id="programacion_H">
				  	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="297" height="217" id="prog" align="middle">
					<param name="allowScriptAccess" value="sameDomain" />
					<param name="allowFullScreen" value="false" />
					<param name="wmode" value="transparent" />
					<param name="movie" value="<?php bloginfo('template_url')?>/images/swf/prog.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#000033" /><embed src="<?php bloginfo('template_url')?>/images/swf/prog.swf" quality="high" bgcolor="#000033" wmode="transparent" width="297" height="217" name="prog" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
					</object>
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
