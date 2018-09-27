<script>
//Declaro una función común y corriente
function enviar_variables(){
	//alert("Llega hasta aca");
	var selected_val=$('li').find('input[name=poll]:checked').val();
	var var_feed=<?=$_GET["f"];?>
	//alert("Valor: "+selected_val.lenght);
	//$("#error").html("Exito"+selected_val);

	if(selected_val>=0 || selected_val<=2)
	{
		//alert("Debe ingresar un valor");.
		//Envio las variables nombre=Pepe, apellido= Grillo al archivo mi_php.php
		$.post("/varios/encuestaMilian/mi_poll.php",{poll:'1', feed:var_feed, variable:selected_val},function(respuesta){
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
	position: relative;
	width: 400px !important;
	height: 305px !important;
	background: #000 url('http://la.eonline.com/varios/encuestaMilian/bg_encuesta.jpg') no-repeat;
}
#containerPoll #error {
	position: absolute;
	top: 10px;
	left: 10px;
	font-family: "Ostrich Sans Pro Regular", "Arial Narrow", Sans-Serif;
	text-transform: uppercase;
	letter-spacing: 1px;
	color: #fff;
	font-size: 28px;
	line-height: 1.3;
	background-color: red;
	height:auto;
}
#containerPoll #placa {
	position: absolute;
	bottom: 0;
	left: 0;
	width:370px;
	_width:400px; 
	height:165px;
	_height:180px; 
	padding-left:30px;
	padding-left:15px;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, transparent), color-stop(100%, rgba(0,0,0,0.65)));
	background: -webkit-linear-gradient(top, transparent 0%, rgba(0,0,0,0.65) 100%);
	background: -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(0,0,0,0.65)));
	background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.65) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
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
	height: 20px;
}
#containerPoll div li{
	font-family: "Din Web Condensed", "Arial Narrow", Sans-Serif;
	letter-spacing: 1px;
	color: #fff;
	font-size: 16px;
	line-height: 1.3;
	list-style: none;
	width: 50px;
	float: left;
}
#containerPoll div li input[type=radio]
{
    background: #000;
}
#containerPoll input[type=submit]
{
   clear: both;
   padding: 4px 7px;
}
#fancycerrar{
	color:yellow;
	font-size: 10px;
}
</style>
<div id="containerPoll">
	<div id="error"></div>

	<div id="placa">

		<h1>¿Te gustaría ver un <br/>show de Christina Milian?</h1>
		<ul id="poll">
			<li><input type="radio" name="poll" value="0"/>Si</li>
			<li><input type="radio" name="poll" value="1"/>No</li>
		</ul>
		<input id="bot_poll" type="submit" value="Votar" name="Votar" onclick="enviar_variables();">
	</div>
</div>
