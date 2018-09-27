=== Plugin Name ===
Contributors: bmodesign2
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4AWSR2J4DK2FU
Tags: nextgen, scrollgallery, bmo-design, picture, photo, photos, widgets, pictures, photo-albums, post, admin, media, gallery, images, slideshow, galerie, mootools, javascript 
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 1.5

Awesome free JavaScript gallery. BMo-Design's Mootools Javascript ScrollGallery as a Plugin for the Wordpress NextGEN Gallery.

== Description ==

**Nextgen Scroll Gallery**: A Wordpress Plugin that allows you to use the awesome Mootools **ScrollGallery from BMo-design** on your **NextGen-Gallery** galleries.

If you want to to use this Plugin on your blog, you need to use the very cool Wordpress gallery manager: [NextGen Gallery](http://wordpress.org/extend/plugins/nextgen-gallery/). So install the NextGENeration Gallery Plugin and upload some pictures. Copy the '[scrollGallery id=xxx]' tag in your post an replace 'xxx' with the NextGEN Gallery id, for example with 1.

If you have some questions or you need instructions look at [BMo-Design - Nextgen Scroll Gallery](http://software.bmo-design.de/scrollgallery/wordpress-plugin-nextgen-scroll-gallery.html).

== Screenshots ==

1. Screenshot Gallery Example

== Installation ==

1. 	Download, upload & activate the NextGen-Gallery plugin 
2. 	Download, upload & activate this plugin 
3.  Add a NextGen Gallery and upload some images (the main gallery folder must have write permission)
4. 	Go to your post/page an enter the tag '[scrollGallery id=xxx]' you have to replace xxx with your Gallery Id.

That's it ... Have fun

== Options ==
More Options can be set in the post/page tag:
'[scrollGallery id=xxx option1="value1" option2="value2"]'

= Possibel Options =

* start: (number) start at picture number ... the first picture is number 0
* area: (number) width of the area to scroll left or right
* thumbarea: (string) div class name for the thumbs
* imagearea: (string) div class name for the images
* speed: (number) 0<=speed<=1 thumb scroll speed
* clickable: (boolean) images can be clicked
* autoScroll: (boolean) autoscroll thumbs
* useCaptions: (boolean) use captions or not
* thumbsdown: (boolean) set the thumbs under the images
* width: (number) gallery width
* height: (number) gallery height
* adjustImagesize: (boolean) if false it will strech the images

For Example: '[scrollGallery id=1 start=5 autoScroll=true]'

Of Course you can change the style, borders and colors! Go into the plugin-folder "nextgen-scrollGallery" there you will find a folder "css" and the "scrollGallery_greyDesign.css".
Here you can add custom css designs, like the "scrollGallery_greyDesign.css".
I recommend to copy your "scrollGallery_customDesign.css" in your theme folder. Because if you make a update of the plugin, the "css" folder will be replaced.
After you save a css-file in this "css" folder, it will be possible to change the style of the gallery in the admin interface.

The dimensions of thumbnails and images can be changed in your NextGEN Gallery plugin.

Since version 1.5 the do_shortcode() function is supported.

== Frequently Asked Questions ==

= Have a question? =

Write me an email at [BMo-Design](http://bmo-design.de)

= Compatibility Problems =

Is not compatible with the Plugin *Mootools Framework* by Nils K. Windisch and the *NextGEN Smooth Gallery* by Bruno Guimaraes.


== Changelog ==

= Version 1.5 =
	* Now I use the WordPress Shortcode API. The shortcode is now everywhere available. In the content [scrollGallery id=1] and also now in the template by <?php echo do_shortcode('[scrollGallery id=1]'); ?> 
    * New CSS-Design included: CSS3 shadow design
    * Possibility to use margins around images with the comment ImgMargins e.g. "ImgMargins: 0px 0px 0px 3px;".

= Version 1.4 =
    * Adjust image function
	* Version 1.4.2 -> I fix the URL file-access is disabled in the server configuration with getimagesize($picture["img"]) problem by using the ngg width and height
	
= Version 1.3 =
    * Styleable Version, custom css can be included in the css folder.
	* Dynamic thumb dimensions.
	* Check if NGG is installed and activated.
	
= Version 1.2 =
    * I fix the start at image 0 problem
	
= Version 1.1 =
    * Add Scripts in compat mode an with wp_enqueue_script
	* ScrollGallery Version 1.11

= Version 1.0 =
    * First release
	* ScrollGallery Version 1.10
