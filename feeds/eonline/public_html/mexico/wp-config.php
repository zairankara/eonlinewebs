<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'eonline_mexico');

/** MySQL database username */
define('DB_USER', 'eonline_usr');

/** MySQL database password */
define('DB_PASSWORD', '30nl1n3');

/** MySQL hostname */
define('DB_HOST', 'preprodabzdb');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         './Qrh2:vf!UJHS*aC?RBtYcZg&H^]1<-D0tI|#VZ*XDl>|+-Yl%SdD{)Z%L<Eobv');
define('SECURE_AUTH_KEY',  '~nI`Q+t;IW+bZywx+WJRSM/yNvQB`:(!QCwLZAtUjV=@ d~lGM^FHS.`x*KeKD}B');
define('LOGGED_IN_KEY',    'T{L^q7XB|EXupaS]i!<3n2#)gpTw iDccH)J|e!~#]Q)Y9p7$B2[/+z^|,)%Xf86');
define('NONCE_KEY',        'a|-ZXx|A*`rVV=:50l16LW-?]HUW|vEDl=m@HkZi#U;GxZQw:r(YiB6-wb1{6kC~');
define('AUTH_SALT',        '1H !i/8q7)]3])timTg^+y>$u4|]uLUsM6DS%ajxh=x/+.aFEWHS0iP3u=5B&M6R');
define('SECURE_AUTH_SALT', '+k%}+Q|)bJcBM?_?r`J4ioIGk&epL}}@;E+`<`)iz_ZgdgCxI/=K]Eug:YI7Y.k!');
define('LOGGED_IN_SALT',   '_G`B-@6gKiGa=Z`gk~`fD}EE-.Epc|m^+Ucw7hBDeR*51)pnP!#&I|Ro<16%:4+@');
define('NONCE_SALT',       'RW+ amo)1[)[{LY!kDvq4<%nevdo-o-F7r@UL^(cho<*IK>sZsInX);WDxy`%]-4');

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define ('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */

define('WP_DEBUG', false);

define('WP_POST_REVISIONS', false);
define('AUTOSAVE_INTERVAL', 6000 );  // integer is in seconds (10min)

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

//define('WP_MEMORY_LIMIT','200m');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* No usar crontabs de wordpress */
//define('DISABLE_WP_CRON', true);
?>