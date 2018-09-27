<?
$dbhost="localhost";
$dbname="E-latino";
$dbuser="admin";
$dbpass="admin";

$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle){
		$error = msg_error_conexion;
	}else{
		$db_selected= mysql_select_db($dbname, $chandle);
		if (!$db_selected) {
			$error = msg_error_conexion;
		}
	}
echo mysql_error();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
        "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>E! Online Latinoamérica | Programación</title>
	<meta name="generator" content="BBEdit 9.1" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="Author" content="http://www.abzcomunicacion.com" />
	<meta name="Description" content="" />
	<meta name="Keywords" content="" />
	<link rel="author" href="http://www.abzcomunicacion.com">

<!-- estilos -->
<link rel="stylesheet" type="text/css" href="css/styles.css" />

</head>
<body>
<div id="cont_gral">

<!-- COL IZQ -->
<div class="col_izq">

	<!-- Fecha -->
	<div class="fecha">19<span class="mes">Ago</span></div>
	<!-- / Fecha -->
	
	<!-- Menu Horario -->
	<ul class="menu_horario">
		<li><a href="#" title="Mañana" class="manana selected">MAÑANA</a></li>
		<li><a href="#" title="Tarde" class="tarde">TARDE</a></li>
		<li><a href="#" title="Noche" class="noche">NOCHE</a></li>
		<li><a href="#" title="Trasnoche" class="trasnoche">TRASNOCHE</a></li>
	</ul>
	<!-- / Menu Horario -->

</div>
<!-- / COL IZQ -->

<!-- COL DER -->
<div class="col_der">

	<!-- Menu Dias -->
	<div class="cont_menu_dia">
	<ul class="menu_dia">
		<li><a href="#" title="Lunes" class="lunes selected">LUNES</a></li>
		<li><a href="#" title="Martes" class="martes">MARTES</a></li>
		<li><a href="#" title="Miércoles" class="miercoles">MIERCOLES</a></li>
		<li><a href="#" title="Jueves" class="jueves">JUEVES</a></li>
		<li><a href="#" title="Viernes" class="viernes">VIERNES</a></li>
		<li><a href="#" title="Sábado" class="sabado">SABADO</a></li>
		<li><a href="#" title="Domingo" class="domingo">DOMINGO</a></li>
	</ul>
	</div>
	<!-- / Menu Dias -->
	
	<!-- Módulos Programas -->
	<div class="modulo_prog">
		<div class="morning">
			<div class="hora">06:00</div>
			<div class="programa">
			<img src="imgs/programas/TrueBeauty.jpg" alt="" width="233" height="60" border="0" align="left" />
			<h1>BEHIND THE SCENES - THE BACK UP PLAN</h1>
			<p>Afortunadamente, poseer un look atractivo no es todo en la vida...</p>
			</div>
			<br clear="all" />
		</div>
	</div>
	
	<div class="modulo_prog">
		<div class="afternoon">
			<div class="hora">06:00</div>
			<div class="programa">
			<img src="imgs/programas/TrueBeauty.jpg" alt="" width="233" height="60" border="0" align="left" />
			<h1>BEHIND THE SCENES - THE BACK UP PLAN</h1>
			<p>Afortunadamente, poseer un look atractivo no es todo en la vida...</p>
			</div>
			<br clear="all" />
		</div>
	</div>
	
	<div class="modulo_prog">
		<div class="evening">
			<div class="hora">06:00</div>
			<div class="programa">
			<img src="imgs/programas/TrueBeauty.jpg" alt="" width="233" height="60" border="0" align="left" />
			<h1>BEHIND THE SCENES - THE BACK UP PLAN</h1>
			<p>Afortunadamente, poseer un look atractivo no es todo en la vida...</p>
			</div>
			<br clear="all" />
		</div>
	</div>
	
	<div class="modulo_prog">
		<div class="night">
			<div class="hora">06:00</div>
			<div class="programa">
			<img src="imgs/programas/TrueBeauty.jpg" alt="" width="233" height="60" border="0" align="left" />
			<h1>BEHIND THE SCENES - THE BACK UP PLAN</h1>
			<p>Afortunadamente, poseer un look atractivo no es todo en la vida...</p>
			</div>
			<br clear="all" />
		</div>
	</div>
	<!-- / Módulos Programas -->

</div>
<!-- / COL DER -->
<br clear="all" />

<!-- LOGOS PIE -->
<div class="logos_pie"></div>
<!-- / LOGOS PIE -->

</div>
</body>
</html>
