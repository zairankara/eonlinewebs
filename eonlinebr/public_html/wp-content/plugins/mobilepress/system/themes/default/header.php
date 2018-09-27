<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.1//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php if (is_home()) { bloginfo('name'); } ?><?php if (is_month()) { the_time('F Y'); } ?><?php if (is_category()) { single_cat_title(); } ?><?php if (is_single()) { the_title(); } ?><?php if (is_page()) { the_title(); } ?><?php if (is_tag()) { single_tag_title(); } ?><?php if (is_404()) { echo "Page Not Found!"; } ?></title>
		<meta name="generator" content="ABZComunicacion" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/plugins/mobilepress/system/themes/default/style.css" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	</head>
	
	<body>
	
		<div id="headerwrap">
			
			<div id="header">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<p><?php bloginfo('description'); ?></p>
			</div>
			
		</div>
		
		<div class="aduity"><?php mopr_ad('top'); ?></div>