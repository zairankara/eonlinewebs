<?php
/*
Plugin Name: RSS FEED anywhere
Plugin URI: http://feeder.solverat.com
Description: This tool allows you to stream your RSS-FEED from everywhere! :)
Author: solverat
Author URI: http://www.solverat.com/blog
Version: 1.4
*/

$options_page = get_option('siteurl') . '/wp-admin/admin.php?page=rss-feed-anywhere/options.php';

$acf_path = (get_settings('siteurl')."/wp-content/plugins/rss-feed-anywhere/");

$referringPage = $_SERVER['REQUEST_URI'];

function rfa_add_options_page() {
	add_options_page('RSS FEED anywhere option page', 'RSS FEED anywhere', 'manage_options', 'rss-feed-anywhere/options.php');
}



add_action('admin_head', 'rfa_add_options_page');
?>