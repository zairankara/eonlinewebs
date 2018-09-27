<script>

//Declaro una función común y corriente
function enviar_variables(){
	//alert("Llega hasta aca");
	var selected_val=$('li').find('input[name=poll]:checked').val();
	var var_feed=<?=$_GET["f"]?>;
	//alert("Valor: "+selected_val.lenght);
	//$("#error").html("Exito"+selected_val);

	if(selected_val>=0 || selected_val<=2)
	{
		//alert("Debe ingresar un valor");.
		//Envio las variables nombre=Pepe, apellido= Grillo al archivo mi_php.php
		$.post("http://la.eonline.com/varios/demoEncuesta/mi_poll.php",{poll:'1', feed:'99', variable:selected_val},function(respuesta){
			//alert(respuesta); //Mostramos un alert del resultado devuelto por el php
			$("#error").html(respuesta);
			$("#poll, #bot_poll").css("display","none");
			
		});
	}else{
		
		$("#error").html("Debe ingresar una respuesta");
	}
} 

function cierra()
{
	//alert("esta");
	$.fancybox.close();
	return false
}
</script> 

<style type="text/css">
#containerPoll {
	width: 405px !important;
	height: 305px !important;
	background: #000 url('http://la.eonline.com/varios/demoEncuesta/bg_encuesta.jpg') no-repeat;
}
#containerPoll div h1{
	font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;
	text-transform: uppercase;
	letter-spacing: 1px;
	color: #fff;
	font-size: 28px;
	line-height: 1.3;
	margin-top: 25px;
}
#containerPoll div ul{
	margin: 5px auto;
}
#containerPoll div li{
	font-family: "Din Web Condensed", "Arial Narrow", Sans-Serif;
	letter-spacing: 1px;
	color: #fff;
	font-size: 16px;
	line-height: 1.3;
	list-style: none;
}
#containerPoll div li input[type=radio]
{
    background: #000;
}
#fancycerrar{
	color:yellow;
	font-size: 10px;
}
</style>
<div id="containerPoll">
	<div style="width:300px; height:180px; margin-left:50px;">
		<h1><span style="color:#bcbcbc;">Pregunta: </span>Quem é Ryan Lochte?</h1>
		<ul id="poll">
			<li><input type="radio" name="poll" value="0"/>Um jogador de futebol?</li>
			<li><input type="radio" name="poll" value="1"/>Um ator</li>
			<li><input type="radio" name="poll" value="2"/>Um nadados</li>
		</ul>
		<input id="bot_poll" type="submit" name="Votar" onclick="enviar_variables();" style="float:right;">
		<div id="error" style="color:yellow"></div>
	</div>
</div>
