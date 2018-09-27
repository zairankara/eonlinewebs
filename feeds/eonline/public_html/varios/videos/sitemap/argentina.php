<?php
exit();
//error_reporting(E_ALL);
//error_reporting(0);
	// Brightcove sample for MRSS feed
	
	// This is just a sample to get you started. You can customize further as your requirements
	// grow.
	// The following is a list of requirements and conditions in order for this podcast feed
	// to function properly;
	//    1) You must have a Pro or Enterprise level Video Cloud Account.
	//    2) You will need to contact Brightcove Support to request an API READ Token with URL 
	//       access, if you don't have one already.
	
	// Please customize the variables below:
	
	// This is the title of the podcast itself.	
	$title = "E! Online Latino | Argentina";
	// This is your Media API READ token with URL Access. This allows you to access the media files and not just the metadata.
	$token = "I0y4D_IDcpk9uTEOu-CzxevCxKestAzHfVDQ9NEsCoftDK489KCl2w..";
	// This is a link to where the MRSS feed can be found.
	$link = "http://la.eonline.com/argentina/";
	// This is a description of this iTunes Feed.
	$description  = "E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood.";
	// This is the language you display for this podcast.
	$lang = "es-ar";
	// This is the copyright information.
	$copyright = "E! Online Latino";
	// This is the build date.
	$builddate = date(DATE_RFC2822);

	$playlist_HM = 613485272001;

	print('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
	print('<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:bc="http://www.brightcove.tv/link" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">');
	print('<channel>');
	print('<title>'. $title . '</title>');
	print('<link>'. $link . '</link>');
	print('<description><![CDATA['. $description . ']]></description>');
	print('<language>'. $lang . '</language>');
	print('<copyright>'. $copyright . '</copyright>');
	print('<lastBuildDate>'. $builddate . '</lastBuildDate>');

	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL,
	    'http://api.brightcove.com/services/library?command=find_playlist_by_id' .   
	    '&playlist_id=' . $playlist_HM .
	    '&video_fields=name,shortDescription,publishedDate,tags,thumbnailURL,id,videoFullLength,customFields' . 
	    '&token=' . $token );
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	
	$returndata = json_decode($file_contents);
	//echo ("AA");
	//var_dump($returndata->videos);
	
	foreach($returndata->videos as $items)
	{
	    print('<item>');	
		
		print('<title>');
		print_r($items->{"name"});
		print('</title>');	
			
		print('<link>');
		print_r($link.'pagina/videos-2/?id='.$items->{"id"});
		print('</link>');
	
		print('<description>');
		print_r($items->{"shortDescription"});
		print('</description>');
		
		print('<pubDate>');
		print_r(date(DATE_RFC2822,(($items->{"publishedDate"})/1000)));
		print('</pubDate>');
	
		print('<media:player ');
		print_r('height="' . $items->{"videoFullLength"}->{"frameHeight"} . '"');
		print_r(' width="' . $items->{"videoFullLength"}->{"frameWidth"} . '"');
		print_r(' url="' . $items->{"videoFullLength"}->{"url"} . '"');
		print('</media:player>');
		
		print('<media:keywords>');
		$keywords = "";
		foreach($items->tags as $tags)
		{
			$keywords = $keywords . ($keywords == "" ? "" : ",") . $tags;
		}
		print_r($keywords);
		print('</media:keywords>');
		
		print('<media:thumbnail>');
		print_r($items->{"thumbnailURL"});
		print('</media:thumbnail>');
	
		print('<bc:videoid>');
		print_r($items->{"id"});
		print('</bc:videoid>');
	
		print('<bc:duration>');
		print_r($items->{"videoFullLength"}->{"videoDuration"});
		print('</bc:duration>');
		
	    print('</item>');
	}
	
	print('</channel></rss>');
	

	?>