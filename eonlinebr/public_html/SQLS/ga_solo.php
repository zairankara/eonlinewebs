<?
if(is_single()) {
	$categorias='';
  foreach((get_the_category()) as $category) {
		 $categorias.=$category->slug."/";
	}
	$categorias = trim($categorias, '/');
	$_trackPageview="['_trackPageview', '/". $name_feed ."/". $categorias ."/".$post->post_name."']";
}else{
	$_trackPageview="['_trackPageview']";
}
if($_trackPageview=="/trackBannerM"){
	$_trackPageview="['_trackPageview']";
}
if(is_home()){
  $tipoPage="Home";
}elseif(is_search()){
  $tipoPage="Búsqueda";
}elseif(is_tag()){
  $tipoPage="Etiqueta";
}elseif(is_404()){
  $tipoPage="No encontrada";
}elseif(is_category()){
  $tipoPage="Categoria";
}elseif(is_page()){
  $tipoPage="Página";
}elseif(is_single()){
  $tipoPage="Nota";
}else{
  $tipoPage="Otros";
}
//$_trackPageGroupDevice="['_setPageGroup', 3, 'Desktop']";
$_trackPageGroupTipoPagina="['_setPageGroup', 4, '".$tipoPage."']"; 
?>
<script type="text/javascript" id="GA_desktop" data-device="1">
var $_trackPageGroupDevice;
if(isMobile()) {
	//console.log("mobile ga");
	$_trackPageGroupDevice="['_setPageGroup', 3, 'Mobile']";
}else if(isTablet()){
	$_trackPageGroupDevice="['_setPageGroup', 3, 'Tablet']";
}else{
	$_trackPageGroupDevice="['_setPageGroup', 3, 'Desktop']";
}
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-18061947-40'],
            ['_setAllowLinker', true],
            ['_setDomainName', 'eonline.com'],
            $_trackPageGroupDevice,
            <?=$_trackPageGroupTipoPagina?>,
            <?=$_trackPageview?>
      );
      setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>