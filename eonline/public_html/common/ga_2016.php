<?php

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
  $cat = get_term_by('name', single_cat_title('',false), 'category');
  $postSlug=$cat->slug;
  $_trackCategory="ga('set', 'contentGroup1', '".$postSlug."');";
}elseif(is_page()){
  $tipoPage="Página";
  $parent = get_page();
  $postSlug=$parent->post_name;
  $_trackCategory="ga('set', 'contentGroup1', '".$postSlug."');";
}elseif(is_single()){
   $id = get_the_ID();
   $_trackDimension="ga('set', 'dimension1', '".$id."');";
   $category = get_the_category();
   $firstCategory = $category[0]->slug;
  $_trackCategory="ga('set', 'contentGroup1', '".$firstCategory."');";

  $tipoPage="Nota";
}else{
  $tipoPage="Otros";
}
?>

<script type="text/javascript" id="GA_desktop" data-device="1">
  var $_trackPageGroupDevice;
  if(isMobile()) {
  	$_trackPageGroupDevice="Mobile";
  }else if(isTablet()){
  	$_trackPageGroupDevice="Tablet";
  }else{
  	$_trackPageGroupDevice="Desktop";
  }

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-18061947-40','auto');
  <?php echo $_trackCategory; ?>
  ga('set', 'contentGroup2', '<?php echo ucfirst(NAMEFEED); ?>');
  ga('set', 'contentGroup3', $_trackPageGroupDevice);
  ga('set', 'contentGroup4', '<?php echo $tipoPage; ?>');
  <?php echo $_trackDimension; ?>
  ga('send', 'pageview');
  ga('create', 'UA-76911408-15', 'auto', 'clientTracker');
  ga('clientTracker.send', 'pageview');

  setInterval( function(){ga('send', 'event', 'Sin-Rebote', 'Sin-Rebote', '10 segundos') }, 10000);

</script>
