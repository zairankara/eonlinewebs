<?php
/*
Plugin Name: NextGEN ScrollGallery
Plugin URI: http://software.bmo-design.de/scrollgallery/wordpress-plugin-nextgen-scroll-gallery.html
Description: Awesome free JavaScript gallery. <a href="http://software.bmo-design.de/scrollgallery.html">BMo-Design's Mootools Javascript ScrollGallery</a> as a Plugin for the Wordpress NextGEN Gallery.
Author: Benedikt Morschheuser
Author URI: http://bmo-design.de/
Version: 1.5

#################################################################

The current version used the ScrollGallery 1.10.
                    
#################################################################
*/ 
// Restrictions
  if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

//###############################################################
  
  define('SCROLLGALLERY_SITEBASE_URL'  , get_option('siteurl'));
  define('SCROLLGALLERY_URL', get_option('siteurl').'/wp-content/plugins/' . dirname(plugin_basename(__FILE__))); // get_bloginfo('wpurl')

//###############################################################
	
class ScrollGallery {
	 function nggScrollGalleryReplaceShortcode($atts, $content = '') { //new Version, see http://codex.wordpress.org/Shortcode_API
		global $wpdb;
		
		if(!empty($atts[0]))//fallback to old Version
			if(substr($atts[0], 0, 1)=="=")//falls erstes Zeichen ein = -> alte Version.
				return "[scrollGallery".$atts[0]."]";
		
		//neue Version:
		$sgconfig = $this->get_SGConfiguration($atts);
		
		if( !is_numeric($sgconfig["galleryID"]) )
            $id = $wpdb->get_var( $wpdb->prepare ("SELECT gid FROM $wpdb->nggallery WHERE name = '%s' ", $sgconfig["galleryID"]) );

        if( !empty($sgconfig["galleryID"]) )
            $out = $this->nggSGShow($sgconfig);
        else 
            $out = '[Gallery not found]';
			
		return $out.$content;
	 }
	 
	 function nggScrollGalleryReplace($content) {//old version
		global $wpdb;
		
		$splitContent = $this->nggSGFindStringBetween($content, "[scrollGallery", "]");
		(array_key_exists(0, $splitContent) ? $begin  = $splitContent[0] :$begin="");
		(array_key_exists(1, $splitContent) ? $middle = $splitContent[1] :$middle="");
		(array_key_exists(2, $splitContent) ? $end    = $splitContent[2] :$end="");
		  
		if ($begin == $content) return $content;	
	
		// New Way [smooth=id:; width:; height:; timed:; delay:; transition:; arrows:; info:; carousel:; text:; open:; links:;]
		$middleValues = substr($middle, 0, -1); // Remove last brackets
		$middleValues = explode("=", $middleValues);
		$middleValues = explode(";", $middleValues[1]);
	
		$final = Array();
		foreach($middleValues as $value) {
			if(preg_match("/:/",$value)){
		  		list($key, $value) = explode(":", $value);
		  
		 		 if (trim($key) != "")
					$final[trim(strtolower($key))] = trim($value);
			}
		}
		$sgconfig = $this->get_SGConfiguration($final);
		
		$sgconfig["galleryID"] = $wpdb->get_var("SELECT gid FROM $wpdb->nggallery WHERE gid  = '".$sgconfig["galleryID"]."' ");
		if (! $sgconfig["galleryID"]) 
			$sgconfig["galleryID"] = $wpdb->get_var("SELECT gid FROM $wpdb->nggallery WHERE name = '".$sgconfig["galleryID"]."' ");
		if (! $sgconfig["galleryID"]) 
			return $begin . $middle . $end;
	
		if ($sgconfig["galleryID"]) {
		    $middle = $this->nggSGShow($sgconfig);
		}
	
		return $this->nggScrollGalleryReplace($begin . $middle . $end); // More than one gallery per post
	  }
	  function nggSGFindStringBetween($text, $begin, $end) {
		if ( ($posBegin = stripos($text, $begin         )) === false) return Array($text, "");
		if ( ($posEnd   = stripos($text, $end, $posBegin)) === false) return Array($text, "");
		
		$textBegin  = (string) substr($text, 0, $posBegin);
		$textMiddle = (string) substr($text, $posBegin, $posEnd - $posBegin + strlen($end) );
		$textEnd    = (string) substr($text, $posEnd + strlen($end) , strlen($text));
		return Array($textBegin, $textMiddle, $textEnd);
	  }
	  function get_SGConfiguration($final) {
		//build sgconfig from parameter and options
		$options = get_option("SG_Options");
		$sgconfig = array();      
		$sgconfig["galleryID"]        = (int)     ( (array_key_exists("id"        , $final))? $final["id"]                    :0 );
		$sgconfig["start"]            = (int)     ( (array_key_exists("start"     , $final))? $final["start"]                 : $options["SG_start"] );
		$sgconfig["area"]             = (int)     ( (array_key_exists("area"      , $final))? $final["area"]                  : $options["SG_area"] );
		$sgconfig["thumbarea"]        = (string)  ( (array_key_exists("thumbarea" , $final))? $final["thumbarea"]             : $options["SG_thumbarea"] );
		$sgconfig["imagearea"]        = (string)  ( (array_key_exists("imagearea" , $final))? $final["imagearea"]             : $options["SG_imagearea"] );
		$sgconfig["speed"]            = (string)  ( (array_key_exists("speed"     , $final))? $final["speed"]                 : $options["SG_speed"] );
		$sgconfig["clickable"]        = (bool)    ( (array_key_exists("clickable" , $final))?($final["clickable"] == 'false'?false:true): $options["SG_clickable"] );
		$sgconfig["autoScroll"]       = (bool)    ( (array_key_exists("autoscroll", $final))?($final["autoscroll"] == 'false'?false:true):  $options["SG_autoScroll"] );
		$sgconfig["useCaptions"]      = (bool)    ( (array_key_exists("usecaptions", $final))?($final["usecaptions"] == 'false'?false:true):  $options["SG_useCaptions"] );
		$sgconfig["thumbsdown"]      = (bool)    ( (array_key_exists("thumbsdown", $final))?($final["thumbsdown"] == 'false'?false:true):  $options["SG_thumbsdown"] );
		$sgconfig["width"]            = (int)    ( (array_key_exists("width"     , $final))? $final["width"]                 : $options["SG_width"] );
		$sgconfig["height"]           = (int)    ( (array_key_exists("height"    , $final))? $final["height"]                : $options["SG_height"] );
		$sgconfig["adjustImagesize"]  = (bool)    ( (array_key_exists("adjustimagesize", $final))?($final["adjustimagesize"] == 'false'?false:true):  $options["SG_adjustImagesize"] );
		//$sgconfig["design"]           = (string)  $options["SG_design"] ;//page should use only one design 
		//margins
		$margins = explode(" ", trim($options["SG_design_margin"],"px"));//we only work with px
		$sgconfig["margin_top"]		=$margins[0];
		$sgconfig["margin_right"]	=$margins[1];
		$sgconfig["margin_bottom"]	=$margins[2];
		$sgconfig["margin_left"]	=$margins[3];
		
		return $sgconfig;
	  }
	  function nggSGHead() {
		$options = get_option("SG_Options");
		// As a precaution, deregister any previous 'mootools' registrations. 
		wp_deregister_script(array('mootools'));
		wp_register_script( 'mootools', SCROLLGALLERY_URL.'/scrollGallery/js/mootools-core-1.3.2-full-compat.js', false, '1.3.2');
		// As a precaution, deregister any previous 'mootools' registrations. 
		wp_deregister_script(array('scrollGallery'));
		wp_register_script( 'scrollGallery', SCROLLGALLERY_URL.'/scrollGallery/js/scrollGallery.js', array('mootools'), '1.11');
	
	    echo ' <!-- begin nextgen-scrollGallery scripts & styles -->          
			  <link   type="text/css"        href="'.SCROLLGALLERY_URL.'/scrollGallery/css/scrollGallery.css" rel="stylesheet" media="screen" />';
		echo '<link   type="text/css"        href="'.SCROLLGALLERY_URL.'/scrollGallery/css/'.$options['SG_design'].'" rel="stylesheet" media="screen" />';
			  if (function_exists('wp_enqueue_script')) {
				wp_enqueue_script('mootools');
				wp_enqueue_script('scrollGallery');
			  }
	    echo '
			  <!-- end nextgen-scrollGallery scripts & styles -->
		   ';
	  }
	  function nggSGShow($sgconfig, $pictures = null) {	
		  global $wpdb;  
		  
		  extract($sgconfig);
		
		  // Get the pictures
		  if ($galleryID) {
			$mydb3 = new wpdb('eonline_usr','30nl1n3','galleries','preprodabzdb');
			$ngg_options = get_option ('ngg_options'); //NextGenGallery Options
			
			$sqlstr="SELECT np.*, ng.title AS title_gal, ng.id as gid FROM picture np INNER JOIN pictures_galleries pg ON pg.picture_id=np.id INNER JOIN gallery ng ON ng.id=pg.gallery_id AND ng.id=".$galleryID." AND pg.gallery_id=ng.id ORDER by pg.orden ASC";
	
			$pictures    = $mydb3->get_results($sqlstr);
					   
			$final = array();    
			foreach($pictures as $picture) {
			  $aux = array();
			  $aux["title"] = $picture->title; // $picture->alttext;
			  $aux["desc"]  = "";
			  $aux["link"]  = SCROLLGALLERY_SITEBASE_URL . "/" . $picture->filename;
			  $aux["img"]   = SCROLLGALLERY_SITEBASE_URL . "/" . $picture->filename;
			  $aux["img_abs_path"]   = ABSPATH  ."/" . $picture->filename;
			  $aux["thumb"] = SCROLLGALLERY_SITEBASE_URL . "/thumbs/thumbs_" . $picture->filename;
			  //$serialized_data = unserialize($picture->meta_data);
			  $aux["width"]  = "";
			  $aux["height"]  = "";
			  $final[] = $aux;
			}
			
			$pictures = $final;
			
		  } else {
			$galleryID = rand();//falls pictures als parameter übergeben werden
		  }
		  
		  if (empty($pictures)) return "";
		  
		  // Build the ScrollGallery HTML
		  $out = '<script type="text/javascript">
		  			window.addEvent(\'domready\', function() {
						var scrollGalleryObj'.$galleryID.' = new scrollGallery({';
		  if(is_numeric($start)) $out .= 'start:'.$start.',';
		  if($area) $out .= 'area:'.$area.',';
		  $out .= 'thumbarea:"'.$thumbarea.'_'.$galleryID.'",';
		  $out .= 'imagearea:"'.$imagearea.'_'.$galleryID.'",';
		  if($speed) $out .= 'speed:'.$speed.',';
		  if(!$clickable) $out .= 'clickable:false,';
		  if($autoScroll) $out .= 'autoScroll:'.$autoScroll.',';
		  if($useCaptions||$adjustImagesize) $out .= 'toElementClass:".caption_container",';
		  $out = substr($out, 0, -1); // Remove last ,
		  $out .= '				
						});
					});
				</script>';
		  if($useCaptions==true){
				 $out .= '
					<!--[if lte IE 7]>
					<style type="text/css">#imageareaContent .caption_container div{display:inline; position:relative;}</style>
					<![endif]-->
				';
		  }


		  if(!$thumbsdown==true){
			  $out .= '
			  <div id="scrollgallery_'.$galleryID.'" class="scrollgallery" style="width:'.($width+26).'px;">
	
					<div class="scrollGalleryHead">
						<div id="'.$thumbarea.'_'.$galleryID.'" class="thumbarea">
							<div class="thumbareaContent">';
								foreach ($pictures as $picture){
									if ($picture["img"]) {
										$out .= '<img  src="'.$picture["thumb"].'" alt="NextGen ScrollGallery thumbnail" />';
									}
								}
				$out .= '
							</div> 
						</div>
					</div>
					<div class="scrollGalleryFoot">
							<div id="'.$imagearea.'_'.$galleryID.'" class="imagearea">
							  <div class="imageareaContent">';
									foreach ($pictures as $picture){
										if ($picture["img"]) {
											if($useCaptions==true||$adjustImagesize==true){
												 $out .= '<div class="caption_container">';
												 if($useCaptions==true)
												 	$out .='<div>'.$picture["title"].'</div>';
											}
											if($adjustImagesize==true){
												/*$imgsize   = @getimagesize($picture["img"]);//0=width 1=height
												$imgwidth  = $imgsize[0];
												$imgheight = $imgsize[1];*/
												$imgwidth  = $picture["width"];
												$imgheight = $picture["height"];
												if($width>$height){//landscape
													//get new size
													$newimageheight=$height;
													$newimagewidth=($imgwidth/$imgheight)*$newimageheight;
													//check ob passt, sonst weiter verkleinern
													if($newimagewidth>$width){
														$newimagewidth2=$width;
														$newimageheight=($newimageheight/$newimagewidth)*$newimagewidth2;
														$newimagewidth=$newimagewidth2;
													}
												}else{//portrait
													//get new size
													$newimagewidth=$width;
													$newimageheight=($imgheight/$imgwidth)*$newimagewidth;
													//check ob passt, sonst weiter verkleinern
													if($newimageheight>$height){
														$newimageheight2=$height;
														$newimagewidth=($newimagewidth/$newimageheight)*$newimageheight2;
														$newimageheight=$newimageheight2;
													}
												}
												$style='width:'.($newimagewidth).'px; height:'.($newimageheight).'px; max-width:'.($newimagewidth).'px; ';
												
												
												//build Margins
												if($newimagewidth<$width){
													$style.='margin-left:'.(($width-$newimagewidth)/2+$margin_left).'px; ';
													$style.='margin-right:'.(($width-$newimagewidth)/2+$margin_right).'px; ';
												}else{
													$style.='margin-left:'.($margin_left).'px; ';
													$style.='margin-right:'.($margin_right).'px; ';
												}
												if($newimageheight<$height){
													$style.='margin-top:'.(($height-$newimageheight)/2+$margin_top).'px; ';
													$style.='margin-bottom:'.(($height-$newimageheight)/2+$margin_bottom).'px; ';
												}else{
													$style.='margin-top:'.($margin_top).'px; ';
													$style.='margin-bottom:'.($margin_bottom).'px; ';
												}

											}else{
												$style='width:'.($width).'px; height:'.($height).'px; max-width:'.($width).'px;';
											}
											$out .= '<img  src="'.$picture["img"].'" alt="'.$picture["title"].'" style="'.$style.'"/>';
											if($useCaptions==true||$adjustImagesize==true){
												 $out .= '</div>';
											}
										}
									}
				 $out .= '
							  </div> 
							</div>
					</div>
	
				</div>
			 ';
		  }else{

			   $out .= '
			  <div id="scrollgallery_'.$galleryID.'" class="scrollgallery" style="width:'.($width+26).'px;">
                                        <div class="scrollGalleryFoot"> 
                                                <div id="'.$thumbarea.'_'.$galleryID.'" class="thumbarea">
                                                        <div class="thumbareaContent">';
                                                                foreach ($pictures as $picture){
                                                                        if ($picture["img"]) {
                                                                                //Maximiliano Ozan ------------------------
                                                                                $vecUrl=explode("http://",$picture["thumb"]);
                                                                                if($vecUrl[2]!="")
																				{
																				$picture["thumb"]="http://".$vecUrl[2];

																				$thumbIMG=str_replace("images.eonline.com","putty.comcastnets.net:80/resize/70/70/0-0-293-293",$picture["thumb"]);
																				$thumbIMG=$thumbIMG."?api-key=eonlinelatino";
																				$thumbIMG=$picture["thumb"];
																				//http://putty.comcastnets.net:80/resize/200/200/0-0-293-293/eol_images/Entire_Site/2011712/reg_634.mcgowan.lc.081211.jpg?api-key=demo
													
																				}else{
																				$thumbIMG=$picture["thumb"];
																				}
                                                                                //Maximiliano Ozan ------------------------

                                                                                $out .= '<img width="70" src="'.$thumbIMG.'" alt="" />';
                                                                        }
                                                                }
                                $out .= '
                                                        </div> 
                                                </div>
                                        </div>
	
					<div class="scrollGalleryHead">
							<div id="'.$imagearea.'_'.$galleryID.'" class="imagearea" >
							  <div class="imageareaContent">';
									foreach ($pictures as $picture){

										//Maximiliano Ozan ------------------------
										$vecUrl=explode("http://",$picture["img"]);
										if($vecUrl[2]!="")$picture["img"]="http://".$vecUrl[2];
										//Maximiliano Ozan ------------------------

										if ($picture["img"]) {
											if($useCaptions==true||$adjustImagesize==true){
												 $out .= '<div class="caption_container">';
											}
											if($adjustImagesize==true){
												$imgsize   = @getimagesize($picture["img"]);//0=width 1=height
												$imgwidth  = $imgsize[0];
												$imgheight = $imgsize[1];
												/*$imgwidth  = $picture["width"];
												$imgheight = $picture["height"];*/
												if($width>$height){//landscape
													//get new size
													$newimageheight=$height;
													//if($imgheight=="0"||$imgheight=="")$imgheight="1";
													//echo("<br />here:".$imgheight);
												//Maximiliano Ozan Fix Plugin error log
                                                                                                        if($imgheight==""||$imgheight=="0")$imgheight="1";
													$newimagewidth=($imgwidth/$imgheight)*$newimageheight;
													//check ob passt, sonst weiter verkleinern
													if($newimagewidth>$width){
														$newimagewidth2=$width;
														$newimageheight=($newimageheight/$newimagewidth)*$newimagewidth2;
														$newimagewidth=$newimagewidth2;
													}
												}else{//portrait
													//get new size
													$newimagewidth=$width;
													if($imgwidth=="0"||$imgwidth=="")$imgwidth="1";

													$newimageheight=($imgheight/$imgwidth)*$newimagewidth;
													//check ob passt, sonst weiter verkleinern
													if($newimageheight>$height){
														$newimageheight2=$height;
														$newimagewidth=($newimagewidth/$newimageheight)*$newimageheight2;
														$newimageheight=$newimageheight2;
													}
												}
												$style='width:'.($newimagewidth).'px; height:'.($newimageheight).'px; max-width:'.($newimagewidth).'px; ';
												$styleCaption='width:'.($newimagewidth).'px;max-width:'.($newimagewidth).'px; ';
												
												//build Margins
												if($newimagewidth<$width){
													$style.='margin-left:'.(($width-$newimagewidth)/2+$margin_left).'px; ';
													$style.='margin-right:'.(($width-$newimagewidth)/2+$margin_right).'px; ';

													$styleCaption.='margin-left:'.((($width-$newimagewidth)/2+$margin_left)+5).'px; ';
													$styleCaption.='margin-right:'.(($width-$newimagewidth)/2+$margin_right).'px; ';

													//exit($styleCaption);
												}else{
													$style.='margin-left:'.($margin_left).'px; ';
													$style.='margin-right:'.($margin_right).'px; ';
					
													$styleCaption.='margin-left:'.($margin_left+5).'px; ';
                                                    $styleCaption.='margin-right:'.($margin_right).'px; ';
													//exit($styleCaption);
												}
												/*if($newimageheight<$height){
													$style.='margin-top:'.(($height-$newimageheight)/2+$margin_top).'px; ';
													$style.='margin-bottom:'.(($height-$newimageheight)/2+$margin_bottom).'px; ';
												}else{
													$style.='margin-top:'.($margin_top).'px; ';
													$style.='margin-bottom:'.($margin_bottom).'px; ';
												}*/
												$styleCaption.='width:'.($newimagewidth-20).'px;';
											}else{
												$style='width:'.($width).'px; height:'.($height).'px; max-width:'.($width).'px;';
												$styleCaption='width:'.($width).'px; height:'.($height).'px; max-width:'.($width).'px;';
											}
											$out .= '<img  src="'.$picture["img"].'" alt="'.$picture["title"].'" style="vertical-align:top; '.$style.'" />';
											
											if($useCaptions==true||$adjustImagesize==true){
												$styleCaption.='margin-top:'.($newimageheight-67).'px;';
												$styleCaption.='background-color: rgba(0,0,0,0.6);padding:10px;color:yellow;height:50px;';
												//exit($style."<br />".$styleCaption);
														$out .='<div style="'.$styleCaption.'">'.html_entity_decode($picture["title"]).'</div>';
												 $out .= '</div>';
											}
										}
									}
				 $out .= '
							  </div> 
							</div>
					</div>';
					/*<div class="scrollGalleryFoot" >
						<div id="'.$thumbarea.'_'.$galleryID.'" class="thumbarea">
							<div class="thumbareaContent">';
								foreach ($pictures as $picture){
									if ($picture["img"]) {
										//Maximiliano Ozan ------------------------
                                                                                $vecUrl=explode("http://",$picture["thumb"]);
                                                                                if($vecUrl[2]!="")$picture["thumb"]="http://".$vecUrl[2];
                                                                                //Maximiliano Ozan ------------------------

										$out .= '<img width="50" src="'.$picture["thumb"].'" alt="NextGen ScrollGallery thumbnail" />';
									}
								}
				$out .= '
							</div> 
						</div>
					</div>*/
			$out .= '
				</div>
			 ';
		  }
		  return $out;  
	  }
	  //admin
	  function admin_menu() {  
		add_menu_page('ScrollGallery', 'ScrollGallery', 'manage_options', plugin_basename( dirname(__FILE__)), array($this, 'admin_general_page')); // add Admin Menu
	  } 
	  function admin_general_page() {
		global $wpdb;
		?>    
		<div class="wrap">
		  <h2>NextGen ScrollGallery</h2>  
           <form action="options.php" method="post" id="post" name="post">  
           <div class="metabox-holder has-right-sidebar" id="poststuff">
				<div class="inner-sidebar" id="side-info-column">
          			<?php  do_meta_boxes( plugin_basename( dirname(__FILE__)), 'side', NULL); ?>
                </div>
         		<div id="post-body">
					<div id="post-body-content">
                    	<div id="normal-sortables" class="meta-box-sortables">
                        	<div id="scrollGallery_main_box" class="postbox ">
								<?php settings_fields('nggSG_options'); ?>
                                <?php do_settings_sections('nggSG_options_section_el'); ?>
                                <div class="inside">
                                    <p><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" style="margin-left:220px"/></p>
                                    <p>&nbsp;</p>
                                    <p>To Add a gallery to your post/page. <br/>Enter the tag <table style="background-color:#6CF; padding:4px;"><tr><td>[scrollGallery id=xxx]</td></tr></table><br/> in your text. You have to replace xxx with your gallery id like all NextGen Gallerys.</p>
                                    <p>The Options can also set in the post/page tag. For example: <table style="background-color:#6CF; padding:4px;"><tr><td>[scrollGallery id=1 start=5 autoScroll=false thumbsdown=true]</td></tr></table></p>
                      
                                    <p>That's it ... Have fun</p>
                                </div>
                        	</div>
               			 </div>
                     </div>
                     <br class="clear"/>
                </div>
		  </form>
		</div>
        <div class="clear"></div>
		<?php
	 }  
	 function admin_init() {
		global $scrollGallery;
		if ( !defined('NGGALLERY_ABSPATH') ) {//check if NGG Plugin is activated
			add_action('admin_notices', array($scrollGallery, 'admin_notices'));
		}
		//meta boxes
		add_meta_box('scrollGallery_meta_box', 'Do you like this Plugin?', array($this, 'nggSG_like_MetaBox'), plugin_basename( dirname(__FILE__)), 'side', 'core');//add_meta_box('scrollGallery_meta_box', 'Do you like this Plugin?', array($scrollGallery, 'nggSG_like_MetaBox'), 'nextgen-scrollgallery', 'right', 'core');
		//form
		register_setting( 'nggSG_options', 'SG_Options', array($scrollGallery,'nggSG_options_validate') );
		add_settings_section('nggSG_options_section', 'ScrollGallery Options', array($scrollGallery,'nggSG_options_section_html'), 'nggSG_options_section_el');
		add_settings_field('nggSG_options_field0', 'Gallery design, see plugin-folder scrollGallery/css/', array($scrollGallery,'nggSG_options_field_html_design'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field1', 'start: (number) start at picture number ... the first picture is number 0', array($scrollGallery,'nggSG_options_field_html_start'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field2', 'area: (number) width of the area to scroll left or right', array($scrollGallery,'nggSG_options_field_html_area'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field3', 'thumbarea: (string) div class name for the thumbs', array($scrollGallery,'nggSG_options_field_html_thumbarea'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field4', 'imagearea: (string) div class name for the images', array($scrollGallery,'nggSG_options_field_html_imagearea'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field5', 'speed: (number) 0<=speed<=1 thumb scroll speed', array($scrollGallery,'nggSG_options_field_html_speed'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field6', 'clickable: (boolean) images can be clicked', array($scrollGallery,'nggSG_options_field_html_clickable'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field7', 'autoScroll: (boolean) autoscroll thumbs', array($scrollGallery,'nggSG_options_field_html_autoScroll'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field8', 'useCaptions: (boolean) use captions or not (IE7 is not supported)', array($scrollGallery,'nggSG_options_field_html_useCaptions'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field9', 'thumbsdown: (boolean) set the thumbs under the images', array($scrollGallery,'nggSG_options_field_html_thumbsdown'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field10', 'width: (number) image width', array($scrollGallery,'nggSG_options_field_html_w'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field11', 'height: (number) image height', array($scrollGallery,'nggSG_options_field_html_h'), 'nggSG_options_section_el', 'nggSG_options_section');
		add_settings_field('nggSG_options_field12', 'adjustImagesize: (boolean) adjust the imagesize', array($scrollGallery,'nggSG_options_field_html_adjustImagesize'), 'nggSG_options_section_el', 'nggSG_options_section');
	 }
	 function nggSG_options_section_html() {
	  // echo '<p>Here you can change the global ScrollGallery options:</p>';
	 }
	 function nggSG_options_field_html_design() {
	    $options = get_option("SG_Options");
		$act_cssfile = $options['SG_design'];
		echo '<select name="SG_Options[SG_design]" onchange="this.form.submit();">';
				$csslist = $this->nggSG_get_cssfiles();
				foreach ($csslist as $key =>$a_cssfile) {
					$css_name = $a_cssfile['Name'];
					if ($key == $act_cssfile) {
						$file_show = $key;
						$selected = " selected='selected'";
						$act_css_description = $a_cssfile['Description'];
						$act_css_author = $a_cssfile['Author'];
						$act_css_version = $a_cssfile['Version'];
						$act_css_margin = $a_cssfile['ImgMargins'];//needed margins around the img
						$act_css_name = esc_attr($css_name);
					}
					else $selected = '';
					$css_name = esc_attr($css_name);
					echo "\n\t<option value=\"$key\" $selected>$css_name</option>";
				}
			
		echo "</select>
		
		<p><strong>Active design:</strong> $act_css_name<br/>
		Autor: $act_css_author<br/>
		Version: $act_css_version<br/>
		Description: $act_css_description</p>";
	 }
 	 function nggSG_options_field_html_start() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_start]' size='3' type='text' value='{$options['SG_start']}' />";
	 }
	 function nggSG_options_field_html_area() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_area]' size='4' type='text' value='{$options['SG_area']}' />";
	 }
	 function nggSG_options_field_html_thumbarea() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_thumbarea]' size='10' type='text' value='{$options['SG_thumbarea']}' />";
	 }
	 function nggSG_options_field_html_imagearea() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_imagearea]' size='10' type='text' value='{$options['SG_imagearea']}' />";
	 }
	 function nggSG_options_field_html_speed() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_speed]' size='3' type='text' value='{$options['SG_speed']}' />";
	 }
	 function nggSG_options_field_html_clickable() {
		$options = get_option("SG_Options");
		echo "<input type='checkbox' name='SG_Options[SG_clickable]' value='1' ".($options["SG_clickable"]?"checked='checked'":"")."/>";
	 }
	 function nggSG_options_field_html_autoScroll() {
		$options = get_option("SG_Options");
		echo "<input type='checkbox' name='SG_Options[SG_autoScroll]' value='1' ".($options["SG_autoScroll"]?"checked='checked'":"")."/>";
	 }
	 function nggSG_options_field_html_useCaptions() {
		$options = get_option("SG_Options");
		echo "<input type='checkbox' name='SG_Options[SG_useCaptions]' value='1' ".($options["SG_useCaptions"]?"checked='checked'":"")."/>";
	 }
	 function nggSG_options_field_html_thumbsdown() {
		$options = get_option("SG_Options");
		echo "<input type='checkbox' name='SG_Options[SG_thumbsdown]' value='1' ".($options["SG_thumbsdown"]?"checked='checked'":"")."/>";
	 }
	 function nggSG_options_field_html_w() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_width]' size='3' type='text' value='{$options['SG_width']}' />";
	 }
	 function nggSG_options_field_html_h() {
		$options = get_option("SG_Options");
		echo "<input  name='SG_Options[SG_height]' size='3' type='text' value='{$options['SG_height']}' />";
	 }
	 function nggSG_options_field_html_adjustImagesize() {
		$options = get_option("SG_Options");
		echo "<input type='checkbox' name='SG_Options[SG_adjustImagesize]' value='1' ".($options["SG_adjustImagesize"]?"checked='checked'":"")."/>";
	 }
	 function nggSG_options_validate($input) {
		
		$input['SG_design']  = (string) (isset( $input['SG_design'] ) ? htmlspecialchars(stripslashes($input['SG_design']), ENT_QUOTES, 'UTF-8') : "scrollGallery_greyDesign.css");
		$input['SG_start']  = (int) (is_numeric( $input['SG_start'] ) ? $input['SG_start'] : 0);
		$input['SG_area']  = (int) is_numeric( $input['SG_area'] ) ? $input['SG_area'] : 200;
		$input['SG_thumbarea']  = (string) (isset( $input['SG_thumbarea'] ) ? htmlspecialchars(stripslashes($input['SG_thumbarea']), ENT_QUOTES, 'UTF-8') : "thumbarea");
		$input['SG_imagearea']  = (string) (isset( $input['SG_imagearea'] ) ? htmlspecialchars(stripslashes($input['SG_imagearea']), ENT_QUOTES, 'UTF-8') : "imagearea");
		$input['SG_speed']  = (string) (isset( $input['SG_speed'] ) ? htmlspecialchars(stripslashes($input['SG_speed']), ENT_QUOTES, 'UTF-8') : "0.1");
		$input['SG_clickable']  = (bool) (isset( $input['SG_clickable'] ) ? 1 : 0);
		$input['SG_autoScroll']  = (bool) (isset( $input['SG_autoScroll'] ) ? 1 : 0);
		$input['SG_useCaptions']  = (bool) (isset( $input['SG_useCaptions'] ) ? 1 : 0);
		$input['SG_thumbsdown']  = (bool) (isset( $input['SG_thumbsdown'] ) ? 1 : 0);
		$input['SG_width']  = (int) (is_numeric( $input['SG_width'] ) ? $input['SG_width'] : 640);
		$input['SG_height']  = (int) (is_numeric( $input['SG_height'] ) ? $input['SG_height'] : 480);
		$input['SG_adjustImagesize']  = (bool) (isset( $input['SG_adjustImagesize'] ) ? 1 : 0);
		
		//save margins
		$act_cssfile = $input['SG_design'];
		$csslist = $this->nggSG_get_cssfiles();
		foreach ($csslist as $key =>$a_cssfile) {
			if ($key == $act_cssfile) {
				$input['SG_design_margin'] = (string) ((isset( $a_cssfile['ImgMargins'] )&&$a_cssfile['ImgMargins']!='') ?  htmlspecialchars(stripslashes($a_cssfile['ImgMargins'])) : "0px 0px 0px 0px;");//needed margins around the img
			}
		}
		return $input;
	 }
	 function admin_notices() {
		if ( !defined('NGGALLERY_ABSPATH') ) {//check if NGG Plugin is activated
			$this->show_message("You have to install and activate the plugin <strong>NextGEN Gallery</strong>!");
		}
	 }
	 function show_error($message) {
		echo '<div class="wrap"><h2></h2><div class="error" id="error"><p>' . $message . '</p></div></div>';
	 }
	 function show_message($message) {
		echo '<div class="wrap"><h2></h2><div class="updated fade" id="message"><p>' . $message . '</p></div></div>';
	 }
	 /**********************************************************/
	 // ### Code from wordpress plugin NGG
	 // read in the css files
	 function nggSG_get_cssfiles() {
		
		global $cssfiles;
		
		if (isset ($cssfiles)) {
			return $cssfiles;
		}
	
		$cssfiles = array ();
		
		$plugin_root = ABSPATH.'wp-content/plugins/nextgen-scrollgallery/scrollGallery/css';
		$plugins_dir = @ dir($plugin_root);
		
		if ($plugins_dir) {
			while (($file = $plugins_dir->read()) !== false) {
				if (preg_match('|^\.+$|', $file))
					continue;
				if (is_dir($plugin_root.'/'.$file)) {
					$plugins_subdir = @ dir($plugin_root.'/'.$file);
					if ($plugins_subdir) {
						while (($subfile = $plugins_subdir->read()) !== false) {
							if (preg_match('|^\.+$|', $subfile))
								continue;
							if (preg_match('|\.css$|', $subfile))
								$plugin_files[] = "$file/$subfile";
						}
					}
				} else {
					if (preg_match('|\.css$|', $file))
						$plugin_files[] = $file;
				}
			}
		}
		if ( !$plugins_dir || !$plugin_files )
			return $cssfiles;
	
		foreach ( $plugin_files as $plugin_file ) {
			if ( !is_readable("$plugin_root/$plugin_file"))
				continue;
	
			$plugin_data = $this->nggSG_get_cssfiles_data("$plugin_root/$plugin_file");
	
			if ( empty ($plugin_data['Name']) )
				continue;
	
			$cssfiles[plugin_basename($plugin_file)] = $plugin_data;
		}
	
		uasort($cssfiles, create_function('$a, $b', 'return strnatcasecmp($a["Name"], $b["Name"]);'));
	
		return $cssfiles;
	 }
	 // parse the Header information
	 function nggSG_get_cssfiles_data($plugin_file) {
		$plugin_data = implode('', file($plugin_file));
		preg_match("|CSS Name:(.*)|i", $plugin_data, $plugin_name);
		preg_match("|Description:(.*)|i", $plugin_data, $description);
		preg_match("|Author:(.*)|i", $plugin_data, $author_name);
		if (preg_match("|Version:(.*)|i", $plugin_data, $version))
			$version = trim($version[1]);
		else
			$version = '';
		
		if (preg_match("|ImgMargins:(.*)|i", $plugin_data, $img_margins)){
			$img_margins = preg_replace('/\\\s\\\s+/', ' ',trim($img_margins[1]));//delete more than one spaces
			if (substr($img_margins, -1) == ';') { //and the ;
				$img_margins = substr($img_margins, 0, -1); 
			}  
		}else{
			$img_margins = '';
		}
		$description = wptexturize(trim($description[1]));
		$name = trim($plugin_name[1]);
		$author = trim($author_name[1]);
	
		return array ('Name' => $name, 'Description' => $description, 'Author' => $author, 'Version' => $version, 'ImgMargins' => $img_margins );
	 }
	 function nggSG_like_MetaBox(){
		 echo '<p>This plugin is developed by <br/><a href="http://www.BMo-Design.de" target="_blank">Benedikt Morschheuser</a>.<br/>Any kind of contribution would be highly appreciated. Thank you!</p>
		 <ul>
		 	<li>&nbsp;</li>
		 	<li><a href="http://wordpress.org/extend/plugins/nextgen-scrollgallery/" target="_blank">If you like it, pleace rate it at wordpress.org</a> &diams;</li>
			<li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4AWSR2J4DK2FU" target="_blank">Donate my work</a> &hearts;</li>
			<li>&nbsp;</li>
			<li>If you are a stylesheet-designer, send me your <a href="http://bmo-design.de/kontakt/" target="_blank">custom gallery css</a> &raquo;</li>
		</ul>';
	 }
	 function nggSGhHeadAdmin() {
	   //admin Header
	 }
	 //install
	 function install() {
		$options = array(
			'SG_design'=>'scrollGallery_greyDesign.css',
			'SG_design_margin'=>'0px 0px 0px 0px;',
			'SG_start'=>'0',
			'SG_area'=>'200',
			'SG_thumbarea'=>'thumbarea',
			'SG_imagearea'=>'imagearea',
			'SG_speed'=>'0.1',
			'SG_clickable'=> true,
			'SG_autoScroll'=> true,
			'SG_useCaptions'=> false,
			'SG_thumbsdown'=> false,
			'SG_width'=>'640',
			'SG_height'=>'480',
			'SG_adjustImagesize'=> true,);
		add_option("SG_Options",$options);
	 }
	 function deinstall() {
		delete_option("SG_Options");
		wp_deregister_script(array('mootools'));
		wp_deregister_script(array('scrollGallery'));
	 }
}

//init and build
function scrollGallery_show($content) {
  global $scrollGallery;
  
  echo $scrollGallery->nggScrollGalleryReplace($content);
}

$scrollGallery = new ScrollGallery();

if (isset($scrollGallery)) {
	// Plugin installieren bei aktivate
	register_activation_hook( __FILE__,  array($scrollGallery, 'install') );
	register_deactivation_hook(__FILE__, array($scrollGallery, 'deinstall'));
	add_action('admin_menu' , array($scrollGallery, 'admin_menu'));//add menu
	add_action('admin_init', array($scrollGallery, 'admin_init'));//init settings for Admin Page
	add_filter('the_content', array($scrollGallery, 'nggScrollGalleryReplace'));//replace content, old Version
	add_shortcode('scrollGallery', array($scrollGallery, 'nggScrollGalleryReplaceShortcode'));//replace the shortcode, everywhere, new Version
	//add_filter('the_excerpt', array($scrollGallery, 'nggScrollGalleryReplace'));//replace content in the_excerpt, Uncomment it on your own risk
	// Hook wp_head to add css
	add_action('wp_head'   , array($scrollGallery,'nggSGHead'),1);
	add_action('admin_head'   , array($scrollGallery,'nggSGhHeadAdmin'));
}
?>
