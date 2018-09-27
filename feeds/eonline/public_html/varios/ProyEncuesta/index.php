<style type="text/css">
	#proyEncuesta {
		width: 480px;
		height: 420px;
		position: fixed;
		right: 0;
		top:50%;
		margin-top: -210px;
		background: url("http://la.eonline.com/varios/ProyEncuesta/bg2.png");
  		z-index: 10000;
  		display:none;
	}
	.placas_Encuesta{position: relative;}
	#proyEncuesta h3{   font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;letter-spacing: 1px;font-size: 25px;z-index: 10;position: absolute;color: #fff;top: 106px;right: 12px;}
	<?
	$variable=$_GET["debug"];
	switch ($variable) {
		case '30':
			$nombre="placa_genero.png";
			break;
		case '40':
			$nombre="placa_edad.png";
			break;
		case '50':
			$nombre="placa_pelo.png";
			break;
		case '60':
			$nombre="placa_gustos.png";
			break;
		default:
			$nombre="placa_genero.png";
			break;
	}
	?>
	#proyEncuesta article.placa_encuesta{background: url("http://la.eonline.com/varios/ProyEncuesta/<?=$nombre?>");width: 480px;height: 420px;z-index: 5;cursor: pointer}
</style>
<div id="proyEncuesta">
	<div class="placas_Encuesta">
		<h3>En <strong>E!</strong> queremos conocerte para darte lo mejor</h3>
		<article class="placa_encuesta"></article>
	</div>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
	    $("#proyEncuesta").fadeIn(500);
	    	$("#proyEncuesta article").click(function(){
				$("#proyEncuesta").fadeOut();
			})
	});
</script>