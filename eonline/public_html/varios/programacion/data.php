<!DOCTYPE html>
<html class="no-js" >
  <head>
<TITLE> .:: BackOffice v1.0 ::. </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT=".:: Abz Comunicacion ::.">
<META NAME="Keywords" CONTENT=".:: Abz Comunicacion ::.">
<META NAME="Description" CONTENT=".:: Abz Comunicacion ::.">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
<meta http-equiv="Content-Language" content="es-ES" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);

	if( $_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "192.168.1.105" ){
		$BASE = 'admin2012';
		$USUARIO = 'root';
		$CLAVE = '';
		$SERVER = 'localhost';

	} else {
		$BASE = "eonline_argentina";
		$USUARIO = "eonline_usr";
		$CLAVE = "30nl1n3";
		$SERVER = "preprodabzdb";
	}
	$mysqli = new mysqli($SERVER, $USUARIO, $CLAVE, $BASE);
	if ($mysqli->connect_errno) {
	    echo "Falló la conexión con MySQL: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
	}
	if (!$mysqli->set_charset("utf8")) {
	    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
	    exit();
	}

echo("ACA 12:58");
$sql="SELECT * FROM abmProgram ORDER by title_str ASC";
$query=$mysqli->query($sql);
while($row=$query->fetch_array()){
	echo ("<br><br>".$row["id_program"]);
	echo ("<br>".$row["content_la"]);
}
?>
</body>
</html>