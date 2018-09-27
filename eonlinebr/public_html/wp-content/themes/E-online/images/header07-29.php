<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
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
			<?php get_search_form(); ?>
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
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<!-- Destacados -->
				<div id="destacados_H"></div>
				<!-- / Destacados -->
				<!-- Programacion -->
				<div id="programacion_H"></div>
				<!-- / Programacion -->
			</div><!-- #branding -->
		</div>
		<!-- / CONTENEDOR MENU, LOGO, PROMO y PROGRAMACION -->
		
	</div>
	<!-- / HEADER -->

	<div id="main">
