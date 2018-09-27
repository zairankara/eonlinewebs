<?php
include(TEMPLATEPATH."/var_constantes.php");

/**
 * Template Name: FASHION POLICE Mexico 2013
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); 
?>
<style type="text/css">
	#fancybox-content, #fancybox-outer{
		width: 405px !important;
		height: 305px !important;
		border: none !important;
		background: #000;
		color:#fff;
	}
	#fancybox-content{
		border: 4px solid #fff !important;
	}
	.untercio #oscar, 
	.untercio #alexis,
	.untercio #marcela{
		display: none;
	}
	.franja_fucsia{
		width:630px;
		height: 100px;
		background-color: #EC008C;
	}
	#div-gpt-ad-fashionpolicemx-300x100-1{
		float: right;
	}

	</style>
<script type="text/javascript">
$(document).ready(function() {  
  	$(".tabdiv").hide(); //Esconde todo el contenido  
	$("ul.tabnav li:first").addClass("active").show(); //Activa la primera tab  
	$(".tabdiv:first").show(); //Muestra el contenido de la primera tab  
	//On Click Event  
	$("ul.tabnav li").click(function() {  
	$("ul.tabnav li").removeClass("active"); //Elimina las clases activas    
	$(this).addClass("active"); //Agrega la clase activa a la tab seleccionada  
	$(".tabdiv").hide(); //Esconde todo el contenido de la tab  
	var activeTab = $(this).find("a").attr("href"); //Encuentra el valor del atributo href para identificar la tab activa + el contenido    
	$(activeTab).fadeIn(); //Agrega efecto de transición (fade) en el contenido activo  
	return false;  
	});  

	$("#oscarid").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});
	$("#alexisid").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});
	$("#marcelaid").fancybox({
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});
});
</script>
<!--
<script type="text/javascript">

	function enviar_variables(id, feed, opcion){
		$.post("<?php echo $var_con[100]; ?>/fashion-police/carga_votos.php?rand=<?=rand(0,500);?>",{pid:id,idFeed:feed,opcion:opcion},
			function(respuesta){ 
				$("#resp").html(respuesta);
			});
	}
</script>
-->
			<div id="content" role="main">
			<div class="cont_one-clumn" style="height: auto;">
					

							
							<div class="dostercios">

								<h2 style="font-size: 18px; line-height:1.1 !important;color:#fff; text-align:left; margin:0;">Repite: Martes 23.30 hs. Miércoles 14.30 hs. Sábado 12.30 hs. Domingo 1.00 h.</h2>
								<div class="video_fashion">
									<div style="display:none"></div>
									<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
									<object id="myExperience" class="BrightcoveExperience">
									  <param name="bgcolor" value="#000000" />
									  <param name="width" value="588" />
									  <param name="height" value="410" />
									  <param name="playerID" value="2241427935001" />
									  <param name="playerKey" value="AQ~~,AAAAFpR_2Jk~,FZYC7qwaTWMpgQNtI2kYpcZS3ec67544" />
									  <param name="isVid" value="true" />
									  <param name="isUI" value="true" />
									  <param name="wmode" value="opaque" />
									  <param name="dynamicStreaming" value="true" />
									</object>
									<script type="text/javascript">brightcove.createExperiences();</script>
								</div>
								<div class="modulo_fashion">
									<iframe src="/experience/fashion-police-mex/index.php?rnd=<?=rand(0,500);?>" width="630" height="650" scrolling="no" style="overflow: hidden"></iframe>
									<div class="franja_fucsia"><?php echo quien_es("300","100","1");?></div>
									<?
									//echo("RAND: ".rand(0,600));
									/*
									$gallery="7432";

									if(!is_numeric($gallery)) exit("Error de Validación");

									global $wpdb;
									$sqlstr="SELECT  * 
									FROM ( 
										SELECT np.pid, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
										FROM wp_ngg_pictures np, wp_ngg_gallery ng
										WHERE np.galleryid = ng.gid AND np.galleryid =".$gallery."
									UNION 
										SELECT np.pid, ng.path, np.alttext, np.description, np.filename, ng.title, ng.gid
										FROM wp_ngg_pictures np, pictures_galleries pg, wp_ngg_gallery ng
										WHERE np.galleryid = ng.gid AND pg.gid =".$gallery." AND pg.pid = np.pid ) AS a
									order by rand() limit 1";
									$galleries = $wpdb->get_results($sqlstr, ARRAY_A);
									$m=1;
									foreach($galleries as $image){
											$vecUrl=explode("http://",$image["filename"]);
											$desc=$image["description"];
											$alttext=$image["alttext"];
											$pid=$image["pid"];

											if($alttext==""){
												$alttext=$desc;
											}
											if($vecUrl[1]=="")
											{
													$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
											}else{
													$urlImg="http://".$vecUrl[1];

											}
										$m++;
									}?>
									<div class="modulo_fashion_img"><img src="<?=$urlImg?>" width="300"></div>
									<div class="modulo_fashion_der">

										<h2 style="font-size: 18px;color:#ec008c; background-color:#000;text-align:center;">VOTÁ EN NUESTRA GALERíA DE CELEBRIDADES</h2>
										<h2 style="font-size: 34px;text-align:center; line-height:0.9 !important;">¿Qué te parece el look de <?=$alttext?>?</h2>
										<!--<h2 style="font-size: 18px;text-align:center; line-height:1.1 !important;"> ¿Qué te parece el look de <?=$alttext?>?</h2>-->
										<div class="mod_botones" >
											<div id="resp">
												<a href="javascript:enviar_variables('<?=$pid?>','3', 'likes');" class="like"></a>
												<a href="javascript:enviar_variables('<?=$pid?>','3', 'wtf');" class="wtf"></a>
											</div>
											<div class="socialFashion">
												<iframe src="//www.facebook.com/plugins/like.php?href=<?=$urlImg?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=494335233944829" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
												<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$urlImg?>" data-text="<?=$desc?>" data-via="eonlinelatino" data-lang="es" data-dnt="true">Twittear</a>
											</div>
											
										</div>
									</div>
									*/?>
								</div>
								<div class="bios_fashion" style="float:left;">
									<div class="mod">
										 <a href="https://www.facebook.com/HoracioVillalobosOficial" target="_blank" class="img_horacio" ></a>
										<div class="iframe_bios"> <!-- <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FHoracioVillalobosOficial&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=115411828498173" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:105px;" allowTransparency="true"></iframe> -->
										</div>
									</div>
									<div class="mod">
										 <a href="https://twitter.com/oliperalta" target="_blank" class="img_oli" ></a>
										<div class="iframe_bios">
										<!--	<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Falexis.anda%3Ffref%3Dts&amp;width=155&amp;height=35&amp;colorscheme=dark&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:105px;" allowTransparency="true"></iframe>-->
										</div> 
									</div>
									<div class="mod">
										 <a href="https://twitter.com/reclu" target="_blank" class="img_ileana" ></a>
										<div class="iframe_bios">
										<!--	<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Falexis.anda%3Ffref%3Dts&amp;width=155&amp;height=35&amp;colorscheme=dark&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:105px;" allowTransparency="true"></iframe> -->
										</div>
									</div>
									<div class="mod">
										<a href="http://instagram.com/eljuanjoherrera" target="_blank" class="img_juanjo" ></a>
										<div class="iframe_bios">
										 <!--<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.marcelacuevas.com%2F&amp;width=155&amp;height=35&amp;colorscheme=dark&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false&amp;" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:105px;" allowTransparency="true"></iframe> -->
										</div>
									</div> 
								</div>
							</div>
							<div class="untercio">
								
								<div id="tabvanilla" class="widget"  style="float:left;">
									<h2 style="font-size: 26px; line-height:1.2;color:#fff; text-align:left; margin:8px;">TWEETS/</h2>

								    <ul class="tabnav">
								    <li><h2><a href="#fashion">FASHION POLICE</a></h2></li>
								    <!-- <li><h2><a href="#popular">JUANJO</a></h2></li>
								    <li><h2><a href="#recent">MARCELA</a></h2></li>
								    <li><h2><a href="#featured">ALEXIS</a></h2></li> -->
								    </ul>

								    <div id="fashion" class="tabdiv">
									    <a class="twitter-timeline" href="https://twitter.com/MxFashionPolice" data-widget-id="384765919760637952">Tweets por @MxFashionPolice</a>
								    </div><!--/fashion-->

								    <div id="popular" class="tabdiv">
								 	 <a class="twitter-timeline" href="https://twitter.com/ElJuanjoHerrera" data-widget-id="365881415184818178">Tweets por @ElJuanjoHerrera</a>
								    </div><!--/popular-->

								    <div id="recent" class="tabdiv">
								    <a class="twitter-timeline" href="https://twitter.com/_marcelacuevas_" data-widget-id="373490426356826113">Tweets por @_marcelacuevas_</a>
								    </div><!--/recent-->

								    <div id="featured" class="tabdiv">
								    <a class="twitter-timeline" href="https://twitter.com/alexisdeonda" data-widget-id="373490686374334464">Tweets por @alexisdeonda</a>
								    </div><!--featured-->

								</div><!--/widget-->

								

								<div class="bannerFashion">
									<?php echo quien_es("300","250","1");?>
								</div>

								<div class="redes">
									<a href="https://www.facebook.com/FashionPoliceMx" target="_blank" class="redes_fb"></a>
									<a href="http://instagram.com/mxfashionpolice" target="_blank" class="redes_in"></a>
									<a href="https://twitter.com/mxfashionpolice" target="_blank" class="redes_tw"></a>
								</div>
							</div>

							


			</div>
			</div><!-- #content -->

<?php get_footer(); ?>
