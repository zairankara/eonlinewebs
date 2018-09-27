<?php
/**
 * Created by PhpStorm.
 * User: Matias
 * Date: 3/22/2016
 * Time: 4:08 PM
 */



//Quitar las query strings from statics resources
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Remove query string from static files
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-970x250' class='publicidad masthead_banner' >
		<script type='text/javascript'>
		googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$postSlug."-970x250');
        });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-300x600' class='publicidad' style='margin-bottom: 10px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$postSlug."-300x600');
        });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-300x100' class='publicidad' style='margin:10px 5px;'>
		<script type='text/javascript'>
		googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$postSlug."-300x100');
        });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-970x31' class=' publicidad billboardAD'>
			<script type='text/javascript'>
			googletag.cmd.push(function() {
                googletag.display('div-gpt-ad-".$postSlug."-970x31');
            });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-970x90' class=' publicidad pushdownAD'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { 
                googletag.display('div-gpt-ad-".$postSlug."-970x90');
            });
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
/*function change_order($orderby, $query) {
    global $wpdb;
    if(is_search())
        $orderby = "wp_posts.post_date DESC";
    return $orderby;
}
add_filter('posts_orderby','change_order');*/


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

    $script_div="<div id='div-gpt-ad-".$postSlug."-".$width."x".$height."' class='floating publicidad'>
				<a href='#' style='float:right' onclick=\"javascript:document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."').parentNode.removeChild(document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."')); document.getElementById('div-gpt-ad-".$postSlug."-".$width."x".$height."').remove();\"><img src='/common/imgs/boton_cerrar.gif' alt='boton cerrar'></a>
				<div class='floating_content_table'>
					<script type='text/javascript'>
                    googletag.cmd.push(function() { 
					   googletag.display('div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."');
                       });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-floorad' class='publicidad'>
			<script type='text/javascript'>
			googletag.cmd.push(function() {
                googletag.display('div-gpt-ad-".$postSlug."-floorad');
            });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-floating_3ros' class='publicidad'>
			<script type='text/javascript'>
            googletag.cmd.push(function() {
			     googletag.display('div-gpt-ad-".$postSlug."-floating_3ros');
             });
			</script>
			</div>";
    return $script_div;
}

function meta_alternate(){
    global $wp_query;
    $meta="";
    if(is_home()){
        $meta.="<link rel='alternate' hreflang='es-419' href='http://la.eonline.com/andes/' />";
        $meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina/' />";
        $meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico/' />";
        $meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela/' />";
    }elseif(is_category()){
        $cat = get_term_by('name', single_cat_title('',false), 'category');
        $postSlug=$cat->slug;
        $meta.="<link rel='alternate' hreflang='es-419' href='http://la.eonline.com/andes/category/".$postSlug."' />";
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
        $parent = get_page();
        $postSlug=$parent->post_name;
        $meta.="<link rel='alternate' hreflang='es-419' href='http://la.eonline.com/andes/pagina/".$postSlug."' />";
        $meta.="<link rel='alternate' hreflang='es-ar' href='http://la.eonline.com/argentina/pagina/".$postSlug."' />";
        $meta.="<link rel='alternate' hreflang='es-mx' href='http://la.eonline.com/mexico/pagina/".$postSlug."' />";
        $meta.="<link rel='alternate' hreflang='es-ve' href='http://la.eonline.com/venezuela/pagina/".$postSlug."' />";
    }elseif(is_single() || is_search() || is_tag()){
        $url_texto=str_replace("/argentina/","/",$_SERVER["REQUEST_URI"]);
        $meta.="<link rel='alternate' hreflang='es-419' href='http://la.eonline.com/andes".$url_texto."' />";
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

    include($_SERVER["DOCUMENT_ROOT"].'/varios/connect/galerias_wp.php');
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
    include($_SERVER["DOCUMENT_ROOT"].'/varios/connect/galerias_wp.php');
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
    include($_SERVER["DOCUMENT_ROOT"].'/varios/connect/galerias_wp.php');
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
                 $url="http://images.eonline.com/resize/$width_column/$regla/$image2";
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
    //http://images.eonline.com/resize/
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
                $url="http://images.eonline.com/resize/$width_column/$regla/$image2";
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
    $posPNG = strpos($url_imagen, ".png");
    $posGIF = strpos($url_imagen, ".gif");

     if($posPNG!== FALSE || $posPNG!== $posGIF){
        $url_sola=$url_imagen;
    }else{

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
                $url_sola="http://images.eonline.com/resize/$width_column/$regla/$image_sigue";
            }else{
                $url_sola=$image3;
            }
        }else{
            $url_sola=$url_imagen;
        }
    }

    return $url_sola;
}

function url_resize_sola_h($url_imagen, $height_column){
    $posPNG = strpos($url_imagen, ".png");
    $posGIF = strpos($url_imagen, ".gif");
    
     if($posPNG!== FALSE || $posPNG!== $posGIF){
        $url_sola=$url_imagen;
    }else{
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
                $url_sola="http://images.eonline.com/resize/$regla/$height_column/$image_sigue";
            }else{
                $url_sola=$url_imagen;
            }
        }else{
            $url_sola=$url_imagen;
        }
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

function es_Redcarpet()
{
    $cat = get_term_by('name', single_cat_title('',false), 'category');
    $catSlug=$cat->slug;
    if($catSlug=="alfombraroja" || $catSlug=="goldenglobe" || $catSlug=="sag" || $catSlug=="grammy" || $catSlug=="oscar" || $catSlug=="emmy" || $catSlug=="teenchoice" || $catSlug=="baftaawards" || $catSlug=="latinbillboard"){
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
    add_rewrite_rule('([^/]+)/page/?([0-9]{1,})/?$','index.php?tag=$matches[1]&paged=$matches[2]','top');
}


function obtener_metadescription(){
    global $wp_query;
    $thePostID = $wp_query->post->ID;
    $post_id = get_post($thePostID);
    $html = $post_id->post_content;
    $html = str_replace("null;overwriteForeign=true", "", $html);

    $html = str_replace("[adrenaline]", "", $html);

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
    $cadenalimpia=str_replace('"', '', $cadenalimpia);
    $cadenalimpia=str_replace("'", "", $cadenalimpia);

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
        return "0 <span class='glyphicon glyphicon-eye-open'></span>";
    }
    return $count.' <span class=\'glyphicon glyphicon-eye-open\'></span>';
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

/*function googl_shortlink($url, $post_id) {
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
add_filter('get_shortlink', 'googl_shortlink', 9, 2);*/

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
    if($width=="728" && $height=="90") {
        $tamanio="";
    }else{
        $tamanio="style='width:".$width."px; height:".$height."px;'";
    }
    $script_div="<div id='div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."' ".$tamanio." class='publicidad'>
		<script type='text/javascript'>
		googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$postSlug."-".$width."x".$height."".$adicional."');
        });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-2000x1000' class='skin'><div class='skin_content_table publicidad' >
		<script type='text/javascript'>
        googletag.cmd.push(function() {
		  googletag.display('div-gpt-ad-".$postSlug."-2000x1000');
        });
		</script></div></div>";
    return $script_div;
}

function quien_es_floating3ros(){
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
        $parent = get_page();
        $postSlug=$parent->post_name;
    }elseif(is_single()){
        $postSlug="Post";
    }

    $script_div="<div id='div-gpt-ad-".$postSlug."-floating_3ros'><div class='publicidad' >
        <script type='text/javascript'>
        googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$postSlug."-floating_3ros');
         });
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
		googletag.cmd.push(function() {
            googletag.display('div-gpt-ad-".$cat."-".$w."x".$h."".$adicional."');
            });
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
        $parent = get_page();
        $postSlug=$parent->post_name;
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
    $content = str_replace("<span style='background-color:#950000;color:#fff;font-family:arial, ahoma, verdana;font-size:14px;font-weight:bold;padding:10px 10px 10px 20px;'>null;overwriteForeign=true</span>", "", $content);
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
     $content = str_replace("<span style='background-color:#950000;color:#fff;font-family:arial, ahoma, verdana;font-size:14px;font-weight:bold;padding:10px 10px 10px 20px;'>null;overwriteForeign=true</span>", "", $content);
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

/*add_filter('widget_text','execute_php',100);
function execute_php($html){
    if(strpos($html,"<"."?php")!==false){
        ob_start();
        eval("?".">".$html);
        $html=ob_get_contents();
        ob_end_clean();
    }
    return $html;
}*/


/* 2016 */

    function nggScrollGalleryReplace2016($content) {
        global $wpdb;

        $p = '/(\[scrollGallery\sid=.*\s*\])/i';

        $content = str_replace("<span style='background-color:#950000;color:#fff;font-family:arial, ahoma, verdana;font-size:14px;font-weight:bold;padding:10px 10px 10px 20px;'>null;overwriteForeign=true</span>", "", $content);

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
                    $array_img[]=obtener_galerias($n,"1","pg.orden","ASC",NULL);
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
                        <div class='cta__thumb'>
                            <a href='".home_url( '/' )."pagina/galerias?gallery=".$id_galeria."' rel='bookmark' class='image-button image-button--gallery clearfix'></a>
                            <a href='".home_url( '/' )."pagina/galerias?gallery=".$id_galeria."'><img src='". url_resize_sola($urlImg,260)."'  class='img-responsive'/></a>
                        </div>";

                    $k++;
                }
                $cadena[] = "<div class='cta'>".implode("",$armo_cadena[$i])." <div class='cta__text'> <h2 class='cta__title'>$title_gal</h2> <p><strong>$title</strong></p></div><div class='bot_vermas'><a href='".home_url( '/' )."pagina/galerias/?gallery=".$id_galeria."' class='vermais' rel='bookmark'>Ver galeria relacionada</a></div>";
                $contenido = str_replace($matches[0], $cadena, $content);
                $i++;
            }
        }else{
            $contenido=$content;
        }

        return $contenido;

    }
    /*function shortcode_adrenaline( $atts ){
        return '<a id="adlneF1Scr" data-tag="adrenalineTag"></a>';
    }
    add_shortcode( 'adrenaline', 'shortcode_adrenaline' );*/

    function shortcode_adrenaline( $atts ){
        return '<a id="adlneInreadScr" data-tag="adrenalineTag"></a>';
    }
    add_shortcode( 'adrenaline', 'shortcode_adrenaline' );

    function getRemoteFile($url, $timeout = 10) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
    }

    function obtener_meta_video($idVIDEO){
        //$return = file_get_contents("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%videoStillURL&media_delivery=default&token=".$token."", "response_img");

        $return = getRemoteFile("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%videoStillURL&media_delivery=default&token=".TOKEN."", "response_img");
        $decode = json_decode($return);
        $decode_array['uri']=$decode->videoStillURL;
        $decode_array['name']=$decode->name;

        return $decode_array;
    }
    function obtener_meta_video_first($videos){
        //$return = file_get_contents("http://api.brightcove.com/services/library?command=find_video_by_id&video_id=".$idVIDEO."&video_fields=id%2Cname%videoStillURL&media_delivery=default&token=".$token."", "response_img");

        $return = getRemoteFile("http://api.brightcove.com/services/library?command=find_playlist_by_id&playlist_id=".$videos."&media_delivery=http&token=".TOKEN."");
        $decode = json_decode($return);
        $decode_array['primer_video']=$decode->videoIds[0];

        return $decode_array;
    }
    function que_section_es(){
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
            $parent = get_page();
            $postSlug=$parent->post_name;
        }elseif(is_single()){
            $postSlug="Post";
        }
        return $postSlug;
    }


    add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
    add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

    function posts_link_attributes_next() {
        return 'class="next"';
    }
    function posts_link_attributes_prev() {
        return 'class="previous"';
    }

    function bootstrapBasicPostOn()
    {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        printf(__('<span class="posted-on">%1$s</span>', 'bootstrap-basic'),
            sprintf('<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
                esc_url(get_permalink()),
                esc_attr(get_the_time()),
                $time_string
            ),
            sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                esc_attr(sprintf(__('View all posts by %s', 'bootstrap-basic'), get_the_author())),
                esc_html(get_the_author())
            )
        );
    }// bootstrapBasicPostOn

    function human_time_diff_abz( $from, $to = '' ) {
        if ( empty( $to ) ) {
            $to = time();
        }

        $diff = (int) abs( $to - $from );

        if ( $diff < HOUR_IN_SECONDS ) {
            $mins = round( $diff / MINUTE_IN_SECONDS );
            if ( $mins <= 1 )
                $mins = 1;
            /* translators: min=minute */
            $since = sprintf( _n( '%s min', '%s mins', $mins ), $mins );
        } elseif ( $diff < DAY_IN_SECONDS && $diff >= HOUR_IN_SECONDS ) {
            $hours = round( $diff / HOUR_IN_SECONDS );
            if ( $hours <= 1 )
                $hours = 1;
            $since = sprintf( _n( '%s hora', '%s horas', $hours ), $hours );
        } elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
            $days = round( $diff / DAY_IN_SECONDS );
            if ( $days <= 1 )
                $days = 1;
            $since = sprintf( _n( '%s día', '%s días', $days ), $days );
        } elseif ( $diff < MONTH_IN_SECONDS && $diff >= WEEK_IN_SECONDS ) {
            $weeks = round( $diff / WEEK_IN_SECONDS );
            if ( $weeks <= 1 )
                $weeks = 1;
            $since = sprintf( _n( '%s semana', '%s semanas', $weeks ), $weeks );
        } elseif ( $diff < YEAR_IN_SECONDS && $diff >= MONTH_IN_SECONDS ) {
            $months = round( $diff / MONTH_IN_SECONDS );
            if ( $months <= 1 )
                $months = 1;
            $since = sprintf( _n( '%s mes', '%s meses', $months ), $months );
        } elseif ( $diff >= YEAR_IN_SECONDS ) {
            $years = round( $diff / YEAR_IN_SECONDS );
            if ( $years <= 1 )
                $years = 1;
            $since = sprintf( _n( '%s año', '%s años', $years ), $years );
        }

        return apply_filters( 'human_time_diff_abz', $since, $diff, $from, $to );
    }

    if (!function_exists('bootstrapBasicCategoriesList')) {
        /**
         * Display categories list with bootstrap icon
         *
         * @param string $categories_list list of categories.
         * @return string
         */
        function bootstrapBasicCategoriesList($categories_list = '')
        {
            return sprintf('%1$s', $categories_list);
        }// bootstrapBasicCategoriesList
    }

    add_filter('the_time', 'dynamictime');
     function dynamictime() {
        global $post;
        $date = $post->post_date;
        $time = get_post_time('G', true, $post);
        $timezone_offet = get_option( 'gmt_offset' );
        $time -= $timezone_offet * 3600; // $time is timestamp, we add the correct time offset here
        //$time = strtotime ( '-3 hour' , strtotime ( $time ) ) ;
        
        $mytime = time() - $time;
        if($mytime < 60){
            $mytimestamp = __('Ahora');
        }else{
            $mytimestamp = sprintf(__('Hace %s'), human_time_diff_abz($time));
        }
        return $mytimestamp;
    }


    class PHP_Code_Widget extends WP_Widget {
        function __construct() {
            load_plugin_textdomain( 'php-code-widget', false, dirname( plugin_basename( __FILE__ ) ) );
            $widget_ops = array('classname' => 'widget_execphp', 'description' => __('Arbitrary text, HTML, or PHP Code', 'php-code-widget'));
            $control_ops = array('width' => 400, 'height' => 350);
            parent::__construct('execphp', __('PHP Code', 'php-code-widget'), $widget_ops, $control_ops);
        }

        function widget( $args, $instance ) {
            extract($args);
            $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
            $text = apply_filters( 'widget_execphp', $instance['text'], $instance );
            echo $before_widget;
            if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
            ob_start();
            eval('?>'.$text);
            $text = ob_get_contents();
            ob_end_clean();
            ?>
            <div class="execphpwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
            <?php
            echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            if ( current_user_can('unfiltered_html') )
                $instance['text'] =  $new_instance['text'];
            else
                $instance['text'] = stripslashes( wp_filter_post_kses( $new_instance['text'] ) );
            $instance['filter'] = isset($new_instance['filter']);
            return $instance;
        }

        function form( $instance ) {
            $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
            $title = strip_tags($instance['title']);
            $text = format_to_edit($instance['text']);
            ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'php-code-widget'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

            <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs.', 'php-code-widget'); ?></label></p>
            <?php
        }
    }

    add_action('widgets_init', create_function('', 'return register_widget("PHP_Code_Widget");'));

/***/
