<?php
header("Content-Type: application/xml");
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

	echo('<?xml version="1.0" encoding="UTF-8" standalone="yes"?>');
	echo('<urlset  version="2.0" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"  xmlns:media="http://search.yahoo.com/mrss/" xmlns:bc="http://www.brightcove.tv/link" xmlns:dcterms="http://purl.org/dc/terms/" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">');

	//echo('<channel>');
	//echo('<title>'. $title . '</title>');
	//echo('<link>'. $link . '</link>');
	//print('<description><![CDATA['. $description . ']]></description>');
	//echo('<language>'. $lang . '</language>');
	//echo('<copyright>'. $copyright . '</copyright>');
	//echo('<lastBuildDate>'. $builddate . '</lastBuildDate>');

	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL,
	    'http://api.brightcove.com/services/library?command=find_playlist_by_id' .   
	    '&playlist_id=' . $playlist_HM .
	    '&video_fields=name,shortDescription,publishedDate,tags,thumbnailURL,FLVURL,id,videoFullLength,tags,playsTotal,customFields' . 
	    '&token=' . $token );
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	
	//exit($file_contents);

	$returndata = json_decode($file_contents);
	
	foreach ($returndata->videos as $video) {
		
		if($video->thumbnailURL!=""){
			$pubDate = date('Y-m-d', round($video->publishedDate/1000));
			$length = $video->videoFullLength->videoDuration/1000;
			echo "	<url>\n";
			echo "		<loc>\n";
			echo 		$link."pagina/videos-2/?id=".$video->id."\n";
			echo "		</loc>\n";
			echo "		<video:video>\n";
			echo "			<video:title>\n";
			echo "			<![CDATA[{$video->name}]]>\n";
			echo "			</video:title>\n";
			echo "			<video:description>\n";
			echo "			<![CDATA[{$video->shortDescription}]]>\n";
			echo "			</video:description>\n";
			echo "			<video:content_loc>\n";
			echo "			<![CDATA[{$video->FLVURL}]]>\n";
			echo "			</video:content_loc>\n";
			echo "			<video:thumbnail_loc>\n";
			echo "			<![CDATA[{$video->thumbnailURL}]]>\n";
			echo "			</video:thumbnail_loc>\n";
			echo "			<video:publication_date>\n";
			echo "			<![CDATA[{$pubDate}]]>\n";
			echo "			</video:publication_date>\n";
			echo "			<video:duration>{$length}</video:duration>\n";
			echo "		</video:video>\n";
			echo "	</url>\n";
		}
	}
	//echo "</channel></urlset>\n";
	echo "</urlset>\n";
	?>