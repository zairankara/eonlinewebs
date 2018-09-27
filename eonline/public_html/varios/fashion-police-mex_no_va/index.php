<link rel="stylesheet" type="text/css" href="fashion-police.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/mexico/wp-content/themes/abz2012/font-face/font-face.css" />
<script type="text/javascript" src="/varios/modulos_extra/jquery.min.js"></script>
<script type="text/javascript">
	function enviar_variables_2014(id, feed, opcion){
		/*$.post("/varios/fashion-police-mex/carga_votos.php?rand=<?php echo rand(0,500);?>",{pid:id,idFeed:feed,opcion:opcion},
			function(respuesta){ 
				$("#resp").html(respuesta);
			});*/
		$.ajax({
		  type: "POST",
		  url: "carga_votos.php",
		  cache : false,
		  data: "pid="+id+"&idFeed="+feed+"&opcion="+opcion+"",
		  success: function(msg){
		       $("#resp").html(msg);
		  },
		  error: function(XMLHttpRequest, textStatus, errorThrown) {
		   		$("#resp").html("ERROR"+errorThrown);
		  }
		});
	}
</script>

<?
echo("RAND: ".rand(0,600));
function noCache() {
	header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
}
noCache();
require_once('../../mexico/wp-config.php');
//$gallery="7432";
//$gallery="9915";
$gallery="10076";

global $wpdb;


$image = obtener_galerias($gallery, NULL, "RAND()", NULL, NULL);

$m=1;

		$vecUrl=explode("http://",$image[0]["filename"]);
		$desc=$image[0]["description"];
		$alttext=$image[0]["title"];
		$pid=$image[0]["id"];

		if($vecUrl[1]=="")
			{
				$urlImg=$var_con[1].$image[$indice]["path"]."/".$image[$indice]["filename"];
			}else{
				$urlImg="http://".$vecUrl[1];
			}
	$m++;
?>
<div class="modulo_fashion_img"><img src="<?=$urlImg?>" width="300"></div>
<div class="modulo_fashion_der">
	<h2 style="line-height:1.8; color:#ec008c; background-color:#000;text-align:center;">VOTÁ EN NUESTRA GALERíA DE CELEBRIDADES</h2>
	<h2 style="font-size: 34px;text-align:center; line-height:0.9 !important;">¿Qué te parece el look de <?=$alttext?>?</h2>
	<!--<h2 style="text-align:center; line-height:1.1 !important;"> ¿Qué te parece el look de <?=$alttext?>?</h2>-->
	<div class="mod_botones" >
		<div id="resp">
			<a href="javascript:enviar_variables_2014('<?=$pid?>','3', 'likes');" class="like"></a>
			<a href="javascript:enviar_variables_2014('<?=$pid?>','3', 'wtf');" class="wtf"></a>
		</div>
		<div class="socialFashion">
			<iframe src="//www.facebook.com/plugins/like.php?href=<?=$urlImg?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$urlImg?>" data-text="<?=$desc?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<!-- #FACEBOOK COMMENT -->
		<div style="margin-bottom:30px;">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=268102679875815";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-comments" data-href="<?=$urlImg?>" data-width="290" data-colorscheme="dark" ></div>
		</div>
		<!-- #FACEBOOK COMMENT -->
								
	</div>
</div>

<!-- G.A. -->
<!--<script type="text/javascript">
	var _gaq = _gaq || [];
                _gaq.push(
				['_setAccount', 'UA-18061947-4'],
				['_trackPageview'],
				['b._setAccount', 'UA-18061947-40'],
				['b._setDomainName', 'eonline.com'],
				['b._setAllowLinker', true],
				['b._trackPageview']
                );
                setTimeout(function() { _gaq.push(['_trackEvent', 'Sin-Rebote', 'Sin-Rebote', '10 sec']); },10000);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  </script>
-->