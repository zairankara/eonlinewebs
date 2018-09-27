<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<?php
if($_GET["attachment_id"]!="" and is_numeric($_GET["attachment_id"])){
	Header( "HTTP/1.1 301 Moved Permanently" );
	Header( "Location: http://la.eonline.com/venezuela/" );
}
?>

<?php
include(STYLESHEETPATH."/pages/var_constantes.php");

// CAMBIO LA COOKIE
if($_POST["flag"]==1){
	$paiscual=$_POST["cual"];
	$cual_array=explode("-", $paiscual);
	$pais=$cual_array[1];
	$cual=$cual_array[0];
	setcookie("ubicacion","$cual",0, "/");
	setcookie("selectorE","$pais",0, "/");

	switch($cual){
		case "1":header('Location:/andes/');break;
		case "2":header('Location:/argentina/');break;
		case "3":header('Location:/mexico/');break;
		case "4":header('Location:/venezuela/');break;
		case "99":header('Location:http://br.eonline.com/');break;
	}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es-VE"> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" lang="es-VE"> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" lang="es-VE"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es-VE"> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="Content-Language" content="es-VE"/>	
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <?php if(is_category("the-royals")){?>
            <!-- TAGS CODE THE ROYALS -->
            <? include("/home/eonline/public_html/varios/the_royals_codes/code_head.php");?>
            <!-- END TAGS CODE THE ROYALS -->
        <?}?>


<!-- CAMBIO DE HOME A RED CARPET-->
<!--<?php if(is_home()){?>
    <meta http-equiv="refresh" content="0;url=<?php echo URLCOMPLETA; ?>/category/alfombraroja">
<?}?>-->
        
		<meta name="theme-color" content="#000000">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <meta name="google-site-verification" content="fP_TCVmkSsSq5vds0sDsrysQRrotjbXXgquXQ6Lci84" />
		<meta name="Category" content="entertainment">
		<link rel="shortcut icon" href="<?php echo FOLDERTHEME; ?>/images/favicon.ico"/>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="author" href="https://plus.google.com/+Eonlinelatinoplus" />
		<?php echo meta_alternate();?>


        <?php if(!is_single() && !is_page()){
            $page_actual=$wp_query->query_vars['paged'];

            if($page_actual<=1){
                $proxpag=$page_actual+1;?>
                <link rel="next" href="<?php echo URLCOMPLETA."page/".$proxpag."/?". $_SERVER["QUERY_STRING"]; ?>"/>
            <?}elseif(is_paged()){
                $proxpag=$page_actual+1;
                $antpag=$page_actual-1;
                $REQUEST_URI=explode("/page", $_SERVER["REQUEST_URI"]);
                $REQUEST_URI=$REQUEST_URI[0];
                ?>
                <link rel="prev" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $REQUEST_URI."/page/".$antpag."/?". $_SERVER["QUERY_STRING"];?>"/>
                <link rel="next" href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $REQUEST_URI."/page/".$proxpag."/?". $_SERVER["QUERY_STRING"];?>"/>
            <?}?>
        <?}?>

        <?php //if( $_GET["abz"]!="") var_dump($_SERVER) ."--"; ?>

        <!-- FACEBOOK OPENGRAPH -->
        <?php
        $default_img = URLCOMPLETA."wp-content/themes/abz2012/images/generica_blanca.jpg";

        if(is_single()){
            $primera_img=sacar_img_sin_src();
            $default_img=$primera_img;

            $feed_site="Venezuela";
            $title_site="E! Online Latino | ".$feed_site;
            $metadescription=obtener_metadescription();
            $title_post=wp_title('|', false, 'right');
            if($metadescription==""){
                $title_post_array=explode("|", $title_post);
                $metadescription=$title_post_array[0];
            }
            $description_site=$metadescription;

            ?>
            <title><?php echo $title_post;?></title>
            <meta name="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
            <meta name="abstract" content="<?php echo $metadescription;?>. <?=$title_site?>" />

            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?php echo $title_post;?>" />
            <meta property="og:image" content="<?php echo $primera_img;?>" />
            <meta property="og:image:width" content="200" />
            <meta property="og:url" content="<?php the_permalink(); ?>"/>
            <meta property="og:description" content="<?php echo $metadescription;?>. <?=$title_site?>" />

            <!--<meta itemprop="name" content="<?php echo $title_post;?>"/>
            <meta itemprop="image" content="<?php echo $primera_img ;?>" />
            <meta itemprop="description" content="<?php echo $metadescription;?>. <?=$title_site?>" />
            <meta itemprop="url" content="<?php the_permalink(); ?>"/>-->


        <?php } elseif(is_category()||is_tag()||is_page()) { ?>

            <?
            $feed_site="Venezuela";
            $title_site="E! Online Latino | ".$feed_site;
            $description_site="E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood. ".$title_site;


            if(is_category( "enews" )){
                $title_site="Ultimas noticias, fotos y videos de los famosos. E! Online Latino | ".$feed_site;
                $description_site="Lo último en noticias, fotos y videos de las celebridades. Todo lo que necesitas saber. ".$title_site;
            }elseif ( is_category("efashionblogger")) {
                $title_site="Moda, estilo, desfiles y celebridades. E! Online Latino | ".$feed_site;
                $description_site="Lo último en noticias, fotos y videos de las celebridades. Todo lo que necesitas saber. ".$title_site;
            }elseif ( is_category("alfombraroja" )) {
                $title_site="Noticias, fotos y videos de las premiaciones. E! Online Latino | ".$feed_site;
                $description_site="Las Alfombras Rojas de las premiaciones más importantes de Hollywood y Latinoamérica. ".$title_site;
            }elseif ( is_category("the-kardashians" )) {
                $title_site="Noticias, fotos y videos de la Familia Kardashian. E! Online Latino | ".$feed_site;
                $description_site="Todo el Universo Kardashian en un solo lugar. ".$title_site;
            }elseif(is_page("iamcait")){
                $title_site="I am Cait. E! Online Latino | ".$feed_site;
                $description_site=" Caitlyn Jenner se apodera del mundo - Docuserie de  E! OnlineLatino | ".$title_site;
            }elseif(is_page("younger")){
                $title_site="Younger. E! Online Latino | ".$feed_site;
                $description_site=" Del creador de Sex and the City - E! OnlineLatino | ".$title_site;
            }elseif ( is_category("thetrend" )) {
                $title_site="The Trend. E! Online Latino | ".$feed_site;
                $description_site="Lo último en tendencias de las celebridades. ".$title_site;
            }elseif ( is_category("princesa_maxima" )) {
                $title_site="La coronación de Máxima de Holanda. E! Online Latino | ".$feed_site;
                $description_site="Toda la información relacionada a Máxima Zorreguieta, y su coronación para convertirse en Reina de Holanda. Noticias, entrevistas y fotos. ".$title_site;
            }elseif(is_category("e-shows")){
                $title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
                $description_site="Programas: Kardashians, Zona Trendy, E! Latin News, Fashion Police y más. ".$title_site;
            }elseif ( is_category("estrenos" )) {
                $title_site="Toda la información sobre los estrenos. E! Online Latino | ".$feed_site;
                $description_site="Entérate aquí de los estrenos y nuevos capítulos de nuestros programas. Lo último está aquí. ".$title_site;
            }elseif ( is_category( "lol" )) {
                $title_site="Los memes y virales más divertidos de internet. E! Online Latino | ".$feed_site;
                $description_site="Lol donde estan todos los temas calientes y virales del mundo de los famosos en la web. Memes, videos divertidos, gags, gifd, colages y mucho más. ".$title_site;
            }elseif ( is_category( "copadelmundo" )) {
                $title_site="Copa del mundo. E! Online Latino | ".$feed_site;
                $description_site="".$title_site;
            }elseif ( is_category("marriedtojonas" )) {
                $title_site="Marries to Jonas. E! Online Latino | ".$feed_site;
                $description_site="Kevin Jonas & Danielle Deleasa. El amor el clave de Pop. ".$title_site;
            }elseif ( is_category("musica" )) {
                $title_site="Música. E! Online Latino | ".$feed_site;
                $description_site="Como buenos amantes de la cultura Pop, ¡necesitamos saberlo todo acerca del mundo de la música! Por eso te traemos esta sección llena de noticias, vídeos, fotos y la opinión de distintos expertos sobre los sucesos y lanzamientos del momento.".$title_site;
            }elseif ( is_category("the-royals" )) {
                $title_site="The Royals. E! Online Latino | ".$feed_site;
                $description_site=".".$title_site;
            }elseif (es_wakeup()) {
                $title_site="WakeUp. E! Online Latino | ".$feed_site;
                $description_site="En Wake Up Abril, la protagonista, emprenderá un camino de autodescubrimiento al cual se irán uniendo poco a poco un grupo de amigos, para conquistar sus sueños y convertirse en un exitoso grupo musical.".$title_site;
            }elseif ( is_category("amamos-las-pelis")) {
                $title_site="Amamos las pelis. E! Online Latino  | ".$feed_site;
                $description_site="Lo último en Peliculas. Todo lo que necesitas saber. ".$title_site;
            }


            if(is_tag())
            {
                $current_tag = single_tag_title("", false);
                $title_site=$current_tag.". E! Online Latino | ".$feed_site;
                $description_site="Todos los articulos de ".$current_tag.". E! Online Latino | ".$feed_site;
            }
            if(is_page("eshows")){
                $title_site="Programas de E! Entertainment Television. E! Online Latino | ".$feed_site;
                $description_site="Programas: Kardashians, Zona Trendy, E! Latin News, Fashion Police y más. ".$title_site;
            }elseif(is_page("glamcam360")){
                $title_site="Glam Cam 360. E! Online Latino | ".$feed_site;
                $description_site="Las celebridades que pasaron por la ".$title_site;
            }elseif(is_page("programas")){
                $title_site="Horarios de los programas de E! Latinoamérica. E! Online Latino | ".$feed_site;
                $description_site="¿A qué hora ver los programas de E! Latinoamérica? Todos los programas, estrenos, series, horarios. ".$title_site;
            }elseif(is_page("fotos-venezuela") || is_page("galerias")){
                $title_site="Fotos, imágenes y galerías de Celebridades. E! Online Latino | ".$feed_site;
                $description_site="El mundo del espectáculo en imágenes. ".$title_site;
                if($_GET["img"]!="")$default_img=$_GET["img"];
                if($_GET["t"]!="")$title_site=$_GET["t"]." ".$_GET["d"];
            }elseif(is_page("live-from-e")){
                $title_site="Live From E!. E! Online Latino | ".$feed_site;
                $description_site="Toda la actualidad en un solo show. ".$title_site;
            }elseif(is_page("videos-2")){
                $title_site="Videos y entrevistas de famosos y la Alfombra Roja. E! Online Latino | ".$feed_site;
                $description_site="Noticias y entrevistas de las Celebridades en video. ".$title_site;
            }elseif(is_page("politicas-de-privacidad")){
                $title_site="Políticas de Privacidad. E! Online Latino | ".$feed_site;
                $description_site="Políticas de privacidad de E! Online Latinoamérica. ".$title_site;
            }elseif(is_page("terminos-de-uso")){
                $title_site="Términos de Uso. E! Online Latino | ".$feed_site;
                $description_site="Términos de Uso de E! Online Latinoamérica. ".$title_site;
            }elseif(is_page("politica-de-remocion")){
                $title_site="Política de Remoción. E! Online Latino | ".$feed_site;
                $description_site="Política de Remoción de E! Online Latinoamérica. ".$title_site;
            }elseif(is_page("contacto")){
                $title_site="Contacto. E! Online Latino | ".$feed_site;
                $description_site="¿Quieres comunicarte con nosotros? ".$title_site;
            }elseif(is_page("app")){
                $title_site="Descarga App. E! Online Latino | ".$feed_site;
                $description_site="Lo mejor de E! ONLINE está disponible en tu móvil ".$title_site;
            }elseif(is_page("coffeebreak")){
                $title_site="Coffee Break con Patricia | ".$feed_site;
                $description_site="Llega a la pantalla de E!, el nuevo programa de entrevistas que te acerca más y más a tus celebridades favoritas.";
            }elseif(is_page("zonatrendycaracas")){
                $title_site="Zona Trendy Venezuela | ".$feed_site;
                $description_site="";
            }elseif(is_page("timeline")){
                $title_site="Timeline. E! Online Latino | ".$feed_site;
                $description_site="El timeline de Kim Kardashian ".$title_site;
            }elseif(is_page("fashionpolice")){
                $title_site="Fashion Police | ".$feed_site;
                $description_site="La hora del café ahora la podrás disfrutar con las celebridades más top y relevantes del mundo del entretenimiento latinoamericano.";
            }elseif(is_page("yosoyelartista")){
                $title_site="Yo soy el Artista | ".$feed_site;
                $description_site="El reality musical Yo soy el artista del canal Telemundo Internacional. Le da la oportunidad a gente común y corriente, sin acceso a los medios tradicionales de comunicación, de convertirse en estrella a través del canto.";
            }elseif(is_page("epop")){
                $title_site="Epop | ".$feed_site;
                $description_site="Renato y Lety nos preparan una explosiva malteada de la cultura pop.";
            }


            ?>
            <title><?php echo $title_site ?></title>
            <meta name="description" content="<?php echo $description_site ?>" />
            <meta name="abstract" content="<?php echo $description_site ?>"/>
            <?php if(!is_page("galerias")){ // las escribo en la page de galerias con los datos de la primera?>

                <?php if(is_page("videos-2")){
                    

                    if($_GET["id"]!=""){
                        $datoVideo=obtener_meta_video($_GET["id"]);
                        $videoID=$_GET["id"];
                    }else{
                        $primer_video=obtener_meta_video_first(playlist_HM);
                        $datoVideo=obtener_meta_video($primer_video["primer_video"]);
                        $videoID=$primer_video["primer_video"];
                    }
                    ?>
                    <meta property="og:type" content="video" />
                    <meta property="og:url" content="http://la.eonline.com/<?=$name_feed?>/pagina/videos-2/?id=<?php echo $videoID; ?>"/>
                    <meta property="og:image" content="<?php echo $datoVideo["uri"];?>" />
                    <meta property="og:title" content="<?php echo $datoVideo["name"];?>" />
                    <meta itemprop="name" content="<?php echo $datoVideo["name"];?>"/>
                    <meta itemprop="image" content="<?php echo $datoVideo["uri"];?>" />

                <?}else{?>
                    <meta property="og:type" content="article" />
                    <meta property="og:title" content="<?php echo $title_site ?>" />
                    <meta property="og:url" content="http://la.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
                    <meta property="og:description" content="<?php echo $description_site ?>" />
                    <meta property="og:image" content="<?php echo $default_img ;?>" />

                <?}?>

            <?}else{?>
                <?
                //traigo data galeria
                $gallery=$_GET["gallery"];
                $galleries_GET = obtener_galerias($gallery, NULL, "pg.orden", "ASC");
                $vecUrl=$galleries_GET[0]["filename"];
                $titulo=$galleries_GET[0]["title"];
                $title_site=$titulo;
                $description_site=$galleries_GET[0]["title_gal"];
                $default_img=$vecUrl;

                ?>
                <meta property="og:url" content="http://la.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>
                <meta property="og:type" content="image" />
                <meta property="og:title" content="<?=$galleries_GET[0]["title_gal"]?>" />
                <meta property="og:description" content="<?=$titulo?>" />
                <meta property="og:image" content="<?=$vecUrl?>" />
            <?}?>
            <meta property="og:image:width" content="300" />
            <!--<meta itemprop="description" content="<?php echo $description_site ?>"/>
		<meta itemprop="name" content="<?php echo $title_site ?>"/>
		<meta itemprop="image" content="<?php echo $default_img ;?>" />
		<meta itemprop="url" content="http://la.eonline.com<?php echo $_SERVER["REQUEST_URI"]?>"/>-->

        <?php } else { ?>

            <?
            $title_site="E! Online Latino | Venezuela";
            $description_site="E! Latinoamérica. Todo el mundo del espectáculo y la cultura Pop en vivo desde Hollywood. ".$title_site;
            ?>
            <title><?php echo $title_site ?></title>
            <meta name="description" content="<?php echo $description_site ?>" />
            <meta name="abstract" content="<?php echo $description_site ?>"/>
            <meta property="og:type" content="blog" />
            <meta property="og:title" content="<?php echo $title_site ?>" />
            <meta property="og:url" content="<?php echo URLCOMPLETA; ?>"/>
            <meta property="og:description" content="<?php echo $description_site ?>" />
            <meta property="og:image" content="<?php echo $default_img ;?>" />
            <meta property="og:image:width" content="200" />
            <!--<meta itemprop="description" content="<?php echo $description_site ?>"/>
		<meta itemprop="name" content="<?php echo $title_site ?>"/>
		<meta itemprop="image" content="<?php echo $default_img ;?>" />
		<meta itemprop="url" content="<?php echo URLCOMPLETA; ?>"/>-->

        <?php } ?>
        <meta property="og:site_name" content="E! Online Latino" />
        <meta property="fb:pages" content="116264915095072">

        <!-- /FACEBOOK OPENGRAPH -->

        <!-- TWITTER OPENGRAPH -->
        <meta name="twitter:widgets:csp" content="on">
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@eonlinelatino" />
        <meta name="twitter:title" content="<?php echo $title_site ?>">
        <meta name="twitter:description" content="<?php echo $description_site ?>">
        <meta name="twitter:image:src" content="<?php echo $default_img ;?>">
        <!-- TWITTER OPENGRAPH -->

        <!-- schema -->
        <?
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));

        if(is_home() || is_search()){
            $type="WebSite";
        }elseif(is_single()){
            $type="NewsArticle";$GetData= obtener_date();
            $mas='"mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "'.$current_url.'"
              },';
        }elseif(is_page("videos-2")){
            $type="VideoObject";
        }else{
            $type="WebPage";
        }?>
        <script type="application/ld+json" data-device="1">
            {
              "@context": "http://schema.org",
              "@type": "<?php echo $type; ?>",
              "url": "<?php echo $current_url; ?>",
              "name": "<?php echo $title_site ?>",
              "headline": "<?php echo $title_site ?>",
              <?php echo $mas; ?>
              "image": {
                "@type": "ImageObject",
                "url": "<?php echo str_replace("http://images.eonline", "http://images.eonline.com/resize/200/200/images.eonline", trim($default_img)) ;?>",
                "height": "200",
                "width": "200"
            },
              "description": "<?php echo $description_site ?>",
               <?php if(is_single()) {echo ('"datePublished": "'. $GetData.'", "dateModified": "'. $GetData.'",');}?>              
               <?php if(is_search()) {echo ('"potentialAction": {
                 "@type": "SearchAction",
                 "target": "'.URLCOMPLETE.'?s={s}",
                 "query-input": "name=s"
               },');}?>
               "author": {
                "@type": "Person",
                "name": "EonlineLatino"
            },
              "publisher": {
                    "@type": "Organization",
                    "name": "EonlineLatino",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "http://la.eonline.com/argentina/wp-content/themes/abz2012/images/generica_blanca.jpg",
                        "width": "200",
                        "height": "267"
                    }
                }, 
              "sameAs" : [ "http://www.facebook.com/pages/E-Online-Latino/116264915095072?ref=sgm",
              "http://instagram.com/eonlinelatino",
              "http://www.youtube.com/EonlineLatinola",
              "http://twitter.com/EonlineLatino",
              "https://plus.google.com/109640549139413649832?rel=author"]

            }
        </script>
        <!-- /schema -->

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <!-- FONT-FACE -->
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <!-- / FONT-FACE -->

        <!-- Carrousel -->
          <link rel="stylesheet" href="/common/owl.carousel/assets/owl.carousel.css">
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css">-->

		<!--wordpress head-->
		<?php wp_head(); ?>

        <!--save in body device-->
        <script src="/common/js/device.min.js"></script>
        
        <script type="text/javascript" data-device="1">
            function isMobile(){
                return (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|playbook|silk/i.test(navigator.userAgent||navigator.vendor||window.opera)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test((navigator.userAgent||navigator.vendor||window.opera).substr(0,4)))
            }
            function  isTablet(){
                return (/Tablet|iPad/i.test((navigator.userAgent||navigator.vendor||window.opera)))
            }
        </script>

        <?php
        //NUEVO GA
        include($_SERVER["DOCUMENT_ROOT"]."/common/ga_2016.php");
        ?>

		<!-- Define Brightcove -->
        <!--<script src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script> -->

        <!-- capture events -->
        <script type="text/javascript" data-device="1">
            /* var objectGlobalVideos = {};
            var player;
            var modVP;
            var modExp;
            var modCon;

            function myTemplateLoaded(experienceID) {
                player = brightcove.api.getExperience(experienceID);
                modVP = player.getModule(brightcove.api.modules.APIModules.VIDEO_PLAYER);
                modExp = player.getModule(brightcove.api.modules.APIModules.EXPERIENCE);
                modCon = player.getModule(brightcove.api.modules.APIModules.CONTENT);
                modExp.addEventListener(brightcove.api.events.ExperienceEvent.TEMPLATE_READY, onTemplateReady);
            }

            function onTemplateReady(evt) {
                modVP.addEventListener(brightcove.api.events.MediaEvent.BEGIN, onMediaEventFired);
                modVP.addEventListener(brightcove.api.events.MediaEvent.CHANGE, onMediaEventFired);
                modVP.addEventListener(brightcove.api.events.MediaEvent.COMPLETE, onMediaEventFired);
                modVP.addEventListener(brightcove.api.events.MediaEvent.ERROR, onMediaEventFired);
                modVP.addEventListener(brightcove.api.events.MediaEvent.PLAY, onMediaEventFired);
                // modVP.addEventListener(brightcove.api.events.MediaEvent.PROGRESS, onMediaProgressFired);
                modVP.addEventListener(brightcove.api.events.MediaEvent.STOP, onMediaEventFired);
                modVP.addEventListener(brightcove.api.data.Media, onMediaEventFired);
            }

            function onMediaEventFired(evt) {
                objectGlobalVideos.title = evt.media.displayName;
                objectGlobalVideos.id = evt.media.id;
                nameseccion=location.pathname;
                if(nameseccion.indexOf("videos-2")!=-1) {feedSection=location.pathname;}else{feedSection=location.pathname+"pagina/videos-2/";}
                objectGlobalVideos.pageName = location.hostname+feedSection+evt.media.displayName;

                if (evt.type === brightcove.api.events.MediaEvent.BEGIN) {
                    //console.log('Here Video Begins!!');
                    _satellite.track("beginVideo");
                    _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_start', objectGlobalVideos.title]);

                }else if (evt.type === brightcove.api.events.MediaEvent.COMPLETE) {
                    //console.log('Here Video Begins!!');
                    _satellite.track("completeVideo");
                    _gaq.push(['_trackEvent', 'Videos Brightcove', 'video_complete', objectGlobalVideos.title]);

                }
            }*/

            /* functions omniture
            var objectGlobal = {};
            function share(que, href, title, type){
                objectGlobal.netContent = que;
                objectGlobal.titleContent = title;
                objectGlobal.typeContent = type;

                //console.log("--"+que+" --"+href);
                if(jQuery("body").hasClass("home")){
                    _satellite.track('sharedContentFrom');
                }else{
                    _satellite.track('sharedContentNotHomesCategoryes');
                }
                if(que=='Facebook') window.open(href, que, 'width=640,height=300');
            }*/
            /* functions omniture*/
        </script>


        <script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
        <script>
          var googletag = googletag || {};
          googletag.cmd = googletag.cmd || [];
        </script>

        <!--/* Defineslots */-->
        <script type='text/javascript'>
         googletag.cmd.push(function() {
                if(isMobile()){
                    <?php include(STYLESHEETPATH."/pages/defineslots_venezuela_dynamic_mobile.php"); ?>
                }else{
                    <?php include(STYLESHEETPATH."/pages/defineslots_venezuela_dynamic.php"); ?>
                }

                //googletag.pubads().enableSyncRendering();
                googletag.pubads().enableSingleRequest();
                googletag.pubads().collapseEmptyDivs();
                googletag.enableServices();
        });
        </script>
        <!--/* Defineslots */-->

        <!-- CodeBasic PageScroll Omniture-->
        <script type="text/javascript" src="/varios/omniture/pagescroll.js" data-device="1"></script>
        <!-- / CodeBasic PageScroll Omniture-->

        <!-- CodeBasic Omniture-->
        <script src="//assets.adobedtm.com/2f40ac3634dda54927109ac2de7fff195b55011d/satelliteLib-8b6d7310838d03b742a124c9601810ce8e8d2d15.js" data-device="1"></script>
        <!-- / CodeBasic Omniture-->

        <!-- Facebook Pixel Code -->
            <script>
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window,document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '224607138107492'); 
                fbq('track', 'PageView');

                <?php
                    if(is_single() || is_category()){?>
                        fbq('track', 'ViewContent');
                <?php }elseif(is_search()){?>
                        fbq('track', 'Search');
                <?php }
                ?>
            </script>
            <noscript>
                <img height="1" width="1" src="https://www.facebook.com/tr?id=224607138107492&ev=PageView&noscript=1"/>
            </noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <?php flush(); ?>
    
    <body id="venezuela" <?php body_class(); ?> <?php if($title_post) echo ('data-title="'. utf8_decode($title_post).'"');?>  <?php echo "data-slug='".que_section_es()."'";?>>

        <?php do_action('before'); ?>

        <a class="page-scroll hidden-md hidden-lg"></a>

        <!--/* skin */-->
        <?php echo quien_es_skin();?>
        <!--/* skin */-->

        <!--/* floating3ros */-->
        <?php echo que_floating_3ros_es();?>
        <!--/* floating3ros */-->

        <!-- floating3eros-->
        <!-- <div id="div-gpt-ad-home-floating_3ros"><script type="text/javascript">googletag.display("div-gpt-ad-home-floating_3ros");</script></div>-->
        <!-- /floating3eros -->

        <!-- adhesion-->
        <div id="div-gpt-ad-home-adhesion"><script type="text/javascript">
        googletag.cmd.push(function() { 
            googletag.display("div-gpt-ad-home-adhesion");
        });
        </script></div>
        <!-- /adhesion -->

        <header role="banner">

            <!-- Links superiores, Buscador y Banners -->
            <div id="cont_search_banners" >
                <div id="cont_banners_top" class="container nopadding text-center">
                    <!--<div id="banner_top_240x90" class="hidden-md">
                        <?php echo quien_es("240","90",NULL);?>
                    </div>-->

                    <div id="exp_banner" class="banner_top_728x90">
                        <!--<img class="replace-2x" src="http://placehold.it/728x90" width="728" height="90" alt="">-->
                        <?php echo quien_es("728","90",NULL);?>
                    </div>
                    <br clear="all" />
                </div>

            </div>
            <!-- / Links superiores, Buscador y Banners -->

            <div id="masthead" class="site-branding default">
                <div class="nav__extender nav__extender--left"><div class="extender-bkg"></div></div>
                <div class="content_menu container nopadding ">
                    <div class="col-md-1 col-sm-1 col-xs-2 site-title">
                        <?php if(is_home()){$h_logo="h1";}else{$h_logo="h4";}?>
                        <<?php echo $h_logo?> class="site-title-heading">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                        </<?php echo $h_logo?>>

                    </div>
                    <div class="col-md-11 col-sm-11 col-xs-10">
                        <div id="NavR_Header_MainContent" class="NavR_Header_MainContent">
                            <div class="hidden-xs visible-sm visible-md visible-lg">
                                <div id="NavR_Header_topItemBlock" class="NavR_Header_topItemBlock">
                                    <a href="http://www.enowlatino.com/" target="_blank" class="boton_enow">EPISODIOS COMPLETOS</a>
                                    <div id="NavR_Header_Socials" class="NavR_Header_Socials" style="background-size: 100% 100%;">
                                        <div class="div_select">
                                            <form id="formCountry" method="post" name="buscador" action="<?php echo $_SERVER["REQUEST_URI"]?>">
                                                <select id="changeCountry" name="cual" onchange="document.forms.buscador.submit();_satellite.track('changeCountry');">
                                                    <option value="" selected="">Selecciona tu país</option>
                                                    <option value="2-AR">Argentina</option>
                                                    <option value="1-CO">Aruba</option>
                                                    <option value="1-CO">Barbados</option>
                                                    <option value="1-CO">Bolivia</option>
                                                    <option value="99-BR">Brasil</option>
                                                    <option value="1-CO">Chile</option>
                                                    <option value="1-CO">Colombia</option>
                                                    <option value="1-CO">Costa Rica</option>
                                                    <option value="1-CO">Curacao</option>
                                                    <option value="1-CO">Ecuador</option>
                                                    <option value="1-CO">El Salvador</option>
                                                    <option value="1-CO">Guatemala</option>
                                                    <option value="1-CO">Honduras</option>
                                                    <option value="3-mx">México</option>
                                                    <option value="1-CO">Nicaragua</option>
                                                    <option value="1-CO">Panamá</option>
                                                    <option value="2-AR">Paraguay</option>
                                                    <option value="1-CO">Perú</option>
                                                    <option value="1-CO">Puerto Rico</option>
                                                    <option value="1-CO">Republica Dominicana</option>
                                                    <option value="1-CO">Trinidad &amp; Tobago</option>
                                                    <option value="2-AR">Uruguay</option>
                                                    <option value="4-VE">Venezuela</option>
                                                </select>
                                                <input type="hidden" name="flag" value="1">
                                            </form>
                                        </div>
                                        <!-- MENU redes sociales-->
                                        <?php include(STYLESHEETPATH."/pages/menu_redes.php"); ?>
                                        <!-- MENU redes sociales-->

                                    </div>
                                </div>

                                <?php
                                $user_search = $_GET['s'];
                                $escape_url = esc_url( home_url( '/' ) );
                                $label = _x("Search for:", "label" );
                                $value_submit = esc_attr_x( 'Search', 'submit button' );
                                ?>

                                <div id="NavR_Header_Search_Action" class="NavR_Header_Search_Action" itemscope itemtype="http://schema.org/WebSite">
                                    <meta itemprop="url" content="http://la.eonline.com/venezuela"/>
                                    <form id="NavR_Header_Search_Form" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" method="get" id="searchform" class="searchform" action="<?php echo $escape_url; ?>" autocomplete="on">
                                        <label class="NavR_Header_entertosearch navr_text" style="display: block;">Presione Enter para Buscar</label>
                                        <meta itemprop="target" content="<?php echo URLCOMPLETA; ?>?s={s}"/>
                                        <input id="NavR_Header_Search_Submit" class="NavR_Header_Search_Submit nav_sprite" type="submit" value="<?php echo $value_submit; ?>" tabindex="2">
                                        <input id="NavR_Header_Search_Input" class="searchInputBoxes"  itemprop="query-input" type="text" name="s" tabindex="1" autofocus="" onfocus="this.value=''" autocomplete="on" style="width: 615px;">
                                        <div class="NavR_Header_Search_Close nav_sprite"></div>
                                    </form>
                                </div>



                                <!-- MENU desktop-->
                                <nav id="NavR_Header_NavItemBlock" class="NavR_Header_NavItemBlock">
                                    <div id="NavR_Header_NavBlock" class="NavR_Header_NavBloc text-center">
                                        <?php include(STYLESHEETPATH."/pages/menu.php");?>
                                    </div>
                                </nav>
                                <!-- MENU desktop-->

                            </div>
                            <!-- CAB MOBILE-->
                            <nav class="navbar navbar-default visible-xs hidden-sm hidden-md hidden-lg" role="navigation">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle colapsado" data-toggle="collapse" data-target="">
                                        <span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <!-- / CAB MOBILE-->

                        </div>
                    </div>
                </div>
                <div class="submenues"></div>
            <!-- / submenues -->

            </div><!--.site-branding-->


        </header>

        <!-- MENU mobile-->
        <nav id="NavR_Header_NavItemBlock_mobile" class="NavR_Header_NavItemBlock navbar-primary-collapse visible-xs hidden-sm hidden-md hidden-lg">
            <div id="NavR_Header_NavBlock_mobile" class="NavR_Header_NavBloc text-left">
                <?php include(STYLESHEETPATH."/pages/menu.php");?>
            </div>
        </nav>
        <!-- MENU mobile-->


		<div class="container page-container">

            <style>
                .borde_billboard_banner{float:left; margin:10px 5px; width:970px; height:auto; border: 1px solid #ddd; display:none;}
                .floating{ display:none;}
            </style>

			<div id="content" class="row row-with-vspace site-content" data-sticky_column_parent>

            <!-- Banner Billboard-->
            <?php echo que_billboard_es();?>
            <!-- /Banner Billboard-->

            <!-- Banner pushdown-->
            <?php echo que_pushdown_es();?>
            <!-- / Banner pushdown-->

            <!-- Banner Masthead -->
            <?php echo que_masthead_es();?>
            <!-- / Banner Masthead -->
