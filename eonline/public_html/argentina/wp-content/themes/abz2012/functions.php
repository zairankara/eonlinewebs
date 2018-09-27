<?php
/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
function shortcode_adrenaline( $atts ){
  return '<a id="adlneF1Scr" data-tag="adrenalineTag"></a>';
}
add_shortcode( 'adrenaline', 'shortcode_adrenaline' );



function obtener_date(){
    $datetime = new DateTime($post->post_date);
    return $datetime->format(DateTime::ISO8601);
}

/* agrego a body las categorys a las que pertence la nota*/
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes, $class= null) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = 'category-' . $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
}
/* agrego a body las categorys a las que pertence la nota*/


function conn_generico($feed){
	$conn_generico = new wpdb('eonline_usr','30nl1n3','generic_db','preprodabzdb');
	$sqlstr="SELECT * FROM tb_adunits WHERE idFeed=".$feed;
	$result = $conn_generico->get_results( $sqlstr, ARRAY_A);
	wp_reset_query();
	return $result;
}

function execute_define($Section, $ConArray, $idPost, $name_feedDFP, $name_sectionDFP, $category=NULL, $postSlug=NULL){
	foreach ($ConArray as $key) {

		$settar="";
		$cod="";
		$id_cod="";
		$typeDefine="";
		$size="";
		$size_1="";
		$size_2="";

	
		if($key["adunit"]=="FloorAd"){
			$typeDefine="defineOutOfPageSlot";
			$size="";
			$cod="-floorad";
		}else{
			$typeDefine="defineSlot";
			$size=", [".$key["size"]."]";
			$size_1=$key["size"];
			$size_2="-".str_replace(", ", "x", $size_1);
		}


		if($key["adunit"]=="Patrocinio_post" && $key["idPost"]!="0") {
			$cod="-".$key["idPost"];
			$id_cod=$key["idPost"];
			$settar=".setTargeting('postid', '".$id_cod."')";

			//Ven en home si hay algun patrocinio de nota
			if($Section=="Homepage"){
				$id_cod=$key["idPost"];
				$result.="googletag.defineSlot('/8877/".$name_feedDFP."/Homepage/Patrocinio_post', [310, 30], 'div-gpt-ad-home-310x30-".$id_cod."').addService(googletag.pubads()).setTargeting('postid', '".$id_cod."');\n";
			}
		}

		if($key["Section"]==$Section){
			// Si es nota
			if($key["Section"]=="Nota"){
					//si es LA nota
					if($idPost==$key["idPost"]){
						$slug="Post";
						$result.="googletag.".$typeDefine."('/8877/".$name_feedDFP."/".$name_sectionDFP."/".$key["adunit"]."'".$size.", 'div-gpt-ad-".$slug.$size_2."".$cod."').addService(googletag.pubads())".$settar.";"."\n";
					}elseif($key["tipoNota"]=="todas"){
						//para todas las notas
						$slug="Post";
						$result.="googletag.".$typeDefine."('/8877/".$name_feedDFP."/".$name_sectionDFP."/".$key["adunit"]."'".$size.", 'div-gpt-ad-".$slug.$size_2."".$cod."').addService(googletag.pubads())".$settar.";"."\n";
					}elseif($key["tipoNota"]=="xcat"){
						
						//pregunto si la seccion coincide con algunas de las secciones de la nota
						if(in_array($key["slugPost"], $category)){
							$slug="Post";
							$result.="googletag.".$typeDefine."('/8877/".$name_feedDFP."/".$name_sectionDFP."/".$key["adunit"]."'".$size.", 'div-gpt-ad-".$slug.$size_2."".$cod."').addService(googletag.pubads())".$settar.";"."\n";
						}
					}
			}elseif($key["Section"]=="Category" || $key["Section"]=="Page"){
				//Si es otra seccion
				$slug=$key["Slug"];
				if($slug==$postSlug) $result.="googletag.".$typeDefine."('/8877/".$name_feedDFP."/".$name_sectionDFP."/".$key["adunit"]."'".$size.", 'div-gpt-ad-".$slug.$size_2."".$cod."').addService(googletag.pubads())".$settar.";"."\n";
		
			}else{
				//Si es otra seccion
				$slug=$key["Slug"];
				if($slug) $result.="googletag.".$typeDefine."('/8877/".$name_feedDFP."/".$name_sectionDFP."/".$key["adunit"]."'".$size.", 'div-gpt-ad-".$slug.$size_2."".$cod."').addService(googletag.pubads())".$settar.";"."\n";
		
			}
		}
	}

	return $result;

}

function que_masthead_es(){
	global $wp_query;

	if(is_home() || is_search() || is_tag() || is_404()){
		$postSlug="home";
	}elseif(is_category()){
		$cat = get_term_by('name', single_cat_title('',false), 'category');
		$postSlug=$cat->slug;
	}elseif(is_page()){
		$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
		$postSlug=$postSlug[3];
		if(is_page("galerias")){
			$postSlug=explode("?", $postSlug);
			$postSlug=$postSlug[0];
		}
	}elseif(is_single()){
		$postSlug="Post";
	}

	$script_div="<div id='div-gpt-ad-".$postSlug."-970x250' class='hideMobify' style='float:left; margin:10px 5px; '>
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$postSlug."-970x250');
		</script>
		</div>";
	return $script_div;
}

function que_doublebox_es(){
	global $wp_query;

	if(is_home() || is_search() || is_tag() || is_404()){
		$postSlug="home";
	}elseif(is_category()){
		$cat = get_term_by('name', single_cat_title('',false), 'category');
		$postSlug=$cat->slug;
	}elseif(is_page()){
		$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
		$postSlug=$postSlug[3];
		if(is_page("galerias")){
			$postSlug=explode("?", $postSlug);
			$postSlug=$postSlug[0];
		}
	}elseif(is_single()){
		$postSlug="Post";
	}

	$script_div="<div id='div-gpt-ad-".$postSlug."-300x600' class='hideMobify' style='margin-bottom: 10px;'>
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$postSlug."-300x600');
		</script>
		</div>";
	return $script_div;
}

function que_300x100_es(){
	global $wp_query;

	if(is_home() || is_search() || is_tag() || is_404()){
		$postSlug="home";
	}elseif(is_category()){
		$cat = get_term_by('name', single_cat_title('',false), 'category');
		$postSlug=$cat->slug;
	}elseif(is_page()){
		$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
		$postSlug=$postSlug[3];
		if(is_page("galerias")){
			$postSlug=explode("?", $postSlug);
			$postSlug=$postSlug[0];
		}
	}elseif(is_single()){
		$postSlug="Post";
	}

	$script_div="<div id='div-gpt-ad-".$postSlug."-300x100' class='hideMobify' style='margin:10px 5px;'>
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$postSlug."-300x100');
		</script>
		</div>";
	return $script_div;
}

	function que_billboard_es(){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
				$postSlug="home";
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}

		$script_div="<div id='div-gpt-ad-".$postSlug."-970x31' class='borde_billboard_banner hideMobify billboardAD'>
			<script type='text/javascript'>
			googletag.display('div-gpt-ad-".$postSlug."-970x31');
			</script>
			</div>";
		return $script_div;
	}

	function que_pushdown_es(){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
				$postSlug="home";
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}

		$script_div="<div id='div-gpt-ad-".$postSlug."-970x90' class='borde_billboard_banner hideMobify pushdownAD'>
			<script type='text/javascript'>
			googletag.display('div-gpt-ad-".$postSlug."-970x90');
			</script>
			</div>";
		return $script_div;
	}


function nggScrollGalleryReplace($content) {
	global $wpdb;

	$p = '/(\[scrollGallery\sid=.*\s*\])/i';

	$result = preg_match_all($p,$content,$matches);
	
	/*if($_GET["abz"]!=""){
	 	var_dump($matches[0]);
	 	echo $content;
	}*/
	if($matches[0]!=NULL){

		foreach($matches as $resultado){
			$getres=str_replace("[scrollGallery id=", "", $resultado);
			$getId_gall=str_replace(" start=5 autoScroll=false thumbsdown=true]", "", $getres);
			

			foreach($getId_gall as $n){
				$array_img[]=obtener_galerias($n,"4","pg.orden","ASC",NULL);
			}
			
		}

		$i=0;
		foreach($array_img as $images)
			{

					$k=0;
						
					foreach($images as $image){
							$urlImg=$image["filename"];
							$vecUrl=explode("http://",$image["filename"]);
							$id_galeria=$image["gid"];
							$title=$image["title"];
							$title_gal=$image["title_gal"];

							$armo_cadena[$i][]="
								<div class='imagen_post'>
									<a href='".home_url( '/' )."pagina/galerias?gallery=".$id_galeria."' rel='bookmark'>
									<img src='". url_resize_sola($urlImg,260)."'  />
									</a>
								</div>";
							
						$k++;
					
					}
					$cadena[] = "<a href='".home_url( '/' )."pagina/galerias?gallery=".$id_galeria."' rel='bookmark' class='titulo_modulo' style='color:#fff;width:100%;'>".$title_gal."</a><div class='general' id='newscrollgallery'><div id='tira'>".implode("",$armo_cadena[$i])."</div><div class='bot_vermas'><a href='".home_url( '/' )."pagina/galerias/?gallery=".$id_galeria."' class='vermais' rel='bookmark'>Ver más fotos</a></div></div>";
					$contenido = str_replace($matches[0], $cadena, $content);
				$i++;
			}
	}else{
		$contenido=$content;
	}

	return $contenido;

}



// Order by post in search
function change_order($orderby, $query) {
	global $wpdb;
	if(is_search())
		$orderby = "wp_posts.post_date DESC";
	return $orderby;
}
add_filter('posts_orderby','change_order');


/* CAMBIAR LOGO ADMIN*/
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-login.png);
            width: 280px;
            -webkit-background-size: 280px 80px;
			background-size: 280px 80px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );



	function que_floating_es($width,$height,$datos){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
				$postSlug="home";
		/*}elseif(is_single()){
				$array_count=explode(",", get_the_category_list( ', ' ));
				if(count($array_count)>1){
					$postSlug="home";
				}else{
					$get_cat = get_the_category();
	  				$postSlug = $get_cat[0]->slug;
				}*/
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){

			/*$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}*/

			$parent = get_page();
			$postSlug=$parent->post_name;

		}elseif(is_single()){
			$postSlug="Post";
		}
		if($datos!=""){
			$adicional="-".$datos;
		}else{
			$adicional="";
		}
		
		$script_div="<div id='div-gpt-ad-".$postSlug."-".$width."x".$height."' class='floating hideMobify'>
				<a href='#' style='float:right' onclick=\"javascript:document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."').parentNode.removeChild(document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."')); document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."').remove();\"><img src='/common/imgs/boton_cerrar.gif' alt='boton cerrar'></a>
				<div class='floating_content_table'>
					<script type='text/javascript'>
					googletag.display('div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."');
					</script>
				</div>
		</div>";
		return $script_div;
	}

	function que_floorAd_es(){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
				$postSlug="home";
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}

		$script_div="<div id='div-gpt-ad-".$postSlug."-floorad' class='hideMobify'>
			<script type='text/javascript'>
			googletag.display('div-gpt-ad-".$postSlug."-floorad');
			</script>
			</div>";
		return $script_div;
	}

	function que_floating_3ros_es(){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
				$postSlug="home";
		/*}elseif(is_single()){
				$array_count=explode(",", get_the_category_list( ', ' ));
				if(count($array_count)>1){
					$postSlug="home";
				}else{
					$get_cat = get_the_category();
	  				$postSlug = $get_cat[0]->slug;
				}*/
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}

		$script_div="<div id='div-gpt-ad-".$postSlug."-floating_3ros' class='hideMobify'>
			<script type='text/javascript'>
			googletag.display('div-gpt-ad-".$postSlug."-floating_3ros');
			</script>
			</div>";
		return $script_div;
	}
	
function meta_alternate(){
	global $wp_query;
	$meta="";
	if(is_home()){
		$meta.="<link rel='alternate' hreflang='es' href='http://la.eonline.com/andes/' />";
		$meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina/' />";
		$meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico/' />";
		$meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela/' />";
	}elseif(is_category()){
		$cat = get_term_by('name', single_cat_title('',false), 'category'); 
		$postSlug=$cat->slug;
		$meta.="<link rel='alternate' hreflang='es' href='http://la.eonline.com/andes/category/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina/category/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico/category/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela/category/".$postSlug."' />";
	}elseif(is_page()){
		$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
		$postSlug=$postSlug[3];
		if(is_page("galerias")){
			$postSlug=explode("?", $postSlug);
			$postSlug=$postSlug[0];
		}
		$meta.="<link rel='alternate' hreflang='es' href='http://la.eonline.com/andes/pagina/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina/pagina/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico/pagina/".$postSlug."' />";
		$meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela/pagina/".$postSlug."' />";
	}elseif(is_single() || is_search() || is_tag()){	
		$url_texto=str_replace("/argentina/","/",$_SERVER["REQUEST_URI"]);
		$meta.="<link rel='alternate' hreflang='es' href='http://la.eonline.com/andes".$url_texto."' />";
		$meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina".$url_texto."' />";
		$meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico".$url_texto."' />";
		$meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela".$url_texto."' />";
	}

	return $meta;
}

// TRAE LA GALERIA
function obtener_galerias($id_gal, $limit, $order, $orientacion, $group){
	if($id_gal==NULL){
		$id_gal=" ";
	}else{
		$id_gal="AND ng.id=".$id_gal;
	}
	if($limit==NULL){
		$limit_src=" ";
	}else{
		$limit_src=" LIMIT ".$limit;
	}
	if($group==NULL){
		$group_src=" ";
	}else{
		$group_src=" GROUP by ".$group;
	}
	$mydb3 = new wpdb('eonline_usr','30nl1n3','galleries','preprodabzdb');
	$sqlstr="SELECT np.*, ng.title AS title_gal, ng.id as gid FROM picture np INNER JOIN pictures_galleries pg ON pg.picture_id=np.id INNER JOIN gallery ng ON ng.id=pg.gallery_id ".$id_gal." AND pg.gallery_id=ng.id ".$group_src." ORDER by ".$order." ".$orientacion." ".$limit_src.";";
	$galleries = $mydb3->get_results($sqlstr, ARRAY_A);
	wp_reset_query();
	return $galleries;
}

function obtener_galerias_page($id_gal, $limit, $order, $orientacion, $group){
	if($id_gal==NULL){
		$id_gal=" ";
	}else{
		$id_gal="AND ng.id=".$id_gal;
	}
	if($limit==NULL){
		$limit_src=" ";
	}else{
		$limit_src=" LIMIT ".$limit;
	}
	if($group==NULL){
		$group_src=" ";
	}else{
		$group_src=" GROUP by ".$group;
	}
	$mydb3 = new wpdb('eonline_usr','30nl1n3','galleries','preprodabzdb');
	$sqlstr="SELECT np.*, ng.title AS title_gal, ng.id as gid FROM picture np INNER JOIN pictures_galleries pg ON pg.picture_id=np.id INNER JOIN gallery ng ON ng.id=pg.gallery_id ".$id_gal." AND pg.gallery_id=ng.id AND pg.orden=1  ".$group_src." ORDER by ".$order." ".$orientacion." ".$limit_src.";";
	$galleries = $mydb3->get_results($sqlstr, ARRAY_A);
	wp_reset_query();
	return $galleries;
}

function obtener_galerias_string($string, $limit, $order, $orientacion, $group){
	if($string==NULL){
		$string=" ";
	}else{
		$string="AND ng.title LIKE '%".$string."%'";
	}
	if($limit==NULL){
		$limit_src=" ";
	}else{
		$limit_src=" LIMIT ".$limit;
	}
	if($group==NULL){
		$group_src=" ";
	}else{
		$group_src=" GROUP by ".$group;
	}
	$mydb3 = new wpdb('eonline_usr','30nl1n3','galleries','preprodabzdb');
	$sqlstr="SELECT np.*, ng.title AS title_gal, ng.id as gid FROM picture np INNER JOIN pictures_galleries pg ON pg.picture_id=np.id INNER JOIN gallery ng ON ng.id=pg.gallery_id ".$string." AND pg.gallery_id=ng.id AND pg.orden=1  ".$group_src." ORDER by ".$order." ".$orientacion." ".$limit_src.";";
	$galleries = $mydb3->get_results($sqlstr, ARRAY_A);
	wp_reset_query();
	return $galleries;
}


// Remove rel attribute from the category list
function remove_category_list_rel( $output ) {
    return str_replace( ' rel="category tag"', 'rel="category"', $output );
}
add_filter( 'wp_list_categories', 'remove_category_list_rel' );
add_filter( 'the_category', 'remove_category_list_rel' );


//FUNCTION PARA RESIZER IMGS
function url_resize($Html_ch, $width_column=310){
	/*$Html_ch=str_replace("src=", "SRC=", $Html_ch);
	$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';
	preg_match_all( $extrae2 , $Html_ch , $matches2 );
	$image2 = $matches2[1][0];
	$rest = substr($image2, -4);
	if($rest!=".gif" || $rest!=".png"){
		$extrae3 = explode("//rs_",$image2);
		if($extrae3[1]!=""){
			$image3 = explode("-",$extrae3[1]);
			$image3=$image3[0];

			$image_wh = explode("x",$image3);
			$image_w = $image_wh[0];
			$image_h = $image_wh[1];

			if($image_w>$width_column){
				$image2=str_replace("http://", "", $image2);
				$regla=round($image_h*$width_column/$image_w);
		 		$url="http://www.eonline.com/resize/$width_column/$regla/$image2";
			}else{
				$url=$image2;
			}
		}else{
			$url=$image2;
		}
	}else{
		$url=$image2;
	}

	return $url;*/
	//http://www.eonline.com/resize/
	$Html_ch=str_replace("src=", "SRC=", $Html_ch);
	
	preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $Html_ch, $array);
    $image2 = array_pop($array);
	
	$posPNG = strpos($image2, ".png");
	$posGIF = strpos($image2, ".gif");
	if($posPNG!== FALSE || $posPNG!== $posGIF){
		$url=$image2;
	}else{
		$extrae3 = explode("//rs_",$image2);
		if($extrae3[1]!=""){
			$image3 = explode("-",$extrae3[1]);
			$image3=$image3[0];

			$image_wh = explode("x",$image3);
			$image_w = $image_wh[0];
			$image_h = $image_wh[1];

			if($image_w>$width_column){
				$image2=str_replace("http://", "", $image2);
				$regla=round($image_h*$width_column/$image_w);
		 		$url="http://www.eonline.com/resize/$width_column/$regla/$image2";
			}else{
				$url=$image2;
			}
		}else{
			$url=$image2;
		}
	}
	return $url;

}
function url_resize_sola($url_imagen, $width_column){
	$extrae3 = explode("//rs_",$url_imagen);
	if($extrae3[1]!=""){
		$image3 = explode("-",$extrae3[1]);
		$image3=$image3[0];

		$image_wh = explode("x",$image3);
		$image_w = $image_wh[0];
		$image_h = $image_wh[1];

		if($image_w>$width_column){
			$image_sigue=str_replace("http://", "", $url_imagen);
			$regla=round($image_h*$width_column/$image_w);
	 		$url_sola="http://www.eonline.com/resize/$width_column/$regla/$image_sigue";
		}else{
			$url_sola=$image3;
		}
	}else{
		$url_sola=$url_imagen;
	}

	return $url_sola;
}

function url_resize_sola_h($url_imagen, $height_column){
	$extrae3 = explode("//rs_",$url_imagen);
	if($extrae3[1]!=""){
		$image3 = explode("-",$extrae3[1]);
		$image3=$image3[0];

		$image_wh = explode("x",$image3);
		$image_w = $image_wh[0];
		$image_h = $image_wh[1];

		if($image_h>$height_column){
			$image_sigue=str_replace("http://", "", $url_imagen);
			$regla=round($image_w*$height_column/$image_h);
	 		$url_sola="http://www.eonline.com/resize/$regla/$height_column/$image_sigue";
		}else{
			$url_sola=$url_imagen;
		}
	}else{
		$url_sola=$url_imagen;
	}
	return $url_sola;
}

function es_wakeup(){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$catSlug=$cat->slug;
			if($catSlug=="wakeup" || $catSlug=="capitulos" || $catSlug=="personajes-wakeup" || $catSlug=="horarios" || $catSlug=="sinopsis" || $catSlug=="galeria-wakeup"){
			 return $catSlug;
			}else{
			 return false;
			}
		}

//feed del url friendly 
add_action('init', 'wpse_61376_rewrites3');
function wpse_61376_rewrites3() {
    add_rewrite_rule('feed/(feed|rdf|rss|rss2|atom)/?$','index.php?feed=$matches[1]','top');
    add_rewrite_rule('(feed|rdf|rss|rss2|atom)/?$','index.php?feed=$matches[1]','top');
}

//sacar palabra tag del url friendly 
add_action('init', 'wpse_61376_rewrites');
function wpse_61376_rewrites() {
    add_rewrite_rule('([^/]+)/?$','index.php?tag=$matches[1]','top');
}


function obtener_metadescription(){
		global $wp_query;
	 	$thePostID = $wp_query->post->ID;
		$post_id = get_post($thePostID);
		$html = $post_id->post_content;

		preg_match_all('/\[caption(.*?)\](.*?)\[\/caption\]/iU',$html,$matches);
		//$resultado=var_dump($res, $matches);
		$con_caption=$matches[1][0];

		$cadena_sincaption=explode("caption=\"",$con_caption);
		$cadena_sincaption_2=explode("\"",$cadena_sincaption[1]);
		if($cadena_sincaption_2[0]!=""){
			$sacar=$matches[0][0];
		}else{
			preg_match_all("|<p class='wp-caption-text'>(.*?)</p>|is", $html, $cap );
			$sacar=$cap[0][0];
		}

		$cadenalimpia=str_replace($sacar, "", $html);
		$cadenalimpia=str_replace("[adrenaline]", "", $cadenalimpia);

		$out_excerpt = strip_tags(str_replace(array("\r\n", "\r", "\n"), "", $cadenalimpia));
		$cadenalimpia= apply_filters('the_excerpt_rss', $out_excerpt);
		$cadenanew=substr($cadenalimpia,0,120);

		return $cadenanew;
}



// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

function sacar_img_sin_src(){
	// Recuperamos el post
	global $wp_query;
 	$thePostID = $wp_query->post->ID;
	$post_id = get_post($thePostID);
	$Html = $post_id->post_content; 

	// Extraemos todas las imagenes
	$extrae = '/<img .*src=["\']([^ ^"^\']*)["\']/';

	// Extraemos todas las imágenes
	$Html = str_replace("SRC", "src", $Html);
	$Html = str_replace("<IMG", "<img", $Html);

	preg_match_all($extrae, $Html , $matches);

	$extrae_new = '/<img (.+?)>/';
	
    // Extraemos todas las imágenes
    preg_match_all($extrae_new, $Html , $matches_new);
    $image_ch = $matches_new[1][0];
	$image_ch_explode=explode("title",$image_ch);
	$image_ch_explode=$image_ch_explode[0];
	$image_ch_explode = str_replace("src='", "", $image_ch_explode);
	$image_ch_explode = str_replace("'", "", $image_ch_explode);
	//$image_ch_explode = $matches[1][0];
	if($image_ch_explode)
	{
	   $thumb=$image_ch_explode;
	}else{
		$thumb="http://la.eonline.com/mexico/wp-content/themes/abz2012/images/generica_blanca.jpg";
	}
	return $thumb;
}

function sacar_img_con_src($Html_ch){

	$extrae = '/<img (.+?)>/';
	$extrae2 = '/<img .*SRC=["\']([^ ^"^\']*)["\']/';

	// Extraemos todas las imágenes
	preg_match_all( $extrae  , $Html_ch , $matches );
	$image_ch = $matches[1][0];
	preg_match_all( $extrae2 , $Html_ch , $matches2 );
	$image2 = $matches2[1][0];

	$image_ch_explode=explode("title",$image_ch);
	$image_ch_explode=$image_ch_explode[0];

	if($image_ch_explode=="")$image_ch_explode=$image_ch;

	return $image_ch_explode;
}

function sacar_video($Html_vid){
		$tiene_video_home=0;

		//YOUTUBE $content 
		$embed2_home="";
		$embed_home="";
		$extrae_vid = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
		preg_match_all( $extrae_vid , $Html_vid , $matches_vid );
		$video = $matches_vid[1][0];
		$video=substr($video,0, 28);
		//echo($video."::VIDEO");
		 if($video=="http://www.youtube.com/embed")
		{
			$parser_vid='|\<iframe (.*?)iframe\>|is'; 

			if(preg_match($parser_vid, $Html_vid, $embed3)) 
			{ 
				$embed2_home=$embed2_home.$embed3[1];
			} 

			$embed_home=str_replace('width="570"', 'width="310"', $embed2_home);
			$embed_home=str_replace('height="370"', 'height="200"', $embed_home);
			$embed_home=str_replace('height="412"', 'height="200"', $embed_home);

			if($embed_home)  $script_video='<div class="entry-thumb"/><iframe  '.$embed_home.'iframe></div>';
			$video_youtube=1;
		}else{
			$video_youtube=0;
		}

			//VIMEO $content 
		$embed_cod22="";
		$extrae_vimeo = '/<iframe .*src=["\']([^ ^"^\']*)["\']/';
		preg_match_all( $extrae_vimeo , $Html_vid , $matches_vimeo );
		$video_vimeo = $matches_vimeo[1][0];
		$video_vimeo=substr($video_vimeo,0, 30);

		//echo($video."::VIDEO");
		 if($video_vimeo=="http://player.vimeo.com/video/")
		{
			$parser_vimeo='|\<iframe (.*?)iframe\>|is'; 

			if(preg_match($parser_vimeo, $Html_vid, $embed33)) 
			{ 
				$embed22=$embed22.$embed33[1];
			} 

			$embed_cod22=str_replace('width="570"', 'width="310"', $embed22);
			$embed_cod22=str_replace('height="370"', 'height="200"', $embed_cod22);
			$embed_cod22=str_replace('height="412"', 'height="200"', $embed_cod22);

			if($embed_cod22) $script_video='<div class="entry-thumb"/><iframe '.$embed_cod22.'iframe></div>';
			$video_vimeo=1;
		}else{
			$video_vimeo=0;
		}


		//BRIGHTCOVE
		$embed_cod="";
		$brightcove="";
		$brightcove_inicio=explode("<!-- Start of Brightcove Player -->", $Html_vid);
		$comienzo=$brightcove_inicio[1];

		$brightcove_fin=explode('<script type="text/javascript">brightcove.createExperiences();</script>', $comienzo);
		$brightcove=$brightcove_fin[0];

		if($brightcove!="") {
			$parser='|\<object (.*?)object>|is'; 
			     
			if(preg_match($parser, $brightcove, $embed1)) 
			{ 
				$embed=$embed.$embed1[1];
			} 

			$embed_cod=str_replace('<param name="width" value="480" />', '<param name="width" value="310" />', $embed);
			$embed_cod=str_replace('<param name="height" value="270" />', '<param name="height" value="200" />', $embed_cod);
			$embed_cod=str_replace('<param name="width" value="570" />', '<param name="width" value="310" />', $embed_cod);
			$embed_cod=str_replace('<param name="height" value="370" />', '<param name="height" value="200" />', $embed_cod);


			$script_video="<object ".$embed_cod."object><script type='text/javascript'>brightcove.createExperiences();</script>";
			
			$video_brigth=1;
		}else{
			$video_brigth=0;
		}

		$tiene_video=1;

		if($video_brigth==1 or $video_youtube==1 or $video_vimeo==1) {
			
		}
		return $script_video;

}

function googl_shortlink($url, $post_id) {
	global $post;
	if (!$post_id && $post) $post_id = $post->ID;

	if ($post->post_status != 'publish')
		return "";

	$shortlink = get_post_meta($post_id, '_googl_shortlink', true);
	if ($shortlink)
		return $shortlink;

	$permalink = get_permalink($post_id);

	$http = new WP_Http();
	$headers = array('Content-Type' => 'application/json');
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 'method' => 'POST', 'body' => '{"longUrl": "' . $permalink . '"}', 'headers' => $headers));
	$result = json_decode($result['body']);
	$shortlink = $result->id;

	if ($shortlink) {
		add_post_meta($post_id, '_googl_shortlink', $shortlink, true);
		return $shortlink;
	}
	else {
		return $url;
	}
}

add_filter('get_shortlink', 'googl_shortlink', 9, 2);
/*ABZ FUNCTION DFP*/
function quien_es($width,$height,$datos){
		global $wp_query;

		if(is_home() || is_search() || is_tag() || is_404()){
			$postSlug="home";
		/*}elseif(is_single()){
				$array_count=explode(",", get_the_category_list( ', ' ));
				if(count($array_count)>1){
					$postSlug="home";
				}else{
					$get_cat = get_the_category();
	  				$postSlug = $get_cat[0]->slug;
				}*/
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}
		if($datos!=""){
			$adicional="-".$datos;
		}else{
			$adicional="";
		}
		if($width=="728" && $height=="90") {
			$tamanio="";
		}else{
			$tamanio="style='width:".$width."px; height:".$height."px;'";
		}
		$script_div="<div id='div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."' ".$tamanio." class='hideMobify'>
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."');
		</script></div>";
		return $script_div;
}
function quien_es_skin(){
		global $wp_query;

		$postSlug="";
		if(is_home() || is_search() || is_tag() || is_404()){
			$postSlug="home";
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
			if(is_page("galerias")){
				$postSlug=explode("?", $postSlug);
				$postSlug=$postSlug[0];
			}
		}elseif(is_single()){
			$postSlug="Post";
		}
		
		$script_div="<div id='div-gpt-ad-".$postSlug."-2000x1000' class='skin'><div class='skin_content_table hideMobify' >
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$postSlug."-2000x1000');
		</script></div></div>";
		return $script_div;
}
function que_cat_es($cat,$w,$h,$datos){
		if($datos!=""){
			$adicional="-".$datos;
		}else{
			$adicional="";
		}
		$script_div="
		<script type='text/javascript'>
		googletag.display('div-gpt-ad-".$cat."-".$w."x".$h."".$adicional."');
		</script>";
		return $script_div;
}
/*ABZ FUNCTION BG COLOR*/
function rnd_color($random){
	switch ($random){
		case 1 ;
		case 2 ;
		case 3 ;
		case 4 ; 
		case 5 ;
		case 6 ;
		$bg_fondo="bg_white";break;
		case 7:$bg_fondo="bg_gray";break;
		case 8:$bg_fondo="bg_gray";break;
		case 9:$bg_fondo="bg_gray";break;
		case 10:$bg_fondo="bg_darkgray";break;
		default:$bg_fondo="bg_white";break;
	}
	return $bg_fondo;
}
function cual_cat_es(){
		if(is_home() || is_search() || is_tag() || is_404()){
			$postSlug="home";
		/*}elseif(is_single()){
				$array_count=explode(",", get_the_category_list( ', ' ));
				if(count($array_count)>1){
					$postSlug="home";
				}else{
					$get_cat = get_the_category();
	  				$postSlug = $get_cat[0]->slug;
				}*/
		}elseif(is_category()){
			$cat = get_term_by('name', single_cat_title('',false), 'category'); 
			$postSlug=$cat->slug;
		}elseif(is_page()){
			$postSlug=explode("/", $_SERVER["REQUEST_URI"]);
			$postSlug=$postSlug[3];
		}elseif(is_single()){
			$postSlug="Post";
		}
		return $postSlug;
}
/*ABZ FUNCTION BG rnd_adpost*/
function rnd_adpost($texto, $texto2){

	if ($texto!="" && $texto2!="") {
		$rnd=rand(1,999);
		$resto=$rnd%2;
		if($resto==0){$texto=$texto2;}
	}
	return $texto;
}
/*ABZ FUNCTION BG COLOR*/
function cat_color($seccion){
	switch ($seccion){
		case "enews":$estilo="#03CDFF";break;
		case "estrenos":$estilo="#9847d4";break;
		case "musica":$estilo="#D4D4FF";break;
		case "glamcam360":$estilo="#ffffff";break;
		case "alfombraroja" ;
		case "goldenglobe" ;
		case "sag" ;
		case "grammy" ; 
		case "oscar";
		case "emmy" ;
		case "teenchoice"; 
		case "baftaawards"; 
		case "latinbillboard":$estilo="#f93c53";break;
		case "wakeup":$estilo="#04ffcd";break;
		case "eshows":$estilo="#9999ff";break;
		case "lol":$estilo="#24eca3";break;
		case "copadelmundo":$estilo="#c6e6f9";break;
		case "videos-2":$estilo="#38ba37";break;
		case "fotos":$estilo="#ff24d1";break;
		case "efashionblogger":$estilo="#e4c2be";break;
		case "cine_by_dos_equis":$estilo="#1d721d";break;
		case "programas":$estilo="#65638d";break;
		case "thetrend":$estilo="#ffe600";break;
		case "the-kardashians":$estilo="#ff9c00";break;
		case "the-royals":$estilo="#eb090a";break;
		case "amamos-las-pelis":$estilo="#a75df8";break;
		default:$estilo="#03CDFF";break;
	}
	return $estilo;
}

function wp_limit_abz($extracto_caption){
	$content = get_the_content();
  	//$content = str_replace($extracto_caption, "", $content);
	$content = apply_filters('the_content', $content);
    $content = str_replace("brightcove.createExperiences();", "", $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	$separar=explode('<a class="more-link"', $content);
	$content = $separar[0];
    $content = strip_tags($content, '<em>');
	$content = str_replace('&#8217;', '&', $content);
    $content = trim(substr($content , $extracto_caption+1)); // Sacar la cantidad de caracteres del extracto caption
    echo '<p class="entry-text">';
    echo $content;
    echo "</p>";
}
function wp_limit_post($extracto_caption, $max_char, $more_link_text = '[...]',$notagp = false, $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace($extracto_caption, "", $content);
    $content = str_replace("brightcove.createExperiences();", "", $content);
	$content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      if($notagp) {
      echo substr($content,0,$max_char);
      }
      else {
      echo '<p>';
      echo substr($content,0,$max_char);
      echo "</p>";
      }
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        if($notagp) {
        echo substr($content,0,$max_char);
        echo $more_link_text;
        }
        else {
        echo '<p>';
        echo substr($content,0,$max_char);
        echo $more_link_text;
        echo "</p>";
        }
   }
   else {
      if($notagp) {
      echo substr($content,0,$max_char);
      }
      else {
      echo '<p>';
      echo substr($content,0,$max_char);
      echo "</p>";
      }
   }
}

add_filter('widget_text','execute_php',100);
function execute_php($html){
 if(strpos($html,"<"."?php")!==false){
 ob_start();
 eval("?".">".$html);
 $html=ob_get_contents();
 ob_end_clean();
 }
 return $html;
}

if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'twentyten' ),
		'secondary' => __( 'Secondary Navigation', 'twentyten' ),
		'tertiary' => __( 'Tertiary Navigation', 'twentyten' ),
		'fourth' => __( 'fourth Navigation', 'twentyten' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '' );
	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 940 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Don't support text inside the header image.
	define( 'NO_HEADER_TEXT', true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See twentyten_admin_header_style(), below.
	add_custom_image_header( '', 'twentyten_admin_header_style' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'twentyten' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'twentyten' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'twentyten' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'twentyten' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'twentyten' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'twentyten' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'twentyten' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'twentyten' )
		)
	) );
}
endif;

if ( ! function_exists( 'twentyten_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in twentyten_setup().
 *
 * @since Twenty Ten 1.0
 */
function twentyten_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */
function twentyten_filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'twentyten' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'twentyten_filter_wp_title', 10, 2 );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentyten_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <p align="right"><a href="'. get_permalink() . '">' . __( '<div class="leer_mas"></div>', 'twentyten' ) . '</a><p>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css.
 *
 * @since Twenty Ten 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function twentyten_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">dijo:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Su comentario está a la espera de aceptación.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '<span class="%1$s"></span> %2$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<span class="entry-date">%3$s </span>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'Ver todos las notas por  %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( '<br>Posteado en %1$s.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( '<br>Posteado en %1$s.', 'twentyten' );
	} else {
		$posted_in = __( '', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
