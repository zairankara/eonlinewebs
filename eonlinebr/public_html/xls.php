<?
error_reporting(1);

$dbhost="preprodabzdb";
$dbname="eonlinebr_eonlinedb";
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

	//BEAM DE BRASIL
	$id_beam="5";



$query="SELECT * FROM  `sched_program` ";
$query = mysql_query ($query);
$cant_rows = mysql_num_rows ($query);

$archivo="programas";

    // Define el contenido de la variable de encabezado ...
   $encabezado = "<html>" .
                    "<head><meta http-equiv='content-type' content='text/html; charset=iso8859-1' /></head>" .
                        "<body>" .
                        "<table>";

    // Define el contenido de la variable de pie ...
   $pie = "</table>" .
                 "</body>" .
                 "</html>";

    // Define los encabezados ...
    header ("Content-Disposition: attachment; filename=".$archivo.".xls");
    header ("Content-Type: application/vnd.ms-excel");
	header("Pragma: no-cache");  
	header("Expires: 0");  
	 	 


    // Imprime el encabezado ...
    echo ($encabezado);

    // Imprime los títulos ...
?>
<tr>
<td><B>id</B></td>
<td><B>TITULO</B></td>
<td><B>TEXTO</B></td>
</tr>
<?


    // Imprime los contenidos ...
   for($ii=0; $ii<$cant_rows; $ii++) 
	{
	
	$row = mysql_fetch_array ($query);
	?>

	<tr>
	<td><?=$row["id_program"]?></td>
	<td><?=$row["title_str"]?></td>
	<td><?=$row["content_str"]?></td>
	</tr>

	<?}

    // Imprime el pie ...
    echo ($pie);
?>