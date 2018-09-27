
<?if(is_single()) {
	foreach((get_the_category()) as $category) {
		 $categorias.=$category->slug."/";
	}
	//echo($categorias."cat");
	//$categorias=get_the_category_list( '/' ); 
	$categorias = trim($categorias, '/');
	//echo($post->post_name."-----------");
	$_trackPageview="['_trackPageview', '".$_SERVER["SERVER_NAME"]."/". $name_feed ."/". $categorias ."/".$post->post_name."']";
}else{
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
$_trackPageGroupDevice="['_setPageGroup', 1, 'Desktop']";
$_trackPageGroupTipoPagina="['_setPageGroup', 2, '".$tipoPage."']"; 

?>
<script type="text/javascript">
var _gaq = _gaq || [];
       _gaq.push(
            ['_setAccount', 'UA-10896153-11'],
            ['_setAllowLinker', true],
          	<?=$_trackPageGroupDevice?>,
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