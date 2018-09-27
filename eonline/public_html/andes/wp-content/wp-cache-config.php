<?php
/*
WP-Cache Config Sample File

See wp-cache.php for author details.
*/

$wp_cache_pages[ "author" ] = 1; //Added by WP-Cache Manager
$wp_cache_mfunc_enabled = 0; //Added by WP-Cache Manager
$wp_cache_preload_taxonomies = 0; //Added by WP-Cache Manager
$cache_schedule_interval = 'hourly'; //Added by WP-Cache Manager
$cache_gc_email_me = 0; //Added by WP-Cache Manager
$wp_cache_make_known_anon = 1; //Added by WP-Cache Manager
$wp_cache_mod_rewrite = 0; //Added by WP-Cache Manager
$wp_cache_front_page_checks = 1; //Added by WP-Cache Manager
$wp_supercache_304 = 0; //Added by WP-Cache Manager
$wp_cache_no_cache_for_get = 0; //Added by WP-Cache Manager
$wp_cache_disable_utf8 = 0; //Added by WP-Cache Manager
$cache_time_interval = '60'; //Added by WP-Cache Manager
$cache_scheduled_time = '00:00'; //Added by WP-Cache Manager
$cache_schedule_type = 'time'; //Added by WP-Cache Manager
$wp_cache_home_path = '/andes/'; //Added by WP-Cache Manager
$cache_page_secret = 'ca941bb6a0d778e42f0b4ee51ff4e83a'; //Added by WP-Cache Manager
$wp_cache_mobile_groups = ''; //Added by WP-Cache Manager
$wp_cache_mobile_prefixes = 'w3c , w3c-, acs-, alav, alca, amoi, audi, avan, benq, bird, blac, blaz, brew, cell, cldc, cmd-, dang, doco, eric, hipt, htc_, inno, ipaq, ipod, jigs, kddi, keji, leno, lg-c, lg-d, lg-g, lge-, lg/u, maui, maxo, midp, mits, mmef, mobi, mot-, moto, mwbp, nec-, newt, noki, palm, pana, pant, phil, play, port, prox, qwap, sage, sams, sany, sch-, sec-, send, seri, sgh-, shar, sie-, siem, smal, smar, sony, sph-, symb, t-mo, teli, tim-, tosh, tsm-, upg1, upsi, vk-v, voda, wap-, wapa, wapi, wapp, wapr, webc, winw, winw, xda , xda-'; //Added by WP-Cache Manager
define( 'WPLOCKDOWN', '1' ); //Added by WP-Cache Manager
$wp_cache_preload_on = 0; //Added by WP-Cache Manager
$wp_cache_preload_email_volume = 'less'; //Added by WP-Cache Manager
$wp_cache_preload_email_me = 0; //Added by WP-Cache Manager
$wp_cache_preload_interval = 1800; //Added by WP-Cache Manager
$wp_cache_preload_posts = 'all'; //Added by WP-Cache Manager
$wp_cache_refresh_single_only = '0'; //Added by WP-Cache Manager
$wp_cache_slash_check = 1; //Added by WP-Cache Manager
if ( ! defined('WPCACHEHOME') )
	define( 'WPCACHEHOME', WP_CONTENT_DIR . "/plugins/wp-super-cache/" ); //Added by WP-Cache Manager

$cache_compression = 1; //Added by WP-Cache Manager
$cache_enabled = true; //Added by WP-Cache Manager
$super_cache_enabled = true; //Added by WP-Cache Manager
$cache_max_time = 3600; //Added by WP-Cache Manager
//$use_flock = true; // Set it true or false if you know what to use
$cache_path = '/home/eonline/public_html/andes/wp-content/cache2016'; //Added by WP-Cache Manager
$file_prefix = 'wp-cache-';

// We want to be able to identify each blog in a WordPress MU install
$blogcacheid = '';
if( defined( 'VHOST' ) ) {
	$blogcacheid = 'blog'; // main blog
	if( constant( 'VHOST' ) == 'yes' ) {
		$blogcacheid = $_SERVER['HTTP_HOST'];
	} else {
		$request_uri = preg_replace('/[ <>\'\"\r\n\t\(\)]/', '', str_replace( '..', '', $_SERVER['REQUEST_URI'] ) );
		if( strpos( $request_uri, '/', 1 ) ) {
			if( $base == '/' ) {
				$blogcacheid = substr( $request_uri, 1, strpos( $request_uri, '/', 1 ) - 1 );
			} else {
				$blogcacheid = str_replace( $base, '', $request_uri );
				$blogcacheid = substr( $blogcacheid, 0, strpos( $blogcacheid, '/', 1 ) );
			}
			if ( '/' == substr($blogcacheid, -1))
				$blogcacheid = substr($blogcacheid, 0, -1);
		}
		$blogcacheid = str_replace( '/', '', $blogcacheid );
	}
}

// Array of files that have 'wp-' but should still be cached 
$cache_acceptable_files = array ( 0 => 'wp-comments-popup.php', 1 => 'wp-links-opml.php', 2 => 'wp-locations.php', ); //Added by WP-Cache Manager

$cache_rejected_uri = array ( 0 => 'wp-.*\\.php', 1 => 'findex\\.php', 2 => 'wp-content/themes/abz2012/detectar_movil\\.php', ); //Added by WP-Cache Manager
$cache_rejected_user_agent = array ( 0 => 'bot', 1 => 'ia_archive', 2 => 'slurp', 3 => 'crawl', 4 => 'spider', 5 => 'Yandex', ); //Added by WP-Cache Manager

$cache_rebuild_files = 1; //Added by WP-Cache Manager

// Disable the file locking system.
// If you are experiencing problems with clearing or creating cache files
// uncommenting this may help.
$wp_cache_mutex_disabled = 1; //Added by WP-Cache Manager

// Just modify it if you have conflicts with semaphores
$sem_id = 1904124500; //Added by WP-Cache Manager

if ( '/' != substr($cache_path, -1)) {
	$cache_path .= '/';
}

$wp_cache_mobile = 0;
$wp_cache_mobile_whitelist = 'Stand Alone/QNws';
$wp_cache_mobile_browsers = '2.0 MMP, 240x320, 400X240, AvantGo, BlackBerry, Blazer, Cellphone, Danger, DoCoMo, Elaine/3.0, EudoraWeb, Googlebot-Mobile, hiptop, IEMobile, KYOCERA/WX310K, LG/U990, MIDP-2., MMEF20, MOT-V, NetFront, Newt, Nintendo Wii, Nitro, Nokia, Opera Mini, Palm, PlayStation Portable, portalmmm, Proxinet, ProxiNet, SHARP-TQ-GX10, SHG-i900, Small, SonyEricsson, Symbian OS, SymbianOS, TS21i-10, UP.Browser, UP.Link, webOS, Windows CE, WinWAP, YahooSeeker/M1A1-R2D2, iPhone, iPod, Android, BlackBerry9530, LG-TU915 Obigo, LGE VX, webOS, Nokia5800'; //Added by WP-Cache Manager

// gzip the first page generated for clients that support it.
$wp_cache_gzip_first = 0;
// change to relocate the supercache plugins directory
$wp_cache_plugins_dir = WPCACHEHOME . 'plugins';
// set to 1 to do garbage collection during normal process shutdown instead of wp-cron
$wp_cache_shutdown_gc = 0; 
$wp_super_cache_late_init = 0; //Added by WP-Cache Manager

// uncomment the next line to enable advanced debugging features
$wp_super_cache_advanced_debug = 0;
$wp_super_cache_front_page_text = ''; //Added by WP-Cache Manager
$wp_super_cache_front_page_clear = '1'; //Added by WP-Cache Manager
$wp_super_cache_front_page_check = '0'; //Added by WP-Cache Manager
$wp_super_cache_front_page_notification = '0'; //Added by WP-Cache Manager

$wp_cache_object_cache = 0; //Added by WP-Cache Manager
$wp_cache_anon_only = 0;
$wp_supercache_cache_list = 0; //Added by WP-Cache Manager
$wp_cache_debug_to_file = '1'; //Added by WP-Cache Manager
$wp_super_cache_debug = '1'; //Added by WP-Cache Manager
$wp_cache_debug_level = '5'; //Added by WP-Cache Manager
$wp_cache_debug_ip = '200.68.75.9'; //Added by WP-Cache Manager
$wp_cache_debug_log = 'ec715f3fa758e510e48df7f4cb00b480.txt'; //Added by WP-Cache Manager
$wp_cache_debug_email = ''; //Added by WP-Cache Manager
$wp_cache_pages[ "search" ] = 1; //Added by WP-Cache Manager
$wp_cache_pages[ "feed" ] = 1; //Added by WP-Cache Manager
$wp_cache_pages[ "category" ] = 0; //Added by WP-Cache Manager
$wp_cache_pages[ "home" ] = 1; //Added by WP-Cache Manager
$wp_cache_pages[ "frontpage" ] = 1; //Added by WP-Cache Manager
$wp_cache_pages[ "tag" ] = 0; //Added by WP-Cache Manager
$wp_cache_pages[ "archives" ] = 1; //Added by WP-Cache Manager
$wp_cache_pages[ "pages" ] = 0; //Added by WP-Cache Manager
$wp_cache_pages[ "single" ] = 0; //Added by WP-Cache Manager
$wp_cache_hide_donation = 1; //Added by WP-Cache Manager
$wp_cache_not_logged_in = 1; //Added by WP-Cache Manager
$wp_cache_clear_on_post_edit = 1; //Added by WP-Cache Manager
$wp_cache_hello_world = 0; //Added by WP-Cache Manager
$wp_cache_mobile_enabled = 1; //Added by WP-Cache Manager
$wp_cache_cron_check = 1; //Added by WP-Cache Manager
?>
