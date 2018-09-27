<?php
/*
Plugin Name: Resize At Upload Plus
Plugin URI: http://mores.cc/resize-at-upload-plus
Description: Automatically resize (i.e. scale down) images after uploading. Save disk space and preserve your layout
Author: Daniel Mores, A. Huizinga
Version: 1.1
Author URI: http://mores.cc

Copyright 2008 Daniel Mores, A. Huizinga

**Version History:**

31 Jan 2009		v1.1
Used Anton's improved class.resize.php to make use of GD2, to get resampling of resized images. Quality upgrade that was made possible entirely because of Anton Huizinga.

17 Jan 2009		v1.0
My wife's birthday. I release this plugin. I managed to make it stay inside the maximum dimensions you specify.


This is based on the excellent Resize At Upload Plugin by A. Huizinga
  http://dev.huiz.net/2008/10/04/plugin-resize-at-upload-english/

Includes hints and code by:
  Jacob Wyke (www.redvodkajelly.com)
  Paolo Tresso / Pixline (http://pixline.net)  

*/

$version = get_option('hz_resizeupload_version');
if ($version == '') {
  add_option('hz_resizeupload_version','0.9','Version of the plugin Resize at Upload','yes');
  add_option('hz_resizeupload_width','600','Resize image to this width','yes');
  add_option('hz_resizeupload_height','600','Resize image to this height','yes');
  add_option('hz_resizeupload_resize_yesno','yes','Resize image if yes (set to no instead of unloading the plugin)','yes');
} // if

  
/* actions */
add_action( 'admin_menu', 'hz_uploadresize_options_page' ); // add option page
if (get_option('hz_resizeupload_resize_yesno') == 'yes') {
  add_action('wp_handle_upload', 'hz_uploadresize_resize'); // apply our modifications
} // if

  
/* add option page */
function hz_uploadresize_options_page(){
  if(function_exists('add_options_page')){
    add_options_page('Resize at Upload Plus','Resize at Upload Plus',8,'resize-upload-plus','hz_uploadresize_options');
  } // if
} // function


/* the real option page */
function hz_uploadresize_options(){
  if (isset($_POST['hz_options_update'])) {
    $maxwidth = trim(mysql_real_escape_string($_POST['maxwidth']));
    $maxheight = trim(mysql_real_escape_string($_POST['maxheight']));
    $yesno = $_POST['yesno'];
    
    // if input is empty or not an integer, use previous setting
    if ($maxwidth == '' OR ctype_digit(strval($maxwidth)) == FALSE) {
      $maxwidth = get_option('hz_resizeupload_width');
    } // if
    
    update_option('hz_resizeupload_width',$maxwidth);

    // if input is empty or not an integer, use previous setting
    if ($maxheight == '' OR ctype_digit(strval($maxheight)) == FALSE) {
      $maxheight = get_option('hz_resizeupload_height');
    } // if
    
    update_option('hz_resizeupload_height',$maxheight);
    
    if ($yesno == 'yes') {
      update_option('hz_resizeupload_resize_yesno','yes');
    } // if
    else {
      update_option('hz_resizeupload_resize_yesno','no');
    } // else

    echo('<div id="message" class="updated fade"><p><strong>Your option are saved.</strong></p></div>');
  } // if



  // get options and show settings form
  $maxwidth = get_option('hz_resizeupload_width');
  $maxheight = get_option('hz_resizeupload_height');
  $yesno = get_option('hz_resizeupload_resize_yesno');
  

  echo('<div class="wrap">');
  echo('<form method="post" accept-charset="utf-8">');
    
  echo('<h2>Resize at Upload Plus Options</h2>');
  echo('<p>This plugin does exactly what it says: it will resize images at upload. Nothing more, nothing less.
   You can set the max width, and images (JPEG, PNG or GIF) will be resized while they are uploaded.');

  echo('<p>Your file will be resized, there will not be a copy or backup with the original size.</p>');
  
  echo('<p>Set the option \'Resize\' to no if you don\'t want to resize, this way you shouldn\'t deactivate the plugin 
   in case you don\'t want to resize for a while.</p>');

  echo('<h3>Settings</h3>
    <table class="form-table">
  
    <tr>
    <td>Resize:&nbsp;</td>
    <td>
    <select name="yesno" id="yesno">  
    <option value="no" label="no"'); if ($yesno == 'no') echo(' selected=selected'); echo('>no</option>
    <option value="yes" label="yes"'); if ($yesno == 'yes') echo(' selected=selected'); echo('>yes</option>
    </select>
    </td>
    </tr>
  
    <tr>
    <td valign=top>Max width:&nbsp;</td>
    <td>
    <input type="text" name="maxwidth" size="10" id="maxwidth" value="'.$maxwidth.'" /><br />
    <small>Enter a valid max width in pixels (e.g. 500).<br>Enter 0 if you only wish to resize to a max <b>height</b>only</small>
    </td>
    </tr>

    <tr>
    <td valign=top>Max height:&nbsp;</td>
    <td>
    <input type="text" name="maxheight" size="10" id="maxheight" value="'.$maxheight.'" /><br />
    <small>Enter a valid max width in pixels (e.g. 500).<br>Enter 0 if you only wish to resize to a max <b>width</b> only</small>
    </td>
    </tr>
    
    </table>');  
  
  echo('<p class="submit">
  <input type="hidden" name="action" value="update" />
  <input type="submit" name="hz_options_update" value="Update Options &raquo;" />
  </p>
  </form>');
  
  echo('Keep in mind that WordPress will automatically (at least till version 2.6.2) scale all images that you embed in with the editor down to 500px. You can see this by changing to the HTML view. If you don\'t want this, update your theme file(s) with the following code: <br><pre><b>$GLOBALS[\'content_width\'] = 650;</b></pre></p>');

  echo('</div>');
}



/* This function will apply changes to the uploaded file */
function hz_uploadresize_resize($array){ 
  // $array contains file, url, type
  if ($array['type'] == 'image/jpeg' OR $array['type'] == 'image/gif' OR $array['type'] == 'image/png') {
    // there is a file to handle, so include the class and get the variables
    require_once('class.resize.php');
    $maxwidth = get_option('hz_resizeupload_width');
    $maxheight = get_option('hz_resizeupload_height');
    $imagesize = getimagesize($array['file']); // $imagesize[0] = width, $imagesize[1] = height
    
    if ( $maxwidth == 0 OR $maxheight == 0) {
    	if ($maxwidth==0) {
			$objResize = new RVJ_ImageResize($array['file'], $array['file'], 'H', $maxheight);
    	}
    	if ($maxheight==0) {
			$objResize = new RVJ_ImageResize($array['file'], $array['file'], 'W', $maxwidth);
    	}
    } else {	
		if ( ($imagesize[0] >= $imagesize[1]) AND ($maxwidth * $imagesize[1] / $imagesize[0] <= $maxheight) )  {
			$objResize = new RVJ_ImageResize($array['file'], $array['file'], 'W', $maxwidth);
		} else {
			$objResize = new RVJ_ImageResize($array['file'], $array['file'], 'H', $maxheight);
		}
	}
  } // if
  return $array;
} // function

?>