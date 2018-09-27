=== RSS FEED anywhere ===
Contributors: solverat
Author URI: http://feeder.solverat.com/
Plugin URI: http://solverat.com/blog/12-25/rss-feed-an-myspace/
Tags: rss, feed, proxy
Requires at least: 2.0.2
Tested up to: 2.5
Stable tag: 1.4

This tool allows you to stream your RSS-FEED from anywhere! :)

== Description ==

> **important**: You can use this "plugin" even if you are not allowed to install plugins. To run this RSS FEEDER, its not neccessary to activate it.


You only have to place the swf-file on a server (free-hosting..) and edit the embed-Tag. Finished!
With the proxy-feature, you are allowed, to feed your RSS-Stream from anywhere. (Myspace etc.)

You also can get your RSS-Feed from free hosts wordpress.com blogs. (without upload or edit the template files or stuff like that.)
You dont have to place a crossdomain.xml (thats useful, because in some cases thats not possible: if you dont have enough permissions.. etc) on your Server! (you can, if you want to disable the proxy-function. But you dont have to! :) )


== Installation ==

> for detailed install information, visit: http://feeder.solverat.com/


1.) Download the Plugin and extract the files.


2.) If your blog is not on your own server:

2.3)  upload the swf somewhere.
2.4)  go to the website, where you want to display the RSS-Feeder.
2.5)  insert following code:

`
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" 
width="335" height="368" 
id="wp_RSStoMS" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="allowFullScreen" value="false" />
<param name="movie" value="http://URLTOYOURSWF/wp_RSSfa.swf" />
<param name="quality" value="high" />
<param name="bgcolor" value="#ffffff" />	
<embed src="http://URLTOYOURSWF/wp_RSSfa.swf" 
flashvars="rssfeed=http://URLTOYOURFEED&proxy=true"  
quality="high" bgcolor="#ffffff" 
width="335" height="368" name="wp_RSSfa" 
align="middle" allowScriptAccess="sameDomain" 
allowFullScreen="false" 
type="application/x-shockwave-flash" 
pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
`



2.6) have Fun! :)

____________________________________________________________________

3.) If you have access to your Server:

3.1) download this Plugin
3.2) activate Plugin
3.3) go to "Settings" -> "RSS FEED anywhere"
3.4) following the instructions

== Frequently Asked Questions ==

= No crossdomain.xml? How so? =

The RSS Feeder catch the Data of your feed und save it as a temp-session on feeder.solverat.com. After that, the RSS Feeder will
get the data from there.

= can i use the RSS Feeder without the proxy function? =

Yes you can. simple edit the embed Tag. Search for "proxy=true" and set it to "proxy=false".
But now you need a crossdomain.xml on your Server.

For more info please visit http://feeder.solverat.com

== Screenshots ==

1. Screenshot RSS Feeder



