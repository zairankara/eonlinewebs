<?php
/**
 * Template Name: Fotos_automatico_2014 v2.0
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
include(TEMPLATEPATH."/var_constantes.php");
?>

<style type="text/css">
#buscador_gal input[type="text"] {
	width: 136px;
	height: 22px;
	padding: 2px 5px 2px 20px;
	border-style: none;
}
#searchsubmit_gal{
	border:none;
	background-color: #ff24d1;
	color:#fff !important;
	cursor: pointer;
}
.res_busqueda{
	width: 95%;
	margin: 10px auto;
	padding-top: 10px;
	padding-bottom: 10px;
	border-bottom:1px solid #f8f8f8;
}
.res_busqueda h3{
	font-size: 14px;
}
.ngg-album {
	height: 293px;
	border: 1px solid #cccccc;
	overflow:hidden;
	width: 293px;
	float: left;
	margin: 0 10px 10px 0;
}
.ngg-albumcontent {
	clear: both;
	display: inline-block;
	float: left;
}
.ngg-thumbnail {
	margin: 0;
	position:relative;
	height:293px;
	width:293px;
	overflow:hidden;
	background-color: #000;
}

.ngg-thumbnail img {
	height:auto; 
	width:293px;
}
.ngg-albumtitle {
	text-align: left;
	margin:0;
	font-family: "DIN Web Condensed", "Arial Narrow", Sans-Serif;
	font-size: 26px;
	line-height: 26px;
	color:#fff;
	position:absolute;
	bottom:0;
	/*background: rgba(0, 0, 0, 0.6);*/
	background-color: #000;
	height:auto;
	width:280px;
	_width:293px;
	padding: 10px;
}

.ngg-albumtitle a {
	color:#fff;
	text-decoration: none;
	max-width:270px;
}

.ngg-albumtitle a:hover {
	color:#ccc;
	text-decoration: underline;
	max-width:270px;
}

.ngg-description {
	text-align: left;
}

.ngg-description p {
	margin: 0 0 4px !important;
}
.ngg-clear {
	clear: both;
}
.navigation{
	float: none;
}
.navigation a:link, .navigation a:visited{
	padding: 0px 40px;
}
</style>



<div id="container" class="one-column">
	<div id="content" role="main">
		<div class="cont_one-clumn" id="paginafotos">
			<div style="width:50%; float:left;"><h4>ÚLTIMAS GALERIAS.</h4></div>
			<div style="padding:20px; float:right;" id="buscadorGalerias">
			    <form class="form-search form-inline" method="post" action="<?=$_SERVER["REQUEST_URI"]?>" id="buscador_gal">
					<input type="text" value="" name="buscar_gal" id="psearch">
					<input type="submit" id="searchsubmit_gal" value="Pesquisar">
			        <input type="hidden" name="flag_gal" value="1" />
			    </form>
			</div>
			<br clear="all"/>
					<?if($_POST["buscar_gal"]!=""){?><div class="res_busqueda"><h3>BUSCA: <?=$_POST["buscar_gal"]?></h3></div><?}?>

					<?
					global $wpdb;
					if($_GET["c"] == "")$cont = 1;
					if($_GET["c"] != "")$cont = $_GET["c"];
					
					if($_POST["buscar_gal"]!="" && $_POST["flag_gal"]==1){
						//$id_gals=obtener_id_galeria($_POST["buscar_gal"]);
						//print_r($id_gals);
						//$galleries = obtener_galerias_multiples($id_gals, NULL, "ng.fecha", "DESC", "ng.id");
						$galleries = obtener_galerias_string($_POST["buscar_gal"], "30", "ng.fecha", "DESC", "ng.id");
					}else{
						$id_gal=NULL;
							$parametroMax = 30 * $cont + 1;
							$parametroMin = $parametroMax - 30;

							if ($cont == 1)$parametro = $parametroMin.",31";
							if ($cont != 1)$parametro = $parametroMin.",30";

							$galleries = obtener_galerias_page($id_gal, $parametro, "ng.fecha", "DESC", "ng.id");

						

					}
					/* GALLERIES */

					$mydb2 = new wpdb('eonline_usr','30nl1n3','eonline_argentina','preprodabzdb');
					$valor_season = $mydb2->get_results('SELECT mundial_br FROM abmGalDestacadas', ARRAY_A);
					$mundial_br=$valor_season[0]["mundial_br"];
					$cantReg = 0;
					foreach($galleries as $image){
								

								$urlImg=$image["filename"];
								$vecUrl=explode("http://",$image["filename"]);
								$id_galeria=$image["gid"];
								$title=$image["title"];
								$title_gal=$image["title_gal"];

								if($vecUrl[1]=="")
								{
										$urlImg=$var_con[1].$image["path"]."/".$image["filename"];
								}else{
										$urlImg="http://".$vecUrl[1];
								}

								if($id_galeria!=$mundial_br){

									if($urlImg){?>

										<div class="ngg-album">
											<div class="ngg-albumcontent">
													<div class="ngg-thumbnail">
													<a href="/galerias_page?gallery=<?php echo $id_galeria;?>"><img class="Thumb" src="<?php echo $urlImg; ?>" alt="<?php echo ($desc);?>" title="<?php echo ($desc);?>"/></a>
													<div class="ngg-albumtitle"><a href="/galerias_page?gallery=<?php echo $id_galeria;?>"><?php echo ($title_gal);?></a></div>
													</div>

													<div class="ngg-description">
													<h2><?php echo ($title_gal);?></h2>
													</div>
											</div>
										</div>

									<?}
								}
						$cantReg++;
					}
								
					?>
					<div class="ngg-clear">
						<div class="navigation">
							<?
							if($cantReg >= 30){?>
								
									<div class="nav-next">
									<a href="http://br.eonline.com/galerias/?c=<?echo $cont +1;?>" style="float:right;">Ver mais</a>
									</div>
							<?}

							if($_GET["c"] > 1){?>
									<div class="nav-previous">
									<a href="http://br.eonline.com/galerias/?c=<?echo $cont -1;?>" style="float:left;">Voltar</a>
									</div>
								
							<?}?>
						</div>
					 </div>
						
	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>
