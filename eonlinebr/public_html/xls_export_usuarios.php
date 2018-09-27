<?
$dbhost="preprodabzdb";
$dbname="eonline_celebrite_br";
$dbuser="eonline_usr";
$dbpass="30nl1n3";

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

$archivo="usuarios_experiences_".date(d.m.Y)."";

    // Define los encabezados ...
    header("Content-Disposition: attachment; filename=".$archivo.".xls");
    header("Content-Type: application/vnd.ms-excel");
	header("Pragma: no-cache");  
	header("Expires: 0");  



$query="SELECT * FROM concursos GROUP by email";
$query = mysql_query ($query);
$cant_rows = mysql_num_rows ($query);


    // Define el contenido de la variable de encabezado ...
   $encabezado = "<html>" .
						 "<head><meta http-equiv='content-type' content='text/html; charset=utf-8' /></head>" .
                        "<body>" .
                        "<table>";

    // Define el contenido de la variable de pie ...
   $pie = "</table>" .
                 "</body>" .
                 "</html>";



    // Imprime el encabezado ...
    echo ($encabezado);
    
	// Imprime los títulos ...
?>
<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Email</td>
		<td>Ciudad</td>
		<td>Pais</td>
</tr>
<?


    // Imprime los contenidos ...
   for($ii=0; $ii<$cant_rows; $ii++) 
	{
	
	$row = mysql_fetch_array ($query);
	
	$nombre	=	$row["nombre"];
	$apellido	=	$row["apellido"];
	$email		=	$row["email"];
	$ciudad	=	$row["ciudad"];
	$pais		=	$row['pais'];
	?>

	<tr>
	<td><?=$nombre?>&nbsp;</td>
	<td><?=$apellido?>&nbsp;</td>
	<td><?=$email?>&nbsp;</td>
	<td><?=$ciudad?>&nbsp;</td>
	<td>Brasil&nbsp;</td>
	</tr>

	<?}

    // Imprime el pie ...
    echo ($pie);
?>