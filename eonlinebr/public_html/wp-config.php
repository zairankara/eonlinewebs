<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'WPCACHEHOME', '/home/eonlinebr/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'eonlinebr_eonlinedb');

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

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
//define ('WPLANG', '');
define('WPLANG', 'pt_BR');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('WP_POST_REVISIONS', false);
define('AUTOSAVE_INTERVAL', 6000 );  // integer is in seconds (10min)

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
 
//define('CONCATENATE_SCRIPTS', false);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/* No usar crontabs de wordpress */
//define('DISABLE_WP_CRON', true);
